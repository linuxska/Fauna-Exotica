/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : faunaexotica

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2011-05-16 14:12:16
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Perros', 'animales');
INSERT INTO `categoria` VALUES ('2', 'Gatos', 'animales');
INSERT INTO `categoria` VALUES ('3', 'Alimento', 'articulos');
INSERT INTO `categoria` VALUES ('4', 'Accesorios', 'articulos');
INSERT INTO `categoria` VALUES ('5', 'Roedores', 'animales');

-- ----------------------------
-- Table structure for `etiqueta`
-- ----------------------------
DROP TABLE IF EXISTS `etiqueta`;
CREATE TABLE `etiqueta` (
  `cod` int(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY  (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of etiqueta
-- ----------------------------
INSERT INTO `etiqueta` VALUES ('1', 'perros');
INSERT INTO `etiqueta` VALUES ('3', 'pienso');

-- ----------------------------
-- Table structure for `pedido`
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `cod` int(8) NOT NULL auto_increment,
  `cod_usuario` int(8) NOT NULL,
  `direccion_envio` varchar(50) default NULL COMMENT 'Por defecto: direccion usuario',
  `direccion_factura` varchar(50) default NULL,
  `fecha` date NOT NULL,
  `formaenvio` varchar(20) default NULL,
  `formapago` enum('contrareembolso','paypal') NOT NULL default 'contrareembolso',
  `comentarios` text,
  PRIMARY KEY  (`cod`),
  KEY `Usuario` (`cod_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido
-- ----------------------------
INSERT INTO `pedido` VALUES ('20', '30', 'Guatemala', 'Guatemala', '2011-05-16', 'correo', 'contrareembolso', null);
INSERT INTO `pedido` VALUES ('21', '30', 'Guatemala', 'Guatemala', '2011-05-16', 'correo', 'contrareembolso', null);
INSERT INTO `pedido` VALUES ('22', '30', 'Guatemala', 'Guatemala', '2011-05-16', 'correo', 'contrareembolso', null);
INSERT INTO `pedido` VALUES ('23', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('24', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('25', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('26', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('27', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('28', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('29', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('30', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('31', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('32', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('33', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('34', '30', '', '', '2011-05-16', '', 'paypal', null);
INSERT INTO `pedido` VALUES ('35', '30', '', '', '2011-05-16', '', 'paypal', null);

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
INSERT INTO `pedido_producto` VALUES ('21', '1', '1');
INSERT INTO `pedido_producto` VALUES ('21', '43', '1');
INSERT INTO `pedido_producto` VALUES ('20', '43', '1');
INSERT INTO `pedido_producto` VALUES ('22', '2', '2');
INSERT INTO `pedido_producto` VALUES ('22', '7', '1');
INSERT INTO `pedido_producto` VALUES ('22', '1', '1');
INSERT INTO `pedido_producto` VALUES ('23', '10', '1');
INSERT INTO `pedido_producto` VALUES ('24', '2', '1');
INSERT INTO `pedido_producto` VALUES ('25', '2', '1');
INSERT INTO `pedido_producto` VALUES ('26', '2', '1');
INSERT INTO `pedido_producto` VALUES ('27', '2', '1');
INSERT INTO `pedido_producto` VALUES ('28', '2', '1');
INSERT INTO `pedido_producto` VALUES ('29', '2', '1');
INSERT INTO `pedido_producto` VALUES ('30', '2', '1');
INSERT INTO `pedido_producto` VALUES ('31', '2', '1');
INSERT INTO `pedido_producto` VALUES ('32', '2', '1');
INSERT INTO `pedido_producto` VALUES ('33', '2', '2');
INSERT INTO `pedido_producto` VALUES ('33', '6', '1');
INSERT INTO `pedido_producto` VALUES ('33', '1', '1');
INSERT INTO `pedido_producto` VALUES ('35', '2', '4');

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('2', 'Pienso especial', '20', 'pienso.jpg', 'Pienso especial para cachorros', '15', '6', '2011-04-02 18:03:00');
INSERT INTO `producto` VALUES ('6', 'Pienso adultos', '40', 'pienso2.jpg', 'Pienso para adultos', '15', '6', '2011-04-03 00:00:00');
INSERT INTO `producto` VALUES ('1', 'Collar', '22', 'collar.jpg', 'Collar antiparasitario', '0', '7', '2011-04-02 00:00:00');
INSERT INTO `producto` VALUES ('7', 'Pienso Affinity', '37', 'pienso3.jpg', 'Pienso con vitaminas para su mascota', '15', '6', '2011-04-03 20:33:44');
INSERT INTO `producto` VALUES ('9', 'Pienso 5', '12', 'pienso5.jpg', 'Pienso para perros con déficit de calcio', '15', '6', '2011-04-14 00:08:02');
INSERT INTO `producto` VALUES ('10', 'Pienso 6', '25', 'pienso6.jpg', 'Pienso para cahorros', '15', '6', '2011-04-14 00:09:03');
INSERT INTO `producto` VALUES ('43', 'pienso 11', '54', 'pienso11.jpg', 'pienso para adultos', '15', '6', '2011-05-14 19:24:40');

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
INSERT INTO `producto_etiqueta` VALUES ('1', '1');
INSERT INTO `producto_etiqueta` VALUES ('2', '1');
INSERT INTO `producto_etiqueta` VALUES ('6', '1');
INSERT INTO `producto_etiqueta` VALUES ('6', '2');
INSERT INTO `producto_etiqueta` VALUES ('7', '2');
INSERT INTO `producto_etiqueta` VALUES ('8', '1');
INSERT INTO `producto_etiqueta` VALUES ('9', '1');
INSERT INTO `producto_etiqueta` VALUES ('10', '1');
INSERT INTO `producto_etiqueta` VALUES ('11', '1');
INSERT INTO `producto_etiqueta` VALUES ('12', '1');
INSERT INTO `producto_etiqueta` VALUES ('13', '1');
INSERT INTO `producto_etiqueta` VALUES ('14', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
INSERT INTO `subcategoria` VALUES ('8', 'conejos', '5');

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
  `tipo` varchar(10) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Usuario` (`usuario`),
  UNIQUE KEY `Correo` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('30', 'admin', 'admin@hotmail.com', 'Oscar', 'Verona', 'Artiles', 'Guatemala', '21232f297a57a5a743894a0e4a801fc3', null, 'admin');
INSERT INTO `usuario` VALUES ('43', 'oscar', 'oscar@oscar.es', 'Oscar', 'Verona', 'Artiles', '', 'oscar', null, 'cliente');
