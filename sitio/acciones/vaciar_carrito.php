<?php
session_start();

require_once __DIR__ . '/../clases/Conexion.php';
require_once __DIR__ . '/../clases/Producto.php';
require_once __DIR__ . '/../clases/Carrito.php';




Carrito::clear_items();


// Redirecciono al carrito
header("Location: ../index.php?seccion=carrito");
exit;
