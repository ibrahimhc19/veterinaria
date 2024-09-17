<?php
class Conexion {
    private $host = 'localhost';  
    private $usuario = 'root';    
    private $password = '';   
    private $base_datos = 'veterinaria'; 
    private $conexion;

    public function __construct() {
        // Crear la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->base_datos);

        // Comprobar si la conexión fue exitosa
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener la conexión
    public function obtenerConexion() {
        return $this->conexion;
    }

    // Método para cerrar la conexión
    public function cerrarConexion() {
        $this->conexion->close();
    }
}
?>
