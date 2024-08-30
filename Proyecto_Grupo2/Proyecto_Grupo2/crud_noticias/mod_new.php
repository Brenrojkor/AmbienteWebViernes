<?php
include "db.php";

if (isset($_POST['mod_new'])) {
    $Num_Noticia = $_POST['Num_Noticia'];
    $Titulo = $_POST['Titulo'];
    $Contenido = $_POST['Contenido'];
    $Fecha = $_POST['Fecha'];
    $IdAutor = $_POST['IdAutor'];
    $IdCategoria = $_POST['IdCategoria'];
    $imagen = $_POST['Imagen'];

    // Preparar la consulta SQL para actualizar los datos
    $query = "UPDATE noticia SET Titulo = ?, Contenido = ?, Fecha = ?, IdAutor = ?, IdCategoria = ?, Imagen = ? WHERE Num_Noticia = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        echo "Consulta fallida al preparar: " . mysqli_error($conn);
    } else {
        // Enlazar los parámetros
        mysqli_stmt_bind_param($stmt, "ssssssi", $Titulo, $Contenido, $Fecha, $IdAutor, $IdCategoria, $imagen, $Num_Noticia);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = 'Noticia actualizada';
            $_SESSION['message_type'] = 'success';
            header("Location: News.php");
            exit();
        } else {
            echo "Consulta fallida al ejecutar: " . mysqli_stmt_error($stmt);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    }
}


