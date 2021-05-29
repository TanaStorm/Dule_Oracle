<?php

if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['subject'])&& isset($_POST['message'])){

//Llamando a los campos
$destinatario= "allan@dule.com";
$name = $_POST['name'];
$email =$_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Datos para el correo

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <allan.chanto30@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 


//Enviando Mensaje

mail($destinatario,$subject,$message,$headers);
echo"Correo enviado";
}else{

    echo"Problemas al enviar";
}
?>