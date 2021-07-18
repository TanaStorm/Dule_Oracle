<?php

include("php/db.php");


if (isset($_POST['registro'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['tel']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contrasena1']) >= 1 && strlen($_POST['direccion']) >= 1) {
	    $nombre = trim($_POST['nombre']);
	    $apellido = trim($_POST['apellido']);
         $tel = trim($_POST['tel']);
	    $email = trim($_POST['email']);
         $contrasena1 = trim($_POST['contrasena1']);
	    $direccion = trim($_POST['direccion']);
	//     $fechareg = date("d/m/y");
	    $consulta = "INSERT INTO usuario(idRol, nombre, apellido, tel, email, contrasena, direccion) VALUES (1,'$nombre', '$apellido', '$tel', '$email', '$contrasena1','$direccion')";
		//$consulta = "INSERT INTO usuario(idRol, nombre, apellido, tel, email, contrasena, direccion) VALUES (1,'$nombre', '$apellido', '$tel', '$email', MD5('$contrasena1'),'$direccion')";
	    $resultado = mysqli_query($con,$consulta);
	    if ($resultado) {
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
	    	<h5 style="text-align: center; background-color:#ffc107; color:#343a40">¡Por favor completa los campos!</h5>
           <?php
    }
}

?>




