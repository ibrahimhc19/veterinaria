<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/sweetalert.css">
    <link href="./public/css/datatables.min.css" rel="stylesheet">
    <link href="./public/css/styles.css" rel="stylesheet">
  </head>
  <body>
    <header>
      Clinica Veterinaria
  </header>

</div>

<nav>
  <ul>
  <!-- En la etiqueta <a> se va a mandar la variable load con la vista solicitada por el usuario-->
  <li><a href="?load=inicio">Inicio</a></li>
  <li><a href="?load=registrar">Registrar Mascota</a></li>
  <li><a href="https://google.com">Salir</a></li>
  </ul>
</nav>
<br>
<main>
  <section>
      <!--Aqui va el código para cargar la vista del formulario solicitado-->
      <?php 
          //Unir el archivo enrutador.php a la vista del index para llamra la clase Enrutador 
          include_once ('./app/controlador/enrutador.php');
          //Crear variable para instanciar la clase Enrutador y asi poder acceder al metodo loadView(cargar vista)
          $enrutador = new Enrutador();
          //Condicion para validar que la variable por GET llamada load si llega vacia darle una ruta osea inicio
          if (!isset($_GET['load'])) {
              $_GET['load'] = 'inicio';
              //llamar la funcion cargar vista(loadView) para enviar la vista solicitada por el usuario
              $enrutador->loadView($_GET['load']);
          }else{
              $enrutador->loadView($_GET['load']);
          }
      ?>
  </section>
</main>

<footer>
  Derechos reservados &copy; CENSA 2024
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/datatables.min.js"></script>
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/sweetalert.min.js"></script>
    <script src="./public/js/funciones.js"></script>
  </body>
</html>