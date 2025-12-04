<?php
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';

$categorias = (new Categoria)->todos();

$producto = (new Producto)->productoPorId($_GET['producto_id']);
$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

$datosGuardados = $_SESSION['datosGuardados'] ?? [];
unset($_SESSION['datosGuardados']);

?>


<section class="container mt-5 mb-5">

    <h1 class="pt-5">Editar los datos del producto</h1>

    <form action="acciones/producto-editar.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="producto_id" value="<?= htmlspecialchars($producto->getProducto_id()); ?>">
            <!-- NOMBRE -->
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($datosGuardados['nombre'] ?? $producto->getNombre()); ?>">
            <?php
            if (isset($errores['nombre'])):
            ?>
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['nombre']; ?>
                </div>
            <?php
            endif;
            ?>
        </div>

        <div>
            <!-- DESCRIPCION -->

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese una descripción corta del producto aquí"><?= htmlspecialchars($datosGuardados['descripcion'] ?? $producto->getDescripcion()); ?></textarea>
            <?php
            if (isset($errores['descripcion'])):
            ?>
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['descripcion']; ?>
                </div>
            <?php
            endif;
            ?>
        </div>

        <div>
            <!-- CUERPO -->

            <label for="cuerpo">Cuerpo</label>
            <textarea id="cuerpo" name="cuerpo" class="form-control" placeholder="Ingrese una descripción más detallada. Añada toda la información relevante sobre el producto."><?= htmlspecialchars($datosGuardados['cuerpo'] ?? $producto->getCuerpo()); ?></textarea>
        </div>

        <div>
            <!-- PRECIO -->
            <label for="precio">Precio</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" id="precio" name="precio" class="form-control" value="<?= $datosGuardados['precio'] ?? $producto->getPrecio(); ?>">
            </div>



            <?php
            if (isset($errores['precio'])):
            ?>
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['precio']; ?>
                </div>
            <?php
            endif;
            ?>
        </div>

        <div>
            <!-- DISPONIBILIDAD -->

            <label for="disponibilidad">Disponibilidad</label>
            <input type="number" id="disponibilidad" class="form-control" name="disponibilidad" value="<?= htmlspecialchars($datosGuardados['nombre'] ?? $producto->getDisponibilidad()); ?>">

            <p class="ayuda-formulario mb-0">Si el producto esta disponible ingresa "1". </p>
            <p class="ayuda-formulario">Si el producto <strong>NO</strong> está disponible ingresa "0".</p>

        </div>

        <div>
            <label for="categoria_id">Categoría</label>
            <!-- CATEGORIA -->
            <select name="categoria_id" id="categoria_id" class="form-select">
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria->getCategoria_id(); ?>"
                        <?= ($categoria->getCategoria_id() == ($datosGuardados['categoria_id'] ?? $producto->getCategoria_id())) ? 'selected' : null; ?>>
                        <?= htmlspecialchars($categoria->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <!-- IMAGEN -->

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">

            <p class="ayuda-formulario">Si deseas conservar la imagen actual no realices cambios, de lo contrario subí tu nueva imagen. </p>

        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-dark mt-3">Actualizar datos</button>
        </div>
    </form>
</section>