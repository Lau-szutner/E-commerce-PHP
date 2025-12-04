<?php
require_once __DIR__ . '/../clases/Producto.php';

// Buscar por id pedido
$productoObj = new Producto();
$producto = $productoObj->productoPorId((int)$_GET['id']);

if (!$producto) {
  echo "Producto no encontrado.";
  exit;
}
?>

<section class="container" id="detalleDeProducto">
  <h1>Detalle del producto:</h1>
  <div class="row">
    <picture class="col-md-6">
      <img src="<?= "img/productos/{$producto->getImagen()}"; ?>" alt="<?= $producto->getNombre(); ?>">
    </picture>
    <article class="col-md-6">
      <h2><?php echo $producto->getNombre(); ?></h2>
      <p><?php echo $producto->getDescripcion(); ?></p>
      <p><?php echo '$' . $producto->getPrecio(); ?></p>
      <p><?php echo $producto->getDisponibilidad() ? 'DISPONIBLE' : 'SIN STOCK'; ?></p>

      <form action="acciones/agregar_al_carrito.php" method="GET" class="d-flex align-items-center gap-3 my-3">

        <input type="hidden" name="id" value="<?= $producto->getProducto_id() ?>">

        <div class="input-group" style="width:200px;">
          <span class="input-group-text">Cantidad</span>
          <input type="number" class="form-control" name="q" value="1" min="1">
        </div>

        <button class="btn btn-primary">
          Agregar al carrito
        </button>

      </form>



    </article>
  </div>
  <article class="infoProducto row">
    <h3>Descripción</h3>
    <div><?php echo $producto->getCuerpo(); ?></div>
  </article>
</section>