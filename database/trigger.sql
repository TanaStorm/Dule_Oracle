
--Autor: Karen Delgado



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


