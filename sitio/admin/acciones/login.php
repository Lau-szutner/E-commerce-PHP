<?php
session_start();
require_once __DIR__ . '/../../clases/Autenticacion.php';




//capturar datos del form de login

$email    = $_POST['email'];
$password = $_POST['password'];

//Validacion:

$errores = [];

//validando los campos
if (empty($email)) {
  $errores['email'] = 'El e-mail no puede quedar vacío';
}

if (empty($password)) {
  $errores['password'] = 'La contraseña no puede quedar vacía';
}


if (count($errores) > 0) {
  $_SESSION['mensajeFeedback'] = "Hay errores en tus datos. Revisalos por favor, no cumplen con lo requerido.";
  $_SESSION['mensajeFeedbackTipo'] = "danger";
  $_SESSION['errores'] = $errores;

  //recuperar datos (en caso de errores por ejemplo)
  $_SESSION['datosGuardados'] = $_POST;
  header('Location: ../index.php?seccion=login');
  exit;
}

// HACEER

$auth = new Autenticacion;
if ($auth->iniciarSesion($email, $password)) {
  $_SESSION['mensajeFeedback'] = 'Hola! Que bueno tenerte por aquí una vez más';
  $_SESSION['mensajeFeedBackTipo'] = 'warning';

  header('Location: ../index.php?seccion=dashboard');
  exit;
} else {
  $_SESSION['mensajeFeedback'] = 'Los datos ingresados no coinciden con nuestros registros';
  $_SESSION['mensajeFeedbackTipo'] = "danger";

  header('Location: ../index.php?seccion=login');
  exit;
}
