<?php include_once('php/db.php'); 
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
</head>

<body>

    <!-- Navbar -->
    <?php include_once('navbar.php'); ?>
    

    <!-- Carousel -->

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(img/carousel/slide4.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Carrito</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Detalle y Factura -->
    <section class="ftco-section ftco-cart">
    <?php
    if(!empty($_SESSION['CARRITO'])){


    
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary bg-warning">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
<?php $total=0;?>
                            <?php foreach($_SESSION['CARRITO'] as $indice=>$productos){?>

                            <tbody>
                                <tr class="text-center">
                                    
                                    
                                    <td class="product-name">
                                        <h3><?php echo $productos['NOMBRE']?></h3>
                                        
                                    </td>
                                    <td class="price">₡<?php echo $productos['PRECIO']?></td>
                                    <td class="quantity">
                                        
                                    <h3><?php echo $productos['CANTIDAD']?></h3>
                                        
                                    </td>
                                    <td class="total"><?php echo number_format($productos['PRECIO']*$productos['CANTIDAD'],2);?></td>
<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $productos['ID'];?>">
<td width="5%"><button 
class="btn btn-danger" 
type="submit"
name="btnAccion"
value="Eliminar"
>Eliminar</td>

</form>                                   
                                </tr>


                                
                            </tbody>
                            <?php $total=$total+$productos['PRECIO']*$productos['CANTIDAD']?>
<?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Factura</h3>
                        
                        <hr>
                        <td colspan="3" class="d-flex total-price">
                            <span>Total</span>
                            <span>₡<?php echo number_format($total,2);?></span>
                        </p>
                    </div>
                    <p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Pagar</a></p>
                </div>
            </div>
        </div>

        <?php }else{?>
<div class="alert alert-success">
    No hay productos en el carrito
<?php } ?>
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