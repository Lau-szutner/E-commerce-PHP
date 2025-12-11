<?php
session_start();

require_once __DIR__ . '/../clases/Carrito.php';

// Procesar el formulario de cantidades
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cantidades = $_POST['cantidad'] ?? [];

  // Normalizar/sanitizar: convertir a enteros y asegurar mínimo 1
  $filtradas = [];
  foreach ($cantidades as $id => $q) {
    $id = (int)$id;
    $q = (int)$q;
    if ($id <= 0) continue;
    if ($q < 1) $q = 1;
    $filtradas[$id] = $q;
  }

  // Actualizar carrito
  Carrito::actualizar_cantidades($filtradas);
}

// Redireccionar de vuelta al carrito
header('Location: ../index.php?seccion=carrito');
exit;
