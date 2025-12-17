<?php

session_start();

require_once __DIR__ . '/../clases/Autenticacion.php';
$rutas = [
  'dashboard' => [
    'titulo' => 'Panel',
    'requiereAutenticacion' => true,
  ],
  'productos' => [
    'titulo' => 'Productos',
    'requiereAutenticacion' => true,
  ],
  'login' => [
    'titulo' => 'Iniciar sesion',
  ],
  '404' => [
    'titulo' => 'Página no Encontrada',
  ],
  'producto-eliminar' => [
    'titulo' => 'Eliminar Producto',
    'requiereAutenticacion' => true,
  ],
  'producto-nuevo' => [
    'titulo' => 'Añadir Producto',
    'requiereAutenticacion' => true,

  ],
  'producto-editar' => [
    'titulo' => 'Editar producto',
    'requiereAutenticacion' => true,
  ],
  'categorias' => [
    'titulo' => 'Categorías',
    'requiereAutenticacion' => true,
  ],
  'categoria-nueva' => [
    'titulo' => 'Añadir Categoría',
    'requiereAutenticacion' => true,
  ],

  'panel-usuario' => [
    'titulo' => 'Mi panel',
    'requiereAutenticacion' => true,
  ],

  'usuarios' => [
    'titulo' => 'Usuarios',
    'requiereAutenticacion' => true,
  ],

  'categoria-eliminar' => [
    'titulo' => 'Eliminar categoría',
    'requiereAutenticacion' => true,
  ],

  'categoria-nueva' => [
    'titulo' => 'Categoria nueva',
    'requiereAutenticacion' => true,
  ],

];

$vista = $_GET['seccion'] ?? 'dashboard';


if (!isset($rutas[$vista])) {
  $vista = '404';
}

// Obtenemos las opciones/configuración de la ruta que corresponden a esta vista.
$rutaConfig = $rutas[$vista];

$requiereAutenticacion = $rutaConfig['requiereAutenticacion'] ?? false;

if ($requiereAutenticacion) {
  Autenticacion::verify(); // solo logueado
}


$mensajeFeedback = $_SESSION['mensajeFeedback'] ?? null;
unset($_SESSION['mensajeFeedback']);

$mensajeFeedbackTipo = $_SESSION['mensajeFeedbackTipo'] ?? 'warning';
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
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="mt-5 ">
  <header>
    <nav class="navbar navbar-expand-md fixed-top px-5">
      <?php if (Autenticacion::check()): ?>
        <?php $rol = $_SESSION['loggedIn']['rol']; ?>

        <ul class="navbar-nav mx-auto">

          <?php if ($rol === 'admin' || $rol === 'superadmin'): ?>
            <li><a href="index.php?seccion=dashboard" class="nav-link">Panel</a></li>
            <li><a href="index.php?seccion=productos" class="nav-link">Productos</a></li>
            <li><a href="index.php?seccion=categorias" class="nav-link">Categorías</a></li>
          <?php endif; ?>

          <?php if ($rol === 'usuario'): ?>
            <li><a href="index.php?seccion=panel-usuario" class="nav-link">Mis compras</a></li>
          <?php endif; ?>

        </ul>
      <?php endif; ?>

      <?php
      if (!Autenticacion::check()):

      ?>
        <div class="login">
          <form class="d-flex">
            <a href="../index.php?seccion=home" class="btn btn-outline-dark">Home</a>
          </form>
        </div>
    </nav>
  <?php
      endif;
  ?>


  </header>

  <main class="mt-5 p-5">
    <?php
    if ($mensajeFeedback !== null):
    ?>

      <div class="alert alert-<?= $mensajeFeedbackTipo; ?> alert-dismissible fade show " role="alert">
        <strong><?= $mensajeFeedback; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>

    <?php
    endif;
    ?>

    <?php
    require __DIR__ . '/views/' . $vista . '.php';
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