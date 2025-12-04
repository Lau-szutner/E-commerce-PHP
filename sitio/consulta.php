<?php


require_once './Conexion.php';
$conn = (new Conexion)->obtenerConexion();

$consulta = "SELECT * FROM producto";

//preparacion de la consulta: 
$stmt = $conn->prepare($consulta);
$stmt->execute();

$stmt->fetch(PDO::FETCH_ASSOC);


$productos = [];

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $productos[] = $fila;
}

foreach ($productos as $producto) {
  extract($producto);
  echo 'Nombre:' . $nombre . '<br>';
}
