<?php

require_once __DIR__ . '/../../clases/Categoria.php';
$categorias = new Categoria();
$categorias = $categorias->todos();
?>

<section id="" class="container-fluid d-flex flex-column align-items-center">

    <h2 class="p-5">Administracion de las categorías de los productos</h2>

    <div class="row p-3">
        <a href="index.php?seccion=categoria-nueva" class="btn btn-dark btn-hover-agrandar">Añadir categoría</a>
    </div>

    <table class="col table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Categoría</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categorias as $categoria) :
            ?>
                <tr>
                    <td><?= $categoria->getCategoria_id(); ?> </td>
                    <td><?= $categoria->getNombre(); ?> </td>
                    <td>
                        <div class="d-flex">
                            <p>botones</p>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</section>