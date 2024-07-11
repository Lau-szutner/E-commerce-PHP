<?php
// require __DIR__.'/../data/productos.php';
//require __DIR__.'/../biblioteca/productos.php';
//$productos = productosTodos();

require_once __DIR__ . '/../clases/Producto.php';
$productosObj = new Producto();
$productos = $productosObj->productosTodos();
?>
		<section id="sectionProductos" class="container-fluid d-flex flex-column align-items-center">
			<h1 class="p-5">Productos</h1>
			<div class="container row row-cols-1 row-cols-sm-2 row-cols-md-3">
				<?php foreach ($productos as $producto) : ?>
					<div class="col">
						<div class="card">
							<article class="contenidoCard">
								<picture class="item">
									<img src="<?= "img/productos/{$producto->getImagen()}"; ?>" alt="<?= $producto->getNombre(); ?>">
								</picture>
								<a class="link" href="index.php?seccion=detalleProducto&id=<?php echo $producto->getProducto_Id(); ?>">
									<h2><?php echo $producto->getNombre(); ?></h2>
								</a>
								<div>
									<p><?php echo $producto->getDescripcion(); ?></p>
									<p><?php echo '$'.$producto->getPrecio(); ?></p>
									<p><?php echo $producto->getDisponibilidad() ? 'DISPONIBLE' : 'SIN STOCK'; ?></p>
								</div>
								<a class="productos-btn text-center" href="index.php?seccion=detalleProducto&id=<?php echo $producto->getProducto_Id(); ?>">Ver Detalle</a>
								<button class="productos-btn">Comprar</button>
							</article>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
		</section>


