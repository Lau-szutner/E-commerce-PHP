<?php
require_once __DIR__ . '/../../clases/Categoria.php';
$categorias = (new Categoria)->todos();


$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

?>


<section class="container mt-5 mb-5">

  <h1 class="pt-5">Añadir nueva categoria</h1>

  <form action="acciones/categoria-anadir.php" method="post" enctype="multipart/form-data">
    <div>
      <label for="nombre">Nombre de la categoría nueva:</label>
      <input type="text" id="nombre" name="nombre">
      <?php
      if (isset($errores['nombre'])):
      ?>
        <div class="msg-error"><span class="visually-hidden">Error: </span><?= $errores['nombre']; ?></div>
      <?php
      endif;
      ?>
    </div>

    <button type="submit" class="button">Añadir</button>
  </form>
</section>