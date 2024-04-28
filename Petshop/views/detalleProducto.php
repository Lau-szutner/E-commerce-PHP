<?php
require __DIR__.'/../biblioteca/productos.php';


//buscamos por id pedido

$producto = productoPorId($_GET['id']); 

?>

    <section id="detalle">
        <div class="row">
            <picture class="col-md-6">
                <img src=<?php echo $producto['imagen']; ?>>
            </picture>
            <article class="col-md-6">
                <h2> <?php echo $producto['nombre']; ?> </h2>
                <p><?php echo $producto['descripcion']; ?> </p>
                <p><?php echo '$'.$producto['precio']; ?></p>
                <p><?php if ($producto['disponibilidad']) {
                        echo 'DISPONIBLE';
                    } else {
                        echo 'SIN STOCK';
                    } ?> </p>
            </article>
        </div>
    </section> 
    <section class="infoProducto">
        <h3>Descripción</h3>
        <div><?= $producto['cuerpo']; ?></div>

    </section>








