<?php

session_start();

require_once __DIR__ . '/../../clases/Autenticacion.php';

$auth = new Autenticacion;
$auth::log_out();

$_SESSION['mensajeFeedback'] = 'Sesion cerrada con éxito';
$_SESSION['mensajeFeedbackTipo'] = 'succces';

header('Location: ../index.php?seccion=login');
exit;
