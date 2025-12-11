<?php
require_once __DIR__ . '/../../clases/Producto.php';
require_once __DIR__ . '/../../clases/Autenticacion.php';


session_start();

$auth = new Autenticacion;
if($requiereAutenticacion && !$auth->estaAutenticado()) {
    $_SESSION['mensajeFeedback'] = "Se necesita haber iniciado sesion para tener acceso a esta pantalla";
    $_SESSION['mensajeFeedbackTipo'] = "danger";
    header("Location: index.php?seccion=login");
    exit;
  }


$producto_id = $_GET['producto_id']; // el form es por POST, pero como es la PK, debemos buscarla por GET 

try {
    
    $producto = (new Producto)->productoPorId($producto_id);
    if ($producto) {
        // Si se encuentra el producto, llamar al método eliminar() en ese objeto
        $producto->eliminar();
        $_SESSION['mensajeFeedback'] = "El producto ha sido eliminado exitosamente";
        $_SESSION['mensajeFeedbackTipo'] = "success";
    }else {
        $_SESSION['mensajeFeedback'] = "El producto no se encontró";
        $_SESSION['mensajeFeedbackTipo'] = "danger";
    }

    header("Location: ../index.php?seccion=productos");
    
} catch (\Exception $th) {
    $_SESSION['mensajeFeedback'] = "El producto no se pudo eliminar";
    $_SESSION['mensajeFeedbackTipo'] = "danger";

    header("Location: ../index.php?seccion=productos");
    exit;
}

