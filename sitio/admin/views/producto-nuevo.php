<?php
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$categorias = (new Categoria)->todos();

$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

$datosGuardados = $_SESSION['datosGuardados'] ?? [];
unset($_SESSION['datosGuardados']);

?>


<section class="container mt-5 mb-5">
    <h2 class="pt-5">Añadir nuevo producto</h2>

    <form action="acciones/producto-anadir.php" method="post" enctype="multipart/form-data" class="mt-3">
        <div class="mb-3">
            <label for="nombre" class="form-label d-flex flex-column">
                <span class="fw-bold">Nombre del producto:</span>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($datosGuardados['nombre'] ?? '') ?>" required>
            </label>

            <?php if(isset($errores['nombre'])): ?>
                <div class="alert alert-danger mt-2" role="alert"><?= htmlspecialchars($errores['nombre']); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label d-flex flex-column">
                <span class="fw-bold">Descripción:</span>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Ingrese una descripción corta del producto aquí" required><?= htmlspecialchars($datosGuardados['descripcion'] ?? '') ?></textarea>
            </label>

            <?php if(isset($errores['descripcion'])): ?>
                <div class="alert alert-danger mt-2" role="alert"><?= htmlspecialchars($errores['descripcion']); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="cuerpo" class="form-label d-flex flex-column">
                <span class="fw-bold">Cuerpo:</span>
                <textarea id="cuerpo" name="cuerpo" class="form-control" rows="6" placeholder="Ingrese una descripción más detallada. Añada toda la información relevante sobre el producto."><?= htmlspecialchars($datosGuardados['cuerpo'] ?? '') ?></textarea>
            </label>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label d-flex flex-column">
                <span class="fw-bold">Precio:</span>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="<?= htmlspecialchars($datosGuardados['precio'] ?? '') ?>" required>
                </div>
            </label>

            <?php if(isset($errores['precio'])): ?>
                <div class="alert alert-danger mt-2" role="alert"><?= htmlspecialchars($errores['precio']); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="disponibilidad" class="form-label d-flex flex-column">
                <span class="fw-bold">Disponibilidad:</span>
                <input type="number" id="disponibilidad" name="disponibilidad" class="form-control" value="<?= htmlspecialchars($datosGuardados['disponibilidad'] ?? '') ?>">
            </label>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label d-flex flex-column">
                <span class="fw-bold">Categoría:</span>
                <select name="categoria_id" id="categoria_id" class="form-select" required>
                    <option value="" disabled <?= empty($datosGuardados['categoria_id']) ? 'selected' : '' ?>>Seleccione una categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= htmlspecialchars($categoria->getCategoria_id()); ?>" <?= ($categoria->getCategoria_id() == ($datosGuardados['categoria_id'] ?? null)) ? 'selected' : '' ; ?>>
                            <?= htmlspecialchars($categoria->getNombre()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label d-flex flex-column">
                <span class="fw-bold">Imagen:</span>
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
            </label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-dark mt-3">Añadir</button>
        </div>
    </form>
</section>