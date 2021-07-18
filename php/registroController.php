<?php

#DB Connection:
include("php/db.php");

#DB ORACLE Insert:
if (isset($_POST['registro'])) { 
	#Primero: verifica que no existan campos vacios...
	if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['tel']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contrasena1']) >= 1 && strlen($_POST['direccion']) >= 1) {	
	#Segundo: Llama los datos del crud y los inserta a la base de datos
	$nombre		= $_POST['nombre'];
	$apellido	= $_POST['apellido'];
    $tel		= $_POST['tel'];
	$email		= $_POST['email'];
    $contrasena1= $_POST['contrasena1'];
	$direccion	= $_POST['direccion'];

	$connection  = oci_connect($user, $password, $host);
	$sql = "INSERT INTO usuario(idrol, nombre, apellido, tel, email, contrasena, direccion) VALUES (1,'$nombre', '$apellido', '$tel', '$email', '$contrasena1','$direccion')";
	$parse = oci_parse($connection, $sql);
	oci_execute($parse);
	if ($parse) {
		?> 
		<h5 style="text-align: center; background-color:#28a745; color:white">¡Te has registrado correctamente!</h5>
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




