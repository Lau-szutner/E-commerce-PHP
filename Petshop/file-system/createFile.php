<?php

// Crear archivos de texto

const file_name = 'probando.txt';

$contenido = 'hola mundo';

// Utiliza correctamente la constante con el signo de dólar ('$')
file_put_contents(file_name, $contenido);
