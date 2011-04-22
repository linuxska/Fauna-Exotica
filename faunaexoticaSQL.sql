/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : faunaexotica

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2011-04-22 20:33:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `cod` int(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  `tipo` enum('articulos','animales') NOT NULL,
  PRIMARY KEY  (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Perros', 'animales');
INSERT INTO `categoria` VALUES ('2', 'Gatos', 'animales');
INSERT INTO `categoria` VALUES ('3', 'Alimento', 'articulos');
INSERT INTO `categoria` VALUES ('4', 'Accesorios', 'articulos');

-- ----------------------------
-- Table structure for `etiqueta`
-- ----------------------------
DROP TABLE IF EXISTS `etiqueta`;
CREATE TABLE `etiqueta` (
  `cod` int(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY  (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of etiqueta
-- ----------------------------

-- ----------------------------
-- Table structure for `pedido`
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `cod` int(8) NOT NULL auto_increment,
  `cod_usuario` int(8) NOT NULL,
  `direccion_envio` varchar(50) NOT NULL COMMENT 'Por defecto: direccion usuario',
  `direccion_factura` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `comentarios` text,
  PRIMARY KEY  (`cod`),
  KEY `Usuario` (`cod_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido
-- ----------------------------
INSERT INTO `pedido` VALUES ('4', '21', 'C/ La Caladora Nº 6', 'C/ La Caladora Nº 6', '2011-04-22', null);

-- ----------------------------
-- Table structure for `pedido_producto`
-- ----------------------------
DROP TABLE IF EXISTS `pedido_producto`;
CREATE TABLE `pedido_producto` (
  `cod_pedido` int(8) NOT NULL,
  `cod_producto` int(8) NOT NULL,
  `cantidad` int(8) NOT NULL default '1',
  PRIMARY KEY  (`cod_pedido`,`cod_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido_producto
-- ----------------------------
INSERT INTO `pedido_producto` VALUES ('4', '10', '1');
INSERT INTO `pedido_producto` VALUES ('4', '6', '1');
INSERT INTO `pedido_producto` VALUES ('4', '2', '1');

-- ----------------------------
-- Table structure for `producto`
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `cod` int(8) NOT NULL auto_increment,
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(6,0) default NULL,
  `foto` varchar(100) default NULL,
  `descripcion` text,
  `cantidad_disponible` int(6) NOT NULL default '0',
  `cod_subcategoria` int(8) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY  (`cod`),
  KEY `SubCat` (`cod_subcategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('2', 'Pienso especial', '20', 'pienso.jpg', 'Pienso especial para cachorros', '6', '6', '2011-04-02 18:03:00');
INSERT INTO `producto` VALUES ('6', 'Pienso adultos', '40', 'pienso2.jpg', 'Pienso para adultos', '2', '6', '2011-04-03 00:00:00');
INSERT INTO `producto` VALUES ('1', 'Collar', '22', 'collar.jpg', 'Collar antiparasitario', '0', '7', '2011-04-02 00:00:00');
INSERT INTO `producto` VALUES ('7', 'Pienso Affinity', '37', 'pienso3.jpg', 'Pienso con vitaminas para su mascota', '1', '6', '2011-04-03 20:33:44');
INSERT INTO `producto` VALUES ('8', 'Pienso orijen', '21', 'pienso4.jpg', 'Pienso para perros de gran tamaño', '5', '6', '2011-04-14 00:06:35');
INSERT INTO `producto` VALUES ('9', 'Pienso 5', '12', 'pienso5.jpg', 'Pienso para perros con déficit de calcio', '7', '6', '2011-04-14 00:08:02');
INSERT INTO `producto` VALUES ('10', 'Pienso 6', '20', 'pienso6.jpg', 'Pienso para cahorros', '2', '6', '2011-04-14 00:09:03');
INSERT INTO `producto` VALUES ('11', 'Pienso 7', '18', 'pienso7.jpg', 'Pienso para perros', '1', '6', '2011-04-14 00:09:47');
INSERT INTO `producto` VALUES ('12', 'Pienso 8', '14', 'pienso8.jpg', 'Pienso para adultos', '4', '6', '2011-04-14 00:10:27');
INSERT INTO `producto` VALUES ('13', 'Pienso 9', '17', 'pienso9.jpg', 'Pienso espacial para perros pequeños', '2', '6', '2011-04-14 00:11:12');
INSERT INTO `producto` VALUES ('14', 'Pienso 10', '19', 'pienso10.jpg', 'Pienso para adultos', '3', '6', '2011-04-14 00:11:50');

-- ----------------------------
-- Table structure for `producto_etiqueta`
-- ----------------------------
DROP TABLE IF EXISTS `producto_etiqueta`;
CREATE TABLE `producto_etiqueta` (
  `cod_producto` int(8) NOT NULL,
  `cod_etiqueta` int(8) NOT NULL,
  PRIMARY KEY  (`cod_producto`,`cod_etiqueta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of producto_etiqueta
-- ----------------------------

-- ----------------------------
-- Table structure for `subcategoria`
-- ----------------------------
DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE `subcategoria` (
  `cod` int(8) NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  `cod_categoria` int(8) NOT NULL,
  PRIMARY KEY  (`cod`),
  KEY `Categoria` (`cod_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subcategoria
-- ----------------------------
INSERT INTO `subcategoria` VALUES ('1', 'Carlino', '1');
INSERT INTO `subcategoria` VALUES ('2', 'Pitbull', '1');
INSERT INTO `subcategoria` VALUES ('3', 'Absinio', '2');
INSERT INTO `subcategoria` VALUES ('4', 'Beagle', '1');
INSERT INTO `subcategoria` VALUES ('5', 'Angora', '2');
INSERT INTO `subcategoria` VALUES ('6', 'Pienso', '3');
INSERT INTO `subcategoria` VALUES ('7', 'Collares', '4');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `usuario` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nombre` varchar(25) default NULL,
  `apellido1` varchar(30) default NULL,
  `apellido2` varchar(30) default NULL,
  `direccion` varchar(50) default NULL,
  `password` varchar(40) NOT NULL,
  `password_recuperacion` varchar(40) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Usuario` USING BTREE (`usuario`),
  UNIQUE KEY `Correo` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('21', 'Oscar', 'arcangel_v_a@hotmail.com', 'Oscar', 'Verona', 'Aritles', 'C/ La Caladora Nº 6', 'f156e7995d521f30e6c59a3d6c75e1e5', null);
INSERT INTO `usuario` VALUES ('23', 'Lauscar', 'asdasd@asd.es', null, null, null, null, '4addea0c69a129912828b7b35b787d59', null);
INSERT INTO `usuario` VALUES ('24', 'Oscar2', 'asd@as.es', 'Oscar', '', '', '', '4addea0c69a129912828b7b35b787d59', null);
INSERT INTO `usuario` VALUES ('25', 'Laura', 'oscar_va90@hotmail.com', null, null, null, null, '4addea0c69a129912828b7b35b787d59', null);
