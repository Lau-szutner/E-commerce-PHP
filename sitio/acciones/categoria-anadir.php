<?php
session_start();

require_once __DIR__ . '/../clases/Categoria.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../index.php?seccion=categorias');
  exit;
}

$nombre = trim($_POST['nombre'] ?? '');

if ($nombre === '') {
  $errores['nombre'] = 'El nombre de la categoría es obligatorio.';
} elseif (strlen($nombre) < 3) {
  $errores['nombre'] = 'El nombre debe tener al menos 3 caracteres.';
}

if (!empty($errores)) {
  $_SESSION['errores'] = $errores;
  header('Location: ../index.php?seccion=categoria-nueva');
  exit;
}


Categoria::crear($nombre);


$_SESSION['mensajeFeedback'] = 'Categoría creada correctamente.';
$_SESSION['mensajeFeedbackTipo'] = 'success';


header('Location: ../index.php?seccion=categorias');
exit;
