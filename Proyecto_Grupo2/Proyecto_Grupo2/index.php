<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Polideportivo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="" /></div>
    </div>

    <div class="wrapper">
        <!-- end loader -->
        <div class="sidebar">
    <!-- Sidebar  -->
    <nav id="sidebar">

<div id="dismiss">
    <i class="fa fa-arrow-left"></i>
</div>

<ul class="list-unstyled components">

    <li class="active">
        <a href="index.html">Home</a>
    </li>
    
    <li>
        <a href="#matriculaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Matricula</a>
        <ul class="collapse list-unstyled" id="matriculaSubmenu">
            <li><a href="yoga.php">Yoga</a></li>
            <li><a href="natacion.php">Natación</a></li>
            <li><a href="futbol.php">Futbol</a></li>
            <li><a href="pingpong.php">Ping Pong</a></li>
            <li><a href="tenis.php">Tenis</a></li>
            <li><a href="basketball.php">Basketball</a></li>
        </ul>
    </li>

    <li>
        <a href="crud_noticias/News.php">Noticias</a>
    </li>

    <li>
        <a href="#eventosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventos</a>
        <ul class="collapse list-unstyled" id="eventosSubmenu">
            <li><a href="calendario.php">Calendario</a></li>
            <li><a href="Actividades.php">Actividades</a></li>
        </ul>
    </li>

    <li>
        <a href="#contactoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contacto</a>
        <ul class="collapse list-unstyled" id="contactoSubmenu">
            <li><a href="soporte.php">Soporte</a></li>
            <li><a href="faq.php">Preguntas frecuentes</a></li>
        </ul>
    </li>

    <li>
        <a href="#credencialesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Login</a>
        <ul class="collapse list-unstyled" id="credencialesSubmenu">
            <li><a href="login.php">Login</a></li>
            <li><a href="registro.php">Register</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </li>

    <?php if ($rol == 'admin') { ?>
        <li>
            <a href="#AdminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin</a>
            <ul class="collapse list-unstyled" id="AdminSubmenu">
                <li><a href="crud_1/crud.php">Empleados</a></li>
                <li><a href="crud_1/crud_horarios_front.php">Horarios</a></li>
                <li><a href="crud_1/crud_instalacion_front.php">Instalaciones</a></li>
                <li><a href="crud_1/crud_actividades_front.php">Actividades</a></li>
            </ul>
        </li>
    <?php } ?>

</ul>

