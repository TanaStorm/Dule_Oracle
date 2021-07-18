<!DOCTYPE html>
<html lang="en">
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

<body>
	<!-- Navbar -->
	<?php include_once('navbar.php'); ?>
	
<br>
<br>
<br>
<br>
<br>
		<!-- registro usuario -->
		<?php include("php/registroController.php"); ?>


	<!-- Carousel -->
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

	<!-- Form -->
	</div>
				<div class="col-xl-6 ftco-animate">
				<h3 class="col-md-12 text-center">Registro</h3>
                        <h6 class="col-md-12 text-center">Por favor ingrese sus datos</h6>

						

					<form method="post" action="" name="login" class="billing-form ftco-bg-dark p-3 p-md-5">
						
						<div class="row align-items-end">			

							<div class="col-md-6">
								<!-- Se agrupan los elementos usando el tag "Form-Group" -->
								<div class="form-group">
									<label for="firstname">Nombre</label>
									<input type="text" class="form-control" placeholder="" name="nombre" id="nombre" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastname">Apellidos</label>
									<input type="text" class="form-control" placeholder="" name="apellido" id="apellido" >
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Teléfono</label>
									<input type="tel" pattern="[0-9]{4}-[0-9]{4}" class="form-control" placeholder="xxxx-xxxx" name="tel" id="tel" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">Email</label>
									<input type="email" class="form-control" autocomplete="off" placeholder="user@domain.com" name="email" id="email" >
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="password">Contraseña</label>
									<input type="password" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}" autocomplete="off" class="form-control" placeholder="5 caracteres (abc y #)" name="contrasena1" id="contrasena1" >
								</div>
							</div>
							<!-- <div class="col-md-6">
								<div class="form-group">
									<label for="provincia">Provincia</label>
									<select class="form-control" >
									  <option selected>Seleccionar Provincia</option>
									  <option value="1">Alajuela</option>
									  <option value="2">Cartago</option>
									  <option value="3">Guanacaste</option>
									  <option value="4">Heredia</option>
									  <option value="5">Limón</option>
									  <option value="6">Puntarenas</option>
									  <option value="7">San José</option>
									</select>
								  </div>
							</div> -->

							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="streetaddress">Dirección</label>
									<input type="text" class="form-control" placeholder="" name="direccion" id="direccion" >
								</div>
							</div>

							<div class="w-100"></div>
							<div class="col-md-12 text-center">
								 <input class="btn btn-primary py-3 px-4" type="submit"  value="Registrarme" name="registro" id="registro" /> 
								
							</div>

							<div class="col-md-12 text-center">
							<br>
							<p>
							Ya tienes cuenta? <a href="login.php">Ingresar</a>
							</p>
							</div>
						</div>
					</form>
				</div>					
			</div>
		</div>
	</section>


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