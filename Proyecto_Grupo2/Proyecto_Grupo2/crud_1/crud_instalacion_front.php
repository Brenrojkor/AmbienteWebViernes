<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Instalaciones</title>
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
        <h1 class="mb-4">Instalaciones</h1>

        <!-- Formulario -->
        <form id="instalacion-form" class="mb-4">
            <input type="hidden" id="id_instalacion" name="id_instalacion">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" class="form-control">
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" id="capacidad" name="capacidad" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <!-- Tabla de Instalaciones -->
        <h2>Lista de Instalaciones</h2>
        <table id="instalaciones-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            loadInstalaciones();

            $('#instalacion-form').submit(function(event) {
                event.preventDefault();
                const id_instalacion = $('#id_instalacion').val();
                const action = id_instalacion ? 'update' : 'create';
                $.ajax({
                    url: 'crud_instalacion.php',
                    type: 'POST',
                    data: $(this).serialize() + '&action=' + action,
                    success: function(response) {
                        alert(response);
                        loadInstalaciones();
                        $('#instalacion-form')[0].reset();
                    }
                });
            });

            $(document).on('click', '.edit-btn', function() {
                const id_instalacion = $(this).data('id_instalacion');
                $.ajax({
                    url: 'crud_instalacion.php',
                    type: 'POST',
                    data: {action: 'get', id_instalacion: id_instalacion},
                    success: function(response) {
                        const data = JSON.parse(response);
                        $('#id_instalacion').val(data.ID_Instalacion);
                        $('#nombre').val(data.Nombre);
                        $('#tipo').val(data.Tipo);
                        $('#capacidad').val(data.Capacidad);
                    }
                });
            });

            $(document).on('click', '.delete-btn', function() {
                const id_instalacion = $(this).data('id_instalacion');
                if (confirm('¿Estás seguro de que deseas eliminar esta instalación?')) {
                    $.ajax({
                        url: 'crud_instalacion.php',
                        type: 'POST',
                        data: {action: 'delete', id_instalacion: id_instalacion},
                        success: function(response) {
                            alert(response);
                            loadInstalaciones();
                        }
                    });
                }
            });

            function loadInstalaciones() {
                $.ajax({
                    url: 'crud_instalacion.php',
                    type: 'POST',
                    data: {action: 'load_instalaciones'},
                    success: function(response) {
                        const instalaciones = JSON.parse(response);
                        $('#instalaciones-table tbody').empty();
                        instalaciones.forEach(function(instalacion) {
                            $('#instalaciones-table tbody').append(`
                                <tr>
                                    <td>${instalacion.ID_Instalacion}</td>
                                    <td>${instalacion.Nombre}</td>
                                    <td>${instalacion.Tipo}</td>
                                    <td>${instalacion.Capacidad}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-id_instalacion="${instalacion.ID_Instalacion}">Editar</button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id_instalacion="${instalacion.ID_Instalacion}">Eliminar</button>
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
