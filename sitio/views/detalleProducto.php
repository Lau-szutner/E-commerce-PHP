<?php
require_once __DIR__ . '/../clases/Producto.php';


// Validar que venga ID por GET
$idProducto = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($idProducto <= 0) {
  echo "<div class='alert alert-danger'>Producto no válido.</div>";
  exit;
}

// Buscar producto por ID
$productoObj = new Producto();
$producto = $productoObj->productoPorId($idProducto);

if (!$producto) {
  echo "<div class='alert alert-warning'>Producto no encontrado.</div>";
  exit;
}
?>

<section class="container my-5" id="detalleDeProducto">
  <h1 class="mb-4">Detalle del producto</h1>

  <div class="row g-4">
    <!-- Imagen del producto -->
    <div class="col-md-6">
      <img src="<?= htmlspecialchars("img/productos/{$producto->getImagen()}") ?>"
        alt="<?= htmlspecialchars($producto->getNombre()) ?>"
        class="img-fluid rounded shadow-sm">
    </div>

    <!-- Información del producto -->
    <div class="col-md-6">
      <h2><?= htmlspecialchars($producto->getNombre()) ?></h2>
      <p class="text-muted"><?= htmlspecialchars($producto->getDescripcion()) ?></p>
      <p class="fs-4 fw-bold">$<?= number_format($producto->getPrecio(), 2) ?></p>
      <p class="<?= $producto->getDisponibilidad() ? 'text-success' : 'text-danger' ?>">
        <?= $producto->getDisponibilidad() ? 'DISPONIBLE' : 'SIN STOCK' ?>
      </p>

      <!-- Formulario para agregar al carrito -->
      <form action="acciones/agregar_al_carrito.php" method="GET"
        class="d-flex align-items-center gap-3 my-3">

        <input type="hidden" name="id" value="<?= $producto->getProducto_id() ?>">

        <div class="input-group" style="width: 150px;">
          <span class="input-group-text">Cantidad</span>
          <input type="number" name="q" class="form-control" value="1" min="1">
        </div>

        <button type="submit" class="btn btn-primary btn-hover-agrandar">
          Agregar al carrito
        </button>
      </form>
    </div>
  </div>
</section>

<style>
  /* Pequeña animación hover para el botón */
  .btn-hover-agrandar {
    transition: transform 0.2s ease;
  }

  .btn-hover-agrandar:hover {
    transform: scale(1.05);
  }
</style>