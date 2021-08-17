

--Autor: Karen Delgado


--drop table usuario;


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

select * from usuario;

--drop table  bitacoraUsuario cascade CONSTRAINTS;

CREATE TABLE bitacoraUsuario (
    idUsuario NUMBER,
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	direccion VARCHAR2(255),
    FECHA DATE NULL,
    ACCION VARCHAR2(12) NULL
);

select * from BitacoraUsuario;


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



-----Test:
UPDATE USUARIO
SET direccion = 'Prueba'
WHERE idusuario = 1;


delete from usuario 
where idusuario = 2;



