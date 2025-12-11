<?php
session_start();

require_once __DIR__ . '/../clases/Conexion.php';
require_once __DIR__ . '/../clases/Producto.php';
require_once __DIR__ . '/../clases/Carrito.php';

// Recibo los datos del formulario
$id = $_GET["id"] ?? false;
$q  = $_GET["q"] ?? 1;

if ($id) {
  Carrito::add_item((int)$id, (int)$q);
}

// Redirecciono al carrito
header("Location: ../index.php?seccion=carrito");
exit;
