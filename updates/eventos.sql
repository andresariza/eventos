/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50559
Source Host           : localhost:3306
Source Database       : eventos

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-03-12 13:43:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Candidatos
-- ----------------------------
DROP TABLE IF EXISTS `Candidatos`;
CREATE TABLE `Candidatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvento` int(11) NOT NULL,
  `idStatusCandidato` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `documento` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `fechaVolverContactar` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ID_EVENTO` (`idEvento`),
  KEY `FK_ID_STATUS_CANDIDATO` (`idStatusCandidato`),
  CONSTRAINT `FK_ID_EVENTO` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`id`),
  CONSTRAINT `FK_ID_STATUS_CANDIDATO` FOREIGN KEY (`idStatusCandidato`) REFERENCES `StatusCandidato` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Candidatos
-- ----------------------------

-- ----------------------------
-- Table structure for DatosAdicionalesEvento
-- ----------------------------
DROP TABLE IF EXISTS `DatosAdicionalesEvento`;
CREATE TABLE `DatosAdicionalesEvento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvento` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ID_EVENTO_D` (`idEvento`),
  KEY `FK_STATUS` (`status`),
  CONSTRAINT `FK_ID_EVENTO_D` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`id`),
  CONSTRAINT `FK_STATUS` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of DatosAdicionalesEvento
-- ----------------------------

