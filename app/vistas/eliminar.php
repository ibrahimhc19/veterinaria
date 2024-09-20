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
                    <?php echo $row['nombre_dueño']." ".$row['apellido_dueño']. " de número de documento ".$row['documento_dueño'];?>?</b></p>
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

<?php if (isset($del)): ?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let title, text, icon;

        if (<?= json_encode($del) ?>) {
            title = "El registro de la mascota fue eliminado correctamente";
            text = "Puedes verificar los cambios en el sistema.";
            icon = "success";
        } else {
            title = "Error al eliminar el registro";
            text = "Por favor, intenta nuevamente.";
            icon = "error";
        }

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonText: "Aceptar",
            customClass: {
                confirmButton: 'btn btn-success'
            }
        }).then((result) => {
            if (result.isConfirmed && <?= json_encode($del) ?>) {
                window.location = "index.php?load=inicio";
            }
        });
    });
</script>
<?php endif; ?>
