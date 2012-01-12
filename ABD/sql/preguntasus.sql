-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-01-2012 a las 20:15:50
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `preguntasus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idautor` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cuerpo` text COLLATE utf8_spanish2_ci NOT NULL,
  `idrespuesta` int(11) DEFAULT NULL,
  `fechapregunta` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id`, `idautor`, `titulo`, `cuerpo`, `idrespuesta`, `fechapregunta`) VALUES
(5, 5, '¿Aprobaremos ABD con más de un 9?', 'Quiero saber si sacaremos mas de un 9.', NULL, '2012-01-12 19:57:40'),
(6, 7, 'RESPUESTA', 'Claro que sí.', 5, '2012-01-12 19:58:12'),
(7, 5, '¿Como hago una matriz inversa de gradientes?', 'Me gustaría saber como hacer una matriz inversa de orden 6 de gradientes del ejercicio 9 del boletin del tema 4.', NULL, '2012-01-12 20:04:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE {tag}` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(6, 'Ampliación de bases de datos'),
(8, 'Cálculo infinitesimal'),
(7, 'Comunicaciones I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tagsdeelementos`
--

CREATE TABLE IF NOT EXISTS `tagsdeelementos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idelemento` int(11) NOT NULL,
  `idtag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE {idelemento, idtag}` (`idelemento`,`idtag`),
  KEY `idTag` (`idtag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tagsdeelementos`
--

INSERT INTO `tagsdeelementos` (`id`, `idelemento`, `idtag`) VALUES
(3, 5, 6),
(4, 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `preguntasrealizadas` int(11) NOT NULL,
  `preguntasrespondidas` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE {email}` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `fecharegistro`, `preguntasrealizadas`, `preguntasrespondidas`, `puntos`, `nombre`, `apellidos`, `fechanacimiento`, `tipoUsuario`) VALUES
(5, 'test@test.com', 'test', '2012-01-12 19:48:57', 0, 0, 1, 'Alvaro', 'Tristancho Reyes', '1989-04-29', 0),
(6, 'admin@admin.com', 'admin', '2012-01-12 19:49:56', 0, 0, 90, 'Alberto', 'Sola Nogales', '1976-07-15', 1),
(7, 'test2@test.com', 'test', '2012-01-12 19:52:07', 0, 0, 19, 'Antonio', 'Viñas Sandiez', '1979-09-18', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idelemento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE {idelemento, idusuario}` (`idelemento`,`idusuario`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id`, `idelemento`, `idusuario`) VALUES
(3, 5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE IF NOT EXISTS `votacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idelemento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE {idelemento, idusuario}` (`idelemento`,`idusuario`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `votacion`
--

INSERT INTO `votacion` (`id`, `idelemento`, `idusuario`) VALUES
(5, 5, 7);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tagsdeelementos`
--
ALTER TABLE `tagsdeelementos`
  ADD CONSTRAINT `tagsdeelementos_ibfk_2` FOREIGN KEY (`idtag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagsdeelementos_ibfk_1` FOREIGN KEY (`idelemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`idelemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `votacion_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votacion_ibfk_1` FOREIGN KEY (`idelemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
