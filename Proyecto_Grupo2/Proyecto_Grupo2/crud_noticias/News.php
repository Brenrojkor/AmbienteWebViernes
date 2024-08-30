<?php
include "db.php";
include('header_crud.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .bg-orange {
            background-color: orange;
        }
        .card-custom {
            width: 100%;
            margin-bottom: 20px;
        }
        .card-img-top-custom {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<main class="container-fluid p-4">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Noticias</h1>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); } ?>

            <!-- Botón para abrir la ventana modal -->
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') { ?>
                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#nuevaNoticiaModal">
                    Nueva
                </button>
            <?php } ?>

            <div class="row">
                <?php
                $query = "SELECT n.*, a.Nombre AS NombreAutor, c.Nombre AS NombreCategoria 
                          FROM noticia n 
                          JOIN autores a ON n.IdAutor = a.IdAutor 
                          JOIN categoria c ON n.IdCategoria = c.IdCategoria";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Error al realizar la consulta: " . mysqli_error($conn);
                }

                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-custom" data-toggle="modal" data-target="#noticiaModal<?php echo $row['Num_Noticia']; ?>">
                            <?php if (!empty($row['Imagen'])): ?>
                                <img src="<?php echo htmlspecialchars($row['Imagen']); ?>" class="card-img-top card-img-top-custom" alt="Imagen de Noticia">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['Titulo']); ?></h5>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($row['Fecha']); ?></small></p>
                                <p class="card-text"><small class="text-muted">Categoría: <?php echo htmlspecialchars($row['NombreCategoria']); ?></small></p>
                                <p class="card-text"><small class="text-muted">Autor: <?php echo htmlspecialchars($row['NombreAutor']); ?></small></p>
                            </div>
                        </div>
                    </div>

                    <!-- Ventana Modal para cada noticia -->
                    <div class="modal fade" id="noticiaModal<?php echo $row['Num_Noticia']; ?>" tabindex="-1" role="dialog" aria-labelledby="noticiaModalLabel<?php echo $row['Num_Noticia']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="noticiaModalLabel<?php echo $row['Num_Noticia']; ?>"><?php echo htmlspecialchars($row['Titulo']); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php if (!empty($row['Imagen'])): ?>
                                        <img src="<?php echo htmlspecialchars($row['Imagen']); ?>" class="img-fluid mb-3" alt="Imagen de Noticia">
                                    <?php endif; ?>
                                    <p><?php echo htmlspecialchars($row['Contenido']); ?></p>
                                    <p><small class="text-muted">Fecha: <?php echo htmlspecialchars($row['Fecha']); ?></small></p>
                                    <p><small class="text-muted">Categoría: <?php echo htmlspecialchars($row['NombreCategoria']); ?></small></p>
                                    <p><small class="text-muted">Autor: <?php echo htmlspecialchars($row['NombreAutor']); ?></small></p>
                                </div>
                                <div class="modal-footer">
                                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') { ?>
                                        <a href="#" class="btn btn-secondary btnModificarNoticia" data-toggle="modal" data-target="#modificarNoticiaModal"
   data-id="<?php echo htmlspecialchars($row['Num_Noticia']); ?>"
   data-titulo="<?php echo htmlspecialchars($row['Titulo']); ?>"
   data-contenido="<?php echo htmlspecialchars($row['Contenido']); ?>"
   data-fecha="<?php echo htmlspecialchars($row['Fecha']); ?>"
   data-autor="<?php echo htmlspecialchars($row['IdAutor']); ?>"
   data-categoria="<?php echo htmlspecialchars($row['IdCategoria']); ?>"
   data-imagen="<?php echo htmlspecialchars($row['Imagen']); ?>">
   Modificar
</a>
                                        <a href="delete_new.php?id=<?php echo urlencode($row['Num_Noticia']); ?>" class="btn btn-danger">Eliminar</a>
                                    <?php } ?>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<!-- Ventana Modal para agregar una nueva noticia -->
