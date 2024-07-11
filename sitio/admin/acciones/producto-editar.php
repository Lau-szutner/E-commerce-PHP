<?php
require_once __DIR__ . '/../../clases/Producto.php';
session_start();

// Validación de existencia de producto_id en el POST
if (!isset($_POST['producto_id']) || !is_numeric($_POST['producto_id'])) {
    $_SESSION['feedback-mensaje'] = "ID de producto no válido.";
    $_SESSION['feedback-tipo'] = "error";
    header("Location: ../views/producto-editar.php?producto_id=" . $_POST['producto_id']);
    exit;
}

$producto_id = (int)$_POST['producto_id'];

// Obtener el producto por su ID
$producto = (new Producto)->productoPorId($producto_id);

if (!$producto) {
    $_SESSION['feedback-mensaje'] = "El producto con ID $producto_id no existe.";
    $_SESSION['feedback-tipo'] = "error";
    header("Location: ../views/producto-editar.php?producto_id=" . $producto_id);
    exit;
}

// Captura de los datos del formulario si se ha enviado
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$cuerpo = $_POST['cuerpo'] ?? '';
$precio = $_POST['precio'] ?? 0;
$disponibilidad = $_POST['disponibilidad'] ?? 0;
$categoria_id = $_POST['categoria_id'] ?? null;
$imagen = $_FILES['imagen']['name'] ?? '';

// Validaciones de los campos
$errores = [];
if (empty($nombre)) {
    $errores['nombre'] = "El nombre es obligatorio.";
}
if (empty($descripcion)) {
    $errores['descripcion'] = "La descripción es obligatoria.";
}
if (empty($precio) || $precio <= 0) {
    $errores['precio'] = "El precio debe ser un número positivo.";
}
if ($categoria_id === null) {
    $errores['categoria_id'] = "La categoría es obligatoria.";
}

// Si hay errores
if (count($errores) > 0) {
    $_SESSION['feedback-mensaje'] = "Corrige los errores antes de continuar.";
    $_SESSION['feedback-tipo'] = "error";
    $_SESSION['errores'] = $errores;
    $_SESSION['datosGuardados'] = $_POST;
    header("Location: ../views/producto-editar.php?producto_id=" . $producto_id);
    exit;
}

// Procesamiento de la imagen
if ($imagen) {
    $rutaImagen = '../../img/productos/' . basename($imagen);
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
        $errores['imagen'] = "Hubo un problema al subir la imagen.";
        $_SESSION['feedback-mensaje'] = "Hubo un problema al subir la imagen.";
        $_SESSION['feedback-tipo'] = "error";
        $_SESSION['errores'] = $errores;
        $_SESSION['datosGuardados'] = $_POST;
        header("Location: ../views/producto-editar.php?producto_id=" . $producto_id);
        exit;
    }
    $producto->setImagen($imagen);
}

try {
    // Actualización del producto
    $producto->setNombre($nombre);
    $producto->setDescripcion($descripcion);
    $producto->setCuerpo($cuerpo);
    $producto->setPrecio($precio);
    $producto->setDisponibilidad($disponibilidad);
    $producto->setCategoria_id($categoria_id);

    $resultado = $producto->actualizar();

    if ($resultado) {
        $_SESSION['feedback-mensaje'] = "El producto se actualizó correctamente.";
        $_SESSION['feedback-tipo'] = "success";
        header("Location: ../views/producto-editar.php?producto_id=" . $producto_id);
        exit;
    } else {
        $_SESSION['feedback-mensaje'] = "Hubo un problema al actualizar el producto.";
        $_SESSION['feedback-tipo'] = "error";
        header("Location: ../views/producto-editar.php?producto_id=" . $producto_id);
        exit;
    }
} catch (Exception $e) {
    $_SESSION['feedback-mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['feedback-tipo'] = "error";
    header("Location: ../views/producto-editar.php?producto_id=" . $producto_id);
    exit;
}
