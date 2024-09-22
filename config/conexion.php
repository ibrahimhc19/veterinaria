<?php
class Conexion
{
    private $host = 'localhost';
    private $usuario = 'root';
    private $password = '';
    private $base_datos = 'veterinaria';
    private $conexion;

    public function __construct()
    {
        // Crear la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->base_datos);
        $this->conexion->set_charset("utf8");//Recibir caracteres especiales del español.


        // Comprobar si la conexión fue exitosa
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }

    public function consultaSimple($query)
    {
        try {
            $consulta = $this->conexion->query($query);
            return $consulta ? true : false; // Devuelve true si fue exitoso
        } catch (Exception $e) {
            $this->conexion->rollback(); // Devuelve la consulta
            return false; // Indica que ocurrió un error
        }
    }
    


    public function consultaRetorno($query)
    {

        try {
            $consulta = $this->conexion->query($query);
            return $consulta;
        } catch (Exception $e) {
            $consulta = $this->conexion->query($query);
            mysqli_free_result($consulta); //Liberar consulta
            mysqli_close($this->conexion); //cerrar conexion
        }
    }


}
