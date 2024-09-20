<?php

include_once('./app/controlador/mascotaControlador.php');
$mascotas = new MascotaC();
$tablaEst = $mascotas->obtenerRegistros();

?>
<!-- if ($query) {

  $contador = 1;

  while ($row = mysqli_fetch_assoc($query)) {
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
    $id = $row['id'];
    echo '<tr>
              <td scope="row" class="text-center">'.$contador.'</td>
              <td scope="row">'.$nombre.'</td>
              <td scope="row">'.$apellido.'</td>
              <td scope="row">'.$correo.'</td>
              <td scope="row">'.$telefono.'</td>
              <td scope="row"><button class="btn btn-info" data-id="'.$id.'" onclick="actualizar()">Editar</button></td>
              <td scope="row"><button type="button" class="btn btn-info" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#modalActualizar" onclick="obtenerDatos()">Actualizar</button></td>
              <td scope="row"><button class="btn btn-danger" onclick="eliminar('.$id.')">Eliminar</button></td>
            </tr>';
    $contador++;
  }
}
?> -->


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
      <!-- Cuerpo de la tabla (Datos) -->
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
                        <!--Crear botones para editar eliminar y ver el estudiante-->
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