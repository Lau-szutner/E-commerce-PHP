<?php

// funciones de productos

function productosTodos(): array
{
    $jsonProductos = __DIR__ . '/../data/productos.json';
    $jsonString = file_get_contents($jsonProductos);
    return $productos = json_decode($jsonString, true);
}


function productoPorId(int $id): array|null
{
    //poner base de datos. 
    //trae todas los productos y filtra la que coincide con el argumento 

    $productos = productosTodos();
    foreach ($productos as $producto) {
        if ($producto['id'] === $id) {
            return $producto;
        }
    };
}

/*

*/