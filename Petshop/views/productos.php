<?php
// require __DIR__.'/../data/productos.php';
require __DIR__ . '/../biblioteca/productos.php';
$productos = productosTodos();
?>


<section id="sectionProductos" class="container-fluid d-flex flex-column align-items-center">
    <h1 class="p-5">Productos</h1>

    <div class="container row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
        <?php
        foreach ($productos as $producto) { // acá irian los dos puntos del foreach pero debo tener activado una extension porque VSC me lo autocorrige
        ?>
            <div class="col">
                <div class="card">
                    <article class="contenidoCard">
                        <picture class="item">
                            <img src=<?php echo $producto['imagen']; ?> alt="<?php echo $producto['nombre']; ?>">
                        </picture>
                        <a id="link" href="index.php?seccion=detalleProducto&id=<?php echo $producto['id']; ?>">
                            <h2> <?php echo $producto['nombre']; ?> </h2>
                        </a>
                        <div>
                            <p><?php echo $producto['descripcion']; ?> </p>
                            <p><?php echo '$' . $producto['precio']; ?></p>
                            <p><?php if ($producto['disponibilidad']) {
                                    echo 'DISPONIBLE';
                                } else {
                                    echo 'SIN STOCK';
                                } ?> </p>
                        </div>
                        <a class="productos-btn text-center" href="index.php?seccion=detalleProducto&id=<?php echo $producto['id']; ?>"> <button>Ver Detalle</button></a>


                        <button class="productos-btn">Comprar</button>
                    </article>
                </div>
            </div>


        <?php
        } // esto sería el endforeach pero debo tener activado una extension porque VSC me lo autocorrige
        ?>

    </div>
</section>