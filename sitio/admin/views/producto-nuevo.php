<?php
require_once __DIR__ . '/../../clases/Categoria.php';
require_once __DIR__ . '/../../clases/Producto.php';

$categorias = (new Categoria)->todos();


$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

$datosGuardados = $_SESSION['datosGuardados'] ?? [];
unset($_SESSION['datosGuardados']);

?>


<section class="container mt-5 mb-5">

    <h1 class="pt-5">Añadir nuevo producto</h1>

    <form action="acciones/producto-anadir.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($datosGuardados['nombre'] ?? ''); ?>" >
            <?php
                if(isset($errores['nombre'])):
            ?>  
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['nombre']; ?>
                </div>
            <?php
                endif;
            ?>   
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese una descripción corta del producto aquí"><?= htmlspecialchars($datosGuardados['descripcion'] ?? '') ?></textarea>
            <?php
                if(isset($errores['descripcion'])):
            ?>  
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['descripcion']; ?>
                </div>
            <?php
                endif;
            ?>   
        </div>

        <div>
            <label for="cuerpo">Cuerpo</label>
            <textarea id="cuerpo" name="cuerpo" class="form-control" placeholder="Ingrese una descripción más detallada. Añada toda la información relevante sobre el producto."><?= htmlspecialchars($datosGuardados['cuerpo'] ?? '') ?></textarea>
        </div>

        <div>
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="<?= $datosGuardados['precio'] ?? null;?>" >
            <?php
                if(isset($errores['precio'])):
            ?>  
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['precio']; ?>
                </div>
            <?php
                endif;
            ?> 
        </div>

        <div>
            <label for="disponibilidad">Disponibilidad</label>
            <input type="number" id="disponibilidad" class="form-control" name="disponibilidad" value="<?= htmlspecialchars($datosGuardados['disponibilidad'] ?? '') ?>" >
        </div>

        <div>
        <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-select">
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria->getCategoria_id(); ?>" <?= ($categoria->getCategoria_id() == ($datosGuardados['categoria_id'] ?? null)) ? 'selected' : null; ?>>
                        <?= htmlspecialchars($categoria->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen">
        </div>

        <button type="submit" class="button">Añadir</button>    
    </form>
</section>