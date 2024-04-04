-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2024 a las 22:53:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cachito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id_anuncio` bigint(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `titulo`, `imagen`) VALUES
(3, 'Abejas llavero', 'img/3.png'),
(4, 'Oso vestido', 'img/2.png'),
(5, 'conejo', 'img/1.png'),
(6, 'Nuevo amigurumi', 'img/8.png'),
(8, 'gatitos', 'img/7.png'),
(9, 'nuevo decoración casa ', 'img/cotton.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` bigint(20) NOT NULL,
  `nombre_cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre_cat`) VALUES
(1, 'Flores'),
(2, 'Amigurumis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id_correo` bigint(20) NOT NULL,
  `nombre_correo` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `id_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ideas`
--

CREATE TABLE `ideas` (
  `id_idea` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ideas`
--

INSERT INTO `ideas` (`id_idea`, `nombre`, `imagen`) VALUES
(1, 'bolso lima grande', 'img/6.png'),
(2, 'Chimuelo', 'img/8.png'),
(3, 'user@gmail.com', 'img/cotton.png'),
(4, 'anime totoro', 'img/5.png'),
(5, 'bebe', 'img/4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_inicio`
--

CREATE TABLE `imagenes_inicio` (
  `id_img` bigint(20) NOT NULL,
  `imagen_inicio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrones`
--

CREATE TABLE `patrones` (
  `id_patron` bigint(20) NOT NULL,
  `nombre_patron` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `link_drive` varchar(200) NOT NULL,
  `cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `patrones`
--

INSERT INTO `patrones` (`id_patron`, `nombre_patron`, `imagen`, `link_drive`, `cat`) VALUES
(42, 'oso vestido rosado ', 'img/2.png', 'drive.drive', 'Amigurumis'),
(44, 'gatitos', 'img/7.png', 'drive.drive', 'Amigurumis'),
(45, 'chimuelo', 'img/8.png', 'drive.drive', 'Amigurumis'),
(46, 'cina', 'img/cotton.png', 'drive.drive', 'Flores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoriales`
--

CREATE TABLE `tutoriales` (
  `id_tutorial` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `link_video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutoriales`
--

INSERT INTO `tutoriales` (`id_tutorial`, `nombre`, `imagen`, `link_video`) VALUES
(2, 'abeja', 'img/3.png', 'link_abeja.youtube'),
(4, 'zorro', 'img/4.png', 'link.youtube'),
(5, 'QUESO', 'img/cotton.png', 'link_abeja.youtube'),
(6, 'patos', 'img/blog_01.png', 'link.youtube');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usua` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `privilegio` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usua`, `correo`, `contrasena`, `privilegio`, `token`) VALUES
(3, 'alexadmin', '1234', 'admin', ''),
(4, 'alexSC', 'PHdgMmQ5', 'usuario', 'f5da6c79523fa2eb385f3d855ff9bd68'),
(5, 'alex', '1234', 'usuario', 'de45676daf8eeacb70d1ea9c5ba0a604');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_correo`),
  ADD UNIQUE KEY `fk_usua` (`id_usuario`);

--
-- Indices de la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id_idea`);

--
-- Indices de la tabla `imagenes_inicio`
--
ALTER TABLE `imagenes_inicio`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `patrones`
--
ALTER TABLE `patrones`
  ADD PRIMARY KEY (`id_patron`);

--
-- Indices de la tabla `tutoriales`
--
ALTER TABLE `tutoriales`
  ADD PRIMARY KEY (`id_tutorial`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usua`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_anuncio` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id_idea` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes_inicio`
--
ALTER TABLE `imagenes_inicio`
  MODIFY `id_img` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patrones`
--
ALTER TABLE `patrones`
  MODIFY `id_patron` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tutoriales`
--
ALTER TABLE `tutoriales`
  MODIFY `id_tutorial` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usua` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `fk_usua` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usua`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
