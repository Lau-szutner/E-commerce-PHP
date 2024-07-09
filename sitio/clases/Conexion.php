<?php 

class Conexion {
    protected const DB_SERVER = "localhost";
    protected const DB_USER = "root";
    protected const DB_PASS = "root";
    protected const DB_NAME = "dw3_fernandezszutner_merlo";
    protected const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";
    protected PDO $db_conn; //contiene la conexion a la base de datos
 

    /**
     * Constructor para Conexion que asigna valor a $db_conn
     */
    public function __construct() {
        try {
            // le asigno la conexion a la bd como valor a $db__conn 
            $this->db_conn = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);

        } catch (Exception $e) {
            echo 'error de conexion: ' . $e->getMessage();
            die ("Error al conectar con el servidor");
            //agregar un exit que redireccione a una pagina de mantenimiento. 
        }
    }

    /**
     * @return PDO conexion a la base de datos
     *  "getter" de $db_conn
     */
    public function obtenerConexion() :PDO {
        return $this->db_conn;
    } 

    
}