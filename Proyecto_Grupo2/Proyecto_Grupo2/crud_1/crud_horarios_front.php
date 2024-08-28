<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Horarios</title>
    <!-- Importar Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importar archivo CSS personalizado -->
    <link rel="stylesheet" href="../css/style_horarios.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
      <div class="container">
      <a href="../" class="btn btn-secondary">Volver</a>
      </div>
    </nav>



    <div class="container mt-4">
        <h1 class="mb-4">Horarios</h1>

        <!-- Formulario -->
        <form id="horario-form" class="mb-4">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
                <label for="deporte_id">Deporte:</label>
                <select id="deporte_id" name="deporte_id" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="dia_semana">Día de la Semana:</label>
                <select id="dia_semana" name="dia_semana" class="form-control">
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de Inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" class="form-control">
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de Fin:</label>
                <input type="time" id="hora_fin" name="hora_fin" class="form-control">
            </div>
            <div class="form-group">
                <label for="grupo_edad">Grupo de Edad:</label>
                <input type="text" id="grupo_edad" name="grupo_edad" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <!-- Tabla de Horarios -->
        <h2>Lista de Horarios</h2>
        <table id="horarios-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Deporte</th>
                    <th>Día</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Grupo Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            loadDeportes();
            loadHorarios();

            $('#horario-form').submit(function(event) {
                event.preventDefault();
                const id = $('#id').val();
                const action = id ? 'update' : 'create';
                $.ajax({
                    url: 'crud_horarios.php',
                    type: 'POST',
                    data: $(this).serialize() + '&action=' + action,
                    success: function(response) {
                        alert(response);
                        loadHorarios();
                        $('#horario-form')[0].reset();
                    }
                });
            });

            $(document).on('click', '.edit-btn', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: 'crud_horarios.php',
                    type: 'POST',
                    data: {action: 'get', id: id},
                    success: function(response) {
                        const data = JSON.parse(response);
                        $('#id').val(data.id);
                        $('#deporte_id').val(data.deporte_id);
                        $('#dia_semana').val(data.dia_semana);
                        $('#hora_inicio').val(data.hora_inicio);
                        $('#hora_fin').val(data.hora_fin);
                        $('#grupo_edad').val(data.grupo_edad);
                    }
                });
            });

            $(document).on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                if (confirm('¿Estás seguro de que deseas eliminar este horario?')) {
                    $.ajax({
                        url: 'crud_horarios.php',
                        type: 'POST',
                        data: {action: 'delete', id: id},
                        success: function(response) {
                            alert(response);
                            loadHorarios();
                        }
                    });
                }
            });

            function loadDeportes() {
                $.ajax({
                    url: 'crud_horarios.php',
                    type: 'POST',
                    data: {action: 'load_deportes'},
                    success: function(response) {
                        const deportes = JSON.parse(response);
                        $('#deporte_id').empty();
                        deportes.forEach(function(deporte) {
                            $('#deporte_id').append(`<option value="${deporte.id}">${deporte.nombre}</option>`);
                        });
                    }
                });
            }

            function loadHorarios() {
                $.ajax({
                    url: 'crud_horarios.php',
                    type: 'POST',
                    data: {action: 'load_horarios'},
                    success: function(response) {
                        const horarios = JSON.parse(response);
                        $('#horarios-table tbody').empty();
                        horarios.forEach(function(horario) {
                            $('#horarios-table tbody').append(`
                                <tr>
                                    <td>${horario.id}</td>
                                    <td>${horario.deporte}</td>
                                    <td>${horario.dia_semana}</td>
                                    <td>${horario.hora_inicio}</td>
                                    <td>${horario.hora_fin}</td>
                                    <td>${horario.grupo_edad}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-id="${horario.id}">Editar</button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="${horario.id}">Eliminar</button>
                                    </td>
                                </tr>
                            `);
                        });
                    }
                });
            }
        });
    </script>





</body>
</html>
