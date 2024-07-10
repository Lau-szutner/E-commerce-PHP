<?php

require_once __DIR__ . '/../../clases/Producto.php';
$productosObj = new Producto();
$productos = $productosObj->productosTodos();

?>

<section id="sectionProductos" class="container-fluid d-flex flex-column align-items-center">
    <h1 class="p-5">Administración de productos </h1>

    <div class="row">
        <a href="index.php?seccion=producto-nuevo">Añadir producto</a> 
    </div>
    <table class="col table"> 
        <thead>   
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Disponibilidad</th>
                <th>Descripción</th>
                <th>Categoría</th>
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
                <td><?= $producto->getCategoria_id(); ?> </td>
                <td><img src="<?= "../img/productos/{$producto->getImagen()}"; ?>"  alt="<?= $producto->getNombre(); ?>" ><td> 
                    <div class="d-flex">
                        <a href="index.php?seccion=producto-editar&producto_id=<?= $producto->getProducto_id(); ?>" class="btn btn-warning mr-2">Editar</a>
                        <a href="index.php?seccion=producto-eliminar&producto_id=<?= $producto->getProducto_id(); ?>" class="btn btn-warning mr-2">Eliminar</a> 
                        
                    </div>  
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody> 

        
    </table>
</section>


