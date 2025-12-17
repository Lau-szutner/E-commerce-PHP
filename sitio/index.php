<?php


$rutas = [
  'home' => [
    'titulo' => 'Programacion II Parcial 1',
  ],
  'productos' => [
    'titulo' => 'Productos',
  ],
  'servicios' => [
    'titulo' => 'Nuestros Servicios',
  ],
  'contacto' => [
    'titulo' => 'Contactanos',
  ],
  '404' => [
    'titulo' => 'Página no Encontrada',
  ],
  'detalleProducto' => [
    'titulo' => 'Detalle del Producto',
  ],
  'carrito' => [
    'titulo' => 'carrito',
  ],
  'checkout' => [
    'titulo' => 'Checkout',
  ],



];

$vista = $_GET['seccion'] ?? 'home';

// Verificamos si la vista que nos están pidiendo se permite.
if (!isset($rutas[$vista])) {
  $vista = '404';
}

// Obtenemos las opciones/configuración de la ruta que corresponden a esta vista.
$rutaConfig = $rutas[$vista];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $rutaConfig['titulo']; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="./img/icons/favicon.png">
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/home.css">
  <link rel="stylesheet" href="./css/admin.css">

</head>

<body>
  <header id="header1">
    <nav class="navbar navbar-expand-md px-5 ">
      <div class="container-fluid d-flex justify-content-between">
        <a href="index.php?seccion=home" class="d-inline-flex link-body-emphasis text-decoration-none fs-5">
          <img src="img/logoInvertido.png" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" id="ol"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mx-auto">
            <li><a href="index.php?seccion=home" class="nav-link px-2 text-black btn-hover-agrandar">Home</a></li>
            <li><a href="index.php?seccion=productos" class="nav-link px-2 text-black btn-hover-agrandar">Productos</a></li>
            <li><a href="index.php?seccion=servicios" class="nav-link px-2 text-black btn-hover-agrandar">Servicios</a></li>
            <li><a href="index.php?seccion=contacto" class="nav-link px-2 text-black btn-hover-agrandar">Contacto</a></li>
          </ul>
        </div>

        <div id="login" class="d-flex gap-2">
          <li><a href="index.php?seccion=carrito" class="btn btn-outline-dark">Carrito</a></li>
          <a href="./admin/index.php?seccion=login" class="btn btn-outline-dark">Login</a>
        </div>

      </div>
    </nav>
  </header>

  <main>
    <?php
    require __DIR__ . '/views/' . $vista . '.php';
    ?>
  </main>

  <footer id="footer">
    <div class="infoFooter d-flex flex-column align-items-center p-5">
      <picture>
        <img src="img/logo2.png" alt="logo">
      </picture>
      <p>PAW Petshop</p>
      <div class="iconos d-flex gap-5">
        <a href="#"><img src="img/icons/facebook.png" alt="icono de facebook"></a>
        <a href="#"><img src="img/icons/instagram.png" alt="icono de instagram"></a>
        <a href="#"><img src="img/icons/youtube.png" alt="icono de youtube"></a>

      </div>
    </div>

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>