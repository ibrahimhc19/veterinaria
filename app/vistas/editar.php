<?php
include_once('./app/controlador/mascotaControlador.php');
$mascota = new MascotaC();

if (isset($_GET['id']) && $_GET['id'] != null) {
  $row = $mascota->buscarMascotaId($_GET['id']);
} else {
  //si no lo devuleva al index(Inicio)
  header ('Location: index.php');
}
//dar clic al boton editar entra a la condicion y realiza la actualizacion
if (isset($_POST['btnEditar'])){
  
  var_dump($_POST['txtNombre'], $_POST['txtApellido'], $_POST['txtTelefono'], $_POST['txtEdadMascota'],$_POST['txtNombreMascota'], $_POST['txtRaza'], $_POST['txtGenero'], $_POST['txtFechaSalida']); // Esto te ayudará a ver qué datos se están enviando.
 $actualizar = $mascota->editarMascota($_POST['txtNombre'], $_POST['txtApellido'], $_POST['txtTelefono'], $_POST['txtEdadMascota'],$_POST['txtNombreMascota'], $_POST['txtRaza'], $_POST['txtGenero'], $_POST['txtFechaSalida'], $_GET['id']);

  //si actualizo correctamente devuelve un verdadero(true);
  if ($actualizar == true) {
      $up = true;
  } else {
      $up = false;
  }
} 

?>

<div class="container style-form">
  <h3><b>Editar registro de mascota<b></h3>
  <br>
  <form action="" method="post" class="form-horizontal">
    <div class="row">

      <div class="col-md-6">
        <h4>Datos dueño</h4>
        <div class="form-group">
          <label for="txtDocumento" class="control-label col-md-3">Documento del dueño:</label>
          <div class="col-md-9">
            <input type="text" name="txtDocumento" id="" class="form-control" required disabled value="<?php echo $row['documento_dueño']; ?>">
          </div>

        </div>

        <div class="form-group">
          <label for="txtNombre" class="control-label col-md-3">Nombre del dueño:</label>
          <div class="col-md-9">
            <input type="text" name="txtNombre" id="" class="form-control" required value="<?php echo $row['nombre_dueño']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="txtApellido" class="control-label col-md-3">Apellido del dueño:</label>
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
            <input type="text" name="txtEdadMascota" id="" class="form-control" required value="<?php echo $row['edad_mascota']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="txtPromedio" class="control-label col-md-3">Nombre:</label>
          <div class="col-md-9">
            <input type="text" name="txtNombreMascota" id="" class="form-control" value="<?php echo $row['nombre_mascota']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="txtRaza" class="control-label col-md-3">Raza:</label>
          <div class="col-md-9">
            <input type="text" name="txtRaza" id="" class="form-control" value="<?php echo $row['raza_mascota']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="txtGenero" class="control-label col-md-3">Género:</label>
          <div class="col-md-9">
            <input type="text" name="txtGenero" id="" class="form-control" value="<?php echo $row['genero_mascota']; ?>" required>
          </div>
        </div>

        <div class="form-group">


          <label for="txtFecha" class="control-label col-md-3">Fecha de salida:</label>
          <div class="col-md-9">
            <input type="datetime-local" name="txtFechaSalida" id="" class="form-control" required>
          </div>
        </div>

        <div class="form-group mb-5" align="right" style="margin-right: 1%;">
          <input type="submit" value="Actualizar" class="btn btn-success btn-md" name="btnEditar">
        </div>


      </div>


    </div>

  </form>

</div>

<?php if (isset($up) && $up == true) : ?>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Actualización exitosa',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#3CB371',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = 'index.php?load=inicio';
        }
      });
    });
  </script>
<?php endif; ?>