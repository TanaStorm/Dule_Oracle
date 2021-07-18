/*==========================================================================
/* PROYECTO: DULE 
/* BASE DE DATOS: DULE
/* FECHA: 17/07/2021                                
/*==========================================================================

/*
CREAR RUTAS en la pc/server :
C:\ORACLE
C:\ORACLE\PROYECTO
C:\ORACLE\PROYECTO\TEMP
C:\ORACLE\PROYECTO\DATOS
*/

-- TABLESPACE
CONNECT SYS/ORACLE AS SYSDBA;

CREATE TABLESPACE DULE
DATAFILE 'C:\ORACLE\PROYECTO\DATOS\DATOSDULE.DBF’
SIZE 20M AUTOEXTEND ON NEXT 64K
MAXSIZE 100M;

CREATE TEMPORARY TABLESPACE TEMP_DULE
TEMPFILE 'C:\ORACLE\PROYECTO\TEMP\TEMPDULE.DBF’
SIZE 32M AUTOEXTEND ON NEXT 128K
MAXSIZE 100M;

/*Alterar session antes de ejecutar script*/
alter session set "_oracle_script"=true;


/*Crear Profile*/
CREATE PROFILE PROFILE_DULE LIMIT
SESSIONS_PER_USER UNLIMITED
CPU_PER_SESSION   UNLIMITED
FAILED_LOGIN_ATTEMPTS 1000;


-- Role: Administrador ; 
CREATE ROLE ROLE_ADMIN;
GRANT CONNECT TO ROLE_ADMIN;
GRANT RESOURCE TO ROLE_ADMIN;


-- CREACION DE USUARIO Y ASIGNAR PROFILE (Permisos de Administrador)
CREATE USER DULE IDENTIFIED BY dule123
DEFAULT TABLESPACE DULE
TEMPORARY TABLESPACE TEMP_DULE
PROFILE PROFILE_DULE;
GRANT CREATE SESSION TO DULE;
GRANT DBA TO DULE;
GRANT ROLE_ADMIN TO DULE;
ALTER USER DULE quota unlimited on DULE;

/* Habilitar rights para ejecutar cualquier script*/
DULE/123 as sysdba
CONNECT DULE/123
ALTER SESSION SET "_ORACLE_SCRIPT"=TRUE; 


/*Create tables*/

CREATE TABLE usuario (
  idUsuario NUMBER(20) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),  
	nombre VARCHAR2(100) NOT NULL,
	apellido VARCHAR2(100) NOT NULL,
	tel VARCHAR2(20) NOT NULL,
	email VARCHAR2(100) NOT NULL,
	contrasena VARCHAR2(8) NOT NULL,
	direccion VARCHAR2(255),
	tarjeta VARCHAR2(50),
	fechaVence DATE,
	idProvincia NUMBER(1) NOT NULL,
	idRol NUMBER(20) NOT NULL,
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

CREATE TABLE provincia(
	idProvincia NUMBER(1) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),
	provincia VARCHAR2(15),
	CONSTRAINT PK_provincia PRIMARY KEY (idProvincia)
);

CREATE TABLE categoria(
	idCategoria NUMBER(10) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),
	provincia VARCHAR2(50) NOT NULL,
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
