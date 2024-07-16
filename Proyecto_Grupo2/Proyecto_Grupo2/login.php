<?php
// Archivo: login.php

session_start();
include 'conexion.php'; // Asegúrate de incluir correctamente tu archivo de conexión aquí

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
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Correo electrónico no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
    <!-- Formulario de inicio de sesión -->
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="login.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