<div class="modal fade" id="nuevaNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="nuevaNoticiaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaNoticiaModalLabel">Agregar Nueva Noticia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="save_new.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="Num_Noticia" class="form-control" placeholder="Número de Noticia" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Titulo" class="form-control" placeholder="Título" required>
                    </div>
                    <div class="form-group">
                        <textarea name="Contenido" class="form-control" placeholder="Contenido" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" name="Fecha" class="form-control" placeholder="Fecha" required>
                    </div>
                    <div class="form-group">
                        <select name="IdAutor" class="form-control" required>
                            <?php
                            $autorQuery = "SELECT IdAutor, Nombre FROM autores";
                            $autorResult = mysqli_query($conn, $autorQuery);
                            while ($autor = mysqli_fetch_assoc($autorResult)) {
                                echo "<option value='{$autor['IdAutor']}'>{$autor['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="IdCategoria" class="form-control" required>
                            <?php
                            $categoriaQuery = "SELECT IdCategoria, Nombre FROM categoria";
                            $categoriaResult = mysqli_query($conn, $categoriaQuery);
                            while ($categoria = mysqli_fetch_assoc($categoriaResult)) {
                                echo "<option value='{$categoria['IdCategoria']}'>{$categoria['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Imagen" class="form-control" placeholder="URL de la Imagen" required>
                    </div>
                    <input type="submit" name="save_new" class="btn btn-success btn-block" value="Agregar noticia">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal para modificar una noticia -->
<div class="modal fade" id="modificarNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="modificarNoticiaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificarNoticiaModalLabel">Modificar Noticia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formModificarNoticia" action="mod_new.php" method="POST">
                    <input type="hidden" name="Num_Noticia" id="modNum_Noticia">
                    <div class="form-group">
                        <input type="text" name="Titulo" id="modTitulo" class="form-control" placeholder="Título" required>
                    </div>
                    <div class="form-group">
                        <textarea name="Contenido" id="modContenido" class="form-control" placeholder="Contenido" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" name="Fecha" id="modFecha" class="form-control" placeholder="Fecha" required>
                    </div>
                    <div class="form-group">
                        <select name="IdAutor" id="modIdAutor" class="form-control" required>
                            <?php
                            $autorQuery = "SELECT IdAutor, Nombre FROM autores";
                            $autorResult = mysqli_query($conn, $autorQuery);
                            while ($autor = mysqli_fetch_assoc($autorResult)) {
                                echo "<option value='{$autor['IdAutor']}'>{$autor['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="IdCategoria" id="modIdCategoria" class="form-control" required>
                            <?php
                            $categoriaQuery = "SELECT IdCategoria, Nombre FROM categoria";
                            $categoriaResult = mysqli_query($conn, $categoriaQuery);
                            while ($categoria = mysqli_fetch_assoc($categoriaResult)) {
                                echo "<option value='{$categoria['IdCategoria']}'>{$categoria['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Imagen" id="modImagen" class="form-control" placeholder="URL de la Imagen" required>
                    </div>
                    <input type="submit" name="mod_new" class="btn btn-success btn-block" value="Modificar noticia">
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var cards = document.querySelectorAll('.card-custom');
    cards.forEach(function(card) {
        card.addEventListener('mouseover', function() {
            card.style.transform = 'scale(1.05)'; 
        });

        card.addEventListener('mouseout', function() {
            card.style.transform = 'scale(1)';
        });
    });
</script>

<script>
    $(document).on('click', '.btnModificarNoticia', function () {
        var numNoticia = $(this).data('id');
        var titulo = $(this).data('titulo');
        var contenido = $(this).data('contenido');
        var fecha = $(this).data('fecha');
        var autor = $(this).data('autor');
        var categoria = $(this).data('categoria');
        var imagen = $(this).data('imagen');

        $('#modNum_Noticia').val(numNoticia);
        $('#modTitulo').val(titulo);
        $('#modContenido').val(contenido);
        $('#modFecha').val(fecha);
        $('#modIdAutor').val(autor);
        $('#modIdCategoria').val(categoria);
        $('#modImagen').val(imagen);
    });
</script>


</body>
</html>
