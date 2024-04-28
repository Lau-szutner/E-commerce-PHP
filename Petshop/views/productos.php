<?php
// require __DIR__.'/../data/productos.php';
require __DIR__.'/../biblioteca/productos.php';
$productos = productosTodos();
?>



<h1 class="text-center">Productos</h1>
<section id="sectionProductos" class="container">
    <div class="row row-cols-1 row-cols-md-3">
    
    <?php
    foreach ($productos as $producto) { // acá irian los dos puntos del foreach pero debo tener activado una extension porque VSC me lo autocorrige
        ?>
        <div class="col"> 
            <div class="card">
                <article class="contenidoCard">
                    <picture class="item">
                        <img src=<?php echo $producto['imagen']; ?> alt="<?php echo $producto['nombre']; ?>"> 
                    </picture>                
                    <a href="index.php?seccion=detalleProducto&id=<?php echo $producto['id']; ?>">
                        <h2> <?php echo $producto['nombre']; ?> </h2>
                    </a>
                    <div>
                        <p><?php echo $producto['descripcion']; ?> </p>
                        <p><?php echo '$'.$producto['precio']; ?></p>
                        <p><?php if ($producto['disponibilidad']) {
                            echo 'DISPONIBLE';
                        } else {
                            echo 'SIN STOCK';
                        } ?> </p>
                    </div>
                
                    <a href="index.php?seccion=detalleProducto&id=<?php echo $producto['id']; ?>"><button>Ver Detalle</button></a>
                    <button>Comprar</button>
                </article>
            </div>
        </div>
        

    <?php
    } // esto sería el endforeach pero debo tener activado una extension porque VSC me lo autocorrige
?>

</div>
</section>