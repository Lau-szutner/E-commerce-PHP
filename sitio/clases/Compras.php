<?php
require_once __DIR__ . '/Conexion.php';

class Compras
{
  /**
   * Devuelve todas las compras de un usuario
   */
  public static function getByUser(int $idUsuario): array
  {
    $conexion = (new Conexion)->obtenerConexion();

    $query = "
      SELECT *
      FROM compras
      WHERE id_usuario = :id_usuario
      ORDER BY fecha DESC
    ";

    $stmt = $conexion->prepare($query);
    $stmt->execute(["id_usuario" => $idUsuario]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Devuelve el detalle (productos) de una compra
   */
  public static function getDetalle(int $idCompra): array
  {
    $conexion = (new Conexion)->obtenerConexion();

    $query = "
      SELECT p.nombre, p.precio, ix.cantidad
      FROM item_x_compra ix
      INNER JOIN producto p ON p.producto_id = ix.producto_id
      WHERE ix.compra_id = :id_compra
    ";

    $stmt = $conexion->prepare($query);
    $stmt->execute(["id_compra" => $idCompra]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
