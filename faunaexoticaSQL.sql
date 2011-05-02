-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2011 a las 23:08:30
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `tipo` enum('articulos','animales') NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod`, `nombre`, `tipo`) VALUES
(1, 'Perros', 'animales'),
(2, 'Gatos', 'animales'),
(3, 'Alimento', 'articulos'),
(4, 'Accesorios', 'articulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE IF NOT EXISTS `etiqueta` (
  `cod` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`cod`, `nombre`) VALUES
(1, 'perros'),
(2, 'adulto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faunaexoticasql`
--

CREATE TABLE IF NOT EXISTS `faunaexoticasql` (
  `/*` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `faunaexoticasql`
--

INSERT INTO `faunaexoticasql` (`/*`) VALUES
('/*'),
('Navicat MySQL Data Transfer'),
(NULL),
('Source Server         : Localhost'),
('Source Server Version : 50051'),
('Source Host           : localhost:3306'),
('Source Database       : faunaexotica'),
(NULL),
('Target Server Type    : MYSQL'),
('Target Server Version : 50051'),
('File Encoding         : 65001'),
(NULL),
('Date: 2011-04-15 18:47:26'),
('*/'),
(NULL),
('SET FOREIGN_KEY_CHECKS=0;'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `categoria`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `categoria`;'),
('CREATE TABLE `categoria` ('),
('  `cod` int(8) unsigned NOT NULL auto_increment,'),
('  `nombre` varchar(20) NOT NULL,'),
('  `tipo` enum(''articulos'',''animales'') NOT NULL,'),
('  PRIMARY KEY  (`cod`),'),
('  UNIQUE KEY `Nombre` (`nombre`)'),
(') ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;'),
(NULL),
('-- ----------------------------'),
('-- Records of categoria'),
('-- ----------------------------'),
('INSERT INTO `categoria` VALUES (''1'', ''Perros'', ''animales'');'),
('INSERT INTO `categoria` VALUES (''2'', ''Gatos'', ''animales'');'),
('INSERT INTO `categoria` VALUES (''3'', ''Alimento'', ''articulos'');'),
('INSERT INTO `categoria` VALUES (''4'', ''Accesorios'', ''articulos'');'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `etiqueta`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `etiqueta`;'),
('CREATE TABLE `etiqueta` ('),
('  `cod` int(8) unsigned NOT NULL auto_increment,'),
('  `nombre` varchar(20) NOT NULL,'),
('  PRIMARY KEY  (`cod`),'),
('  UNIQUE KEY `Nombre` (`nombre`)'),
(') ENGINE=MyISAM DEFAULT CHARSET=utf8;'),
(NULL),
('-- ----------------------------'),
('-- Records of etiqueta'),
('-- ----------------------------'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `pedido`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `pedido`;'),
('CREATE TABLE `pedido` ('),
('  `cod` int(8) NOT NULL auto_increment,'),
('  `cod_usuario` int(8) NOT NULL,'),
('  `direccion` varchar(50) default NULL COMMENT ''Por defecto: direccion usuario'','),
('  `fecha` date NOT NULL,'),
('  PRIMARY KEY  (`cod`),'),
('  KEY `Usuario` (`cod_usuario`)'),
(') ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;'),
(NULL),
('-- ----------------------------'),
('-- Records of pedido'),
('-- ----------------------------'),
('INSERT INTO `pedido` VALUES (''1'', ''0'', null, ''0000-00-00'');'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `pedido_producto`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `pedido_producto`;'),
('CREATE TABLE `pedido_producto` ('),
('  `cod_pedido` int(8) NOT NULL,'),
('  `cod_producto` int(8) NOT NULL,'),
('  `cantidad` int(8) NOT NULL default ''1'','),
('  PRIMARY KEY  (`cod_pedido`,`cod_producto`)'),
(') ENGINE=MyISAM DEFAULT CHARSET=latin1;'),
(NULL),
('-- ----------------------------'),
('-- Records of pedido_producto'),
('-- ----------------------------'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `producto`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `producto`;'),
('CREATE TABLE `producto` ('),
('  `cod` int(8) NOT NULL auto_increment,'),
('  `nombre` varchar(30) NOT NULL,'),
('  `precio` decimal(6,0) default NULL,'),
('  `foto` varchar(100) default NULL,'),
('  `descripcion` text,'),
('  `cantidad_disponible` int(6) NOT NULL default ''0'','),
('  `cod_subcategoria` int(8) NOT NULL,'),
('  `fecha_registro` datetime NOT NULL,'),
('  PRIMARY KEY  (`cod`),'),
('  KEY `SubCat` (`cod_subcategoria`)'),
(') ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;'),
(NULL),
('-- ----------------------------'),
('-- Records of producto'),
('-- ----------------------------'),
('INSERT INTO `producto` VALUES (''2'', ''Pienso especial'', ''20'', ''pienso.jpg'', ''Pienso especial para cachorros'', ''6'', ''6'', ''2011-04-02 18:03:00'');'),
('INSERT INTO `producto` VALUES (''6'', ''Pienso adultos'', ''40'', ''pienso2.jpg'', ''Pienso para adultos'', ''2'', ''6'', ''2011-04-03 00:00:00'');'),
('INSERT INTO `producto` VALUES (''1'', ''Collar'', ''22'', ''collar.jpg'', ''Collar antiparasitario'', ''0'', ''7'', ''2011-04-02 00:00:00'');'),
('INSERT INTO `producto` VALUES (''7'', ''Pienso Affinity'', ''37'', ''pienso3.jpg'', ''Pienso con vitaminas para su mascota'', ''1'', ''6'', ''2011-04-03 20:33:44'');'),
('INSERT INTO `producto` VALUES (''8'', ''Pienso orijen'', ''21'', ''pienso4.jpg'', ''Pienso para perros de gran tamaño'', ''5'', ''6'', ''2011-04-14 00:06:35'');'),
('INSERT INTO `producto` VALUES (''9'', ''Pienso 5'', ''12'', ''pienso5.jpg'', ''Pienso para perros con déficit de calcio'', ''7'', ''6'', ''2011-04-14 00:08:02'');'),
('INSERT INTO `producto` VALUES (''10'', ''Pienso 6'', ''20'', ''pienso6.jpg'', ''Pienso para cahorros'', ''2'', ''6'', ''2011-04-14 00:09:03'');'),
('INSERT INTO `producto` VALUES (''11'', ''Pienso 7'', ''18'', ''pienso7.jpg'', ''Pienso para perros'', ''1'', ''6'', ''2011-04-14 00:09:47'');'),
('INSERT INTO `producto` VALUES (''12'', ''Pienso 8'', ''14'', ''pienso8.jpg'', ''Pienso para adultos'', ''4'', ''6'', ''2011-04-14 00:10:27'');'),
('INSERT INTO `producto` VALUES (''13'', ''Pienso 9'', ''17'', ''pienso9.jpg'', ''Pienso espacial para perros pequeños'', ''2'', ''6'', ''2011-04-14 00:11:12'');'),
('INSERT INTO `producto` VALUES (''14'', ''Pienso 10'', ''19'', ''pienso10.jpg'', ''Pienso para adultos'', ''3'', ''6'', ''2011-04-14 00:11:50'');'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `producto_etiqueta`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `producto_etiqueta`;'),
('CREATE TABLE `producto_etiqueta` ('),
('  `cod_producto` int(8) NOT NULL,'),
('  `cod_etiqueta` int(8) NOT NULL,'),
('  PRIMARY KEY  (`cod_producto`,`cod_etiqueta`)'),
(') ENGINE=MyISAM DEFAULT CHARSET=utf8;'),
(NULL),
('-- ----------------------------'),
('-- Records of producto_etiqueta'),
('-- ----------------------------'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `subcategoria`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `subcategoria`;'),
('CREATE TABLE `subcategoria` ('),
('  `cod` int(8) NOT NULL auto_increment,'),
('  `nombre` varchar(20) NOT NULL,'),
('  `cod_categoria` int(8) NOT NULL,'),
('  PRIMARY KEY  (`cod`),'),
('  KEY `Categoria` (`cod_categoria`)'),
(') ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;'),
(NULL),
('-- ----------------------------'),
('-- Records of subcategoria'),
('-- ----------------------------'),
('INSERT INTO `subcategoria` VALUES (''1'', ''Carlino'', ''1'');'),
('INSERT INTO `subcategoria` VALUES (''2'', ''Pitbull'', ''1'');'),
('INSERT INTO `subcategoria` VALUES (''3'', ''Absinio'', ''2'');'),
('INSERT INTO `subcategoria` VALUES (''4'', ''Beagle'', ''1'');'),
('INSERT INTO `subcategoria` VALUES (''5'', ''Angora'', ''2'');'),
('INSERT INTO `subcategoria` VALUES (''6'', ''Pienso'', ''3'');'),
('INSERT INTO `subcategoria` VALUES (''7'', ''Collares'', ''4'');'),
(NULL),
('-- ----------------------------'),
('-- Table structure for `usuario`'),
('-- ----------------------------'),
('DROP TABLE IF EXISTS `usuario`;'),
('CREATE TABLE `usuario` ('),
('  `id` int(10) unsigned NOT NULL auto_increment,'),
('  `usuario` varchar(25) NOT NULL,'),
('  `email` varchar(40) NOT NULL,'),
('  `nombre` varchar(25) default NULL,'),
('  `apellido1` varchar(30) default NULL,'),
('  `apellido2` varchar(30) default NULL,'),
('  `direccion` varchar(50) default NULL,'),
('  `password` varchar(40) NOT NULL,'),
('  `password_recuperacion` varchar(40) default NULL,'),
('  PRIMARY KEY  (`id`),'),
('  UNIQUE KEY `Usuario` USING BTREE (`usuario`),'),
('  UNIQUE KEY `Correo` (`email`)'),
(') ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;'),
(NULL),
('-- ----------------------------'),
('-- Records of usuario'),
('-- ----------------------------'),
('INSERT INTO `usuario` VALUES (''21'', ''Oscar'', ''arcangel_v_a@hotmail.com'', '''', '''', '''', '''', ''f156e7995d521f30e6c59a3d6c75e1e5'', null);');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `cod` int(8) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(8) NOT NULL,
  `direccion_envio` varchar(50) NOT NULL COMMENT 'Por defecto: direccion usuario',
  `direccion_factura` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `comentarios` text,
  PRIMARY KEY (`cod`),
  KEY `Usuario` (`cod_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`cod`, `cod_usuario`, `direccion_envio`, `direccion_factura`, `fecha`, `comentarios`) VALUES
(4, 21, 'C/ La Caladora Nº 6', 'C/ La Caladora Nº 6', '2011-04-22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE IF NOT EXISTS `pedido_producto` (
  `cod_pedido` int(8) NOT NULL,
  `cod_producto` int(8) NOT NULL,
  `cantidad` int(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod_pedido`,`cod_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`cod_pedido`, `cod_producto`, `cantidad`) VALUES
(4, 10, 1),
(4, 6, 1),
(4, 2, 1),
(5, 1, 1),
(5, 2, 1),
(6, 11, 5),
(6, 7, 1),
(6, 10, 1),
(6, 1, 1),
(7, 2, 85),
(7, 6, 100),
(7, 1, 112),
(7, 13, 999),
(8, 2, 2);

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
(2, 'Pienso especial', '20', 'pienso.jpg', 'Pienso especial para cachorros', 6, 6, '2011-04-02 18:03:00'),
(6, 'Pienso adultos', '40', 'pienso2.jpg', 'Pienso para adultos', 2, 6, '2011-04-03 00:00:00'),
(1, 'Collar', '22', 'collar.jpg', 'Collar antiparasitario', 0, 7, '2011-04-02 00:00:00'),
(7, 'Pienso Affinity', '37', 'pienso3.jpg', 'Pienso con vitaminas para su mascota', 1, 6, '2011-04-03 20:33:44'),
(8, 'Pienso orijen', '21', 'pienso4.jpg', 'Pienso para perros de gran tamaño', 5, 6, '2011-04-14 00:06:35'),
(9, 'Pienso 5', '12', 'pienso5.jpg', 'Pienso para perros con déficit de calcio', 7, 6, '2011-04-14 00:08:02'),
(10, 'Pienso 6', '20', 'pienso6.jpg', 'Pienso para cahorros', 2, 6, '2011-04-14 00:09:03'),
(11, 'Pienso 7', '18', 'pienso7.jpg', 'Pienso para perros', 1, 6, '2011-04-14 00:09:47'),
(12, 'Pienso 8', '14', 'pienso8.jpg', 'Pienso para adultos', 4, 6, '2011-04-14 00:10:27'),
(13, 'Pienso 9', '17', 'pienso9.jpg', 'Pienso espacial para perros pequeños', 2, 6, '2011-04-14 00:11:12'),
(14, 'Pienso 10', '19', 'pienso10.jpg', 'Pienso para adultos', 3, 6, '2011-04-14 00:11:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_etiqueta`
--

CREATE TABLE IF NOT EXISTS `producto_etiqueta` (
  `cod_producto` int(8) NOT NULL,
  `cod_etiqueta` int(8) NOT NULL,
  PRIMARY KEY (`cod_producto`,`cod_etiqueta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `producto_etiqueta`
--

INSERT INTO `producto_etiqueta` (`cod_producto`, `cod_etiqueta`) VALUES
(1, 1),
(2, 1),
(6, 1),
(6, 2),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `cod` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `cod_categoria` int(8) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `Categoria` (`cod_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`cod`, `nombre`, `cod_categoria`) VALUES
(1, 'Carlino', 1),
(2, 'Pitbull', 1),
(3, 'Absinio', 2),
(4, 'Beagle', 1),
(5, 'Angora', 2),
(6, 'Pienso', 3),
(7, 'Collares', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `password_recuperacion` varchar(40) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario` (`usuario`) USING BTREE,
  UNIQUE KEY `Correo` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `email`, `nombre`, `apellido1`, `apellido2`, `direccion`, `password`, `password_recuperacion`, `tipo`) VALUES
(21, 'Oscar', 'arcangel_v_a@hotmail.com', 'Oscar', 'Verona', 'Aritles', 'C/ La Caladora Nº 6', 'f156e7995d521f30e6c59a3d6c75e1e5', NULL, NULL),
(23, 'Lauscar', 'asdasd@asd.es', NULL, NULL, NULL, NULL, '4addea0c69a129912828b7b35b787d59', NULL, NULL),
(26, 'admin', 'admin@hotmail.com', NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
