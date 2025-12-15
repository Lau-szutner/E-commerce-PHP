<?php

require_once __DIR__ . '/Conexion.php';

class Usuario
{
  protected $usuario_id;
  protected $rol;
  protected $email;
  protected $password;

  /* =========================
     MÉTODOS DE CONSULTA
     ========================= */

  public static function porId(int $id): ?self
  {
    $conn = (new Conexion)->obtenerConexion();

    $stmt = $conn->prepare(
      "SELECT * FROM usuario WHERE usuario_id = ?"
    );
    $stmt->execute([$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

    return $stmt->fetch() ?: null;
  }


  public static function usuario_x_email(string $email): ?self
  {
    $conn = (new Conexion)->obtenerConexion();

    $stmt = $conn->prepare(
      "SELECT * FROM usuario WHERE email = ?"
    );
    $stmt->execute([$email]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

    return $stmt->fetch() ?: null;
  }

  /* =========================
     GETTERS & SETTERS
     ========================= */

  public function getUsuario_id()
  {
    return $this->usuario_id;
  }

  public function setUsuario_id($usuario_id): self
  {
    $this->usuario_id = $usuario_id;
    return $this;
  }

  public function getRol()
  {
    return $this->rol;
  }

  public function setRol($rol): self
  {
    $this->rol = $rol;
    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email): self
  {
    $this->email = $email;
    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password): self
  {
    $this->password = $password;
    return $this;
  }
}
