<?php
include 'header.php'; // Incluir el encabezado de la página
include 'send_email.php'; // Incluir el archivo que contiene la función para enviar emails

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida y envía el formulario usando la función
    $resultado = enviarFormulario($_POST, $_FILES);

    if ($resultado) {
        echo '<div class="alert alert-success" role="alert">Formulario enviado con éxito.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Hubo un problema al enviar el formulario.</div>';
    }
}
?>
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
    <title>Futbol</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!--style tema -->
    <link rel=" stylesheet"  href="css/style_pingpong.css">

    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rajdhani:300,400,500,600,700');
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
    </style>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="" /></div>
    </div>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>
                <ul class="list-unstyled components">
                    <!-- ... (el contenido del sidebar) ... -->
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <div id="content">
            <!-- header -->
            <header>
                <div class="container">
                    <div class="row bor_bottom">
                        <div class="col-md-3">
                            <div class="full">
                                <a class="logo" href="index.php"><img src="images/logo.jpg" alt="#" /></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <ul class="social_top_icon">
                                <li><a href="https://www.facebook.com/pages/Polideportivo-Santo-Domingo/221359424559175"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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


            <div class="slider_section banner_main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main_text">
                            <?php echo '<h1>Academia <br><strong class="bold_text">Futbol</strong><br><strong class="bold_text_black">Santo Domingo</strong></h1>'; ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- article -->
            <article class="pingpong">
                <!-- Carrusel de fotos de la academia -->
                <div id="pingpongCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/Pingpong1.jpg" alt="Primera foto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/Pingpong2.webp" alt="Segunda foto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/Pingpong3.jpg" alt="Tercera foto">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#pingpongCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#pingpongCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>


            <!-- Resumen de la academia -->
            <div class="resumen-academia">
                <p>
                    La academia de ping pong Santo Domingo se dedica a formar jóvenes talentos en el deporte de mesa, ofreciendo un entorno seguro y motivador donde los niños y adolescentes pueden desarrollar sus habilidades con la raqueta. Con entrenadores altamente calificados y una metodología de enseñanza moderna, garantizamos el crecimiento tanto personal como deportivo de nuestros estudiantes.
                </p>
                <p>
                    Nuestras instalaciones están equipadas con todo lo necesario para la práctica del ping pong, incluyendo salas techadas grandes con mesas mesas para el deporte, vestuarios, y áreas de descanso. Además, organizamos torneos y actividades complementarias para fomentar la hagilidad de manejo de raqueta y pelota de forma indvidual o en equipo y la competencia sana entre los participantes.
                </p>
            </div>

            <!-- Tabla de horarios -->
            <div class="tabla-horarios">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Horario</th>
                            <th>Grupo de edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lunes</td>
                            <td>09:00 - 12:00</td>
                            <td>6 - 10 años</td>
                        </tr>
                        <tr>
                            <td>Miércoles</td>
                            <td>14:00 - 17:00</td>
                            <td>11 - 15 años</td>
                        </tr>
                        <tr>
                            <td>Viernes</td>
                            <td>17:00 - 20:00</td>
                            <td>16 - 18 años</td>
                        </tr>
                        <tr>
                            <td>Sábado</td>
                            <td>10:00 - 13:00</td>
                            <td>Todos los grupos</td>
                        </tr>
                    </tbody>
                </table>
            </div>

              <!-- Formulario de matrícula -->
              <div class="formulario-matricula">
                    <h3>Formulario de matrícula</h3>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="deporte">Deporte Interesado</label>
                            <input type="text" class="form-control" id="deporte" name="deporte" required>
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad del interesado</label>
                            <input type="number" class="form-control" id="edad" name="edad" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="documento">Dictamen Médico</label>
                            <input type="file" class="form-control-file" id="documento" name="documento" accept=".pdf">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </article>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_top">
                            <ul class="location_icon">
                                <li> <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
                                <li> <a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                <li> <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                            </ul>
                            <ul class="social_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p>© 2024 Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- end footer -->
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