-- ----------------------------
-- Table structure for Evento
-- ----------------------------
DROP TABLE IF EXISTS `Evento`;
CREATE TABLE `Evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gionEvento` text,
  `imagePath` varchar(255) DEFAULT NULL,
  `fechaEvento` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventoStatus` (`status`),
  CONSTRAINT `eventoStatus` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Evento
-- ----------------------------
INSERT INTO `Evento` VALUES ('1', 'andres test', 'testas tase t', null, '2017-12-15', '1');
INSERT INTO `Evento` VALUES ('2', 'andres test', 'testas tase t', null, '2017-12-15', '1');
INSERT INTO `Evento` VALUES ('3', 'andres test', 'testas tase t', null, '2017-12-15', '1');
INSERT INTO `Evento` VALUES ('4', 'andres test', 'testas tase t', null, '2017-12-15', '1');
INSERT INTO `Evento` VALUES ('5', 'andres test', 'testas tase t', null, '2017-12-15', '1');
INSERT INTO `Evento` VALUES ('6', 'andres test', 'testas tase t', null, '2017-12-15', '1');
INSERT INTO `Evento` VALUES ('7', 'andres test', 'testas tase t', null, '2017-12-15', '1');

-- ----------------------------
-- Table structure for faIcons
-- ----------------------------
DROP TABLE IF EXISTS `faIcons`;
CREATE TABLE `faIcons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=786 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faIcons
-- ----------------------------
INSERT INTO `faIcons` VALUES ('1', 'fa-glass');
INSERT INTO `faIcons` VALUES ('2', 'fa-music');
INSERT INTO `faIcons` VALUES ('3', 'fa-search');
INSERT INTO `faIcons` VALUES ('4', 'fa-envelope-o');
INSERT INTO `faIcons` VALUES ('5', 'fa-heart');
INSERT INTO `faIcons` VALUES ('6', 'fa-star');
INSERT INTO `faIcons` VALUES ('7', 'fa-star-o');
INSERT INTO `faIcons` VALUES ('8', 'fa-user');
INSERT INTO `faIcons` VALUES ('9', 'fa-film');
INSERT INTO `faIcons` VALUES ('10', 'fa-th-large');
INSERT INTO `faIcons` VALUES ('11', 'fa-th');
INSERT INTO `faIcons` VALUES ('12', 'fa-th-list');
INSERT INTO `faIcons` VALUES ('13', 'fa-check');
INSERT INTO `faIcons` VALUES ('14', 'fa-remove');
INSERT INTO `faIcons` VALUES ('15', 'fa-close');
INSERT INTO `faIcons` VALUES ('16', 'fa-times');
INSERT INTO `faIcons` VALUES ('17', 'fa-search-plus');
INSERT INTO `faIcons` VALUES ('18', 'fa-search-minus');
INSERT INTO `faIcons` VALUES ('19', 'fa-power-off');
INSERT INTO `faIcons` VALUES ('20', 'fa-signal');
INSERT INTO `faIcons` VALUES ('21', 'fa-gear');
INSERT INTO `faIcons` VALUES ('22', 'fa-cog');
INSERT INTO `faIcons` VALUES ('23', 'fa-trash-o');
INSERT INTO `faIcons` VALUES ('24', 'fa-home');
INSERT INTO `faIcons` VALUES ('25', 'fa-file-o');
INSERT INTO `faIcons` VALUES ('26', 'fa-clock-o');
INSERT INTO `faIcons` VALUES ('27', 'fa-road');
INSERT INTO `faIcons` VALUES ('28', 'fa-download');
INSERT INTO `faIcons` VALUES ('29', 'fa-arrow-circle-o-down');
INSERT INTO `faIcons` VALUES ('30', 'fa-arrow-circle-o-up');
INSERT INTO `faIcons` VALUES ('31', 'fa-inbox');
INSERT INTO `faIcons` VALUES ('32', 'fa-play-circle-o');
INSERT INTO `faIcons` VALUES ('33', 'fa-rotate-right');
INSERT INTO `faIcons` VALUES ('34', 'fa-repeat');
INSERT INTO `faIcons` VALUES ('35', 'fa-refresh');
INSERT INTO `faIcons` VALUES ('36', 'fa-list-alt');
INSERT INTO `faIcons` VALUES ('37', 'fa-lockz');
INSERT INTO `faIcons` VALUES ('38', 'fa-flag');
INSERT INTO `faIcons` VALUES ('39', 'fa-headphones');
INSERT INTO `faIcons` VALUES ('40', 'fa-volume-off');
INSERT INTO `faIcons` VALUES ('41', 'fa-volume-down');
INSERT INTO `faIcons` VALUES ('42', 'fa-volume-up');
INSERT INTO `faIcons` VALUES ('43', 'fa-qrcode');
INSERT INTO `faIcons` VALUES ('44', 'fa-barcode');
INSERT INTO `faIcons` VALUES ('45', 'fa-tag');
INSERT INTO `faIcons` VALUES ('46', 'fa-tags');
INSERT INTO `faIcons` VALUES ('47', 'fa-book');
INSERT INTO `faIcons` VALUES ('48', 'fa-bookmark');
INSERT INTO `faIcons` VALUES ('49', 'fa-print');
INSERT INTO `faIcons` VALUES ('50', 'fa-camera');
INSERT INTO `faIcons` VALUES ('51', 'fa-font');
INSERT INTO `faIcons` VALUES ('52', 'fa-bold');
INSERT INTO `faIcons` VALUES ('53', 'fa-italic');
INSERT INTO `faIcons` VALUES ('54', 'fa-text-height');
INSERT INTO `faIcons` VALUES ('55', 'fa-text-width');
INSERT INTO `faIcons` VALUES ('56', 'fa-align-left');
INSERT INTO `faIcons` VALUES ('57', 'fa-align-center');
INSERT INTO `faIcons` VALUES ('58', 'fa-align-right');
INSERT INTO `faIcons` VALUES ('59', 'fa-align-justify');
INSERT INTO `faIcons` VALUES ('60', 'fa-list');
INSERT INTO `faIcons` VALUES ('61', 'fa-dedent');
INSERT INTO `faIcons` VALUES ('62', 'fa-outdent');
INSERT INTO `faIcons` VALUES ('63', 'fa-indent');
INSERT INTO `faIcons` VALUES ('64', 'fa-video-camera');
INSERT INTO `faIcons` VALUES ('65', 'fa-photo');
INSERT INTO `faIcons` VALUES ('66', 'fa-image');
INSERT INTO `faIcons` VALUES ('67', 'fa-picture-o');
INSERT INTO `faIcons` VALUES ('68', 'fa-pencil');
INSERT INTO `faIcons` VALUES ('69', 'fa-map-marker');
INSERT INTO `faIcons` VALUES ('70', 'fa-adjust');
INSERT INTO `faIcons` VALUES ('71', 'fa-tint');
INSERT INTO `faIcons` VALUES ('72', 'fa-edit');
INSERT INTO `faIcons` VALUES ('73', 'fa-pencil-square-o');
INSERT INTO `faIcons` VALUES ('74', 'fa-share-square-o');
INSERT INTO `faIcons` VALUES ('75', 'fa-check-square-o');
INSERT INTO `faIcons` VALUES ('76', 'fa-arrows');
INSERT INTO `faIcons` VALUES ('77', 'fa-step-backward');
INSERT INTO `faIcons` VALUES ('78', 'fa-fast-backward');
INSERT INTO `faIcons` VALUES ('79', 'fa-backward');
INSERT INTO `faIcons` VALUES ('80', 'fa-play');
INSERT INTO `faIcons` VALUES ('81', 'fa-pause');
INSERT INTO `faIcons` VALUES ('82', 'fa-stop');
INSERT INTO `faIcons` VALUES ('83', 'fa-forward');
INSERT INTO `faIcons` VALUES ('84', 'fa-fast-forward');
INSERT INTO `faIcons` VALUES ('85', 'fa-step-forward');
INSERT INTO `faIcons` VALUES ('86', 'fa-eject');
INSERT INTO `faIcons` VALUES ('87', 'fa-chevron-left');
INSERT INTO `faIcons` VALUES ('88', 'fa-chevron-right');
INSERT INTO `faIcons` VALUES ('89', 'fa-plus-circle');
INSERT INTO `faIcons` VALUES ('90', 'fa-minus-circle');
INSERT INTO `faIcons` VALUES ('91', 'fa-times-circle');
INSERT INTO `faIcons` VALUES ('92', 'fa-check-circle');
INSERT INTO `faIcons` VALUES ('93', 'fa-question-circle');
INSERT INTO `faIcons` VALUES ('94', 'fa-info-circle');
INSERT INTO `faIcons` VALUES ('95', 'fa-crosshairs');
INSERT INTO `faIcons` VALUES ('96', 'fa-times-circle-o');
INSERT INTO `faIcons` VALUES ('97', 'fa-check-circle-o');
INSERT INTO `faIcons` VALUES ('98', 'fa-ban');
INSERT INTO `faIcons` VALUES ('99', 'fa-arrow-left');
INSERT INTO `faIcons` VALUES ('100', 'fa-arrow-right');
INSERT INTO `faIcons` VALUES ('101', 'fa-arrow-up');
INSERT INTO `faIcons` VALUES ('102', 'fa-arrow-down');
INSERT INTO `faIcons` VALUES ('103', 'fa-mail-forward');
INSERT INTO `faIcons` VALUES ('104', 'fa-share');
INSERT INTO `faIcons` VALUES ('105', 'fa-expand');
INSERT INTO `faIcons` VALUES ('106', 'fa-compress');
INSERT INTO `faIcons` VALUES ('107', 'fa-plus');
INSERT INTO `faIcons` VALUES ('108', 'fa-minus');
INSERT INTO `faIcons` VALUES ('109', 'fa-asterisk');
INSERT INTO `faIcons` VALUES ('110', 'fa-exclamation-circle');
INSERT INTO `faIcons` VALUES ('111', 'fa-gift');
INSERT INTO `faIcons` VALUES ('112', 'fa-leaf');
INSERT INTO `faIcons` VALUES ('113', 'fa-fire');
INSERT INTO `faIcons` VALUES ('114', 'fa-eye');
INSERT INTO `faIcons` VALUES ('115', 'fa-eye-slash');
INSERT INTO `faIcons` VALUES ('116', 'fa-warning');
INSERT INTO `faIcons` VALUES ('117', 'fa-exclamation-triangle');
INSERT INTO `faIcons` VALUES ('118', 'fa-plane');
INSERT INTO `faIcons` VALUES ('119', 'fa-calendar');
INSERT INTO `faIcons` VALUES ('120', 'fa-random');
INSERT INTO `faIcons` VALUES ('121', 'fa-comment');
INSERT INTO `faIcons` VALUES ('122', 'fa-magnet');
INSERT INTO `faIcons` VALUES ('123', 'fa-chevron-up');
INSERT INTO `faIcons` VALUES ('124', 'fa-chevron-down');
INSERT INTO `faIcons` VALUES ('125', 'fa-retweet');
INSERT INTO `faIcons` VALUES ('126', 'fa-shopping-cart');
INSERT INTO `faIcons` VALUES ('127', 'fa-folder');
INSERT INTO `faIcons` VALUES ('128', 'fa-folder-open');
INSERT INTO `faIcons` VALUES ('129', 'fa-arrows-v');
INSERT INTO `faIcons` VALUES ('130', 'fa-arrows-h');
INSERT INTO `faIcons` VALUES ('131', 'fa-bar-chart-o');
INSERT INTO `faIcons` VALUES ('132', 'fa-bar-chart');
INSERT INTO `faIcons` VALUES ('133', 'fa-twitter-square');
INSERT INTO `faIcons` VALUES ('134', 'fa-facebook-square');
INSERT INTO `faIcons` VALUES ('135', 'fa-camera-retro');
INSERT INTO `faIcons` VALUES ('136', 'fa-key');
INSERT INTO `faIcons` VALUES ('137', 'fa-gears');
INSERT INTO `faIcons` VALUES ('138', 'fa-cogs');
INSERT INTO `faIcons` VALUES ('139', 'fa-comments');
INSERT INTO `faIcons` VALUES ('140', 'fa-thumbs-o-up');
INSERT INTO `faIcons` VALUES ('141', 'fa-thumbs-o-down');
INSERT INTO `faIcons` VALUES ('142', 'fa-star-half');
INSERT INTO `faIcons` VALUES ('143', 'fa-heart-o');
INSERT INTO `faIcons` VALUES ('144', 'fa-sign-out');
INSERT INTO `faIcons` VALUES ('145', 'fa-linkedin-square');
INSERT INTO `faIcons` VALUES ('146', 'fa-thumb-tack');
INSERT INTO `faIcons` VALUES ('147', 'fa-external-link');
INSERT INTO `faIcons` VALUES ('148', 'fa-sign-in');
INSERT INTO `faIcons` VALUES ('149', 'fa-trophy');
INSERT INTO `faIcons` VALUES ('150', 'fa-github-square');
INSERT INTO `faIcons` VALUES ('151', 'fa-upload');
INSERT INTO `faIcons` VALUES ('152', 'fa-lemon-o');
INSERT INTO `faIcons` VALUES ('153', 'fa-phone');
INSERT INTO `faIcons` VALUES ('154', 'fa-square-o');
INSERT INTO `faIcons` VALUES ('155', 'fa-bookmark-o');
INSERT INTO `faIcons` VALUES ('156', 'fa-phone-square');
INSERT INTO `faIcons` VALUES ('157', 'fa-twitter');
INSERT INTO `faIcons` VALUES ('158', 'fa-facebook-f');
INSERT INTO `faIcons` VALUES ('159', 'fa-facebook');
INSERT INTO `faIcons` VALUES ('160', 'fa-github');
INSERT INTO `faIcons` VALUES ('161', 'fa-unlock');
INSERT INTO `faIcons` VALUES ('162', 'fa-credit-card');
INSERT INTO `faIcons` VALUES ('163', 'fa-feed');
INSERT INTO `faIcons` VALUES ('164', 'fa-rss');
INSERT INTO `faIcons` VALUES ('165', 'fa-hdd-o');
INSERT INTO `faIcons` VALUES ('166', 'fa-bullhorn');
INSERT INTO `faIcons` VALUES ('167', 'fa-bell');
INSERT INTO `faIcons` VALUES ('168', 'fa-certificate');
INSERT INTO `faIcons` VALUES ('169', 'fa-hand-o-right');
INSERT INTO `faIcons` VALUES ('170', 'fa-hand-o-left');
INSERT INTO `faIcons` VALUES ('171', 'fa-hand-o-up');
INSERT INTO `faIcons` VALUES ('172', 'fa-hand-o-down');
INSERT INTO `faIcons` VALUES ('173', 'fa-arrow-circle-left');
INSERT INTO `faIcons` VALUES ('174', 'fa-arrow-circle-right');
INSERT INTO `faIcons` VALUES ('175', 'fa-arrow-circle-up');
INSERT INTO `faIcons` VALUES ('176', 'fa-arrow-circle-down');
INSERT INTO `faIcons` VALUES ('177', 'fa-globe');
INSERT INTO `faIcons` VALUES ('178', 'fa-wrench');
INSERT INTO `faIcons` VALUES ('179', 'fa-tasks');
INSERT INTO `faIcons` VALUES ('180', 'fa-filter');
INSERT INTO `faIcons` VALUES ('181', 'fa-briefcase');
INSERT INTO `faIcons` VALUES ('182', 'fa-arrows-alt');
INSERT INTO `faIcons` VALUES ('183', 'fa-group');
INSERT INTO `faIcons` VALUES ('184', 'fa-users');
INSERT INTO `faIcons` VALUES ('185', 'fa-chain');
INSERT INTO `faIcons` VALUES ('186', 'fa-link');
INSERT INTO `faIcons` VALUES ('187', 'fa-cloud');
INSERT INTO `faIcons` VALUES ('188', 'fa-flask');
INSERT INTO `faIcons` VALUES ('189', 'fa-cut');
INSERT INTO `faIcons` VALUES ('190', 'fa-scissors');
INSERT INTO `faIcons` VALUES ('191', 'fa-copy');
INSERT INTO `faIcons` VALUES ('192', 'fa-files-o');
INSERT INTO `faIcons` VALUES ('193', 'fa-paperclip');
INSERT INTO `faIcons` VALUES ('194', 'fa-save');
INSERT INTO `faIcons` VALUES ('195', 'fa-floppy-o');
INSERT INTO `faIcons` VALUES ('196', 'fa-square');
INSERT INTO `faIcons` VALUES ('197', 'fa-navicon');
INSERT INTO `faIcons` VALUES ('198', 'fa-reorder');
INSERT INTO `faIcons` VALUES ('199', 'fa-bars');
INSERT INTO `faIcons` VALUES ('200', 'fa-list-ul');
INSERT INTO `faIcons` VALUES ('201', 'fa-list-ol');
INSERT INTO `faIcons` VALUES ('202', 'fa-strikethrough');
INSERT INTO `faIcons` VALUES ('203', 'fa-underline');
INSERT INTO `faIcons` VALUES ('204', 'fa-table');
INSERT INTO `faIcons` VALUES ('205', 'fa-magic');
INSERT INTO `faIcons` VALUES ('206', 'fa-truck');
INSERT INTO `faIcons` VALUES ('207', 'fa-pinterest');
INSERT INTO `faIcons` VALUES ('208', 'fa-pinterest-square');
INSERT INTO `faIcons` VALUES ('209', 'fa-google-plus-square');
INSERT INTO `faIcons` VALUES ('210', 'fa-google-plus');
INSERT INTO `faIcons` VALUES ('211', 'fa-money');
INSERT INTO `faIcons` VALUES ('212', 'fa-caret-down');
INSERT INTO `faIcons` VALUES ('213', 'fa-caret-up');
INSERT INTO `faIcons` VALUES ('214', 'fa-caret-left');
INSERT INTO `faIcons` VALUES ('215', 'fa-caret-right');
INSERT INTO `faIcons` VALUES ('216', 'fa-columns');
INSERT INTO `faIcons` VALUES ('217', 'fa-unsorted');
INSERT INTO `faIcons` VALUES ('218', 'fa-sort');
INSERT INTO `faIcons` VALUES ('219', 'fa-sort-down');
INSERT INTO `faIcons` VALUES ('220', 'fa-sort-desc');
INSERT INTO `faIcons` VALUES ('221', 'fa-sort-up');
INSERT INTO `faIcons` VALUES ('222', 'fa-sort-asc');
INSERT INTO `faIcons` VALUES ('223', 'fa-envelope');
INSERT INTO `faIcons` VALUES ('224', 'fa-linkedin');
INSERT INTO `faIcons` VALUES ('225', 'fa-rotate-left');
INSERT INTO `faIcons` VALUES ('226', 'fa-undo');
INSERT INTO `faIcons` VALUES ('227', 'fa-legal');
INSERT INTO `faIcons` VALUES ('228', 'fa-gavel');
INSERT INTO `faIcons` VALUES ('229', 'fa-dashboard');
INSERT INTO `faIcons` VALUES ('230', 'fa-tachometer');
INSERT INTO `faIcons` VALUES ('231', 'fa-comment-o');
INSERT INTO `faIcons` VALUES ('232', 'fa-comments-o');
INSERT INTO `faIcons` VALUES ('233', 'fa-flash');
INSERT INTO `faIcons` VALUES ('234', 'fa-bolt');
INSERT INTO `faIcons` VALUES ('235', 'fa-sitemap');
INSERT INTO `faIcons` VALUES ('236', 'fa-umbrella');
INSERT INTO `faIcons` VALUES ('237', 'fa-paste');
INSERT INTO `faIcons` VALUES ('238', 'fa-clipboard');
INSERT INTO `faIcons` VALUES ('239', 'fa-lightbulb-o');
INSERT INTO `faIcons` VALUES ('240', 'fa-exchange');
INSERT INTO `faIcons` VALUES ('241', 'fa-cloud-download');
INSERT INTO `faIcons` VALUES ('242', 'fa-cloud-upload');
INSERT INTO `faIcons` VALUES ('243', 'fa-user-md');
INSERT INTO `faIcons` VALUES ('244', 'fa-stethoscope');
INSERT INTO `faIcons` VALUES ('245', 'fa-suitcase');
INSERT INTO `faIcons` VALUES ('246', 'fa-bell-o');
INSERT INTO `faIcons` VALUES ('247', 'fa-coffee');
INSERT INTO `faIcons` VALUES ('248', 'fa-cutlery');
INSERT INTO `faIcons` VALUES ('249', 'fa-file-text-o');
INSERT INTO `faIcons` VALUES ('250', 'fa-building-o');
INSERT INTO `faIcons` VALUES ('251', 'fa-hospital-o');
INSERT INTO `faIcons` VALUES ('252', 'fa-ambulance');
INSERT INTO `faIcons` VALUES ('253', 'fa-medkit');
INSERT INTO `faIcons` VALUES ('254', 'fa-fighter-jet');
INSERT INTO `faIcons` VALUES ('255', 'fa-beer');
INSERT INTO `faIcons` VALUES ('256', 'fa-h-square');
INSERT INTO `faIcons` VALUES ('257', 'fa-plus-square');
INSERT INTO `faIcons` VALUES ('258', 'fa-angle-double-left');
INSERT INTO `faIcons` VALUES ('259', 'fa-angle-double-right');
INSERT INTO `faIcons` VALUES ('260', 'fa-angle-double-up');
INSERT INTO `faIcons` VALUES ('261', 'fa-angle-double-down');
INSERT INTO `faIcons` VALUES ('262', 'fa-angle-left');
INSERT INTO `faIcons` VALUES ('263', 'fa-angle-right');
INSERT INTO `faIcons` VALUES ('264', 'fa-angle-up');
INSERT INTO `faIcons` VALUES ('265', 'fa-angle-down');
INSERT INTO `faIcons` VALUES ('266', 'fa-desktop');
INSERT INTO `faIcons` VALUES ('267', 'fa-laptop');
INSERT INTO `faIcons` VALUES ('268', 'fa-tablet');
INSERT INTO `faIcons` VALUES ('269', 'fa-mobile-phone');
INSERT INTO `faIcons` VALUES ('270', 'fa-mobile');
INSERT INTO `faIcons` VALUES ('271', 'fa-circle-o');
INSERT INTO `faIcons` VALUES ('272', 'fa-quote-left');
INSERT INTO `faIcons` VALUES ('273', 'fa-quote-right');
INSERT INTO `faIcons` VALUES ('274', 'fa-spinner');
INSERT INTO `faIcons` VALUES ('275', 'fa-circle');
INSERT INTO `faIcons` VALUES ('276', 'fa-mail-reply');
INSERT INTO `faIcons` VALUES ('277', 'fa-reply');
INSERT INTO `faIcons` VALUES ('278', 'fa-github-alt');
INSERT INTO `faIcons` VALUES ('279', 'fa-folder-o');
INSERT INTO `faIcons` VALUES ('280', 'fa-folder-open-o');
INSERT INTO `faIcons` VALUES ('281', 'fa-smile-o');
INSERT INTO `faIcons` VALUES ('282', 'fa-frown-o');
INSERT INTO `faIcons` VALUES ('283', 'fa-meh-o');
INSERT INTO `faIcons` VALUES ('284', 'fa-gamepad');
INSERT INTO `faIcons` VALUES ('285', 'fa-keyboard-o');
INSERT INTO `faIcons` VALUES ('286', 'fa-flag-o');
INSERT INTO `faIcons` VALUES ('287', 'fa-flag-checkered');
INSERT INTO `faIcons` VALUES ('288', 'fa-terminal');
INSERT INTO `faIcons` VALUES ('289', 'fa-code');
INSERT INTO `faIcons` VALUES ('290', 'fa-mail-reply-all');
INSERT INTO `faIcons` VALUES ('291', 'fa-reply-all');
INSERT INTO `faIcons` VALUES ('292', 'fa-star-half-empty');
INSERT INTO `faIcons` VALUES ('293', 'fa-star-half-full');
INSERT INTO `faIcons` VALUES ('294', 'fa-star-half-o');
INSERT INTO `faIcons` VALUES ('295', 'fa-location-arrow');
INSERT INTO `faIcons` VALUES ('296', 'fa-crop');
INSERT INTO `faIcons` VALUES ('297', 'fa-code-fork');
INSERT INTO `faIcons` VALUES ('298', 'fa-unlink');
INSERT INTO `faIcons` VALUES ('299', 'fa-chain-broken');
INSERT INTO `faIcons` VALUES ('300', 'fa-question');
INSERT INTO `faIcons` VALUES ('301', 'fa-info');
INSERT INTO `faIcons` VALUES ('302', 'fa-exclamation');
INSERT INTO `faIcons` VALUES ('303', 'fa-superscript');
INSERT INTO `faIcons` VALUES ('304', 'fa-subscript');
INSERT INTO `faIcons` VALUES ('305', 'fa-eraser');
INSERT INTO `faIcons` VALUES ('306', 'fa-puzzle-piece');
INSERT INTO `faIcons` VALUES ('307', 'fa-microphone');
INSERT INTO `faIcons` VALUES ('308', 'fa-microphone-slash');
INSERT INTO `faIcons` VALUES ('309', 'fa-shield');
INSERT INTO `faIcons` VALUES ('310', 'fa-calendar-o');
INSERT INTO `faIcons` VALUES ('311', 'fa-fire-extinguisher');
INSERT INTO `faIcons` VALUES ('312', 'fa-rocket');
INSERT INTO `faIcons` VALUES ('313', 'fa-maxcdn');
INSERT INTO `faIcons` VALUES ('314', 'fa-chevron-circle-left');
INSERT INTO `faIcons` VALUES ('315', 'fa-chevron-circle-right');
INSERT INTO `faIcons` VALUES ('316', 'fa-chevron-circle-up');
INSERT INTO `faIcons` VALUES ('317', 'fa-chevron-circle-down');
INSERT INTO `faIcons` VALUES ('318', 'fa-html5');
INSERT INTO `faIcons` VALUES ('319', 'fa-css3');
INSERT INTO `faIcons` VALUES ('320', 'fa-anchor');
INSERT INTO `faIcons` VALUES ('321', 'fa-unlock-alt');
INSERT INTO `faIcons` VALUES ('322', 'fa-bullseye');
INSERT INTO `faIcons` VALUES ('323', 'fa-ellipsis-h');
INSERT INTO `faIcons` VALUES ('324', 'fa-ellipsis-v');
INSERT INTO `faIcons` VALUES ('325', 'fa-rss-square');
INSERT INTO `faIcons` VALUES ('326', 'fa-play-circle');
INSERT INTO `faIcons` VALUES ('327', 'fa-ticket');
INSERT INTO `faIcons` VALUES ('328', 'fa-minus-square');
INSERT INTO `faIcons` VALUES ('329', 'fa-minus-square-o');
INSERT INTO `faIcons` VALUES ('330', 'fa-level-up');
INSERT INTO `faIcons` VALUES ('331', 'fa-level-down');
INSERT INTO `faIcons` VALUES ('332', 'fa-check-square');
INSERT INTO `faIcons` VALUES ('333', 'fa-pencil-square');
INSERT INTO `faIcons` VALUES ('334', 'fa-external-link-square');
INSERT INTO `faIcons` VALUES ('335', 'fa-share-square');
INSERT INTO `faIcons` VALUES ('336', 'fa-compass');
INSERT INTO `faIcons` VALUES ('337', 'fa-toggle-down');
INSERT INTO `faIcons` VALUES ('338', 'fa-caret-square-o-down');
INSERT INTO `faIcons` VALUES ('339', 'fa-toggle-up');
INSERT INTO `faIcons` VALUES ('340', 'fa-caret-square-o-up');
INSERT INTO `faIcons` VALUES ('341', 'fa-toggle-right');
INSERT INTO `faIcons` VALUES ('342', 'fa-caret-square-o-right');
INSERT INTO `faIcons` VALUES ('343', 'fa-euro');
INSERT INTO `faIcons` VALUES ('344', 'fa-eur');
INSERT INTO `faIcons` VALUES ('345', 'fa-gbp');
INSERT INTO `faIcons` VALUES ('346', 'fa-dollar');
INSERT INTO `faIcons` VALUES ('347', 'fa-usd');
INSERT INTO `faIcons` VALUES ('348', 'fa-rupee');
INSERT INTO `faIcons` VALUES ('349', 'fa-inr');
INSERT INTO `faIcons` VALUES ('350', 'fa-cny');
INSERT INTO `faIcons` VALUES ('351', 'fa-rmb');
INSERT INTO `faIcons` VALUES ('352', 'fa-yen');
INSERT INTO `faIcons` VALUES ('353', 'fa-jpy');
INSERT INTO `faIcons` VALUES ('354', 'fa-ruble');
INSERT INTO `faIcons` VALUES ('355', 'fa-rouble');
INSERT INTO `faIcons` VALUES ('356', 'fa-rub');
INSERT INTO `faIcons` VALUES ('357', 'fa-won');
INSERT INTO `faIcons` VALUES ('358', 'fa-krw');
INSERT INTO `faIcons` VALUES ('359', 'fa-bitcoin');
INSERT INTO `faIcons` VALUES ('360', 'fa-btc');
INSERT INTO `faIcons` VALUES ('361', 'fa-file');
INSERT INTO `faIcons` VALUES ('362', 'fa-file-text');
INSERT INTO `faIcons` VALUES ('363', 'fa-sort-alpha-asc');
INSERT INTO `faIcons` VALUES ('364', 'fa-sort-alpha-desc');
INSERT INTO `faIcons` VALUES ('365', 'fa-sort-amount-asc');
INSERT INTO `faIcons` VALUES ('366', 'fa-sort-amount-desc');
INSERT INTO `faIcons` VALUES ('367', 'fa-sort-numeric-asc');
INSERT INTO `faIcons` VALUES ('368', 'fa-sort-numeric-desc');
INSERT INTO `faIcons` VALUES ('369', 'fa-thumbs-up');
INSERT INTO `faIcons` VALUES ('370', 'fa-thumbs-down');
INSERT INTO `faIcons` VALUES ('371', 'fa-youtube-square');
INSERT INTO `faIcons` VALUES ('372', 'fa-youtube');
INSERT INTO `faIcons` VALUES ('373', 'fa-xing');
INSERT INTO `faIcons` VALUES ('374', 'fa-xing-square');
INSERT INTO `faIcons` VALUES ('375', 'fa-youtube-play');
INSERT INTO `faIcons` VALUES ('376', 'fa-dropbox');
INSERT INTO `faIcons` VALUES ('377', 'fa-stack-overflow');
INSERT INTO `faIcons` VALUES ('378', 'fa-instagram');
INSERT INTO `faIcons` VALUES ('379', 'fa-flickr');
INSERT INTO `faIcons` VALUES ('380', 'fa-adn');
INSERT INTO `faIcons` VALUES ('381', 'fa-bitbucket');
INSERT INTO `faIcons` VALUES ('382', 'fa-bitbucket-square');
INSERT INTO `faIcons` VALUES ('383', 'fa-tumblr');
INSERT INTO `faIcons` VALUES ('384', 'fa-tumblr-square');
INSERT INTO `faIcons` VALUES ('385', 'fa-long-arrow-down');
INSERT INTO `faIcons` VALUES ('386', 'fa-long-arrow-up');
INSERT INTO `faIcons` VALUES ('387', 'fa-long-arrow-right');
INSERT INTO `faIcons` VALUES ('388', 'fa-apple');
INSERT INTO `faIcons` VALUES ('389', 'fa-windows');
INSERT INTO `faIcons` VALUES ('390', 'fa-android');
INSERT INTO `faIcons` VALUES ('391', 'fa-linux');
INSERT INTO `faIcons` VALUES ('392', 'fa-dribbble');
INSERT INTO `faIcons` VALUES ('393', 'fa-skype');
INSERT INTO `faIcons` VALUES ('394', 'fa-foursquare');
INSERT INTO `faIcons` VALUES ('395', 'fa-trello');
INSERT INTO `faIcons` VALUES ('396', 'fa-female');
INSERT INTO `faIcons` VALUES ('397', 'fa-male');
INSERT INTO `faIcons` VALUES ('398', 'fa-gittip');
INSERT INTO `faIcons` VALUES ('399', 'fa-gratipay');
INSERT INTO `faIcons` VALUES ('400', 'fa-sun-o');
INSERT INTO `faIcons` VALUES ('401', 'fa-moon-o');
INSERT INTO `faIcons` VALUES ('402', 'fa-archive');
INSERT INTO `faIcons` VALUES ('403', 'fa-bug');
INSERT INTO `faIcons` VALUES ('404', 'fa-vk');
INSERT INTO `faIcons` VALUES ('405', 'fa-weibo');
INSERT INTO `faIcons` VALUES ('406', 'fa-renren');
INSERT INTO `faIcons` VALUES ('407', 'fa-pagelines');
INSERT INTO `faIcons` VALUES ('408', 'fa-stack-exchange');
INSERT INTO `faIcons` VALUES ('409', 'fa-arrow-circle-o-right');
INSERT INTO `faIcons` VALUES ('410', 'fa-arrow-circle-o-left');
INSERT INTO `faIcons` VALUES ('411', 'fa-toggle-left');
INSERT INTO `faIcons` VALUES ('412', 'fa-caret-square-o-left');
INSERT INTO `faIcons` VALUES ('413', 'fa-dot-circle-o');
INSERT INTO `faIcons` VALUES ('414', 'fa-wheelchair');
INSERT INTO `faIcons` VALUES ('415', 'fa-vimeo-square');
INSERT INTO `faIcons` VALUES ('416', 'fa-turkish-lira');
INSERT INTO `faIcons` VALUES ('417', 'fa-try');
INSERT INTO `faIcons` VALUES ('418', 'fa-plus-square-o');
INSERT INTO `faIcons` VALUES ('419', 'fa-space-shuttle');
INSERT INTO `faIcons` VALUES ('420', 'fa-slack');
INSERT INTO `faIcons` VALUES ('421', 'fa-envelope-square');
INSERT INTO `faIcons` VALUES ('422', 'fa-wordpress');
INSERT INTO `faIcons` VALUES ('423', 'fa-openid');
INSERT INTO `faIcons` VALUES ('424', 'fa-institution');
INSERT INTO `faIcons` VALUES ('425', 'fa-bank');
INSERT INTO `faIcons` VALUES ('426', 'fa-university');
INSERT INTO `faIcons` VALUES ('427', 'fa-mortar-board');
INSERT INTO `faIcons` VALUES ('428', 'fa-graduation-cap');
INSERT INTO `faIcons` VALUES ('429', 'fa-yahoo');
INSERT INTO `faIcons` VALUES ('430', 'fa-google');
INSERT INTO `faIcons` VALUES ('431', 'fa-reddit');
INSERT INTO `faIcons` VALUES ('432', 'fa-reddit-square');
INSERT INTO `faIcons` VALUES ('433', 'fa-stumbleupon-circle');
INSERT INTO `faIcons` VALUES ('434', 'fa-stumbleupon');
INSERT INTO `faIcons` VALUES ('435', 'fa-delicious');
INSERT INTO `faIcons` VALUES ('436', 'fa-digg');
INSERT INTO `faIcons` VALUES ('437', 'fa-pied-piper-pp');
INSERT INTO `faIcons` VALUES ('438', 'fa-pied-piper-alt');
INSERT INTO `faIcons` VALUES ('439', 'fa-drupal');
INSERT INTO `faIcons` VALUES ('440', 'fa-joomla');
INSERT INTO `faIcons` VALUES ('441', 'fa-language');
INSERT INTO `faIcons` VALUES ('442', 'fa-fax');
INSERT INTO `faIcons` VALUES ('443', 'fa-building');
INSERT INTO `faIcons` VALUES ('444', 'fa-child');
INSERT INTO `faIcons` VALUES ('445', 'fa-paw');
INSERT INTO `faIcons` VALUES ('446', 'fa-spoon');
INSERT INTO `faIcons` VALUES ('447', 'fa-cube');
INSERT INTO `faIcons` VALUES ('448', 'fa-cubes');
INSERT INTO `faIcons` VALUES ('449', 'fa-behance');
INSERT INTO `faIcons` VALUES ('450', 'fa-behance-square');
INSERT INTO `faIcons` VALUES ('451', 'fa-steam');
INSERT INTO `faIcons` VALUES ('452', 'fa-steam-square');
INSERT INTO `faIcons` VALUES ('453', 'fa-recycle');
INSERT INTO `faIcons` VALUES ('454', 'fa-automobile');
INSERT INTO `faIcons` VALUES ('455', 'fa-car');
INSERT INTO `faIcons` VALUES ('456', 'fa-cab');
INSERT INTO `faIcons` VALUES ('457', 'fa-taxi');
INSERT INTO `faIcons` VALUES ('458', 'fa-tree');
INSERT INTO `faIcons` VALUES ('459', 'fa-spotify');
INSERT INTO `faIcons` VALUES ('460', 'fa-deviantart');
INSERT INTO `faIcons` VALUES ('461', 'fa-soundcloud');
INSERT INTO `faIcons` VALUES ('462', 'fa-database');
INSERT INTO `faIcons` VALUES ('463', 'fa-file-pdf-o');
INSERT INTO `faIcons` VALUES ('464', 'fa-file-word-o');
INSERT INTO `faIcons` VALUES ('465', 'fa-file-excel-o');
INSERT INTO `faIcons` VALUES ('466', 'fa-file-powerpoint-o');
INSERT INTO `faIcons` VALUES ('467', 'fa-file-photo-o');
INSERT INTO `faIcons` VALUES ('468', 'fa-file-picture-o');
INSERT INTO `faIcons` VALUES ('469', 'fa-file-image-o');
INSERT INTO `faIcons` VALUES ('470', 'fa-file-zip-o');
INSERT INTO `faIcons` VALUES ('471', 'fa-file-archive-o');
INSERT INTO `faIcons` VALUES ('472', 'fa-file-sound-o');
INSERT INTO `faIcons` VALUES ('473', 'fa-file-audio-o');
INSERT INTO `faIcons` VALUES ('474', 'fa-file-movie-o');
INSERT INTO `faIcons` VALUES ('475', 'fa-file-video-o');
INSERT INTO `faIcons` VALUES ('476', 'fa-file-code-o');
INSERT INTO `faIcons` VALUES ('477', 'fa-vine');
INSERT INTO `faIcons` VALUES ('478', 'fa-codepen');
INSERT INTO `faIcons` VALUES ('479', 'fa-jsfiddle');
INSERT INTO `faIcons` VALUES ('480', 'fa-life-bouy');
INSERT INTO `faIcons` VALUES ('481', 'fa-life-buoy');
INSERT INTO `faIcons` VALUES ('482', 'fa-life-saver');
INSERT INTO `faIcons` VALUES ('483', 'fa-support');
INSERT INTO `faIcons` VALUES ('484', 'fa-life-ring');
INSERT INTO `faIcons` VALUES ('485', 'fa-circle-o-notch');
INSERT INTO `faIcons` VALUES ('486', 'fa-ra');
INSERT INTO `faIcons` VALUES ('487', 'fa-resistance');
INSERT INTO `faIcons` VALUES ('488', 'fa-rebel');
INSERT INTO `faIcons` VALUES ('489', 'fa-ge');
INSERT INTO `faIcons` VALUES ('490', 'fa-empire');
INSERT INTO `faIcons` VALUES ('491', 'fa-git-square');
INSERT INTO `faIcons` VALUES ('492', 'fa-git');
INSERT INTO `faIcons` VALUES ('493', 'fa-y-combinator-square');
INSERT INTO `faIcons` VALUES ('494', 'fa-yc-square');
INSERT INTO `faIcons` VALUES ('495', 'fa-hacker-news');
INSERT INTO `faIcons` VALUES ('496', 'fa-tencent-weibo');
INSERT INTO `faIcons` VALUES ('497', 'fa-qq');
INSERT INTO `faIcons` VALUES ('498', 'fa-wechat');
INSERT INTO `faIcons` VALUES ('499', 'fa-weixin');
INSERT INTO `faIcons` VALUES ('500', 'fa-send');
INSERT INTO `faIcons` VALUES ('501', 'fa-paper-plane');
INSERT INTO `faIcons` VALUES ('502', 'fa-send-o');
INSERT INTO `faIcons` VALUES ('503', 'fa-paper-plane-o');
INSERT INTO `faIcons` VALUES ('504', 'fa-history');
INSERT INTO `faIcons` VALUES ('505', 'fa-circle-thin');
INSERT INTO `faIcons` VALUES ('506', 'fa-header');
INSERT INTO `faIcons` VALUES ('507', 'fa-paragraph');
INSERT INTO `faIcons` VALUES ('508', 'fa-sliders');
INSERT INTO `faIcons` VALUES ('509', 'fa-share-alt');
INSERT INTO `faIcons` VALUES ('510', 'fa-share-alt-square');
INSERT INTO `faIcons` VALUES ('511', 'fa-bomb');
INSERT INTO `faIcons` VALUES ('512', 'fa-soccer-ball-o');
INSERT INTO `faIcons` VALUES ('513', 'fa-futbol-o');
INSERT INTO `faIcons` VALUES ('514', 'fa-tty');
INSERT INTO `faIcons` VALUES ('515', 'fa-binoculars');
INSERT INTO `faIcons` VALUES ('516', 'fa-plug');
INSERT INTO `faIcons` VALUES ('517', 'fa-slideshare');
INSERT INTO `faIcons` VALUES ('518', 'fa-twitch');
INSERT INTO `faIcons` VALUES ('519', 'fa-yelp');
INSERT INTO `faIcons` VALUES ('520', 'fa-newspaper-o');
INSERT INTO `faIcons` VALUES ('521', 'fa-wifi');
INSERT INTO `faIcons` VALUES ('522', 'fa-calculator');
INSERT INTO `faIcons` VALUES ('523', 'fa-paypal');
INSERT INTO `faIcons` VALUES ('524', 'fa-google-wallet');
INSERT INTO `faIcons` VALUES ('525', 'fa-cc-visa');
INSERT INTO `faIcons` VALUES ('526', 'fa-cc-mastercard');
INSERT INTO `faIcons` VALUES ('527', 'fa-cc-discover');
INSERT INTO `faIcons` VALUES ('528', 'fa-cc-amex');
INSERT INTO `faIcons` VALUES ('529', 'fa-cc-paypal');
INSERT INTO `faIcons` VALUES ('530', 'fa-cc-stripe');
INSERT INTO `faIcons` VALUES ('531', 'fa-bell-slash');
INSERT INTO `faIcons` VALUES ('532', 'fa-bell-slash-o');
INSERT INTO `faIcons` VALUES ('533', 'fa-trash');
INSERT INTO `faIcons` VALUES ('534', 'fa-copyright');
INSERT INTO `faIcons` VALUES ('535', 'fa-at');
INSERT INTO `faIcons` VALUES ('536', 'fa-eyedropper');
INSERT INTO `faIcons` VALUES ('537', 'fa-paint-brush');
INSERT INTO `faIcons` VALUES ('538', 'fa-birthday-cake');
INSERT INTO `faIcons` VALUES ('539', 'fa-area-chart');
INSERT INTO `faIcons` VALUES ('540', 'fa-pie-chart');
INSERT INTO `faIcons` VALUES ('541', 'fa-line-chart');
INSERT INTO `faIcons` VALUES ('542', 'fa-lastfm');
INSERT INTO `faIcons` VALUES ('543', 'fa-lastfm-square');
INSERT INTO `faIcons` VALUES ('544', 'fa-toggle-off');
INSERT INTO `faIcons` VALUES ('545', 'fa-toggle-on');
INSERT INTO `faIcons` VALUES ('546', 'fa-bicycle');
INSERT INTO `faIcons` VALUES ('547', 'fa-bus');
INSERT INTO `faIcons` VALUES ('548', 'fa-ioxhost');
INSERT INTO `faIcons` VALUES ('549', 'fa-angellist');
INSERT INTO `faIcons` VALUES ('550', 'fa-cc');
INSERT INTO `faIcons` VALUES ('551', 'fa-shekel');
INSERT INTO `faIcons` VALUES ('552', 'fa-sheqel');
INSERT INTO `faIcons` VALUES ('553', 'fa-ils');
INSERT INTO `faIcons` VALUES ('554', 'fa-meanpath');
INSERT INTO `faIcons` VALUES ('555', 'fa-buysellads');
INSERT INTO `faIcons` VALUES ('556', 'fa-connectdevelop');
INSERT INTO `faIcons` VALUES ('557', 'fa-dashcube');
INSERT INTO `faIcons` VALUES ('558', 'fa-forumbee');
INSERT INTO `faIcons` VALUES ('559', 'fa-leanpub');
INSERT INTO `faIcons` VALUES ('560', 'fa-sellsy');
INSERT INTO `faIcons` VALUES ('561', 'fa-shirtsinbulk');
INSERT INTO `faIcons` VALUES ('562', 'fa-simplybuilt');
INSERT INTO `faIcons` VALUES ('563', 'fa-skyatlas');
INSERT INTO `faIcons` VALUES ('564', 'fa-cart-plus');
INSERT INTO `faIcons` VALUES ('565', 'fa-cart-arrow-down');
INSERT INTO `faIcons` VALUES ('566', 'fa-diamond');
INSERT INTO `faIcons` VALUES ('567', 'fa-ship');
INSERT INTO `faIcons` VALUES ('568', 'fa-user-secret');
INSERT INTO `faIcons` VALUES ('569', 'fa-motorcycle');
INSERT INTO `faIcons` VALUES ('570', 'fa-street-view');
INSERT INTO `faIcons` VALUES ('571', 'fa-heartbeat');
INSERT INTO `faIcons` VALUES ('572', 'fa-venus');
INSERT INTO `faIcons` VALUES ('573', 'fa-mars');
INSERT INTO `faIcons` VALUES ('574', 'fa-mercury');
INSERT INTO `faIcons` VALUES ('575', 'fa-intersex');
INSERT INTO `faIcons` VALUES ('576', 'fa-transgender');
INSERT INTO `faIcons` VALUES ('577', 'fa-transgender-alt');
INSERT INTO `faIcons` VALUES ('578', 'fa-venus-double');
INSERT INTO `faIcons` VALUES ('579', 'fa-mars-double');
INSERT INTO `faIcons` VALUES ('580', 'fa-venus-mars');
INSERT INTO `faIcons` VALUES ('581', 'fa-mars-stroke');
INSERT INTO `faIcons` VALUES ('582', 'fa-mars-stroke-v');
INSERT INTO `faIcons` VALUES ('583', 'fa-mars-stroke-h');
INSERT INTO `faIcons` VALUES ('584', 'fa-neuter');
INSERT INTO `faIcons` VALUES ('585', 'fa-genderless');
INSERT INTO `faIcons` VALUES ('586', 'fa-facebook-official');
INSERT INTO `faIcons` VALUES ('587', 'fa-pinterest-p');
INSERT INTO `faIcons` VALUES ('588', 'fa-whatsapp');
INSERT INTO `faIcons` VALUES ('589', 'fa-server');
INSERT INTO `faIcons` VALUES ('590', 'fa-user-plus');
INSERT INTO `faIcons` VALUES ('591', 'fa-user-times');
INSERT INTO `faIcons` VALUES ('592', 'fa-hotel');
INSERT INTO `faIcons` VALUES ('593', 'fa-bed');
INSERT INTO `faIcons` VALUES ('594', 'fa-viacoin');
INSERT INTO `faIcons` VALUES ('595', 'fa-train');
INSERT INTO `faIcons` VALUES ('596', 'fa-subway');
INSERT INTO `faIcons` VALUES ('597', 'fa-medium');
INSERT INTO `faIcons` VALUES ('598', 'fa-yc');
INSERT INTO `faIcons` VALUES ('599', 'fa-y-combinator');
INSERT INTO `faIcons` VALUES ('600', 'fa-optin-monster');
INSERT INTO `faIcons` VALUES ('601', 'fa-opencart');
INSERT INTO `faIcons` VALUES ('602', 'fa-expeditedssl');
INSERT INTO `faIcons` VALUES ('603', 'fa-battery-4');
INSERT INTO `faIcons` VALUES ('604', 'fa-battery');
INSERT INTO `faIcons` VALUES ('605', 'fa-battery-full');
INSERT INTO `faIcons` VALUES ('606', 'fa-battery-3');
INSERT INTO `faIcons` VALUES ('607', 'fa-battery-three-quarters');
INSERT INTO `faIcons` VALUES ('608', 'fa-battery-2');
INSERT INTO `faIcons` VALUES ('609', 'fa-battery-half');
INSERT INTO `faIcons` VALUES ('610', 'fa-battery-1');
INSERT INTO `faIcons` VALUES ('611', 'fa-battery-quarter');
INSERT INTO `faIcons` VALUES ('612', 'fa-battery-0');
INSERT INTO `faIcons` VALUES ('613', 'fa-battery-empty');
INSERT INTO `faIcons` VALUES ('614', 'fa-mouse-pointer');
INSERT INTO `faIcons` VALUES ('615', 'fa-i-cursor');
INSERT INTO `faIcons` VALUES ('616', 'fa-object-group');
INSERT INTO `faIcons` VALUES ('617', 'fa-object-ungroup');
INSERT INTO `faIcons` VALUES ('618', 'fa-sticky-note');
INSERT INTO `faIcons` VALUES ('619', 'fa-sticky-note-o');
INSERT INTO `faIcons` VALUES ('620', 'fa-cc-jcb');
INSERT INTO `faIcons` VALUES ('621', 'fa-cc-diners-club');
INSERT INTO `faIcons` VALUES ('622', 'fa-clone');
INSERT INTO `faIcons` VALUES ('623', 'fa-balance-scale');
INSERT INTO `faIcons` VALUES ('624', 'fa-hourglass-o');
INSERT INTO `faIcons` VALUES ('625', 'fa-hourglass-1');
INSERT INTO `faIcons` VALUES ('626', 'fa-hourglass-start');
INSERT INTO `faIcons` VALUES ('627', 'fa-hourglass-2');
INSERT INTO `faIcons` VALUES ('628', 'fa-hourglass-half');
INSERT INTO `faIcons` VALUES ('629', 'fa-hourglass-3');
INSERT INTO `faIcons` VALUES ('630', 'fa-hourglass-end');
INSERT INTO `faIcons` VALUES ('631', 'fa-hourglass');
INSERT INTO `faIcons` VALUES ('632', 'fa-hand-grab-o');
INSERT INTO `faIcons` VALUES ('633', 'fa-hand-rock-o');
INSERT INTO `faIcons` VALUES ('634', 'fa-hand-stop-o');
INSERT INTO `faIcons` VALUES ('635', 'fa-hand-paper-o');
INSERT INTO `faIcons` VALUES ('636', 'fa-hand-scissors-o');
INSERT INTO `faIcons` VALUES ('637', 'fa-hand-lizard-o');
INSERT INTO `faIcons` VALUES ('638', 'fa-hand-spock-o');
INSERT INTO `faIcons` VALUES ('639', 'fa-hand-pointer-o');
INSERT INTO `faIcons` VALUES ('640', 'fa-hand-peace-o');
INSERT INTO `faIcons` VALUES ('641', 'fa-trademark');
INSERT INTO `faIcons` VALUES ('642', 'fa-registered');
INSERT INTO `faIcons` VALUES ('643', 'fa-creative-commons');
INSERT INTO `faIcons` VALUES ('644', 'fa-gg');
INSERT INTO `faIcons` VALUES ('645', 'fa-gg-circle');
INSERT INTO `faIcons` VALUES ('646', 'fa-tripadvisor');
INSERT INTO `faIcons` VALUES ('647', 'fa-odnoklassniki');
INSERT INTO `faIcons` VALUES ('648', 'fa-odnoklassniki-square');
INSERT INTO `faIcons` VALUES ('649', 'fa-get-pocket');
INSERT INTO `faIcons` VALUES ('650', 'fa-wikipedia-w');
INSERT INTO `faIcons` VALUES ('651', 'fa-safari');
INSERT INTO `faIcons` VALUES ('652', 'fa-chrome');
INSERT INTO `faIcons` VALUES ('653', 'fa-firefox');
INSERT INTO `faIcons` VALUES ('654', 'fa-opera');
INSERT INTO `faIcons` VALUES ('655', 'fa-internet-explorer');
INSERT INTO `faIcons` VALUES ('656', 'fa-tv');
INSERT INTO `faIcons` VALUES ('657', 'fa-television');
INSERT INTO `faIcons` VALUES ('658', 'fa-contao');
INSERT INTO `faIcons` VALUES ('659', 'fa-500px');
INSERT INTO `faIcons` VALUES ('660', 'fa-amazon');
INSERT INTO `faIcons` VALUES ('661', 'fa-calendar-plus-o');
INSERT INTO `faIcons` VALUES ('662', 'fa-calendar-minus-o');
INSERT INTO `faIcons` VALUES ('663', 'fa-calendar-times-o');
INSERT INTO `faIcons` VALUES ('664', 'fa-calendar-check-o');
INSERT INTO `faIcons` VALUES ('665', 'fa-industry');
INSERT INTO `faIcons` VALUES ('666', 'fa-map-pin');
INSERT INTO `faIcons` VALUES ('667', 'fa-map-signs');
INSERT INTO `faIcons` VALUES ('668', 'fa-map-o');
INSERT INTO `faIcons` VALUES ('669', 'fa-map');
INSERT INTO `faIcons` VALUES ('670', 'fa-commenting');
INSERT INTO `faIcons` VALUES ('671', 'fa-commenting-o');
INSERT INTO `faIcons` VALUES ('672', 'fa-houzz');
INSERT INTO `faIcons` VALUES ('673', 'fa-vimeo');
INSERT INTO `faIcons` VALUES ('674', 'fa-black-tie');
INSERT INTO `faIcons` VALUES ('675', 'fa-fonticons');
INSERT INTO `faIcons` VALUES ('676', 'fa-reddit-alien');
INSERT INTO `faIcons` VALUES ('677', 'fa-edge');
INSERT INTO `faIcons` VALUES ('678', 'fa-credit-card-alt');
INSERT INTO `faIcons` VALUES ('679', 'fa-codiepie');
INSERT INTO `faIcons` VALUES ('680', 'fa-modx');
INSERT INTO `faIcons` VALUES ('681', 'fa-fort-awesome');
INSERT INTO `faIcons` VALUES ('682', 'fa-usb');
INSERT INTO `faIcons` VALUES ('683', 'fa-product-hunt');
INSERT INTO `faIcons` VALUES ('684', 'fa-mixcloud');
INSERT INTO `faIcons` VALUES ('685', 'fa-scribd');
INSERT INTO `faIcons` VALUES ('686', 'fa-pause-circle');
INSERT INTO `faIcons` VALUES ('687', 'fa-pause-circle-o');
INSERT INTO `faIcons` VALUES ('688', 'fa-stop-circle');
INSERT INTO `faIcons` VALUES ('689', 'fa-stop-circle-o');
INSERT INTO `faIcons` VALUES ('690', 'fa-shopping-bag');
INSERT INTO `faIcons` VALUES ('691', 'fa-shopping-basket');
INSERT INTO `faIcons` VALUES ('692', 'fa-hashtag');
INSERT INTO `faIcons` VALUES ('693', 'fa-bluetooth');
INSERT INTO `faIcons` VALUES ('694', 'fa-bluetooth-b');
INSERT INTO `faIcons` VALUES ('695', 'fa-percent');
INSERT INTO `faIcons` VALUES ('696', 'fa-gitlab');
INSERT INTO `faIcons` VALUES ('697', 'fa-wpbeginner');
INSERT INTO `faIcons` VALUES ('698', 'fa-wpforms');
INSERT INTO `faIcons` VALUES ('699', 'fa-envira');
INSERT INTO `faIcons` VALUES ('700', 'fa-universal-access');
INSERT INTO `faIcons` VALUES ('701', 'fa-wheelchair-alt');
INSERT INTO `faIcons` VALUES ('702', 'fa-question-circle-o');
INSERT INTO `faIcons` VALUES ('703', 'fa-blind');
INSERT INTO `faIcons` VALUES ('704', 'fa-audio-description');
INSERT INTO `faIcons` VALUES ('705', 'fa-volume-control-phone');
INSERT INTO `faIcons` VALUES ('706', 'fa-braille');
INSERT INTO `faIcons` VALUES ('707', 'fa-assistive-listening-systems');
INSERT INTO `faIcons` VALUES ('708', 'fa-asl-interpreting');
INSERT INTO `faIcons` VALUES ('709', 'fa-american-sign-language-interpreting');
INSERT INTO `faIcons` VALUES ('710', 'fa-deafness');
INSERT INTO `faIcons` VALUES ('711', 'fa-hard-of-hearing');
INSERT INTO `faIcons` VALUES ('712', 'fa-deaf');
INSERT INTO `faIcons` VALUES ('713', 'fa-glide');
INSERT INTO `faIcons` VALUES ('714', 'fa-glide-g');
INSERT INTO `faIcons` VALUES ('715', 'fa-signing');
INSERT INTO `faIcons` VALUES ('716', 'fa-sign-language');
INSERT INTO `faIcons` VALUES ('717', 'fa-low-vision');
INSERT INTO `faIcons` VALUES ('718', 'fa-viadeo');
INSERT INTO `faIcons` VALUES ('719', 'fa-viadeo-square');
INSERT INTO `faIcons` VALUES ('720', 'fa-snapchat');
INSERT INTO `faIcons` VALUES ('721', 'fa-snapchat-ghost');
INSERT INTO `faIcons` VALUES ('722', 'fa-snapchat-square');
INSERT INTO `faIcons` VALUES ('723', 'fa-pied-piper');
INSERT INTO `faIcons` VALUES ('724', 'fa-first-order');
INSERT INTO `faIcons` VALUES ('725', 'fa-yoast');
INSERT INTO `faIcons` VALUES ('726', 'fa-themeisle');
INSERT INTO `faIcons` VALUES ('727', 'fa-google-plus-circle');
INSERT INTO `faIcons` VALUES ('728', 'fa-google-plus-official');
INSERT INTO `faIcons` VALUES ('729', 'fa-fa');
INSERT INTO `faIcons` VALUES ('730', 'fa-font-awesome');
INSERT INTO `faIcons` VALUES ('731', 'fa-handshake-o');
INSERT INTO `faIcons` VALUES ('732', 'fa-envelope-open');
INSERT INTO `faIcons` VALUES ('733', 'fa-envelope-open-o');
INSERT INTO `faIcons` VALUES ('734', 'fa-linode');
INSERT INTO `faIcons` VALUES ('735', 'fa-address-book');
INSERT INTO `faIcons` VALUES ('736', 'fa-address-book-o');
INSERT INTO `faIcons` VALUES ('737', 'fa-vcard');
INSERT INTO `faIcons` VALUES ('738', 'fa-address-card');
INSERT INTO `faIcons` VALUES ('739', 'fa-vcard-o');
INSERT INTO `faIcons` VALUES ('740', 'fa-address-card-o');
INSERT INTO `faIcons` VALUES ('741', 'fa-user-circle');
INSERT INTO `faIcons` VALUES ('742', 'fa-user-circle-o');
INSERT INTO `faIcons` VALUES ('743', 'fa-user-o');
INSERT INTO `faIcons` VALUES ('744', 'fa-id-badge');
INSERT INTO `faIcons` VALUES ('745', 'fa-drivers-license');
INSERT INTO `faIcons` VALUES ('746', 'fa-id-card');
INSERT INTO `faIcons` VALUES ('747', 'fa-drivers-license-o');
INSERT INTO `faIcons` VALUES ('748', 'fa-id-card-o');
INSERT INTO `faIcons` VALUES ('749', 'fa-quora');
INSERT INTO `faIcons` VALUES ('750', 'fa-free-code-camp');
INSERT INTO `faIcons` VALUES ('751', 'fa-telegram');
INSERT INTO `faIcons` VALUES ('752', 'fa-thermometer-4');
INSERT INTO `faIcons` VALUES ('753', 'fa-thermometer');
INSERT INTO `faIcons` VALUES ('754', 'fa-thermometer-full');
INSERT INTO `faIcons` VALUES ('755', 'fa-thermometer-3');
INSERT INTO `faIcons` VALUES ('756', 'fa-thermometer-three-quarters');
INSERT INTO `faIcons` VALUES ('757', 'fa-thermometer-2');
INSERT INTO `faIcons` VALUES ('758', 'fa-thermometer-half');
INSERT INTO `faIcons` VALUES ('759', 'fa-thermometer-1');
INSERT INTO `faIcons` VALUES ('760', 'fa-thermometer-quarter');
INSERT INTO `faIcons` VALUES ('761', 'fa-thermometer-0');
INSERT INTO `faIcons` VALUES ('762', 'fa-thermometer-empty');
INSERT INTO `faIcons` VALUES ('763', 'fa-shower');
INSERT INTO `faIcons` VALUES ('764', 'fa-bathtub');
INSERT INTO `faIcons` VALUES ('765', 'fa-s15');
INSERT INTO `faIcons` VALUES ('766', 'fa-bath');
INSERT INTO `faIcons` VALUES ('767', 'fa-podcast');
INSERT INTO `faIcons` VALUES ('768', 'fa-window-maximize');
INSERT INTO `faIcons` VALUES ('769', 'fa-window-minimize');
INSERT INTO `faIcons` VALUES ('770', 'fa-window-restore');
INSERT INTO `faIcons` VALUES ('771', 'fa-times-rectangle');
INSERT INTO `faIcons` VALUES ('772', 'fa-window-close');
INSERT INTO `faIcons` VALUES ('773', 'fa-times-rectangle-o');
INSERT INTO `faIcons` VALUES ('774', 'fa-window-close-o');
INSERT INTO `faIcons` VALUES ('775', 'fa-bandcamp');
INSERT INTO `faIcons` VALUES ('776', 'fa-grav');
INSERT INTO `faIcons` VALUES ('777', 'fa-etsy');
INSERT INTO `faIcons` VALUES ('778', 'fa-imdb');
INSERT INTO `faIcons` VALUES ('779', 'fa-ravelry');
INSERT INTO `faIcons` VALUES ('780', 'fa-eercast');
INSERT INTO `faIcons` VALUES ('781', 'fa-microchip');
INSERT INTO `faIcons` VALUES ('782', 'fa-snowflake-o');
INSERT INTO `faIcons` VALUES ('783', 'fa-superpowers');
INSERT INTO `faIcons` VALUES ('784', 'fa-wpexplorer');
INSERT INTO `faIcons` VALUES ('785', 'fa-meetup');

