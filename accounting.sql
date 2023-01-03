/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : accounting

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-12-14 11:51:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mytable`
-- ----------------------------
DROP TABLE IF EXISTS `mytable`;
CREATE TABLE `mytable` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tuition_fee` mediumint(9) DEFAULT NULL,
  `number_of_students` mediumint(9) DEFAULT NULL,
  `grade` mediumint(9) DEFAULT NULL,
  `year` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mytable
-- ----------------------------
INSERT INTO `mytable` VALUES ('1', '38687', '294', '1', '2022');
INSERT INTO `mytable` VALUES ('2', '29547', '307', '2', '2022');
INSERT INTO `mytable` VALUES ('3', '40409', '241', '3', '2022');
INSERT INTO `mytable` VALUES ('4', '24932', '17', '4', '2022');
INSERT INTO `mytable` VALUES ('5', '30753', '306', '5', '2022');
INSERT INTO `mytable` VALUES ('6', '33119', '231', '6', '2022');
INSERT INTO `mytable` VALUES ('7', '29298', '124', '7', '2022');
INSERT INTO `mytable` VALUES ('8', '33782', '238', '8', '2022');
INSERT INTO `mytable` VALUES ('9', '37809', '174', '9', '2022');
INSERT INTO `mytable` VALUES ('10', '32489', '337', '10', '2022');
INSERT INTO `mytable` VALUES ('11', '36476', '295', '11', '2022');
INSERT INTO `mytable` VALUES ('12', '37570', '151', '12', '2022');
INSERT INTO `mytable` VALUES ('13', '25432', '284', '13', '2022');
INSERT INTO `mytable` VALUES ('14', '24726', '221', '14', '2022');
INSERT INTO `mytable` VALUES ('15', '28708', '197', '15', '2022');
INSERT INTO `mytable` VALUES ('16', '26019', '234', '1', '2021');
INSERT INTO `mytable` VALUES ('17', '32810', '311', '2', '2021');
INSERT INTO `mytable` VALUES ('18', '30318', '189', '3', '2021');
INSERT INTO `mytable` VALUES ('19', '37547', '331', '4', '2021');
INSERT INTO `mytable` VALUES ('20', '32671', '160', '5', '2021');
INSERT INTO `mytable` VALUES ('21', '35589', '163', '6', '2021');
INSERT INTO `mytable` VALUES ('22', '28932', '142', '7', '2021');
INSERT INTO `mytable` VALUES ('23', '37799', '356', '8', '2021');
INSERT INTO `mytable` VALUES ('24', '37161', '275', '9', '2021');
INSERT INTO `mytable` VALUES ('25', '29818', '23', '10', '2021');
INSERT INTO `mytable` VALUES ('26', '28570', '73', '11', '2021');
INSERT INTO `mytable` VALUES ('27', '32640', '79', '12', '2021');
INSERT INTO `mytable` VALUES ('28', '32917', '67', '13', '2021');
INSERT INTO `mytable` VALUES ('29', '29528', '319', '14', '2021');
INSERT INTO `mytable` VALUES ('30', '27840', '326', '15', '2021');
INSERT INTO `mytable` VALUES ('31', '33192', '218', '1', '2020');
INSERT INTO `mytable` VALUES ('32', '40116', '146', '2', '2020');
INSERT INTO `mytable` VALUES ('33', '31106', '301', '3', '2020');
INSERT INTO `mytable` VALUES ('34', '29274', '184', '4', '2020');
INSERT INTO `mytable` VALUES ('35', '35776', '266', '5', '2020');
INSERT INTO `mytable` VALUES ('36', '24371', '339', '6', '2020');
INSERT INTO `mytable` VALUES ('37', '30198', '186', '7', '2020');
INSERT INTO `mytable` VALUES ('38', '29336', '321', '8', '2020');
INSERT INTO `mytable` VALUES ('39', '36207', '228', '9', '2020');
INSERT INTO `mytable` VALUES ('40', '33123', '8', '10', '2020');
INSERT INTO `mytable` VALUES ('41', '25217', '299', '11', '2020');
INSERT INTO `mytable` VALUES ('42', '27160', '82', '12', '2020');
INSERT INTO `mytable` VALUES ('43', '30650', '257', '13', '2020');
INSERT INTO `mytable` VALUES ('44', '30127', '133', '14', '2020');
INSERT INTO `mytable` VALUES ('45', '36559', '117', '15', '2020');
INSERT INTO `mytable` VALUES ('46', '24936', '302', '1', '2019');
INSERT INTO `mytable` VALUES ('47', '38392', '147', '2', '2019');
INSERT INTO `mytable` VALUES ('48', '24298', '103', '3', '2019');
INSERT INTO `mytable` VALUES ('49', '33173', '35', '4', '2019');
INSERT INTO `mytable` VALUES ('50', '27556', '115', '5', '2019');
INSERT INTO `mytable` VALUES ('51', '35561', '203', '6', '2019');
INSERT INTO `mytable` VALUES ('52', '30084', '318', '7', '2019');
INSERT INTO `mytable` VALUES ('53', '35975', '216', '8', '2019');
INSERT INTO `mytable` VALUES ('54', '24731', '199', '9', '2019');
INSERT INTO `mytable` VALUES ('55', '29464', '35', '10', '2019');
INSERT INTO `mytable` VALUES ('56', '39433', '67', '11', '2019');
INSERT INTO `mytable` VALUES ('57', '36452', '104', '12', '2019');
INSERT INTO `mytable` VALUES ('58', '24575', '258', '13', '2019');
INSERT INTO `mytable` VALUES ('59', '39742', '300', '14', '2019');
INSERT INTO `mytable` VALUES ('60', '30550', '308', '15', '2019');
INSERT INTO `mytable` VALUES ('61', '31771', '148', '1', '2018');
INSERT INTO `mytable` VALUES ('62', '34290', '307', '2', '2018');
INSERT INTO `mytable` VALUES ('63', '32870', '107', '3', '2018');
INSERT INTO `mytable` VALUES ('64', '37190', '202', '4', '2018');
INSERT INTO `mytable` VALUES ('65', '39618', '96', '5', '2018');
INSERT INTO `mytable` VALUES ('66', '33180', '46', '6', '2018');
INSERT INTO `mytable` VALUES ('67', '31599', '234', '7', '2018');
INSERT INTO `mytable` VALUES ('68', '31495', '107', '8', '2018');
INSERT INTO `mytable` VALUES ('69', '30389', '301', '9', '2018');
INSERT INTO `mytable` VALUES ('70', '28860', '223', '10', '2018');
INSERT INTO `mytable` VALUES ('71', '31139', '322', '11', '2018');
INSERT INTO `mytable` VALUES ('72', '24189', '295', '12', '2018');
INSERT INTO `mytable` VALUES ('73', '38574', '211', '13', '2018');
INSERT INTO `mytable` VALUES ('74', '36683', '22', '14', '2018');
INSERT INTO `mytable` VALUES ('75', '25480', '182', '15', '2018');

