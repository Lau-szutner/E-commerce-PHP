<?php

// Funciones de productos

/**
 * Obtiene todos los productos desde un archivo JSON.
 *
 * @return array La lista de productos.
 */
function productosTodos(): array
{
    $jsonProductos = __DIR__ . '/../data/productos.json';

    try {
        $jsonString = file_get_contents($jsonProductos);
        if ($jsonString === false) {
            throw new Exception('No se pudo leer el archivo JSON.');
        }

        $productos = json_decode($jsonString, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error al decodificar el JSON: ' . json_last_error_msg());
        }

        return $productos;
    } catch (Exception $e) {
        // Manejo del error: podrías registrar el error, devolver un valor predeterminado, etc.
        error_log($e->getMessage());
        return [];
    }
}

/**
 * Obtiene un producto por su ID.
 *
 * @param int $id El ID del producto.
 * @return array|null El producto si se encuentra, o null si no.
 */
function productoPorId(int $id): ?array
{
    // Cargar todos los productos
    $productos = productosTodos();

    // Buscar el producto por ID
    foreach ($productos as $producto) {
        if ($producto['id'] === $id) {
            return $producto;
        }
    }

    // Devolver null si no se encuentra el producto
    return null;
}
