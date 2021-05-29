<?php
	require('php/db.php');

	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}

	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		debug_to_console($username);
		debug_to_console($password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `usuario` WHERE email='$username' and contraseña='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: shop.php"); // Redirect user to index.php
            }else{
				echo "<br/><div class='form'><h3>El usuario o la contraseña son incorrectos</h3>
				<br/>Haga clic para intentarlo de nuevo to <a href='login.php'>Inicio de sesión</a></div>";
				}
    }else{
?>