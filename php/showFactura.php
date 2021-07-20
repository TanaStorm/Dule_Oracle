<?php

#DB Connection:
include("php/db.php");

#DB ORACLE Insert:
if (isset($_POST['agregar'])) { 
	#Primero: verifica que no existan campos vacios...
	#Segundo: Llama los datos del crud y los inserta a la base de datos
    if (strlen($_POST['cantidad']) >= 1) {	
	$id		= $_POST['id'];
	$nombre	= $_POST['nombre'];
    $precio		= $_POST['precio'];
    $cantidad   = $_POST['cantidad'];
    $total = $precio*$cantidad;
	$connection  = oci_connect($user, $password, $host);
	$sql = "INSERT INTO temp_detallefactura (IDUSUARIO, IDPRODUCTO, PRODUCTO, CANTIDAD, PRECIOUNITARIO, SUBTOTAL) VALUES ('61', '$id', '$nombre', '$cantidad', '$precio','$total')";
	$parse = oci_parse($connection, $sql);
	oci_execute($parse);
	if ($parse) {
		?> 
		<h5 style="text-align: center; background-color:#28a745; color:white">¡Compra hecha!</h5>
	   <?php
	} else {
		?> 
		<h5 style="text-align: center; background-color:#dc3545; color:white">¡Ups ha ocurrido un error!</h5>
	   <?php
	}
}   else {
		?> 
		<h5 style="text-align: center; background-color:#ffc107; color:#343a40">¡Por favor ingresa todos los datos!</h5>
	   <?php
	}

}
?>