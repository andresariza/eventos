/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-02-13 14:18:26
*/

SET FOREIGN_KEY_CHECKS=0;

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
