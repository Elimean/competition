/*
 Navicat Premium Data Transfer

 Source Server         : mamp
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : db_competition

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 19/10/2018 10:49:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
BEGIN;
INSERT INTO `t_admin` VALUES (1, 'admin', '09060616068d2b9544dc33f2fbe4ce2d', '董钰铖');
COMMIT;

-- ----------------------------
-- Table structure for t_class
-- ----------------------------
DROP TABLE IF EXISTS `t_class`;
CREATE TABLE `t_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_values` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_class
-- ----------------------------
BEGIN;
INSERT INTO `t_class` VALUES (1, '17级');
INSERT INTO `t_class` VALUES (2, '18级');
COMMIT;

-- ----------------------------
-- Table structure for t_grade
-- ----------------------------
DROP TABLE IF EXISTS `t_grade`;
CREATE TABLE `t_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_values` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_grade
-- ----------------------------
BEGIN;
INSERT INTO `t_grade` VALUES (1, '1班');
INSERT INTO `t_grade` VALUES (2, '2班');
INSERT INTO `t_grade` VALUES (3, '3班');
INSERT INTO `t_grade` VALUES (4, '4班');
INSERT INTO `t_grade` VALUES (5, '5班');
INSERT INTO `t_grade` VALUES (6, '6班');
COMMIT;

-- ----------------------------
-- Table structure for t_professional
-- ----------------------------
DROP TABLE IF EXISTS `t_professional`;
CREATE TABLE `t_professional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professional_values` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_professional
-- ----------------------------
BEGIN;
INSERT INTO `t_professional` VALUES (1, '数控技术');
INSERT INTO `t_professional` VALUES (2, '机械设计与制造');
COMMIT;

-- ----------------------------
-- Table structure for t_project
-- ----------------------------
DROP TABLE IF EXISTS `t_project`;
CREATE TABLE `t_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_values` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_project
-- ----------------------------
BEGIN;
INSERT INTO `t_project` VALUES (1, '工业产品数字化设计与制造');
INSERT INTO `t_project` VALUES (2, '广告设计');
COMMIT;

-- ----------------------------
-- Table structure for t_score
-- ----------------------------
DROP TABLE IF EXISTS `t_score`;
CREATE TABLE `t_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score1` varchar(255) NOT NULL,
  `score2` varchar(255) NOT NULL,
  `score3` varchar(255) NOT NULL,
  `score4` varchar(255) NOT NULL,
  `score5` varchar(255) NOT NULL,
  `score6` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_teacher
-- ----------------------------
DROP TABLE IF EXISTS `t_teacher`;
CREATE TABLE `t_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `professional` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_teacher
-- ----------------------------
BEGIN;
INSERT INTO `t_teacher` VALUES (1, '20110005', '09060616068d2b9544dc33f2fbe4ce2d', '董钰铖', '数控技术', 1);
INSERT INTO `t_teacher` VALUES (2, '20110006', '09060616068d2b9544dc33f2fbe4ce2d', '苏露', '数控技术', 2);
COMMIT;

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `userpwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `professional` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `appoved` varchar(255) NOT NULL,
  `team` int(11) NOT NULL,
  `team_user_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES (1, 'elimean', 'e10adc3949ba59abbe56e057f20f883e', '董钰铖', 123456, '1', '1', '1', '1', '13096313313', '0', 1, 0, '');
INSERT INTO `t_user` VALUES (2, 'sulu', 'e10adc3949ba59abbe56e057f20f883e', '苏露', 123321, '1', '1', '1', '1', '1234', '0', 1, 0, '');
INSERT INTO `t_user` VALUES (3, 'aa', 'aaaaa', 'aaaaaa', 1111, '1', '1', '1', '1', '111', '0', 1, 0, '');
INSERT INTO `t_user` VALUES (4, 'bb', 'bbb', 'bb', 2222, '1', '1', '1', '1', '1', '0', 1, 0, '');
INSERT INTO `t_user` VALUES (5, 'dyc', '4297f44b13955235245b2497399d7a93', 'aaa', 8888, '1', '1', '1', '2', '1', '0', 1, 0, '');
INSERT INTO `t_user` VALUES (6, '111', '698d51a19d8a121ce581499d7b701668', '111', 111111111, '1', '1', '1', '2', '1234', '0', 1, 0, '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
