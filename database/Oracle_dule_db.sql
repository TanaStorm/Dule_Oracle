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
	idRol NUMBER(10),
	nombre VARCHAR2(50),
	apellido VARCHAR2(50),
	tel VARCHAR2(30),
	email VARCHAR2(50),
	contrasena VARCHAR2(255),
	idProvincia NUMBER(10),
	direccion VARCHAR2(255),
	noTarjeta VARCHAR2(50),
	fechaV DATE NOT NULL
);

CREATE TABLE role(
  idRol NUMBER(10),
  rol VARCHAR2(12)
);