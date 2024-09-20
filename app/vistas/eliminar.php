<?php

include_once('./app/controlador/mascotaControlador.php');
$mascota = new MascotaC();

if(isset($_GET['id']) && $_GET['id'] != null ){
  $row = $mascota->buscarMascotaId($_GET['id']);
}

if(isset($_POST['btnEliminar'])){

$result = $mascota->eliminarRegistro($_GET['id']);

if ($result == true) {
  $del = true;
} else {
  $del = false;
}
}
?>


<div class="container style-form">

    <h3><b>Eliminar Mascota</b></h3>
    <br>
        <form action="" method="post">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <p style="color: red; text-align: center;"><b>
                    ¿Estas seguro de eliminar la mascota 
                    <?php echo $row['Nombre']." ".$row['Apellido']. " de número de documento ".$row['Documento'];?>?</b></p>
                </div>
                <div class="form-group" align="center">
                    <input type="submit" class="btn btn-success" name="btnEliminar" value="Si">
                    <a href="?load=inicio">
                    <button class="btn btn-danger" type="button" >No</button>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        </form>
</div>

<?php if(isset($del) && $del == true):?>
        <script type="text/javascript">
            $(document).ready(function(){
                //alerta si fue eliminado correctamente
                swal({
                    title: "El estudiante fue eliminado correctamente",
                    type: "success",
                    confirmButton: "#3CB371",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if(isConfirm){
                        window.location="index.php?load=inicio";
                    }
                });
            });
        </script>
<?php endif;?>

<?php if(isset($del) && $del == false):?>
        <script type="text/javascript">
             $(document).ready(function(){
                 //alerta si no fue eliminado
                 swal({
                    title: "Error al eliminar el estudiante",
                    type: "error",
                    confirmButton: "#3CB371",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false,
                    closeOnCancel: false
                });
             });
        </script>
<?php endif;?>