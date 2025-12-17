<?php

require_once __DIR__ . '/Conexion.php';

class Categoria
{
  protected int $categoria_id;
  protected string $nombre;

  /* =========================
     OBTENER TODAS
  ========================= */
  public static function todos(): array
  {
    $conn = (new Conexion)->obtenerConexion();
    $sql = "SELECT * FROM categoria ORDER BY nombre";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /* =========================
     CREAR
  ========================= */
  public static function crear(string $nombre): void
  {
    $conn = (new Conexion)->obtenerConexion();

    $consulta = "INSERT INTO categoria (nombre) VALUES (?)";
    $stmt = $conn->prepare($consulta);
    $stmt->execute([$nombre]);
  }


  /* =========================
     ELIMINAR
  ========================= */
  public static function eliminar(int $id): bool
  {
    $conn = (new Conexion)->obtenerConexion();
    $sql = "DELETE FROM categoria WHERE categoria_id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id]);
  }

  /* =========================
     GETTERS
  ========================= */
  public function getCategoria_id(): int
  {
    return $this->categoria_id;
  }

  public function getNombre(): string
  {
    return $this->nombre;
  }
}
