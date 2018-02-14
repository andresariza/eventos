/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-02-14 14:00:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idParent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  `dataRel` varchar(255) NOT NULL,
  `order` int(255) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `MenuStatus` (`status`),
  CONSTRAINT `MenuStatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', 'Empresas', '#', '', '0', '0');
INSERT INTO `menu` VALUES ('2', '0', 'Eventos', '?option=eventos', '', '2', '1');
INSERT INTO `menu` VALUES ('3', '0', 'Operador', '?option=operado', '', '3', '1');
INSERT INTO `menu` VALUES ('4', '0', 'Telemercadeo', '?option=telemercadeo', '', '4', '1');
INSERT INTO `menu` VALUES ('5', '0', 'Reportes', '?option=reportes', '', '5', '1');
INSERT INTO `menu` VALUES ('6', '0', 'Inicio', '?option=dashBoard', '', '1', '1');

-- ----------------------------
-- Table structure for menuPerfil
-- ----------------------------
DROP TABLE IF EXISTS `menuPerfil`;
CREATE TABLE `menuPerfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `StatusMenuPerfil` (`status`),
  CONSTRAINT `StatusMenuPerfil` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menuPerfil
-- ----------------------------
INSERT INTO `menuPerfil` VALUES ('1', '2', '1', '1');
INSERT INTO `menuPerfil` VALUES ('2', '3', '1', '1');
INSERT INTO `menuPerfil` VALUES ('3', '4', '1', '1');
INSERT INTO `menuPerfil` VALUES ('4', '5', '1', '1');
INSERT INTO `menuPerfil` VALUES ('5', '6', '1', '1');

-- ----------------------------
-- Table structure for ModulosMenu
-- ----------------------------
DROP TABLE IF EXISTS `ModulosMenu`;
CREATE TABLE `ModulosMenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemId` int(11) DEFAULT '0',
  `modulo` varchar(255) DEFAULT NULL,
  `estado` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ModulosMenu
-- ----------------------------
INSERT INTO `ModulosMenu` VALUES ('1', '0', 'mainMenu', '1');
INSERT INTO `ModulosMenu` VALUES ('2', '0', 'userMenu', '1');

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `PerfilStatus` (`status`),
  CONSTRAINT `PerfilStatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'superadmin', 'Super Administrador', '1');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(1) NOT NULL,
  `statusName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('0', 'Despublicado');
INSERT INTO `status` VALUES ('1', 'Publicado');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'e962735010b9b1f71f04fbf84bc90bee::MTUxODU0NDU4Ng==', 'Administrador', 'admin@admin.com', '1');

-- ----------------------------
-- Table structure for userPerfil
-- ----------------------------
DROP TABLE IF EXISTS `userPerfil`;
CREATE TABLE `userPerfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `perfilId` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `UsuarioPerfilStatus` (`status`),
  CONSTRAINT `UsuarioPerfilStatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of userPerfil
-- ----------------------------
INSERT INTO `userPerfil` VALUES ('1', '1', '1', '1');
SET FOREIGN_KEY_CHECKS=1;
