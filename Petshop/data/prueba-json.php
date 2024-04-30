<?php
$json1 = file_get_contents('productos.json');
$arrayProductos = json_decode($json1, true);

// Ahora puedes acceder a los datos como lo harías con cualquier otro array asociativo en PHP
foreach ($arrayProductos as $producto) {
    echo $producto['id'] . " ";
    echo $producto['nombre'] . " ";
    echo "categoria: " . $producto['categoria'] . "<br>";
}