</nav>
</div>


        

        <div id="content">
            <!-- header -->
            <header>
                <div class="container">
                    <div class="row bor_bottom">
                        <div class="col-md-3">
                            <div class="full">
                                <a class="logo" href="index.html"><img src="images/logo.jpg" alt="#" /></a>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <ul class="social_top_icon">
                                <li> <a href="https://www.facebook.com/pages/Polideportivo-Santo-Domingo/221359424559175"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                            <div class="full">
                                <div class="right_header_info">
                                    <ul>
                                        <li>
                                            <button type="button" id="sidebarCollapse">
                                                <img src="images/menu_icon.png" alt="#">
                                            </button>
                                        </li>
                                        <li><img style="margin-right: 15px;" src="images/search_icon.png" alt="#"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end header -->
            <!-- start slider section -->
            <div class="slider_section banner_main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main_text">
                            <?php echo '<h1>Bienvenidos <br><strong class="bold_text">Polideportivo</strong><br><strong class="bold_text_black">Santo Domingo</strong></h1>'; ?>
                                <span>Polideportivo de Santo Domingo donde podrás encontrar los horarios de nuestras actividades e inscribirte a nuestras clases disponibles.</span>
                                <a href="#">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end slider section -->

            <!-- six_box-->
            <div class="container">
                <div class="six_box">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 pppp">
                            <div class="black_box">
                                <h3>Yoga</h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 pppp">
                            <div class="black_box yellow_box">
                                <h3>Natación</h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 pppp">
                            <div class="black_box">
                                <h3>Fútbol</h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 pppp">
                            <div class="black_box yellow_box">
                                <h3>Ping Pong</h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 pppp">
                            <div class="black_box">
                                <h3>Tennis</h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 pppp">
                            <div class="black_box yellow_box">
                                <h3>Basketball</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end six_box-->

            <!-- about -->
            <div id="about" class="about">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="about_img">
                                <figure><img src="images/about-img.jpg" alt="#" /></figure>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 pa-ing">
                            <div class="about_text">
                                <div class="about_text_box">
                                    <h2>¿Cómo Llegar?<br><strong class="black_white"> Polideportivo Santo Domingo</strong></h2>
                                    <p>Polideportivo Santo Domingo es una instalación deportiva en Provincia de Heredia, Costa Rica ubicado en Avenida 15. Polideportivo Santo Domingo está situada cerca de la pista de juego Club de Tiro con Arco X10 y de la instalación deportiva Academia de Karate.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end about -->

            <!-- training -->
            <div id="training" class="training">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">

                                <h2>Eventos<strong class="black">Especiales</strong></h2>
                            </div>
                        </div>
                    </div>
                    <div class="training_packages_bg">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="training_packages_box">
                                    <h3>Clase de Yoga</h3><br>
                                    <h3>10am-11am</h3>
                                    <span>₡<strong class="white_bold">500</strong></span>
                                    <p>Martes</p>
                                    <a class="BookNow" href="yoga.php">Más</a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="training_packages_box">
                                    <h3>Clase de tenis</h3><br>
                                    <h3>5pm-7pm</h3>
                                    <span>₡<strong class="white_bold">1000</strong></span>
                                    <p>Viernes</p>
                                    <a class="BookNow" href="tenis.php">Más</a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="training_packages_box">
                                    <h3>Fútbol para niños</h3><br>
                                    <h3>8am-10am</h3>
                                    <span><strong class="white_bold">FREE</strong></span>
                                    <p>Jueves</p>
                                    <a class="BookNow" href="futbol.php">Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end training -->

            <!-- Gallery -->
            <div id="gallery" class="Gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>Nuestra <br><strong class="black"> Galería</strong></h2>
                                <span>Estas son algunas fotos de algunas de nuestras actividades</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 mar_bottom">
                                    <div class="Gallery_box">
                                        <figure><img src="images/ballet.jpg" alt="#" /></figure>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="Gallery_box">
                                        <figure><img src="images/basket.jpg" alt="#" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mar_bottom">
                                    <div class="Gallery_box">
                                        <figure><img src="images/Pingpong.jpg" alt="#" /></figure>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mar_bottom">
                                    <div class="Gallery_box">
                                        <figure><img src="images/yoga.jpg" alt="#" /></figure>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="Gallery_box">
                                        <figure><img src="images/zumba.jpg" alt="#" /></figure>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="Gallery_box">
                                        <figure><img src="images/Natacion.jpeg" alt="#" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Gallery -->

            <!-- Reviwe -->
            <div id="review" class="Reviwe">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>COACH</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="Reviwe_box">
                                <i><img src="images/coach.jpg" alt="#"/></i>
                                <h3>Jessica</h3>
                                <p>Entrenadora de futbol y basketball
                                    <br>También es la profesora de ballet</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Reviwe -->

            <!-- footer -->
            <div id="contact" class="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>Nuestro<strong class="black"> Contacto</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid padddd">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 padddd">
                    <div class="map_section">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                    <form class="main_form">
                                        <div class="row">

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Name" type="text" name="Name">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Email" type="text" name="Email">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input class="form-control" placeholder="Phone" type="text" name="Phone">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <button class="send">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="map">
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <footer>
            <div class="footer">
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <p>© 2024 Polideportivo Santo Domingo Copyright</a></p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <ul class="social_icon">
                                    <li> <a href="https://www.facebook.com/pages/Polideportivo-Santo-Domingo/221359424559175"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
    </div>
    </div>
    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script>
       
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {
                    lat: 40.645037,
                    lng: -73.880224
                },
            });

            var image = 'images/maps-and-flags.png';
            var beachMarker = new google.maps.Marker({
                position: {
                    lat: 40.645037,
                    lng: -73.880224
                },
                map: map,
                icon: image
            });
        }
    </script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->

</body>

</html>