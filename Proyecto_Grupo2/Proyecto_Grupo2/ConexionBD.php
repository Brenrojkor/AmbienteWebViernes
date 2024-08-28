<?php
$servername = "localhost"; // Dirección del servidor de base de datos
$username = "root"; // Nombre de usuario por defecto de MySQL
$password = "XC7G_5S7W"; // Contraseña por defecto (vacía para XAMPP)
$dbname = "bd_polideportivo"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos";
?>