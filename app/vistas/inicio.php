<?php

include_once('./app/controlador/mascotaControlador.php');
$mascotas = new MascotaC();
$tablaEst = $mascotas->obtenerRegistros();

?>

<div class="container style-form">

  <div class="table-responsive">

    <table class="table table-striped-columns table-bordered nowrap">
      <thead>
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Documento del dueño</th>
          <th scope="col">Nombre completo del dueño</th>
          <th scope="col">Telefono</th>
          <th scope="col">Edad de la mascota</th>
          <th scope="col">Nombre de la mascota</th>
          <th scope="col">Raza de la mascota</th>
          <th scope="col">Género de la mascota</th>
          <th scope="col">Fecha de entrada</th>
          <th scope="col">Fecha de salida</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>


      <tbody id="cuerpoTabla">
                  <?php foreach ($tablaEst as $data) :?> 
                    <tr class="text-center">
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo $data['documento_dueño'];?></td>
                        <td><?php echo $data['NombreCompleto'];?></td>
                        <td><?php echo $data['telefono_dueño'];?></td>
                        <td><?php echo $data['edad_mascota'];?></td>
                        <td><?php echo $data['nombre_mascota'];?></td>
                        <td><?php echo $data['raza_mascota'];?></td>
                        <td><?php echo $data['genero_mascota'];?></td>
                        <td><?php echo $data['fecha_hora_entrada'];?></td>
                        <td><?php echo $data['fecha_hora_salida'];?></td>
                        <td class="d-flex">
                            <a href="?load=verMascota&id=<?php echo $data['id'];?>">
                                <button type="button" class="btn btn-primary btn-md">Ver</button></a>

                            <a href="?load=editar&id=<?php echo $data['id'];?>">
                            <button type="button" class="btn btn-info btn-md">Editar</button></a>

                            <a href="?load=eliminar&id=<?php echo $data['id'];?>">
                            <button type="button" class="btn btn-danger btn-md">Eliminar</button></a>
                       
                        </td>
                    </tr>
                  <?php endforeach;?>

      </tbody>
    </table>


  </div>




</div>