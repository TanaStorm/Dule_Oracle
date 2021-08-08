<?php 
 include_once('php/db.php'); 
 include 'carrito.php';?>

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
  <section class="ftco-section-shop">
  </section>
  <!-- Lista con checkbox: https://getbootstrap.com/docs/4.0/components/forms/ -->
  <section class="ftco-section ">
  <?php if($mensaje!=""){?>
	<div class="alert alert-success">
		<?php echo $mensaje;?>
		<a href="cart.php" class="badge badge-success">Ver carrito</a>
</div>
<?php }?>
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-xl-12 ftco-animate">
					<form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">                   
						<div class="row align-items-end">
			<?php						
			$servername = "localhost";
			$username = "dule";
			$password = "dule123";
			$dbname = "dule";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = "SELECT *FROM producto";
			$result = $conn->query($sql);
			$row = $result->fetch_all(MYSQLI_ASSOC);
			
			?>
			<?php foreach($row as $producto){?>
				<div class="col-md-3">
								

								<div class="card text-center bg-transparent border-white">
									<img class="card-img-top" src="<?php echo $producto['imagen'];?>" alt="aceite_coco">
									<div class="card-body">
									  <h5 class="card-title"><?php echo $producto['producto'];?></h5>
									  <p><span>₡<?php echo $producto['precioUnitario'];?></span></p>

									 <form action="" method="post"> 
									  <input type="hidden" name="id" id="id"value="<?php echo $producto['idProducto'];?>">
									  <input type="hidden" name="nombre" id="nombre" value="<?php echo  $producto['producto'];?>">
									  <input type="hidden" name="precio" id="precio"value="<?php echo $producto['precioUnitario'];?>">
									  <input type="number" class="form-control" name="cantidad" id="cantidad"value="<?php echo  1;?>">
									  <br>
									  <br>
									  <button name ="btnAccion" 
									  value="Agregar" 
									  type="submit" 
									  class="btn btn-primary"
									  >
									  Agregar 
									</button>
			</button>
			</form>
									</div>
								  </div>																									
							</div>
			<?php } ?>

					</div>
				</div>
				<div class="col-xl-4 sidebar ftco-animate">																					
					</div>
					
					<div class="sidebar-box ftco-animate">
						<h3>Frase del día</h3>
						<p>¡Dime cómo comes y te diré cómo eres!</p>
					</div>
					
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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>