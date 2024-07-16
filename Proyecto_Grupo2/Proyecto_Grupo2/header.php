<?php
session_start(); // Iniciar sesión si aún no está iniciada

// Verificar si el usuario está logueado y obtener el rol
if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];
} else {
    $rol = 'Invitado'; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Título de la Página</title>
   
    <style>
        /* Estilos para la barra de navegación */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 10px;
        }
      
        .navbar .user-info {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="navbar">
        
        <div class="user-info">
            <?php echo "Rol actual: $rol"; ?> <!-- Mostrar el rol del usuario -->
            <a href="logout.php">Cerrar Sesión</a> <!-- Enlace para cerrar sesión -->
        </div>
    </div>
</body>
</html>
