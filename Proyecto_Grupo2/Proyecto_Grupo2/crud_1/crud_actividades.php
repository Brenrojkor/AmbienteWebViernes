<?php
include 'db.php'; // Incluye el archivo de conexión a la base de datos

$action = $_POST['action'] ?? '';

if ($action === 'create' || $action === 'update') {
    $num_activ = $_POST['num_activ'] ?? null;
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $instructor = $_POST['instructor'];
    $horario = $_POST['horario'];
    $capacidad = $_POST['capacidad'];
    $instalacion = $_POST['instalacion'];
    $precio = $_POST['precio'];

    if ($action === 'create') {
        $stmt = $conn->prepare("INSERT INTO actividades (Nombre, Descripcion, Instructor, Horario, Capacidad, Instalacion, Precio) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiiid", $nombre, $descripcion, $instructor, $horario, $capacidad, $instalacion, $precio);
        $stmt->execute();
        echo "Actividad creada con éxito";
    } elseif ($action === 'update') {
        $stmt = $conn->prepare("UPDATE actividades SET Nombre=?, Descripcion=?, Instructor=?, Horario=?, Capacidad=?, Instalacion=?, Precio=? WHERE Num_Activ=?");
        $stmt->bind_param("sssiiidi", $nombre, $descripcion, $instructor, $horario, $capacidad, $instalacion, $precio, $num_activ);
        $stmt->execute();
        echo "Actividad actualizada con éxito";
    }
} elseif ($action === 'delete') {
    $num_activ = $_POST['num_activ'];
    $stmt = $conn->prepare("DELETE FROM actividades WHERE Num_Activ=?");
    $stmt->bind_param("i", $num_activ);
    $stmt->execute();
    echo "Actividad eliminada con éxito";
} elseif ($action === 'get') {
    $num_activ = $_POST['num_activ'];
    $stmt = $conn->prepare("SELECT * FROM actividades WHERE Num_Activ=?");
    $stmt->bind_param("i", $num_activ);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
} elseif ($action === 'load_instalaciones') {
    $result = $conn->query("SELECT * FROM instalacion");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($action === 'load_horarios') {
    $result = $conn->query("SELECT * FROM horarios");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($action === 'load_actividades') {
    $result = $conn->query("
        SELECT actividades.*, instalacion.Nombre AS instalacion_nombre, horarios.dia_semana 
        FROM actividades 
        LEFT JOIN instalacion ON actividades.Instalacion = instalacion.ID_Instalacion 
        LEFT JOIN horarios ON actividades.Horario = horarios.id
    ");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

$conn->close();
?>
