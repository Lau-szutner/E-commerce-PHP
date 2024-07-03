<?php
require_once __DIR__ . '/../../clases/Producto.php';
session_start();




$producto_id = $_GET['producto_id'];

try {
    
    if (isset($_GET['producto_id']) && is_numeric($_GET['producto_id'])) {
        $producto_id = (int)$_GET['producto_id'];  
        (new Producto())->eliminar($producto_id);

        $_SESSION['feedback-mensaje'] = "El producto ha sido eliminado";
        $_SESSION['feedback-tipo'] = "success";

        header("Location: ../index.php?seccion=productos");
        exit;
    } else {
        throw new Exception("ID de producto no válido.");
    }
} catch (\Exception $th) {
    $_SESSION['feedback-mensaje'] = "El producto no se pudo eliminar";
    $_SESSION['feedback-tipo'] = "danger";

    header("Location: ../index.php?seccion=productos");
    exit;
}

