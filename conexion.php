<?php


const DB_SERVER = "localhost";
const DB_USER = "root";
// const DB_PASS = "root"; CONTRASEÑA PARA MAMP
const DB_PASS = ""; // CONTRASEÑA PARA XAMP
const DB_NAME = "dw3_fernandezszutner_merlo";

const DB_DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

try {
    $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo 'error de conexion: ' . $error->getMessage();
    die("Error al conectar con el servidor");
}
