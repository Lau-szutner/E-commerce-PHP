<?php
//copia del index
session_start();

require_once __DIR__ . '/../clases/Autenticacion.php';
$rutas = [
  'dashboard' => [
    'titulo' => 'Panel',
  ],
  'productos' => [
    'titulo' => 'Productos',
    ],
  'login' => [
    'titulo' => 'Iniciar sesion',
  ],
  '404' => [
    'titulo' => 'Página no Encontrada',
  ],
  'producto-eliminar' => [
    'titulo' => 'Eliminar Producto',
  ],
  'producto-nuevo' => [
    'titulo' => 'Añadir Producto',
  ],
  'producto-editar' => [
    'titulo' => 'Editar producto',
  ],
  'categorias' => [
    'titulo' => 'Categorías',
  ],
  'categoria-nueva' => [
    'titulo' => 'Añadir Categoría',
  ]

];

$vista = $_GET['seccion'] ?? 'dashboard';

// Verificamos si la vista que nos están pidiendo se permite.
if (!isset($rutas[$vista])) {
    $vista = '404';
}

// Obtenemos las opciones/configuración de la ruta que corresponden a esta vista.
$rutaConfig = $rutas[$vista];

// Autenticacion
$auth = new Autenticacion;


$mensajeFeedback = $_SESSION['mensajeFeedback'] ?? null;
unset($_SESSION['mensajeFeedback']);

$mensajeFeedbackTipo = $_SESSION['mensajeFeedbackTipo'] ?? 'info';
unset($_SESSION['mensajeFeedbackTipo']);

?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rutaConfig['titulo']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../img/icons/favicon.png">
    <link rel="stylesheet" href="../css/home.css">
  </head>
	
  <body class="mt-5">
    <header>
      <nav class="navbar navbar-expand-md fixed-top px-5">
        <?php
        if($auth->estaAutenticado()):
        ?>
          <div class="container-fluid d-flex justify-content-between">
            <a href="index.php?seccion=home" class="d-inline-flex link-body-emphasis text-decoration-none fs-5">
              <img src="../img/logoInvertido.png" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon" id="ol"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mx-auto">
                <li><a href="index.php?seccion=dashboard" class="nav-link px-2 text-black">Panel</a></li>
                <li><a href="index.php?seccion=productos" class="nav-link px-2 text-black">Productos</a></li>
                <li><a href="index.php?seccion=categorias" class="nav-link px-2 text-black">Categorías</a></li>
              </ul>
            </div>
            <div class="login">
              <form action="acciones/logout.php" class="d-flex" method="post"> 
                <button type="submit"  class="btn btn-outline-dark ">Log out</button>
              </form>
            </div>
          </div>
        <?php
        endif;
        ?>
            

        <div class="login">
            <form class="d-flex"> 
              <button class="btn btn-outline-dark ">Login</button>
            </form>
        </div>
      </nav>
    </header>

    <main class="mt-5">
      <?php
      if($mensajeFeedback !== null):
      ?>

        <div class="alert alert-<?=$mensajeFeedbackTipo; ?> alert-dismissible fade show " role="alert">
          <strong><?= $mensajeFeedback;?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>

      <?php
      endif;
      ?> 

      <?php
      require __DIR__.'/views/'.$vista.'.php';
      ?>

    </main>

    <footer id="footer">
      <div class="infoFooter d-flex flex-column align-items-center p-5">
        <picture>
          <img src="../img/logo2.png" alt="logo">
        </picture>
        <p>PAW Petshop
        <p>
        <div class="iconos d-flex gap-5">
          <a href="#"><img src="../img/icons/facebook.png" alt="icono de facebook"></a>
          <a href="#"><img src="../img/icons/instagram.png" alt="icono de instagram"></a>
          <a href="#"><img src="../img/icons/youtube.png" alt="icono de youtube"></a>
        </div>
      </div>
    </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>