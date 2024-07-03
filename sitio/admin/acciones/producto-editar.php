<?php
require_once __DIR__ . '/../../clases/Producto.php';
session_start();




$producto_id = $_GET['producto_id'];






// Captura de los datos del formulario
$producto_id = $_GET['producto_id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cuerpo = $_POST['cuerpo'];
$precio = $_POST['precio'];

$categoria_id = $_POST['categoria_id'];

$errores = [];

// Validaciones de los campos
if (empty($nombre)) {
    $errores['nombre'] = "El nombre no puede quedar vacío.";
}

if (empty($descripcion)) {
    $errores['descripcion'] = "La descripción no puede quedar vacía.";
}

if (empty($cuerpo)) {
    $errores['cuerpo'] = "El cuerpo no puede quedar vacío.";
}

if ($precio <= 0) {
    $errores['precio'] = "El precio debe ser mayor que cero.";
}

if (empty($categoria_id)) {
    $errores['categoria'] = "La categoría debe seleccionarse.";
}

if (count($errores) > 0) {
    $_SESSION['feedback-mensaje'] = "Corrige los errores antes de continuar.";
    $_SESSION['feedback-tipo'] = "error";
    $_SESSION['errores'] = $errores;
    $_SESSION['data-vieja'] = $_POST;
    header("Location: ../editar-producto.php?id=" . $producto_id);
    exit;
}



try {
    // Actualización del producto
    $producto = new Producto();
    $producto->getProducto_id($producto_id);
    $producto->getNombre($nombre);
    $producto->getDescripcion($descripcion);
    $producto->getCuerpo($cuerpo);
    $producto->getPrecio($precio);
    $producto->getDisponibilidad($disponibilidad);
    $producto->getCategoria_id($categoria_id);

    $resultado = $producto->actualizar();

    if ($resultado) {
        $_SESSION['feedback-mensaje'] = "El producto se actualizó correctamente.";
        $_SESSION['feedback-tipo'] = "success";
        header("Location: ../index.php?seccion=productos");
        exit;
    } else {
        $_SESSION['feedback-mensaje'] = "Hubo un problema al actualizar el producto.";
        $_SESSION['feedback-tipo'] = "error";
        header("Location: ../editar-producto.php?id=" . $idProducto);
        exit;
    }
} catch (Exception $e) {
    $_SESSION['feedback-mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['feedback-tipo'] = "error";
    header("Location: ../editar-producto.php?id=" . $idProducto);
    exit;
}
?>