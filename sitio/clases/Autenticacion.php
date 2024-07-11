<?php 
  require_once __DIR__ . '/Conexion.php';


  class Autenticacion {
    public function iniciarSesion (string $email, string $password): bool {
      $conn = (new Conexion)->obtenerConexion();

        $consulta = "SELECT * FROM usuario
                WHERE email = ?";
        $stmt = $conn->prepare($consulta);
        $stmt->execute([$email]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC); 

        if(!$fila) {

            return false;
        }

        // Verificacion del password.
        if(!password_verify($password, $fila['password'])) {
            return false;
        }

       
        $_SESSION['id'] = $fila['usuario_id'];
        return true;
    }


    public function cerrarSesion() :void {
      unset($_SESSION['id']);
    }

    public function estaAutenticado(): bool
    {
        return isset($_SESSION['id']);
    }







  }

  


?>