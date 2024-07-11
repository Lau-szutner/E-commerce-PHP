<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// El resto de tu código...
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';

// Verificar si producto_id está presente en la URL y es un número
if (!isset($_GET['producto_id']) || !is_numeric($_GET['producto_id'])) {
    die('Error: producto_id no está definido o no es un número.');
}

$producto_id = (int) $_GET['producto_id']; // Convertir producto_id a un entero

$categorias = (new Categoria)->todos();
$producto = (new Producto)->productoPorId($producto_id); // Obtener el producto por su ID

$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

$datosGuardados = $_SESSION['datosGuardados'] ?? [];
unset($_SESSION['datosGuardados']);

?>

<section class="container mt-5 mb-5">
    <h1 class="pt-5">Editar Producto</h1>
    <form action="acciones/producto-editar.php" method="post" enctype="multipart/form-data">

        <div>
            <!-- NOMBRE -->
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($datosGuardados['nombre'] ?? $producto->getNombre()); ?>">
            <?php if (isset($errores['nombre'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errores['nombre']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <!-- DESCRIPCION -->
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese una descripción corta del producto aquí"><?= htmlspecialchars($datosGuardados['descripcion'] ?? $producto->getDescripcion()); ?></textarea>
            <?php if (isset($errores['descripcion'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errores['descripcion']; ?>
                </div>
            <?php endif; ?>
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
                <input type="number" id="precio" name="precio" class="form-control" value="<?= htmlspecialchars($datosGuardados['precio'] ?? $producto->getPrecio()); ?>">
            </div>
            <?php if (isset($errores['precio'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errores['precio']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <!-- DISPONIBILIDAD -->
            <label for="disponibilidad">Disponibilidad</label>
            <input type="number" id="disponibilidad" class="form-control" name="disponibilidad" value="<?= htmlspecialchars($datosGuardados['disponibilidad'] ?? $producto->getDisponibilidad()); ?>">
        </div>

        <div>
            <!-- CATEGORIA -->
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-select">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria->getCategoria_id(); ?>" <?= ($categoria->getCategoria_id() == ($datosGuardados['categoria_id'] ?? $producto->getCategoria_id())) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($categoria->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>



    </form>

    <form action="acciones/producto-editar.php" method="post">
        <input type="hidden" name="producto_id" value="<?= $producto->getProducto_id(); ?>">
        <button type="submit" class="btn btn-danger mt-3">Actualizar Productos</button>
    </form>
</section>