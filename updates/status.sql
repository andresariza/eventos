/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-02-13 14:18:09
*/

SET FOREIGN_KEY_CHECKS=0;

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
SET FOREIGN_KEY_CHECKS=1;
