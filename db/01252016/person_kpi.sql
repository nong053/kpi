/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 60004
Source Host           : localhost:3306
Source Database       : person_kpi

Target Server Type    : MYSQL
Target Server Version : 60004
File Encoding         : 65001

Date: 2018-01-25 17:18:35
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_surname` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` varchar(255) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_website` varchar(100) DEFAULT NULL,
  `admin_send_email` varchar(100) DEFAULT NULL,
  `admin_address` text NOT NULL,
  `admin_tel` varchar(255) NOT NULL,
  `admin_age` varchar(11) NOT NULL,
  `register_date` datetime NOT NULL,
  `expired_date` datetime DEFAULT NULL,
  `activated` int(11) NOT NULL,
  `package` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Kosit', 'Aromsava', 'admin_kpi', '5f4dcc3b5aa765d61d8327deb882cf99', '3', 'nn.it@hotmail.com', 'www.nn-webready.com', '', '', '', '', '0000-00-00 00:00:00', '2018-01-01 00:00:00', '0', '1');
INSERT INTO `admin` VALUES ('197', 'Demo.Test', 'Demo', 'demo_test', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'nn.it@hotmail.com', '', '', '', '0809926565', '29', '2017-09-09 00:00:00', '2018-01-31 00:00:00', '1', '3');
INSERT INTO `admin` VALUES ('198', 'Demo.V1', 'Demo', 'demo_admin', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'nn.it@hotmail.com', 'www.dashboardweb.com', '', '', '0809926565', '29', '0000-00-00 00:00:00', '2018-01-01 00:00:00', '1', '1');
INSERT INTO `admin` VALUES ('199', 'kongsin', 'fongda', 'noonuy', '81dc9bdb52d04dc20036dbd8313ed055', '1', 'noonuyit29@gmail.com', '', '', '', '0863420195', '31', '2017-09-30 00:00:00', '2018-01-31 00:00:00', '1', '4');

-- ----------------------------
-- Table structure for `appraisal_period`
-- ----------------------------
DROP TABLE IF EXISTS `appraisal_period`;
CREATE TABLE `appraisal_period` (
  `appraisal_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `appraisal_period_year` varchar(255) DEFAULT NULL,
  `appraisal_period_desc` varchar(255) DEFAULT NULL,
  `appraisal_period_start` varchar(255) DEFAULT NULL,
  `appraisal_period_end` varchar(255) DEFAULT NULL,
  `appraisal_period_target_percentage` double(11,0) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`appraisal_period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=827 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appraisal_period
-- ----------------------------
INSERT INTO `appraisal_period` VALUES ('822', '2017', 'ครั้งที่ 1', '1/1/2017', '3/31/2017', '0', '199');
INSERT INTO `appraisal_period` VALUES ('11', '2012', 'ประเมินครั้งที่1', '01/01/2015', '01/31/2015', '91', '198');
INSERT INTO `appraisal_period` VALUES ('13', '2012', 'ประเมินครั้งที่2', '01/01/2015', '01/16/2015', '78', '198');
INSERT INTO `appraisal_period` VALUES ('14', '2013', 'ประเมินครั้งที่1', '01/01/2015', '01/29/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('15', '2013', 'ประเมินครั้งที่2', '01/28/2015', '01/31/2015', '81', '198');
INSERT INTO `appraisal_period` VALUES ('16', '2012', 'ประเมินครั้งที่3', '01/01/2015', '01/30/2015', '75', '198');
INSERT INTO `appraisal_period` VALUES ('17', '2012', 'ประเมินครั้งที่4', '01/01/2015', '01/30/2015', '81', '198');
INSERT INTO `appraisal_period` VALUES ('18', '2013', 'ประเมินครั้งที่3', '01/01/2015', '01/29/2015', '76', '198');
INSERT INTO `appraisal_period` VALUES ('20', '2013', 'ประเมินครั้งที่4', '01/01/2015', '01/28/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('22', '2015', 'ครั้งที่1', '1/1/2015', '4/30/2015', '75', '198');
INSERT INTO `appraisal_period` VALUES ('23', '2012', 'ครั้งที่2', '5/1/2015', '8/1/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('24', '2015', 'ครั้งที่2', '5/1/2015', '8/1/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('25', '2015', 'ครั้งที่3', '9/1/2015', '10/1/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('26', '2015', 'ครั้งที่4', '10/1/2015', '12/1/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('31', '2014', 'ครั้งที่1', '2/4/2015', '2/25/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('32', '2014', 'ครั้งที่2', '2/17/2015', '2/19/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('33', '2014', 'ครั้งที่3', '2/2/2015', '2/19/2015', '81', '198');
INSERT INTO `appraisal_period` VALUES ('34', '2014', 'ครั้งที่4', '2/2/2015', '2/28/2015', '85', '198');
INSERT INTO `appraisal_period` VALUES ('35', '2016', 'ครั้งที่1', '1/26/2015', '2/20/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('36', '2016', 'ครั้งที่2', '1/5/2015', '2/21/2015', '88', '198');
INSERT INTO `appraisal_period` VALUES ('37', '2016', 'ครั้งที่3', '1/20/2015', '2/14/2015', '80', '198');
INSERT INTO `appraisal_period` VALUES ('38', '2016', 'ครั้งที่4', '2/5/2015', '2/27/2015', '81', '198');
INSERT INTO `appraisal_period` VALUES ('823', '2017', 'ครั้งที่ 2', '4/1/2017', '6/30/2017', '0', '199');
INSERT INTO `appraisal_period` VALUES ('824', '2017', 'ครั้งที่ 3', '7/1/2017', '12/31/2017', '0', '199');

-- ----------------------------
-- Table structure for `assign_kpi`
-- ----------------------------
DROP TABLE IF EXISTS `assign_kpi`;
CREATE TABLE `assign_kpi` (
  `assign_kpi_id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_kpi_year` varchar(255) DEFAULT NULL,
  `appraisal_period_id` varchar(11) DEFAULT NULL,
  `kpi_id` varchar(11) DEFAULT NULL,
  `department_id` varchar(11) DEFAULT NULL,
  `division_id` varchar(11) DEFAULT NULL,
  `position_id` varchar(11) DEFAULT NULL,
  `emp_id` varchar(11) DEFAULT NULL,
  `kpi_weight` double DEFAULT NULL,
  `kpi_type_actual` varchar(255) DEFAULT NULL,
  `kpi_actual_query` varchar(255) DEFAULT NULL,
  `kpi_actual_manual` varchar(255) DEFAULT NULL,
  `target_data` varchar(255) DEFAULT NULL,
  `target_score` varchar(255) DEFAULT NULL,
  `total_kpi_actual_score` int(11) DEFAULT NULL,
  `kpi_actual_score` double DEFAULT NULL,
  `performance` double DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`assign_kpi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assign_kpi
-- ----------------------------
INSERT INTO `assign_kpi` VALUES ('1', '2017', '822', '800', '237', null, '124', '614', '25', '0', '', '88', '98.00', '5.00', '1000', '2', '40', '199');
INSERT INTO `assign_kpi` VALUES ('2', '2017', '822', '801', '237', null, '124', '614', '25', '0', '', '8', '3.00', '5.00', '1000', '2', '40', '199');
INSERT INTO `assign_kpi` VALUES ('3', '2017', '822', '803', '237', null, '124', '614', '25', '0', '', '6', '5.00', '5.00', '2000', '4', '80', '199');
INSERT INTO `assign_kpi` VALUES ('4', '2017', '822', '802', '237', null, '124', '614', '25', '0', '', '41', '40.00', '5.00', '2000', '4', '80', '199');
INSERT INTO `assign_kpi` VALUES ('5', '2017', '822', '800', '237', null, '123', '617', '25', '0', '', '95', '98.00', '5.00', '2000', '4', '80', '199');
INSERT INTO `assign_kpi` VALUES ('6', '2017', '822', '801', '237', null, '123', '617', '25', '0', '', '4', '3.00', '5.00', '2000', '4', '80', '199');
INSERT INTO `assign_kpi` VALUES ('7', '2017', '822', '802', '237', null, '123', '617', '25', '0', '', '41', '40.00', '5.00', '2000', '4', '80', '199');
INSERT INTO `assign_kpi` VALUES ('8', '2017', '822', '803', '237', null, '123', '617', '25', '0', '', '6', '5.00', '5.00', '2000', '4', '80', '199');
INSERT INTO `assign_kpi` VALUES ('9', '2017', '822', '810', '238', null, '124', '606', '25', '0', '', '5', '5.00', '5.00', '2500', '5', '100', '199');
INSERT INTO `assign_kpi` VALUES ('10', '2017', '822', '811', '238', null, '124', '606', '25', '0', '', '60', '60.00', '5.00', '2500', '5', '100', '199');
INSERT INTO `assign_kpi` VALUES ('11', '2017', '822', '812', '238', null, '124', '606', '25', '0', '', '5', '10.00', '5.00', '500', '1', '20', '199');
INSERT INTO `assign_kpi` VALUES ('12', '2017', '822', '813', '238', null, '124', '606', '25', '0', '', '6', '5.00', '5.00', '2000', '4', '80', '199');

