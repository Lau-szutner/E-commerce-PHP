<?php
session_start();

require_once __DIR__ . '/../clases/Producto.php';

$productosObj = new Producto();
$productos = $productosObj->productosTodos();
?>

<section id="sectionProductos" class="container-fluid py-5 d-flex flex-column align-items-center bg-light">
  <h1 class="display-4 mb-5">Productos</h1>

  <div class="container row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php foreach ($productos as $producto) : ?>
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <article class="contenidoCard d-flex flex-column h-100">

            <!-- Imagen -->
            <picture class="item">
              <img src="<?= "img/productos/{$producto->getImagen()}"; ?>"
                alt="<?= $producto->getNombre(); ?>"
                class="card-img-top img-fluid rounded-top">
            </picture>

            <!-- Nombre -->
            <a class="link text-decoration-none text-dark mt-3 px-3"
              href="index.php?seccion=detalleProducto&id=<?= $producto->getProducto_Id(); ?>">
              <h2 class="h5 fw-bold"><?= $producto->getNombre(); ?></h2>
            </a>

            <!-- Detalles -->
            <div class="px-3 mt-2 flex-grow-1">
              <p class="text-muted small"><?= $producto->getDescripcion(); ?></p>
              <p class="fw-bold fs-5">$<?= $producto->getPrecio(); ?></p>
              <p class="<?= $producto->getDisponibilidad() ? 'text-success' : 'text-danger' ?> fw-semibold">
                <?= $producto->getDisponibilidad() ? 'DISPONIBLE' : 'SIN STOCK'; ?>
              </p>
            </div>

            <!-- Botón Comprar -->
            <a class="productos-btn btn btn-primary w-100 mt-auto mb-3"
              href="index.php?seccion=detalleProducto&id=<?= $producto->getProducto_Id(); ?>">
              Comprar
            </a>

          </article>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>