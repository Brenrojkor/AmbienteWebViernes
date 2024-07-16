<?php
// Archivo: registro.php

session_start();
include 'conexion.php'; // Asegúrate de incluir correctamente tu archivo de conexión aquí

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta SQL para insertar el usuario
    $query = "INSERT INTO usuarios (correo, contrasena) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Error al preparar la consulta.');
    }

    $stmt->bind_param("ss", $email, $hashed_password);

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
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
    <!-- Formulario de registro -->
    <div class="container">
        <h2>Registro de Usuario</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="registro.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
