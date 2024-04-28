<?php
// require __DIR__.'/../data/productos.php';
require __DIR__.'/../biblioteca/productos.php';
$productos = productosTodos();
?>



<h1>Productos</h1>
<section class=" container" id="productoSeccion">
    <div class= "row d-flex">
    <?php
    foreach ($productos as $producto) { // acá irian los dos puntos del foreach pero debo tener activado una extension porque VSC me lo autocorrige
        ?>
        
        <div class="card col-md-4">
            <article class="contenidoCard">
                <picture class="item">
                    <img src=<?php echo $producto['imagen']; ?> alt="<?php echo $producto['nombre']; ?>">                 
                <a href="index.php?seccion=detalleProducto&id=<?php echo $producto['id']; ?>">
                    <h2> <?php echo $producto['nombre']; ?> </h2>
                </a>
                <p><?php echo $producto['descripcion']; ?> </p>
                <p><?php echo '$'.$producto['precio']; ?></p>
                <p><?php if ($producto['disponibilidad']) {
                    echo 'DISPONIBLE';
                } else {
                    echo 'SIN STOCK';
                } ?> </p>
            </article>
            <a href="index.php?seccion=detalleProducto&id=<?php echo $producto['id']; ?>"><button>Ver Detalle</button></a>
            <button>Comprar</button>
        </div>
        

    <?php
    } // esto sería el endforeach pero debo tener activado una extension porque VSC me lo autocorrige
?>
</div>
</section>