/*==========================================================================
/* PROYECTO: DULE 
/* BASE DE DATOS: DULE
/* FECHA: 17/07/2021                                
/*==========================================================================

/*Create tables*/

CREATE TABLE usuario (
    idUsuario NUMBER GENERATED ALWAYS AS IDENTITY,
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	direccion VARCHAR2(255),
	CONSTRAINT PK_usuario PRIMARY KEY (idUsuario)
);

-------------------------------------------------------------
CREATE TABLE rol(
  idRol NUMBER GENERATED ALWAYS AS IDENTITY,
  rol VARCHAR2(20) NOT NULL,
  CONSTRAINT PK_rol PRIMARY KEY (idRol)
);

BEGIN 
INSERT INTO ROL (rol) VALUES ( 'Cliente');
INSERT INTO ROL (rol) VALUES ( 'Administrador');
END;

--------------------------------------------------------------

CREATE TABLE categoria(
	idCategoria NUMBER GENERATED ALWAYS AS IDENTITY,
	categoria VARCHAR2(50) NOT NULL,
	CONSTRAINT PK_categoria PRIMARY KEY (idCategoria)
);

BEGIN 
INSERT INTO CATEGORIA (categoria) VALUES ( 'Abarrotes');
INSERT INTO CATEGORIA (categoria) VALUES ( 'Carnes y mariscos');
INSERT INTO CATEGORIA (categoria) VALUES ( 'Cuidado personal');
INSERT INTO CATEGORIA (categoria) VALUES ( 'Frutas y Verduras');
INSERT INTO CATEGORIA (categoria) VALUES ( 'Lacteos y embutidos');
INSERT INTO CATEGORIA (categoria) VALUES ( 'Limpieza');
INSERT INTO CATEGORIA (categoria) VALUES ( 'Mascotas');
END;

-----------------------------------------------------------------

CREATE TABLE producto(
	idProducto NUMBER GENERATED ALWAYS AS IDENTITY,
	producto VARCHAR2(100) NOT NULL,
	precioUnitario NUMBER(10,2) NOT NULL,
	existencias NUMBER (20) NOT NULL,
	imagen VARCHAR2(200) NULL,
	idCategoria NUMBER(10) NULL,
	CONSTRAINT PK_producto PRIMARY KEY (idProducto)
);

BEGIN
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Café Tamarindo', 2000, 100, './img/products/tamarindo-coffee-roasters-organic.jpg', 1);
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Curitas', 6000, 5, './img/products/carbon_banditas.jpg',6);
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Exfoliante', 10000, 6, './img/products/carbon_body_scrub.jpg',3 );
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Pasta Dental', 10000, 6, './img/products/carbon_dental.jpeg',3 );
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Carbón en polvo', 10000, 6, './img/products/carbon_polvo.jpg',1 );
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Tapa de dulce', 10000, 6, './img/products/dulce-tapa.jpeg',1 );
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Mantequilla Aloe', 30000, 6, './img/products/aloe_butter.jpg',1 );
INSERT INTO PRODUCTO (producto, precioUnitario, existencias, imagen, idCategoria) VALUES ('Gel Aloe', 3000, 6, './img/products/aloe_gel.jpg',3 );
END;
--URGENT: SIN EL COMMIT NO SE CARGAN LAS IMAGENES
commit;


CREATE TABLE temp_detalleFactura(
	idUsuario NUMBER(20) NOT NULL,
	idProducto NUMBER(10) NOT NULL,
	producto VARCHAR2(100) NOT NULL,
	cantidad NUMBER(20) NOT NULL,
	precioUnitario NUMBER (10,2) NOT NULL,
	subTotal NUMBER (10,2) NOT NULL,
    fecha DATE default systimestamp
);

CREATE TABLE temp_factura(
	idUsuario NUMBER(20) NOT NULL,
	subTotal NUMBER (10,2) NOT NULL,
	iva NUMBER (10,2) NOT NULL,
	total NUMBER (10,2) NOT NULL,
	fecha DATE default systimestamp
);

-----------------------------------------------------