-- ----------------------------
-- Table structure for Menu
-- ----------------------------
DROP TABLE IF EXISTS `Menu`;
CREATE TABLE `Menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idParent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  `dataRel` varchar(255) NOT NULL,
  `order` int(255) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `MenuStatus` (`status`),
  CONSTRAINT `MenuStatus` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Menu
-- ----------------------------
INSERT INTO `Menu` VALUES ('1', '0', 'Empresas', '#', '', '0', '0');
INSERT INTO `Menu` VALUES ('2', '0', 'Eventos', '?option=eventos', '', '2', '1');
INSERT INTO `Menu` VALUES ('3', '0', 'Operadores', '?option=operador', '', '3', '1');
INSERT INTO `Menu` VALUES ('4', '0', 'Telemercadeo', '?option=telemercadeo', '', '4', '1');
INSERT INTO `Menu` VALUES ('5', '0', 'Reportes', '?option=reportes', '', '5', '1');
INSERT INTO `Menu` VALUES ('6', '0', 'Inicio', '?option=dashBoard', '', '1', '1');

-- ----------------------------
-- Table structure for MenuPerfil
-- ----------------------------
DROP TABLE IF EXISTS `MenuPerfil`;
CREATE TABLE `MenuPerfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `StatusMenuPerfil` (`status`),
  CONSTRAINT `StatusMenuPerfil` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of MenuPerfil
