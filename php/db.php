<?php
#Connection to Oracle - DULE database
$connection = oci_connect('dule', 'dule123', 'localhost/XE')
or die(oci_error());
if(!$connection){
	echo "Failed to connect to Oracle Dule database. Verify the connection string in php/db.php";
}else{
	//echo "Connection String ready!";
}
//close conneciton
oci_close ($connection);
  
?>


