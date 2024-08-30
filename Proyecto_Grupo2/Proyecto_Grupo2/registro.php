<?php
// Archivo: registro.php

session_start();
include 'conexion.php'; 

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre']; // Añadimos el nombre
    $rol = 'cliente'; // Añadimos el rol por defecto

    // Encriptar la contraseña
    $contrasena_encriptada = password_hash($password, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta SQL para insertar el usuario
    $query = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $conn->error);
    }

    $stmt->bind_param("ssss", $nombre, $email, $contrasena_encriptada, $rol);

    if ($stmt->execute()) {
        // Éxito al registrar usuario
        $_SESSION['success_message'] = "Usuario registrado correctamente.";
        header('Location: login.php');
        exit();
    } else {
        // Error al registrar usuario
        $error = "Error al registrar usuario: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <!-- Incluir Bootstrap desde una CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluir el archivo de estilos personalizado -->
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="javascript:history.back()">
            <button class="btn btn-secondary">Volver</button>
        </a>
    </nav>

    <!-- Fondo de la página de registro -->
    <div class="login-background"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4">Registro de Usuario</h2>
                        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                        <form action="registro.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
