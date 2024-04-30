<?php

// funciones de productos

function productosTodos(): array
{
    return [
        [
            'id' => 1,
            'nombre' => 'Pelota para comestibles',
            'categoria' => 'Juguetes',
            'descripcion' => 'Pelota de goma con un compartimento para snacks para perros',
            'precio' => 9.99,
            'disponibilidad' => true,
            'imagen' => 'img/productos/pelota.png',
        ],
        [
            'id' => 2,
            'nombre' => 'Comedero',
            'categoria' => 'Accesorios',
            'descripcion' => 'Plato de acero inoxidable para comida de mascotas',
            'precio' => 5.50,
            'disponibilidad' => true,
            'imagen' => 'img/productos/comedero.png',
        ],
        [
            'id' => 3,
            'nombre' => 'Correa 5 mt',
            'categoria' => 'Accesorios',
            'descripcion' => 'Correa extensible de 5 metros para perros',
            'precio' => 15.99,
            'disponibilidad' => true,
            'imagen' => 'img/productos/correa5mt.png',
        ],
        [
            'id' => 4,
            'nombre' => 'Correa extensible 15 mt',
            'categoria' => 'Accesorios',
            'descripcion' => 'Correa extensible de 15 metros para perros',
            'precio' => 25.99,
            'disponibilidad' => true,
            'imagen' => 'img/productos/correaExtensible.png',
        ],
        [
            'id' => 5,
            'nombre' => 'Cama talle único',
            'categoria' => 'Camas',
            'descripcion' => 'Cama acolchada y suave para perros y gatos de todos los tamaños',
            'precio' => 35.00,
            'disponibilidad' => false,
            'imagen' => 'img/productos/cama.png',
        ],
        [
            'id' => 6,
            'nombre' => 'Rascador para gatos',
            'categoria' => 'Juguetes',
            'descripcion' => 'Rascador de sisal para gatos para afilar uñas y jugar',
            'precio' => 20.99,
            'disponibilidad' => true,
            'imagen' => 'img/productos/rascador.png',
        ],
        [
            'id' => 7,
            'nombre' => 'Juguete para gatos',
            'categoria' => 'Juguetes',
            'descripcion' => 'Juguete interactivo con plumas para gatos',
            'precio' => 12.50,
            'disponibilidad' => true,
            'imagen' => 'img/productos/juegueteGatos.png',
        ],
        [
            'id' => 8,
            'nombre' => 'Alimento para perros adulto',
            'categoria' => 'Alimentos',
            'descripcion' => 'Comida balanceada para perros adultos de todas las razas',
            'precio' => 40.00,
            'disponibilidad' => true,
            'imagen' => 'img/productos/alimentoPerroAdulto.png',
        ],
        [
            'id' => 9,
            'nombre' => 'Alimento para perro cachorro',
            'categoria' => 'Alimentos',
            'descripcion' => 'Fórmula especial para perros pequeños en crecimiento',
            'precio' => 45.00,
            'disponibilidad' => true,
            'imagen' => 'img/productos/alimentoPerroCachorro.png',
        ],
        [
            'id' => 10,
            'nombre' => 'Piedras sanitarias para gatos',
            'categoria' => 'Higiene',
            'descripcion' => 'Arena absorbente para bandeja de arena de gatos',
            'precio' => 8.99,
            'disponibilidad' => false,
            'imagen' => 'img/productos/piedrasSanitarias.png',
        ],
        [
            'id' => 11,
            'nombre' => 'Cepillo',
            'categoria' => 'Accesorios',
            'descripcion' => 'Rasqueta para la limpieza de pelo de mascotas en muebles',
            'precio' => 14.99,
            'disponibilidad' => true,
            'imagen' => 'img/productos/cepillo.png',
        ],
    ];
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