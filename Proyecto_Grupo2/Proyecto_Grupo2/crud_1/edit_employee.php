<?php
include("db.php");

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM empleados WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre_empleado = $row['nombre_empleado'];
    $rol = $row['rol'];
    $cedula = $row['cedula'];
    $salario = $row['salario'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre_empleado= $_POST['nombre_empleado'];
  $rol = $_POST['rol'];
  $cedula = $_POST['cedula'];
  $salario = $_POST['salario'];

  $query = "UPDATE empleados set nombre_empleado = '$nombre_empleado', rol = '$rol', cedula = '$cedula', salario = '$salario' WHERE id = $id";
  mysqli_query($conn, $query);

  $_SESSION['message'] = 'Empleado actualizado exitosamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: crud.php');
}
?>

<?php include('includes/header_crud.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit_employee.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input name="nombre_empleado" type="text" class="form-control" value="<?php echo $nombre_empleado; ?>" placeholder="Actualizar Nombre">
          </div>
          <div class="form-group">
            <input name="rol" type="text" class="form-control" value="<?php echo $rol; ?>" placeholder="Actualizar Rol">
          </div>
          <div class="form-group">
            <input name="cedula" type="text" class="form-control" value="<?php echo $cedula; ?>" placeholder="Actualizar Cédula">
          </div>
          <div class="form-group">
            <input name="salario" type="text" class="form-control" value="<?php echo $salario; ?>" placeholder="Actualizar Salario">
          </div>
          <button class="btn btn-success" name="update">
            Actualizar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer_crud.php'); ?>
