<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión

// Verificar si el usuario tiene permisos de administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    // Si no es admin, redirigir a otra página o mostrar un mensaje de acceso denegado
    header("Location: index.php"); // Ejemplo de redirección si no es admin
    exit; // Finalizar la ejecución del script
}

// Conexión a la base de datos (ajustar según tu configuración)
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Función para obtener y mostrar los horarios de fútbol desde la base de datos
function mostrarHorariosFutbol($conn) {
    $sql = "SELECT * FROM horarios_futbol";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Día</th>
                        <th>Horario</th>
                        <th>Grupo de Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";

        // Mostrar los datos de la tabla
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["dia_semana"]) . "</td>
                    <td>" . htmlspecialchars($row["horario"]) . "</td>
                    <td>" . htmlspecialchars($row["grupo_edad"]) . "</td>
                    <td>
                        <a href='editar_horario.php?id=" . $row["id"] . "'>Editar</a>
                        <a href='eliminar_horario.php?id=" . $row["id"] . "'>Eliminar</a>
                    </td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No se encontraron horarios.";
    }
}

// Cerrar conexión
$conn->close();
?>
