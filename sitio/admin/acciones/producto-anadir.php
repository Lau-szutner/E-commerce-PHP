<?php

require_once __DIR__ . '/../../clases/Producto.php';
session_start();
//captura de los datos del form 
$nombre         = $_POST['nombre'];
$descripcion    = $_POST['descripcion'];
$cuerpo         = $_POST['cuerpo'];
$precio         = $_POST['precio'];
$disponibilidad = $_POST['disponibilidad'];
$categoria_id   = $_POST['categoria_id'];
//$imagen = $_POST['imagen'];



//validacion de datos 

$errores = [];

//validando los campos
if(empty($nombre)) {
    $errores ['nombre'] = 'El nombre no puede quedar vacío';
}

if(empty($precio)) {
    $errores ['precio'] = 'El precio debe contener un valor';
}

if(empty($categoria_id)) {
    $errores ['categoria'] = 'La categoria debe contener un';
}

if (count($errores) > 0) {
    $SESSION ['feedback-msj'] = "Hay errores en tus datos. Revisalos por favor ya que no cumplen con lo requerido.";
    $SESSION['feedback-tipo'] = "error";
    
    $_SESSION['errores'] = $errores;
}


//subida de imagen 

try { //anadir con clase Producto
    (new Producto)->crear([
        'nombre'        => $nombre,
        'descripcion'   => $descripcion,
        'cuerpo'        => $cuerpo,
        'precio'        => $precio,
        'disponibilidad'=> $disponibilidad,
        'categoria_id'  => $categoria_id,
        'imagen'        => " ",
        'usuario_fk'    => 1
    ]);
    //redirecciona a otra pantalla
    $_SESSION ['mensajeFeedback'] = 'El producto fue añadido exitosamente';
    header('Location: ../index.php?seccion=productos');
    exit;
} catch (Exception $th) {
    header('Location: ../index.php?seccion=producto-nuevo');
}






?>