<?php

include_once('./app/controlador/mascotaControlador.php');
$mascotaC = new MascotaC();

date_default_timezone_set("America/Bogota");

if (isset($_POST['btnRegistrar'])) {
   //Recibir los datos del formulario registro de estudiante
   $fecha = date('Y-m-d H:i:s');
   //var_dump($_POST['txtNota1'], $_POST['txtNota2'], $_POST['txtNota3'], $fecha); exit();
   $datosMascota = $mascotaC->agregarRegistro($_POST['txtDocumento'], $_POST['txtNombre'], 
                                                        $_POST['txtApellido'], $_POST['txtTelefono'], $_POST['txtEdad'],
                                                        $_POST['txtNota1'], $_POST['txtNota2'], $_POST['txtNota3'], $_POST['txtNota3'], $_POST['txtNota3']);
    if ($datosMascota == true) {
        //echo "Registro exitoso";
        $val = "1";
    } else {
        //echo "El documento ya se encuentra registrado";
        $val = "2";
    } 
}

?>

<div class="container style-form">
    <h3><b>Registrar estudiante<b></h3>
    <br>
    <form action="" method="post" class="form-horizontal">
        <div class="row">

            <div class="col-md-6">

                <div class="form-group">
                <label for="txtDocumento" class="control-label col-md-3">Documento:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtDocumento" id="" class="form-control" required>
                    </div>
                
                </div>
             
                <div class="form-group">
                <label for="txtNombre" class="control-label col-md-3">Nombre:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtNombre" id="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                <label for="txtApellido" class="control-label col-md-3">Apellido:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtApellido" id="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                <label for="txtTelefono" class="control-label col-md-3">Telefono:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtTelefono" id="" class="form-control" required>
                    </div>
                </div>

                  <div class="form-group">
                <label for="txtEdad" class="control-label col-md-3">Edad:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtEdad" id="" class="form-control" required>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                 
                
                 <div class="form-group">
                <label for="txtNota1" class="control-label col-md-3">Nota 1:</label>
                    <div class="col-md-9">
                        <input type="number" step="0.1" name="txtNota1" id="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                <label for="txtNota2" class="control-label col-md-3">Nota 2:</label>
                    <div class="col-md-9">
                        <input type="number" step="0.1" name="txtNota2" id="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                <label for="txtNota3" class="control-label col-md-3">Nota 3:</label>
                    <div class="col-md-9">
                        <input type="number" step="0.1" name="txtNota3" id="" class="form-control" required>
                    </div>
                </div>

                  <div class="form-group">

                  <?php  $date = date('Y-m-d H:i:s');?>
                     <label for="txtFecha" class="control-label col-md-3">Fecha-registro:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtFecha" id="" class="form-control" required value="<?php echo $date;?>" disabled>
                    </div>
                </div>

                <div class="form-group" align="right" style="margin-right: 1%;">
                    <input type="submit" value="Guardar" class="btn btn-primary btn-md" name="btnRegistrar">
                </div>


            </div>
            
                
        </div>
  
    </form>

</div>
<br><br>
 
 <!--Si se registro exitosamente devuelve un 1-->
<?php if(isset($val) && $val == "1"):?>
<script type="text/javascript">
//Cuando el documento sea leido se ejecute
$(document).ready(function(){
    //Mostrar caja de alerta de la libreria de sweetalert
    sweetAlert("Registro Exitoso");

});
</script>
<?php endif; ?>
 <!--Si no se registro devuelve un 2-->
<?php if(isset($val) && $val == "2"):?>
<script type="text/javascript">
$(document).ready(function(){

    sweetAlert("Documento ya esta registrado!!!");

});
</script>
<?php endif; ?>

