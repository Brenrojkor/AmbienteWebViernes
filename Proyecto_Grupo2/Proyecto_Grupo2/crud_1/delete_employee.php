<?php
include("db.php");

// Verificar que se haya pasado un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Asegurarse de que $id sea un número entero para prevenir inyecciones SQL
    $id = intval($id);

    // Consulta para eliminar el empleado
    $query = "DELETE FROM empleados WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Consulta fallida: " . mysqli_error($conn));
    }

    // Establecer un mensaje de éxito en la sesión
    $_SESSION['message'] = 'Empleado eliminado exitosamente';
    $_SESSION['message_type'] = 'danger';

    // Redirigir a la página principal del CRUD
    header("Location: crud.php");
    exit();
} else {
    // Si no se pasa un ID, redirigir a la página principal
    $_SESSION['message'] = 'ID no proporcionado';
    $_SESSION['message_type'] = 'danger';
    header("Location: crud.php");
    exit();
}
?>
