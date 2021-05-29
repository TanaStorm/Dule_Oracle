<!-- Navbar -->

<nav class="navbar navbar-expand-lg ftco-navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php" > <img src="img/dule_logo_navbar.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="shop.php" class="nav-link">Productos</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">Acerca</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contacto</a></li>
                    <li class="nav-item cart">
                        <a href="cart.php" class="nav-link"><img src="img/icons/cart.png" alt=""></span>
                            <span
                                class="bag d-flex justify-content-center align-items-center"><small>

                                <?php
                                echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);


                                
                                ?>
                                </small></span></a>
                    </li>
            </div>
            <div class="text-end">
                <button onclick="window.location.href='login.php'" type="button" class="btn btn-outline-light me-2">Ingresar</button>
                <button onclick="window.location.href='register.php'" type="button" class="btn btn-warning">Registrarme</button>
            </div>
        </div>
        </div>
    </nav>