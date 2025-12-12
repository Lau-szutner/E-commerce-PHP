<?php

require_once __DIR__ . '/Conexion.php';

class Usuario
{
  protected $usuario_id;
  protected $rol;
  protected $email;
  protected $password;


  public function porId(int $id): ?self
  {
    $conn = (new Conexion)->obtenerConexion();

    $consulta = "SELECT * FROM usuarios
                WHERE usuario_id = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->execute([$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
    $usuario = $stmt->fetch();

    if (!$usuario) return null;

    return $usuario;
  }

  public function porEmail(string $email): ?self
  {
    $conn = (new Conexion)->obtenerConexion();

    $consulta = "SELECT * FROM usuarios
                WHERE email = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->execute([$email]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
    $usuario = $stmt->fetch();

    if (!$usuario) {
      // No existe el usuario.
      return null;
    }

    return $usuario;
  }






  /**
   * Get the value of usuario_id
   */
  public function getUsuario_id()
  {
    return $this->usuario_id;
  }

  /**
   * Set the value of usuario_id
   *
   * @return  self
   */
  public function setUsuario_id($usuario_id)
  {
    $this->usuario_id = $usuario_id;

    return $this;
  }

  /**
   * Get the value of rol
   */
  public function getRol()
  {
    return $this->rol;
  }

  /**
   * Set the value of rol
   *
   * @return  self
   */
  public function setRol($rol)
  {
    $this->rol = $rol;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function sjetEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }
}
