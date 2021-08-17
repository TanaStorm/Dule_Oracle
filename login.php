<!DOCTYPE html>
<html>
<head>
	<title>Dule - Mercado Orgánico</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
</head>
<!-- Navbar -->
<?php include_once('navbar.php'); ?>
<br>
<br>
<br>
    <!-- No remover, es necesario para localizar el username -->
	<?php include("php/showfactura.php"); ?>


<body>
<?php
	require('php/db.php');

	//include_once('php/conexion.php');

	//parent::conectar();


	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = $_POST['username']; // removes backslashes
		$password = $_POST['password'];
		$count = 0;	
	//Checking is user existing in the database or not
        $query = "BEGIN p_login_DULE('$username','$password',:count); END;";
		$result = oci_parse($connection,$query) or die(oci_error());
		oci_bind_by_name($result, ":count", $count);
		oci_execute($result);
        if($count==1){
			$_SESSION['username'] = $username;
			header("Location: shop.php"); // Redirect user to shop.php
            }else{
				echo "<br/><div class='form'><h3>El usuario o la contraseña son incorrectos</h3>
				<br/>Haga clic para intentarlo de nuevo to <a href='login.php'>Inicio de sesión</a></div>";
				}
    }else{
?>
<!-- Form -->

<section class="ftco-section">
		<!-- Si usamos "container-fluid" abarca toda la pantalla -->
		<div class="container">
			<div class="row">
				<div class="col-xl-6 ftco-animate">
					<section class="home-slider owl-carousel">
						<div class="slider-item" style="background-image: url(img/carousel/slide1.jpg);">
							<div class="overlay"></div>
							<div class="container">
								<div class="row slider-text justify-content-center align-items-center">
									<div class="col-md-8 col-sm-12 text-center ftco-animate">
										<span class="subheading">Dule</span>
										<h1 class="mb-4">PRODUCTOS Orgánicos</h1>
										<p class="mb-4 mb-md-5">Sin químicos, pesticidas, aditivos, hormonas, antibióticos o anabólicos.
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="slider-item" style="background-image: url(img/carousel/slide2.jpg);">
							<div class="overlay"></div>
							<div class="container">
								<div class="row slider-text justify-content-center align-items-center">
									<div class="col-md-8 col-sm-12 text-center ftco-animate">
										<span class="subheading">Dule</span>
										<h1 class="mb-4">PRODUCTOS Orgánicos</h1>
										<p class="mb-4 mb-md-5">Para una vida saludable</p>
									</div>
								</div>
							</div>
						</div>
						<div class="slider-item" style="background-image: url(img/carousel/slide3.jpg);">
							<div class="overlay"></div>
							<div class="container">
								<div class="row slider-text justify-content-center align-items-center">
									<div class="col-md-8 col-sm-12 text-center ftco-animate">
										<span class="subheading">Dule</span>
										<h1 class="mb-4">PRODUCTOS Orgánicos</h1>
										<p class="mb-4 mb-md-5">Sin químicos, pesticidas, aditivos, hormonas, antibióticos o anabólicos.
										</p>
									</div>
								</div>
							</div>
						</div>
					</section>
				
                

					
				</div>
				<div class="col-xl-6 ftco-animate">
				<h3 class="col-md-12 text-center">Bienvenido</h3>
                        <h6 class="col-md-12 text-center">Por favor ingrese sus credenciales</h6>

						

					<form method="post" action="" name="login" class="billing-form ftco-bg-dark p-3 p-md-5">
						
						<div class="row align-items-end">			
							
							<div class="col-md-12">
								<div class="form-group">
									<label for="emailaddress">Email</label>
									<input type="text" name="username" class="form-control" placeholder="correo@dominio.com">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label for="password">Contraseña</label>
									<input type="password" name="password" class="form-control" placeholder="">
								</div>
							</div>
							
							<div class="col-md-12 text-center">
                                <input class="btn btn-primary py-3 px-4" type="submit" name="submit" value="Iniciar sesión">
							</div>

							<div class="col-md-12 text-center">
								<br>
							<p>
							No tienes una cuenta? <a href="register.php">Registrate</a>
							</p>
							</div>


						</div>
					</form>
				</div>
				
				
				
					

					
					</div>
				</div>
			</div>
		</div>
	</section>


<br /><br />

</div>
<?php } ?>


<!-- Footer -->
<?php include_once('footer.php'); ?>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/aos.js"></script>
<!-- <script src="js/bootstrap-datepicker.js"></script> -->
<script src="js/scrollax.min.js"></script>
<script src="js/main.js"></script>
<script src="js/custom.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>


</body>
</html>
