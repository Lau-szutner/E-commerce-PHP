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

<section class="container mt-5" id="detalleDeProducto">
    <div class="row d-flex flex-column align-items-center">
        <div class="col">
            <h1 class="text-center">Eliminar producto</h1>
            <h2 class="text-center">¿Confirma que desea eliminar este producto?</h2>
            <p class="text-center">Tenga en cuenta que eliminar este producto es una acción irreversible</p>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <form action="acciones/producto-eliminar.php?producto_id=<?= $producto->getProducto_id(); ?>" method="get" class="mb-3">
                <input type="hidden" name="producto_id" value="<?= $producto->getProducto_id(); ?>">
                <button class="btn btn-danger">Sí, quiero eliminar el producto</button>
            </form>
            <a href="index.php?seccion=productos" class="btn btn-warning">No, volver al panel de productos</a>
        </div>
    </div>
    <div class="row pt-5">
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