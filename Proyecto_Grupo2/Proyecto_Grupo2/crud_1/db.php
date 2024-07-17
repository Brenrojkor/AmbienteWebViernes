<?php
session_start();

//Conexion para Cruds

$conn = mysqli_connect(
  '127.0.0.1', // host
  'root',       // usuario de la base de datos
  '',           // contraseña (en este caso, no hay contraseña)
  'bd_polideportivo' // nombre de la base de datos
) or die('Error de conexión: ' . mysqli_connect_error());
?>