-- ----------------------------
-- Table structure for `tbl_assessed_tf`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_assessed_tf`;
CREATE TABLE `tbl_assessed_tf` (
  `assessed_id` int(20) NOT NULL AUTO_INCREMENT,
  `stud_no` varchar(100) DEFAULT '',
  `payment` varchar(100) DEFAULT NULL,
  `course_id` int(20) DEFAULT NULL,
  `tf_id` int(20) DEFAULT NULL,
  `sem_id` int(20) DEFAULT NULL,
  `ay_id` int(20) DEFAULT NULL,
  `lab_id` varchar(50) DEFAULT NULL,
  `lab_units` varchar(50) DEFAULT NULL,
  `disc_id` varchar(50) NOT NULL,
  `created_at` varchar(20) DEFAULT '',
  `last_updated` varchar(20) DEFAULT '',
  `updated_by` varchar(100) DEFAULT '',
  PRIMARY KEY (`assessed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_assessed_tf
-- ----------------------------
INSERT INTO `tbl_assessed_tf` VALUES ('264', 'B19-1-0007', 'trimestral', '10', '27', '1', '12', '120,124', '2,1', '22,23', '2022-11-26 22:56:29', '2022-11-27 13:47:42', 'Sajo, She - Accounting');
INSERT INTO `tbl_assessed_tf` VALUES ('265', 'B21-1-0007', 'trimestral', '25', '29', '1', '12', '118', '3', '21,23', '2022-11-28 20:44:51', '2022-11-28 21:12:32', 'Sajo, She - Accounting');
INSERT INTO `tbl_assessed_tf` VALUES ('266', 'B22-1-0001', 'cash', '1', '32', '1', '12', '117', '3', '21,22', '2022-12-13 03:58:01', '2022-12-13 03:58:01', 'Sajo, She - Accounting');
INSERT INTO `tbl_assessed_tf` VALUES ('267', 'B22-1-0012', 'cash', '1', '32', '1', '12', '117', '3', '21,22,23', '2022-12-13 17:03:09', '2022-12-13 17:10:44', 'Sajo, She - Accounting');
INSERT INTO `tbl_assessed_tf` VALUES ('268', 'B22-1-0029', 'cash', '1', '32', '1', '12', '117', '3', '21,23', '2022-12-14 11:36:24', '2022-12-14 11:36:24', 'Sajo, She - Accounting');

