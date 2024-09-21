<?php
include_once ('./app/modelo/mascota.php');

class MascotaC {
    private $mascota;

    public function __construct() {
        $this->mascota = new Mascota();
    }

    public function obtenerRegistros() {
        $tabla = $this->mascota->listarMascotas();
        return $tabla;
    }

    public function agregarRegistro($documento, $nombre, $apellido, $telefono, $edad, $nombreMascota, $razaMascota, $generoMascota, $fechaEntrada, $fechaSalida)
    {

        //Enviar valor a los parametros de la consulta
        $this->mascota->__SET('documento_dueño', $documento);
        $this->mascota->__SET('nombre_dueño', $nombre);
        $this->mascota->__SET('apellido_dueño', $apellido);
        $this->mascota->__SET('telefono_dueño', $telefono);
        $this->mascota->__SET('edad_mascota', $edad);
        $this->mascota->__SET('nombre_mascota', $nombreMascota );
        $this->mascota->__SET('raza_mascota', $razaMascota);
        $this->mascota->__SET('genero_mascota', $generoMascota);
        $this->mascota->__SET('fecha_hora_entrada', $fechaEntrada);
        $this->mascota->__SET('fecha_hora_salida', $fechaSalida);
        //Llamar la funcion registrarEstudiante() en la clase Estudiante
        $result = $this->mascota->registrarMascota();
        //Retornar respuesta de la insercion del registro
        return $result;
        
    }

    public function eliminarRegistro($id) {

        $this->mascota->__SET('id', $id);
        $result = $this->mascota->eliminarMascota();
        return $result;

    }

    public function buscarMascotaId($id){
        $this->mascota->__SET('id', $id);
        $data = $this->mascota->buscarMascotaId();
        return $data;
    }

    public function editarMascota($nombre, $apellido, $telefono, $edad, $nombreMascota, $razaMascota, $generoMascota, $fechaSalida, $id)
    {
        $this->mascota->__SET('nombre_dueño', $nombre);
        $this->mascota->__SET('apellido_dueño', $apellido);
        $this->mascota->__SET('telefono_dueño', $telefono);
        $this->mascota->__SET('edad_mascota', $edad);
        $this->mascota->__SET('nombre_mascota', $nombreMascota );
        $this->mascota->__SET('raza_mascota', $razaMascota);
        $this->mascota->__SET('genero_mascota', $generoMascota);
        $this->mascota->__SET('fecha_hora_salida', $fechaSalida);
        $this->mascota->__SET('id', $id);

        $result = $this->mascota->editarMascota();
        //Retornar respuesta de la actualización del registro.
        return $result;

    }

}
