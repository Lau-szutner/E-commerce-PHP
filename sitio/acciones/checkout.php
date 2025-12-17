<?php
session_start();

require_once __DIR__ . '/../clases/Carrito.php';
require_once __DIR__ . '/../clases/Checkout.php';

$items = Carrito::obtenerCarrito();
$userID = $_SESSION['loggedIn']['id'] ?? false;

try {

  if (!$userID) {
    $_SESSION['mensajeFeedback'] = "Tu sesión expiró. Iniciá sesión nuevamente.";
    $_SESSION['mensajeFeedbackTipo'] = "warning";
    header("Location: ../index.php?seccion=login");
    exit;
  }

  if (empty($items)) {
    $_SESSION['mensajeFeedback'] = "El carrito está vacío.";
    $_SESSION['mensajeFeedbackTipo'] = "warning";
    header("Location: ../index.php?seccion=carrito");
    exit;
  }

  $datosCompra = [
    "id_usuario" => $userID,
    "fecha"      => date("Y-m-d H:i:s"),
    "importe"    => Carrito::precio_total()
  ];

  $detalleCompra = [];
  foreach ($items as $productoId => $item) {
    $detalleCompra[$productoId] = $item["cantidad"];
  }

  Checkout::insert_checkout_data($datosCompra, $detalleCompra);

  Carrito::clear_items();

  $_SESSION['mensajeFeedback'] = "Compra realizada correctamente.";
  $_SESSION['mensajeFeedbackTipo'] = "success";
  header("Location: ../index.php?seccion=panel_usuario");
  exit;
} catch (Exception $e) {

  $_SESSION['mensajeFeedback'] = "No se pudo finalizar la compra.";
  $_SESSION['mensajeFeedbackTipo'] = "danger";
  header("Location: ../index.php?seccion=carrito");
  exit;
}
