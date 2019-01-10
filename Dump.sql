-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2019 a las 19:27:39
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `whatsfarma`
--
DROP DATABASE IF EXISTS `whatsfarma`;
CREATE DATABASE IF NOT EXISTS `whatsfarma` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `whatsfarma`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `preguntaSeguridad` tinyint(10) DEFAULT NULL,
  `respuestaSuserseguridad` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `genero` char(1) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `ciudad`, `telefono`, `preguntaSeguridad`, `respuestaSuserseguridad`, `password`, `genero`, `nacimiento`, `avatar`) VALUES
(4, 'LUCKYS', 'SANCHEZMMMM', 'lucky@hotmail.com', 'Lincoln', '2214224533', 2, 'rocky', '', 'f', '1976-04-11', '5c313d980c919.png'),
(5, 'Lolas', 'SANCHEZ', 'lola@hotmail.com', 'BuenosA', '221563269', 2, 'lorito', '$2y$10$PlDaxg1Z2UK1YLk7ceC2f.41EpiNtlVrFJNuLlrkJ0eBZrtTWibKq', 'f', '1967-04-08', '5c317625153fb.png'),
(6, 'Federicos', 'Fernandez', 'fede@hotmail.com', 'LINCOLN', '423659879', 0, '1 de diciembre', '$2y$10$gha2Wp8CticYHBHClOzgBecVhK4KzU8wrcvpGOfufL.7CJ98tOl4a', 'm', '1995-12-01', '5c3725e8a0391.png'),
(7, 'Rosario', 'Sanchez', 'rosario@hotmail.com', 'La Plata', '11142536987', 2, 'lorito', '$2y$10$ddjUr1UF5V1Pkvlnyqz4uuzHdd8ACMTfx0pwBz0LTM679ViznbnCq', 'f', '1941-04-16', '5c3724bb06bb2.png'),
(8, '', '', 'pepe@hotmail.com', 'Mar del Plata', NULL, 2, 'pastor', '$2y$10$qeZfYvfjq8KgzzSJIB3IQuZEXwfu2hcTmooIG9ubx712/kww39XzK', 'm', '1973-11-30', '5c36ab9b238f2.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `avatar_UNIQUE` (`avatar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
