<?php 

$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);

$datosGuardados = $_SESSION['datosGuardados'] ?? [];
unset($_SESSION['datosGuardados']);


?>


<section>
    <h1>Iniciar al Panel de Administración</h1>

    <form action="acciones/login.php" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($datosGuardados['email'] ?? ''); ?>">
        <?php
                if(isset($errores['email'])):
            ?>  
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['email']; ?>
                </div>
            <?php
                endif;
            ?>  

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" >
        <?php
                if(isset($errores['password'])):
            ?>  
                <div class="alert alert alert-danger" role="alert">
                    <?= $errores['password']; ?>
                </div>
            <?php
                endif;
            ?>  

        <button type="submit" class="button"> Ingresar </button>

    </form>
</section>