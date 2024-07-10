<?php

require_once __DIR__ . '/../../clases/Producto.php';
require_once __DIR__ . '/../../clases/Conexion.php';
session_start();
//captura de los datos del form 
$nombre         = $_POST['nombre'];
$descripcion    = $_POST['descripcion'];
$cuerpo         = $_POST['cuerpo'];
$precio         = $_POST['precio'];
$disponibilidad = $_POST['disponibilidad'];
$categoria_id   = $_POST['categoria_id'];
$imagen         = $_FILES['imagen'];


//validacion de datos 

$errores = [];

//validando los campos
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

    //recuperar datos (en caso de errores por ejemplo)
    $_SESSION['datosGuardados'] = $_POST;
    header('Location: ../index.php?seccion=producto-nuevo');
    exit;
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
        'imagen'        => $nombreImagen ?? null,
        'usuario_fk'    => 1
    ]);
    
    //redirecciona a otra pantalla
    //variables de sesion:  manera de almacenar información sobre un usuario a lo largo de su visita a un sitio web.
    $_SESSION['mensajeFeedback'] = 'El producto fue añadido exitosamente!';
    $_SESSION['mensajeFeedbackTipo'] = "success";
    header('Location: ../index.php?seccion=productos');
    exit;
} catch (Exception $th) {
    $_SESSION['mensajeFeedback'] = "El producto no se pudo publicar correctamente";
    $_SESSION['mensajeFeedbackTipo'] = "danger";
    header('Location: ../index.php?seccion=producto-nuevo');
    exit;
}






?>