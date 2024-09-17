<?php
require_once '../modelo/mascota.php';

class MascotaControlador {
    private $mascota;

    public function __construct($db) {
        $this->mascota = new Mascota($db);
    }

    public function obtenerRegistros() {
        echo json_encode($this->mascota->listarMascotas());
    }

    public function agregarRegistro($data) {
        if ($this->mascota->registrarMascota($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function eliminarRegistro($id) {
        if ($this->mascota->eliminarMascota($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
