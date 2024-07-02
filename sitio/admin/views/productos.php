<?php
// require __DIR__.'/../data/productos.php';
//require __DIR__.'/../biblioteca/productos.php';
//$productos = productosTodos();

require_once __DIR__ . '/../../clases/Producto.php';
$productosObj = new Producto();
$productos = $productosObj->productosTodos();
?>

<section id="sectionProductos" class="container-fluid d-flex flex-column align-items-center">
    <h1 class="p-5">Administracion de productos </h1>

    <div class="row"><a href="index.php?seccion=producto-nuevo">Añadir producto</a> </div>
        <table class="col table"> 
            <thead>   
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Disponibilidad</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody>
                <?php 
                foreach ($productos as $producto) :
                ?>
                <tr>
                    <td><?= $producto->getProducto_id(); ?> </td>
                    <td><?= $producto->getNombre(); ?> </td>
                    <td><?= $producto->getPrecio(); ?> </td>
                    <td><?= $producto->getDisponibilidad(); ?> </td>
                    <td><?= $producto->getDescripcion(); ?> </td>
                    <td><img src= " <?= '../img/' . $producto->getImagen();?>" alt="" </td>
                    <td> Ya lo vamos a hacer&trade; </td>
                </tr>
            <?php endforeach; ?>
            </tbody> 

            
        </table>
</section>


