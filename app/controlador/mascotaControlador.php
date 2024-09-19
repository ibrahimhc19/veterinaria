<?php
include_once ('../modelo/mascota.php');

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
}
