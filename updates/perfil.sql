/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-02-13 14:18:02
*/

SET FOREIGN_KEY_CHECKS=0;

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
SET FOREIGN_KEY_CHECKS=1;
