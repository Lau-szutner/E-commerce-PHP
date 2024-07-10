<?php

require_once __DIR__ . '/../../clases/Producto.php';
require_once __DIR__ . '/../../clases/Conexion.php';
session_start();


$producto = (new Producto)->productoPorId($_GET['producto_id']);
// Captura de los datos del formulario
$producto_id    = $_GET['producto_id'];
$nombre         = $_POST['nombre'];
$descripcion    = $_POST['descripcion'];
$cuerpo         = $_POST['cuerpo'];
$precio         = $_POST['precio'];
$disponibilidad = $_POST['disponibilidad'];
$categoria_id   = $_POST['categoria_id'];
$imagen         = $_FILES['imagen'];


// Validación de datos
$errores = [];

// Validando los campos
if(empty($nombre)) {
    $errores['nombre'] = 'El nombre no puede quedar vacío';
} 

if(empty($descripcion)){
    $errores['descripcion'] = 'La descripción no puede quedar vacía';
}

if(empty($precio)) {
    $errores['precio'] = 'El precio debe contener un valor';
}

if (!empty($imagen['tmp_name'])){
    $nombreImagen =    date('Ymd_His_') . $imagen['name'];
    move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../img/productos/' . $nombreImagen);
}

if (count($errores) > 0) {
    $_SESSION['mensajeFeedback'] = "Hay errores en tus datos. Revisalos por favor, no cumplen con lo requerido.";
    $_SESSION['mensajeFeedbackTipo'] = "danger";
    $_SESSION['errores'] = $errores;

    // Recuperar datos (en caso de errores por ejemplo)
    $_SESSION['datosGuardados'] = $_POST;
    header('Location: ../index.php?seccion=producto-editar');
    exit;
}

// Subida de imagen

try {
    // Instanciamos la clase Producto
   

    // Asignamos los datos al objeto Producto
    $producto->setProducto_id($_GET['producto_id']);
    $producto->setNombre($nombre);
    $producto->setCategoria_id($categoria_id);
    $producto->setDescripcion($descripcion);
    $producto->setPrecio($precio);
    $producto->setDisponibilidad($disponibilidad);
   
    $producto->setCuerpo($cuerpo ?? null);

    // Actualizamos el producto en la base de datos
    $producto->actualizar();

    // Mensaje de éxito y redirección
    $_SESSION['mensajeFeedback'] = 'El producto fue actualizado exitosamente!';
    $_SESSION['mensajeFeedbackTipo'] = "success";
    header('Location: ../index.php?seccion=productos');
    exit;
} catch (Exception $th) {
    $_SESSION['mensajeFeedback'] = "El producto no se pudo actualizar correctamente";
    $_SESSION['mensajeFeedbackTipo'] = "danger";
    header('Location: ../index.php?seccion=producto-editar');
    exit;
}