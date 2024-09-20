<?php
include_once('./app/controlador/mascotaControlador.php');
$mascota = new MascotaC();
//GET viajan las vaiables por la URL
//POST viajan  variables ocultas.
if (isset($_GET['id']) && $_GET['id'] != null) {
  //llamar el metodo buscarEstudianteId;
  $row = $mascota->buscarMascotaId($_GET['id']);
} else {
  //si no lo devuleva al index(Inicio)
  header('Location: index.php');
}
//dar clic al boton editar entra a la condicion y realiza la actualizacion
if (isset($_POST['btnEditar'])) {
  //llamar el metodo editarEstudiante y recibir los parametros del formulario
  $update = $mascota->editarMascota(
    $_POST['txtNombre'],
    $_POST['txtApellido'],
    $_POST['txtTelefono'],
    $_POST['txtEdad'],
    $_GET['id']
  );

  //si actualizo correctamente devuelve un verdadero(true);
  if ($update == true) {
    $up = true;
  } else {
    $up = false;
  }
}

?>

<div class="container style-form">
  <h3><b>Editar estudiante<b></h3>
  <br>
  <form action="" method="post" class="form-horizontal">
    <div class="row">

      <div class="col-md-6">
        <h4>Datos dueño</h4>
        <div class="form-group">
          <label for="txtDocumento" class="control-label col-md-3">Documento:</label>
          <div class="col-md-9">
            <input type="text" name="txtDocumento" id="" class="form-control" required disabled value="<?php echo $row['documento_dueño']; ?>">
          </div>

        </div>

        <div class="form-group">
          <label for="txtNombre" class="control-label col-md-3">Nombre:</label>
          <div class="col-md-9">
            <input type="text" name="txtNombre" id="" class="form-control" required value="<?php echo $row['nombre_dueño']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="txtApellido" class="control-label col-md-3">Apellido:</label>
          <div class="col-md-9">
            <input type="text" name="txtApellido" id="" class="form-control" required value="<?php echo $row['apellido_dueño']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="txtTelefono" class="control-label col-md-3">Telefono:</label>
          <div class="col-md-9">
            <input type="text" name="txtTelefono" id="" class="form-control" required value="<?php echo $row['telefono_dueño']; ?>">
          </div>
        </div>



      </div>

      <div class="col-md-6">
        <h4>Datos mascota</h4>
        <div class="form-group">
          <label for="txtEdad" class="control-label col-md-3">Edad:</label>
          <div class="col-md-9">
            <input type="text" name="txtEdad" id="" class="form-control" required value="<?php echo $row['edad_mascota']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="txtPromedio" class="control-label col-md-3">Promedio:</label>
          <div class="col-md-9">
            <input type="text" name="txtPromedio" id="" class="form-control" value="<?php echo $row['Promedio']; ?>" required disabled>
          </div>
        </div>

        <div class="form-group">


          <label for="txtFecha" class="control-label col-md-3">Fecha-registro:</label>
          <div class="col-md-9">
            <input type="text" name="txtFecha" id="" class="form-control" required value="<?php echo $row['fecha_hora_entrada']; ?>" disabled>
          </div>
        </div>

        <div class="form-group" align="right" style="margin-right: 1%;">
          <input type="submit" value="Actualizar" class="btn btn-success btn-md" name="btnEditar">
        </div>


      </div>


    </div>

  </form>

</div>

<?php if (isset($up) && $up == true) : ?>

  <script type="text/javascript">
    $(document).ready(function() {

      swal({
          title: "Actualización exitosa",
          type: "success",
          confirmButton: "#3CB371",
          confirmButtonText: "Aceptar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "index.php?load=inicio";
          }
        });

    });
  </script>
<?php endif; ?>