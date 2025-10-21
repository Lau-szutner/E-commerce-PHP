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

<section class="container pt-5" id="detalleDeProducto">
    <h2>Detalle del producto:</h2>
    <div class="row">   
        <picture class="col-md-6">
        <img src="<?= "{$producto->getImagen()}"; ?>" alt="<?= $producto->getNombre(); ?>">
        </picture>
        <article class="col-md-6">
            <h3><?php echo $producto->getNombre(); ?></h3>
            <p><?php echo $producto->getDescripcion(); ?></p>
            <p><?php echo '$' . $producto->getPrecio(); ?></p>
            <p><?php echo $producto->getDisponibilidad() ? 'DISPONIBLE' : 'SIN STOCK'; ?></p>
        </article>
    </div>
    <article class="infoProducto row">
        <h4>Descripción</h4>
        <div><?php echo $producto->getCuerpo(); ?></div>
    </article>
</section>