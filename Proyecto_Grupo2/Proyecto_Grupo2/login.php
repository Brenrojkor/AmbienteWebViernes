<?php
ob_start();
// Archivo: login.php

session_start();
include 'conexion.php'; 

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar y ejecutar la consulta
    $query = "SELECT id, nombre, correo, contrasena, rol FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['contrasena'])) {
            // Establecer variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['rol'] = $row['rol'];

            // Redirigir al usuario a la página de inicio
            header('Location: index.php');
            exit(); // Asegúrate de detener la ejecución del script después de la redirección
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Correo electrónico no encontrado.";
    }

    $stmt->close();
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

    <!-- Fondo de la página de inicio de sesión -->
    <div class="login-background"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
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
