<?php

include_once('./app/controlador/mascotaControlador.php');
$mascotaC = new MascotaC();

date_default_timezone_set("America/Bogota");

if (isset($_POST['btnRegistrar'])) {
    var_dump($_POST); // Esto te ayudará a ver qué datos se están enviando.

    $fechaRegistro = date('Y-m-d H:i:s');
    $fechaSalida = date('Y-m-d H:i:s');
    
    // $fechaRegistro = isset($_POST['txtFecha']) ? $_POST['txtFecha'] : '';
    // $fechaSalida = isset($_POST['txtFechaSalida']) ? $_POST['txtFechaSalida'] : '';

    $datosMascota = $mascotaC->agregarRegistro(
        $_POST['txtDocumento'],
        $_POST['txtNombre'],
        $_POST['txtApellido'],
        $_POST['txtTelefono'],
        $_POST['txtEdad'],
        $_POST['txtNombreMascota'],
        $_POST['txtRaza'],
        $_POST['txtGenero'],
        $fechaRegistro,
        $fechaSalida
    );

    if ($datosMascota == true) {
        $val = "1";
    } else {
        $val = "2";
    }
}


?>

<div class="container style-form mt-4">
    <h3><b>Registrar mascota<b></h3>
    <br>
    <form action="" method="post" class="form-horizontal ">
        <div class="row">

            <div class="col-md-6">
                <h4>Datos dueño:</h4>

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

            </div>

            <div class="col-md-6">
                <h4>Datos mascota:</h4>

                <div class="form-group">
                    <label for="txtNombreMascota" class="control-label col-md-3">Nombre:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtNombreMascota" id="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtEdad" class="control-label col-md-3">Edad:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtEdad" id="" class="form-control" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="txtRaza" class="control-label col-md-3">Raza:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtRaza" id="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtGenero" class="control-label col-md-3">Género:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtGenero" id="" class="form-control" required>
                    </div>
                </div>


                <div class="form-group">

                    <?php $date = date('Y-m-d H:i:s'); ?>

                    <label for="txtFecha" class="control-label col-md-3">Fecha de registro:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtFecha" id="" class="form-control" required value="<?php echo $date; ?>" readonly>
                    </div>
                </div>
                <div class="form-group" hidden>

                    <label for="txtFechaSalida" class="control-label col-md-3">Fecha de salida:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtFechaSalida" id="" class="form-control" required value="<?php echo $date; ?>" readonly>
                    </div>
                </div>

                <div class="form-group my-5">
                    <input type="submit" value="Guardar" class="btn btn-primary btn-md" name="btnRegistrar">
                </div>


            </div>


        </div>

    </form>

</div>
<br><br>

<!-- Si se registró exitosamente devuelve un 1 -->
<?php if (isset($val) && $val == "1"): ?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Registro Exitoso',
            text: 'Los datos han sido guardados correctamente.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    });
</script>
<?php endif; ?>

<!-- Si no se registró devuelve un 2 -->
<?php if (isset($val) && $val == "2"): ?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error en el Registro',
            text: 'El documento ya está registrado!!!',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    });
</script>
<?php endif; ?>
