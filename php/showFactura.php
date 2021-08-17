<?php

#DB Connection:
include("php/db.php");

#DB ORACLE Insert:
if (isset($_POST['btnAccion'])) { 
	#Primero: verifica que no existan campos vacios...
	#Segundo: Llama los datos del crud y los inserta a la base de datos
    if (strlen($_POST['cantidad']) >= 1) {		
	#$username		= $_POST['username'];
	$id				= $_POST['id'];
	$nombre			= $_POST['nombre'];
    $precio			= $_POST['precio'];
    $cantidad   	= $_POST['cantidad'];
    $total = $precio*$cantidad;
	$connection  = oci_connect($user, $password, $host);
	$sql = "INSERT INTO temp_detallefactura (IDUSUARIO, IDPRODUCTO, PRODUCTO, CANTIDAD, PRECIOUNITARIO, SUBTOTAL) VALUES (1, '$id', '$nombre', '$cantidad', '$precio','$total')";
	$parse = oci_parse($connection, $sql);
	oci_execute($parse);


}}
?>