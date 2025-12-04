<?php

require_once __DIR__ . '/../../clases/Categoria.php';
$categorias = new Categoria();
$categorias = $categorias->todos();
?>

<section id="sectionProductos">
  <h1>Administracion de las categorías de los productos</h1>
  <table class="col table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Categoría</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($categorias as $categoria) :
      ?>
        <tr>
          <td><?= $categoria->getCategoria_id(); ?> </td>
          <td><?= $categoria->getNombre(); ?> </td>
          <td>
            <div class="d-flex">
              <p>botones</p>
            </div>
          </td>
        </tr>
      <?php endforeach;
      ?>
    </tbody>
  </table>

  <a href="index.php?seccion=categoria-nueva">Añadir categoría</a>
</section>