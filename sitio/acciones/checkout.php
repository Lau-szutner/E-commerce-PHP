<?php

session_start();

require_once __DIR__ . '/../clases/Carrito.php';
require_once __DIR__ . '/../clases/Checkout.php';

$items  = Carrito::obtenerCarrito();
$userID = $_SESSION['loggedIn']['id'] ?? false;

try {

  // No logueado → login del admin
  if (!$userID) {
    $_SESSION['mensajeFeedback'] = "Tu sesión expiró. Iniciá sesión nuevamente.";
    $_SESSION['mensajeFeedbackTipo'] = "warning";
    header("Location: ../admin/index.php?seccion=login");
    exit;
  }

  //  Carrito vacío → carrito público
  if (empty($items)) {
    $_SESSION['mensajeFeedback'] = "El carrito está vacío.";
    $_SESSION['mensajeFeedbackTipo'] = "warning";
    header("Location: ../index.php?seccion=carrito");
    exit;
  }

  // Datos de la compra
  $datosCompra = [
    "id_usuario" => $userID,
    "fecha"      => date("Y-m-d H:i:s"),
    "importe"    => Carrito::precio_total()
  ];

  //  Detalle
  $detalleCompra = [];
  foreach ($items as $productoId => $item) {
    $detalleCompra[$productoId] = $item["cantidad"];
  }

  Checkout::insert_checkout_data($datosCompra, $detalleCompra);

  Carrito::clear_items();


  $_SESSION['mensajeFeedback'] = "La compra se realizó correctamente. Nos pondremos en contacto con usted para coordinar el envío.";
  $_SESSION['mensajeFeedbackTipo'] = "success";
  header("Location: ../admin/index.php?seccion=panel-usuario");
  exit;
} catch (Exception $e) {


  $_SESSION['mensajeFeedback'] = "No se pudo finalizar la compra.";
  $_SESSION['mensajeFeedbackTipo'] = "danger";
  header("Location: ../index.php?seccion=carrito");
  exit;
}
