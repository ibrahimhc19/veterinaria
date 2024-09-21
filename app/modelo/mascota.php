<?php

include_once("./config/conexion.php");

class Mascota
{

    private $id;
    private $documento;
    private $nombre;
    private $apellido;
    private $telefono;
    private $edadMascota;
    private $nombreMascota;
    private $razaMascota;
    private $generoMascota;
    private $entrada;
    private $salida;
    private $conexion;


    public function __construct()
    {
        //instanciar la clase Conexion en un objeto llamado $conexion
        $this->conexion = new Conexion();
    }
    public function __SET($atributo, $valor)
    {
        //asigna un valor al atributo
        $this->$atributo = $valor;
    }
    public function __GET($atributo)
    {
        //retorna el valor del atributo
        return  $this->$atributo;
    }

    public function registrarMascota()
    {


            $sql = "INSERT INTO mascotas (documento_dueño, nombre_dueño, apellido_dueño, telefono_dueño, edad_mascota, nombre_mascota, raza_mascota, genero_mascota, fecha_hora_entrada, fecha_hora_salida)
            VALUES ('{$this->documento}','{$this->nombre}','{$this->apellido}','{$this->telefono}', '{$this->edadMascota}', '{$this->nombreMascota}', '{$this->razaMascota}', '{$this->generoMascota}'
            , '{$this->entrada}', '{$this->salida}')";
            //llamar la conexion y ejecutar la consulta con la variable $sql.
            $this->conexion->consultaSimple($sql);
            return true;
        
    }


    public function listarMascotas()
    {
        $sql = "SELECT id, documento_dueño, CONCAT(nombre_dueño,' ', apellido_dueño) AS NombreCompleto, telefono_dueño , edad_mascota, nombre_mascota, raza_mascota, genero_mascota, fecha_hora_entrada, fecha_hora_salida
        FROM mascotas";
        //llamar el metodo para retornar la tabla (consultaRetorno)
        $tabla = $this->conexion->consultaRetorno($sql);
        //retornar la tabla con todos los registros de la base de datos
        return $tabla;
    }


    public function editarMascota()
    {
        $sql = "UPDATE mascotas SET nombre_dueño = '{$this->nombre}', apellido_dueño = '{$this->apellido}'
            , telefono_dueño = '{$this->telefono}',  edad_mascota = '{$this->edadMascota}', nombre_mascota = '{$this->nombreMascota}', raza_mascota = '{$this->razaMascota}', genero_mascota = '{$this->generoMascota}', fecha_hora_salida = '{$this->salida}' WHERE id = '{$this->id}'";
        //Ejecutar la consulta de actualizar
        $this->conexion->consultaSimple($sql);
        return true;
    }


    public function eliminarMascota()
    {
        $sql = "DELETE FROM mascotas WHERE id = '{$this->id}'";
        $this->conexion->consultaSimple($sql);
        return true;
    }




    public function buscarMascotaId(){
        $sql = "SELECT * FROM mascotas WHERE id = '{$this->id}' LIMIT 1";
        //llamar el metodo para retornar los datos (consultaRetorno)
        $tabla = $this->conexion->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($tabla);
        return $row;
    }

}
