---**************************** PROCEDURES + Cursor --- (Esteban Salas) 

--Login
CREATE OR REPLACE PROCEDURE p_login_DULE (V_EMAIL IN VARCHAR2, V_PASSWORD IN VARCHAR2, V_COUNT OUT NUMBER)  AS
CURSOR c_count_login IS SELECT COUNT(*) FROM USUARIO u
WHERE u.email=V_EMAIL AND u.contrasena=V_PASSWORD;
BEGIN
OPEN c_count_login;
FETCH c_count_login INTO V_COUNT;
CLOSE c_count_login;
END;
