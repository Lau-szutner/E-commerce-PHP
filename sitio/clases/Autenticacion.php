<?php
require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Usuario.php';

class Autenticacion
{
  public static function log_in(string $email, string $password): bool
  {
    $conn = (new Conexion)->obtenerConexion();

    $consulta = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->execute([$email]);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$fila) {
      return false;
    }

    if (!password_verify($password, $fila['password'])) {
      return false;
    }

    $_SESSION['loggedIn'] = [
      'id'    => $fila['usuario_id'],
      'email' => $fila['email'],
      'rol'   => $fila['rol'] ?? 'user',
    ];

    return true;
  }

  public static function log_out(): void
  {
    session_unset();
    session_destroy();
  }

  public static function check(): bool
  {
    return isset($_SESSION['loggedIn']);
  }

  public static function verify(bool $admin = false): void
  {
    if (!self::check()) {
      $_SESSION['mensajeFeedback'] = "Debés iniciar sesión";
      $_SESSION['mensajeFeedbackTipo'] = "warning";
      header("Location: index.php?seccion=login");
      exit;
    }

    if ($admin) {
      $rol = $_SESSION['loggedIn']['rol'];

      if (!in_array($rol, ['admin', 'superadmin'])) {
        $_SESSION['mensajeFeedback'] = "No tenés permisos para acceder";
        $_SESSION['mensajeFeedbackTipo'] = "danger";
        header("Location: index.php?seccion=home");
        exit;
      }
    }
  }
}
