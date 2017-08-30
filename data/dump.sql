/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : bookedition

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2017-08-30 15:42:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_editions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_editions`;
CREATE TABLE `tbl_editions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_editions
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_readers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_readers`;
CREATE TABLE `tbl_readers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reader` (`name`,`birthday`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_readers
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_subscriptions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_subscriptions`;
CREATE TABLE `tbl_subscriptions` (
  `id_edition` int(11) NOT NULL,
  `id_reader` int(11) NOT NULL,
  UNIQUE KEY `subscription` (`id_edition`,`id_reader`),
  KEY `id_edition` (`id_edition`),
  KEY `id_reader` (`id_reader`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_subscriptions
-- ----------------------------
