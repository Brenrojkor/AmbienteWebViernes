<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- FAQ CSS -->
    <link rel="stylesheet" href="css/support.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rajdhani:300,400,500,600,700');
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-orange">
        <a class="navbar-brand text-white" href="index.php">Atrás</a>
    </nav>

    <div class="container">
        <h1 class="faq-title">Soporte</h1>
        <div class="accordion" id="supportAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            ¿Cómo puedo reestablecer mi contraseña?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#supportAccordion">
                    <div class="card-body">
                        Para reestablecer su contraseña, diríjase a la página de inicio de sesión y haga clic en "Olvidé mi contraseña". Siga las instrucciones enviadas a su correo electrónico registrado.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            ¿Cómo puedo contactaer al equipo de soporte?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#supportAccordion">
                    <div class="card-body">
                        Puede contactar al equipo de soporte a través de nuestro formulario en línea o llamando al número de atención al cliente idsponible en nuestra página de contacto.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            ¿Cómo puedo actualizar mi información de perfil?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#supportAccordion">
                    <div class="card-body">
                        Para actualizar su información de perfil, inicie sesión en su cuenta, vaya a "Mi perfil" y haga los cambios necesarios. No olvide guardar los cambios.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                            ¿Qué hacer si mi cuenta ha sido bloqueada?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#supportAccordion">
                    <div class="card-body">
                        Si su cuenta ha sido bloqueada, contacte a nuestro equipo de soporte con su información de usuario para recibir asistencia. También puede intentar reestablecer su contraseña.
                    </div>
                </div>
            </div>

            <div id="supportAccordion">

            <div id="supportAccordion">
                
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive"
                        aria-expanded="false" aria-controls="collapseFive">
                        ¿Cómo puedo reportar un problemo técnico?
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#supportAccordion">
                <div class="card-body">
                    Para reportar un problema técnico, complete el formulario de reporte de problemas disponibles en la sección de soporte de nuestro sitio web o envíe un correo electrónico directamente al equipo de soporte.
                </div>
            </div>
        </div>
    </div>
</div>       

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_top">
                        <ul class="location_icon">
                            <li> <a href="#"><i class="su su-map-marker" aria-hidden="true"></i></a></li>
                            <li> <a href="#"><i class="su su-phone" aria-hidden="true"></i></a></li>
                            <li> <a href="#"><i class="su su-envelope" aria-hidden="true"></i></a></li>
                        </ul>
                        <ul class="social_icon">
                            <li> <a href="#"><i class="su su-facebook-f"></i></a></li>
                            <li> <a href="#"><i class="su su-twitter"></i></a></li>
                            <li> <a href="#"><i class="su su-instagram"></i></a></li>
                            <li> <a href="#"><i class="su su-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p>© 2024 Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>