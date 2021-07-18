/*==========================================================================
/* PROYECTO: DULE 
/* BASE DE DATOS: DULE
/* FECHA: 17/07/2021                                
/*==========================================================================
*/

CREATE TABLE usuario (
    idUsuario NUMBER(20) GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),  
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	direccion VARCHAR2(255)
);

CREATE TABLE role(
  idRol NUMBER(10),
  rol VARCHAR2(12)
);