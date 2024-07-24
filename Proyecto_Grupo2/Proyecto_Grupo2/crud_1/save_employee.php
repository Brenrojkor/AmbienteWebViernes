<?php
include("db.php");

if (isset($_POST['save_employee'])) {
    $nombre_empleado = $_POST['nombre_empleado'];
    $rol = $_POST['rol'];
    $cedula = $_POST['cedula'];
    $salario = $_POST['salario'];

    $query = "INSERT INTO empleados (nombre_empleado, rol, cedula, salario) VALUES ('$nombre_empleado', '$rol', '$cedula', '$salario')";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Consulta fallida.");
    }

    $_SESSION['message'] = 'Empleado guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: crud.php");
}
?>