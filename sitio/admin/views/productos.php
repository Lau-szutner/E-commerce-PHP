<?php
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';
$productosObj = new Producto();
$productos = $productosObj->productosTodos();
$categoria = new Categoria ();


?>

<section  class="container-fluid d-flex flex-column align-items-center">
    <h1 class="p-5">Administración de productos </h1>

    <div class="row p-3">
        <a href="index.php?seccion=producto-nuevo" class="btn btn-dark btn-hover-agrandar">Añadir producto</a>
    </div>
    <div class="row">
    <table class="col table table-striped table-bordered ">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categoría</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) :
            ?>
                <tr>
                    <td><?= $producto->getProducto_id(); ?> </td>
                    <td><?= $producto->getNombre(); ?> </td>
                    <td> $<?= $producto->getPrecio(); ?> </td>
                    <td><?= $producto->getDisponibilidad(); ?> </td>
                    <td><?= $producto->getDescripcion(); ?> </td>
                    <td><?= $producto->getCategoria_id(); ?> </td>
                    <td><img src="<?= "../img/productos/{$producto->getImagen()}"; ?>" alt="<?= $producto->getNombre(); ?>" class="img-fluid img-dashboard">
                    <td>
                        <div class="d-flex flex-column">
                            <a href="index.php?seccion=producto-editar&producto_id=<?= $producto->getProducto_id(); ?>" class="btn btn-warning mr-2 btn-hover-agrandar m-1">Editar</a>
                            <a href="index.php?seccion=producto-eliminar&producto_id=<?= $producto->getProducto_id(); ?>" class="btn btn-warning mr-2 btn-hover-agrandar m-1">Eliminar</a>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>


    </table>
    </div>
</section>