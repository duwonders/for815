/*
 Navicat Premium Data Transfer

 Source Server         : duwonders
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 08/25/2015 22:42:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `award`
-- ----------------------------
DROP TABLE IF EXISTS `award`;
CREATE TABLE `award` (
  `id` int(11) NOT NULL,
  `award` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `award`
-- ----------------------------
BEGIN;
INSERT INTO `award` VALUES ('1', 'mac pro', '9'), ('2', 'mac air', '14'), ('3', 'imac', '4'), ('4', 'iphone6s', '20'), ('5', 'iphone5s', '98'), ('6', 'iphone4s', '198');
COMMIT;

-- ----------------------------
--  Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `comment`
-- ----------------------------
BEGIN;
INSERT INTO `comment` VALUES ('1', '妹子l', 'dsadsadsa'), ('2', '妹子y', 'dasdsa'), ('3', '妹子l', '我是基佬'), ('4', '妹子l', 'y也是基佬'), ('5', '妹子l', 'w更是基佬'), ('6', '妹子w', '呵呵'), ('7', '妹子l', 'hehehe'), ('8', '妹子l', 'lallalalala'), ('9', '妹子l', 'heheh'), ('10', '妹子l', 'dsadsa'), ('11', '妹子w', '呵呵'), ('12', '妹子w', 'dsadsa'), ('13', '妹子w', 'dsadsa'), ('14', '妹子l', 'dsadsa'), ('15', '妹子w', 'lalala');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', '妹子l', '123123'), ('2', '妹子w', '123123'), ('3', '妹子y', '123123');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
