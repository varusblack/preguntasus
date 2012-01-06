-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-01-2012 a las 21:43:55
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id`, `idautor`, `titulo`, `cuerpo`, `idrespuesta`, `fechapregunta`) VALUES
(1, 1, 'Pregunta de prueba', 'Pues, eso, a ver si alguien me la responde', 0, '2011-12-06 17:29:29'),
(2, 2, 'Prueba de insert', 'pues si que lo hace', 0, '2011-12-12 13:02:11'),
(3, 2, 'Prueba de insert', 'Â¿Esto se inserta bien?', 0, '2011-12-12 12:45:48'),
(4, 2, 'Prueba de insert', 'Â¿Esto se inserta bien?', 0, '2011-12-12 12:48:16'),
(5, 2, 'Prueba de insert', 'Â¿Esto se inserta bien?', 0, '2011-12-12 13:01:47'),
(7, 2, 'Prueba de insert', 'A lo mejor esto no se inserta bien', 0, '2011-12-12 13:07:48'),
(8, 2, 'Prueba de insert', 'pues si que lo hace', 0, '2011-12-12 13:16:47'),
(9, 1, 'RESPUESTA', 'RESPUESTA A TU PREGUNTA', 1, '2011-12-30 19:00:00'),
(10, 1, 'Segunda respuesta', 'Esta es la segunda Respuesta a tu pregunta que hiciste la pasada semana\r\n', 1, '2011-12-31 00:00:00'),
(11, 1, 'Pregunta de prueba', 'asd', 0, '2011-12-31 14:50:26'),
(12, 1, 'Pregunta de prueba', 'asdadad', 0, '2011-12-31 15:02:08'),
(13, 1, 'Pregunta de prueba', 'asdadasdasdddddddddddddddddddd', 0, '2011-12-31 15:04:35'),
(14, 1, 'Pregunta de prueba', 'a', 0, '2011-12-31 15:05:27'),
(15, 1, 'Pregunta de prueba', '', 0, '2011-12-31 15:35:21'),
(16, 1, 'Pregunta de prueba', '', 0, '2011-12-31 15:36:54'),
(17, 1, 'Pregunta de prueba', 'ffffffffffffffff', 0, '2011-12-31 15:38:27'),
(18, 1, 'Pregunta de prueba', 's', 1, '2011-12-31 15:54:00'),
(19, 1, 'Pregunta de prueba', 'asdfasdasdasd', 1, '2011-12-31 16:00:44'),
(20, 1, 'Pregunta de prueba', 'respuesta del 03/01/12', 1, '2012-01-03 16:18:13'),
(21, 1, 'Pregunta de prueba', 'otra respuesta del 03/01/12', 1, '2012-01-03 18:10:59'),
(22, 1, 'Pregunta de prueba', 'ultima respuesta del 03/01/12', 1, '2012-01-03 22:15:08'),
(26, 1, 'Pregunta de prueba', 'respuesta 06/01/12', 1, '2012-01-06 00:36:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(2, 'Ampliación de Base de Datos'),
(1, 'Microprocesadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tagsdeelementos`
--

CREATE TABLE IF NOT EXISTS `tagsdeelementos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idelemento` int(11) NOT NULL,
  `idtag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parejaunica` (`idelemento`,`idtag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

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
  `tipoUsuario` int(1) NOT NULL COMMENT '0 normal, 1 administrador',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `fecharegistro`, `preguntasrealizadas`, `preguntasrespondidas`, `puntos`, `nombre`, `apellidos`, `fechanacimiento`, `tipoUsuario`) VALUES
(1, 'jenkin90@gmail.com', 'legend95', '2011-12-13 00:00:00', 0, 0, 0, 'Antonio', 'ViÃ±as', '0000-00-00', 0),
(6, 'jenkin901@gmail.com', 'fdfdsafsafdafads', '2011-12-13 00:00:00', 0, 0, 0, 'Antonio', 'ViÃ±as', '1977-06-25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id` int(11) NOT NULL,
  `idelemento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE IF NOT EXISTS `votacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idelemento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
