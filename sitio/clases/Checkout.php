<?php
require_once __DIR__ . '/Conexion.php';

class Checkout
{
  public static function insert_checkout_data(array $datosCompra, array $datosProducto): bool
  {
    $conexion = (new Conexion)->obtenerConexion();


    try {
      // 🔐 Iniciar transacción
      $conexion->beginTransaction();

      // 1️⃣ Insertar compra
      $queryCompra = "
        INSERT INTO compras (id_usuario, fecha, importe)
        VALUES (:id_usuario, :fecha, :importe)
      ";

      $stmt = $conexion->prepare($queryCompra);
      $stmt->execute([
        'id_usuario' => $datosCompra['id_usuario'],
        'fecha'      => $datosCompra['fecha'],
        'importe'    => $datosCompra['importe'],
      ]);

      $compraId = $conexion->lastInsertId();

      // 2️⃣ Insertar productos
      $queryItem = "
        INSERT INTO item_x_compra (compra_id, producto_id, cantidad)
        VALUES (:compra_id, :producto_id, :cantidad)
      ";

      $stmtItem = $conexion->prepare($queryItem);

      foreach ($datosProducto as $productoId => $cantidad) {
        $stmtItem->execute([
          'compra_id'   => $compraId,
          'producto_id' => $productoId,
          'cantidad'    => $cantidad,
        ]);
      }

      // ✅ Confirmar todo
      $conexion->commit();
      return true;
    } catch (Exception $e) {
      // ❌ Revertir si algo falla
      $conexion->rollBack();
      return false;
    }
  }
}
