<?php 

class Conexion {
    public const DB_SERVER = "localhost";
    public const DB_USER = "root";
    public const DB_PASS = "root";
    public const DB_NAME = "dw3_fernandezszutner_merlo";
    public const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";

    public function obtenerConexion(): PDO {
        try {
            //objeto de la clase PDO
            $conn = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        
        
            //configurar el modo de excepcion
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion establecida";
        
        } catch (PDOException $error) {
            echo 'error de conexion: ' . $error->getMessage();
            die ("Error al conectar con el servidor");
            //agregar un exit que redireccione a una pagina de mantenimiento. 
        }
        return $conn;
    }
}