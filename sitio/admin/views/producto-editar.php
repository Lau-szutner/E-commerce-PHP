<?php
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';

$categorias = (new Categoria)->todos();
$producto = (new Producto)->productoPorId($_GET['producto_id']);

$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);
$dataVieja = $_SESSION['data-vieja'] ?? [];

?>

<section class="container mt-5 mb-5">

    <h1 class="pt-5">Editar producto</h1>

    <form action="acciones/producto-editar.php?id=<?= $producto->getProducto_id(); ?>" method="post" enctype="multipart/form-data">
            <div class="form-fila">
                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="<?= $dataVieja['nombre'] ?? $producto->getNombre(); ?>"
                    aria-describedby="help-nombre error-nombre"
                >
                <div id="help-nombre" class="form-help">Mínimo 3 caracteres</div>
                <div id="error-nombre">
                <?php if (isset($errores['nombre'])): ?>
                    <div class="msg-error"><span class="visually-hidden">Error: </span><?= $errores['nombre']; ?></div>
                <?php endif; ?>
                </div>
            </div>
            <div class="form-fila">
                <label for="descripcion">Descripción</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="form-control"
                    aria-describedby="error-descripcion"
                ><?= $dataVieja['descripcion'] ?? $producto->getDescripcion(); ?></textarea>
                <div id="error-descripcion">
                <?php if (isset($errores['descripcion'])): ?>
                    <div class="msg-error"><span class="visually-hidden">Error: </span><?= $errores['descripcion']; ?></div>
                <?php endif; ?>
                </div>
            </div>
            <div class="form-fila">
                <label for="cuerpo">Cuerpo</label>
                <textarea
                    id="cuerpo"
                    name="cuerpo"
                    class="form-control"
                    aria-describedby="error-cuerpo"
                ><?= $dataVieja['cuerpo'] ?? $producto->getCuerpo(); ?></textarea>
                <div id="error-cuerpo">
                <?php if (isset($errores['cuerpo'])): ?>
                    <div class="msg-error"><span class="visually-hidden">Error: </span><?= $errores['cuerpo']; ?></div>
                <?php endif; ?>
                </div>
            </div>
            <div class="form-fila">
                <label for="precio">Precio</label>
                <input
                    type="number"
                    step="0.01"
                    id="precio"
                    name="precio"
                    class="form-control"
                    value="<?= $dataVieja['precio'] ?? $producto->getPrecio(); ?>"
                >
                <div id="error-precio">
                <?php if (isset($errores['precio'])): ?>
                    <div class="msg-error"><span class="visually-hidden">Error: </span><?= $errores['precio']; ?></div>
                <?php endif; ?>
                </div>
            </div>
            <div class="form-fila">
                <label for="disponibilidad">Disponibilidad</label>
                <select
                    id="disponibilidad"
                    name="disponibilidad"
                    class="form-control"
                >
                    <option value="1" <?= $producto->getDisponibilidad() ? 'selected' : ''; ?>>Disponible</option>
                    <option value="0" <?= !$producto->getDisponibilidad() ? 'selected' : ''; ?>>No Disponible</option>
                </select>
            </div>
            <div class="form-fila">
                <label for="imagen">Imagen <span class="small normal">(opcional)</span></label>
                <input type="file" id="imagen" name="imagen" class="form-control" aria-describedby="help-imagen">
                <div class="form-help" id="help-imagen">Solo elige una imagen si deseas cambiar la actual.</div>
            </div>
            
            <div class="form-fila">
                <label for="categoria_id">Categoría</label>
                <select
                    id="categoria_id"
                    name="categoria_id"
                    class="form-control"
                >
                <?php
                foreach ($categorias as $categoria):
                ?>
                    <option 
                        value="<?= $categoria->getCategoria_id(); ?>"
                        <?= $categoria->getCategoria_id() == ($dataVieja['categoria_id'] ?? $producto->getCategoria_id()) ? "selected" : null; ?>
                    >
                        <?= $categoria->getNombre(); ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="button">Actualizar</button>
        </form>
    </section>