-- ----------------------------
-- Table structure for `tbl_data`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_data`;
CREATE TABLE `tbl_data` (
  `data_id` int(20) NOT NULL AUTO_INCREMENT,
  `x` int(10) DEFAULT NULL,
  `y` int(10) DEFAULT NULL,
  `p` int(10) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_data
-- ----------------------------
INSERT INTO `tbl_data` VALUES ('1', '4', '44', '1');
INSERT INTO `tbl_data` VALUES ('2', '3', '29', '0');
INSERT INTO `tbl_data` VALUES ('3', '2', '15', '1');
INSERT INTO `tbl_data` VALUES ('4', '1', '10', '0');
INSERT INTO `tbl_data` VALUES ('5', '4', '39', '1');

-- ----------------------------
-- Table structure for `tbl_discounts`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_discounts`;
CREATE TABLE `tbl_discounts` (
  `disc_id` int(20) NOT NULL AUTO_INCREMENT,
  `discount` int(20) DEFAULT NULL,
  `discount_desc` varchar(50) DEFAULT NULL,
  `discount_status` int(10) DEFAULT NULL,
  `percent` int(10) DEFAULT NULL,
  `ay_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`disc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_discounts
-- ----------------------------
INSERT INTO `tbl_discounts` VALUES ('21', '5', 'Sibling\'s Discount (1st sibling)', '0', '1', '12', '2022-11-21 21:25:31', '2022-11-21 21:25:31', 'Sajo, She - Accounting');
INSERT INTO `tbl_discounts` VALUES ('22', '10', 'Sibling\'s Discount (2nd sibling)', '0', '1', '12', '2022-11-21 21:25:47', '2022-11-21 21:25:47', 'Sajo, She - Accounting');
INSERT INTO `tbl_discounts` VALUES ('23', '1500', 'Academic Discount', '0', '0', '12', '2022-11-21 21:26:11', '2022-11-21 21:26:11', 'Sajo, She - Accounting');
INSERT INTO `tbl_discounts` VALUES ('24', '12000', 'ESC Holder', '0', '0', '12', '2022-11-25 14:47:29', '2022-11-25 14:50:18', 'Sajo, She - Accounting');

-- ----------------------------
-- Table structure for `tbl_installment_dates`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_installment_dates`;
CREATE TABLE `tbl_installment_dates` (
  `installment_id` int(20) NOT NULL AUTO_INCREMENT,
  `date_1` datetime DEFAULT NULL,
  `date_2` datetime DEFAULT NULL,
  `date_3` datetime DEFAULT NULL,
  `date_4` datetime DEFAULT NULL,
  `sem_id` int(11) DEFAULT NULL,
  `ay_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`installment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_installment_dates
-- ----------------------------
INSERT INTO `tbl_installment_dates` VALUES ('2', '2022-10-09 00:00:00', '2022-12-09 00:00:00', '2023-02-15 00:00:00', '2023-04-15 00:00:00', '1', '12');

-- ----------------------------
-- Table structure for `tbl_lab_fees`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lab_fees`;
CREATE TABLE `tbl_lab_fees` (
  `lab_id` int(10) NOT NULL AUTO_INCREMENT,
  `ay_id` int(10) DEFAULT NULL,
  `year_id` int(10) DEFAULT NULL,
  `lab_desc` varchar(50) DEFAULT '',
  `lab` varchar(50) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_lab_fees
-- ----------------------------
INSERT INTO `tbl_lab_fees` VALUES ('117', '12', '1', 'Computer', '1469.93', '2022-11-26 15:14:24', '2022-11-26 15:14:24', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('118', '12', '2', 'Computer', '1536.98', '2022-11-26 15:14:25', '2022-11-26 15:14:25', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('119', '12', '3', 'Computer', '1536.98', '2022-11-26 15:14:25', '2022-11-26 15:14:25', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('120', '12', '4', 'Computer', '1691.31', '2022-11-26 15:14:25', '2022-11-26 15:14:25', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('121', '12', '1', 'Physics', '1684.98', '2022-11-26 19:58:56', '2022-11-26 19:58:56', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('122', '12', '2', 'Physics', '1760.88', '2022-11-26 19:58:56', '2022-11-26 19:58:56', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('123', '12', '3', 'Physics', '1760.88', '2022-11-26 19:58:56', '2022-11-26 19:58:56', 'Sajo, She - Accounting');
INSERT INTO `tbl_lab_fees` VALUES ('124', '12', '4', 'Physics', '1937.98', '2022-11-26 19:58:56', '2022-11-26 19:58:56', 'Sajo, She - Accounting');

-- ----------------------------
-- Table structure for `tbl_miscellanous_fees`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_miscellanous_fees`;
CREATE TABLE `tbl_miscellanous_fees` (
  `miscell_id` int(10) NOT NULL AUTO_INCREMENT,
  `ay_id` int(10) DEFAULT NULL,
  `year_id` int(10) DEFAULT NULL,
  `miscell_desc` varchar(50) DEFAULT '',
  `miscellanous` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`miscell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_miscellanous_fees
-- ----------------------------
INSERT INTO `tbl_miscellanous_fees` VALUES ('113', '12', '1', 'One Thousand', '1000', '2022-11-25 22:50:33', '2022-11-25 22:50:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('114', '12', '2', 'One Thousand', '1000', '2022-11-25 22:50:33', '2022-11-25 22:50:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('115', '12', '3', 'One Thousand', '1000', '2022-11-25 22:50:33', '2022-11-25 22:50:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('116', '12', '4', 'One Thousand', '1000', '2022-11-25 22:50:33', '2022-11-25 22:50:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('117', '12', '1', 'Three Thousand', '3000', '2022-11-25 22:51:05', '2022-11-25 22:51:05', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('118', '12', '2', 'Three Thousand', '3000', '2022-11-25 22:51:05', '2022-11-25 22:51:05', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('119', '12', '3', 'Three Thousand', '3000', '2022-11-25 22:51:05', '2022-11-25 22:51:05', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('120', '12', '4', 'Three Thousand', '3000', '2022-11-25 22:51:05', '2022-11-25 22:51:05', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('121', '12', '1', 'ADDITIONAL', '100', '2022-12-14 11:38:54', '2022-12-14 11:38:54', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('122', '12', '2', 'ADDITIONAL', '100', '2022-12-14 11:38:54', '2022-12-14 11:38:54', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('123', '12', '3', 'ADDITIONAL', '100', '2022-12-14 11:38:54', '2022-12-14 11:38:54', 'Sajo, She - Accounting');
INSERT INTO `tbl_miscellanous_fees` VALUES ('124', '12', '4', 'ADDITIONAL', '100', '2022-12-14 11:38:54', '2022-12-14 11:38:54', 'Sajo, She - Accounting');

-- ----------------------------
-- Table structure for `tbl_nstp`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nstp`;
CREATE TABLE `tbl_nstp` (
  `nstp_id` int(11) NOT NULL AUTO_INCREMENT,
  `component_value` varchar(20) DEFAULT NULL,
  `component` varchar(20) DEFAULT '',
  `year_id` int(11) DEFAULT NULL,
  `sem_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nstp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_nstp
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_payments`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_payments`;
CREATE TABLE `tbl_payments` (
  `payment_id` int(20) NOT NULL AUTO_INCREMENT,
  `payment` varchar(50) DEFAULT NULL,
  `ay_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_payments
-- ----------------------------
INSERT INTO `tbl_payments` VALUES ('1', 'Cash', '2');
INSERT INTO `tbl_payments` VALUES ('2', 'Cash_1', '3');

-- ----------------------------
-- Table structure for `tbl_payments_status`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_payments_status`;
CREATE TABLE `tbl_payments_status` (
  `ps_id` int(20) NOT NULL AUTO_INCREMENT,
  `stud_no` varchar(20) DEFAULT NULL,
  `assessed_id` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `ay_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT '',
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_payments_status
-- ----------------------------
INSERT INTO `tbl_payments_status` VALUES ('2', 'B19-1-0007', '264', '2022-12-09 00:00:00', '12', '2022-12-08 22:59:08', '2022-12-08 22:59:08', ' - Accounting');
INSERT INTO `tbl_payments_status` VALUES ('3', 'B19-1-0007', '264', '2022-10-09 00:00:00', '12', '2022-12-08 23:28:33', '2022-12-08 23:28:33', ' - Accounting');
INSERT INTO `tbl_payments_status` VALUES ('4', 'B21-1-0007', '265', '2022-10-09 00:00:00', '12', '2022-12-13 04:00:45', '2022-12-13 04:00:45', ' - Accounting');
INSERT INTO `tbl_payments_status` VALUES ('5', 'B22-1-0012', '267', '2022-10-09 00:00:00', '12', '2022-12-14 11:41:32', '2022-12-14 11:41:32', ' - Accounting');

-- ----------------------------
-- Table structure for `tbl_tuition_fees`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tuition_fees`;
CREATE TABLE `tbl_tuition_fees` (
  `tf_id` int(20) NOT NULL AUTO_INCREMENT,
  `ay_id` int(20) DEFAULT NULL,
  `year_id` int(20) DEFAULT NULL,
  `course_id` int(20) DEFAULT NULL,
  `tuition_fee` decimal(65,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`tf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_tuition_fees
-- ----------------------------
INSERT INTO `tbl_tuition_fees` VALUES ('24', '12', '1', '10', '515.10', '2022-11-21 20:50:42', '2022-11-24 08:20:48', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('25', '12', '2', '10', '468.51', '2022-11-21 20:50:43', '2022-11-24 08:20:48', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('26', '12', '3', '10', '539.06', '2022-11-21 20:50:43', '2022-11-24 08:20:48', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('27', '12', '4', '10', '539.06', '2022-11-21 20:50:43', '2022-11-24 08:20:48', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('28', '12', '1', '25', '20.00', '2022-11-22 23:31:27', '2022-11-22 23:31:27', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('29', '12', '2', '25', '34.00', '2022-11-22 23:31:27', '2022-11-22 23:31:27', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('30', '12', '3', '25', '55.00', '2022-11-22 23:31:27', '2022-11-22 23:31:27', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('31', '12', '4', '25', '65.00', '2022-11-22 23:31:27', '2022-11-22 23:31:27', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('32', '12', '1', '1', '100.00', '2022-12-13 03:56:33', '2022-12-13 03:56:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('33', '12', '2', '1', '200.00', '2022-12-13 03:56:33', '2022-12-13 03:56:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('34', '12', '3', '1', '300.00', '2022-12-13 03:56:33', '2022-12-13 03:56:33', 'Sajo, She - Accounting');
INSERT INTO `tbl_tuition_fees` VALUES ('35', '12', '4', '1', '400.00', '2022-12-13 03:56:33', '2022-12-13 03:56:33', 'Sajo, She - Accounting');
