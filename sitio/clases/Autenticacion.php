<?php
require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Usuario.php';

class Autenticacion
{
  public function iniciarSesion(string $email, string $password): bool
  {
    $conn = (new Conexion)->obtenerConexion();

    $consulta = "SELECT * FROM usuario
                WHERE email = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->execute([$email]);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$fila) {
      return false;
    }

    // Verificacion del password.
    if (!password_verify($password, $fila['password'])) {
      return false;
    }


    $_SESSION['id'] = $fila['usuario_id'];
    return true;
  }

  public static function log_in(string $usuario, string $password): bool
  {
    $datosUsuario = Usuario::usuario_x_email($usuario);

    if (!$datosUsuario) {
      return false;
    }

    if (!password_verify($password, $datosUsuario->getPassword())) {
      return false;
    }

    $_SESSION["loggedIn"] = [
      "email" => $datosUsuario->getEmail(),
      "id"    => $datosUsuario->getUsuario_id(),
      "rol"   => $datosUsuario->getRol(),
    ];

    return true;
  }


  public static function log_out()
  {
    if (isset($_SESSION['loggedIn'])) {
      unset($_SESSION['loggedIn']);
    }
  }






  /* Solo chequea sesión (NO redirige) */
  public static function check(): bool
  {
    return isset($_SESSION['loggedIn']);
  }

  public static function verify(bool $admin = false): void
  {
    if (!isset($_SESSION['loggedIn'])) {
      $_SESSION['mensajeFeedback'] = "Se necesita haber iniciado sesión";
      $_SESSION['mensajeFeedbackTipo'] = "danger";
      header("Location: index.php?seccion=login");
      exit;
    }

    if ($admin) {
      $rol = $_SESSION['loggedIn']['rol'];

      if ($rol !== 'admin' && $rol !== 'superadmin') {
        $_SESSION['mensajeFeedback'] = "No tenés permisos para acceder a esta sección";
        $_SESSION['mensajeFeedbackTipo'] = "danger";
        header("Location: index.php?seccion=login");
        exit;
      }
    }
  }
}
