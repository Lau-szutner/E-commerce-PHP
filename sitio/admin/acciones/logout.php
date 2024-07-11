<?php

session_start();

require_once __DIR__ . '/../../clases/Autenticacion.php';

$auth = new Autenticacion;
$auth ->cerrarSesion();

$_SESSION['mensajeFeedback']='Sesion cerrada con éxito';
$_SESSION['mensajeFeedbackTipo']='succes';

header('Location: ../index.php?seccion=login');
exit;