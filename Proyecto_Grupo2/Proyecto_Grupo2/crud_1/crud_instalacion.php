<?php
include 'db.php'; // Incluye el archivo de conexión a la base de datos

$action = $_POST['action'] ?? '';

if ($action === 'create' || $action === 'update') {
    $id_instalacion = $_POST['id_instalacion'] ?? null;
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    if ($action === 'create') {
        $stmt = $conn->prepare("INSERT INTO instalacion (Nombre, Tipo, Capacidad) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $tipo, $capacidad);
        $stmt->execute();
        echo "Instalación creada con éxito";
    } elseif ($action === 'update') {
        $stmt = $conn->prepare("UPDATE instalacion SET Nombre=?, Tipo=?, Capacidad=? WHERE ID_Instalacion=?");
        $stmt->bind_param("ssii", $nombre, $tipo, $capacidad, $id_instalacion);
        $stmt->execute();
        echo "Instalación actualizada con éxito";
    }
} elseif ($action === 'delete') {
    $id_instalacion = $_POST['id_instalacion'];
    $stmt = $conn->prepare("DELETE FROM instalacion WHERE ID_Instalacion=?");
    $stmt->bind_param("i", $id_instalacion);
    $stmt->execute();
    echo "Instalación eliminada con éxito";
} elseif ($action === 'get') {
    $id_instalacion = $_POST['id_instalacion'];
    $stmt = $conn->prepare("SELECT * FROM instalacion WHERE ID_Instalacion=?");
    $stmt->bind_param("i", $id_instalacion);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
} elseif ($action === 'load_instalaciones') {
    $result = $conn->query("SELECT * FROM instalacion");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

$conn->close();
?>
