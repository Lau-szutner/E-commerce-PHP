<?php
require_once __DIR__ . '/../../clases/Producto.php';

// Buscar por id pedido
$productoObj = new Producto();
$producto = $productoObj->productoPorId((int)$_GET['producto_id']);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}
?>

<section class="container" id="detalleDeProducto">
    <h1>Eliminar producto</h1>
    <h2>¿Confirma que desea eliminar este producto?</h2>
    <form action="acciones/producto-eliminar.php?producto_id=<?= $producto->getProducto_id(); ?>" method="get">
        <input type="hidden" name="producto_id" value="<?= $producto->getProducto_id(); ?>">
        <button class="btn btn-danger">Eliminar</button>
    </form>
    <div class="row">
        <picture class="col-md-6">
            <img src="<?= "../img/productos/{$producto->getImagen()}"; ?>" alt="<?php echo $producto->getNombre(); ?>">
        </picture>
        <article class="col-md-6">
            <h2><?php echo $producto->getNombre(); ?></h2>
            <p><?php echo $producto->getDescripcion(); ?></p>
            <p><?php echo '$' . $producto->getPrecio(); ?></p>
            <p><?php echo $producto->getDisponibilidad() ? 'DISPONIBLE' : 'SIN STOCK'; ?></p>
        </article>
    </div>
    <article class="infoProducto row">
        <h3>Descripción</h3>
        <div><?php echo $producto->getCuerpo(); ?></div>
    </article>
    
</section>