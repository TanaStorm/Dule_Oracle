<?php

#DB Connection:
include("php/db.php");

#DB ORACLE Insert:
if (isset($_POST['btnPagar'])) { 

	$total  	= $_POST['total'];
	$connection  = oci_connect($user, $password, $host);
	$sql = "INSERT INTO FACTURA (IDUSUARIO,TOTAL) VALUES (1,'$total')";
	$parse = oci_parse($connection, $sql);
	oci_execute($parse);

}
?>