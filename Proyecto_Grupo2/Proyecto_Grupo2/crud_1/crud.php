<?php include("db.php"); ?>
<?php include('includes/header_crud.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD EMPLOYEE FORM -->
      <div class="card card-body">
        <form action="save_employee.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre_empleado" class="form-control" placeholder="Nombre del Empleado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="rol" class="form-control" placeholder="Rol">
          </div>
          <div class="form-group">
            <input type="text" name="cedula" class="form-control" placeholder="Cédula">
          </div>
          <div class="form-group">
            <input type="text" name="salario" class="form-control" placeholder="Salario">
          </div>
          <input type="submit" name="save_employee" class="btn btn-success btn-block" value="Guardar Empleado">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Cédula</th>
            <th>Salario</th>
            <th>Creado en</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM empleados";
          $result_employees = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_employees)) { ?>
          <tr>
            <td><?php echo $row['nombre_empleado']; ?></td>
            <td><?php echo $row['rol']; ?></td>
            <td><?php echo $row['cedula']; ?></td>
            <td><?php echo $row['salario']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_employee.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer_crud.php'); ?>
