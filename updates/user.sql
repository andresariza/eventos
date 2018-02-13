/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-02-13 14:18:18
*/

SET FOREIGN_KEY_CHECKS=0;

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
SET FOREIGN_KEY_CHECKS=1;
