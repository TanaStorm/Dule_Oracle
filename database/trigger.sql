drop table usuario;


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

drop table  bitacoraUsuario cascade CONSTRAINTS;

CREATE TABLE bitacoraUsuario (
    idUsuario NUMBER,
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	direccion VARCHAR2(255)
);

select * from BitacoraUsuario;


CREATE OR REPLACE TRIGGER tr_bitacoraUsuario
AFTER DELETE ON usuario
BEGIN
insert into bitacoraUsuario  values (idUsuario,idRol,nombre,apellido,tel,email,contrasena,direccion);
--insert into tr_bitacoraUsuario  values (:old.idUsuario,:old.idRol, :old.nombre,:old.apellido,:old.tel,:old.email,:old.contrasena,:old.direccion, sysdate, 'DELETE');
END;

delete from usuario where idusuario = 21;




