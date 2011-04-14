-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2011 a las 12:11:56
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `faunaexotica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `cod` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(6,0) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `cantidad_disponible` int(6) NOT NULL DEFAULT '0',
  `cod_subcategoria` int(8) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `SubCat` (`cod_subcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod`, `nombre`, `precio`, `foto`, `descripcion`, `cantidad_disponible`, `cod_subcategoria`, `fecha_registro`) VALUES
(1, 'Collar', '22', 'collar.jpg', 'Collar antiparasitario', 0, 7, '2011-04-02 00:00:00'),
(2, 'Pienso especial', '20', 'pienso.jpg', 'Pienso especial para cachorros', 6, 6, '2011-04-02 18:03:00'),
(6, 'Pienso adultos', '40', 'pienso2.jpg', 'Pienso para adultos', 2, 6, '2011-04-03 00:00:00'),
(7, 'Pienso Affinity', '37', 'pienso3.jpg', 'Pienso con vitaminas para su mascota', 1, 6, '2011-04-03 20:33:44'),
(8, 'Pienso orijen', '21', 'pienso4.jpg', 'Pienso para perros de gran tamaño', 5, 6, '2011-04-14 00:06:35'),
(9, 'Pienso 5', '12', 'pienso5.jpg', 'Pienso para perros con déficit de calcio', 7, 6, '2011-04-14 00:08:02'),
(10, 'Pienso 6', '20', 'pienso6.jpg', 'Pienso para cahorros', 2, 6, '2011-04-14 00:09:03'),
(11, 'Pienso 7', '18', 'pienso7.jpg', 'Pienso para perros', 1, 6, '2011-04-14 00:09:47'),
(12, 'Pienso 8', '14', 'pienso8.jpg', 'Pienso para adultos', 4, 6, '2011-04-14 00:10:27'),
(13, 'Pienso 9', '17', 'pienso9.jpg', 'Pienso espacial para perros pequeños', 2, 6, '2011-04-14 00:11:12'),
(14, 'Pienso 10', '19', 'pienso10.jpg', 'Pienso para adultos', 3, 6, '2011-04-14 00:11:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
