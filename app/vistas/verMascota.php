<?php

include_once('./app/controlador/mascotaControlador.php');
$mascota = new MascotaC();

if (isset($_GET['id']) && $_GET['id'] != null) {
  $row = $mascota->buscarMascotaId($_GET['id']);
} else {
  header('Location: index.php');
}
?>
<div class="container style-form">
  <h3><b>Datos de las mascota # <?php echo $_GET['id']; ?><b></h3>
  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="my-2">
        <h4>Datos del dueño:</h4>

        <div class="form-group">
          <label for=""><span><b>Documento: </b><?php echo $row['documento_dueño']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Nombres: </b><?php echo $row['nombre_dueño']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Apelidos: </b><?php echo $row['apellido_dueño']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Teléfono: </b><?php echo $row['telefono_dueño']; ?></span></label><br>
        </div>
      </div>
      <div class="my-2">
        <h5>Datos de la mascota:</h5>
        <div class="form-group">
          <label for=""><span><b>Edad: </b></span><?php echo $row['edad_mascota']; ?></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Nombre: </b><?php echo $row['nombre_mascota']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Raza: </b><?php echo $row['raza_mascota']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Género: </b><?php echo $row['genero_mascota']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Fecha de entrada: </b><?php echo $row['fecha_hora_entrada']; ?></span></label><br>
        </div>
        <div class="form-group">
          <label for=""><span><b>Fecha de salida: </b><?php echo $row['fecha_hora_salida']; ?></span></label><br>
        </div>
      </div>
      <div class="form-group mb-5">
        <a href="?load=inicio">
          <button type="button" class="btn btn-success btn-md">Atras</button></a><br>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</diV>