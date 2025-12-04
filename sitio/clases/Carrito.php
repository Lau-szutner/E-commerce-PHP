<?php
session_start();

require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Producto.php';

class Carrito
{
  /**
   * Devuelve todo el carrito
   */
  public static function obtenerCarrito(): array
  {
    return $_SESSION['carrito'] ?? [];
  }

  /**
   * Agregar un producto al carrito
   */
  public static function add_item(int $productoID, int $cantidad): void
  {
    // Asegurar que el carrito exista
    if (!isset($_SESSION['carrito'])) {
      $_SESSION['carrito'] = [];
    }

    // Obtener el producto desde la BD
    $productoObj = (new Producto)->productoPorId($productoID);

    // Evitar errores si no existe el producto
    if (!$productoObj) {
      return;
    }

    // Si el producto ya existe, solo aumentar la cantidad
    if (isset($_SESSION['carrito'][$productoID])) {
      $_SESSION['carrito'][$productoID]['cantidad'] += $cantidad;
      return;
    }

    // Si no existe, agregarlo
    $_SESSION['carrito'][$productoID] = [
      'producto_id' => $productoObj->getProducto_id(),
      'nombre'      => $productoObj->getNombre(),
      'precio'      => $productoObj->getPrecio(),
      'imagen'      => $productoObj->getImagen(),
      'cantidad'    => $cantidad
    ];
  }

  /**
   * Eliminar un producto del carrito
   */
  public static function remove_item(int $productoID): void
  {
    if (isset($_SESSION['carrito'][$productoID])) {
      unset($_SESSION['carrito'][$productoID]);
    }
  }

  /**
   * Vaciar el carrito completo
   */
  public static function clear_items(): void
  {
    $_SESSION['carrito'] = [];
  }

  /**
   * Actualizar cantidades (desde un formulario)
   */
  public static function actualizar_cantidades(array $cantidades): void
  {
    foreach ($cantidades as $productoID => $cantidad) {
      if (isset($_SESSION['carrito'][$productoID])) {
        $_SESSION['carrito'][$productoID]['cantidad'] = (int)$cantidad;
      }
    }
  }

  /**
   * Calcular precio total del carrito
   */
  public static function precio_total(): float
  {
    $total = 0;

    if (!empty($_SESSION['carrito'])) {
      foreach ($_SESSION['carrito'] as $item) {
        $total += $item['precio'] * $item['cantidad'];
      }
    }

    return $total;
  }
}
