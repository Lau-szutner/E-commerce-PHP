<?php

require_once __DIR__ . '/Conexion.php';


class Categoria
{
  protected int      $categoria_id;
  protected string   $nombre;

  /**
   * @return self[]
   */

  public function todos(): array
  {
    $conn = (new Conexion)->obtenerConexion();
    $consulta = "SELECT * FROM categoria";
    $stmt = $conn->prepare($consulta);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
    return $stmt->fetchAll();
  }

  public function categoriaPorId()
  {
    $conn = (new Conexion)->obtenerConexion();
    $consulta = "SELECT * FROM categoria
                    WHERE categoria_id = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->execute([$this->categoria_id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,);
  }



  /**
   * Get the value of categoria_id
   */
  public function getCategoria_id()
  {
    return $this->categoria_id;
  }

  /**
   * Set the value of categoria_id
   *
   * @return  self
   */
  public function setCategoria_id($categoria_id)
  {
    $this->categoria_id = $categoria_id;

    return $this;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }
}
