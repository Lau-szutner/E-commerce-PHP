<?php
require_once __DIR__ . '/../../clases/Autenticacion.php';
require_once __DIR__ . '/../../clases/Producto.php';

session_start();






// Captura de los datos del formulario si se ha enviado
$producto_id        = $_POST['producto_id'];
$nombre             = $_POST['nombre'];
$descripcion        = $_POST['descripcion'];
$cuerpo             = $_POST['cuerpo'];
$precio             = $_POST['precio'] ?? 0;
$disponibilidad     = $_POST['disponibilidad'];
$categoria_id       = $_POST['categoria_id'];
$imagen             = $_FILES['imagen'];

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

if (!empty($imagen['tmp_name'])) {
  $nombreImagen =    date('Ymd_His_') . $imagen['name'];
  move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../img/productos/' . $nombreImagen);
}


// Si hay errores
if (count($errores) > 0) {
  $_SESSION['mensajeFeedback'] = "Hay errores en tus datos. Revisalos por favor, no cumplen con lo requerido.";
  $_SESSION['mensajeFeedbackTipo'] = "danger";
  $_SESSION['errores'] = $errores;

  //recuperar datos (en caso de errores por ejemplo)
  $_SESSION['datosGuardados'] = $_POST;
  header('Location: ../index.php?seccion=producto-editar&producto_id=' . $producto_id);
  exit;
}

//imagen


try {
  $producto = (new Producto)->productoPorId($producto_id);  //el que habiamos capturado antes

  // Actualización del producto

  (new Producto)->actualizar($producto_id, [
    'producto_id'   =>  $producto_id,
    'nombre'        => $nombre,
    'descripcion'   => $descripcion,
    'cuerpo'        => $cuerpo,
    'precio'        => $precio,
    'disponibilidad' => $disponibilidad,
    'categoria_id'  => $categoria_id,
    'imagen'        => $nombreImagen ?? $producto->getImagen()
  ]);

  if (!empty($imagen['tmp_name'])) {
    $datosActualizar['imagen'] = $nombreImagen;
  } else {
    $datosActualizar['imagen'] = $producto->getImagen();
  }

  //Redireccion
  $_SESSION['mensajeFeedback'] = "Los datos del producto fueron actualizados con éxito.";
  $_SESSION['mensajeFeedbackTipo'] = "success";

  header('Location: ../index.php?seccion=productos');
  exit;
} catch (Exception $e) {
  $_SESSION['mensajeFeedback'] = "Error: " . $e->getMessage();
  $_SESSION['mensajeFeedbackTipo'] = "danger";
  header("Location: ../views/producto-editar.php&producto_id=" . $producto_id);
  exit;
}
