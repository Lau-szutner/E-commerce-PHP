<?php
session_start();
require_once __DIR__ . '/../../clases/Autenticacion.php';

//capturar datos del form de login

$email    = $_POST['email'];
$password = $_POST['password'];

//Validacion:
 // HACEER

$auth = new Autenticacion;
if ($auth->iniciarSesion($email, $password)){
  $_SESSION['mensajeFeedback'] = 'Hola! Bienvenido al Panel de Administracion de Paw Petshop';
  $_SESSION['mensajeFeedBackTipo'] = 'warning';

  header('Location: ../index.php?seccion=dashboard');
  exit;
}else{
  $_SESSION['mensajeFeedback'] = 'Las datos ingresados no coinciden con nuestros registros';
  $_SESSION['mensajeFeedBackTipo'] = 'danger';

  header('Location: ../index.php?seccion=login');
  exit;
}
