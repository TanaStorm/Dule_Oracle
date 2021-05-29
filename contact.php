<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dule - Mercado Orgánico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/mail.js"></script>
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
        <div class="slider-item" style="background-image: url(img/carousel/slide4.jpg);" data-stellar-background-ratio="0.3">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Contacto</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form -->

    <section class="ftco-section contact-section">
        <div class="container mt-5">
            <div class="row block-9">
                <div class="col-md-4 contact-info ftco-animate">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h2 class="h4">Información de Contacto</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Dirección:</span> Calle Principal, Calle Los Alemanes, Bello Horizonte De, San José, Escazú</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Phone:</span> <a href="#">+506 3902 0000</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Email:</span> <a href="#">info@dule.com</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Website:</span> <a href="#">www.dule.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="email" type="text" name="email" class="form-control" placeholder="Email"required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="subject" type="text" name="subject" class="form-control" placeholder="Asunto" required>
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Mensaje" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enviar" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                    <div id="info"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/mail.js"></script>
    </section>

    <!-- Google Map -->
    <div >
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7860.164035630194!2d-84.1236206889153!3d9.92712736796409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0fcbcef0b0847%3A0xd7093de771e58c67!2sCondominio%20Alto%20Prado!5e0!3m2!1ses!2scr!4v1619847686910!5m2!1ses!2scr" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

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
    
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

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