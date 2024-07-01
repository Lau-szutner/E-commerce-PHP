-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 01-07-2024 a las 19:53:01
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_fernandezszutner_merlo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` tinyint(4) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `nombre`) VALUES
(1, 'Juguetes'),
(2, 'Accesorios'),
(3, 'Camas'),
(4, 'Alimentos'),
(7, 'Higiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `categoria_id` tinyint(4) UNSIGNED NOT NULL,
  `descripcion` text,
  `precio` decimal(6,2) UNSIGNED NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `cuerpo` text,
  `usuario_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `nombre`, `categoria_id`, `descripcion`, `precio`, `disponibilidad`, `imagen`, `cuerpo`, `usuario_fk`) VALUES
(1, 'Pelota para comestibles', 1, 'Pelota de goma con un compartimento para snacks para perros', '9.99', 1, 'img/productos/pelota.png', 'La pelota para comestibles es el compañero ideal para entretener y alimentar a tu mejor amigo peludo. Fabricada con goma duradera, esta pelota cuenta con un innovador compartimento diseñado para dispensar snacks para perros mientras juegan. Con su diseño divertido y funcional, esta pelota no solo promueve la actividad física y mental de tu mascota, sino que también le proporciona una deliciosa recompensa en cada rebote y lanzamiento. ¡Haz que la hora de jugar sea aún más emocionante y sabrosa para tu fiel compañero con la pelota para comestibles!', NULL),
(2, 'Comedero', 2, 'Plato de acero inoxidable para comida de mascotas', '5.50', 1, 'img/productos/comedero.png', 'El comedero de acero inoxidable para mascotas combina estilo y durabilidad para satisfacer las necesidades alimenticias de tu amigo peludo. Su diseño elegante y resistente lo convierte en la opción ideal para una alimentación segura y conveniente. ¡Haz que la hora de comer sea simple y elegante con este práctico comedero!', NULL),
(3, 'Correa 5 mt', 2, 'Correa extensible de 5 metros para perros', '15.99', 1, 'img/productos/correa5mt.png', 'La correa extensible de 5 metros para perros ofrece libertad y seguridad durante los paseos con tu mascota. Con su diseño práctico y resistente, esta correa te permite controlar la distancia mientras tu perro explora su entorno. Disfruta de paseos más largos y cómodos con esta correa que brinda comodidad y flexibilidad tanto para ti como para tu peludo compañero.\"', NULL),
(4, 'Correa extensible 15 mt', 2, 'Correa extensible de 15 metros para perros', '25.99', 1, 'img/productos/correaExtensible.png\"', 'La correa extensible de 15 metros para perros ofrece una libertad excepcional durante los paseos al aire libre. Con su diseño resistente y funcional, esta correa te permite explorar con tu mascota mientras mantienes el control. Disfruta de largos paseos sin preocupaciones, brindando a tu perro la oportunidad de moverse con comodidad y seguridad en cualquier entorno.', NULL),
(5, 'Cama talle único', 3, 'Cama acolchada y suave para perros y gatos de todos los tamaños', '35.00', 0, 'img/productos/cama.png', 'La cama tamaño único es el lugar perfecto para que perros y gatos de todos los tamaños se relajen y descansen cómodamente. Con su acolchado suave y mullido, esta cama ofrece un oasis de confort para tu mascota, sin importar su tamaño. Su diseño versátil y acogedor garantiza que tu peludo amigo tenga un lugar acogedor para dormir y recargar energías. ¡Proporciona a tu mascota el mejor lugar para descansar con esta cama acolchada y suave!', NULL),
(6, 'Rascador para gatos', 1, 'Rascador de sisal para gatos para afilar uñas y jugar\"', '20.99', 1, 'img/productos/rascador.png', 'El rascador para gatos es un accesorio esencial para el bienestar de tu felino. Fabricado con sisal resistente, este rascador ofrece a tu gato un lugar seguro y apropiado para afilar sus uñas, al tiempo que les brinda una oportunidad de juego y ejercicio. Su diseño funcional y duradero garantiza que tu gato pueda satisfacer sus instintos naturales de manera saludable y divertida. Proporciona a tu amigo felino un rascador de calidad para que pueda mantener sus garras en perfecto estado mientras se divierte.', NULL),
(7, 'Juguete para gatos', 1, 'Juguete interactivo con plumas para gatos', '12.50', 1, 'img/productos/juegueteGatos.png', 'El juguete para gatos es una adición emocionante a la rutina de juego de tu felino. Con su diseño interactivo y plumas tentadoras, este juguete estimula los instintos de caza y juego de tu gato, proporcionándole horas de diversión y ejercicio. La combinación de movimiento y texturas despierta el interés de tu mascota, manteniéndola entretenida y activa. Dale a tu gato un juguete que le brinde emoción y estimulación mental mientras fortalece el vínculo entre ustedes.', NULL),
(8, 'Alimento para perros adulto', 4, 'Comida balanceada para perros adultos de todas las razas', '40.00', 1, 'img/productos/alimentoPerroAdulto.png', 'El alimento para perros adultos ofrece una nutrición equilibrada y completa para satisfacer las necesidades de tu fiel compañero de cuatro patas. Formulado para perros adultos de todas las razas, este alimento proporciona los nutrientes esenciales que tu mascota necesita para mantenerse saludable y activa. Con ingredientes de alta calidad y un cuidadoso equilibrio de proteínas, carbohidratos y vitaminas, esta comida garantiza una dieta sabrosa y nutritiva para tu perro. Confía en este alimento balanceado para mantener a tu amigo peludo en su mejor estado de salud y vitalidad.', NULL),
(9, 'Alimento para perro cachorro', 4, 'Fórmula especial para perros pequeños en crecimiento', '45.00', 1, 'img/productos/alimentoPerroCachorro.png', 'El alimento para cachorros está diseñado especialmente para los perros pequeños en crecimiento, ofreciendo una fórmula nutricionalmente equilibrada para satisfacer sus necesidades específicas durante esta etapa crucial de desarrollo. Rico en proteínas, vitaminas y minerales esenciales, este alimento promueve un crecimiento saludable y un sistema inmunológico fuerte en cachorros de razas pequeñas.', NULL),
(10, 'Piedras sanitarias para gatos', 7, 'Arena absorbente para bandeja de arena de gatos', '8.99', 0, 'img/productos/piedrasSanitarias.png', 'Las piedras sanitarias para gatos ofrecen una solución efectiva y confiable para mantener la bandeja de arena de tu felino limpia y fresca. Con su capacidad de absorción superior, estas piedras ayudan a controlar los olores y a mantener el área de la bandeja higiénica. Su fórmula de arcilla aglomerante facilita la limpieza diaria al formar grumos compactos que se pueden desechar fácilmente. Proporciona a tu gato un entorno de baño limpio y cómodo con estas piedras sanitarias que ofrecen un rendimiento excepcional y resultados duraderos.', NULL),
(11, 'Cepillo', 2, 'Rasqueta para la limpieza de pelo de mascotas en muebles', '14.99', 1, 'img/productos/cepillo.png', 'Un cepillo con rasqueta integrada es la solución perfecta para la limpieza de pelo de mascotas en muebles. Con su diseño innovador, este utensilio combina la efectividad del cepillado con la precisión de una rasqueta, eliminando de manera rápida y eficiente los pelos incrustados en tapizados y superficies blandas. Su practicidad y versatilidad lo convierten en un indispensable para los dueños de mascotas que desean mantener un hogar limpio y libre de pelos no deseados.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `servicio_id` tinyint(4) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `nombre`, `usuario_fk`) VALUES
(1, 'Veterinaria', NULL),
(2, 'Guarderia', NULL),
(3, 'Estilista canino', NULL),
(4, 'Adiestramiento canino', NULL),
(5, 'Transporte de mascota', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `email`, `password`) VALUES
(1, 'pedromartin@gmail.com', 'holamundo213'),
(2, 'clarita.gomez@gmail.com', 'fernando234'),
(3, 'kevinrogers@hotmail.com', 'arbustO31'),
(4, 'laura.salas@gmail.com', '4567dhd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tienen_productos`
--

CREATE TABLE `usuarios_tienen_productos` (
  `productos_fk` int(10) UNSIGNED NOT NULL,
  `usuarios_fk` int(10) UNSIGNED NOT NULL,
  `usuarios_tienen_productos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_tienen_productos`
--

INSERT INTO `usuarios_tienen_productos` (`productos_fk`, `usuarios_fk`, `usuarios_tienen_productos_id`) VALUES
(5, 1, 1),
(4, 3, 2),
(7, 2, 3),
(11, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tiene_servicios`
--

CREATE TABLE `usuario_tiene_servicios` (
  `usuario_fk` int(10) UNSIGNED NOT NULL,
  `servicios_fk` tinyint(4) UNSIGNED NOT NULL,
  `usario_tiene_servicios_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_tiene_servicios`
--

INSERT INTO `usuario_tiene_servicios` (`usuario_fk`, `servicios_fk`, `usario_tiene_servicios_id`) VALUES
(3, 3, 1),
(4, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_categoria_id` (`categoria_id`) USING BTREE,
  ADD KEY `usuario_fk` (`usuario_fk`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`servicio_id`),
  ADD KEY `usuario_fk` (`usuario_fk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `unique_mail` (`email`) USING BTREE;

--
-- Indices de la tabla `usuarios_tienen_productos`
--
ALTER TABLE `usuarios_tienen_productos`
  ADD PRIMARY KEY (`usuarios_tienen_productos_id`),
  ADD KEY `productos_fk` (`productos_fk`),
  ADD KEY `usuarios` (`usuarios_fk`);

--
-- Indices de la tabla `usuario_tiene_servicios`
--
ALTER TABLE `usuario_tiene_servicios`
  ADD PRIMARY KEY (`usario_tiene_servicios_id`),
  ADD KEY `usuario_fk` (`usuario_fk`),
  ADD KEY `servicios_fk` (`servicios_fk`),
  ADD KEY `servicios_fk_2` (`servicios_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_tienen_productos`
--
ALTER TABLE `usuarios_tienen_productos`
  MODIFY `usuarios_tienen_productos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_tiene_servicios`
--
ALTER TABLE `usuario_tiene_servicios`
  MODIFY `usario_tiene_servicios_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_tienen_productos`
--
ALTER TABLE `usuarios_tienen_productos`
  ADD CONSTRAINT `usuarios_tienen_productos_ibfk_1` FOREIGN KEY (`productos_fk`) REFERENCES `producto` (`producto_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_tienen_productos_ibfk_2` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuario` (`usuario_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_tiene_servicios`
--
ALTER TABLE `usuario_tiene_servicios`
  ADD CONSTRAINT `usuario_tiene_servicios_ibfk_1` FOREIGN KEY (`usuario_fk`) REFERENCES `usuario` (`usuario_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_tiene_servicios_ibfk_2` FOREIGN KEY (`servicios_fk`) REFERENCES `servicios` (`servicio_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
