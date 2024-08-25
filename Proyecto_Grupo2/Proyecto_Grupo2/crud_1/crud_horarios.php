<?php
include 'db.php';

$action = $_POST['action'] ?? '';

if ($action === 'create' || $action === 'update') {
    $id = $_POST['id'] ?? null;
    $deporte_id = $_POST['deporte_id'];
    $dia_semana = $_POST['dia_semana'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $grupo_edad = $_POST['grupo_edad'];

    if ($action === 'create') {
        $stmt = $conn->prepare("INSERT INTO horarios (deporte_id, dia_semana, hora_inicio, hora_fin, grupo_edad) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $deporte_id, $dia_semana, $hora_inicio, $hora_fin, $grupo_edad);
        $stmt->execute();
        echo "Horario creado con éxito";
    } elseif ($action === 'update') {
        $stmt = $conn->prepare("UPDATE horarios SET deporte_id=?, dia_semana=?, hora_inicio=?, hora_fin=?, grupo_edad=? WHERE id=?");
        $stmt->bind_param("issssi", $deporte_id, $dia_semana, $hora_inicio, $hora_fin, $grupo_edad, $id);
        $stmt->execute();
        echo "Horario actualizado con éxito";
    }
} elseif ($action === 'delete') {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM horarios WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Horario eliminado con éxito";
} elseif ($action === 'get') {
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM horarios WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
} elseif ($action === 'load_deportes') {
    $result = $conn->query("SELECT * FROM deportes");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($action === 'load_horarios') {
    $result = $conn->query("
        SELECT horarios.*, deportes.nombre AS deporte 
        FROM horarios 
        LEFT JOIN deportes ON horarios.deporte_id = deportes.id
    ");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

$conn->close();
?>
