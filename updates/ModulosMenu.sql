/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-02-13 14:17:42
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ModulosMenu
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
