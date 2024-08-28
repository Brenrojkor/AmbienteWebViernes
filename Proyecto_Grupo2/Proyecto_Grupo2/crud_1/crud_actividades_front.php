<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Actividades</title>
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
        <h1 class="mb-4">Actividades</h1>

        <!-- Formulario -->
        <form id="actividad-form" class="mb-4">
            <input type="hidden" id="num_activ" name="num_activ">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="instructor">Instructor:</label>
                <input type="text" id="instructor" name="instructor" class="form-control">
            </div>
            <div class="form-group">
                <label for="horario">Horario:</label>
                <select id="horario" name="horario" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" id="capacidad" name="capacidad" class="form-control">
            </div>
            <div class="form-group">
                <label for="instalacion">Instalación:</label>
                <select id="instalacion" name="instalacion" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <!-- Tabla de Actividades -->
        <h2>Lista de Actividades</h2>
        <table id="actividades-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Instructor</th>
                    <th>Horario</th>
                    <th>Capacidad</th>
                    <th>Instalación</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            loadInstalaciones();
            loadHorarios();
            loadActividades();

            $('#actividad-form').submit(function(event) {
                event.preventDefault();
                const num_activ = $('#num_activ').val();
                const action = num_activ ? 'update' : 'create';
                $.ajax({
                    url: 'crud_actividades.php',
                    type: 'POST',
                    data: $(this).serialize() + '&action=' + action,
                    success: function(response) {
                        alert(response);
                        loadActividades();
                        $('#actividad-form')[0].reset();
                    }
                });
            });

            $(document).on('click', '.edit-btn', function() {
                const num_activ = $(this).data('num_activ');
                $.ajax({
                    url: 'crud_actividades.php',
                    type: 'POST',
                    data: {action: 'get', num_activ: num_activ},
                    success: function(response) {
                        const data = JSON.parse(response);
                        $('#num_activ').val(data.Num_Activ);
                        $('#nombre').val(data.Nombre);
                        $('#descripcion').val(data.Descripcion);
                        $('#instructor').val(data.Instructor);
                        $('#horario').val(data.Horario);
                        $('#capacidad').val(data.Capacidad);
                        $('#instalacion').val(data.Instalacion);
                        $('#precio').val(data.Precio);
                    }
                });
            });

            $(document).on('click', '.delete-btn', function() {
                const num_activ = $(this).data('num_activ');
                if (confirm('¿Estás seguro de que deseas eliminar esta actividad?')) {
                    $.ajax({
                        url: 'crud_actividades.php',
                        type: 'POST',
                        data: {action: 'delete', num_activ: num_activ},
                        success: function(response) {
                            alert(response);
                            loadActividades();
                        }
                    });
                }
            });

            function loadInstalaciones() {
                $.ajax({
                    url: 'crud_actividades.php',
                    type: 'POST',
                    data: {action: 'load_instalaciones'},
                    success: function(response) {
                        const instalaciones = JSON.parse(response);
                        $('#instalacion').empty();
                        instalaciones.forEach(function(instalacion) {
                            $('#instalacion').append(`<option value="${instalacion.ID_Instalacion}">${instalacion.Nombre}</option>`);
                        });
                    }
                });
            }

            function loadHorarios() {
                $.ajax({
                    url: 'crud_actividades.php',
                    type: 'POST',
                    data: {action: 'load_horarios'},
                    success: function(response) {
                        const horarios = JSON.parse(response);
                        $('#horario').empty();
                        horarios.forEach(function(horario) {
                            $('#horario').append(`<option value="${horario.id}">${horario.dia_semana}</option>`);
                        });
                    }
                });
            }

            function loadActividades() {
                $.ajax({
                    url: 'crud_actividades.php',
                    type: 'POST',
                    data: {action: 'load_actividades'},
                    success: function(response) {
                        const actividades = JSON.parse(response);
                        $('#actividades-table tbody').empty();
                        actividades.forEach(function(actividad) {
                            $('#actividades-table tbody').append(`
                                <tr>
                                    <td>${actividad.Num_Activ}</td>
                                    <td>${actividad.Nombre}</td>
                                    <td>${actividad.Descripcion}</td>
                                    <td>${actividad.Instructor}</td>
                                    <td>${actividad.dia_semana}</td>
                                    <td>${actividad.Capacidad}</td>
                                    <td>${actividad.instalacion_nombre}</td>
                                    <td>${actividad.Precio}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-num_activ="${actividad.Num_Activ}">Editar</button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-num_activ="${actividad.Num_Activ}">Eliminar</button>
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
