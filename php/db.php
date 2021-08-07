<?php
#Connection to Oracle - DULE database
$user = "dule";
$password = "dule123";
$host = "localhost/XE";

$connection = oci_connect($user, $password, $host)
or die(oci_error());
if(!$connection){
	echo "Failed: Verify the connection string in db.php";
}else{
	//echo "CONNECTED";
}
//oci_close ($connection);
?>


