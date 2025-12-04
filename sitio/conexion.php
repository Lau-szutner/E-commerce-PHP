<?php

// datos de la base 

const DB_SERVER = "localhost";
const DB_USER = "root";
const DB_PASS = "root";
const DB_NAME = "dw3_fernandezszutner_merlo";

const DB_DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

// conexion 
try {
  //objeto de la clase PDO
  $conn = new PDO(DB_DSN, DB_USER, DB_PASS);


  //configurar el modo de excepcion
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "conexion establecida";
} catch (PDOException $error) {
  echo 'error de conexion: ' . $error->getMessage();
  die("Error al conectar con el servidor");
  //agregar un exit que redireccione a una pagina de mantenimiento. 
}
