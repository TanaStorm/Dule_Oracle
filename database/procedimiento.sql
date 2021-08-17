---**************************** PROCEDURES + Cursor --- (Esteban Salas) 

--Login.php
CREATE OR REPLACE PROCEDURE p_login_DULE (V_EMAIL IN VARCHAR2, V_PASSWORD IN VARCHAR2, V_COUNT OUT NUMBER)  AS
CURSOR c_count_login IS SELECT COUNT(*) FROM USUARIO u
WHERE u.email=V_EMAIL AND u.contrasena=V_PASSWORD;
BEGIN
OPEN c_count_login;
FETCH c_count_login INTO V_COUNT;
CLOSE c_count_login;
END;


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