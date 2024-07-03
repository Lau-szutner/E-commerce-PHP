<?php
require_once __DIR__ . '/../../clases/Categoria.php';
$categorias = (new Categoria)->todos();

$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

?>


<section class="container mt-5 mb-5">

    <h1 class="pt-5">Añadir nuevo producto</h1>

    <form action="acciones/producto-anadir.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre">
            <?php
                if(isset($errores['nombre'])):
            ?>  
                <div class="msg-error"><span class="visually-hidden">Error: </span><?= $errores['nombre'];?></div>
            <?php
                endif;
            ?>   
        </div>
        <div>
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion">
        </div>
        <div>
            <label for="cuerpo">Cuerpo</label>
            <input type="text" id="cuerpo" name="cuerpo">
        </div>
        <div>
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio">
        </div>
        <div>
            <label for="disponibilidad">Disponibilidad</label>
            <input type="number" id="disponibilidad" name="disponibilidad">
        </div>
        <div>
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id">
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria->getCategoria_id();?>"> 
                        <?= $categoria->getNombre(); ?>
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