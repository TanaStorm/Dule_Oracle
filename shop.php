<?php 
 include("php/db.php"); 
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
  <!-- <?php include("php/showFactura.php"); ?>  -->
  
  <section class="ftco-section-shop"></section>
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
   					// Create connection
					$connection  = oci_connect($user, $password, $host);					  							  													  	  
					$sql = "SELECT * FROM producto";
				$parse = oci_parse($connection, $sql);
			oci_execute($parse);	
				?>
			<?php while (oci_fetch($parse)) {?>
				<div class="col-md-3">
		
								<div class="card text-center bg-transparent border-white">
									<img class="card-img-top" src="<?php echo oci_result($parse, 'IMAGEN')?>" alt="PRODUCTO"> 
									<div class="card-body">
									  <h5 class="card-title"><?php echo oci_result($parse, 'PRODUCTO')?></h5>
									  <p><span>₡<?php echo oci_result($parse, 'PRECIOUNITARIO');?></span></p>

									 <form action="" method="post"> 
									  <input type="hidden" name="id" id="id"value="<?php echo oci_result($parse, 'IDPRODUCTO')?>">
									  <input type="hidden" name="nombre" id="nombre" value="<?php echo oci_result($parse, 'PRODUCTO')?>">
									  <input type="hidden" name="precio" id="precio"value="<?php echo oci_result($parse, 'PRECIOUNITARIO');?>">
									  <input type="number" class="form-control" name="cantidad" id="cantidad"value="<?php echo  1;?>">
									  <br>
									  <br>
									  <!-- <input class="btn btn-primary py-3 px-4" type="submit"  value="Agregar" name="agregar" id="agregar" />  -->
									  <button name ="btnAccion" 
									  value="Agregar" 
									  type="submit" 
									  class="btn btn-primary"
									  >
									  Agregar 
									</button>		
									</form>
									</div>
								  </div>				 
		
					</div>
			<?php } 		
		?>														 							                        
					</div>
				</div>
				<div class="col-xl-8 sidebar ftco-animate">		 	 	 	  
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