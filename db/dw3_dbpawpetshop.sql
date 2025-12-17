-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2025 a las 14:17:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_dbpawpetshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `importe` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `fecha`, `importe`) VALUES
(1, 1, '2025-12-17 14:16:57', 47.97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_x_compra`
--

CREATE TABLE `item_x_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `compra_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item_x_compra`
--

INSERT INTO `item_x_compra` (`id`, `compra_id`, `producto_id`, `cantidad`) VALUES
(1, 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `categoria_id` tinyint(3) UNSIGNED NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(6,2) UNSIGNED NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT 1,
  `imagen` varchar(200) NOT NULL,
  `cuerpo` text DEFAULT NULL,
  `usuario_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `nombre`, `categoria_id`, `descripcion`, `precio`, `disponibilidad`, `imagen`, `cuerpo`, `usuario_fk`) VALUES
(2, 'Comederosss', 2, 'Plato de acero inoxidable para comida de mascotas', 5.50, 1, 'comedero.png', '...', NULL),
(3, 'Correa 5 mt', 2, 'Correa extensible de 5 metros para perros', 15.99, 1, 'correa5mt.png', '...', NULL),
(4, 'Correa extensible 15 mt', 2, 'Correa extensible de 15 metros para perros', 25.99, 1, 'correaExtensible.png', '...', NULL),
(5, 'Cama talle único', 3, 'Cama acolchada y suave para perros y gatos', 35.00, 0, 'cama.png', '...', NULL),
(6, 'Rascador para gatos', 1, 'Rascador de sisal', 20.99, 1, 'rascador.png', '...', NULL),
(7, 'Juguete para gatos', 1, 'Juguete interactivo con plumas', 12.50, 1, 'juegueteGatos.png', '...', NULL),
(8, 'Alimento perro adulto', 4, 'Comida balanceada', 40.00, 1, 'alimentoPerroAdulto.png', '...', NULL),
(9, 'Alimento cachorro', 4, 'Fórmula especial', 45.00, 1, 'alimentoPerroCachorro.png', '...', NULL),
(10, 'Piedras sanitarias', 7, 'Arena absorbente', 8.99, 0, 'piedrasSanitarias.png', '...', NULL),
(11, 'Cepillo', 2, 'Rasqueta para pelo', 14.99, 1, 'cepillo.png', '...', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `servicio_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `nombre`) VALUES
(1, 'Veterinaria'),
(2, 'Guarderia'),
(3, 'Estilista canino'),
(4, 'Adiestramiento canino'),
(5, 'Transporte de mascota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `email`, `password`, `rol`) VALUES
(1, 'usuario@test.com', '$2y$10$HjLvTzExFRjRWduBr7HXl.oYMoYLZPD/cikS2Ytd6xfplq3haM4o.', 'usuario'),
(2, 'admin@test.com', '$2y$10$HjLvTzExFRjRWduBr7HXl.oYMoYLZPD/cikS2Ytd6xfplq3haM4o.', 'admin'),
(3, 'super@test.com', '$2y$10$HjLvTzExFRjRWduBr7HXl.oYMoYLZPD/cikS2Ytd6xfplq3haM4o.', 'superadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tienen_productos`
--

CREATE TABLE `usuarios_tienen_productos` (
  `usuarios_tienen_productos_id` int(10) UNSIGNED NOT NULL,
  `productos_fk` int(10) UNSIGNED NOT NULL,
  `usuarios_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_tienen_productos`
--

INSERT INTO `usuarios_tienen_productos` (`usuarios_tienen_productos_id`, `productos_fk`, `usuarios_fk`) VALUES
(1, 5, 1),
(2, 4, 3),
(3, 7, 2),
(4, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tiene_servicios`
--

CREATE TABLE `usuario_tiene_servicios` (
  `usario_tiene_servicios_id` int(10) UNSIGNED NOT NULL,
  `usuario_fk` int(10) UNSIGNED NOT NULL,
  `servicios_fk` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_tiene_servicios`
--

INSERT INTO `usuario_tiene_servicios` (`usario_tiene_servicios_id`, `usuario_fk`, `servicios_fk`) VALUES
(1, 3, 3),
(2, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compras_usuario` (`id_usuario`);

--
-- Indices de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_compra` (`compra_id`),
  ADD KEY `idx_producto` (`producto_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`servicio_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `usuarios_tienen_productos`
--
ALTER TABLE `usuarios_tienen_productos`
  ADD PRIMARY KEY (`usuarios_tienen_productos_id`),
  ADD KEY `fk_utp_producto` (`productos_fk`),
  ADD KEY `fk_utp_usuario` (`usuarios_fk`);

--
-- Indices de la tabla `usuario_tiene_servicios`
--
ALTER TABLE `usuario_tiene_servicios`
  ADD PRIMARY KEY (`usario_tiene_servicios_id`),
  ADD KEY `fk_uts_usuario` (`usuario_fk`),
  ADD KEY `fk_uts_servicio` (`servicios_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuario_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD CONSTRAINT `fk_item_compra_compra` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_compra_item` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_tienen_productos`
--
ALTER TABLE `usuarios_tienen_productos`
  ADD CONSTRAINT `fk_utp_producto` FOREIGN KEY (`productos_fk`) REFERENCES `producto` (`producto_id`),
  ADD CONSTRAINT `fk_utp_usuario` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `usuario_tiene_servicios`
--
ALTER TABLE `usuario_tiene_servicios`
  ADD CONSTRAINT `fk_uts_servicio` FOREIGN KEY (`servicios_fk`) REFERENCES `servicios` (`servicio_id`),
  ADD CONSTRAINT `fk_uts_usuario` FOREIGN KEY (`usuario_fk`) REFERENCES `usuario` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
