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

    public function agregarRegistro($data) {
        if ($this->mascota->registrarMascota($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
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

    public function editarMascota($nombre, $apellido, $telefono, $edad, $id)
    {
        $this->mascota->__SET('id', $id);
        $this->mascota->__SET('nombre', $nombre);
        $this->mascota->__SET('apellido', $apellido);
        $this->mascota->__SET('telefono', $telefono);
        $this->mascota->__SET('edad', $edad);
        //Llamar la funcion editarEstudiante() en la clase Estudiante.
        $result = $this->mascota->editarMascota();
        //Retornar respuesta de la actualización del registro.
        return $result;

    }

}
