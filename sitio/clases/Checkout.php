<?php
require_once __DIR__ . '/Conexion.php';

class Checkout
{
  public static function insert_checkout_date(array $datosCompra, array $datosProducto)
  {
    $conn = (new Conexion)->obtenerConexion();
    $query = "INSERT INTO compras VALUES(NULL, :id_usuario, :fecha, :importe)";
  }
}