CREATE TABLE factura(
	idUsuario NUMBER(20) NOT NULL,
	total NUMBER (10,2) NOT NULL,
	fechaVenta DATE default systimestamp
);

--INSERT INTO factura2 VALUES (2,default);

--BitacoraUsuarios 
CREATE TABLE bitacoraUsuario (
    idUsuario NUMBER,
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	direccion VARCHAR2(255),
    fecha DATE NULL,
    ACCION VARCHAR2(12) NULL
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


---**************************** 2 FUNCIONES (Luis Navarro)

--1. Calculo de Precio de producto x la cantidad. (Modificar codigo en cart.php)
CREATE OR REPLACE FUNCTION sumaTotal  
RETURN number IS  
   total number:= 0;  
BEGIN  
   SELECT sum(cantidad*preciounitario) into total  
   FROM temp_detallefactura;  
    RETURN total;  
END;  

--2. Suma total de los productos (Modificar codigo en cart.php)
CREATE OR REPLACE FUNCTION totalMonto
RETURN number IS  
   total number(2);  
begin

for c in (SELECT cantidad*preciounitario into total  
   FROM temp_detallefactura)

loop
    RETURN total;  
end loop;
END;  



---**************************** Trigger + Exception (Karen Delgado)
--DELETE or UPDATE USERS

CREATE OR REPLACE TRIGGER tr_bitacoraUsuario
AFTER UPDATE OR DELETE ON USUARIO
FOR EACH ROW
BEGIN
if updating then
insert into bitacoraUsuario  values (:old.idUsuario,:new.idRol, :new.nombre,:new.apellido,:new.tel,:old.email,:old.contrasena,:old.direccion, sysdate, 'UPDATE');
Elsif deleting then
insert into bitacoraUsuario  values (:old.idUsuario,:old.idRol, :old.nombre,:old.apellido,:old.tel,:old.email,:old.contrasena,:old.direccion, sysdate, 'DELETE');
end if;	
EXCEPTION
	WHEN NO_DATA_FOUND THEN
	dbms_output.put_line('No se encontró ningún usuario con ese ID en la tabla USUARIO');
END tr_bitacoraUsuario;


CREATE OR REPLACE TRIGGER tr_tempfactura
BEFORE INSERT ON TEMP_DETALLEFACTURA
FOR EACH ROW
BEGIN
insert into TEMP_FACTURA  values (:new.idUsuario,:new.SubTotal,:new.SubTotal*0.13,:new.SubTotal*0.13 + :new.SubTotal, sysdate);
END tr_tempfactura;



CREATE OR REPLACE TRIGGER tr_factura
BEFORE INSERT ON TEMP_FACTURA
FOR EACH ROW
BEGIN
insert into FACTURA  values (:new.idUsuario,:new.SubTotal, sysdate);
END tr_factura;

--********************Procedimiento Registro de Usuarios (Karen Delgado)
--registroController.php
CREATE OR REPLACE PROCEDURE p_registroUsuario(
    idUsuario IN NUMBER DEFAULT NULL,
    idRol IN NUMBER,
	nombre IN VARCHAR2,
	apellido IN VARCHAR2,
	tel IN VARCHAR2,
	email IN VARCHAR2,
	contrasena IN VARCHAR2,
	direccion IN VARCHAR2
) AS 
BEGIN
  INSERT INTO USUARIO VALUES (default,idRol, nombre, apellido,tel, email,contrasena,direccion);
END p_registroUsuario;

---**************************** PROCEDURES + Cursor (Esteban Salas) 

--Login.php
CREATE OR REPLACE PROCEDURE p_login_DULE (V_EMAIL IN VARCHAR2, V_PASSWORD IN VARCHAR2, V_COUNT OUT NUMBER)  AS
CURSOR c_count_login IS SELECT COUNT(*) FROM USUARIO u
WHERE u.email=V_EMAIL AND u.contrasena=V_PASSWORD;
BEGIN
OPEN c_count_login;
FETCH c_count_login INTO V_COUNT;
CLOSE c_count_login;
END;


