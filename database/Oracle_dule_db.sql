/*==========================================================================
/* PROYECTO: DULE 
/* BASE DE DATOS: DULE
/* FECHA: 17/07/2021                                
/*==========================================================================

/*Create tables*/

CREATE TABLE usuario (
    idUsuario NUMBER(20) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),  
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	direccion VARCHAR2(255)
	CONSTRAINT PK_usuario PRIMARY KEY (idUsuario)
);

CREATE TABLE usuarioEliminado (
    idUsuario NUMBER(20) NOT NULL,  
	email VARCHAR2(100) NOT NULL,
	fechaEliminado DATE NOT NULL,
	CONSTRAINT PK_usuarioEliminado PRIMARY KEY (idUsuario)
);


CREATE TABLE rol(
  idRol NUMBER(10) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),
  rol VARCHAR2(20) NOT NULL,
  CONSTRAINT PK_rol PRIMARY KEY (idRol)
);

CREATE TABLE categoria(
	idCategoria NUMBER(10) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),
	categoria VARCHAR2(50) NOT NULL,
	CONSTRAINT PK_categoria PRIMARY KEY (idCategoria)
);

CREATE TABLE producto(
	idProducto NUMBER(10) NOT NULL,
	producto VARCHAR2(100) NOT NULL,
	precioUnitario NUMBER(10,2) NOT NULL,
	existencias NUMBER (20) NOT NULL,
	imagen VARCHAR2(200) NOT NULL,
	idCategoria NUMBER(10) NOT NULL,
	CONSTRAINT PK_producto PRIMARY KEY (idProducto)
);

CREATE TABLE temp_detalleFactura(
	idUsuario NUMBER(20) NOT NULL,
	idProducto NUMBER(10) NOT NULL,
	producto VARCHAR2(100) NOT NULL,
	cantidad NUMBER(20) NOT NULL,
	precioUnitario NUMBER (10,2) NOT NULL,
	subTotal NUMBER (10,2) NOT NULL
);

CREATE TABLE temp_factura(
	idUsuario NUMBER(20) NOT NULL,
	subTotal NUMBER (10,2) NOT NULL,
	iva NUMBER (10,2) NOT NULL,
	total NUMBER (10,2) NOT NULL
);

CREATE TABLE factura(
	idUsuario NUMBER(20) NOT NULL,
	total NUMBER (10,2) NOT NULL,
	fechaVenta DATE NOT NULL
);

--Crear los FK hasta tener la version final de las tablas

ALTER TABLE usuario ADD CONSTRAINT fk_usuario_provincia FOREIGN KEY (idProvincia) REFERENCES provincia (idProvincia);
ALTER TABLE usuario ADD CONSTRAINT fk_usuario_rol FOREIGN KEY (idRol) REFERENCES rol (idRol);
ALTER TABLE producto ADD CONSTRAINT fk_producto_categoria FOREIGN KEY (idCategoria) REFERENCES categoria (idCategoria);
ALTER TABLE temp_detalleFactura ADD CONSTRAINT fk_detalleFactura_usuario1 FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario);
ALTER TABLE temp_detalleFactura ADD CONSTRAINT fk_detalleFactura_producto1 FOREIGN KEY (idProducto) REFERENCES producto (idProducto);
ALTER TABLE temp_detalleFactura ADD CONSTRAINT fk_detalleFactura_producto2 FOREIGN KEY (idProducto) REFERENCES producto (idProducto);
ALTER TABLE temp_detalleFactura ADD CONSTRAINT fk_detalleFactura_producto3 FOREIGN KEY (precioUnitario) REFERENCES producto (precioUnitario);
ALTER TABLE temp_factura ADD CONSTRAINT tempFactura_tempDetalleFactura1 FOREIGN KEY (idUsuario) REFERENCES temp_detalleFactura (idUsuario);
ALTER TABLE temp_factura ADD CONSTRAINT tempFactura_tempDetalleFactura2 FOREIGN KEY (subTotal) REFERENCES temp_detalleFactura (subTotal);
ALTER TABLE factura ADD CONSTRAINT fk_factura_temp_factura1 FOREIGN KEY (idUsuario) REFERENCES temp_factura (idUsuario);
ALTER TABLE factura ADD CONSTRAINT fk_factura_temp_factura2 FOREIGN KEY (total) REFERENCES temp_factura (total);