-- ----------------------------
-- Table structure for `assign_kpi_master`
-- ----------------------------
DROP TABLE IF EXISTS `assign_kpi_master`;
CREATE TABLE `assign_kpi_master` (
  `assign_kpi_id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_kpi_year` varchar(255) DEFAULT NULL,
  `appraisal_period_id` varchar(11) DEFAULT NULL,
  `kpi_id` varchar(11) DEFAULT NULL,
  `department_id` varchar(11) DEFAULT NULL,
  `position_id` varchar(11) DEFAULT NULL,
  `kpi_weight` double(2,0) DEFAULT NULL,
  `kpi_type_actual` varchar(255) DEFAULT NULL,
  `kpi_actual_query` varchar(255) DEFAULT NULL,
  `kpi_actual_manual` varchar(255) DEFAULT NULL,
  `target_data` varchar(255) DEFAULT NULL,
  `target_score` varchar(255) DEFAULT NULL,
  `total_kpi_actual_score` int(11) DEFAULT NULL,
  `kpi_actual_score` double(2,0) DEFAULT NULL,
  `performance` double(2,0) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `confirm_flag` varchar(1) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `updated_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`assign_kpi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assign_kpi_master
-- ----------------------------
INSERT INTO `assign_kpi_master` VALUES ('1', '2017', '822', '800', '237', '124', '25', '0', '', '0.00', '98.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:02:45');
INSERT INTO `assign_kpi_master` VALUES ('2', '2017', '822', '801', '237', '124', '25', '0', '', '0.00', '3.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:02:45');
INSERT INTO `assign_kpi_master` VALUES ('3', '2017', '822', '803', '237', '124', '25', '0', '', '0.00', '5.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:02:45');
INSERT INTO `assign_kpi_master` VALUES ('4', '2017', '822', '802', '237', '124', '25', '0', '', '0.00', '40.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:02:45');
INSERT INTO `assign_kpi_master` VALUES ('5', '2017', '822', '800', '237', '123', '25', '0', '', '0.00', '98.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:06:47');
INSERT INTO `assign_kpi_master` VALUES ('6', '2017', '822', '801', '237', '123', '25', '0', '', '0.00', '3.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:06:47');
INSERT INTO `assign_kpi_master` VALUES ('7', '2017', '822', '802', '237', '123', '25', '0', '', '0.00', '40.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:06:47');
INSERT INTO `assign_kpi_master` VALUES ('8', '2017', '822', '803', '237', '123', '25', '0', '', '0.00', '5.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 13:06:47');
INSERT INTO `assign_kpi_master` VALUES ('9', '2017', '822', '800', '237', '122', '25', '0', '', '0.00', '98.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:33:30');
INSERT INTO `assign_kpi_master` VALUES ('10', '2017', '822', '801', '237', '122', '25', '0', '', '0.00', '3.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:33:30');
INSERT INTO `assign_kpi_master` VALUES ('11', '2017', '822', '802', '237', '122', '25', '0', '', '0.00', '40.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:33:30');
INSERT INTO `assign_kpi_master` VALUES ('12', '2017', '822', '803', '237', '122', '25', '0', '', '0.00', '5.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:33:30');
INSERT INTO `assign_kpi_master` VALUES ('13', '2017', '822', '810', '238', '124', '25', '0', '', '0.00', '5.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:36:46');
INSERT INTO `assign_kpi_master` VALUES ('14', '2017', '822', '811', '238', '124', '25', '0', '', '0.00', '60.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:36:46');
INSERT INTO `assign_kpi_master` VALUES ('15', '2017', '822', '812', '238', '124', '25', '0', '', '0.00', '10.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:36:46');
INSERT INTO `assign_kpi_master` VALUES ('16', '2017', '822', '813', '238', '124', '25', '0', '', '0.00', '5.00', '5.00', '0', '0', '0', '199', 'Y', null, '2018-01-13 22:36:46');

-- ----------------------------
-- Table structure for `baseline`
-- ----------------------------
DROP TABLE IF EXISTS `baseline`;
CREATE TABLE `baseline` (
  `baseline_id` int(11) NOT NULL AUTO_INCREMENT,
  `kpi_id` int(11) DEFAULT NULL,
  `baseline_begin` double(255,2) DEFAULT NULL,
  `baseline_end` double(255,2) DEFAULT NULL,
  `baseline_score` double(11,2) DEFAULT NULL,
  `suggestion` text,
  PRIMARY KEY (`baseline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=478 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baseline
-- ----------------------------
INSERT INTO `baseline` VALUES ('1', null, '11.00', '22.00', '33.00', null);
INSERT INTO `baseline` VALUES ('2', null, '22.00', '33.00', '44.00', null);
INSERT INTO `baseline` VALUES ('4', '21', '0.00', '45.00', '55.00', null);
INSERT INTO `baseline` VALUES ('7', '21', '46.00', '60.00', '45.00', null);
INSERT INTO `baseline` VALUES ('8', '1', '1000000.00', '2000000.00', '20.00', null);
INSERT INTO `baseline` VALUES ('9', '1', '2000001.00', '4000000.00', '40.00', null);
INSERT INTO `baseline` VALUES ('10', '23', '1200.00', '5000.00', '20.00', null);
INSERT INTO `baseline` VALUES ('11', '23', '522.00', '555.00', '2.00', null);
INSERT INTO `baseline` VALUES ('12', '7', '0.00', '40.00', '1.00', null);
INSERT INTO `baseline` VALUES ('13', '7', '41.00', '60.00', '2.00', null);
INSERT INTO `baseline` VALUES ('14', '7', '61.00', '70.00', '3.00', null);
INSERT INTO `baseline` VALUES ('15', '7', '71.00', '80.00', '4.00', null);
INSERT INTO `baseline` VALUES ('16', '7', '81.00', '120.00', '5.00', null);
INSERT INTO `baseline` VALUES ('17', '8', '0.00', '20.00', '1.00', null);
INSERT INTO `baseline` VALUES ('18', '8', '21.00', '40.00', '2.00', null);
INSERT INTO `baseline` VALUES ('19', '8', '41.00', '60.00', '3.00', null);
INSERT INTO `baseline` VALUES ('20', '8', '61.00', '70.00', '4.00', null);
INSERT INTO `baseline` VALUES ('21', '8', '71.00', '100.00', '5.00', null);
INSERT INTO `baseline` VALUES ('22', '9', '0.00', '20.00', '1.00', null);
INSERT INTO `baseline` VALUES ('23', '9', '21.00', '40.00', '2.00', null);
INSERT INTO `baseline` VALUES ('24', '9', '41.00', '60.00', '3.00', null);
INSERT INTO `baseline` VALUES ('25', '9', '61.00', '70.00', '4.00', null);
INSERT INTO `baseline` VALUES ('26', '9', '71.00', '100.00', '5.00', null);
INSERT INTO `baseline` VALUES ('27', '10', '0.00', '20.00', '1.00', null);
INSERT INTO `baseline` VALUES ('28', '10', '21.00', '40.00', '2.00', null);
INSERT INTO `baseline` VALUES ('29', '10', '41.00', '60.00', '3.00', null);
INSERT INTO `baseline` VALUES ('30', '10', '61.00', '70.00', '4.00', null);
INSERT INTO `baseline` VALUES ('31', '10', '71.00', '100.00', '5.00', null);
INSERT INTO `baseline` VALUES ('32', '25', '0.00', '50.00', '4.00', null);
INSERT INTO `baseline` VALUES ('33', '25', '51.00', '80.00', '5.00', null);
INSERT INTO `baseline` VALUES ('34', '26', '0.00', '40.00', '4.00', null);
INSERT INTO `baseline` VALUES ('35', '26', '41.00', '70.00', '5.00', null);
INSERT INTO `baseline` VALUES ('36', '33', '0.00', '4.00', '5.00', 'ดีมาก!! จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)');
INSERT INTO `baseline` VALUES ('37', '33', '5.00', '6.00', '4.00', 'ดี!! จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)');
INSERT INTO `baseline` VALUES ('38', '33', '7.00', '8.00', '3.00', 'ต้องปรับปรุง!! จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)');
INSERT INTO `baseline` VALUES ('39', '33', '9.00', '10.00', '2.00', 'ต้องปรับปรุงด่วน!! จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)');
INSERT INTO `baseline` VALUES ('40', '33', '11.00', '12.00', '1.00', 'ต้องปรับปรุงด่วนมาก!! จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)');
INSERT INTO `baseline` VALUES ('41', '33', '13.00', '999.00', '0.00', 'ต้องปรับปรุงด่วนมาก!! จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)');
INSERT INTO `baseline` VALUES ('42', '34', '0.00', '5.00', '5.00', null);
INSERT INTO `baseline` VALUES ('43', '34', '6.00', '7.00', '4.00', null);
INSERT INTO `baseline` VALUES ('44', '34', '8.00', '9.00', '3.00', null);
INSERT INTO `baseline` VALUES ('45', '34', '10.00', '11.00', '2.00', null);
INSERT INTO `baseline` VALUES ('46', '34', '12.00', '13.00', '1.00', null);
INSERT INTO `baseline` VALUES ('47', '34', '14.00', '999.00', '0.00', null);
INSERT INTO `baseline` VALUES ('48', '35', '90.00', '100.00', '5.00', null);
INSERT INTO `baseline` VALUES ('49', '35', '70.00', '89.00', '4.00', null);
INSERT INTO `baseline` VALUES ('50', '35', '60.00', '69.00', '3.00', null);
INSERT INTO `baseline` VALUES ('51', '35', '50.00', '59.00', '2.00', null);
INSERT INTO `baseline` VALUES ('52', '35', '40.00', '49.00', '1.00', null);
INSERT INTO `baseline` VALUES ('53', '35', '0.00', '39.00', '0.00', null);
INSERT INTO `baseline` VALUES ('54', '36', '0.00', '2.00', '5.00', null);
INSERT INTO `baseline` VALUES ('55', '36', '3.00', '3.00', '4.00', null);
INSERT INTO `baseline` VALUES ('56', '36', '4.00', '4.00', '3.00', null);
INSERT INTO `baseline` VALUES ('57', '36', '5.00', '5.00', '2.00', null);
INSERT INTO `baseline` VALUES ('58', '36', '6.00', '8.00', '1.00', null);
INSERT INTO `baseline` VALUES ('59', '36', '9.00', '999.00', '0.00', null);
INSERT INTO `baseline` VALUES ('60', '37', '0.00', '4.00', '5.00', null);
INSERT INTO `baseline` VALUES ('61', '37', '5.00', '6.00', '4.00', null);
INSERT INTO `baseline` VALUES ('62', '37', '7.00', '8.00', '3.00', null);
INSERT INTO `baseline` VALUES ('63', '37', '9.00', '10.00', '2.00', null);
INSERT INTO `baseline` VALUES ('64', '37', '11.00', '12.00', '1.00', null);
INSERT INTO `baseline` VALUES ('65', '37', '13.00', '14.00', '0.00', null);
INSERT INTO `baseline` VALUES ('66', '38', '0.00', '2.00', '5.00', null);
INSERT INTO `baseline` VALUES ('67', '38', '3.00', '3.00', '4.00', null);
INSERT INTO `baseline` VALUES ('68', '38', '4.00', '4.00', '3.00', null);
INSERT INTO `baseline` VALUES ('69', '38', '5.00', '5.00', '2.00', null);
INSERT INTO `baseline` VALUES ('70', '38', '6.00', '6.00', '1.00', null);
INSERT INTO `baseline` VALUES ('71', '38', '7.00', '999.00', '0.00', null);
INSERT INTO `baseline` VALUES ('74', '42', '0.00', '2.00', '5.00', '');
INSERT INTO `baseline` VALUES ('75', '42', '3.00', '5.00', '4.00', '');
INSERT INTO `baseline` VALUES ('76', '42', '6.00', '8.00', '3.00', '');
INSERT INTO `baseline` VALUES ('77', '42', '9.00', '12.00', '2.00', '');
INSERT INTO `baseline` VALUES ('78', '42', '13.00', '18.00', '1.00', '');
INSERT INTO `baseline` VALUES ('79', '42', '19.00', '99.00', '0.00', 'ต้องแก้ไขปรับปรุงเป็นการด่วน');
INSERT INTO `baseline` VALUES ('80', '43', '8.00', '99.00', '5.00', '');
INSERT INTO `baseline` VALUES ('81', '43', '6.00', '7.99', '4.00', '');
INSERT INTO `baseline` VALUES ('82', '43', '4.00', '5.99', '3.00', '');
INSERT INTO `baseline` VALUES ('83', '43', '2.00', '4.99', '2.00', '');
INSERT INTO `baseline` VALUES ('84', '43', '1.00', '2.99', '1.00', '');
INSERT INTO `baseline` VALUES ('85', '43', '0.00', '0.99', '0.00', '');
INSERT INTO `baseline` VALUES ('86', '44', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('87', '44', '70.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('88', '44', '60.00', '69.00', '3.00', '');
INSERT INTO `baseline` VALUES ('89', '44', '50.00', '59.00', '2.00', '');
INSERT INTO `baseline` VALUES ('90', '44', '40.00', '49.00', '1.00', '');
INSERT INTO `baseline` VALUES ('91', '44', '0.00', '39.00', '0.00', '');
INSERT INTO `baseline` VALUES ('92', '45', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('93', '45', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('94', '45', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('95', '45', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('96', '45', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('97', '45', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('98', '93', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('99', '93', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('100', '93', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('101', '93', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('102', '93', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('103', '93', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('104', '92', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('105', '92', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('106', '92', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('107', '92', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('108', '92', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('109', '92', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('110', '91', '90.00', '99.00', '5.00', '');
INSERT INTO `baseline` VALUES ('111', '91', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('112', '91', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('113', '91', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('114', '91', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('115', '91', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('116', '90', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('117', '90', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('118', '90', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('119', '90', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('120', '90', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('121', '90', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('122', '89', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('123', '89', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('124', '89', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('125', '89', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('126', '89', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('127', '89', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('128', '88', '5.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('129', '88', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('130', '88', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('131', '88', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('132', '88', '1.00', '1.00', '1.00', '');
INSERT INTO `baseline` VALUES ('133', '88', '0.00', '0.00', '0.00', '');
INSERT INTO `baseline` VALUES ('134', '87', '1.00', '2.00', '5.00', '');
INSERT INTO `baseline` VALUES ('135', '87', '0.80', '0.99', '4.00', '');
INSERT INTO `baseline` VALUES ('136', '87', '0.70', '0.79', '3.00', '');
INSERT INTO `baseline` VALUES ('137', '87', '0.60', '0.69', '2.00', '');
INSERT INTO `baseline` VALUES ('141', '86', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('139', '87', '0.50', '0.59', '1.00', '');
INSERT INTO `baseline` VALUES ('140', '87', '0.00', '0.49', '0.00', '');
INSERT INTO `baseline` VALUES ('142', '86', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('143', '86', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('144', '86', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('145', '86', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('146', '86', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('147', '85', '5.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('148', '85', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('149', '85', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('150', '85', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('151', '85', '1.00', '1.00', '1.00', '');
INSERT INTO `baseline` VALUES ('152', '85', '0.00', '0.00', '0.00', '');
INSERT INTO `baseline` VALUES ('153', '84', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('154', '84', '4.00', '5.00', '4.00', '');
INSERT INTO `baseline` VALUES ('155', '84', '6.00', '6.00', '3.00', '');
INSERT INTO `baseline` VALUES ('156', '84', '7.00', '7.00', '2.00', '');
INSERT INTO `baseline` VALUES ('157', '84', '8.00', '8.00', '1.00', '');
INSERT INTO `baseline` VALUES ('158', '84', '9.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('159', '83', '50.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('160', '83', '40.00', '49.00', '4.00', '');
INSERT INTO `baseline` VALUES ('161', '83', '30.00', '39.00', '3.00', '');
INSERT INTO `baseline` VALUES ('162', '83', '20.00', '29.00', '2.00', '');
INSERT INTO `baseline` VALUES ('163', '83', '10.00', '19.00', '1.00', '');
INSERT INTO `baseline` VALUES ('164', '83', '0.00', '9.00', '0.00', '');
INSERT INTO `baseline` VALUES ('165', '82', '95.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('166', '82', '80.00', '94.00', '4.00', '');
INSERT INTO `baseline` VALUES ('167', '82', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('168', '82', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('169', '82', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('170', '82', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('171', '81', '5.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('172', '81', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('173', '81', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('174', '81', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('175', '81', '1.00', '1.00', '1.00', '');
INSERT INTO `baseline` VALUES ('176', '81', '0.00', '0.00', '0.00', '');
INSERT INTO `baseline` VALUES ('177', '80', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('178', '80', '2.00', '2.00', '4.00', '');
INSERT INTO `baseline` VALUES ('179', '80', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('180', '80', '4.00', '4.00', '2.00', '');
INSERT INTO `baseline` VALUES ('181', '80', '5.00', '5.00', '1.00', '');
INSERT INTO `baseline` VALUES ('182', '80', '6.00', '99.00', '0.00', '');
INSERT INTO `baseline` VALUES ('183', '79', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('184', '79', '2.00', '2.00', '4.00', '');
INSERT INTO `baseline` VALUES ('185', '79', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('186', '79', '4.00', '4.00', '2.00', '');
INSERT INTO `baseline` VALUES ('187', '79', '5.00', '5.00', '1.00', '');
INSERT INTO `baseline` VALUES ('188', '79', '6.00', '99.00', '0.00', '');
INSERT INTO `baseline` VALUES ('189', '78', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('190', '78', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('191', '78', '70.00', '79.00', '3.00', '');
INSERT INTO `baseline` VALUES ('192', '78', '60.00', '69.00', '2.00', '');
INSERT INTO `baseline` VALUES ('193', '78', '50.00', '59.00', '1.00', '');
INSERT INTO `baseline` VALUES ('194', '78', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('195', '622', '0.00', '2.00', '5.00', '');
INSERT INTO `baseline` VALUES ('196', '646', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('197', '646', '2.00', '2.00', '4.00', '');
INSERT INTO `baseline` VALUES ('198', '646', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('199', '646', '4.00', '4.00', '2.00', '');
INSERT INTO `baseline` VALUES ('200', '646', '5.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('201', '647', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('202', '647', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('203', '647', '3.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('204', '648', '0.00', '20.00', '0.00', '');
INSERT INTO `baseline` VALUES ('205', '648', '21.00', '40.00', '1.00', '');
INSERT INTO `baseline` VALUES ('206', '648', '41.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('207', '649', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('208', '649', '2.00', '4.00', '2.00', '');
INSERT INTO `baseline` VALUES ('209', '649', '5.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('210', '670', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('211', '670', '2.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('212', '670', '5.00', '8.00', '3.00', '');
INSERT INTO `baseline` VALUES ('213', '670', '9.00', '10.00', '2.00', '');
INSERT INTO `baseline` VALUES ('214', '670', '11.00', '15.00', '1.00', '');
INSERT INTO `baseline` VALUES ('215', '670', '16.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('216', '671', '0.00', '2.00', '5.00', '');
INSERT INTO `baseline` VALUES ('217', '671', '3.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('218', '671', '5.00', '6.00', '3.00', '');
INSERT INTO `baseline` VALUES ('219', '671', '7.00', '8.00', '2.00', '');
INSERT INTO `baseline` VALUES ('220', '671', '9.00', '10.00', '1.00', '');
INSERT INTO `baseline` VALUES ('221', '671', '11.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('227', '672', '70.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('226', '672', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('228', '672', '60.00', '69.00', '3.00', '');
INSERT INTO `baseline` VALUES ('229', '672', '50.00', '59.00', '2.00', '');
INSERT INTO `baseline` VALUES ('230', '672', '40.00', '49.00', '1.00', '');
INSERT INTO `baseline` VALUES ('231', '672', '0.00', '39.00', '0.00', '');
INSERT INTO `baseline` VALUES ('232', '673', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('233', '673', '2.00', '3.00', '4.00', '');
INSERT INTO `baseline` VALUES ('234', '673', '4.00', '5.00', '3.00', '');
INSERT INTO `baseline` VALUES ('235', '673', '6.00', '7.00', '2.00', '');
INSERT INTO `baseline` VALUES ('236', '673', '8.00', '9.00', '1.00', '');
INSERT INTO `baseline` VALUES ('237', '673', '10.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('238', '674', '0.00', '0.00', '5.00', '');
INSERT INTO `baseline` VALUES ('239', '674', '1.00', '1.00', '4.00', '');
INSERT INTO `baseline` VALUES ('240', '694', '0.00', '1.00', '5.00', '');
INSERT INTO `baseline` VALUES ('241', '694', '2.00', '3.00', '4.00', '');
INSERT INTO `baseline` VALUES ('242', '766', '0.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('243', '766', '6.00', '7.00', '4.00', '');
INSERT INTO `baseline` VALUES ('244', '766', '8.00', '9.00', '3.00', '');
INSERT INTO `baseline` VALUES ('245', '766', '10.00', '12.00', '2.00', '');
INSERT INTO `baseline` VALUES ('246', '766', '13.00', '20.00', '1.00', '');
INSERT INTO `baseline` VALUES ('247', '766', '21.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('248', '767', '0.00', '1.00', '1.00', '');
INSERT INTO `baseline` VALUES ('249', '767', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('250', '767', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('251', '767', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('252', '767', '5.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('253', '768', '0.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('254', '768', '6.00', '7.00', '4.00', '');
INSERT INTO `baseline` VALUES ('255', '768', '8.00', '10.00', '3.00', '');
INSERT INTO `baseline` VALUES ('256', '768', '11.00', '15.00', '2.00', '');
INSERT INTO `baseline` VALUES ('257', '768', '16.00', '20.00', '1.00', '');
INSERT INTO `baseline` VALUES ('258', '768', '21.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('259', '769', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('260', '769', '4.00', '5.00', '4.00', '');
INSERT INTO `baseline` VALUES ('261', '769', '6.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('262', '769', '8.00', '9.00', '2.00', '');
INSERT INTO `baseline` VALUES ('263', '769', '10.00', '15.00', '1.00', '');
INSERT INTO `baseline` VALUES ('264', '769', '16.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('265', '770', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('266', '770', '4.00', '5.00', '4.00', '');
INSERT INTO `baseline` VALUES ('267', '770', '6.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('268', '770', '8.00', '9.00', '2.00', '');
INSERT INTO `baseline` VALUES ('269', '770', '10.00', '12.00', '1.00', '');
INSERT INTO `baseline` VALUES ('270', '770', '13.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('271', '771', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('272', '771', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('273', '771', '5.00', '5.00', '3.00', '');
INSERT INTO `baseline` VALUES ('274', '771', '6.00', '6.00', '2.00', '');
INSERT INTO `baseline` VALUES ('275', '771', '7.00', '9.00', '1.00', '');
INSERT INTO `baseline` VALUES ('276', '771', '10.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('277', '772', '0.00', '1.00', '1.00', '');
INSERT INTO `baseline` VALUES ('278', '772', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('279', '772', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('280', '772', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('281', '772', '5.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('282', '773', '0.00', '0.00', '5.00', '');
INSERT INTO `baseline` VALUES ('283', '773', '1.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('284', '774', '0.00', '50.00', '5.00', '');
INSERT INTO `baseline` VALUES ('285', '774', '51.00', '60.00', '4.00', '');
INSERT INTO `baseline` VALUES ('286', '774', '61.00', '70.00', '3.00', '');
INSERT INTO `baseline` VALUES ('287', '774', '71.00', '80.00', '2.00', '');
INSERT INTO `baseline` VALUES ('288', '774', '81.00', '90.00', '1.00', '');
INSERT INTO `baseline` VALUES ('289', '774', '91.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('290', '775', '0.00', '10.00', '5.00', '');
INSERT INTO `baseline` VALUES ('291', '775', '11.00', '12.00', '4.00', '');
INSERT INTO `baseline` VALUES ('292', '775', '13.00', '14.00', '3.00', '');
INSERT INTO `baseline` VALUES ('293', '775', '15.00', '17.00', '2.00', '');
INSERT INTO `baseline` VALUES ('294', '775', '18.00', '20.00', '1.00', '');
INSERT INTO `baseline` VALUES ('295', '775', '21.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('296', '776', '95.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('297', '776', '90.00', '94.00', '4.00', '');
INSERT INTO `baseline` VALUES ('298', '776', '85.00', '89.00', '3.00', '');
INSERT INTO `baseline` VALUES ('299', '776', '80.00', '84.00', '2.00', '');
INSERT INTO `baseline` VALUES ('300', '776', '75.00', '79.00', '1.00', '');
INSERT INTO `baseline` VALUES ('301', '776', '0.00', '74.00', '0.00', '');
INSERT INTO `baseline` VALUES ('302', '777', '70.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('303', '777', '65.00', '69.00', '4.00', '');
INSERT INTO `baseline` VALUES ('304', '777', '60.00', '64.00', '3.00', '');
INSERT INTO `baseline` VALUES ('305', '777', '55.00', '59.00', '2.00', '');
INSERT INTO `baseline` VALUES ('306', '777', '50.00', '54.00', '1.00', '');
INSERT INTO `baseline` VALUES ('307', '777', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('308', '778', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('309', '778', '88.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('310', '778', '86.00', '87.00', '3.00', '');
INSERT INTO `baseline` VALUES ('311', '778', '84.00', '85.00', '2.00', '');
INSERT INTO `baseline` VALUES ('312', '778', '80.00', '83.00', '1.00', '');
INSERT INTO `baseline` VALUES ('313', '778', '0.00', '79.00', '0.00', '');
INSERT INTO `baseline` VALUES ('314', '779', '100.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('315', '779', '98.00', '99.00', '4.00', '');
INSERT INTO `baseline` VALUES ('316', '779', '96.00', '97.00', '3.00', '');
INSERT INTO `baseline` VALUES ('317', '779', '94.00', '95.00', '2.00', '');
INSERT INTO `baseline` VALUES ('318', '779', '91.00', '93.00', '1.00', '');
INSERT INTO `baseline` VALUES ('319', '779', '0.00', '90.00', '0.00', '');
INSERT INTO `baseline` VALUES ('320', '780', '98.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('321', '780', '95.00', '97.00', '4.00', '');
INSERT INTO `baseline` VALUES ('322', '780', '93.00', '94.00', '3.00', '');
INSERT INTO `baseline` VALUES ('323', '780', '90.00', '92.00', '2.00', '');
INSERT INTO `baseline` VALUES ('324', '780', '87.00', '89.00', '1.00', '');
INSERT INTO `baseline` VALUES ('325', '780', '0.00', '86.00', '0.00', '');
INSERT INTO `baseline` VALUES ('326', '781', '0.00', '0.00', '5.00', '');
INSERT INTO `baseline` VALUES ('327', '781', '1.00', '1.00', '4.00', '');
INSERT INTO `baseline` VALUES ('328', '781', '2.00', '2.00', '3.00', '');
INSERT INTO `baseline` VALUES ('329', '781', '3.00', '3.00', '2.00', '');
INSERT INTO `baseline` VALUES ('330', '781', '4.00', '5.00', '1.00', '');
INSERT INTO `baseline` VALUES ('331', '781', '6.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('332', '782', '95.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('333', '782', '93.00', '94.00', '4.00', '');
INSERT INTO `baseline` VALUES ('334', '782', '90.00', '92.00', '3.00', '');
INSERT INTO `baseline` VALUES ('335', '782', '87.00', '89.00', '2.00', '');
INSERT INTO `baseline` VALUES ('336', '782', '85.00', '86.00', '1.00', '');
INSERT INTO `baseline` VALUES ('337', '782', '0.00', '84.00', '0.00', '');
INSERT INTO `baseline` VALUES ('338', '783', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('339', '783', '4.00', '5.00', '4.00', '');
INSERT INTO `baseline` VALUES ('340', '783', '6.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('341', '783', '8.00', '9.00', '2.00', '');
INSERT INTO `baseline` VALUES ('342', '783', '10.00', '10.00', '1.00', '');
INSERT INTO `baseline` VALUES ('343', '783', '11.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('344', '784', '1.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('345', '784', '6.00', '6.00', '4.00', '');
INSERT INTO `baseline` VALUES ('346', '784', '7.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('347', '784', '8.00', '8.00', '2.00', '');
INSERT INTO `baseline` VALUES ('348', '784', '9.00', '9.00', '1.00', '');
INSERT INTO `baseline` VALUES ('349', '784', '10.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('350', '785', '0.00', '30.00', '5.00', '');
INSERT INTO `baseline` VALUES ('351', '785', '31.00', '32.00', '4.00', '');
INSERT INTO `baseline` VALUES ('352', '785', '33.00', '35.00', '3.00', '');
INSERT INTO `baseline` VALUES ('353', '785', '36.00', '37.00', '2.00', '');
INSERT INTO `baseline` VALUES ('354', '785', '38.00', '40.00', '1.00', '');
INSERT INTO `baseline` VALUES ('355', '785', '41.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('356', '786', '30.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('357', '786', '27.00', '29.00', '4.00', '');
INSERT INTO `baseline` VALUES ('358', '786', '25.00', '26.00', '3.00', '');
INSERT INTO `baseline` VALUES ('359', '786', '23.00', '24.00', '2.00', '');
INSERT INTO `baseline` VALUES ('360', '786', '20.00', '22.00', '1.00', '');
INSERT INTO `baseline` VALUES ('361', '786', '0.00', '19.00', '0.00', '');
INSERT INTO `baseline` VALUES ('362', '787', '10.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('363', '787', '9.00', '9.00', '4.00', '');
INSERT INTO `baseline` VALUES ('364', '787', '8.00', '8.00', '3.00', '');
INSERT INTO `baseline` VALUES ('365', '787', '7.00', '7.00', '2.00', '');
INSERT INTO `baseline` VALUES ('366', '787', '6.00', '6.00', '1.00', '');
INSERT INTO `baseline` VALUES ('367', '787', '0.00', '5.00', '0.00', '');
INSERT INTO `baseline` VALUES ('368', '788', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('369', '788', '80.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('370', '788', '0.00', '79.00', '0.00', '');
INSERT INTO `baseline` VALUES ('371', '789', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('372', '789', '0.00', '89.00', '0.00', '');
INSERT INTO `baseline` VALUES ('373', '795', '20.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('374', '795', '15.00', '19.00', '4.00', '');
INSERT INTO `baseline` VALUES ('375', '795', '10.00', '14.00', '3.00', '');
INSERT INTO `baseline` VALUES ('376', '795', '7.00', '9.00', '2.00', '');
INSERT INTO `baseline` VALUES ('377', '795', '5.00', '6.00', '1.00', '');
INSERT INTO `baseline` VALUES ('378', '795', '0.00', '4.00', '0.00', '');
INSERT INTO `baseline` VALUES ('379', '796', '20.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('380', '796', '17.00', '19.00', '4.00', '');
INSERT INTO `baseline` VALUES ('381', '796', '15.00', '16.00', '3.00', '');
INSERT INTO `baseline` VALUES ('382', '796', '13.00', '14.00', '2.00', '');
INSERT INTO `baseline` VALUES ('383', '796', '10.00', '12.00', '1.00', '');
INSERT INTO `baseline` VALUES ('384', '796', '0.00', '9.00', '0.00', '');
INSERT INTO `baseline` VALUES ('385', '797', '90.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('386', '797', '85.00', '89.00', '4.00', '');
INSERT INTO `baseline` VALUES ('387', '797', '80.00', '84.00', '3.00', '');
INSERT INTO `baseline` VALUES ('388', '797', '75.00', '79.00', '2.00', '');
INSERT INTO `baseline` VALUES ('389', '797', '70.00', '74.00', '1.00', '');
INSERT INTO `baseline` VALUES ('390', '797', '0.00', '69.00', '0.00', '');
INSERT INTO `baseline` VALUES ('391', '798', '0.00', '10.00', '5.00', '');
INSERT INTO `baseline` VALUES ('392', '798', '11.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('393', '799', '95.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('394', '799', '90.00', '94.00', '4.00', '');
INSERT INTO `baseline` VALUES ('395', '799', '87.00', '89.00', '3.00', '');
INSERT INTO `baseline` VALUES ('396', '799', '85.00', '86.00', '2.00', '');
INSERT INTO `baseline` VALUES ('397', '799', '83.00', '34.00', '1.00', '');
INSERT INTO `baseline` VALUES ('398', '799', '0.00', '82.00', '0.00', '');
INSERT INTO `baseline` VALUES ('399', '800', '98.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('400', '800', '95.00', '97.00', '4.00', '');
INSERT INTO `baseline` VALUES ('401', '800', '90.00', '94.00', '3.00', '');
INSERT INTO `baseline` VALUES ('402', '800', '86.00', '89.00', '2.00', '');
INSERT INTO `baseline` VALUES ('403', '800', '80.00', '85.00', '1.00', '');
INSERT INTO `baseline` VALUES ('404', '800', '0.00', '79.00', '0.00', '');
INSERT INTO `baseline` VALUES ('405', '801', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('406', '801', '4.00', '5.00', '4.00', '');
INSERT INTO `baseline` VALUES ('407', '801', '6.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('408', '801', '8.00', '9.00', '2.00', '');
INSERT INTO `baseline` VALUES ('409', '801', '10.00', '11.00', '1.00', '');
INSERT INTO `baseline` VALUES ('410', '801', '12.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('411', '802', '81.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('412', '802', '71.00', '80.00', '1.00', '');
INSERT INTO `baseline` VALUES ('413', '802', '61.00', '70.00', '2.00', '');
INSERT INTO `baseline` VALUES ('414', '802', '51.00', '60.00', '3.00', '');
INSERT INTO `baseline` VALUES ('415', '802', '0.00', '40.00', '5.00', '');
INSERT INTO `baseline` VALUES ('416', '802', '41.00', '50.00', '4.00', '');
INSERT INTO `baseline` VALUES ('417', '803', '0.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('418', '803', '7.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('419', '803', '6.00', '6.00', '4.00', '');
INSERT INTO `baseline` VALUES ('420', '803', '8.00', '8.00', '2.00', '');
INSERT INTO `baseline` VALUES ('421', '803', '9.00', '9.00', '1.00', '');
INSERT INTO `baseline` VALUES ('422', '803', '10.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('423', '804', '0.00', '3.00', '5.00', '');
INSERT INTO `baseline` VALUES ('424', '804', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('425', '804', '5.00', '5.00', '3.00', '');
INSERT INTO `baseline` VALUES ('426', '804', '6.00', '7.00', '2.00', '');
INSERT INTO `baseline` VALUES ('427', '804', '8.00', '9.00', '1.00', '');
INSERT INTO `baseline` VALUES ('428', '804', '10.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('429', '805', '80.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('430', '805', '70.00', '79.00', '4.00', '');
INSERT INTO `baseline` VALUES ('431', '805', '60.00', '69.00', '3.00', '');
INSERT INTO `baseline` VALUES ('432', '805', '50.00', '54.00', '1.00', '');
INSERT INTO `baseline` VALUES ('433', '805', '0.00', '49.00', '0.00', '');
INSERT INTO `baseline` VALUES ('434', '805', '55.00', '59.00', '2.00', '');
INSERT INTO `baseline` VALUES ('435', '806', '95.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('436', '806', '90.00', '94.00', '4.00', '');
INSERT INTO `baseline` VALUES ('437', '806', '85.00', '89.00', '3.00', '');
INSERT INTO `baseline` VALUES ('438', '806', '80.00', '84.00', '2.00', '');
INSERT INTO `baseline` VALUES ('439', '806', '70.00', '79.00', '1.00', '');
INSERT INTO `baseline` VALUES ('440', '806', '0.00', '69.00', '0.00', '');
INSERT INTO `baseline` VALUES ('441', '807', '0.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('442', '807', '6.00', '6.00', '4.00', '');
INSERT INTO `baseline` VALUES ('443', '807', '7.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('444', '807', '8.00', '8.00', '2.00', '');
INSERT INTO `baseline` VALUES ('445', '807', '9.00', '10.00', '1.00', '');
INSERT INTO `baseline` VALUES ('446', '807', '11.00', '100.00', '0.00', '');
INSERT INTO `baseline` VALUES ('447', '808', '5.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('448', '808', '4.00', '4.00', '4.00', '');
INSERT INTO `baseline` VALUES ('449', '808', '3.00', '3.00', '3.00', '');
INSERT INTO `baseline` VALUES ('450', '808', '2.00', '2.00', '2.00', '');
INSERT INTO `baseline` VALUES ('451', '808', '0.00', '1.00', '1.00', '');
INSERT INTO `baseline` VALUES ('452', '809', '98.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('453', '809', '95.00', '57.00', '4.00', '');
INSERT INTO `baseline` VALUES ('454', '809', '93.00', '94.00', '3.00', '');
INSERT INTO `baseline` VALUES ('455', '809', '90.00', '92.00', '2.00', '');
INSERT INTO `baseline` VALUES ('456', '809', '86.00', '89.00', '1.00', '');
INSERT INTO `baseline` VALUES ('457', '809', '0.00', '85.00', '0.00', '');
INSERT INTO `baseline` VALUES ('458', '810', '0.00', '4.00', '0.00', '');
INSERT INTO `baseline` VALUES ('459', '810', '5.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('460', '811', '60.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('461', '811', '55.00', '59.00', '4.00', '');
INSERT INTO `baseline` VALUES ('462', '811', '50.00', '54.00', '3.00', '');
INSERT INTO `baseline` VALUES ('463', '811', '45.00', '49.00', '2.00', '');
INSERT INTO `baseline` VALUES ('464', '811', '40.00', '44.00', '1.00', '');
INSERT INTO `baseline` VALUES ('465', '811', '0.00', '39.00', '0.00', '');
INSERT INTO `baseline` VALUES ('466', '812', '10.00', '100.00', '5.00', '');
INSERT INTO `baseline` VALUES ('467', '812', '8.00', '9.00', '4.00', '');
INSERT INTO `baseline` VALUES ('468', '812', '6.00', '6.00', '2.00', '');
INSERT INTO `baseline` VALUES ('469', '812', '5.00', '5.00', '1.00', '');
INSERT INTO `baseline` VALUES ('470', '812', '0.00', '4.00', '0.00', '');
INSERT INTO `baseline` VALUES ('471', '812', '7.00', '8.00', '3.00', '');
INSERT INTO `baseline` VALUES ('472', '813', '1.00', '5.00', '5.00', '');
INSERT INTO `baseline` VALUES ('473', '813', '6.00', '6.00', '4.00', '');
INSERT INTO `baseline` VALUES ('474', '813', '7.00', '7.00', '3.00', '');
INSERT INTO `baseline` VALUES ('475', '813', '8.00', '8.00', '2.00', '');
INSERT INTO `baseline` VALUES ('476', '813', '9.00', '10.00', '1.00', '');
INSERT INTO `baseline` VALUES ('477', '813', '11.00', '100.00', '0.00', '');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `department_detail` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('9', null, 'ฝ่ายบัญชีการเงิน', 'ฝ่ายบัญชีการเงิน', '198');
INSERT INTO `department` VALUES ('13', null, 'ฝ่ายบุคคล', 'ฝ่ายบุคคล', '198');
INSERT INTO `department` VALUES ('12', null, 'ฝ่ายไอที', 'ฝ่ายไอที', '198');
INSERT INTO `department` VALUES ('11', null, 'ฝ่ายการตลาด', 'ฝ่ายการตลาด', '198');
INSERT INTO `department` VALUES ('14', null, 'แผนกโลจิสติกส์', 'แผนกโลจิสติกส์', '198');
INSERT INTO `department` VALUES ('15', null, 'แผนกจัดซื้อ', 'แผนกจัดซื้อ', '198');
INSERT INTO `department` VALUES ('236', null, 'แผนกจัดซื้อ', 'แผนกจัดซื้อ', '197');
INSERT INTO `department` VALUES ('235', null, 'แผนกโลจิสติกส์', 'แผนกโลจิสติกส์', '197');
INSERT INTO `department` VALUES ('234', null, 'ฝ่ายการตลาด', 'ฝ่ายการตลาด', '197');
INSERT INTO `department` VALUES ('233', null, 'ฝ่ายไอที', 'ฝ่ายไอที', '197');
INSERT INTO `department` VALUES ('232', null, 'ฝ่ายบุคคล', 'ฝ่ายบุคคล', '197');
INSERT INTO `department` VALUES ('231', null, 'ฝ่ายบัญชีการเงิน', 'ฝ่ายบัญชีการเงิน', '197');
INSERT INTO `department` VALUES ('237', 'ACC', 'ฝ่ายบัญชี', '-', '199');
INSERT INTO `department` VALUES ('238', 'FD', 'ฝ่ายการเงิน', 'แผนกการเงินรับ-จ่าย', '199');
INSERT INTO `department` VALUES ('239', 'SA', 'ฝ่ายขาย', '-', '199');
INSERT INTO `department` VALUES ('240', 'MK', 'ฝ่ายการตลาด', '', '199');
INSERT INTO `department` VALUES ('241', 'PO', 'ฝ่ายจัดซื้อ', 'ภายในประทเศ', '199');
INSERT INTO `department` VALUES ('246', 'HR', 'ฝ่ายบุคคล', '', '199');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_user` varchar(255) DEFAULT NULL,
  `emp_pass` varchar(255) DEFAULT NULL,
  `emp_picture_thum` varchar(255) DEFAULT NULL,
  `emp_picture` varchar(255) DEFAULT NULL,
  `emp_tel` varchar(255) DEFAULT NULL,
  `emp_age` int(11) DEFAULT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_other` varchar(255) DEFAULT NULL,
  `position_id` varchar(255) DEFAULT NULL,
  `department_id` varchar(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `emp_date_of_birth` varchar(22) DEFAULT NULL,
  `emp_age_working` varchar(22) DEFAULT NULL,
  `emp_last_name` varchar(255) DEFAULT NULL,
  `emp_first_name` varchar(255) DEFAULT NULL,
  `emp_status` varchar(255) DEFAULT NULL,
  `emp_mobile` varchar(255) DEFAULT NULL,
  `emp_adress` varchar(255) DEFAULT NULL,
  `emp_district` varchar(255) DEFAULT NULL,
  `emp_sub_district` varchar(255) DEFAULT NULL,
  `emp_province` varchar(255) DEFAULT NULL,
  `emp_postcode` varchar(255) DEFAULT NULL,
  `emp_status_work_id` int(255) DEFAULT NULL,
  `emp_code` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=631 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'emp3', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_maketing-w320_960125103.gif', '../View/uploads/empmaketing-w320_960125103.gif', '026665547', '40', '', 'adb@abc.com', '', '10', '9', '198', '1/29/2015', '11', 'สุคนธะ', 'ไกรสร', 'single', '0801112245', '116', '', '', '', '', '1', 'EA001', null);
INSERT INTO `employee` VALUES ('2', 'emp3', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_englishlecturer1-w320_1225329971.jpg', '../View/uploads/empenglishlecturer1-w320_1225329971.jpg', '023446234', '29', '', 'def@hotmail.com', '', '10', '9', '198', '4/20/1986', '10', 'ศิริมงคล', 'คมศักดิ์', 'single', '087898788', '788/1 หอพักดวงดาว ถนนอุดมสุข 5', 'เขตดุสิต', 'ดุสิต', 'กรุงเทพมหาคร', '10520', '1', 'EA002', null);
INSERT INTO `employee` VALUES ('6', 'emp7', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_2_672113391.jpg', '../View/uploads/emp2_672113391.jpg', '023452238', '28', '', 'rstu@hotmail.com', '', '10', '13', '198', '31/9/1986', '6', 'เวชยา', 'วรเวช', 'single', '087893232', '23/7 หมู่บ้านโอเคเฟอเฟ็ก 12', 'เขตบางกะปิ', 'คลองจั่น', 'กรุงเทพมหาคร', '10120', '1', 'EH001', null);
INSERT INTO `employee` VALUES ('7', 'emp8', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_avatar3_225830788.jpg', '../View/uploads/empavatar3_225830788.jpg', '021112544', '29', '', 'vwx@hotmail.com', '', '10', '13', '198', '31/6/1986', '11', 'คงไว้', 'บูรณา', 'single', '084654625', '896/45 หมู่บ้าน สุขใจ 20', 'เขตปทุมวัน', 'รองเมือง', 'กรุงเทพมหาคร', '10110', '1', 'EH002', null);
INSERT INTO `employee` VALUES ('11', 'emp8', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_1_356991657.jpg', '../View/uploads/emp1_356991657.jpg', '021112544', '29', '', 'vwx@hotmail.com', '', '10', '12', '198', '31/6/1986', '11', 'อยู่เจริญ', 'ปทุมรัตน์', 'single', '084654625', '896/45 หมู่บ้าน สุขใจ 20', 'เขตปทุมวัน', 'รองเมือง', 'กรุงเทพมหาคร', '10110', '1', 'EI001', null);
INSERT INTO `employee` VALUES ('12', 'emp9', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_a2_1249255641.jpg', '../View/uploads/empa2_1249255641.jpg', '021554233', '30', '', 'xyz@hotmail.com', '', '10', '12', '198', '31/08/1985', '8', 'เกิดมี', 'เธียรธาร', 'single', '087866453', '11/786 หมู่บ้านธารารมณ์', 'เขตป้อมปราบศัตรูพ่าย', 'ป้อมปราบ', 'กรุงเทพมหาคร', '10410', '1', 'EI002', null);
INSERT INTO `employee` VALUES ('16', 'ceo', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_manage1-w320_1348874215.jpg', '../View/uploads/empmanage1-w320_1348874215.jpg', '023452238', '28', '', 'rstu@hotmail.com', '', '11', '11', '198', '31/9/1986', '6', 'คันโธสา', 'จุฬารัตน์', 'single', '087893232', '23/7 หมู่บ้านโอเคเฟอเฟ็ก 12', 'เขตบางกะปิ', 'คลองจั่น', 'กรุงเทพมหาคร', '10120', '1', 'EM005', null);
INSERT INTO `employee` VALUES ('17', 'emp8', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_1511137_433575890129932_2950144930921405395_n_571849341.jpg', '../View/uploads/emp1511137_433575890129932_2950144930921405395_n_571849341.jpg', '021112544', '29', '', 'vwx@hotmail.com', '', '10', '11', '198', '31/6/1986', '11', 'สิงห์ทองกล้า', 'ศรีสุดา', 'single', '084654625', '896/45 หมู่บ้าน สุขใจ 20', 'เขตปทุมวัน', 'รองเมือง', 'กรุงเทพมหาคร', '10110', '1', 'EM004', null);
INSERT INTO `employee` VALUES ('18', 'emp99', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_10930522_786265701459324_1310912553955830447_n_1140643425.jpg', '../View/uploads/emp10930522_786265701459324_1310912553955830447_n_1140643425.jpg', '021554233', '30', '', 'xyz@hotmail.com', '', '10', '11', '198', '31/08/1985', '8', 'ชนะภัย', 'ศิริพร', 'single', '087866453', '11/786 หมู่บ้านธารารมณ์', 'เขตป้อมปราบศัตรูพ่าย', 'ป้อมปราบ', 'กรุงเทพมหาคร', '10410', '1', 'EM006', null);
INSERT INTO `employee` VALUES ('19', 'chief', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_dev-320_797895287.jpg', '../View/uploads/empdev-320_797895287.jpg', '021345233', '41', '', 'abc123@hotmail.com', '', '8', '11', '198', '3/18/1974', '7', 'สิงหา', 'ชาลี', 'single', '084564535', '55/88 หมู่บ้านรื่นฤดี 7 ถนนหทัยราษฎร์', 'เขตพระโขนง', 'คลองเตย', 'กรุงเทพมหาคร', '10420', '1', 'EM007', null);
INSERT INTO `employee` VALUES ('21', 'emp2', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_avatar-2_1329337786.png', '../View/uploads/empavatar-2_1329337786.png', '021112233', '30', '', 'abc@hotmail.com', '', '10', '14', '198', '5/26/1985', '11', 'อินทา', 'สาธิดา', 'single', '084353345', '466/178 หมู่บ้านเสริมสุข ถนนรามคำแหง 120', 'เขตพระนคร', 'วังบูรพาภิรมย์', 'กรุงเทพมหาคร', '10510', '1', 'EL001', null);
INSERT INTO `employee` VALUES ('22', 'emp3', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_a4_1337987174.jpg', '../View/uploads/empa4_1337987174.jpg', '023446234', '29', '', 'def@hotmail.com', '', '10', '14', '198', '4/20/1986', '10', 'นวลกุลชร', 'ธนดล', 'single', '087898788', '788/1 หอพักดวงดาว ถนนอุดมสุข 5', 'เขตดุสิต', 'ดุสิต', 'กรุงเทพมหาคร', '10520', '1', 'EL002', null);
INSERT INTO `employee` VALUES ('26', 'emp6', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_sergey-azovskiy_1138190614.jpg', '../View/uploads/empsergey-azovskiy_1138190614.jpg', '026612237', '36', '', 'opq@hotmail.com', '', '10', '15', '198', '29/6/1986', '7', 'แสงนิลสี', 'นิคม', 'single', '084538286', '46/4 หมู่บ้านร่วมใจ สามัคคี 55', 'เขตบางเขน', 'ลาดยาว', 'กรุงเทพมหาคร', '10440', '1', 'EP001', null);
INSERT INTO `employee` VALUES ('27', 'emp7', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_user-6_464183824.jpg', '../View/uploads/empuser-6_464183824.jpg', '023452238', '28', '', 'rstu@hotmail.com', '', '10', '15', '198', '31/9/1986', '6', 'กันตา', 'อานนท์', 'single', '087893232', '23/7 หมู่บ้านโอเคเฟอเฟ็ก 12', 'เขตบางกะปิ', 'คลองจั่น', 'กรุงเทพมหาคร', '10120', '1', 'EP002', null);
INSERT INTO `employee` VALUES ('619', 'emp7', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_2_672113391.jpg', '../View/uploads/emp2_672113391.jpg', '023452238', '28', '', 'rstu@hotmail.com', '', '122', '237', '199', '31/9/1986', '6', 'เวชยา', 'วรเวช', 'single', '', '23/7 หมู่บ้านโอเคเฟอเฟ็ก 12', 'เขตบางกะปิ', 'คลองจั่น', 'กรุงเทพมหาคร', '10120', '1', 'EH001', '0');
INSERT INTO `employee` VALUES ('618', 'emp8', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_avatar3_225830788.jpg', '../View/uploads/empavatar3_225830788.jpg', '021112544', '29', '', 'vwx@hotmail.com', '', '123', '238', '199', '31/6/1986', '11', 'คงไว้', 'บูรณา', 'single', '', '896/45 หมู่บ้าน สุขใจ 20', 'เขตปทุมวัน', 'รองเมือง', 'กรุงเทพมหาคร', '10110', '1', 'EH002', '0');
INSERT INTO `employee` VALUES ('617', 'emp8', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_1_356991657.jpg', '../View/uploads/emp1_356991657.jpg', '021112544', '29', '', 'vwx@hotmail.com', '', '123', '237', '199', '31/6/1986', '11', 'อยู่เจริญ', 'ปทุมรัตน์', 'single', '', '896/45 หมู่บ้าน สุขใจ 20', 'เขตปทุมวัน', 'รองเมือง', 'กรุงเทพมหาคร', '10110', '1', 'EI001', '0');
INSERT INTO `employee` VALUES ('615', 'emp3', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_maketing-w320_960125103.gif', '../View/uploads/empmaketing-w320_960125103.gif', '026665547', '40', '', 'adb@abc.com', '', '123', '239', '199', '1/29/2015', '11', 'สุคนธะ', 'ไกรสร', 'single', '', '116', '', '', '', '', '1', 'EA001', '0');
INSERT INTO `employee` VALUES ('616', 'emp3', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '023446234', '29', '', 'def@hotmail.com', '', '124', '239', '199', '4/20/1986', '10', 'ศิริมงคล', 'คมศักดิ์', 'single', '', '788/1 หอพักดวงดาว ถนนอุดมสุข 5', 'เขตดุสิต', 'ดุสิต', 'กรุงเทพมหาคร', '10520', '1', 'EA002', '0');
INSERT INTO `employee` VALUES ('614', 'emp9', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_a2_1249255641.jpg', '../View/uploads/empa2_1249255641.jpg', '021554233', '30', '', 'xyz@hotmail.com', '', '124', '237', '199', '31/08/1985', '8', 'เกิดมี', 'เธียรธาร', 'single', '', '11/786 หมู่บ้านธารารมณ์', 'เขตป้อมปราบศัตรูพ่าย', 'ป้อมปราบ', 'กรุงเทพมหาคร', '10410', '1', 'EI002', '0');
INSERT INTO `employee` VALUES ('613', 'ceo', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_manage1-w320_1348874215.jpg', '../View/uploads/empmanage1-w320_1348874215.jpg', '023452238', '28', '', 'rstu@hotmail.com', '', '123', '240', '199', '31/9/1986', '6', 'คันโธสา', 'จุฬารัตน์', 'single', '', '23/7 หมู่บ้านโอเคเฟอเฟ็ก 12', 'เขตบางกะปิ', 'คลองจั่น', 'กรุงเทพมหาคร', '10120', '1', 'EM005', '0');
INSERT INTO `employee` VALUES ('612', 'chief', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_dev-320_797895287.jpg', '../View/uploads/empdev-320_797895287.jpg', '021345233', '41', '', 'abc123@hotmail.com', '', '123', '241', '199', '3/18/1974', '7', 'สิงหา', 'ชาลี', 'single', '', '55/88 หมู่บ้านรื่นฤดี 7 ถนนหทัยราษฎร์', 'เขตพระโขนง', 'คลองเตย', 'กรุงเทพมหาคร', '10420', '1', 'EM007', '0');
INSERT INTO `employee` VALUES ('611', 'emp99', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_10930522_786265701459324_1310912553955830447_n_1140643425.jpg', '../View/uploads/emp10930522_786265701459324_1310912553955830447_n_1140643425.jpg', '021554233', '30', '', 'xyz@hotmail.com', '', '123', '246', '199', '31/08/1985', '8', 'ชนะภัย', 'ศิริพร', 'single', '', '11/786 หมู่บ้านธารารมณ์', 'เขตป้อมปราบศัตรูพ่าย', 'ป้อมปราบ', 'กรุงเทพมหาคร', '10410', '1', 'EM006', '0');
INSERT INTO `employee` VALUES ('610', 'emp8', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_1511137_433575890129932_2950144930921405395_n_571849341.jpg', '../View/uploads/emp1511137_433575890129932_2950144930921405395_n_571849341.jpg', '021112544', '29', '', 'vwx@hotmail.com', '', '123', '245', '199', '31/6/1986', '11', 'สิงห์ทองกล้า', 'ศรีสุดา', 'single', '', '896/45 หมู่บ้าน สุขใจ 20', 'เขตปทุมวัน', 'รองเมือง', 'กรุงเทพมหาคร', '10110', '1', 'EM004', '0');
INSERT INTO `employee` VALUES ('609', 'emp2', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_avatar-2_1329337786.png', '../View/uploads/empavatar-2_1329337786.png', '021112233', '30', '', 'abc@hotmail.com', '', '123', '242', '199', '5/26/1985', '11', 'อินทา', 'สาธิดา', 'single', '', '466/178 หมู่บ้านเสริมสุข ถนนรามคำแหง 120', 'เขตพระนคร', 'วังบูรพาภิรมย์', 'กรุงเทพมหาคร', '10510', '1', 'EL001', '0');
INSERT INTO `employee` VALUES ('608', 'emp3', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_a4_1337987174.jpg', '../View/uploads/empa4_1337987174.jpg', '023446234', '29', '', 'def@hotmail.com', '', '124', '244', '199', '4/20/1986', '10', 'นวลกุลชร', 'ธนดล', 'single', '', '788/1 หอพักดวงดาว ถนนอุดมสุข 5', 'เขตดุสิต', 'ดุสิต', 'กรุงเทพมหาคร', '10520', '1', 'EL002', '0');
INSERT INTO `employee` VALUES ('607', 'emp6', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_sergey-azovskiy_1138190614.jpg', '../View/uploads/empsergey-azovskiy_1138190614.jpg', '026612237', '36', '', 'opq@hotmail.com', '', '124', '242', '199', '29/6/1986', '7', 'แสงนิลสี', 'นิคม', 'single', '', '46/4 หมู่บ้านร่วมใจ สามัคคี 55', 'เขตบางเขน', 'ลาดยาว', 'กรุงเทพมหาคร', '10440', '1', 'EP001', '0');
INSERT INTO `employee` VALUES ('606', 'emp7', '5f4dcc3b5aa765d61d8327deb882cf99', '../View/uploads/empthumb_user-6_464183824.jpg', '../View/uploads/empuser-6_464183824.jpg', '023452238', '28', '', 'rstu@hotmail.com', '', '124', '238', '199', '31/9/1986', '6', 'กันตา', 'อานนท์', 'single', '', '23/7 หมู่บ้านโอเคเฟอเฟ็ก 12', 'เขตบางกะปิ', 'คลองจั่น', 'กรุงเทพมหาคร', '10120', '1', 'EP002', '0');

-- ----------------------------
-- Table structure for `emp_status`
-- ----------------------------
DROP TABLE IF EXISTS `emp_status`;
CREATE TABLE `emp_status` (
  `id` int(11) DEFAULT NULL,
  `emp_status_work` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emp_status
-- ----------------------------
INSERT INTO `emp_status` VALUES ('1', 'ปกติ');
INSERT INTO `emp_status` VALUES ('2', 'พักงานชั่วคราว');
INSERT INTO `emp_status` VALUES ('3', 'ลาออก');

-- ----------------------------
-- Table structure for `kpi`
-- ----------------------------
DROP TABLE IF EXISTS `kpi`;
CREATE TABLE `kpi` (
  `kpi_id` int(11) NOT NULL AUTO_INCREMENT,
  `kpi_name` varchar(255) DEFAULT NULL,
  `kpi_detail` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `kpi_code` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `kpi_better_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`kpi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=814 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kpi
-- ----------------------------
INSERT INTO `kpi` VALUES ('33', 'บัญชีการเงิน-จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(หน่วย:ครั้ง)', 'จำนวนครั้งที่หน่วยตรวจสอบให้แก้ไข(สำหรับประเมินพนักงานบัญชี)', '198', 'KPI001', null, null);
INSERT INTO `kpi` VALUES ('34', 'บัญชีการเงิน-จำนวนครั้งที่ขาดสภาพคล่อง/กระทบงานอื่นๆ(หน่วย:ชั่วโมง)', 'จำนวนครั้งที่ขาดสภาพคล่อง/กระทบงานอื่นๆ(สำหรับประเมินพนักงานบัญชี)', '198', 'KPI002', null, null);
INSERT INTO `kpi` VALUES ('35', 'บัญชีการเงิน-% ความพึงพอใจ(ดี)(หน่วย:ร้อยละ)', '% ความพึงพอใจ(ดี)(สำหรับประเมินพนักงานบัญชี)', '198', 'KPI003', null, null);
INSERT INTO `kpi` VALUES ('36', 'บัญชีการเงิน-จำนวนครั้งที่ปิดบัญชีไม่ทันกำหนด(หน่วย:ครั้ง)', 'จำนวนครั้งที่ปิดบัญชีไม่ทันกำหนด(สำหรับประเมินพนักงานบัญชี)', '198', 'KPI004', null, null);
INSERT INTO `kpi` VALUES ('42', 'การตลาด-จำนวนข้อร้องเรียนจากลูกค้า(หน่วย:ครั้ง)', '  ( ≤1 ครั้ง)  นับจำนวนข้อร้องเรียนจากลูกค้า  (ความถี่ ทุกเดือน)', '198', 'KPI005', null, null);
INSERT INTO `kpi` VALUES ('43', 'การตลาด-อัตรายอดขายประจำงวดการประเมิน(หน่วย:ล้านบาท)', ' อัตรายอดขายประจำงวดการประเมินเทียบกับปีที่แล้ว', '198', 'KPI006', null, null);
INSERT INTO `kpi` VALUES ('44', 'การตลาด-ยอดสั่งซื้อของลูกค้าเฉลี่ยต่อเดือน(หน่วย:ร้อยละ)', 'ยอดสั่งซื้อของลูกค้าเฉลี่ยต่อเดือน (≥ 80%) ใบสั่งซื้อ (PO), ใบตอบรับการเสนอราคา (ความถี่ ทุกเดือน)', '198', 'KPI007', null, null);
INSERT INTO `kpi` VALUES ('45', 'การตลาด-จำนวนลูกค้าที่ติดต่อเข้ามาเอง(หน่วย:ร้อยละ)', ' จำนวนลูกค้าที่ติดต่อเข้ามาเอง (≥ 90% ของลูกค้าทั้งหมด) บันทึก (สมุด/แบบฟอร์มการรับเรื่อง) (ความถี่ ทุกเดือน)', '198', 'KPI008', null, null);
INSERT INTO `kpi` VALUES ('78', 'ไอที-ผู้ปฎิบัติงานทางด้าน ICT ที่มีความรู้ความชำนาญเฉพาะทาง หรือผ่านการทดสอบมาตรฐานวิชาชีพ (หน่วย:ร้อยละ)', 'ผู้ปฎิบัติงานทางด้าน ICT ที่มีความรู้ความชำนาญเฉพาะทาง หรือผ่านการทดสอบมาตรฐานวิชาชีพ (หน่วย:ร้อยละ)', '198', 'KPI009', null, null);
INSERT INTO `kpi` VALUES ('766', 'ปริมาณของเสียที่เกิดจากการผลิต', 'ลงลง 5% ของปีที่ผ่านมา', '199', 'P001', null, null);
INSERT INTO `kpi` VALUES ('79', 'ไอที-จำนวนครั้งของการเกิด downtime ของระบบ ICT และระยะเวลาในการกู้คืน(หน่วย:ครั้ง)', 'จำนวนครั้งของการเกิด downtime ของระบบ ICT และระยะเวลาในการกู้คืน', '198', 'KPI010', null, null);
INSERT INTO `kpi` VALUES ('80', 'ไอที-จำนวนครั้งของการถูกบุกรุก และระดับความปลอดภัยที่ยอมรับได้ (หน่วย:ครั้ง)', 'จำนวนครั้งของการถูกบุกรุก และระดับความปลอดภัยที่ยอมรับได้ (หน่วย:ครั้ง)', '198', 'KPI011', null, null);
INSERT INTO `kpi` VALUES ('81', 'ไอที-จำนวนโครงการ/กิจกรรมที่จัดขึ้น เพื่อพัฒนาความรอบรู้ ICT ของผู้เรียนและผู้ปฏิบัติงาน(หน่วย:โครงการ)', 'จำนวนโครงการ/กิจกรรมที่จัดขึ้น เพื่อพัฒนาความรอบรู้ ICT (หน่วย:โครงการ)ของผู้เรียนและผู้ปฏิบัติงาน', '198', 'KPI012', null, null);
INSERT INTO `kpi` VALUES ('82', ' บุคคล-อัตราการมาทำงานของพนักงาน  95% ต่อเดือน(หน่วย:คน)', 'จำนวนพนักงานที่มาทำงานต่อวัน อัตราการไม่มาทำงานต่อวัน เอกสารรายงานผลการดำเนินงานตามวัตถุประสงค์', '198', 'KPI013', null, null);
INSERT INTO `kpi` VALUES ('83', 'บุคคล-อัตราการมาสายลดลง  50 %(หน่วย:ร้อยละ)', 'รายงานการมาสายของพนักงานจำแนกตามระดับ ตำแหน่งแผนก ', '198', 'KPI014', null, null);
INSERT INTO `kpi` VALUES ('84', 'บุคคล-อัตราการหยุดงาน ไม่เกิน 3 % ต่อเดือน(หน่วย:ร้อยละ)', 'รายงานอัตราการหยุดงานแต่ละประเภท ', '198', 'KPI015', null, null);
INSERT INTO `kpi` VALUES ('85', 'บุคคล-กิจกรรมเสริมสร้างแรงงานสัมพันธ์ที่ดี(หน่วย:ครั้ง)', 'กิจกรรมเสริมสร้างแรงงานสัมพันธ์ที่ดี เน้นการทำงานเป็นทีม และมุ่งความสนใจส่วนบุคคล', '198', 'KPI016', null, null);
INSERT INTO `kpi` VALUES ('86', 'จัดซื้อ-การควบคุมราคา/ต้นทุนของวัตถุดิบ(หน่วย:ร้อยละ)', 'จัดซื้อ-การควบคุมราคา/ต้นทุนของวัตถุดิบ(หน่วย:ร้อยละ)', '198', 'KPI017', null, null);
INSERT INTO `kpi` VALUES ('87', 'จัดซื้อ-การลดราคา/ต้นทุนของวัตถุดิบ(หน่วย:ล้านบาท)', 'การลดราคา/ต้นทุนของวัตถุดิบ', '198', 'KPI018', null, null);
INSERT INTO `kpi` VALUES ('88', 'จัดซื้อ-การติดตามการขอเสนอซื้อ(หน่วย:ครั้ง)', 'การติดตามการขอเสนอซื้อ(หน่วย:ครั้ง)', '198', 'KPI019', null, null);
INSERT INTO `kpi` VALUES ('89', 'จัดซื้อ-คุณภาพการบริหารงานจัดซื้อ(หน่วย:ร้อยละ)', 'คุณภาพการบริหารงานจัดซื้อ(หน่วย:ร้อยละ)', '198', 'KPI020', null, null);
INSERT INTO `kpi` VALUES ('90', 'โลจิสติกส์-ประสิทธิภาพในการดําเนินพิธีการศลุกากรที่ชายแดนของหน่วยงานที่เกี่ยวข้อง(หน่วย:ร้อยละ)', 'ประสิทธิภาพในการดําเนินพิธีการศลุกากรที่ชายแดนของหน่วยงานที่เกี่ยวข้อง(หน่วย:ร้อยละ)', '198', 'KPI021', null, null);
INSERT INTO `kpi` VALUES ('91', 'โลจิสติกส์-คุณภาพของสาธารณูปโภคพื้นฐานของการขนส่งและระบบสารสนเทศสําหรับโลจิสตกิส(หน่วย:ร้อยละ)', 'คุณภาพของสาธารณูปโภคพื้นฐานของการขนส่งและระบบสารสนเทศสําหรับโลจิสตกิส', '198', 'KPI022', null, null);
INSERT INTO `kpi` VALUES ('92', 'โลจิสติกส์-ความสะดวกในการนําเข้าหรือส่งออกสินค้าระหว่างประเทศ(หน่วย:ร้อยละ)', 'ความสะดวกในการนําเข้าหรือส่งออกสินค้าระหว่างประเทศ ', '198', 'KPI023', null, null);
INSERT INTO `kpi` VALUES ('93', 'โลจิสติกส์-ความสามารถของอุตสาหกรรมโลจิสติกส์ในประเทศ(หน่วย:ร้อยละ) ', 'ความสามารถของอุตสาหกรรมโลจิสติกส์ในประเทศ ', '198', 'KPI024', null, null);
INSERT INTO `kpi` VALUES ('767', 'ผลผลิต(productivity)', 'เพิ่มขึ้น 5% ของปีที่ผ่านมา', '199', 'P002', '242', null);
INSERT INTO `kpi` VALUES ('768', ' จํานวนครั้งที่ผลิตไม่ทันตามแผน', 'น้อยกว่า 5% ของจํานวนครั้งที่ผลิตทั้งหมด', '199', 'P003', '242', null);
INSERT INTO `kpi` VALUES ('769', 'ต้นทุนการผลิต', 'ลดลง 3% เมื่อเทียบกับปีที่ผ่านมา', '199', 'P004', '242', null);
INSERT INTO `kpi` VALUES ('770', 'การ Rework งานเสีย', 'น้อยกว่า 3% ของยอดการ ผลิตทั้งหมด', '199', 'P005', '242', null);
INSERT INTO `kpi` VALUES ('771', 'จํานวนสิ่งที่ไเป็นไปตามข้อกําหนด', 'ไม่เกิน 3% ของจํานวนที่ผลิต', '199', 'QC001', '247', null);
INSERT INTO `kpi` VALUES ('772', 'แก้ไขสาเหตุที่ทําเกิดสิ่งที่ไม่เป็นไม่ตามข้อกําหนด', 'ได้อย่างน้อย 5 สาเหตุต่อปี', '199', 'QC002', '247', null);
INSERT INTO `kpi` VALUES ('773', 'ความผิดพลาดที่พบจากการ Re-check', 'ผลการตรวจซ้ําต้องมีผล ความผิดพลาดเป็น ศูนย์', '199', 'QC003', '247', null);
INSERT INTO `kpi` VALUES ('774', 'จํานวน customer complaint ที่เกิดจากสินค้าตก Spec. ลดลงจากปีที่ผ่านมา', 'ลดลง 50% เมื่อเทียบกับปีที่ผ่านมา', '199', 'QC004', '247', null);
INSERT INTO `kpi` VALUES ('775', 'ฝีมือในการต่อรองราคา สามารถประหยัดเงินให้องค์กรได้', 'ประหยัดได้ 10% โดยที่ คุณภาพเท่าเดิมรวดเร็ว, มาตรฐานเหมือนเดิมหรือดีขึ้น', '199', 'PO001', '241', null);
INSERT INTO `kpi` VALUES ('776', 'สามารถสั่งซื้อวัตถุดิบได้ตรง ตาม Spec. ที่แต่ละฝ่ายต้องการ', 'มากกว่า 95% ของจํานวน รายการวัตถุดิบที่สั่งซื้อทั้งหมด', '199', 'PO002', '241', null);
INSERT INTO `kpi` VALUES ('777', 'เพิ่มจํานวน vendor เกรด A ให้ได้', '70% ของ vendor ทั้งหมด', '199', 'PO003', '241', null);
INSERT INTO `kpi` VALUES ('778', 'กรณีเร่งด่วนจัดซื้อได้ทันตามกําหนดเวลาที่ตกลงกับ ผู้ต้องการสั่งซื้อ', '90% ของความต้องการ สั่งซื้อทั้งหมด', '199', 'PO004', '241', null);
INSERT INTO `kpi` VALUES ('779', 'ความถูกต้องของบัญชีสินค้าคงคลัง', 'ถูกต้อง 100%', '199', 'WH001', '244', null);
INSERT INTO `kpi` VALUES ('780', 'จํานวนรายการวัตถุดิบที่มียอดตรงกับ Stock card', 'ไม่น้อยกว่า 98% ของรายการวัตถุดิบทั้งหมด', '199', 'WH002', '244', null);
INSERT INTO `kpi` VALUES ('781', 'ความสูญเสียของสินค้าเนื่องมาจากการจัดเก็บสินค้าในคลัง', 'สูญเสีย 0%', '199', 'WH003', '244', null);
INSERT INTO `kpi` VALUES ('782', 'การเก็บรักษาวัตถุดิบหลัก ให้มีปริมาณเหมาะสมตาม Min-Max ที่ตั้งไว้', 'รายการวัตถุดิบหลักทั้งหมดไม่น้อยกว่า 95% ของ', '199', 'WH004', '244', null);
INSERT INTO `kpi` VALUES ('783', 'จํานวนครั้งที่จ่ายวัตถุดิบผิด', 'น้อยกว่า 3% ของจํานวนครั้งที่จ่ายทั้งหมด', '199', 'WH005', '244', null);
INSERT INTO `kpi` VALUES ('784', 'ความแม่นยําในการประมารการแนวโน้มทางการตลาด ล่วงหน้า 3 เดือน', 'ตลาดเคลื่อนไม่เกิน 5% ของมูลค่าจริง', '199', 'MK001', '240', null);
INSERT INTO `kpi` VALUES ('785', 'คุณภาพในการจัดโปรโมชั่นที่ทําให้ยอดขายเพิ่มขึ้น', 'น้อยกว่า 30% ของงบโปรโมชั่น', '199', 'MK002', '240', null);
INSERT INTO `kpi` VALUES ('786', 'ยอดซื้อรวมาของลูกค้ารายใหม่', 'มากกว่า 30% ของยอดซื้อทั้งหมด', '199', 'MK003', '240', null);
INSERT INTO `kpi` VALUES ('787', 'เปิดตลาดใหม่ กลุ่มลูกค้าใหม่ได้', '10% ของยอดขาย', '199', 'MK004', '240', null);
INSERT INTO `kpi` VALUES ('788', 'ความพึงพอใจของลูกค้า', 'ได้ไม่ต่ำกว่า 90% ในทุกหัวข้อการประเมินและต้องชนะคู่แข่งในทุกหัวข้อ', '199', 'S001', '239', null);
INSERT INTO `kpi` VALUES ('789', 'เป็นตัวเลือกอันดับแรกของลูกค้า', 'มากกว่า 90% ของลูกค้าทั้งหมด', '199', 'S002', '239', null);
INSERT INTO `kpi` VALUES ('795', 'ขยายมาตรฐานลูกค้าใหม่', 'มากกว่า 20% ของจํานวนลูกค้าทั้งหมด', '199', 'S003', '239', null);
INSERT INTO `kpi` VALUES ('796', 'การรักษาลูกค้าเก่า', 'มากกว่า 20% ของจํานวนลูกค้าทั้งหมด', '199', 'S004', '239', null);
INSERT INTO `kpi` VALUES ('797', 'ยอดขายรวมเมื่อเทียบกับปีที่ผ่านมา', 'มากกว่า 90% ของยอดเงิน', '199', 'S005', '239', null);
INSERT INTO `kpi` VALUES ('798', 'อัตราในการส่งคืนสินค้าจากลูกค้า', 'ไม่เกิน 10%', '199', 'TP001', '245', null);
INSERT INTO `kpi` VALUES ('799', 'การจัดส่งทันเวลา', 'มากกว่า 95% ของจํานวนครั้งที่ส่งทั้งหมด', '199', 'TP002', '245', null);
INSERT INTO `kpi` VALUES ('800', 'ความถูกต้องของบิล', 'มากกว่า 98% ของจํานวนบิลทั้งหมด', '199', 'ACC001', '237', 'Y');
INSERT INTO `kpi` VALUES ('801', 'จํานวนของการส่งบิลไม่ทันเวลา', 'น้อยกว่า 3% ของจํานวนบิลทั้งหมด', '199', 'ACC002', '237', 'N');
INSERT INTO `kpi` VALUES ('802', 'ภาระหนี้ค้างชําระ', 'ไม่เกิน 80% ของยอดขาย', '199', 'ACC003', '237', 'N');
INSERT INTO `kpi` VALUES ('803', 'อัตราส่วนของหนี้เสีย', 'ไม่เกิน 5% ของยอดขายทั้งหมด', '199', 'ACC004', '237', 'N');
INSERT INTO `kpi` VALUES ('804', 'จํานวนรายการบัญชีที่มีการแก้ไข หลังปิดบัญชี', 'ไม่เกิน 3% ของรายการบัญชีทั้งหมด', '199', 'ACC005', '237', 'N');
INSERT INTO `kpi` VALUES ('805', 'ความสามารถในการรับสมัครพนักงานเพื่อคัดเลือกเข้ามาเป็นพนักงานใหม่ให้ได้ทันเวลา', 'มากกว่า 80% ของตําแหน่งว่างทั้งหมด', '199', 'HR001', '246', null);
INSERT INTO `kpi` VALUES ('806', 'การฝึกอบรมเพื่อพัฒนาบุคลากร', 'มากกว่า 95% ของจํานวนบุคลากรทั้งหมด', '199', 'HR002', '246', null);
INSERT INTO `kpi` VALUES ('807', 'อัตราในการขาดงานของพนักงาน', 'น้อยกว่า 5% ของวันทํางานทั้งหมด / คน / ปี', '199', 'HR003', '246', null);
INSERT INTO `kpi` VALUES ('808', 'อัตราการทํางานล่วงเวลา', 'มากกว่า 5% ของเวลาทํางานทั้งหมด', '199', 'HR004', '246', null);
INSERT INTO `kpi` VALUES ('809', 'อัตราส่วนของพนักงานที่ผ่านการทดสอบความรู้', 'ไม่น้อยกว่า 98% ของพนักงานที่อบรมทั้งหมด', '199', 'HR005', '246', null);
INSERT INTO `kpi` VALUES ('810', 'ยอดขาย', 'มากกว่า 5% สินทรัพย์รวม', '199', 'FD001', '238', 'Y');
INSERT INTO `kpi` VALUES ('811', 'กําไร', 'มากกว่า 60% ของยอดขาย', '199', 'FD002', '238', 'Y');
INSERT INTO `kpi` VALUES ('812', 'จํานวนเงินปันผล', 'มากกว่า 10% ของกําไร', '199', 'FD003', '238', 'Y');
INSERT INTO `kpi` VALUES ('813', 'ยอดหนี้เสีย', 'น้อยกว่า 5% ของยอดขาย', '199', 'FD004', '238', 'N');

-- ----------------------------
-- Table structure for `kpi_result`
-- ----------------------------
DROP TABLE IF EXISTS `kpi_result`;
CREATE TABLE `kpi_result` (
  `kpi_year` varchar(255) NOT NULL,
  `appraisal_period_id` varchar(11) NOT NULL,
  `department_id` varchar(11) NOT NULL,
  `division_id` varchar(11) NOT NULL,
  `position_id` varchar(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL,
  `adjust_percentage` double DEFAULT NULL,
  `adjust_reason` text,
  `confirm_flag` varchar(255) DEFAULT NULL,
  `approve_flag` varchar(255) DEFAULT NULL,
  `score_sum_percentage` double(11,2) DEFAULT NULL,
  `score_final_percentage` double(11,2) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`kpi_year`,`appraisal_period_id`,`department_id`,`division_id`,`position_id`,`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kpi_result
-- ----------------------------
INSERT INTO `kpi_result` VALUES ('2017', '822', '237', '', '124', '614', '0', '', 'Y', 'Y', '60.00', '60.00', '199');
INSERT INTO `kpi_result` VALUES ('2017', '822', '237', '', '123', '617', '0', '', 'Y', 'Y', '80.00', '80.00', '199');
INSERT INTO `kpi_result` VALUES ('2017', '822', '238', '', '124', '606', '0', '', 'Y', 'Y', '75.00', '75.00', '199');

-- ----------------------------
-- Table structure for `package`
-- ----------------------------
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `user_amount` int(11) DEFAULT NULL,
  `price_per_month` int(11) DEFAULT NULL,
  `price_per_year` int(11) DEFAULT NULL,
  `appraisal_amount` int(11) DEFAULT NULL,
  `previous_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of package
-- ----------------------------
INSERT INTO `package` VALUES ('1', 'package A', '5', '200', '2000', '4', '0');
INSERT INTO `package` VALUES ('2', 'package B', '10', '300', '3000', '4', '0');
INSERT INTO `package` VALUES ('3', 'package C', '15', '450', '4500', '4', '0');
INSERT INTO `package` VALUES ('4', 'package D', '30', '900', '9000', '6', '0');
INSERT INTO `package` VALUES ('5', 'package E', '50', '1500', '15000', '12', '1');
INSERT INTO `package` VALUES ('6', 'package F', '80', '2400', '24000', '24', '1');
INSERT INTO `package` VALUES ('7', 'package G', '9999999', '59000', '59000', '9999', '9999');

-- ----------------------------
-- Table structure for `position_emp`
-- ----------------------------
DROP TABLE IF EXISTS `position_emp`;
CREATE TABLE `position_emp` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position_emp
-- ----------------------------
INSERT INTO `position_emp` VALUES ('8', 'หัวหน้างาน', '2', '198');
INSERT INTO `position_emp` VALUES ('10', 'พนักงานทั่วไป', '3', '198');
INSERT INTO `position_emp` VALUES ('11', 'ผู้บริหาร', '1', '198');
INSERT INTO `position_emp` VALUES ('122', 'ผู้บริหาร', '1', '199');
INSERT INTO `position_emp` VALUES ('123', 'หัวหน้าแผนก', '2', '199');
INSERT INTO `position_emp` VALUES ('124', 'พนักงาน', '3', '199');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'Level1');
INSERT INTO `role` VALUES ('2', 'Level2');
INSERT INTO `role` VALUES ('3', 'Level3');

-- ----------------------------
-- Table structure for `threshold`
-- ----------------------------
DROP TABLE IF EXISTS `threshold`;
CREATE TABLE `threshold` (
  `threshold_id` int(11) NOT NULL AUTO_INCREMENT,
  `threshold_name` varchar(255) DEFAULT NULL,
  `threshold_begin` varchar(255) DEFAULT NULL,
  `threshold_end` varchar(255) DEFAULT NULL,
  `threshold_color` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`threshold_id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of threshold
-- ----------------------------
INSERT INTO `threshold` VALUES ('103', 'ไม่น่าพอใจ', '0', '40', 'fc0a36', '198');
INSERT INTO `threshold` VALUES ('104', 'พอใจ', '41', '75', 'ffad14', '198');
INSERT INTO `threshold` VALUES ('105', 'ดี', '76', '100', '27b02e', '198');
INSERT INTO `threshold` VALUES ('133', 'ไม่ผ่าน', '0', '49', 'f50a48', '199');
INSERT INTO `threshold` VALUES ('134', 'พอใช้', '50', '79', 'f28518', '199');
INSERT INTO `threshold` VALUES ('136', 'ดี', '80', '100', '298210', '199');
