<?php 

//crear clase para enrutar las vistas por la url
class Enrutador
{
    //Crear metodo para cargar la vista seleccionada por el usuario
    public function loadView($view)
    {
        //Segun casos
        switch ($view) {
            case 'inicio':
              include_once ('../vistas/');
                include_once ('../vistas/'. $view . '.php');
                break;
            case 'crearMascota':
                include_once ('../vistas/'. $view . '.php');
                break;
            case 'editarMascota':
                include_once ('../vistas/'. $view . '.php');
                break;
            case 'eliminarMascota':
                include_once ('../vistas/'. $view . '.php');
                break;
            case 'verMascota':
                include_once ('../vistas/'. $view . '.php');
                break;
            case 'index':
                include_once ($view.'.php');
                break;
            default:
                include_once ('../vistas//error.php');
                break;
        }

    }

}

?>
