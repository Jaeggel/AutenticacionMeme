-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2017 a las 06:07:20
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_calidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcha_usuario`
--

CREATE TABLE `catcha_usuario` (
  `id_usuario` int(10) NOT NULL,
  `emoticon` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `frase1` varchar(500) NOT NULL,
  `frase2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catcha_usuario`
--

INSERT INTO `catcha_usuario` (`id_usuario`, `emoticon`, `imagen`, `frase1`, `frase2`) VALUES
(1725511552, 'risa', 'spider', 'asd', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(10) NOT NULL,
  `num` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `correo` varchar(60) NOT NULL,
  `nick` varchar(60) NOT NULL,
  `contraseña` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `num`, `nombre`, `apellido`, `fecha_nacimiento`, `correo`, `nick`, `contraseña`) VALUES
(1725511552, 56, 'joel', 'ludeña', '1995-03-05 05:00:00', 'joel.19088@hotmail.com', 'joel', 'J5X5K6+kG+fMUWkFDkw0cc1JipJE43RCnUai9dtrYZzybex/ER8c82cxlD5yam4BGniGmXG4NFrkU966IM52pA==');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catcha_usuario`
--
ALTER TABLE `catcha_usuario`
  ADD KEY `FKCatcha_Usu728344` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `num` (`num`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `num` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catcha_usuario`
--
ALTER TABLE `catcha_usuario`
  ADD CONSTRAINT `FKCatcha_Usu728344` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`cedula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