-- ----------------------------
INSERT INTO `MenuPerfil` VALUES ('1', '2', '1', '1');
INSERT INTO `MenuPerfil` VALUES ('2', '3', '1', '1');
INSERT INTO `MenuPerfil` VALUES ('3', '4', '1', '1');
INSERT INTO `MenuPerfil` VALUES ('4', '5', '1', '1');
INSERT INTO `MenuPerfil` VALUES ('5', '6', '1', '1');

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
-- Table structure for Perfil
-- ----------------------------
DROP TABLE IF EXISTS `Perfil`;
CREATE TABLE `Perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `PerfilStatus` (`status`),
  CONSTRAINT `PerfilStatus` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Perfil
-- ----------------------------
INSERT INTO `Perfil` VALUES ('1', 'superadmin', 'Super Administrador', '1');

-- ----------------------------
-- Table structure for Status
-- ----------------------------
DROP TABLE IF EXISTS `Status`;
CREATE TABLE `Status` (
  `id` int(1) NOT NULL,
  `statusName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Status
-- ----------------------------
INSERT INTO `Status` VALUES ('0', 'Despublicado');
INSERT INTO `Status` VALUES ('1', 'Publicado');

-- ----------------------------
-- Table structure for StatusCandidato
-- ----------------------------
DROP TABLE IF EXISTS `StatusCandidato`;
CREATE TABLE `StatusCandidato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of StatusCandidato
-- ----------------------------
INSERT INTO `StatusCandidato` VALUES ('1', 'Confirmado');
INSERT INTO `StatusCandidato` VALUES ('2', 'No interesado');
INSERT INTO `StatusCandidato` VALUES ('3', 'Volver a llamar');
INSERT INTO `StatusCandidato` VALUES ('4', 'Nuevo');

-- ----------------------------
-- Table structure for User
-- ----------------------------
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of User
-- ----------------------------
INSERT INTO `User` VALUES ('1', 'admin', 'e962735010b9b1f71f04fbf84bc90bee::MTUxODU0NDU4Ng==', 'Administrador', 'admin@admin.com', '1');

-- ----------------------------
-- Table structure for UserPerfil
-- ----------------------------
DROP TABLE IF EXISTS `UserPerfil`;
CREATE TABLE `UserPerfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `perfilId` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `UsuarioPerfilStatus` (`status`),
  CONSTRAINT `UsuarioPerfilStatus` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of UserPerfil
-- ----------------------------
INSERT INTO `UserPerfil` VALUES ('1', '1', '1', '1');

-- ----------------------------
-- Table structure for ValorDatosAdicionales
-- ----------------------------
DROP TABLE IF EXISTS `ValorDatosAdicionales`;
CREATE TABLE `ValorDatosAdicionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDatosAdicionalesEvento` int(11) NOT NULL,
  `idCandidato` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ID_DATOSADIC` (`idDatosAdicionalesEvento`),
  KEY `FK_ID_CANDIDATO` (`idCandidato`),
  KEY `FK_STATUS_VDA` (`status`),
  CONSTRAINT `FK_ID_DATOSADIC` FOREIGN KEY (`idDatosAdicionalesEvento`) REFERENCES `DatosAdicionalesEvento` (`id`),
  CONSTRAINT `FK_ID_CANDIDATO` FOREIGN KEY (`idCandidato`) REFERENCES `Candidatos` (`id`),
  CONSTRAINT `FK_STATUS_VDA` FOREIGN KEY (`status`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ValorDatosAdicionales
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
