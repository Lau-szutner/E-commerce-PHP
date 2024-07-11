<?php
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';

$producto_id = (int)$_GET['producto_id'] ?? null;

if ($producto_id === null) {
    echo "ID de producto no válido.";
    exit;
}

$producto = (new Producto)->productoPorId($producto_id);

if (!$producto) {
    echo "El producto con ID $producto_id no existe.";
    exit;
}

$categorias = (new Categoria)->todos();

$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

$datosGuardados = $_SESSION['datosGuardados'] ?? [];
unset($_SESSION['datosGuardados']);

$mensajeFeedback = $_SESSION['feedback-mensaje'] ?? '';
$tipoFeedback = $_SESSION['feedback-tipo'] ?? '';
unset($_SESSION['feedback-mensaje']);
unset($_SESSION['feedback-tipo']);
?>

<section class="container mt-5 mb-5">
    <h1 class="pt-5">Editar Producto</h1>

    <?php if ($mensajeFeedback): ?>
        <div class="alert alert-<?= $tipoFeedback === 'success' ? 'success' : 'danger'; ?>" role="alert">
            <?= $mensajeFeedback; ?>
        </div>
    <?php endif; ?>
        
    <form action="../acciones/producto-editar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="producto_id" value="<?= $producto->getProducto_id(); ?>">
        
        <div>
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($datosGuardados['nombre'] ?? $producto->getNombre()); ?>" >
            <?php if (isset($errores['nombre'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errores['nombre']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control"><?= htmlspecialchars($datosGuardados['descripcion'] ?? $producto->getDescripcion()); ?></textarea>
            <?php if (isset($errores['descripcion'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errores['descripcion']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label for="cuerpo">Cuerpo</label>
            <textarea id="cuerpo" name="cuerpo" class="form-control"><?= htmlspecialchars($datosGuardados['cuerpo'] ?? $producto->getCuerpo()); ?></textarea>
        </div>

        <div>
            <label for="precio">Precio</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" id="precio" name="precio" class="form-control" value="<?= htmlspecialchars($datosGuardados['precio'] ?? $producto->getPrecio()); ?>" >
            </div>
            <?php if (isset($errores['precio'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errores['precio']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label for="disponibilidad">Disponibilidad</label>
            <input type="number" id="disponibilidad" class="form-control" name="disponibilidad" value="<?= htmlspecialchars($datosGuardados['disponibilidad'] ?? $producto->getDisponibilidad()); ?>" >
        </div>

        <div>
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-select">
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria->getCategoria_id(); ?>" <?= ($categoria->getCategoria_id() == ($datosGuardados['categoria_id'] ?? $producto->getCategoria_id())) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($categoria->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
                    
        <button type="submit" class="btn btn-primary mt-3">Actualizar Producto</button>
    </form>

    
</section>
