<?php

session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

switch($_POST['btnAccion']){
case'Agregar':

if(is_numeric($_POST['id'])){
$ID=($_POST['id']);
$mensaje.="Ok ID correcto".$ID;

}else{

    $mensaje.="Upps ID incorrecto".$ID;
}

if(is_string($_POST['nombre'])){

    $NOMBRE=($_POST['nombre']);
    $mensaje.="OK nombre".$NOMBRE;

}else{
$mensaje.="Upps.. algo salio mal";break;

}
if(is_string($_POST['cantidad'])){

    $CANTIDAD=($_POST['cantidad']);
    $mensaje.="OK cantidad".$CANTIDAD;
}else{
$mensaje.="Upps.. algo salio mal";break;

}
if(is_string($_POST['precio'])){

    $PRECIO=($_POST['precio']);
$mensaje.="OK precio".$PRECIO;
}else{
$mensaje.="Upps.. algo salio mal";break;

}


if(!isset($_SESSION['CARRITO'])){

    $productos=array(

'ID'=>$ID,
'NOMBRE'=>$NOMBRE,
'CANTIDAD'=>$CANTIDAD,
'PRECIO'=>$PRECIO


    );
    $_SESSION['CARRITO'][0]=$productos;
}else{

    $NumeroProductos=count($_SESSION['CARRITO']);
    $productos=array(

        'ID'=>$ID,
        'NOMBRE'=>$NOMBRE,
        'CANTIDAD'=>$CANTIDAD,
        'PRECIO'=>$PRECIO
    );
    $_SESSION['CARRITO'][$NumeroProductos]=$productos;
}

//$mensaje=print_r($_SESSION,true);
$mensaje="Producto agregado al carrito";


    break;

    case "Eliminar":
        if(is_numeric($_POST['id'])){
            $ID=($_POST['id']);
            foreach ($_SESSION['CARRITO']as $indice=>$productos){
if($productos['ID']==$ID){
    unset($_SESSION['CARRITO'][$indice]);
    


}

            }
            
            }else{
            
                $mensaje.="Upps ID incorrecto".$ID;
            }
        break;

}
}
?>