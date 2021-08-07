<?php include("php/permiso.php"); //se debe incluir en las paginas que requieran sesion ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dule - Mercado Orgánico</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
   <section class="ftco-section">
		<!-- Si usamos "container-fluid" abarca toda la pantalla -->

		<div class="container">
			<div class="row">
				<div class="col-xl-12 ftco-animate">
					<form action="#" class="billing-form ftco-bg-dark p-3 p-md-5" id="formulario_pago">
						<h3 class="mb-6 billing-heading">Información de pago y entrega</h3>
						<br>
						<div class="row align-items-end">
						<div class="row w-100">
							<div class="col-md-12">
								<!-- Se agrupan los elementos usando el tag "Form-Group" -->
								<div class="form-group">
									<label for="firstname">Nombre y apellidos en la tarjeta</label>
									<input type="text" class="form-control" placeholder="" name="nombre" id="nombre" >
								</div>
							</div>
							</div>
							<div class="row w-100">
							<div class="col-md-6">
								<div class="form-group">
									<label for="streetaddress">Número de Tarjeta</label>
									<input type="text" class="form-control" placeholder="" name="noTarjeta" id="noTarjeta"  >
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="vencimiento">Fecha de Vencimiento</label>
									<input type="text" class="form-control" placeholder="MM/AA" name="fechaV" id="fechaV" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="ccv">CVV</label>
									<input type="password" class="form-control" placeholder="000">
								</div>
							</div>
							</div>
							
							<div class="w-100"></div>
							<div class="col-md-12 text-center">
								<!-- <input class="btn btn-warning py-3 px-4" type="submit"  value="Registrarme" name="registro" id="registro" /> -->
								<button type="button" class="btn btn-warning py-3 px-4" name="button" id="pago" onclick="location.href='checkoutpago.php'" >Pagar</button>
							</div>

						</div>
					</form>
				</div>



				
					<!-- Sidebar -->
				<div class="col-xl-4 sidebar ftco-animate">

					

				</div>
			</div>
		</div>

	</section>


  <!-- Lista con checkbox: https://getbootstrap.com/docs/4.0/components/forms/ -->
  <section class="ftco-section ">
		<div class="container-fluid">
			<div class="row">
				
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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>