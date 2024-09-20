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
            //   include_once ('./app/vistas');
                include_once ('./app/vistas/'. $view . '.php');
                break;
            case 'registrar':
                include_once ('./app/vistas/'. $view . '.php');
                break;
            case 'editar':
                include_once ('./app/vistas/'. $view . '.php');
                break;
            case 'eliminar':
                include_once ('./app/vistas/'. $view . '.php');
                break;
            case 'verMascota':
                include_once ('./app/vistas/'. $view . '.php');
                break;
            case 'index':
                include_once ($view.'.php');
                break;
            default:
                include_once ('./app/vistas/error.php');
                break;
        }

    }

}

?>
