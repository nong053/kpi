-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `prototype_db`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `about`
-- 

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL auto_increment,
  `about_title` text NOT NULL,
  `about_detail` text NOT NULL,
  `about_title_eng` text NOT NULL,
  `about_detail_eng` text NOT NULL,
  PRIMARY KEY  (`about_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `about`
-- 

INSERT INTO `about` VALUES (1, '', '<p>\r\n	เกี่ยวกับเรา</p>\r\n<p>\r\n	ใส่ข้อมูลเกี่ยวกับเราที่นี้</p>\r\n', '', '<p>\r\n	about us here..</p>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `admin`
-- 

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(255) NOT NULL,
  `admin_surname` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` varchar(255) NOT NULL,
  `admin_email` varchar(100) default NULL,
  `admin_website` varchar(100) default NULL,
  `admin_send_email` varchar(100) default NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', 'admin', '11', '11', '3', 'nn.it@hotmail.com', 'www.test.com', '');
INSERT INTO `admin` VALUES (2, 'rest', 'tes', 'test', 'test', '1', 'nn.it@hotmail.com', 'tes', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `answer`
-- 

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL auto_increment,
  `ans_detail` text NOT NULL,
  `ans_update` datetime NOT NULL,
  `ans_name` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY  (`ans_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `answer`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `article`
-- 

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL auto_increment,
  `article_name` varchar(100) NOT NULL,
  `article_title` text NOT NULL,
  `article_detail` text NOT NULL,
  `article_name_eng` varchar(255) default NULL,
  `article_title_eng` text NOT NULL,
  `article_detail_eng` text NOT NULL,
  `main_menu_id` varchar(100) NOT NULL,
  `main_menucat_id` varchar(11) NOT NULL,
  `article_show` varchar(55) NOT NULL default 'show',
  PRIMARY KEY  (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- dump ตาราง `article`
-- 

INSERT INTO `article` VALUES (1, 'หน้าแรก', 'หน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก\r\nหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก\r\nหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก\r\nหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก', '<p>\r\n	<b>รายละเอียด</b></p>\r\n<p>\r\n	หน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก<br />\r\n	หน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก<br />\r\n	หน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก<br />\r\n	หน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรกหน้าแรก</p>', 'title eng', 'Title Detail', '<p>\r\n	<b>More Detail</b></p>', '52', '', 'show');
INSERT INTO `article` VALUES (7, 'โปรโมชั่น', 'โปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น\r\nโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น\r\nโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น\r\nโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น\r\nโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น\r\nโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น\r\nโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น', '<p>\r\n	โปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น</p>\r\n<p>\r\n	โปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น</p>\r\n<p>\r\n	โปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่นโปรโมชั่น</p>', '', '', '', '56', '', 'show');
INSERT INTO `article` VALUES (8, 'ติดต่อเรา', 'ติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา\r\nติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา\r\nติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา', '<p>\r\n	ติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา</p>\r\n<p>\r\n	ติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา</p>\r\n<p>\r\n	ติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา</p>\r\n<p>\r\n	ติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา</p>\r\n<p>\r\n	ติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเราติดต่อเรา</p>', '', '', '', '57', '', 'show');
INSERT INTO `article` VALUES (9, 'เกี่ยวกับเรา', 'เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา\r\nเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา\r\nเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา\r\nเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา\r\nเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา', '<p>\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา<br />\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา</p>\r\n<p>\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา<br />\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา</p>\r\n<p>\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา<br />\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา</p>\r\n<p>\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา<br />\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา</p>\r\n<p>\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา<br />\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา</p>\r\n<p>\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา<br />\r\n	เกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเราเกี่ยวกับเรา</p>', '', '', '', '98', '', 'show');
INSERT INTO `article` VALUES (11, 'บทความ1', 'บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1\r\nบทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1\r\nบทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1\r\nบทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1\r\nบทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1', '<p>\r\n	บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1</p>\r\n<p>\r\n	บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1บทความ1</p>', 'test', 'sdf', '<p>\r\n	sdfsdf</p>', '99', '', 'no');
INSERT INTO `article` VALUES (12, 'บทความ2', 'บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2', '<p>\r\n	บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2</p>\r\n<p>\r\n	บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2</p>\r\n<p>\r\n	บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2</p>\r\n<p>\r\n	บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2</p>\r\n<p>\r\n	บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2</p>', 'test', 'บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2\r\nบทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2บทความ2', '', '99', '', 'show');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `banner_sum`
-- 

CREATE TABLE `banner_sum` (
  `pic_id` int(11) NOT NULL auto_increment,
  `pic_name` varchar(55) NOT NULL,
  `pic_type` varchar(55) NOT NULL,
  `pic_detail` text NOT NULL,
  `pic_detail_eng` text,
  `pic_link` varchar(55) NOT NULL,
  `main_menu_id` int(55) default NULL,
  PRIMARY KEY  (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `banner_sum`
-- 

INSERT INTO `banner_sum` VALUES (1, 'contact.png', '', '<p>\r\n	ข้อความที่ต้องการแสดงเนื้อหาหรือโฆษณาต่างได้ที่นี้</p>\r\n', '<p>\r\n	detail for content into page here on english languge</p>\r\n', '', 52);
INSERT INTO `banner_sum` VALUES (2, 'final_splash-teal.jpg', '', '<p>\r\n	ทดสอนเนื้อหาในการจัดการเกี่ยวกับข้อมูลที่ต้องการแสดง</p>\r\n', '<p>\r\n	detail in english</p>\r\n', '', 52);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `bg_style`
-- 

CREATE TABLE `bg_style` (
  `bg_id` int(11) NOT NULL auto_increment,
  `bg_name` varchar(255) default NULL,
  `bg_repeat` varchar(255) default NULL,
  `bg_position` varchar(255) default NULL,
  `bg_color` varchar(255) default NULL,
  `bg_web_color` varchar(255) default NULL,
  PRIMARY KEY  (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `bg_style`
-- 

INSERT INTO `bg_style` VALUES (1, '', 'repeat', 'right', '#FFFFFF', '#E3E3E3');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `box_style`
-- 

CREATE TABLE `box_style` (
  `box_id` int(11) NOT NULL auto_increment,
  `box_header` varchar(255) default NULL,
  `box_header_color` varchar(255) default NULL,
  `box_border_color` varchar(255) default NULL,
  `box_border_style` varchar(255) default NULL,
  `box_color_bg` varchar(255) default NULL,
  `box_color` varchar(255) default NULL,
  `box_color_over` varchar(255) default NULL,
  `box_color_overed` varchar(255) default NULL,
  `box_font_color` varchar(11) default NULL,
  PRIMARY KEY  (`box_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `box_style`
-- 

INSERT INTO `box_style` VALUES (1, 'template-absen_02220811191259.png', '#CC0000', '', '', '#FFFFFF', '#006666', '#0066FF', '#FFFFCC', '#000000');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `button_style`
-- 

CREATE TABLE `button_style` (
  `button_id` int(11) NOT NULL auto_increment,
  `button_bg` varchar(255) default NULL,
  `button_bg_color` varchar(255) default NULL,
  `button` varchar(255) default NULL,
  `button_color` varchar(255) default NULL,
  `button_over` varchar(255) default NULL,
  `button_over_color` varchar(255) default NULL,
  `button_overed` varchar(255) default NULL,
  `button_overed_color` varchar(255) default NULL,
  `button_font_color` varchar(11) default NULL,
  `button_font_over_color` varchar(11) default NULL,
  `button_width` varchar(11) default NULL,
  `button_hieght` varchar(11) default NULL,
  PRIMARY KEY  (`button_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `button_style`
-- 

INSERT INTO `button_style` VALUES (1, 'template-absen_02210811411129.png', '#FF0033', '', '', '', '#FF3300', '', '#99FF00', '#FFFF66', '#000066', '100', '30');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `catmyvdo`
-- 

CREATE TABLE `catmyvdo` (
  `id_catmyvdo` int(11) NOT NULL auto_increment,
  `name_catmyvdo` varchar(55) NOT NULL,
  PRIMARY KEY  (`id_catmyvdo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- 
-- dump ตาราง `catmyvdo`
-- 

INSERT INTO `catmyvdo` VALUES (57, 'VDO1');
INSERT INTO `catmyvdo` VALUES (58, 'VDO2');
INSERT INTO `catmyvdo` VALUES (59, 'VDO3');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `cat_news`
-- 

CREATE TABLE `cat_news` (
  `cat_new_id` int(11) NOT NULL auto_increment,
  `cat_new_title` varchar(55) NOT NULL,
  `cat_new_link` varchar(55) NOT NULL,
  `cat_new_lastbuildate` varchar(55) NOT NULL,
  `cat_new_generator` varchar(55) NOT NULL,
  `cat_new_copyrigt` varchar(55) NOT NULL,
  PRIMARY KEY  (`cat_new_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `cat_news`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `cat_webdir`
-- 

CREATE TABLE `cat_webdir` (
  `cat_webdir_id` int(11) NOT NULL auto_increment,
  `cat_webdir_title` varchar(55) NOT NULL,
  `cat_webdir_detail` text NOT NULL,
  PRIMARY KEY  (`cat_webdir_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- dump ตาราง `cat_webdir`
-- 

INSERT INTO `cat_webdir` VALUES (3, 'ท่องเที่ยว', 'ท่องเที่ยว');
INSERT INTO `cat_webdir` VALUES (14, 'ซอฟแวร์', 'ซอฟแวร์');
INSERT INTO `cat_webdir` VALUES (15, 'ฮาดแวร์', 'ฮาดแวร์');
INSERT INTO `cat_webdir` VALUES (16, 'ขายสินค้าออนไลน์', 'ขายสินค้าออนไลน์');
INSERT INTO `cat_webdir` VALUES (17, 'โฆษณา', 'โฆษณา');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `cat_youtupe`
-- 

CREATE TABLE `cat_youtupe` (
  `id_cat_youtupe` int(11) NOT NULL auto_increment,
  `title_cat_youtupe` text NOT NULL,
  PRIMARY KEY  (`id_cat_youtupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

-- 
-- dump ตาราง `cat_youtupe`
-- 

INSERT INTO `cat_youtupe` VALUES (76, 'VDO ไดมอนด์ควอนตั้ม');
INSERT INTO `cat_youtupe` VALUES (77, 'VDO สเตเซน');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `contact`
-- 

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL auto_increment,
  `contact_fullname` varchar(255) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_detail` text NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_tel` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_date` varchar(55) NOT NULL,
  PRIMARY KEY  (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- dump ตาราง `contact`
-- 

INSERT INTO `contact` VALUES (18, 'โฆษิต อารมณ์สวะ', 'หน่องทดสอบ', 'หน่องทดสอบ การติดต่อกับผู้ดูและระบบ', '15 /1 หมู่ 7 ตำบลคุ้มเก่า อ.เขาวง จ.กาฬสินธุ์', '0810010055', 'nn.it@hotmail.com', '17-09-11:10:27:47');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `content_style`
-- 

CREATE TABLE `content_style` (
  `content_id` int(11) NOT NULL auto_increment,
  `content_header` varchar(255) default NULL,
  `content_header_color` varchar(255) default NULL,
  `content_border_color` varchar(255) default NULL,
  `content_border_style` varchar(255) default NULL,
  `content_width` varchar(11) default NULL,
  `content_height` varchar(11) default NULL,
  `content_font_color` varchar(11) default NULL,
  `content_bg_color` varchar(11) default NULL,
  PRIMARY KEY  (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `content_style`
-- 

INSERT INTO `content_style` VALUES (1, 'template-absen_07210811471115.png', '', '#E7E7E7', 'solid', '', '30', '#FFFFFF', '#FFFFFF');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `counter`
-- 

CREATE TABLE `counter` (
  `counter` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`counter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1202 ;

-- 
-- dump ตาราง `counter`
-- 

INSERT INTO `counter` VALUES (1201);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `country_tour`
-- 

CREATE TABLE `country_tour` (
  `country_id` int(11) NOT NULL auto_increment,
  `country_name` varchar(55) NOT NULL,
  `country_name_eng` text NOT NULL,
  PRIMARY KEY  (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=202 ;

-- 
-- dump ตาราง `country_tour`
-- 

INSERT INTO `country_tour` VALUES (1, 'ทวีบเอเชีย', '');
INSERT INTO `country_tour` VALUES (2, 'สาธารณรัฐอิสลามอัฟกานิสถาน', '');
INSERT INTO `country_tour` VALUES (3, 'สาธารณรัฐอาร์เมเนีย', '');
INSERT INTO `country_tour` VALUES (6, 'สาธารณรัฐอาเซอร์ไบจาน', '');
INSERT INTO `country_tour` VALUES (7, 'ราชอาณาจักรบาห์เรน', '');
INSERT INTO `country_tour` VALUES (8, 'สาธารณรัฐประชาชนบังกลาเทศ', '');
INSERT INTO `country_tour` VALUES (9, 'ราชอาณาจักรภูฏาน', '');
INSERT INTO `country_tour` VALUES (10, 'เนการาบรูไนดารุสซาลาม', '');
INSERT INTO `country_tour` VALUES (11, 'ราชอาณาจักรกัมพูชา', '');
INSERT INTO `country_tour` VALUES (12, 'สาธารณรัฐประชาชนจีน', '');
INSERT INTO `country_tour` VALUES (13, 'สาธารณรัฐไซปรัส', '');
INSERT INTO `country_tour` VALUES (14, 'สาธารณรัฐประชาธิปไตยติมอร์-เลสเต', '');
INSERT INTO `country_tour` VALUES (15, 'สาธารณรัฐจอร์เจีย', '');
INSERT INTO `country_tour` VALUES (16, 'สาธารณรัฐอินเดีย', '');
INSERT INTO `country_tour` VALUES (17, 'สาธารณรัฐอินโดนีเซีย', '');
INSERT INTO `country_tour` VALUES (18, 'สาธารณรัฐอิสลามอิหร่าน', '');
INSERT INTO `country_tour` VALUES (19, 'สาธารณรัฐอิรัก', '');
INSERT INTO `country_tour` VALUES (20, 'รัฐอิสราเอล', '');
INSERT INTO `country_tour` VALUES (21, ' ญี่ปุ่น', '');
INSERT INTO `country_tour` VALUES (22, 'ราชอาณาจักรฮัชไมต์จอร์แดน', '');
INSERT INTO `country_tour` VALUES (23, 'สาธารณรัฐคาซัคสถาน', '');
INSERT INTO `country_tour` VALUES (24, 'สาธารณรัฐประชาธิปไตยประชาชนเกาหลี(เหนือ)', '');
INSERT INTO `country_tour` VALUES (25, 'สาธารณรัฐเกาหลี(ใต้)', '');
INSERT INTO `country_tour` VALUES (26, 'รัฐคูเวต', '');
INSERT INTO `country_tour` VALUES (27, 'สาธารณรัฐคีร์กีซ', '');
INSERT INTO `country_tour` VALUES (28, 'สาธารณรัฐประชาธิปไตยประชาชนลาว', '');
INSERT INTO `country_tour` VALUES (29, 'สาธารณรัฐเลบานอน', '');
INSERT INTO `country_tour` VALUES (30, 'มาเลเซีย', '');
INSERT INTO `country_tour` VALUES (31, 'สาธารณรัฐมัลดีฟส์', '');
INSERT INTO `country_tour` VALUES (32, 'มองโกเลีย', '');
INSERT INTO `country_tour` VALUES (33, 'สหภาพพม่า', '');
INSERT INTO `country_tour` VALUES (34, 'ราชอาณาจักรเนปาล', '');
INSERT INTO `country_tour` VALUES (35, 'รัฐสุลต่านโอมาน', '');
INSERT INTO `country_tour` VALUES (36, 'สาธารณรัฐอิสลามปากีสถาน', '');
INSERT INTO `country_tour` VALUES (37, 'สาธารณรัฐฟิลิปปินส์', '');
INSERT INTO `country_tour` VALUES (38, 'รัฐกาตาร์', '');
INSERT INTO `country_tour` VALUES (39, 'ราชอาณาจักรซาอุดีอาระเบีย', '');
INSERT INTO `country_tour` VALUES (40, 'สาธารณรัฐสิงคโปร์', '');
INSERT INTO `country_tour` VALUES (41, 'สาธารณรัฐสังคมนิยมประชาธิปไตยศรีลังกา', '');
INSERT INTO `country_tour` VALUES (42, 'สาธารณรัฐอาหรับซีเรีย', '');
INSERT INTO `country_tour` VALUES (43, 'สาธารณรัฐทาจิกิสถาน', '');
INSERT INTO `country_tour` VALUES (44, 'ราชอาณาจักรไทย', '');
INSERT INTO `country_tour` VALUES (45, 'สาธารณรัฐตุรกี', '');
INSERT INTO `country_tour` VALUES (46, 'เติร์กเมนิสถาน', '');
INSERT INTO `country_tour` VALUES (47, 'สหรัฐอาหรับเอมิเรตส์', '');
INSERT INTO `country_tour` VALUES (48, 'สาธารณรัฐอุซเบกิสถาน', '');
INSERT INTO `country_tour` VALUES (49, 'สาธารณรัฐสังคมนิยมเวียดนาม', '');
INSERT INTO `country_tour` VALUES (50, 'สาธารณรัฐเยเมน', '');
INSERT INTO `country_tour` VALUES (51, 'ทวีปออสเตรเลีย', '');
INSERT INTO `country_tour` VALUES (52, 'เครือรัฐออสเตรเลีย', '');
INSERT INTO `country_tour` VALUES (53, 'สาธารณรัฐหมู่เกาะฟิจิ', '');
INSERT INTO `country_tour` VALUES (54, 'สาธารณรัฐคิริบาส', '');
INSERT INTO `country_tour` VALUES (55, 'สาธารณรัฐหมู่เกาะมาร์แชลล์', '');
INSERT INTO `country_tour` VALUES (56, 'สหพันธรัฐไมโครนีเซีย', '');
INSERT INTO `country_tour` VALUES (57, 'สาธารณรัฐนาอูรู', '');
INSERT INTO `country_tour` VALUES (58, 'นิวซีแลนด์', '');
INSERT INTO `country_tour` VALUES (59, 'สาธารณรัฐปาเลา', '');
INSERT INTO `country_tour` VALUES (60, 'ปาปัวนิวกินี', '');
INSERT INTO `country_tour` VALUES (61, 'รัฐเอกราชซามัว', '');
INSERT INTO `country_tour` VALUES (62, 'หมู่เกาะโซโลมอน', '');
INSERT INTO `country_tour` VALUES (63, 'ราชอาณาจักรตองกา', '');
INSERT INTO `country_tour` VALUES (64, 'ตูวาลู', '');
INSERT INTO `country_tour` VALUES (65, 'สาธารณรัฐวานูอาตู', '');
INSERT INTO `country_tour` VALUES (66, 'ทวีปยุโรป', '');
INSERT INTO `country_tour` VALUES (67, 'สาธารณรัฐแอลเบเนีย', '');
INSERT INTO `country_tour` VALUES (68, 'ราชรัฐอันดอร์รา', '');
INSERT INTO `country_tour` VALUES (69, 'สาธารณรัฐออสเตรีย', '');
INSERT INTO `country_tour` VALUES (70, 'สาธารณรัฐเบลารุส', '');
INSERT INTO `country_tour` VALUES (71, 'ราชอาณาจักรเบลเยียม', '');
INSERT INTO `country_tour` VALUES (72, 'บอสเนียและเฮอร์เซโกวีนา', '');
INSERT INTO `country_tour` VALUES (73, 'สาธารณรัฐบัลแกเรีย', '');
INSERT INTO `country_tour` VALUES (74, 'สาธารณรัฐโครเอเชีย', '');
INSERT INTO `country_tour` VALUES (75, 'สาธารณรัฐเช็ก', '');
INSERT INTO `country_tour` VALUES (76, 'ราชอาณาจักรเดนมาร์ก', '');
INSERT INTO `country_tour` VALUES (77, 'สาธารณรัฐเอสโตเนีย', '');
INSERT INTO `country_tour` VALUES (78, 'สาธารณรัฐฟินแลนด์', '');
INSERT INTO `country_tour` VALUES (79, 'สาธารณรัฐฝรั่งเศส', '');
INSERT INTO `country_tour` VALUES (80, 'สหพันธ์สาธารณรัฐเยอรมนี', '');
INSERT INTO `country_tour` VALUES (81, 'สาธารณรัฐเฮลเลนิก (กรีซ)', '');
INSERT INTO `country_tour` VALUES (82, 'สาธารณรัฐฮังการี', '');
INSERT INTO `country_tour` VALUES (83, 'สาธารณรัฐไอซ์แลนด์', '');
INSERT INTO `country_tour` VALUES (84, 'ไอร์แลนด์', '');
INSERT INTO `country_tour` VALUES (85, 'สาธารณรัฐอิตาลี', '');
INSERT INTO `country_tour` VALUES (86, 'สาธารณรัฐลัตเวีย', '');
INSERT INTO `country_tour` VALUES (87, 'ราชรัฐลิกเตนสไตน์', '');
INSERT INTO `country_tour` VALUES (88, 'สาธารณรัฐลิทัวเนีย', '');
INSERT INTO `country_tour` VALUES (89, 'ราชรัฐลักเซมเบิร์ก', '');
INSERT INTO `country_tour` VALUES (90, 'สาธารณรัฐมาซิโดเนีย', '');
INSERT INTO `country_tour` VALUES (91, 'สาธารณรัฐมอลตา', '');
INSERT INTO `country_tour` VALUES (92, 'สาธารณรัฐมอลโดวา', '');
INSERT INTO `country_tour` VALUES (93, 'ราชรัฐโมนาโก', '');
INSERT INTO `country_tour` VALUES (94, 'สาธารณรัฐมอนเตเนโกร', '');
INSERT INTO `country_tour` VALUES (95, 'ราชอาณาจักรเนเธอร์แลนด์', '');
INSERT INTO `country_tour` VALUES (96, 'ราชอาณาจักรนอร์เวย์', '');
INSERT INTO `country_tour` VALUES (97, 'สาธารณรัฐโปแลนด์', '');
INSERT INTO `country_tour` VALUES (98, 'สาธารณรัฐโปรตุเกส', '');
INSERT INTO `country_tour` VALUES (99, 'โรมาเนีย', '');
INSERT INTO `country_tour` VALUES (100, 'สหพันธรัฐรัสเซีย', '');
INSERT INTO `country_tour` VALUES (101, 'สาธารณรัฐซานมารีโน', '');
INSERT INTO `country_tour` VALUES (102, 'สาธารณรัฐเซอร์เบีย', '');
INSERT INTO `country_tour` VALUES (103, 'สาธารณรัฐสโลวัก (สโลวะเกีย)', '');
INSERT INTO `country_tour` VALUES (104, 'สาธารณรัฐสโลวีเนีย', '');
INSERT INTO `country_tour` VALUES (105, 'ราชอาณาจักรสเปน', '');
INSERT INTO `country_tour` VALUES (106, 'ราชอาณาจักรสวีเดน', '');
INSERT INTO `country_tour` VALUES (107, 'สมาพันธรัฐสวิส (สวิตเซอร์แลนด์)', '');
INSERT INTO `country_tour` VALUES (108, 'ยูเครน', '');
INSERT INTO `country_tour` VALUES (109, 'สหราชอาณาจักรบริเตนใหญ่และไอร์แลนด์เหนือ (อังกฤษ เวลส์ ', '');
INSERT INTO `country_tour` VALUES (110, 'นครรัฐวาติกัน', '');
INSERT INTO `country_tour` VALUES (111, 'ทวีปแอฟริกา', '');
INSERT INTO `country_tour` VALUES (112, 'สาธารณรัฐประชาธิปไตยประชาชนแอลจีเรีย', '');
INSERT INTO `country_tour` VALUES (113, 'สาธารณรัฐแองโกลา', '');
INSERT INTO `country_tour` VALUES (114, 'สาธารณรัฐเบนิน', '');
INSERT INTO `country_tour` VALUES (115, 'สาธารณรัฐบอตสวานา', '');
INSERT INTO `country_tour` VALUES (116, 'บูร์กินาฟาโซ', '');
INSERT INTO `country_tour` VALUES (117, 'สาธารณรัฐบุรุนดี', '');
INSERT INTO `country_tour` VALUES (118, ' สาธารณรัฐบุรุนดี', '');
INSERT INTO `country_tour` VALUES (119, 'สาธารณรัฐเคปเวิร์ด', '');
INSERT INTO `country_tour` VALUES (120, 'สาธารณรัฐแอฟริกากลาง', '');
INSERT INTO `country_tour` VALUES (121, 'สาธารณรัฐชาด', '');
INSERT INTO `country_tour` VALUES (122, 'สหภาพคอโมโรส', '');
INSERT INTO `country_tour` VALUES (123, 'สาธารณรัฐประชาธิปไตยคองโก', '');
INSERT INTO `country_tour` VALUES (124, 'สาธารณรัฐคองโก', '');
INSERT INTO `country_tour` VALUES (125, 'สาธารณรัฐโกตดิวัวร์ (ไอวอรี่โคสต์)', '');
INSERT INTO `country_tour` VALUES (126, 'สาธารณรัฐจิบูตี', '');
INSERT INTO `country_tour` VALUES (127, 'สาธารณรัฐอาหรับอียิปต์', '');
INSERT INTO `country_tour` VALUES (128, 'สาธารณรัฐอิเควทอเรียลกินี', '');
INSERT INTO `country_tour` VALUES (129, 'รัฐเอริเทรีย', '');
INSERT INTO `country_tour` VALUES (130, 'สหพันธ์สาธารณรัฐประชาธิปไตยเอธิโอเปีย', '');
INSERT INTO `country_tour` VALUES (131, 'สาธารณรัฐกาบอง', '');
INSERT INTO `country_tour` VALUES (132, 'สาธารณรัฐแกมเบีย', '');
INSERT INTO `country_tour` VALUES (133, 'สาธารณรัฐกานา', '');
INSERT INTO `country_tour` VALUES (134, 'สาธารณรัฐกินี', '');
INSERT INTO `country_tour` VALUES (135, 'สาธารณรัฐกินี-บิสเซา', '');
INSERT INTO `country_tour` VALUES (136, 'สาธารณรัฐเคนยา', '');
INSERT INTO `country_tour` VALUES (137, 'ราชอาณาจักรเลโซโท', '');
INSERT INTO `country_tour` VALUES (138, 'สาธารณรัฐไลบีเรีย', '');
INSERT INTO `country_tour` VALUES (139, 'สาธารณรัฐสังคมนิยมประชาชนอาหรับลิเบีย', '');
INSERT INTO `country_tour` VALUES (140, 'สาธารณรัฐมาดากัสการ์', '');
INSERT INTO `country_tour` VALUES (141, 'สาธารณรัฐมาลาวี', '');
INSERT INTO `country_tour` VALUES (142, 'สาธารณรัฐมาลี', '');
INSERT INTO `country_tour` VALUES (143, 'สาธารณรัฐอิสลามมอริเตเนีย', '');
INSERT INTO `country_tour` VALUES (144, 'สาธารณรัฐมอริเชียส', '');
INSERT INTO `country_tour` VALUES (145, 'ราชอาณาจักรโมร็อกโก', '');
INSERT INTO `country_tour` VALUES (146, 'สาธารณรัฐโมซัมบิก', '');
INSERT INTO `country_tour` VALUES (147, 'สาธารณรัฐนามิเบีย', '');
INSERT INTO `country_tour` VALUES (148, 'สาธารณรัฐไนเจอร์', '');
INSERT INTO `country_tour` VALUES (149, 'สหพันธ์สาธารณรัฐไนจีเรีย', '');
INSERT INTO `country_tour` VALUES (150, 'สาธารณรัฐรวันดา', '');
INSERT INTO `country_tour` VALUES (151, 'สาธารณรัฐประชาธิปไตยเซาตูเมและปรินซิปี', '');
INSERT INTO `country_tour` VALUES (152, 'สาธารณรัฐเซเนกัล', '');
INSERT INTO `country_tour` VALUES (153, 'สาธารณรัฐเซเชลส์', '');
INSERT INTO `country_tour` VALUES (154, 'สาธารณรัฐเซียร์ราลีโอน', '');
INSERT INTO `country_tour` VALUES (155, 'สาธารณรัฐประชาธิปไตยโซมาลี (โซมาเลีย)', '');
INSERT INTO `country_tour` VALUES (156, 'สาธารณรัฐแอฟริกาใต้', '');
INSERT INTO `country_tour` VALUES (157, 'สาธารณรัฐซูดาน', '');
INSERT INTO `country_tour` VALUES (158, 'ราชอาณาจักรสวาซิแลนด์', '');
INSERT INTO `country_tour` VALUES (159, 'สหสาธารณรัฐแทนซาเนีย', '');
INSERT INTO `country_tour` VALUES (160, 'สาธารณรัฐโตโก', '');
INSERT INTO `country_tour` VALUES (161, 'สาธารณรัฐตูนิเซีย', '');
INSERT INTO `country_tour` VALUES (162, 'สาธารณรัฐยูกันดา', '');
INSERT INTO `country_tour` VALUES (163, 'สาธารณรัฐแซมเบีย', '');
INSERT INTO `country_tour` VALUES (164, 'สาธารณรัฐซิมบับเว', '');
INSERT INTO `country_tour` VALUES (165, 'ทวีปอเมริกาเหนือ', '');
INSERT INTO `country_tour` VALUES (166, 'แอนติกาและบาร์บูดา', '');
INSERT INTO `country_tour` VALUES (167, 'เครือรัฐบาฮามาส', '');
INSERT INTO `country_tour` VALUES (168, 'บาร์เบโดส', '');
INSERT INTO `country_tour` VALUES (169, 'เบลีซ', '');
INSERT INTO `country_tour` VALUES (170, 'แคนาดา', '');
INSERT INTO `country_tour` VALUES (171, 'สาธารณรัฐคอสตาริกา', '');
INSERT INTO `country_tour` VALUES (172, 'สาธารณรัฐคิวบา', '');
INSERT INTO `country_tour` VALUES (173, 'เครือรัฐโดมินิกา', '');
INSERT INTO `country_tour` VALUES (174, 'สาธารณรัฐโดมินิกัน', '');
INSERT INTO `country_tour` VALUES (175, 'สาธารณรัฐเอลซัลวาดอร์', '');
INSERT INTO `country_tour` VALUES (176, 'เกรเนดา', '');
INSERT INTO `country_tour` VALUES (177, 'สาธารณรัฐกัวเตมาลา', '');
INSERT INTO `country_tour` VALUES (178, 'สาธารณรัฐเฮติ', '');
INSERT INTO `country_tour` VALUES (179, 'สาธารณรัฐฮอนดูรัส', '');
INSERT INTO `country_tour` VALUES (180, 'จาเมกา', '');
INSERT INTO `country_tour` VALUES (181, 'สหรัฐเม็กซิโก', '');
INSERT INTO `country_tour` VALUES (182, 'สาธารณรัฐนิการากัว', '');
INSERT INTO `country_tour` VALUES (183, 'สาธารณรัฐปานามา', '');
INSERT INTO `country_tour` VALUES (184, 'สหพันธรัฐเซนต์คิตส์และเนวิส', '');
INSERT INTO `country_tour` VALUES (185, 'เซนต์ลูเซีย', '');
INSERT INTO `country_tour` VALUES (186, 'เซนต์วินเซนต์และเกรนาดีนส์', '');
INSERT INTO `country_tour` VALUES (187, 'สหรัฐอเมริกา', '');
INSERT INTO `country_tour` VALUES (188, 'ทวีปอเมริกาใต้', '');
INSERT INTO `country_tour` VALUES (189, 'สาธารณรัฐอาร์เจนตินา', '');
INSERT INTO `country_tour` VALUES (190, 'สาธารณรัฐโบลิเวีย', '');
INSERT INTO `country_tour` VALUES (191, 'สหพันธ์สาธารณรัฐบราซิล', '');
INSERT INTO `country_tour` VALUES (192, 'สาธารณรัฐชิลี', '');
INSERT INTO `country_tour` VALUES (193, 'สาธารณรัฐโคลอมเบีย', '');
INSERT INTO `country_tour` VALUES (194, 'สาธารณรัฐเอกวาดอร์', '');
INSERT INTO `country_tour` VALUES (195, 'สาธารณรัฐสหกรณ์กายอานา', '');
INSERT INTO `country_tour` VALUES (196, 'สาธารณรัฐปารากวัย', '');
INSERT INTO `country_tour` VALUES (197, 'สาธารณรัฐเปรู', '');
INSERT INTO `country_tour` VALUES (198, 'สาธารณรัฐซูรินาเม', '');
INSERT INTO `country_tour` VALUES (199, 'สาธารณรัฐตรินิแดดและโตเบโก', '');
INSERT INTO `country_tour` VALUES (200, 'สาธารณรัฐบูรพาอุรุกวัย', '');
INSERT INTO `country_tour` VALUES (201, 'สาธารณรัฐโบลีวาร์แห่งเวเนซุเอลา', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `customer`
-- 

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL auto_increment,
  `cus_enable` varchar(55) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_user` varchar(55) NOT NULL,
  `cus_pass` varchar(255) NOT NULL,
  `cus_company` varchar(255) NOT NULL,
  `cus_fullname` varchar(255) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_tel` varchar(255) NOT NULL,
  `cus_fax` varchar(255) NOT NULL,
  `cus_pic` varchar(55) NOT NULL,
  `cus_other` text NOT NULL,
  `cus_date` varchar(55) NOT NULL,
  `cus_update` varchar(100) default NULL,
  PRIMARY KEY  (`cus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- dump ตาราง `customer`
-- 

INSERT INTO `customer` VALUES (17, 'Yes', 'nn.it@hotmail.com', '44', '44', 'bno group', 'kosit aromsava', 'ramkamhang160', '023334455', '025554456', 'it190112360616.jpg', 'หมายเหตุ: ', '19-09-11:01:13:28', '19-01-12:06:36:16');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `customer_rule`
-- 

CREATE TABLE `customer_rule` (
  `cus_rule_id` int(11) NOT NULL auto_increment,
  `cus_rule_th` text,
  `cus_rule_eng` text,
  PRIMARY KEY  (`cus_rule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `customer_rule`
-- 

INSERT INTO `customer_rule` VALUES (1, '<p>\r\n	อ่านดูข้อมูลการใช้งานก่อนสมัครสมาชิกครับ</p>\r\n', '<p>\r\n	detail about using web here..</p>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `cus_order`
-- 

CREATE TABLE `cus_order` (
  `order_id` int(11) NOT NULL auto_increment,
  `order_date` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_sumprice` varchar(255) NOT NULL,
  `order_vat` varchar(255) NOT NULL,
  `order_tatal` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1201 ;

-- 
-- dump ตาราง `cus_order`
-- 

INSERT INTO `cus_order` VALUES (1171, '08-10-11:19:44:08', 'Yes', '', '', '', '', 17);
INSERT INTO `cus_order` VALUES (1172, '08-10-11:19:48:52', 'ยืนยันการสั่งซื้อ', '', '', '', '', 17);
INSERT INTO `cus_order` VALUES (1177, '09-10-11:01:00:51', 'ยืนยันการสั่งซื้อ', '', '39,900.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1178, '09-10-11:01:05:46', 'ยืนยันการสั่งซื้อ', '', '39,900.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1179, '09-10-11:01:08:53', 'ยืนยันการสั่งซื้อ', '', '37,800.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1180, '09-10-11:01:14:55', 'ยืนยันการสั่งซื้อ', '', '3,000.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1181, '09-10-11:01:16:58', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1182, '09-10-11:01:19:46', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1183, '09-10-11:01:20:52', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1184, '09-10-11:01:22:34', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1185, '09-10-11:01:22:57', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1186, '09-10-11:01:26:13', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1187, '09-10-11:01:28:39', 'ยืนยันการสั่งซื้อ', '', '3,750.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1188, '09-10-11:01:29:08', 'ยืนยันการสั่งซื้อ', '', '5,250.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1189, '09-10-11:01:40:02', 'ยืนยันการสั่งซื้อ', '', '4,900.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1190, '09-10-11:01:42:33', 'ยืนยันการสั่งซื้อ', '', '1,500.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1191, '09-10-11:01:50:07', 'ยืนยันการสั่งซื้อ', '', '700.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1192, '09-10-11:01:50:41', 'ยืนยันการสั่งซื้อ', '', '1,700.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1193, '09-10-11:01:51:34', 'ยืนยันการสั่งซื้อ', '', '250.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1194, '09-10-11:01:52:44', 'ยืนยันการสั่งซื้อ', '', '1,100.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1195, '09-10-11:01:52:56', 'ยืนยันการสั่งซื้อ', '', '1,250.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1196, '09-10-11:01:53:34', 'ยืนยันการสั่งซื้อ', '', '250.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1197, '09-10-11:01:58:46', 'ยืนยันการสั่งซื้อ', '', '250.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1198, '09-10-11:01:59:15', 'ยืนยันการสั่งซื้อ', '', '11,650.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1199, '09-10-11:01:59:41', 'ยืนยันการสั่งซื้อ', '', '11,700.00', '', '', 17);
INSERT INTO `cus_order` VALUES (1200, '18-01-12:07:13:15', 'ยืนยันการสั่งซื้อ', '', '1,000.00', '', '', 17);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `footer_style`
-- 

CREATE TABLE `footer_style` (
  `footer_id` int(11) NOT NULL auto_increment,
  `footer_bg` varchar(255) default NULL,
  `footer_repeat` varchar(255) default NULL,
  `footer_color` varchar(255) default NULL,
  PRIMARY KEY  (`footer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `footer_style`
-- 

INSERT INTO `footer_style` VALUES (1, '', 'no-repeat', '#3B3B3B');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `home`
-- 

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL auto_increment,
  `home_title` text NOT NULL,
  `home_detail` text NOT NULL,
  `home_title_eng` text NOT NULL,
  `home_detail_eng` text NOT NULL,
  PRIMARY KEY  (`home_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `home`
-- 

INSERT INTO `home` VALUES (1, '', '<p>\r\n	ทดสอบหน้าแรก</p>\r\n', '', '<p>\r\n	Testing first page</p>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `home_banner`
-- 

CREATE TABLE `home_banner` (
  `banner_id` int(11) NOT NULL auto_increment,
  `banner_name` varchar(55) NOT NULL,
  `banner_detail` text NOT NULL,
  `banner_detail_eng` text NOT NULL,
  PRIMARY KEY  (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- dump ตาราง `home_banner`
-- 

INSERT INTO `home_banner` VALUES (10, '1DJ_jack.png', '<p>test sssadsfasdfeeeeeeeeeaaazzzxxxxxzcv</p>\r\n<p>55555555555566559789</p>\r\n<p>]]]]]</p>', '');
INSERT INTO `home_banner` VALUES (13, 'Calculator.png', '<p>teewe</p>', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `horoday7`
-- 

CREATE TABLE `horoday7` (
  `horoday7_id` int(11) NOT NULL auto_increment,
  `horoday7_name` varchar(55) NOT NULL,
  `horoday7_name_id` varchar(55) NOT NULL,
  `horoday7_work` text NOT NULL,
  `horoday7_money` text NOT NULL,
  `horoday7_love` text NOT NULL,
  `horoday7_around` text NOT NULL,
  `horoday7_dothing` text NOT NULL,
  `horoday7_family` text NOT NULL,
  `horoday7_other` text NOT NULL,
  PRIMARY KEY  (`horoday7_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `horoday7`
-- 

INSERT INTO `horoday7` VALUES (1, 'วันอาทิตย์', '1', '', '', '', '', '', '', 'ดวงอาทิตย์ คือ สิ่งที่มักจะเริ่มต้นหรือก่อเกิด เช่น เริ่มต้นวันใหม่ คนเกิดวันอาทิตย์ จึงเป็นคนที่ชอบทำอะไรใหม่ๆ เสมอ พระอาทิตย์ขึ้นแต่เช้ามืด คนเกิดวันอาทิตย์ก็มักจะเป็นคนที่ชอบตื่นเช้าเป็นส่วนใหญ่ ดวงอาทิตย์เป็นลูกไฟลูกมหึมา ร้อนแรงมาก ให้พลังงานมาก คนเกิดวันอาทิตย์ก็มักจะเป็นคนใจร้อนเป็นหลักเลย ถึงแม้ข้างนอกจะดูสุขุมนุ่มลึก แต่เชื่อเถอะภายในจิตใจร้อนระอุเชียวล่ะและก็มีพลังในการทำอะไรต่อมิอะไรมาก ด้วย จริงจัง บ้าอำนาจ เผด็จการ ค่อนข้างเป็นคนดุโกรธง่ายแต่ก็หายเร็วนะ โออ่าหรูหราสง่างาม สงบนิ่งน่าเกรงขาม เพื่อนฝูงเยอะเพราะเป็นผู้ให้ ใจคอกว้างขวางหาเงินเก่งและก็ใช้เงินเก่งด้วย รักชื่อเสียงเกียรติยศเป็นอย่างยิ่ง เสียอะไรไม่ว่าเสียหน้าข้าไม่ยอม จะทำอะไรต้องมีมาดมีฟอร์มและไม่ชอบที่จะอยู่นิ่งๆ มันร้อน ฉลาดเจ้าความคิด จัดระบบเก่ง ไม่ค่อยยอมคน ชอบเป็นผู้นำมากกว่าคล้อยตาม แต่จะชอบความเป็นอิสระไม่ขึ้นอยู่กับใครหรือไม่ชอบให้ใครมาบังคับ หยิ่งทะนงหรือมักจะเดินเชิดๆ หน่อย หน้าที่การงาน ก็มักต้องทำงานที่มีเกียรติหรืองานที่ได้เป็นใหญ่ เป็นเจ้าของ เป็นผู้นำ หรืองานที่ทำแล้วดูน่าภาคภูมิใจ หรือทำงานในสถานที่ที่หรูหราใหญ่โตเป็นที่รู้จักของคนทั่วไป สีที่เกี่ยวข้อง ก็พวกสีแดง สีขาว สีเงิน สีที่ร้อนแรง ก็ดวงอาทิตย์เป็นไฟขนาดนั้นน่ะ สุขภาพ มักเป็นโรคเครียด ระบบประสาท ความดันหัวใจ ระบบหายใจ สายตา ตระคริว ลมชัก และปวดสันหลัง');
INSERT INTO `horoday7` VALUES (2, 'วันจันทร์', '2', '', 'ดฟหกด', '', '', '', '', 'บอกแล้วว่าดวงจันทร์ ตรงข้ามกับดวงอาทิตย์ไง มืดกับสว่าง แต่ไม่ใช่ว่าคนเกิดวันจันทร์จะมีนิสัยไม่ดีด้านมืดนะจ๊ะแต่กลับตรงกันข้ามใน บางด้านโดดเด่น คนที่เกิดวันจันทร์ เป็นคนที่ไม่ใจร้อนเหมือนคนวันอาทิตย์แต่ออกแนวโลเลไปมากกว่า จะตัดสินใจอะไรได้สักอย่างตัดสินใจไม่ค่อยเก่งเดี๋ยวเอาเดี๋ยวไม่เอา ไม่คอยเชื่อมั่นในตัวเอง มองโลกในแง่ดี มักถูกหลอกได้ง่าย ๆ และบ่อย ๆก็บอกแล้วไงว่า ดวงจันทร์มักเกี่ยวข้องกับน้ำขึ้นน้ำลงและอารมณ์ของมนุษย์ คนเกิดวันจันทร์จึงเอาแน่ไม่ค่อยได้เดี๋ยวขึ้นเดี๋ยวลง เจ้าอารมณ์ ขี้เกรงใจ น้อยใจ เอาแต่ใจ แสนงอน ขี้อิจฉา ใจอ่อน บอบบางไม่แข็งแรงเหมือนคนวันอาทิตย์ แต่การพูดจามักไพเราะเป็นที่น่าฟัง ไม่ชอบความรุนแรง มีความอ่อนโยนมากกว่า มีเสน่ห์น่ารักในตัวอย่างเห็นได้ชัด มีจิตใจไวต่อความรัก เจ้าชู้ มินิสัยคล้ายเด็กอยู่ในตัว คืออยากรู้อยากเห็นอยากได้โน่นได้นี่ พอได้รู้ได้เห็นแล้วก็เบื่ออยากเล่นอย่างอื่นๆ หรือมอ งหาของใหม่ แล้วก็เป็นคนสนุกสนานแจ่มใสร่าเริง อารมณ์ดี รักสนุก รักธรรมชาติ รักสวยรักงาม ร้องเพลงเก่ง โรแมนติก หน้าที่การงาน มักจะทำงานอะไรที่นุ่มนวล เช่น พยาบาล หรืออาชีพที่เกี่ยวข้องกับน้ำ หรือธาตุเหลวต่างๆ หรือทำงานใกล้หรือในสถานที่ที่เกี่ยวข้องกับน้ำเป็นส่วนใหญ่ หรือเกี่ยวข้องกับสาธารณะชน เพราะมีเสน่ห์ดึงดูด สีที่เกี่ยวข้อง สีขาว นวล สีครีม สีเหลือง สีไข่มุก สุขภาพ โรคที่เกี่ยวกับต่อมน้ำเหลือง โรคที่มีส่วนเกี่ยวข้องกับหน้าอก เต้านม และหลัง\r\n');
INSERT INTO `horoday7` VALUES (3, 'วันอังคาร', '3', '', '', '', '', '', '', 'ดาวอังคารแต่โบราณถือ ว่าเป็นดาวแห่งสงคราม เพราะถ้าเรามองขึ้นไปบนท้องฟ้า เราจะเห็นว่าดาวอังคารมีสีแดงเรียกว่า สู้รบกันจนเลือดสาด คนที่เกิดวันอังคารก็เช่นกัน จึงมักเป็นคนที่ขี้หงุดหงิดมีโทสจริตง่าย ชอบทะเลาะวิวาท สีหน้าแสดงออกเลยถึงความรู้สึก เลือดร้อน อารมณ์ร้อน บุ่มบ่ามมุทะลุ ชอบเสี่ยงภัย ชอบใช้กำลัง บ้าขยันทำงาน กล้าหาญและอดทนมาก ชอบอาหารยังมีรสชาติที่ร้อนแรงเลยมีความคิดสร้างสรรค์ เป็นนักกีฬา อยู่นิ่งไม่เป็น เป็นคนคล่องมาก…มากถ้าเป็นผู้หญิงสวยแค่ไหนก็มักจะซุ่มซ่าม ทำอะไรเสียงดัง ไม่ว่าจะเปิดปิดประตู หรือเดินเสียงดัง ไม่ค่อยเป็นผู้หญิงนิสัยโผงผาง กล้าหาญไม่กลัวใคร ในบางครั้งกลายเป็นคนก้าวร้าวก็มี แถมยังหยิ่งผยองอยู่ตลอด เป็นคนจริงจังเปิดเผยไม่ค่อยท้อแท้ ปากกล้าวิชาดี ฉลาด แก้ปัญหาได้ดี แต่ในบางครั้งก็ยอมหักไม่ยอมงอ ในบางครั้งคนเกิดวันอังคารก็น่ารัก ปรับตัวได้เก่ง อดทนสูง ควบคุมตัวเองได้ดี รักสงบ มีจิตใจดี พวกแข็งนอกอ่อนใน สามารถพึ่งลำแข้งของตัวเองได้ ไม่ยอมแพ้ใครง่าย ๆ หน้าที่การงาน เนื่องจากดาวอังคารเปรียบเป็นเทพเจ้าแห่งสงคราม อาชีพหนีไม่ค่อยได้ เกี่ยวข้องกับข้าราชการทหาร ตำรวจ นั่นเอง หรืออาชีพที่มักจะใช้กำลังมากกว่าสมอง หรืองานที่ไม่หยุดนิ่งอยู่กับที่ งานกลางแจ้ง แต่ไม่ถึงกับเป็นกรรมกรแบกหาม พ่อค้า นักกีฬา วิศวกรรม หรืองานที่ทันสมัยทันเหตุการณ์ เทคโนโลยีใหม่ ๆ พวกงานคอมพิวเตอร์ สีที่เกี่ยวข้อง สีชมพูเกือบแดง สีชมพูอ่อนๆ สุขภาพ ต้องระวังโดนของมีคม ฟืนไฟ ซุ่มซ่ามโดนโน่นโดนนี่ โรคที่เกี่ยวกับสมอง\r\n');
INSERT INTO `horoday7` VALUES (4, 'วันพุธ', '4', '', '', '', '', '', '', 'ดาวพุธเป็นดาวที่อยู่ ใกล้กับดวงอาทิตย์มากที่สุด โบราณว่าไว้ว่า คนที่เกิดวันพุธ มักหมายถึง ปัญญา ความเฉลียวฉลาด มีไหวพริบปฏิภาณดี คล่องแคล่วว่องไวมาก เอาตัวรอดได้ตลอดเวลา ช่างพูด ช่างเจรจา จนในบางพุธกลายเป็นคนกะล่อน ฉลาดแกมโกง เจ้าเล่ห์ มีเล่ห์เหลี่ยม ชั้นเชิง เป็นนักธุรกิจได้ดี ดาวพุธเป็นดาวที่ค่อนข้างเกเรเอาแน่ไม่ค่อยได้ เป็นดาวที่เดินเร็วและยังไม่ค่อยแน่ว่าเมื่อไรจะหยุด เดินหน้าหรือถอยหลัง คนที่เกิดวันพุธ เป็นคนที่ในบางครั้งเราจับทางไม่ถูก รวดเร็วทันใจ ไม่ว่าจะตัดสินใจเร็ว พูดเร็ว ทำอะไรเร็วและปรับตัวได้เก่งมากไม่ว่าจะอยู่สภาวะใดก็ตาม ไม่ค่อยขัดแย้งใคร มีมนุษย์สัมพันธ์ดี ทำมาหากินเก่ง แต่มักจะมีความโลเลไม่แน่นอนอยู่ในตัวตลอดเวลา ยิ่งถ้าเกิดกลางคืนแล้วล่ะก็ จะเข้มแข็งห้าวหาญไม่ค่อยเกรงกลัวอะไร บางครั้งก้าวร้าว พูดจาไม่ค่อยคิดมักขัดหูคนฟัง เจ้าอารมณ์ คนวันพุธมักเรียนรู้อะไรได้เร็ว เชื่อคนง่าย รักใครรักจริงและขี้หึงด้วย เป็นคนสนุกสนานร่าเริง เป็นคนที่มองโลกในแง่ดี มีเมตตาไม่ชอบความรุนแรง หน้าที่การงาน ด้วยความที่คนเกิดวันพุธมักพูดเก่ง งานที่ถนัดก็เป็นพวก พี อาร์ ประชาสัมพันธ์ นักพูด นักคิดนักเขียน นักการทูต ครู นายหน้า แม่ค้าพ่อค้า เลขา ทนายความ นักการเมือง งานที่ใช้สมองและปากในการหากิน สีที่เกี่ยวข้อง สีเขียวมรกต สีธรรมชาติ สุขภาพ ระบบประสาท ระบบหายใจ โรคที่เกี่ยวกับลำคอ หวัด หอบหืด ระบบเสียงและระบบการฟัง คนวันพฤหัสบดีดาวพฤหัสเป็นดาวที่มีขนาดใหญ่อย่างที่เรารู้ๆ กัน โบราณท่านว่า คนที่เกิดวันพฤหัสบดีเป็นคนที่มีวาจาศักดิ์สิทธิ์พูดอะไร คนที่ได้ยินได้ฟังก็จะเคารพนับถือ เชื่อฟัง เลยยกให้เป็นวันครูไง ทางโหราศาสตร์ ดาวพฤหัสยกให้เป็นประธานของความดีงาม มีคุณธรรมสูง มีหน้าที่ปกป้องคุ้มครอง เป็นที่น่าชื่นชมและน่ายกย่อง คุณสมบัติของคนที่เกิดวันพฤหัสบดี จึงมักหมายถึง ผู้ที่มีปัญญาดีเฉลียวฉลาด เป็นนักปราชญ์ผู้รอบรู้ เป็นคนที่มักไม่ค่อยตกอับ เพราะเป็นคนดี แม้ในบางพฤหัสก็มีที่ผิดแผกแตกต่างจากพี่น้องไปบ้าง เช่น อาจดูเป็นพวกมีเล่ห์เหลี่ยม หรือทำอะไรไม่ค่อยเหมือนที่ชาวบ้านชาวช่องเขาคิด เขาทำกันไปบ้างแต่ยังไงก็จะเป็นคนที่มีเหตุมีผลพอจะมีสติยั้งคิดได้และมี คุณธรรมประจำใจอยู่ดีนั่นแหล่ะ คนวันพฤหัสมักเป็นคนที่เกี่ยวข้องกับศาสนา การศึกษา มีความเพียร มีความมุ่งมั่นที่ดี สงบสันโดษ มีคุณธรรมมองโลกในแง่ดี ใจอ่อน ขี้เกรงใจ รักบ้านรักครอบครัว แต่กลับเป็นคนเจ้าอารมณ์ ขี้หงุดหงิด ขี้เบื่อ ขี้เหงา ไม่ชอบให้ใครมาบังคับ ถ้าดื้อจะดื้อหัวชนฝาเลยล่ะ ชอบเป็นที่ปรึกษาให้ชาวบ้านชาวช่อง ชอบพูดชอบสอนแนะนำมองการณ์ไกล แต่ก็มีนะที่อะไรใกล้ๆ หรือเรื่องของตัวเองกลับนึกไม่ค่อยออก เลยแก้ปัญหาของตัวเองไม่ค่อยได้ หน้าที่การงาน ครูบาอาจารย์ ทนายความ เพราะเป็นคนที่รอบรู้ อาชีพอะไรก็ได้ที่เกี่ยวข้องกับการศึกษา ศาสนา การใช้ความคิด ความดีงามช่วยเหลือชาวบ้าน ความเลื่อมใส หรือเกิดประโยชน์ต่อส่วนรวมสังคม สีที่เกี่ยวข้อง สีแสด สีส้ม สีน้ำตาล น้ำตาลแดง สีเหลืองแก่ สุขภาพ ตับ ม้าม ปอด สมองและเท้า การทรงตัวไม่ค่อยดี');
INSERT INTO `horoday7` VALUES (5, 'วันพฤหัสบดี', '5', '', '', '', '', '', '', 'ดาวพฤหัสเป็นดาวที่มี ขนาดใหญ่ อย่างที่เรารู้ ๆ กัน โบราณท่านว่าคนที่เกิดวันพฤหัสบดีเป็นคนที่มีวาจาศักดิ์สิทธิ์ พูดอะไร คนที่ได้ยินได้ฟังก็จะเคารพนับถือ เชื่อฟัง เลยยกให้เป็นวันครูไง ทางโหราศาสตร์ ดาวพฤหัสยกให้เป็นประธานของความดีงาม มีคุณธรรมสูง มีหน้าที่ปกป้องคุ้มครอง เป็นที่น่าชื่นชมและน่ายกย่อ ง\r\nคุณสมบัติของคน ที่เกิดวันพฤหัสบดี จึงมักหมายถึงผู้ที่มีปัญญาดีเฉลียวฉลาด เป็นนักปราชญ์ผู้รอบรู้ เป็นคนที่มักไม่ค่อยตกอับ เพราะเป็นคนดี แม้ในบางพฤหัสก็มีที่ผิดแผกแตกต่างจากพี่น้องไปบ้าง เช่นอาจดูเป็นพวกมีเล่ห์เหลี่ยม หรือทำอะไรไม่ค่อยเหมือนที่ชาวบ้านชาวช่องเขาคิด เขาทำกันไปบ้างแต่ยังไงก็จะเป็นคนที่มีเหตุมีผล พอจะมีสติยั้งคิดได้และมีคุณธรรมประจำใจอยู่ดีนั่นแหล่ะ\r\nคนวันพฤหัสมัก เป็นคนที่เกี่ยวข้องกับศาสนา การศึกษา มีความเพียร มีความมุ่งมั่นที่ดี สงบสันโดษ มีคุณธรรม มองโลกในแง่ดี ใจอ่อน ขี้เกรงใจ รักบ้านรักครอบครัว แต่กลับเป็นคนเจ้าอารมณ์ ขี้หงุดหงิด ขี้เบื่อ ขี้เหงา ไม่ชอบให้ใครมาบังคับ ถ้าดื้อจะดื้อหัวชนฝาเลยล่ะ ชอบเป็นที่ปรึกษาให้ชาวบ้ านชาวช่อง ชอบพูดชอบสอนแนะนำ มองการณ์ไกล แต่ก็มีนะที่อะไรใกล้ ๆ หรื่อเรื่องของตัวเองกลับนึกไม่ค่อยออกเลยแก้ปัญหาของตัวเองไม่ค่อยได้\r\nหน้าที่การงาน\r\nครู บาอาจารย์ ทนายความเพราะเป็นคนที่รอบรู้ อาชีพอะไรก็ได้ ที่เกี่ยวข้องกับการศึกษา ศาสนา การใช้ความคิด ความดีงามช่วยเหลือชาวบ้าน ความเลื่อมใส หรือ เกิดประโยชน์ต่อส่วนรวม สังคม\r\nสีที่เกี่ยวข้อง\r\nสีแสด สีส้ม สีน้ำตาล น้ำตาลแดง สีเหลืองแก่\r\nสุขภาพ\r\nตับ ม้าม ปอด สมอง และเท้า การทรงตัวไม่ค่อยดี\r\n');
INSERT INTO `horoday7` VALUES (6, 'วันศุกร์', '6', '', '', '', '', '', '', 'ดาวศุกร์เป็นดวงดาวที่ เราจะรู้จักในนามดาววีนัส ดาวแห่งความรัก เป็นดาวที่เราสามารถมองเห็นด้วยตาเปล่าและมักจะส่องแสงสุกสกาวบนท้องฟ้าให้ เราเห็นเสมอๆ เมื่อแหงนหน้าขึ้นมองบนฟ้า แต่ถ้าเป็นบนทางโหราศาสตร์ถือว่าดาวศุกร์เป็นดาวแห่งกิเลสตัณหา ราคะจริต สมบัติ หมายถึง ทรัพย์สมบัติ ความสวยสดงดงาม ความสนุกสนาน ศิลปะบันเทิง ความฟุ้งเฟ้อ มีเสน่ห์มาก มีความรักได้บ่อยๆ มีคนอยากเข้ามาให้รักและก็อยากให้คนอื่น ๆมารักตน เลยกลายเป็นคนเจ้าชู้มากรักหลายใจ แต่ไม่มีใครรู้หรอกว่า แท้จริงแล้วมีรักหลายครั้งก็จริง แต่ก็อกหักหลายหนเหมือนกัน ถ้ารักใครรักจริง รักเกิน ๆ จนกลายเป็นขี้หึง เรื่องมากและเลือกมากในความรัก ค่อนข้างเป็นคนที่รักสวยรักงามมีระเบียบ สะอาด มารยาทงาม อ่อนหวานได้ มีความรู้รอบตัวฉลาด แก้ปัญหาเฉพาะหน้าได้เก่ง พลิกแพลงทุกอย่างด้วยมันสมอง ไม่ค่อยชอบใช้กำลัง บางทีก็คิดอะไรไม่ค่อยเหมือนชาวบ้านแต่ก็อนุรักษ์นิยม ชอบเดินทางท่องเที่ยวรักธรรมชาติ ศิลปะ ดนตรี ในเรื่องการเงินก็ไม่ค่อยขัดสน จึงทำให้เป็นคนใช้เงินไม่ค่อยคิดสักเท่าไร หน้าที่การงาน พ่อค้าแม่ค้า นักดนตรี นักร้อง ดาราหนัง นักบัญชี ธนาคาร อาชีพอะไรก็ได้ที่เกี่ยวข้องกับ งานฝีมือ ศิลปะ งานที่ใช้สมองความคิดสร้างสรรค์ มีรสนิยม งานที่ให้ความบันเทิงใจแก่ประชาชน งานที่เกี่ยวกับเงินๆ ทอง ๆ สีที่เกี่ยวข้อง สีฟ้า สีขาว สีน้ำเงิน สีคราม สีเขียวน้ำทะเล สุขภาพ โรคที่เกี่ยวกับเพศสัมพันธ์ มดลูก กระเพาะปัสสาวะ บั้นเอว ริดสีดวง และลำไส้');
INSERT INTO `horoday7` VALUES (7, 'วันเสาร์', '7', '', '', '', '', '', '', 'ดาวเสาร์เป็นดาวที่ อยู่ไกลจากดวงอาทิตย์มาก และก็เดินช้ามากด้วย ทางโหราศาสตร์ดาวเสาร์จะหมายถึง ดาวที่มีความเป็นโทษและทุกข์ การพลัดพราก ตายจาก รกร้าง ยากจน เหงา เปล่าเปลี่ยว จนใคร ๆ ก็ไม่อยากยุ่งกับดาวเสาร์ แต่แท้ที่จริงแล้ว ดาวเสาร์ก็มีความน่ารักและความดีของดวงดาวอยู่นะจ๊ะ เพราะในความหมายที่ดีก็คือดาวเสาร์เป็นดาวที่โคตรอดทนเลย มีความสุขุมรอบคอบและสงบ ถึงแม้จะเชื่องช้าและเนิ่นนานก็ตาม แต่มั่นคงนะจะบอกให้ คนที่เกิดวันเสาร์มักเป็นคนที่ตระหนี่ มัธยัสถ์ ขี้เหนียว งก จริง ๆ แล้วดีออก มักรวยมีทรัพย์สินและก็หมายความไปถึงขี้หึงและหวงของเป็นที่สุด จู้จี้ขี้บ่นก็เท่านั้น เพราะความที่เป็นคนที่ขี้ระแวงและวิตกกังวลอยู่ตลอดเวลา ทำอะไรก็ชอบย้ำคิดย้ำทำไม่ค่อยจบง่ายๆ ส่วนใหญ่เป็นคนที่ฉลาดมาก เพราะเป็นคนที่ชอบคิดอะไรลึกซึ้งและช่างสังเกตเสมอ คิดแล้วก็มักจะทำเอง เพราะไม่ค่อยยอมไว้ใจใคร ใครทำก็ไม่ได้ดั่งใจเลยต้องมาเหนื่อยซะเอง งานหนักเอางานเบาสู้ ดุจกรรมกรยังไงยังงั้นแหล่ะ เป็นคนที่จริงจังกับชีวิตจนดูหน้าดุ หรือยิ้มยาก หรือหน้าแก่ไปเลยก็มี ทำอะไรคิดอะไรดูเหมือนจะช้า เพราะมัวแต่ประณีตอยู่นั่นแหล่ะ กลัวการผิดพลาดคิดมากตลอดเวลา จึงไม่ค่อยกล้าตัดสินใจอะไรได้ทันทีทันการณ์ หน้าที่การงาน งานที่เกี่ยวกับความรับผิดชอบสูง งานที่ใช้กำลัง งานที่ต้องจัดระเบียบ งานที่เกี่ยวกับที่ดิน เกษตร หรืองานเร้นลับ ความตาย อย่างสัปเหร่อ กรรมการแบกปัญหาชาวบ้าน งานที่ต้องรอและใช้ความอดทน หาเช้ากินค่ำ สีที่เกี่ยวข้อง สีดำ สีเทา สีเงิน สีม่วง สีคราม สุขภาพ โรคกระดูก ปวดตามข้อ โรคผิวหนัง โรคเครียดและระบบประสาท\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `horoday30`
-- 

CREATE TABLE `horoday30` (
  `horoday30_id` int(11) NOT NULL auto_increment,
  `horoday30_name` varchar(55) NOT NULL,
  `horoday30_name_id` varchar(55) NOT NULL,
  `horoday30_work` text NOT NULL,
  `horoday30_money` text NOT NULL,
  `horoday30_love` text NOT NULL,
  `horoday30_around` text NOT NULL,
  `horoday30_dothing` text NOT NULL,
  `horoday30_family` text NOT NULL,
  `horoday30_other` text NOT NULL,
  PRIMARY KEY  (`horoday30_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- 
-- dump ตาราง `horoday30`
-- 

INSERT INTO `horoday30` VALUES (1, 'วันที่่1', '1', '', '', '', '', '', '', 'เกิดวันที่ 1 :ทำนายว่า เป็นคนรักเสรี กล้าหาญและไม่ก้มหัวให้ใคร \r\nคนที่เกิดวันที่1ของทุกเดือน เป็นคนที่มีความเป็นตัวของตัวเอง\r\nจนเกือบจะเรียกได้ว่าดื้อรั้นพอใจ ที่จะทำทุกอย่างด้วยตัวเอง\r\nและไม่สนใจว่าใครคิดยังไงกับตนเองด้วย\r\n\r\nมีอารมณ์รุนแรงกระด้างแข็งกร้าว\r\nคิดอย่างไรก็พูดไปอย่างนั้น ไม่กลัวว่าจะพูดอะไร ออกไป\r\nและเมื่อจำเป็นจะต้องต่อสู้ เพื่อสิ่งที่เห็นว่าถูกต้องแล้ว คนเกิดวันที่1จะทุ่มเททุกอย่าง\r\n\r\nคนเกิดวันที่1 จะกำหนดเป้าหมายของชีวิดไว้สูงสุดตั้งใจแสวงหาความเป็นเลิศให้แก่ชีวิตในทุกด้าน แต่จะไม่ยอมบอกหรือแม้แต่แสดงออกให้คนอื่นรู้ว่ากำลังประสงค์อะไร เป็นคนมีเพื่อนสนิทแต่มักจะ เกินกว่าที่จะให้เพื่อนสนิทรู้ว่ากำลังเผชิญปัญหาหรือผิดหวัง\r\n\r\nคนที่จะเอาชนะคนที่เกิดวันที่หนึ่ง ก็คือคนที่มีนิสัยเหมือนกันถ้าได้พบคนที่นิสัยเหมือนกันแล้วเวลา ทั้งหมดที่มีอยู่จะยกให้เพื่อนคนนี้นจนหมดสิ้น แต่กระนั้นก็ตามก็ยังไม่ยอมบอกให้เพื่อนสนิทคนนั้น รับรู้ถึงปัญหาหรือความคิดที่แท้จริงของตนเองอยู่ดี\r\n\r\nคนที่เกิดวันที่1จะหลงรักคนง่าย และรักอย่างลึกซึ้งด้วยแต่เรื่องความรักก็เป็นเป้าหมายอีกอย่าง ที่คนที่เกิดวันที่1ปกปิด ดังนั้น ความรักจึงเป็นเพียงความลึกซึ้งที่เก็บไว้ในใจเท่านั้นความที่ชอบอิสระ และความไม่ชอบง้อใคร ชีวิตส่วนใหญ่จึงมักจะชินอยู่กับการอยู่คนเดียวอย่างเหงาๆ แต่ก็ทรนง คนอื่นจึงมักมองว่าไม่มีน้ำใจ เอาแต่ใจตัวเองดื้อและขี้อิจฉา\r\n	');
INSERT INTO `horoday30` VALUES (2, 'วันที่2', '2', '', '', '', '', '', '', 'เกิดวันที่ 2 :ทำนายว่า : ไม่ใช่คนโลเลต้องคอยทำตามเพื่อน\r\n\r\nแต่เป็นคนที่ต้องการให้เพื่อน(หรือคนรัก) ยอมรับว่าสิ่งที่ทำไปนั้นถูกต้องแล้ว ทั้งๆที่ตัวเองก็รู้ว่าทำถูกต้องแล้วแต่ก็อยากให้มีคนมาบอกว่าทำถูกแล้ว สิ่งที่ทำอยู่นั้น ดีแล้ว เป็นคนที่ฉลาด สามารถหยิบฉวยประโยชน์จากคำแนะนำหรือข้อวิพากษ์วิจารณ์ของเพื่อน นำมาประสมประสาน ให้เกิดผลดีแก่งานอย่างเต็มที่ เวลาทำงานจะคิดแต่เพียงว่า เพื่อนคนใดจะได้ ประโยชน์อันใด บ้างแทนที่จะคิดถึงตัวเองก่อน\r\n\r\nคนที่มีเพื่อนเกิดวันที่2มักได้การเกื้อกูลเป็นอย่างดี โดยปกติแล้วเป็นคนเรียบร้อย อ่อนหวาน ไม่ชอบขัดใจใครและพร้อมที่จะคบหาผู้คน(เพราะอยาก มีเพื่อนมากอยู่แล้ว)แต่มีข้อเสียจะเปลี่ยนแปลงง่าย ใครทำอะไรขัดใจหรือความรู้สึกไม่ได้เลย จะเกิดความน้อยใจ หรือโกรธวู่วามขึ้นมาทันที เมื่อเวลาอารมณ์ดีจะคอยคลอเคลียเหมือนแมวเชื่องๆ แต่อย่าทำให้ผิดใจเชียว\r\n\r\nสิ่งที่คนที่เกิดวันที่2กลัวมากที่สุด คือความเหงา การต้องอยู่คนเดียวคิดคนเดียวทำคนเดียว บางทีแม้จะอยู่ ท่ามกลางเพื่อนก็ยังแอบนึกไปว่าเพื่อนไม่ไห้ความสนใจ ถ้าเพื่อนของท่าน เกิดวันที่2ก็อย่าแปลกใจเลยที่จะ เห็นว่าเพื่อนงอนเก่งขี้หึงและบางทีก็เจ้าอารมณ์เพราะนั่นเป็น เรื่องธรรมดา แต่เขาหรือเธอก็เป็นเพื่อนที่รัก ท่านมาก เพราะคนที่เกิดวันที่/ ชอบคบคน ...เค้าจะวนเวียนอยู่แต่กับเพื่อนเท่านั้น ');
INSERT INTO `horoday30` VALUES (3, 'วันที่3', '3', '', '', '', '', '', '', 'คนที่เกิดวันที่3ของทุกเดือน เป็นคนเฉลียวฉลาด มีความคิดสร้างสรรค์\r\n\r\nความคิดของคนที่เกิดวันนี้ไม่เคยหยุดนิ่ง\r\nและหากใครทำตามความคิดนั้นก็จะเป็นได้พบกับความสำเร็จในการสรรค์สร้าง สิ่งที่ดีขึ้นกว่าเดิม เป็นผู้นำทางความ คิดในการพัฒนาเหมาะมากสำหรับงานในตำแหน่ง ฝ่ายวางแผนและพัฒนา นอกจากจะมีความติดสร้างสรรค์แล้ว ยังมักคะเนเหตุการณ์ต่างๆ ข้างหน้าได้อย่างถูกต้องแม่นยำ ทั้งนี้มิใช่อาศัยโหราศาสตร์ แต่อาศัยความใฝ่รู้และดวง ปัญญา อันแจ่มใสมากกว่า\r\n\r\nคนเกิดวันที่3 มีเสน่ห์อยู่ที่ความเปิดเผย มีความคิดความเห็นอย่างไร ก็พูด ออกมาอย่างนั้นตรงๆ ไม่เคยเกรงว่าคน ที่ได้ฟังจะมีความรู้สึกอย่างไรต่อตนเอง ถ้าเห็นว่าสิ่งใด ไม่ถูกต้อง หรือแม้แต่ไม่ถูกใจก็จะพูดไปตามความรู้สึก ซึ่งบางครั้งหรือหรือบ่อยครั้งก็พูดแรงเกินไป และแสดงกิริยาไม่ชอบใจออกมาให้เห็นทีเดียว\r\n\r\nสิ่งที่คนเกิดวันที่3 ชอบมากที่สุดก็คือ การที่ได้อยู่ในกลุ่มของเพื่อนสนิทมิตรสหายได้คุยแลกเปลี่ยน ความเห็นกันอย่างเต็มที่และตรงไปตรงมา จะว่าคนเกิดวันนี้พูดเป็นแต่เรื่องจริงจัง ไม่มีเรื่อง โรแมนติคก็คงจะได้ แต่ที่จริงแล้วคนที่เกิด วันที่3 เป็นคนชอบความงามตามธรรมชาติ และความ แปลกใหม่ ถ้าท่านมีเพื่อนเกิดวันที่ 3 ท่านไม่ควรพาเค้าไปเที่ยวที่เก่า ไม่ควรสั่งอาหารชุดเดิม มาเลี้ยงเขา หรือเธอเป็นอันขาด เพราะสิ่งเก่า ๆ ขัดกับความคิดที่ไม่หยุดนิ่งของเขา ใครที่ชอบนัด ที่เก่าเวลาเดิม จะทำให้คนที่เกิดวันที่3เบื่อ\r\n\r\nคนที่เกิดวันที่3 ไม่ชอบให้ใครมากำกับ ให้ทำหรือไม่ให้ทำอย่างโน้นอย่างนี้ บางทีจะทำสิ่งที่ตรงกันข้าม กับข้อห้ามหรือ คำแนะนำ เหล่านั้น เพื่อเป็นการประท้วงไปเลยก็ได้ ...ในขณะที่คนเกิดวันที่3 เป็นคนรักเพื่อน ตรงไปตรงมาและ จริงใจกับเพื่อน รับผิดชอบการงานอย่างฉลาดและสร้างสรรค์ แต่ในความเป็นจริงก็เป็นเช่นนั้น ไม่ค่อยมีใครสนิท กับคนเกิดวันนี้นัก\r\n\r\nถ้าท่านมีเพื่อนที่เกิดวันที่ 3 จงให้ความจริงใจต่อคนผู้นั้นให้ความรักและเอาใจใส่ ท่านจะได้รับน้ำใจ ตอบสนองอย่างเพื่อนที่แสนดี หรือถ้าท่านรักกับคนที่เกิดวันที่3 ท่านก็จะได้เพื่อนที่ดีที่สุดเป็นคู่ชีวิต');
INSERT INTO `horoday30` VALUES (4, 'วันที่4', '4', '', '', '', '', '', '', 'คนที่เกิดวันที่4ของทุกเดือน เป็นคนที่มีความจริงใจต่อเพื่อน\r\n\r\nนอกจากมีความจริงใจต่อเพื่อนแล้ว คนที่4ยังต้องการความจริงใจจากเพื่อนเป็นผลตอบสนองด้วย คุณสมบัติประการต่อมาคือการเป็น คนรักการทำงาน เอาการเอางาน มีความรับผิดชอบเป็นเลิศ ที่สำคัญคือเป็นคนที่มุ่งมั่นใน การสร้างชีวิตให้มั่นคง การสร้างหลักฐานให้แก่ชีวิตของตนเองเป็น เรื่องสำคัญอย่างหนึ่งของชีวิต ดังนั้น คนเกิดวันนี้จึงทำงานหนัก เพื่อตอบสนองความหวังของตัวเอง\r\n\r\nคนเกิดวันที่4 เป็นคนที่รักเพื่อนมีความจริงใจต่อเพื่อน และความต้องการให้เพื่อนจริงใจด้วยนั้น บางทีรุนแรงไปจนถึงจุดที่เรียกร้องความสนใจจากเพื่อน หรือหึงหวงไปเลยก็มี และในขณะที่ คนเกิดวันที่4 เป็นคนเอางานเอาการทำให้บางครั้งถูกมองไปว่าเผด็จการ หรือเข้มงวดกับเพื่อนฝูง ได้ง่ายๆ แต่ลักษณะที่แสดงถึงความหึงหวง ความเข้มงวดบางอย่างก็ดี เป็นลักษณะที่บ่งบอกถึงความ จริงใจในการคบหากันมากกว่าที่จะเป็นจุดอ่อน\r\n\r\nคนที่เกิดวันที่4 มักเป็นคนที่ค่อนข้างระมัดระวังตัว มีความคิดรอบคอบ แต่คุณสมบัติประการนี้มิได้เป็นผลร้าย แก่เพื่อนฝูงที่สุจริตใจเป็นการสร้างกลไก ระมัดระวังตัวเท่านั้น เพราะคนเกิดวันนี้จะทุ่มเททุกอย่างให้กับคน ที่ตนเองเห็นว่ามีความจริงใจต่อกัน อย่างแท้จริง คนเกิดวันที่4 ถ้าคิดจะช่วยใครก็ช่วยจนหมดตัวสุดชีวิต\r\n\r\nในการคบเพื่อนที่เกิดวันที่4 นี้ ท่านต้องระมัดระวังพยายามหลีกเลี่ยงที่จะทำให้คนเกิดวันนี้โกรธหรือเกลียดท่าน เป็นอันขาด เพราะเค้าจะร้ายกาจกับคนที่ร้ายกาจด้วยอย่างที่ใคร ๆ ก็คาดไม่ถึงจริงๆและสิ่งที่คนเกิดวันที่ 4 เกลียดมากๆก็คือการที่รู้สีกว่าตัวเองถูกหลอกลวง แต่ถ้าท่านมีทุกข์หนักท่านควรไปหาคนที่เกิดวันที่4 เค้าจะเป็นห่วงและปลอบใจท่านอย่างจริงใจ ...ถ้าท่านจะรักเพื่อนที่เกิดวันที่4อย่างจริงใจแล้ว ท่านก็จะได้เพื่อนแท้ที่รักท่านอย่างจริงใจเช่นกัน ');
INSERT INTO `horoday30` VALUES (5, 'วันที่5', '5', '', '', '', '', '', '', 'เกิดวันที่ 5 :คน2บุคลิก\r\n\r\nถ้าคนที่คุณรักใคร่คบหาอยู่ขณะนี้เกิดวันที่5ของเดือนใดก็ตาม คุณก็ต้องตระหนักไว้ว่า คุณได้คบ กับคนที่มีลักษณะนิสัยสองอย่างอยู่ในตัวคนเดียว\r\n\r\nแต่นิสัยที่แท้จริงของคนที่เกิดวันที่5 ก็คือ การเป็นคนมองโลกในแง่ดี เป็นคนมีเหตุผล และยอมรับ ความเป็นจริงทุกอย่างที่เกิดขึ้น แต่จะไม่ยอมปล่อยชีวิตไปตามยถากรรม ถ้าจะเปรียบกับหัวหน้าทีมกีฬา เขาก็เป็นหัวหน้าทีม ที่ไม่เคยเสียใจถ้าทีมของเขาประสบความพ่ายแพ้แต่เขาก็จะรีบปรับปรุงทีมของเขา อย่างรีบเร่ง และพยายามเพื่อประสบความสำเร็จในครั้งหน้า\r\n\r\nคนเกิดวันที่5 จะเกลียดการถูกบังคับให้เป็นอย่างนั้นอย่างนี้ ถ้าเขารู้ตัวว่าถูกสั่งถูกบังคับ เขาจะมีปฎิกิริยา ในการต่อต้านขึ้นมาทันทีเช่นถ้าท่านมีลูกๆหรือแฟนเป็นคนที่เกิดวันที่ 5 แล้ว ท่านบอกเค้าว่า จงเลิกบุหรี่ เขาจะไม่มีทางยอมเลิกเป็นแน่ทั้งๆที่เขาเห็นด้วยกับคำพูดของคุณ คุณควรค่อยๆพูดกับเค้า เค้าก็จะยอมโดยดีแต่อาจต้องให้เวลากับเค้าสักหน่อยเพราะว่า คนที่เกิดวันนี้จะเป็นคนที่ต้องการทำตามใจ ที่ตัวเองอยากจะทำ ถ้าคนที่เกิดวันนี้เป็นเด็ก คุณก็ควรปล่อยให้เขาเล่นโลดโผนตามใจชอบ เพียงแต่คอย ดูแลเค้าห่างๆไม่ให้เกิดอันตราย ร้ายแรงก็พอ หากเค้าคนนั้นเป็นแฟนคุณหากต้องการเล่นกีฬาโลดโผน หรือลงทุนเสี่ยงทางธุรกิจ หากพอยอมได้ก็ควรยอม ถ้ายอมไม่ได้ท่านควรค่อยๆหว่านล้อมโดยไม่ใช้ วิธีชี้นำหรือสั่งมิฉะนั้น เค้าอาจเป็นศัตรูกับคุณก็ได้แม้จะรักกันมากเพียงใด อย่างไรก็ตามโดยปกติแล้วเป็นคนที่อ่อนหวาน และขี้เกรงใจและช่างเอาอกเอาใจอยู่แล้ว เขาจะดื้อต่อเมื่อถูก บังคับเท่านั้น\r\n\r\nคนที่เกิดวันที่นี้เป็นคนที่มีอารมณ์ทางเพศค่อนข้างสูงและชอบกิจกรรมทางเพศที่ประณีต เป็นคนกล้าได้กล้าเสียในเรื่องเพศสัมพันธ์ แต่เขาจะเป็นคนชอบเผด็จการในเรื่องนี้ ดังนั้นในเรื่องนี้คุณอย่าเผลอไปแนะนำอะไรเขา(หรือเธอ)เป็นอันขาดปล่อยให้เขามีความสุข แบบที่เขาต้องการจะดีที่สุด ');
INSERT INTO `horoday30` VALUES (6, 'วันที่6', '6', '', '', '', '', '', '', 'เกิดวันที่ 6 : เกิดมาเพื่อเป็นแม่บ้านพ่อเรือน\r\n\r\nสถานที่ๆเขารู้สึกว่าเหมือนวิมานก็คือบ้านอันอบอุ่นด้วยความรัก เด็กที่เกิดมาในวันที่6ในครอบครัวที่แตกร้าวจะเป็นเด็กที่น่าสงสารและจะโตขึ้นเป็นผู้ใหญ่ที่น่าสงสาร ด้วยเพราะคนที่เกิดวันนี้จะอยู่ไม่ได้ในที่ๆขาดความรัก คนที่เกิดวันนี้หากมาจากครอบครัวที่ไม่อบอุ่น เขาจะเทใจทั้งหมดให้คนที่หยิบยื่นความรักให้เค้าอย่างไม่ลังเลใจ\r\n\r\nคนที่เกิดวันนี้ค่อนข้างจะให้ความสำคัญกับคนที่เขารักเอามากๆแม้ว่าตัวเขาหรือเธอจะสวยหรือ หล่อมากแค่ไหนก็ตาม แต่เค้าและเธอก็จะไม่ค่อยมั่นใจตัวเองเรื่องความรักและเพศตรงข้าม เขาเกรงและกลัวว่า ถ้าเขาตัดสินใจผิดความรักก็จะหลุดลอยไป\r\n\r\nถ้าคุณเป็นผู้หญิงและมีแฟนที่เกิด วันที่6 คุณไม่ต้องสงสัย ว่าทำไมแฟนของคุณไม่กล้าแม้แต่จะแตะแขนของคุณ แต่อย่างไร คนที่เกิดวันนี้มักจะไม่ขาดเพื่อนต่างเพศเพราะเป็นคนที่หน้าตาดี รูปงาม นิสัยดี อ่อนหวานซื่อๆ และไม่คิดที่จะหักหลังต่อความรัก ที่คุณหยิบยื่นให้เลย แหมก็ขนาดคุณเค้ายังไม่ค่อยกล้าที่จะแตะมือ เลยแล้วจะกล้าไปจับมือใครกัน หากคุณได้คู่รักที่เกิดวันนี้คุณก็จะได้พ่อบ้านแม่เรือนที่อยู่กับเหย้า เฝ้ากับเรือน ในส่วนที่ไม่เกี่ยวกับความรักคนที่เกิดวันนี้เป็นคนที่มุ่งมั่นมานะ ใจคอหนักแน่นมั่นคง ไม่วอกแวก ไม่ว่าเรื่องใด เป็นคนที่ไว้ใจและพร้อมที่จะช่วยเหลือคนที่ตัวรักทุกวิถีทางนิสัยใจคอที่แท้จริงๆ จึงน่าจะเป็นครูบาอาจารย์ นักสังคมสงเคราะห์ เนื่องจากใจอ่อน รักเด็ก รักสัตว์เลี้ยง ถ้าได้มีอาชีพ ที่ว่านี้จะมีความเจริญ ก้าวหน้าได้ดี\r\n\r\nคนเกิดวันนี้ค่อนข้างปิดบังตัวเองในเรื่องรสนิยมทางเพศทั้งที่ความจริงตัวคุณเองเป็นไฟแต่มักจะ แสดงออก ในรูปของน้ำแข็ง ถ้าหากคุณเกี่ยวข้องสัมพันธ์กับคนที่เกิดวันนี้คุณควรต้องใช้ ความอ่อนโยนของคุณช่วย จุดไฟให้เขาหรือเธอ คุณควรเป็นฝ่ายนำแล้วเขาก็จะค่อยๆเกาะตามคุณ ไปได้เองและคุณไม่ต้องห่วงว่าเค้าจะ ตามไม่ทันเพราะผลสุดท้ายคุณอาจเป็นฝ่ายตามไม่ทันซะเอง\r\n	');
INSERT INTO `horoday30` VALUES (7, 'วันที่7', '7', '', '', '', '', '', '', 'เกิดวันที่ 7 ผู้มีสติที่อ่อนไหว\r\n\r\nลักษณะเด่นของคนที่เกิดวันนี้คือการแสวงหาประสบการณ์ในเรื่องต่างๆด้วยตัวเองชอบประสบการณ์ตรง มากกว่า ที่จะเรียนรู้จากคนอื่น แต่เป็นคนที่มีภูมิคุ้มกันตัวเองสูง ไม่ลุ่มหลงอะไรง่ายๆไม่ว่าจะเป็นเหล้า บุหรี่ ยาเสพติด การพนัน หรือแม้แต่เพื่อนต่างเพศ\r\n\r\nการที่คนเกิดวันที่7ไม่ลุ่มหลงอะไรง่ายๆ ย่อมเป็น ผลดีต่อการชอบลองของเขาเอง เพราะเขาจะเรียนรู้โดยไม่ติดสิ่งเหล่านั้น ถ้าท่านคิดว่าจะเอาตัวเอาใจ ของท่านไปให้เค้าทดลองเพื่อให้คนที่เกิดวันที่7หลงใหลในตัวท่านก็เป็นการคิดที่ผิดถนัด\r\n\r\nคนที่เกิดวันนี้โดยปกติเป็นคนที่มีศีลธรรมและมีเมตตาเป็นคนใจง่าย และซื่อตรงและค่อนข้างขี้สงสาร แต่สำหรับเรื่อง ที่เกี่ยวกับตนเอง คนเกิดวันนี้กลับไม่ค่อยแน่ใจตัวเอง มักจะขัดแย้งกับตนเอง หรือลังเลในสิ่งที่จะตัดสินใจอยู่บ่อยๆ โดยเฉพาะอย่างยิ่งการขัดแย้งในข้อที่จะว่า จะใช้ชีวิตอย่างไรดี ยึดกฎเกณฑ์หรือปล่อยตามใจตนเอง\r\n\r\nคนเกิดวันนี้เป็นคนที่อารมณ์อ่อนไหวง่าย ซึ่งเป็นลักษณะ ของคนชอบลอง เพราะถ้าใครชวนถูกหูแล้วจะให้ทำอะไรก็ ทำ เป็นคนตรงไปตรงมาเรื่องความคิด ถ้าเชื่ออะไรแล้วจะพูดออกไปโดยไม่ต้องคิดเลย โดยที่ไม่สนว่าจะไปขัดแย้งกับ ใครเป็นคนรักหมู่คณะ แต่ก็ค่อนข้างอวดตัวและถ้าหมู่คณะมอบหมายงานให้แล้วก็จะทุ่มจนชีวิต\r\n\r\nคนเกิดวันนี้ไม่ใช่คนที่ไม่เพียงพอในความรัก แต่เป็นคนที่มีความรักมากพอที่จะแจกจ่าย ให้ใครๆได้โดยไม่จบสิ้น ชอบคู่ครองที่เข้มแข็งใจกว้างพอที่จะให้เขามีเสรีในด้านความรักและ ไม่จุกจิก แต่เขาไม่ชอบให้ท่านมีรักที่เสรี เขาชอบให้ท่านรักเขาหรือเธอคนเดียว ');
INSERT INTO `horoday30` VALUES (8, 'วันที่8', '8', '', '', '', '', '', '', 'เกิดวันที่ 8 : Perfectionist\r\n\r\nลักษณะเด่นของคนที่เกิดวันนี้คือทุกๆอย่างต้องพร้อมหรือที่ชาวต่างชาติเรียกว่า Perfectionist ถ้าชีวิตของคนประกอบไป ด้วยความสุภาพ ความมั่นคงและความมีการศึกษาดีแล้ว คนที่เกิดวันที่8 ก็คือคนที่ขวนขวายหาสิ่งนี้มาเพื่อให้ชีวิตของเขา สมบูรณ์แบบ การแสวงหาความสมบรูณ์ของเขา อาจทำให้เพื่อนฝูงหรือคนรักต้องเหน็ดเหนี่อยไปด้วย คำว่า ทุกอย่างต้องพร้อม ของคนที่เกิดวันที่8\r\n\r\nถ้าสังเกตให้ดี คนที่เกิดวันนี้จะปรากฎตัวในที่สาธารณะต่อเมื่อมั่นใจว่าตัวเอง พร้อมเท่านั้น คนเกิดวันนี้ ตามปกติส่วนใหญ่จะไม่รับแขกโดยแต่งชุดตามสบาย\r\n\r\nถ้าท่านมีเจ้านายเกิดวันที่8 และจะเชิญ ไปเปิดงานตรวจงานท่านต้องเตรียมให้พร้อม มิฉะนั้นท่านอาจถูกตัดเงินเดือน เพราะเค้าก็จะขาดหวังให้คนที่อยู่รอบข้าง เตรียมพร้อมตลอดเวลา สมบรูณ์เสมอ นั่นล่ะ เค้าละคนที่เกิดวันที่ 8\r\n\r\nคนเกิดวันนี้มักมีสมองเป็นเลิศ ฉลาดหลักแหลมจนดูเหมือนมีเล่ห์เหลี่ยม ทั้งที่เป็นเพียงคนตรงต่อ กฎเกณฑ์เท่านั้น ความหลักแหลมทำให้มีความสามารถหลายด้าน เรียนหนังสือเก่ง ทำงานเก่ง ปรับตัวให้เข้ากับวิทยาการสมัยใหม่ ได้ดีและถึงแม้ว่าเขาเกิดคิดจะเป็นนักโหราศาสตร์ เขาก็จะเป็น นักพยากรณ์ชั้นเยี่ยม ในอีกด้านหนึ่ง\r\n\r\nคนเกิดวันที่8มีจิตใจอ่อนไหว รับรู้ความปรารถนาดี จากคนข้างเคียงได้ง่าย แต่จะเก็บความรู้สึกนี้ไว้ โดยใช้ความเข้มแข็งพรางตา เขาจะรับรู้ได้เองว่า ท่านรักใคร่ผูกพันตัวเขาหรือเธออยู่ ไม่ต้องบอกรัก และในคืนวิวาห์หรือเวลาอันเป็นส่วนตัว ท่านช่วยจัดบรรยากาศดีๆห้องสะอาด เตียงเรียบ ข้าวของ เป็นระเบียบแล้ว ท่านจะรู้สึกถึงความรักที่เขามีต่อท่าน เรื่องที่ควรปรับปรุงของคนเกิดวันนี้คือ การรับและการให้เพราะคนเกิดวันนี้บางครั้งจะมุ่งมั่นเพื่อความสมบรูณ์ มากเกินไปควรรู้จัก ลดความทะเยอทะยานลงบ้าง ');
INSERT INTO `horoday30` VALUES (9, 'วันที่9', '9', '', '', '', '', '', '', 'เกิดวันที่ 9 ผู้มีลักษณะของนักปราชญ์\r\n\r\nคนที่เกิดวันที่9 บ่งบอกถึงนักอนุรักษ์นิยมและลักษณะของนักปราชญ์ เป็นคนที่ท่าทางเคร่งขรึม สุภาพและขี้อาย และมีความวิตกกังวลเป็นนิสัยเป็นคนเอาจริงเอาจังต่อชีวิตและโลกมากเกินไป เป็นคนที่เห็นว่าการพักผ่อนเป็น เรื่องแปลกประหลาดหรือใหญ่โต แต่เห็นว่าการทำงานเป็นเรื่อง ที่ต้องทุ่มเทตลอดชีวิต\r\n\r\nที่น่าเป็นห่วงคือ เขาทำงานจนไม่รู้จักความสุขอีกด้านหนึ่งของชีวิต อันเป็นความสุขที่ได้จากการพักผ่อนหย่อนใจ ท่านจะไม่เห็น คนเกิดวันนี้ออกไปร้องรำทำเพลง กับใครบ่อยนักถ้านั่งในรถทัศนาจรประเภทฉิ่งฉับทัวร์ท่าจะไม่พบคนเกิดวันนี้ ออกไปตีฉิ่งฉับเลย\r\n\r\nคนเกิดวันที่9มีพรสวรรค์ในด้านการอธิบายหรือเล่าเรื่องต่างๆให้คนเข้าใจง่าย แต่การพูดการอธิบาย ของเขาดูเป็นจริงเป็นจังและไม่มีมุขตลกมากนักจึงเป็นการพูดการอธิบายของเขาดูจริงจังและไม่มี มุขตลกมากนัก จึงเป็นนักพูดที่ดีมีสาระจึงเป็นครูมีลูกศิษย์นิยมหรือเป็นนักพูดที่มีผู้คนยกย่องปกติ\r\n\r\nคนที่เกิดวันที่9ชอบอยู่คนเดียวเงียบๆ');
INSERT INTO `horoday30` VALUES (10, 'วันที่10', '10', '', '', '', '', '', '', 'คนที่เกิดวันที่10 เข้มแข็ง เด็ดขาดแกร่งกล้า\r\n\r\nคนที่เกิดวันที่10เป็นคนที่มีปัญหาบางอย่างมาตั้งแต่เด็กจะโดยรู้ตัวหรือไม่ก็ตาม แต่คตนเกิดวันนี้ จะรู้สึกว่าตัวเองอยู่คนเดียวในโลกบ่อยๆอาจเป็นเพราะว่าเมื่อเยาว์วัยต้องพลัดพรากจากครอบครัว ไปอยู่กับ ปู่ย่าตายายหรือะอาจเป็นลูกที่เกิดมาในช่วงที่ครอบครับเผชิญปัญหา ทำให้คนเกิดวันที่10 รู้สึกว่าตัวเอง ถูกทอดทิ้งและต้องอยู่คนเดียวในโลกแต่ก็ไม่ใช่คนประเภทอ่อนแอ ตรงกันข้ามกลับทำให้ เป็นคนเข้มแข็ง เด็ดขาดแกร่งกล้า กล้าตัดสินใจ กล้าที่จะพูดในสิ่งที่ต้องการกล้าสู้ กล้ายืนอยู่คนเดียว จนคนพากันมองว่า เป็นคนแสดงอำนาจและเจ้าอารมณ์\r\n\r\nแต่ถ้าคุณมีเพื่อนที่เกิดวันนี้คุณ จะเรียนรู้ได้ไม่ยากเลยว่าเขาหรือ เธอผู้นั้นจะเป็นคนเด็ดขาดขึ้นมา ต่อเมื่อรู้สึกว่าถูกรังแกหรือถูกดูถูก หรือถูกท้าทายเท่านั้น ถ้าคุณมีคู่รักหรือคู่ครองที่เกิดวันที่10 อย่าเผลอไปท้าทายให้เขาหรือเธอเลิกราฟ้องหย่าเป็นอันขาด เพราะคุณจะไม่มีวันได้เพชรเม็ดนั้นกลับมาอีกเลย\r\n\r\nคนเกิดวันนี้พร้อมที่จะก้าวขึ้นสู่ความเป็นเลิศด้วย ความเต็มใจในตัวเองเพราะเป็นคนฉลาดที่วางแผนทุกอย่างไว้ในใจได้รอบคอบและอดทนรอผลได้ อย่างใจเย็นเป็นคนที่เก็บปัญหา ต่างๆไว้ในใจได้ดี แม้แต่เพื่อนสนิทก็ไม่มีวันจะรู้จากปากของเขา หรือเธอว่าต้องการความช่วยเหลือแต่ไหน\r\n\r\nในเรื่องความรัก ถ้าคุณมีคนรักเกิดวันที่10คุณจะต้องรู้ว่าเขาหรือเธอจะอาทรห่วงหาคุณอย่างมาก แต่ความรักนั้นซ่อนเร้นอยู่ในใจของเขาหรือเธอเท่านั้น อย่างดีก็ปรากฎออกมาในสายตา ถ้าคุณรอ ให้เขาหรือเธอบอกรักรับรัก คุณต้องรอไปชาติหนึ่งเพราะคนเกิดวันนี้ไม่มีวันจะเอ่ยปากขอให้ใครมารัก และในเรื่องความสัมพันธ์ในฐานะคบคู่กับคุณก็เช่นกันคุณจะต้องสังเกตและตัดสินใจเองว่าควรเลือก แบบไหนคุณไม่ต้องถามแต่คุณจะต้องเสนอแบบที่ถูกใจเขาหรือเธอให้ได้ด้วยตนเองแล้วก็ไม่ต้อง ถามด้วยว่าชอบแบบนี้ไหม');
INSERT INTO `horoday30` VALUES (11, 'วันที่11', '11', '', '', '', '', '', '', 'เกิดวันที่ 11 คนอ่อนไหวที่ช่างฝัน\r\n\r\nคนที่เกิดวันที่11เป็นคนที่ต้องการเอาอกเอาใจมากกว่าวันที่เกิดวันที่อื่นๆเป็นคนซื่อตรง และปราศจากเลห์เหลี่ยมแต่ก็มักจะใจน้อยและเจ้าอารมณ์ดังนั้นจึงมักทำงานที่ต้องอดทน หรือมีรายละเอียดกวนใจมากเกินไปไม่ค่อยได้\r\n\r\nคนที่เกิดวันที่11 จึงไม่ชอบเป็นผู้บริหารราชการ ที่มีระเบียบมากมายจุกจิกแต่ชอบที่จะเป็นศิลปิน ซึ่ง สามารถสร้างสรรค์งานได้โดยจินตนาการและ อารมณ์ของตัวเองและด้วยเหตุที่เป็นคนมีจินตการแจ่มชัด มี อารมณ์อ่อนไหวช่างคิดช่างฝันนี้เอง จึงเป็นผู้ที่มีความสุขมากถ้ามีโอกาสได้ทำงานด้านประดิษฐ์ สร้างสรรค์ ถ้าคุณมีบุตรธิดา คนรัก หรือแม้แต่ผู้ใต้บังคับบัญชาอย่ามอบงานบริหารให้เลย มอบงานประดิษฐ์คิดค้นให้ดีกว่า คุณจะได้ประโยชน์และเขาหรือเธอจะมีความสุขด้วย\r\n\r\nคนเกิดวันที่11ค่อนข้างหัวแข็งในสายตารอบข้าง แต่ที่จริงเป็นคนที่เรียกว่าหยิ่งในตัวเองมากกว่า ว่ากันว่าถ้าตรวจ สอบวันเกิดกันได้คุณพจมาน สว่างวงศ์คงเกิดวันที่11 เพราะเป็นคนหยิ่งในศักดิ์ศรี ตัวเองมาก และถ้าอยากจะทำ ให้อ่อนน้อมนุ่มนวลได้เป็นอย่างดี ใครที่ทำให้คนที่เกิดวันนี้เกลียดหรือ หมั่นไส้ จะถูกโจมตีโดยไม่ทันตั้งตัว เลย แต่ก็เป็นไปเพื่อป้องกันตนเองเท่านั้น คนเกิดวันที่11 จะไม่ รุกรานผู้อื่นเลย\r\n\r\nและเมื่อพูดกันถึงเรื่องความรัก คุณคงไม่ต้องบอกรักคนที่เกิดวันนี้ก็ได้ ถ้าคุณสามารถทำตัวให้ เป็นคนที่เป็นเพื่อนกับคนเกิดวันนี้ได้ในทุกสถานการณ์เป็นกำลังใจในการทำงานให้แก่เขาหรือ เธอผู้นั้น ที่สำคัญ คือคุณต้องเป็นหลักให้เขาหรือเธอที่เกิดวันที่11 ได้ ในการเป็นผู้นำและตัดสินใจ ในเรื่องที่เขาหรือเธอไม่ชอบ ');
INSERT INTO `horoday30` VALUES (12, 'วันที่12', '12', '', '', '', '', '', '', 'เกิดวันที่ 12 คนเก่งมีความสามารถ\r\n\r\nคนที่เกิดวันที่12 เป็นผู้ได้พรจากพระเจ้าในเรื่องต่างๆเกือบทุกเรื่องเพราะไม่ว่าจะจับทำสิ่งใด ก็จะสำเร็จไปหมด อย่างน้อยก็ทำได้ดีในทุกเรื่อง เกิดมาเป็นคนเก่ง&bsp;มีความสามารถ ในการงานเป็นอย่างดี โดยนิสัยแล้วคนเกิดวันที่12เป็นคนเปิดเผย ตรงไปตรงมาและไม่ชอบ ถูกเอาเปรียบจึงต้องการเพื่อนที่คบกัน ด้วยความบริสุทธิ์ใจ ไม่หวังผลตอบแทน ต้องการเพื่อน ที่พูดคุยได้อย่างสนิทใจ เพียงแต่คุณมีความจริงใจ คุณก็จะเป็นเพื่อนที่ดีของคนเกิดวันที่12 ได้ไม่ยากเลย\r\n\r\nแต่คนที่มีเพื่อนเกิดวันที่12 ก็ต้องรู้ใจเพื่อนด้วยว่า คนเกิดวันนี้เป็นคนที่มีแต่ ความซื่อ พูดตรงไปตรงมาโดยไม่กลังใครจะว่าอย่างไร เมื่อคนที่เกิดวันนี้ต้องการจะตำหนิ ใครก็จะพูดด้วยถ้อยคำที่รุนแรง จนกระทั่งคนฟังรู้สึกว่าแรงเกินไป และเมื่อไม่พอใจใครหรือ อะไร ขึ้นมา คนที่เกิดวันนี้ก็จะแสดงให้รู้อย่างชัดเจนทีเดียวว่าไม่พอใจ\r\n\r\nคนเกิดวันที่12เป็นคนเก่งที่มีเพื่อนน้อย ทั้งที่เจ้าตัวเป็นคนรักเพื่อนและมีความสุขมากเมื่ออยู่ในกลุ่ม เป็นคนมีอารมณ์ ขัน และโต้ตอบคำพูดของคนอื่นๆได้อย่างคมคายแต่กลับมีเพื่อนน้อย หาเพื่อนสนิท ได้ยาก ดังนั้น ถ้าคุณเข้าไปอยู่ใน ฐานะเพื่อนสนิทได้ ในใจของคนเกิดวันที่12ก็จะมีแต่คุณคนเดียว วิธีที่จะทำให้คนเกิดวันนี้พอใจอย่างหนึ่งก็คือ การพาไปท่องเที่ยวตามสถานที่ต่างๆ รสนิยมของแต่ละคน ต่างกันไปบ้าง บางคนอาจชอบให้คุณพาไปเที่ยวป่าเขาลำเนาไพร บางคนอยากให้คุณไปดูหนังละคร กับเขาบ่อยๆ\r\n\r\nแต่ที่แน่ๆคือ คนที่เกิดวันที่12นี้เกลียดการจำเจ แม้แต่แต่งงานแล้วถ้าคู่ครองของคุณ เกิดวันที่12นี้คุณก็ต้องหาวิธีพากันไปเที่ยวนอก บ้านบ่อยๆ\r\n\r\nคนที่เกิดวันที่12ไม่ชอบการห้ามไม่ให้ทำอย่างโน้นอย่างนี้โดยไม่มีเหตุผลอันเห็นได้ชัดและเกลียด การห้ามเพราะ ความอิจฉาหรือเพราะกลัวว่าจะขัดผลประโยชน์ของคนห้าม ดังนั้นถ้าคุณมีคนรักเกิด วันนี้ แล้วคุณแสดงความหึงหวงหรือแสดงความเป็นเจ้าของ ความรักก็จะจบลงง่ายๆแค่นั้นที่จะเกี่ยวข้อง ');
INSERT INTO `horoday30` VALUES (13, 'วันที่13', '13', '', '', '', '', '', '', 'เกิดวันที่ 13 คนน่ารักที่อ่อนไหว\r\n\r\nคนที่เกิดวันที่13 เป็นคนน่ารักมากไม่ว่าโดยบุคลิกภาพภายนอกที่อ่อนหวานแช่มช้อย หรือภายใน จิตใจที่ซื่อตรง อ่อนโยน เมตตาปรานี และเต็มไปด้วยน้ำใสใจจริง คนเกิดวันนี้รับรู้ความดีง่าย ใจอ่อน และมักพอใจที่ ที่จะเอื้อเฟื้อผู้อื่นเป็นคนสนใจในการเรียนรู้และปฎิบัติธรรม\r\n\r\nคนเกิดวันที่13 เป็นคนที่ปราศจากเล่ห์เหลี่ยม มีความรับผิดชอบสูงต่อครอบครัว และหน้าที่การงาน (หาคนเกิดวันนี้ มาเป็นคู่เถิด) คนที่เกิดวันนี้ต้องการให้ชีวิตมั่นคงเป็นอันดับแรกดังนั้น จึงต้องทำงานหนัก และทำได้อย่างไม่ย่นย่อ ท้อถอย เป็นคนอดทนได้ที่จะรอผลอันยาวนาน คนเกิดวันที่13นี่แหละ คือพวกที่เป็นอย่างเพลงลูกทุ่ง ร้องเอาไว้ว่า ผัวตายเมื่อไรบอกด้วย แล้วพี่จะช่วยเลี้ยงลูกทุกคน\r\n\r\nคนเกิดวันนี้มีจุดอ่อนอยู่ตรงที่เป็นคนอ่อนไหวง่าย น้อยใจเก่ง คุณอาจเห็นน้ำตาของคนที่เกิดวันที่13 ได้บ่อยๆ นอกจากนี้คนที่เกิดวันนี้ก็ยังเป็นคนที่ชอบตัดสินใจตามผู้ใหญ่ เชื่อผู้ใหญ่มากกว่าตนเอง อาจเป็นเพราะได้อาศัยอยู่ใน ครอบครัวที่ดี ได้พึ่งพาอาศัยพ่อแม่มาตลอด พอมีปัญหาอะไร ก็วิ่งไปพ่อแม่ก่อนเสมอ\r\n\r\nคนที่เกิดวันที่13นี้อาจทุ่มเทความรักให้กับใครก็ได้(อาจเป็นคุณ)ถ้าคุณได้พิสูจน์ให้คนเกิดวันที่13 ได้ประจักษ์ว่า คุณมี ความจริงใจกันอย่างแท้จริง คนเกิดวันที่13นี้ถือว่าน้ำใจไมตรีมีค่าสูงที่สุดถ้าเขา หรือเธอรักคุณ แล้วก็จะรักจนสุดหัวใจ และจะรักอยู่อย่างนั้นไปจนตลอดชีวิต แม้คุณจะ(บังเอิญ)แต่งงาน ไปแล้วก็ตาม และอย่าทำให้คนวันนี้โกรธเชียวหรือไม่พอใจมากๆคุณจะรู้ทันทีว่าคารมของคนที่เกิดวันนี้ ร้ายกาจมากกว่าสิ่งใด ');
INSERT INTO `horoday30` VALUES (14, 'วันที่14', '14', '', '', '', '', '', '', 'คนที่เกิดวันที่14เป็นคนอ่อนหวานขี้เกรงใจ\r\n\r\nซึ่งเป็นลักษณะที่คุณเห็นได้จากภายนอกและเป็นคนที่มี ความซื่อสัตย์ อยู่ภายใน ดังนั้นจึงเป็นคนที่น่ารักน่าคบ แต่คุณต้องรู้ไว้ด้วยว่าความเป็นคนซื่อสัตย์, ขี้เกรงใจ,ช่างเอาอกเอาใจ และช่างเอาอกเอาใจ มีอยู่เฉพาะเมื่อคุณปล่อยให้คนเกิดวันนี้มีความสุข ตามแบบที่เขาหรือเธอต้องการ เท่านั้น ถ้ามีใครมาสั่งให้ทำอย่างนั้นอย่างนี้คนที่เกิดวันที่14จะหงุดหงิด พลุ่งพล่านขึ้นมาทันที คนอ่อนหวานน่ารักช่างเอาอกเอาใจของคุณจะกลับกลายเป็นแม่เสือที่ดุร้าย ดื้อรั้นเอาแต่ใจตัวขึ้นมาทันที\r\n\r\nคนเกิดวันที่14เป็นคนมีอำนาจใจตนเอง มีพลังใจสูงสามารถจูงใจตนเองให้ทำอย่างจนสำเร็จได้ดัง ประสงค์ มีอำนาจ ลึกลับที่จูงใจตนเองให้ทำตามอย่างที่ตนต้องการ มักได้รับอำนาจที่คนอื่นรับรู้ได้ คนเกิดวันนี้หากมีอำนาจจึงมักเอา แต่ใจตนเองหรือชอบเผด็จการ แต่จุดอ่อนอันเกิดจากความมี อำนาจ และชอบใช้อำนาจนี้ก็จะถูกลดลงไปโดยนิสัยที่ เป็นคนมองโลกในแง่ดี ใจกว้าง มีเหตุผล ยอมรับความเป็นจริงที่เกิดขึ้นทั้งทางด้านดีและด้านร้าย เป็นคนเข้าใจ ความเป็นกายได้ง่าย และยอมรับความเป็นไปได้ในเรื่องต่างๆเป็นอย่างดี ซึ่งคุณลักษณะเช่นนี้ทำให้การใช้อำนาจ ของคนเกิดวันที่14เป็นไปอย่างมีเหตุผลและนุ่มนวลขึ้น\r\n\r\nทำให้คนเกิดวันที่14 รักคุณได้ง่ายๆด้วยการสนับสนุนความสุขของคนเกิดวันนี้ตามแบบที่เขา หรือเธอต้องการ(ถ้าคุณยอมรับได้) เปิดโอกาสให้แสดงออกหรือได้ทำในสิ่งที่เขาหรือเธอต้องการ เป็นต้นว่าถ้าเขาหรือเธอชอบเล่นเทนนิส ก็หาทางส่งเข้าแข่งขันชิงถ้วยอะไรไปเลย หรือว่าถ้าเธอ หรือเขาชอบเล่นดนตรี ก็หาโน้ตเพลงหาเครื่องดนตรีมาให้แล้ว ก็จัดคอนเสิร์ตเปิดตัวให้รู้แล้วรู้รอด ไปเลย ');
INSERT INTO `horoday30` VALUES (15, 'วันที่15', '15', '', '', '', '', '', '', 'คนที่เกิดวันที่15 คนที่คุณจะเห็นง่ายแต่รู้จักยาก\r\n\r\nเพราะภายนอกดูเป็นคนร่าเริง รักความมีอิสระเสรีชอบ\r\nแสดงให้เห็นว่าเป็นคนมีความกร้าวแกร่ง จนแม้บางครั้งจะต้องทำอะไรแผลงๆ เพื่อให้ดูเก่งในสายตาเพื่อนๆ ก็ตาม\r\n\r\nสิ่งที่ปรากฎภายนอกคนเกิดวันที่15จึงมักเป็นภาพของคนที่ ชอบอยู่กลางแจ้ง ชอบการผจญภัย ชอบแสดง เด่น เป็นนักกีฬานักแข่งขัน นักทำงานเสี่ยงอันตราย แต่ในลักษณะที่เป็นอุปนิสัยภายใน คนเกิดวันนี้เป็นคนที่ใจอ่อน อ่อนไหวง่าย สงสารคนง่าย ขี้งอน และซ่อนความอ่อนหวานน่ารักไว้ภายใน มีความรักบ้านและครอบครัว เป็นคนขี้อ้อนและต้องการ คนเอาใจที่ปกปิด จิตใจของตนเองด้วยการแสดงออกให้คนอื่นเห็นว่าเป็นคนกร้าวแข็ง\r\n\r\nน้ำใจของคนที่เกิดวันที่15 เป็นน้ำใจที่ประเสริฐ เพราะเป็นคนที่รักครอบครัว รักบ้านมีความรับ ผิดชอบในสิ่งที่ได้กระทำลงไปเป็นอย่างดีเป็นคนที่มีน้ำใจรักหมู่คณะและพร้อมที่จะทำทุกอย่าง เพื่อส่วนรวมได้โดยไม่ลังเล รีรอ นอกจากนั้น ยังมีคุณสมบัติพิเศษในด้านความคิดริเริ่มและมี พรสวรรค์ในการประดิษฐ์คิดค้นอีกด้วย\r\n\r\nคนเกิดวันนี้จึงเป็นคนแปลกตรงที่ว่าข้างนอกดูเข้มแข็ง และง้อใครไม่เป็น แต่ความจริงกลับต้องการให้คน มารัก มาเอาใจมากๆยิ่งถ้าตอนไหนต้องอยู่ คนเดียว แล้วก็ยิ่งต้องการเพื่อน ต้องการคนรักคนเอาใจมากขึ้นไปอีก คุณคงรู้แล้วว่า จะเริ่มต้นและสานต่อความรักกับคนเกิดวันที่15ได้อย่างไร ยอมรับความเด่น ที่เขาหรือเธอแสดง ออกทุกอย่างเมื่ออยู่ต่อหน้าผู้คน และเมื่อคุณอยู่ด้วยกันอย่างเป็นส่วนตัวแล้ว คุณเติมความอ่อนหวาน ความเป็นคน ช่างรู้ใจของคุณเข้าไปอีกนิดหน่อย ทำตัวเป็นที่พึ่ง ที่ปรึกษาและร่วมทุกข์ร่วมสุขอยู่เงียบๆคนเกิดวันที่15ก็จะเกาะ อยู่กับคุณตลอดไป ');
INSERT INTO `horoday30` VALUES (16, 'วันที่16', '16', '', '', '', '', '', '', 'เกิดวันที่ 16 : ชอบแสวงหาประสบการณ์\r\n\r\nคนเกิดวันนี้เป็นคนเห็นชีวิตมีค่า แต่คิดว่า จะต้องใช้ชีวิต ให้คุ้มค่า ดังนั้นจึงชอบทำอะไรที่เป็นการโลดโผนผจญภัยแต่ได้รสชาติแปลกใหม่ สำหรับชีวิตแม้จะเป็น เรื่องที่ต้องเรียนรู้ด้วยชีวิตเช่นยาเสพติด การพนัน เกมส์กรีฑา คนเกิด วันที่16ก็ไม่ลังเลที่จะเรียนรู้ ดังนั้น คุณอย่าตกใจเมื่อพบใครสักคนที่ลองทุกอย่างจนดูเหมือน คนชั่วคนเกเร แต่คุณอย่าห่วงเลยคนเกิดวันที่16 ไม่ลุ่มหลงอะไรง่ายๆไม่ว่าจะเป็นเหล้า,ยาเสพติด หรือเพื่อนต่างเพศ\r\n\r\nที่จริงแล้วคนเกิดวันที่16เป็นคนมีศีลธรรม เข้าใจเห็นใจเพื่อนมนุษย์และชอบ ช่วยเหลือ ผู้คนที่กำลังมีปัญหาเป็นคนมีความจริงใจและรักคนที่จริงใจตอบ เป็นคนที่ชอบคาดการณ์ ล่วงหน้าและมีพรสวรรค์ในการคาดการณ์ด้วย\r\n\r\nคนเกิดวันที่16เป็นคนตรงไปตรงมาและมีกฎเกณฑ์ แต่กฎเกณฑ์ที่ว่ามักเป็นกฎที่เขาคิดและตั้งขึ้น เองว่าอะไรผิดอะไรถูกอะไรควรทำอะไรไม่ควรทำ และเมื่อตั้งกฎเกณฑ์ขึ้นมาแล้วก็ทำไปตามนั้น โดยไม่สนใจว่าจะ ขัดแย้งกับใคร\r\n\r\nคนเกิดวันนี้มีความรักแจกจ่ายเหลือเฟือ คุณต้องเข้าใจข้อนี้และต้องยอมรับธรรมชาติข้อนี้ก่อนที่จะรัก กับคนเกิด วันที่16 ซึ่งถือว่าความรักเป็นประสบการณ์อย่างหนึ่งที่ต้องแสวงหา คนเกิดวันที่16ต้องการ รักคู่ครองที่แท้จริง รักอิสระเสรีและพึ่งตัวเองได้ อยู่ได้โดยไม่มีกันและกัน และอยู่อย่างมีความสุข เมื่อมีกันและกัน แต่แปลกเมื่อถึงจุดหนึ่งของการใช้ชีวิตคู่แบบเสรีนี้เองคนเกิดวันที่16 ก็จะกลับมาเป็นคนขี้หึงเอาดื้อๆ ');
INSERT INTO `horoday30` VALUES (17, 'วันที่17', '17', '', '', '', '', '', '', 'คนเกิดวันที่17 เป็นคนที่มีความสามารถสูง เป็นคนฉลาดและมีไหวพริบ\r\n\r\nดี มีบุคลิกลักษณะอันเป็นผู้นำที่ผู้คน เชื่อถือ มีความสามารถเป็นอย่างดีในการโน้มน้าวจิตใจคน ใช้คน และบริหารงานด้าน บุคคล แก้ปัญหาเก่ง โดยเฉพาะอย่างยิ่ง ความสามารถในการแก้ปัญหาเฉพาะหน้า\r\n\r\nคนเกิดวันนี้ จึงมักได้รับความนับถือว่าเป็นหัวหน้า เป็นที่พึ่งของคนในกลุ่มนี่เป็นกายภาพภายนอกเมื่อมองห่างๆ เมื่อมองใกล้เข้าไป ก็จะเห็นได้อีกว่าคนเกิดวันที่17ไม่สู้จะคงเส้นคงวานัก บางครั้งก็เข้มแข็ง เด็ดเดี่ยวและดูเอา จริงเอาจังกับชีวิต แต่บางครั้งบางคราวก็เป็นคนอ่อนไหวง่าย เจ้าอารมณ์ นุ่มนวลเห็นอกเห็นใจ บางคราวดู เหมือนมีเล่ห์เหลี่ยม\r\n\r\nคนเกิดวันนี้เป็นคนที่ปรารถนาในชีวิตค่อนข้างสูง ทุกสิ่งทุกอย่างของคนเกิดวันนี้ต้องสมบูรณ์ และคนเกิดวันนี้ จะพยายามอย่างมากที่จะสร้างความสมบรณ์ในชีวิต สุขภาพดี มีปัญญา มีทรัพย์ มีคู่ครองที่ดีเลิศ ดังนั้นจึง ต้องทำงานหนักเพื่อให้ได้สิ่งเหล่านี้มา\r\n\r\nจุดอ่อนของคนที่เกิดวันนี้คือโดยปกติจะใช้ชีวิตแบบเรียบง่าย แต่จะ เปลี่ยนเป็นคนเครียด หรือเอาแต่ใจตัวเองขึ้นมาเมื่อไรก็ได้ คนที่อยู่ด้วยหรือเป็นเพื่อนสนิท จึงต้องคอยปรับตัวปรับใจ อยู่เสมอ\r\n\r\nและจุดอ่อนอีกประการหนึ่งก็คือคนเกิดวันนี้มักเป็นคนประเภทเล็งผลงานมากกว่ามุ่งความ สัมพันธ์กับผู้คน ดังนั้นคนที่สนิทควรต้องคอยดูแลช่วยเหลือเรื่องมนุษย์สัมพันธ์ของคนที่เกิดวันที่17 จุดดีของคนที่เกิดวันนี้คือเมื่อแต่งงานมีครอบครัวไปแล้วความอ่อนไหวแปรปรวนของอารมณ์จะลดลง ไปมาก เป็นคนที่คงเส้นคงวามากขึ้น มีมนุษย์สัมพันธ์ที่ดีขึ้น ');
INSERT INTO `horoday30` VALUES (18, 'วันที่18', '18', '', '', '', '', '', '', 'เกิดวันที่18 ผู้แสวงหาความรู้\r\n\r\nถ้าเกิดวันที่18 คุณอาจค้านคำทำนายนี้แต่ถ้าคุณใกล้ชิดกับคนที่เกิดวันที่18คุณอาจเห็นด้วย มากๆเลยทีเดียว คนเกิดวันนี้เป็นคนชอบแสวงหาความรู้และความจริงของชีวิตตลอดเวลา เป็นคนเอาจริงเอาจังต่อชีวิตมากเกินไป จนต้องอารมณ์เสียเสมอ หงุดหงิดง่ายและไม่เคยพอใจ ตนเองเลย บ่อยครั้งที่รู้สึกรำคาญตัวเอง และไม่เคยพอใจ ตนเองเลยบ่อยครั้งที่รู้สึกรำคาญตัวเอง และรู้สึกที่ตัวเองไม่ได้ดังใจ เป็นคนที่หาอะไรมาทำอยู่ได้โดยไม่ชอบพัก ผ่อน กังวลเก่ง จนเครียด และมักนอนไม่หลับบ่อยๆ\r\n\r\nคนเกิดวันนี้เป็นคนที่ละเอียดอ่อนและสนใจในรายละเอียดต่างๆจนคนอยู่ใกล้เห็นเป็นเรื่องขบขัน หรือบางทีก็ รำคาญไปเลย คนเกิดวันที่18จึงเป็นคนที่ใครๆพากันเห็นว่า เคร่งครัดเกินไป\r\n\r\nจุดเด่นของคนที่เกิดวันนี้มีอยู่ไม่น้อย แม้ว่าจะเป็นคนอารมณ์ปรวนแปรง่าย และอาจเป็นคนขี้อิจฉา ก็ตาม จุดดีที่ว่านี้เป็นคนเต็มใจที่จะให้คำแนะนำช่วยเหลือผู้อื่นอย่างเต็มที่ ประกอบกับมีความสามารถ ในการพูดการอธิบาย หรือการโน้มน้าวใจคน จึงทำให้มีคนไปมาหาสู่ด้วยเสมอในฐานะที่ปรึกษา และจุดเด่นอีกอย่างหนึ่งก็คือ รับผิดชอบสูงต่อคนรัก ถ้ารักใครแล้วจะทุ่มให้อย่างเต็มที่ทั้งร่างกาย ชีวิต และจิตใจ และก็หวังจะได้รับความรักตอบแทนเต็มที่เช่นแต่ว่าก็ว่าเถอะ\r\n\r\nคนที่เกิดวันนี้ความหวังที่จะได้ รับความรักตอบแทนมักล้มเหลว ความดีที่คนที่เกิดวันที่18 มักได้รับ การตอบแทนกลับมาในรูปของความนับถือ เสียเป็นส่วนใหญ่ ใครๆที่คบกับคนเกิดวันนี้ มักอยาก ให้คนที่เกิดวันนี้เป็นพี่ชาย พี่สาวมากกว่าอยากได้ไว้เป็นคู่รัก ถ้าคุณเกิดนึกรักคนเกิดวันนี้ขึ้นมาจริงๆ คุณก็ต้องเป็นคนเป็นระเบียบเรียบร้อยในทุกโอกาสทุกกรณี พยายามหาวิธี ทำให้คนเกิดวันนี้มั่นใจ และกังวลน้อยล โดยรับภาระบางอย่างไว้เสียบ้าง ');
INSERT INTO `horoday30` VALUES (19, 'วันที่19', '19', '', '', '', '', '', '', 'เกิดวันที่ 19 : มี3กำลังภายใน\r\n\r\n\r\n\r\nกำลังภายในที่คนเกิดวันที่19มีอยู่นั้น มีถึงสามประการคือ กำลังความมานะพยายาม กำลังความ เมตตา และกำลังสติปัญญา คนเกิดวันนี้เป็นคนที่มีความมานะพยายามสูงมาก อดทนไม่ย่อท้อต่อ ความยากและอุปสรรคไม่ว่าจะรุนแรงเพียงใด คนเกิดวันนี้มีพลังสติปัญญาที่จะนำเอาความรู้ความสามารถประสบการณ์ที่มีอยู่ออกมาใช้ได้อย่าง เต็มที่ และทรหดอดทน ทั้งเป็นคนหนักแน่นไม่สะดุ้งสะเทือนต่อสิ่งใดทั้งสิ้น คนเกิดวันอื่นที่เป็น นักสู้อาจต้องการกำลังใจจากคนอื่น แต่คนวันนี้เขามีกำลังใจให้กับตัวเอง อย่างเต็มเปี่ยมอยู่เสมอ ทีเดียว เป็นนักสู้ที่สู้ได้ทั้งประเภทเดี่ยว และประเภททีมนี่เป็น กำลังภายในประการแรก ที่มีอยู่ในตัวคนเกิดวันที่19\r\n\r\nกำลังภายในประการที่2ของคนเกิดวันที่19 คือความเมตตา คนเกิดวันนี้เป็นคนที่มีความเมตตาสูง ความเมตตาคือ ความรู้สึกต่อคนอื่นเหมือนรู้สึกต่อตนเอง รักคนอื่นเหมือนรักตัวเองมีอยู่ในตัวคน เกิดวันนี้อย่างเต็มเปี่ยม มี ความเห็นอกเห็นใจคนที่อ่อนด้อยกว่า ถ้าเป็นครูบาอาจารย์ก็สอน ลูกศิษย์ด้วยความอดทนต่อความร้ายกาจต่างๆ ของลูกศิษย์ เป็นเพื่อนที่เห็นอกเห็นใจเพื่อน และเป็นที่พักพิงใจที่ดีสำหรับคนรักที่หัวใจร้าวรานมาก่อนที่จะได้พบ กับคนเกิดวันที่19 และที่สำคัญถ้าเขาเป็นคนรักหรือคู่ครองของใครแล้ว เขาจะรับผิดชอบต่อคนรัก เขาจะรับผิดชอบ ต่อคนรักและครอบครัวอย่างดีเยี่ยม\r\n\r\nกำลังภายในประการที่3ของคนเกิดวันที่19ก็คือความ เป็นผู้มีระดับสติปัญญาสูง มีปฏิภาณไหวพริบดี ว่าที่จริงคนที่ เกิดวันนี้เป็นคนฉลาดหลักแหลมและมักรู้ได้ว่าจะทำตัวให้ได้เปรียบคนร่วมงาน ได้อย่างไร แต่เขาไม่ทำเพราะเป็น คนมีเมตตาเป็นคุณธรรมอยู่แล้ว ความมีสติปัญญาและปฏิภาณ ไหวพริบของเขาจึงใช้เพียงเพื่อทำความสำเร็จให้แก่ ตัวเอง และป้องกันการรังแกของคนอื่นเท่านั้น ไม่ได้ใช้เพื่อรังแกคนอื่น คนที่มีสติปัญญาเฉียบแหลม มีมานะพยายาม มีเมตตาเป็นคุณธรรมอย่างนี้ ถ้าใครพบแล้วปล่อยให้ผ่านไปก็เป็นเรื่อง น่าเสียใจนะเนี่ย จุดด้อยของคนที่เกิดวันที่19ก็มีอยู่อารมณ์ของตัวเองซึ่งแปรปรวนไปได้บ่อยๆ แต่ด้วยสาเหตุเดียว เท่านั้นคือความหึงและมักจะหึงอย่างไม่มีเหตุผลด้วย....แต่คนเกิดวันนี้เป็น คนดีที่รักครอบครัว มากนะครับ ');
INSERT INTO `horoday30` VALUES (20, 'วันที่20', '20', '', '', '', '', '', '', 'เกิดวันที่ 20 : คนเก่งที่อารมณ์แปรปรวน\r\n\r\nลักษณะนิสัยของคนเกิดวนนี้ดูเหมือนจะเป็นลักษณะที่ค่อนข้างจะอ่อนไหวง่าย อารมณ์ปรวนแปร บางวัน อาจชอบท่านอย่างมากมาย แต่โดยที่ท่านยังไม่รู้สาเหตุเขาอาจไม่ชอบท่านแล้วก็ได้ และเมื่อถามไถ่กันถึงสาเหตุ อาจได้คำตอบซึ่งตอบมาอย่างจริงใจว่า ก็ไม่รู้เหมือนกัน แล้วก็กลับ มาชอบท่านอีก\r\n\r\nคนเกิดวันนี้เป็นคนค่อนไปในทางเจ้าอารมณ์ แต่ก็มักรู้ตัวเองจึงต้องระมัดระวัง อารมณ์ตัวเองอยู่เสมอ จนกระทั่ง ค่อยๆเกิดเป็นความกดดันภายใน อารมณ์จึงแปรปรวนได้ง่าย จึงปรากฎบุคลิกภาพในทำนองที่ว่า โดยปกติจะเป็นคนสุภาพเรียบร้อย น่ารักอ่อนหวานและผ่อนปรน แต่ถ้าเกิดความกดดันจนยับยั้งชั่งใจไม่อยู่ก็จะระเบิดอารมณ์ออกมาราว ภูเขาไฟ ที่กล่าวอย่างนี้ ทำให้ดูเหมือนว่าคนเกิดวันนี้ มีอารมณ์อ่อนไหวเป็นจุดด้อยที่สำคัญและน่ากลัว ที่จริงแล้วมิใช่ เช่นนั้น ตามปกติเมื่อพูดถึงคนเกิดวันที่ต่างๆ19วันที่ผ่านมามักเริ่มต้นด้วยการพูดในจุดเด่นก่อน แต่วันที่20นี้คนเขียน เกิดอารมณ์แปรปรวนขึ้นมาก็เลยหยิบด้านอ่อนด้อยขึ้นมาพูดก่อนเท่านั้น\r\n\r\nที่จริงแล้วคนเกิดวันที่20นี้เป็นคนเก่ง ( ม.ร.ว.คึกฤทธิ์ ปราโมช เป็นคนหนึ่งที่เกิดวันที่20 ) คนเกิดวันนี้มักมีมันสมอง เป็นเลิศ ฉลาดรู้ทันเล่ห์เหลี่ยมของคนอื่น และลึกซึ้งพอที่จะทำเป็นรู้ ไม่ทันเพื่อตลบหลังศัตรูอีกด้วยซ้ำ เป็นคนที่ มีความสามารถรอบด้าน รอบรู้ในปรัชญา การเมือง การเศรษฐกิจ ทำธุรกิจเก่ง เขียนหนังสือก็ดี วิทยาการสมัยใหม่ ก็เยี่ยมยอด แถมยังมีน้ำใจกว้าง ขวางในเรื่องความรู้ความคิด พร้อมที่จะให้ความคิดเห็น คำแนะนำ ความรู้แก่ใครก็ตามที่ถูกใจ และกล้าเข้าไปขอคนเกิดวันที่20เป็นคนชอบมีเพื่อนฝูงจะมีความสุขถ้าได้อยู่กับเพื่อน โดยเฉพาะ อย่างยิ่งเพื่อนที่เข้าใจอารมณ์ และรู้จัก ความสามารถของเขา ยิ่งถ้ามีความรู้ความสามารถในระดับ เดียวกันแล้วจะยิ่งชอบเป็นพิเศษ\r\n\r\nถ้าท่านพบคนเกิดวันที่20และนึกพอใจถูกใจแล้ว ท่านต้องเรียนรู้วิธีที่จะเข้าใจอารมณ์ของเขา และต้องทำตัวเป็นผู้แสดง ความยอมรับความสามารถของเขาอย่างถูกจังหวะ ไม่ใช่หัวประจบ คนเกิดวันที่20อาจมีอารมณ์รุนแรงไปบ้างในบาง ครั้ง แต่ถ้าคบกันนานๆและเข้าใจกันขึ้นเรื่อยๆ ท่านจะพบว่า คนเกิดวันเป็นคนที่น่าคบและพร้อมที่จะเป็นหลักพัก พิงหัวใจรักของคุณได้ดี ');
INSERT INTO `horoday30` VALUES (21, 'วันที่21', '21', '', '', '', '', '', '', 'เกิดวันที่21 มีเสน่ห์ สร้างมิตรภาพ\r\n\r\nคนเกิดวันที่21เป็นคนที่ใครๆถ้าได้สัมผัสใกล้ชิดหรือแม้เป็นเพื่อนร่วมงานด้วยก็จะรู้สึกในความ นุ่มนวลเจ้าเสน่ห์น่าคบ ได้เป็นอย่างดี เพราะคนเกิดวันนี้เป็นคนง่ายๆคบใครก็ทำตัวเรียบง่าย เสมอหน้ากันหมดทุกคนทุกระดับขั้น ความสามารถ พิเศษของคนที่เกิดวันนี้ก็คือความสามารถ ในการปรับตัวให้เข้ากับสถานการณ์ และความสามารถในการแก้ไขสถานการณ์ ตึงเครียดลงได้ ด้วยความนุ่มนวลที่มีอยู่ในตัว คุณสมบัติยอดเยี่ยมอีกอย่างหนึ่งคือ การเก็บซับรายละเอียดต่างๆ อย่างรอบคอบตลอดเวลา เมื่อถึงเวลาตัดสินใจก็ทำได้รอบคอบถูกต้องซึ่งจุดนี้เป็นเรื่องสำคัญ สำหรับคนที่มีเพื่อนเกิดวันที่21 ควรรู้เพราะถ้าจะเสแสร้งเพื่อให้ถูกใจคนเกิดวันนี้ได้ยาก ท่านจะถูกสังเกตอยู่เสมอโดยไม่รู้ตัวว่ากำลังถูกสังเกต\r\n\r\nคนที่เกิดวันนี้ มีพรสวรรค์ในการสร้างมิตรภาพ มีวิธีการที่แนบเนียนและนุ่มนวลในการทำความ รู้จักกับคนอื่นๆยิ่งเมื่อ ประกอบกับนิสัยร่าเริงสนุกสนาน เป็นคนง่ายๆเข้ากับคนได้ทุกระดับชั้น ด้วยแล้วคนเกิดวันนี้จึงเป็นคนมีมิตรสหายมากมาย\r\n\r\nคนเกิดวันนี้แม้จะชอบพูดถึงความสามารถ ที่ตนเองมีอยู่บ้างเหมือนกับคนที่เกิดวันอื่นๆก็ตาม แต่ก็จะไม่พูดโอ้อวดเกินจริง และที่สำคัญ คนที่เกิดวันนี้จะไม่ยกคนข่มคนอื่นเป็นอันขาด และเขาไม่ชอบคนที่ข่มคนอื่นด้วย จึงเป็นคน ที่ทำให้คนที่ รู้จักรู้สึกสบายใจและปลอดภัยเมื่อได้พูดคุยด้วย แล้วท่านจะหลีกเพื่อนที่ดีน่ารัก เช่นนี้ไปได้อย่างไร?\r\n\r\nคนเกิดวันที่21เข้าใจคน เห็นอกเห็นใจและเป็นคนช่างเอาใจและมีจิตสำนึก คือมีความรู้สึกนึกคิด ในทางที่ดีงามเสมอ เมื่อมี ปัญหาใดๆก็พอใจที่จะเข้าไปแก้ปัญหาด้วยการเจรจาอย่างนุ่มนวลแบบ นักการฑูตมากกว่าที่จะใช้วิธีการที่รุนแรง แต่คนที่เกิดวันนี้เมื่อถึงคราวจะต้องใช้ความเด็ดขาด รุนแรงขึ้นมาก็จะใช้ได้อย่างเฉียบขาด และเฉียบคมมีคำพูดที่เชื่อดเฉือนหัวใจยิ่งกว่าที่เรียกว่า ใบมีดโกนอาบน้ำผึ้งซะอีก\r\n	');
INSERT INTO `horoday30` VALUES (22, 'วันที่22', '22', '', '', '', '', '', '', 'คนเกิดวันที่22 มีบุคลิกภาพที่ซ้อนกันอยู่\r\n\r\nแต่ถ้าสังเกตดีๆแล้วก็จะพบว่า นิสัยที่แท้จริงของคนเกิด วันนี้คือ ความคงเส้นคงวาที่ซ่อนอยู่ภายในความอ่อนไหวเปราะบาง แต่เมื่อดูภายนอกจะเห็นว่า เมื่อเผชิญกับ สถานการณ์ที่เปลี่ยนไปจะมีปฏิกิริยาตอบสนองในทันที จึงจำเป็นที่จะต้องมีคน มาประคับประคองให้กำลังใจปลอบใจ\r\n\r\nคนเกิดวันนี้เมื่อผิดหวังจะแสดงความเสียใจทันที แต่จะค่อยๆรับฟังเหตุผล ทบทวน ไตร่ตรองตามความเป็นจริง รับฟังคำวิพากษ์วิจารณ์แยกแยะ ปัญหา แล้วก็จะค่อยกลับคืนมาทำใจยอมรับ ความเป็นจริง เรียกความมั่นใจกลับคืนมาได้\r\n\r\nในส่วนที่เป็นบุคลิกภาพทางจิตใจที่แท้จริงของคนเกิดวันนี้นั้นก็คือ การเป็นคนที่ทำอะไรเป็น ระเบียบเรียบร้อย ละเอียดละออ รักษากฏเกณฑ์ได้ครบถ้วน และใช้หลักเหตุผลในการตัดสินใจ ที่เด่นมากคือความเป็นคนเสมอต้นเสมอปลาย คงเส้นคงวา ไม่ว่าจะในด้านการทำงาน ความสัมพันธ์ กับคนอื่นหรือเรื่องความรักและ ครอบครัว คนเกิดวันนี้จะแสดงให้เห็นอย่าง สม่ำเสมอ ถึงความรักแหละห่วงใยคนรักหรือคู่ครอง ซึ่งก็หมายความว่า ถ้าท่านเป็นคนยุ่งเหยิง ไร้ระเบียบและตามอารมณ์แล้ว ท่านก็คงไม่ถูกใจคนเกิดวันที่22นัก\r\n\r\nคนเกิดวันที่22เป็นคนเอาใจใส่ รับผิดชอบการงานเป็นอย่างดี ให้ความสำคัญกับสิ่งที่เรียกว่า มิตรภาพ มากทีเดียวทั้งเป็นคนจริงใจต่อมิตร พร้อมที่จะให้ความช่วยเหลือมิตรทุกคนอย่างเต็มที่ ปัญหาจึงมีอยู่ว่า ท่าน จะทำให้คนเกิดวันนี้รับท่านมิตรได้อย่างไร คำตอบมีอยู่แล้วถ้าท่านอ่านทบทวน ท่านก็จะสามารถทำได้\r\n\r\nคนเกิดวันที่22เกลียดคนที่แสดงอารมณ์ต่อคนอื่น เกลียดคนที่ชอบทำให้คนอื่น เสียหน้าหรือขาดความมั่นใจ แต่เป็นที่น่าแปลกว่าคนที่เกิดวันนี้มีความสามารถเพียงพอ ที่จะเป็นผู้นำที่ดีและคุมคนมากๆได้ ');
INSERT INTO `horoday30` VALUES (23, 'วันที่23', '23', '', '', '', '', '', '', 'คนเกิดวันที่23 มีบุคลิกภาพที่สง่า\r\n\r\nคนเกิดวันที่23 มีลักษณะที่คนมักจะมองดูห่างๆด้วยความระแวดระวังหรือเกรงกลัว เพราะเป็นคน ที่มีบุคลิกภาพที่สง่า มั่นคง และมักแสดงออกให้เห็นได้ชัดเจนว่ามีความมั่นใจในตัวเองสูง คนเกิดวันนี้แม้ไม่อยู่ในตำแหน่งที่ มีอำนาจใดๆ แต่ก็มีอำนาจและอาจก้าวขึ้นสู่อำนาจได้จริงๆ คนเกิดวันที่23จึงเป็นคนที่ใครๆเห็นว่า มีความไว้ตัวและดื้อรั้น ซึ่งก็เป็นการมองที่ถูกต้อง ในลักษณะนิสัยด้านหนึ่ง\r\n\r\nแต่ในอีกด้านหนึ่งนั้นคนเกิดวันนี้เป็นคนเข้าใจซาบซึ้งใน บทกวี ดนตรี ศิลปะ ปรัชญา มีความอ่อนโยนต่อธรรมชาติเป็นอย่างยิ่ง ท่านที่จะเป็นมิตรกับคนเกิด วันที่23 จึงควรเป็นคนรอบรู้ศิลปวิทยาการเหล่านี้ และควรเรียนรู้ที่จะใช้ชีวิตกับคนที่เกิดวันนี้ อย่างผู้มีรสนิยมอันเลิศด้วย คนกลุ่มนี้พร้อมที่จะตกหลุมรักใครง่ายๆโดยเฉพาะอย่างยิ่งกับคน ที่มีนิสัยและรสนิยมตรงกัน แต่ถ้าเกิดขัดแย้งกันนิดเดียว เขาก็จะปล่อยคนที่เคยรักไว้อย่าง ไม่แยแสได้เหมือนกัน\r\n\r\nชีวิตของคนเกิดวันที่23 เป็นชีวิตที่มีการทำงานเป็นส่วนสำคัญ คนเกิดวันนี้ต้องการทำงานและ ทำอย่างอิสระ ต้อง การโอกาสที่จะแสดงความสามารถ และถ้าใครสักคนเข้าไปปิดกั้นโอกาส ไม่ให้แสดงความสามารถ หรือได้ทำสิ่งที่ เขาต้องการ แม้จะรักใคร่กันเพียงใด ก็อาจเป็นศัตรู คู่ปรปักษ์กันได้ทันที ไม่ว่าจะคนที่เป็นสามีหรือภรรยา\r\n\r\nคนเกิดวันนี้เป็นคนโลกทรรศกว้าง และพอใจที่จะคบคนโลกทรรศ์กว้างด้วยเช่นเดียวกัน เขาจะเป็นนักธุรกิจหรือ นักบริหารที่เก่งมาก โดยไม่ยอมให้ใครมาชี้นำ ไม่ยอมให้สิ่งแวดล้อมต่างๆมาทำให้หวั่นไหวได้ ไม่เปลี่ยนหลักการ โดยไม่มีเหตุผลเปลี่ยนหลักการได้ทันทีถ้าเหตุผลถูกต้องชัดเจน เมื่อทำงานใจก็จะมุ่งมั่น อยู่แต่ตามหลักการ เพื่อให้งานบรรลุผลเท่านั้น\r\n\r\nคนเกิดวันนี้มีความสามารถที่จะติดต่อกับคนทุกชั้นให้ประสบผลสำเร็จได้ อย่างไรก็ตาม คนเกิดวันนี้จะมีจุดอ่อนอยู่ที่สามารถเป็นคนใจหินขึ้นมาง่ายๆ เมื่อเกิดไม่สบอารมณ์ขึ้นมา ');
INSERT INTO `horoday30` VALUES (24, 'วันที่24', '24', '', '', '', '', '', '', 'เกิดวันที่24 ผู้มีน้ำใจ\r\n\r\nถ้าท่านมีเพื่อนเกิดวันที่24ก็นับว่าท่านมีโชค และถ้าตัวท่านเองเกิดวันที่24ตัวท่านก็นับได้ว่า เป็นผู้มีบุญมาแต่กำเนิดคนหนึ่งเหมือนกัน ลักษณะเด่นของคนที่เกิดวันนี้คือความมีน้ำใจ พร้อมที่จะช่วยเหลือเพื่อน หรือแม้แต่คนอื่นที่มิใช่เพื่อน หากตกอยู่ในภาวะที่จะต้องได้รับ ความช่วยแล้วคนเกิดวันที่24จะให้ความช่วย เหลือทันทีด้วยไมตรีจิต และไม่สนใจการตอบแทน\r\n\r\nคนเกิดวันที่24เป็นมิตรที่ดี เมื่อท่านมีความทุกข์ คนแรกๆที่จะมาให้ท่านเห็นคือคนที่เกิดวันที่24 และเมื่อท่าน มีความสุขคนที่จะมาถึงก่อนก็คือคนเกิดวันนี้ด้วยจะเป็นเพื่อนที่นำสิ่งที่มีประโยชน์ ชักชวนให้ทำสิ่งที่ดีงาม และ นำความสุขสมบรูณ์มาให้ท่านเสมอ\r\n\r\nคนเกิดวันนี้เป็นคนมีเสน่ห์ช่างรู้ใจ ถ้าท่านมีคนรักเป็นคนเกิดวันที่24 จะรู้ซึ้งถึงเสน่ห์ของคนเกิดวันนี้ว่า เป็นคน ช่างรู้ใจ และเป็นคน ช่างเอาอกเอาใจเสียจนท่านรู้สึกว่าท่านห่างเขาหรือเธอได้ยาก หรือขาดเขาไปแล้ว ท่านมีความสุข เหลือน้อยมา ด้วยเหตุนี้ใครที่รู้จักมักคุ้นจึงทั้งรักทั้งหลงคนเกิดวันที่ 24\r\n\r\nลักษณะนิสัยที่ดีเยี่ยมอีกอย่างหนึ่งของคนเกิดวันนี้ ก็คือความเป็นคนรับผิดชอบสูง ทั้งการงาน และครอบครัว โดยเฉพาะในเรื่องครอบครัวแล้ว คนเกิดวันนี้ถือว่าครอบครัวเป็นชีวิตจิตใจ ของเขาหรือเธอเลยทีเดียว การมี คู่สร้าง-คู่สมที่รักและรับผิดชอบครอบครัว นับเป็นโชคอย่าง วิเศษและถ้าท่านมีคนรักเกิดในวันที่24นี้ท่านก็มีโชคไปด้วย\r\n\r\nเสน่ห์อีกประการหนึ่งของคนที่เกิด วันที่24 คือ เสน่ห์ในการสนทนา คนเกิดในวันนี้เป็นนักฟังที่ดีและเห็นอกเห็นใจผู้พูดที่พูดไม่เก่ง เล่าเรื่องที่เต็มไปด้วยปัญหา เพราะเขาจับใจความเก่ง จับความคิดของผู้พูดได้ไวและเมื่อถึงเวลาพูด คนเกิดวันที่24ก็พูดได้เพราะ ฉลาด สามารถเจรจาชักจูงใจหรือให้ทัศนะที่เป็นประโยชน์ หรือ สามารถนำไปปฏิบัติได้จริงๆ\r\n\r\nจุดอ่อนของคนที่เกิดวันที่24 อยู่ที่ความรักเพื่อน และกลัวว่าตนจะเป็นภาระทำให้เพื่อนเดือดร้อนนี่เอง จึงทำให้คนเกิดวันนี้เป็นคนไม่ค่อยแสดงความรู้สึกในใจออกมา และยากที่จะปริปากบอกใคร ถึงความรู้สึกตนเอง ดังนั้น คนที่ทำงานด้วยหรืออยู่ใกล้ชิดต้องคอยสังเกตดูแลสักหน่อยมิฉะนั้น คนที่เกิดวันนี้อาจฟุบไปเฉยๆก็ได้ เพราะความ อ่อนเพลียแต่ไม่ยอมบอกใครและเพราะความที่ ชอบเก็บความรู้สึกนี้หากประสบปัญหาบ่อยๆเข้าอาจกลาย เป็นโรคประสาทได้ ');
INSERT INTO `horoday30` VALUES (25, 'วันที่25', '25', '', '', '', '', '', '', 'เกิดวันที่25 ผู้มีสติปัญญาดี\r\n\r\nถ้า ท่านมีเพื่อนเกิดวันที่25เป็นตัวอย่างอันีดสำหรับการอธิบายภาษิตที่ว่ารวง ข้าวที่มีเมล็ดมาก ย่อมน้อมต่ำติดดิน โดยพื้นฐานทางสติปัญญา คนเกิดวันที่25นี้เป็นคนที่มีสติปัญญาดี เป็นคนเรียนอะไรก็เข้าใจง่าย จะจับทำอะไร ก็ทำเป็นทำได้ดี แต่ไม่ว่าเขาหรือเธอที่เกิดวันนี้ จะมีความรู้ความสามารถสักแต่ไหน ก็จะไม่มีวันประกาศ สรรพคุณของตัวเองเลย และถ้าหากว่า จำเป็นจะต้องใช้ความรู้คู่ความสามารถให้ปรากฏ เขาหรือเธอที่เกิดวันที่25 ก็จะแสดงออกอย่างชนิด ที่ถ่อมตัว แสดงตนว่าไม่ใช่ผู้รู้วิเศษกว่าใครแม้แต่สักครั้ง\r\n\r\nลักษณะนิสัยดีเด่นอีกอย่างหนึ่งก็คือ เห็นธุระของเพื่อนสำคัญกว่าเสมอ ถ้ามีธุระที่ต้องทำพร้อมๆกันเขาหรือเธอ ที่เกิดวันนี้จะทำให้ เพื่อนเป็นอันดับแรก และให้ความรักใคร่ไว้วางใจเพื่อนเต็มที่เสมอ และคนที่เกิดวันนี้เป็นคน ที่มีความคิดสร้างสรรค์ แสวงหาสิ่งใหม่ๆดังนั้นเขาหรือเธอซึ่งเกิดวันที่25 มักไม่ยอม อยู่เฉยๆ ชอบให้มีการเปลี่ยนแปลงที่ท้าทายและตื่นเต้น คนเกิดวันที่25 อาจไม่ชอบเพื่อนหรือคนรัก ที่อนุรักษ์นิยม หรือเป็นคนที่ค่อนข้างเฉื่อย และคนที่เกิดวันนี้เป็นคนที่มีความคิดริเริ่มสูง และชอบที่จะมีเพื่อนวิจารณ์ความคิด ริเริ่มของเขาอย่างเฉียบคม\r\n\r\nคนเกิดวันนี้เป็นคนที่มีลักษณะเด่นอยู่ในตัว ดังนั้นไม่ว่าจะออกไปในงานสังคมใดก็เป็นที่น่าสน ของคนในกลุ่ม ในงานนั้น ทั้งที่คนเกิดวันที่25มิได้เป็นคนมีรูปร่างใหญ่โตหรือสวยหล่อสะดุดตา ผู้ใดเกินปกติ แต่บุคลิกภาพทีท่า และการแต่งกายและลักษณะเด่นในตัวเองจะจูงความสนใจ จากคนอื่นได้มาก ความสามารถในการเลียนแบบก็ เป็นความเด่นอีกอย่างหนึ่งของคนเกิดวันที่25 คนเกิดวันนี้มีความสามารถในการเลียนแบบหรือล้อเลียนคนอื่นได้ อย่างแนบเนียน ทำให้คนอื่น รู้สึกสนุกสนานและพอใจ\r\n\r\nคนเกิดวันที่25ไม่ชอบที่จะอยู่ในสถานการณ์เผชิญหน้าดังนั้น เมื่อมี ปัญหาขัดแย้งกับคนรัก คู่ครอง เพื่อน หรือแม้แต่ปัญหาในงาน คนที่เกิดวันนี้จะทำเป็นไม่สนใจ หรือปล่อยให้เป็นไปตามปกติก่อน แล้วจึงไป ชวนคุยนอกเวลาและปรับความเข้าใจทีหลัง จุดอ่อนของคนที่เกิดวันนี้ ความรู้สึกที่อ่อนไหวได้ง่ายต่อคำพูด ในบางครั้งคนที่เกี่ยวข้องพูดผิดหู นิดเดียว และโดยไม่ได้เจตนาเลย คนที่เกิดวันนี้ก็เก็บไปน้อยใจเสียยกใหญ่ ');
INSERT INTO `horoday30` VALUES (26, 'วันที่26', '26', '', '', '', '', '', '', 'เกิดวันที่ 26 ผู้มีกำลังใจเข้มแข็ง\r\n\r\nใครที่รู้ตัวว่าไม่ค่อยมั่นใจในตนเอง ขอได้โปรดคบเพื่อนหรือรักกับคนที่เกิดวันที่26 เถิด เพราะคนที่เกิดวันนี้เป็นคนสุขุม มั่นคงและมองการณ์ไกล ถ้าท่านอยู่ใกล้ก็จะค่อยๆมีความ มั่นใจตัวเองขึ้นได้\r\n\r\nความมีกำลังใจเข้มแข็งมั่นคงเป็น คุณลักษณะเด่นประการแรกของ คนเกิดวันที่26 ดังนั้นไม่ว่าในชีวิตของเขาหรือเธอจะเผชิญกับอะไร อุปสรรคหนักแค่ไหน คนเกิดวันที่26 ก็ไม่เคยหวั่น อาจร้องไห้แต่ไม่เคยยอมพ่ายแพ้แต่จะใช้สติปัญญา เริ่มต่อสู้กับอุปสรรคอย่างสุขุม ต่อไป ความสุขุมมองการณ์ไกลเป็นสิ่งเสริมความมั่นใจตัวเอง ที่สำคัญของคนที่เกิดวันที่26 คนเกิดวันนี้มักไม่ตื่นเต้น กับเหตุการณ์ ไม่หวาดกลัวแต่จะ แก้ปัญหาต่างๆอย่างฉลาดรอบคอบสุขุม\r\n\r\nคนเกิดวันนี้เป็นคนที่มีความเห็นอกเห็นใจคนอื่น และมีคุณสมบัติที่ทำให้เข้าใจปัญหาของคนอื่น ได้ง่าย ความฉลาดรอบคอบ สุขุม ความคิดลึกซึ้งที่มีอยู่ ทำให้คนที่เกิดวันนี้เป็นคนเห็นอกเห็นใจ ผู้อื่น มีอะไรเกิดขึ้นเพียงนิดเดียวก็จะเข้าใจ ความเป็นมาเป็นไปได้อย่างรวดเร็วทันที\r\n\r\nคุณสมบัติเด่นอีกอย่างหนึ่งของคนที่เกิดวันที่26ก็คือความเป็นผู้นำ คนเกิดวันนี้จะเป็นผู้นำที่ดี มีความสามารถในการจัดการ และเป็นนักบริหารที่มีความสามาถ เป็นคนมีความรอบรู้และเก่ง หลายด้าน ประกอบกับเป็นคนที่มีความทะเยอทะยานสูงไม่ชอบเป็นลูกน้องใคร จึงทำให้คนเกิด วันที่26ปรากฏภาพโดดเด่นในฐานะ เจ้าพ่อ ลูกพี่หรือหัวหน้า คนเกิดวันที่26เป็นคนที่ไม่ชอบ ความปนเปก้าวก่ายโดยนิสัยส่วนตัวจะค่อนข้างปราณีต เช่นเสื้อผ้าแต่งกายของเขาหรือเธอ อาจต้องจัดไว้เป็นชุดอย่างถูกต้อง เสื้อผ้าแต่งกายของคนที่เกิดวันนี้อาจต้องจัดไว้เป็นชุดอย่าง ถูกต้อง ท่านจะไม่ค่อยพบคน ที่เกิดวันนี้แต่งกายชนิดสีรองเท้าไปทางหนึ่ง สีเสื้อผ้าไปทางหนึ่ง สีเสื้อผ้าไปอีกทางหนึ่ง กระเป๋าถือไปอีกสีหนึ่งเป็นอันขาด\r\n\r\nคนเกิดวันนี้จะหงุดหงิดง่ายกับการประชุม ที่ไม่ตรงเวลา ห้องอาหารที่ผู้คนสับสนส่งเสียงดัง หรือการชุลมุนแย่งกัน รีบบริการโดยไม่เรียงลำดับ คนเกิดวันที่26จะไม่ยอมให้ชีวิตครอบครัวเข้ามายุ่งเกี่ยวกับการงานอย่างเด็ดขาด ถ้าเป็นคู่รัก คู่ครอง หรือเพื่อนสนิทจงอย่าน้อยใจเลยถ้าท่านไม่รู้เรื่องราวเกี่ยวกับงานของเขาหรือเธอผู้ที่เกิด วันนี้ คนเกิดวันนี้แม้ว่าจะเป็นคนเห็นอกเห็นใจผู้อื่น สุขุมรอบคอบมั่นคงไม่หวั่นไหวและอยากให้ ทุกคน รักใคร่เข้าใจกัน แต่ก็เป็นคนที่ยึดมั่นในลักษณะของตนอย่างมั่นค งอาจกล่าวได้ว่าเป็นคนดื้อ ทีเดียว อย่าไปขอให้คนเกิดวันที่26ทำตามใครโดยไม่ถูกหลักเกณฑ์เป็นอันขาดถ้ายังอยากมีไมตรี อันยืนยาวต่อกัน ');
INSERT INTO `horoday30` VALUES (27, 'วันที่27', '27', '', '', '', '', '', '', 'เกิดวันที่ 27 ผู้ทรงความยุติธรรม\r\n\r\nมี บางคนพูดว่าบางทีเปาบุ้นจิ้น อาจเป็นคนที่เกิดวันที่27ก็ได้ คนที่เกิดวันที่27มีความสามารถ เป็นพิเศษในการ แยกแยะสิ่งที่ถูกกับสิ่งที่ผิด สิ่งที่ดีกับสิ่งที่เลวออกจากกันได้ง่าย และเมื่อเห็นว่า สิ่งใดผิดสิ่งใดไม่ดีแล้ว คน เกิดวันนี้ก็จะถูกจิตสำนึกมโนกรรมภายในคอยบังคับมิให้กระทำสิ่งนั้น เป็นอันขาด และถ้าบังเอิญได้กระทำลงไป จะด้วยประมาทหรือสถานการณ์ยังบังคับก็ตาม คนที่เกิดวันนี้ก็จะไม่ลืมเรื่องนั้นเป็นอันขาด จะจดจำเหตุการณ์ นั้นเป็นความไม่สบายใจไปตลอด ชั่วชีวิต หรือจนกว่าจะมีการแก้ไขสิ่งที่ผิดให้ถูกต้อง คนเกิดวันนี้แหละ คือคนที่จะแน่วแน่แก้ไข ในสิ่งผิด\r\n\r\nคนเกิดวันนี้เป็นคนที่มีความเมตตาสูง รักคนอื่นเหมือนรักตัวเอง แต่ความเมตตานี้มี ขอบเขตโดยจะมีให้อย่างเหลือเฟือกับคนที่ถูกต้องทำนองคลองธรรม แต่ถ้าคนผิดคนชั่วแล้ว สิ่งที่คนเกิดวันที่27 มีให้ก็คือ ความเห็นใจ ความเสียใจ คนเกิดวันนี้จึงเป็นคนที่มีความรับผิดชอบสูง เป็นพ่อแม่ที่ดี เป็นครูที่ดี และเป็นหัวหน้าผู้เที่ยงธรรม\r\n\r\nคนเกิดวันที่27 เป็นคนค่อนข้างอนุรักษ์นิยม ยึดมั่นในแบบธรรมเนียมประเพณีและมักใช้แบบแผน ธรรมเนียมประเพณี เป็นเกณฑ์ในการแยกถูก-ผิด ดีชั่ว จึงมีลักษณะเป็นคนหัวโบราณ คนเกิดวันนี้ มักจะค่อนข้างดื้อรั้นในสายตาคนอื่น แท้จริงแล้ว ความดื้อของเขาอยู่บนพื้นฐานแห่งการแยกชั่ว-ดี แล้วมากกว่า คนเกิดวันนี้จะมีความกังวลใจอยู่ตลอดเวลา ถ้า หากเขาได้กระทำสิ่งที่ทำให้คนอื่น เดือดร้อน ความกังวลอย่างนี้จะทำให้ชีวิตของคนเกิดวันนี้ค่อนข้างเครียดและจะไม่คลายลงจนกว่า เขาหรือเธอจะอธิบายให้อีกฝ่ายหนึ่งเข้าใจ คนเกิดวันนี้มีลักษณะบางอย่างที่ขัดแย้งในตัว คือมักชอบ คบมิตรสหายฮาเฮแต่ก็ชอบนิ่งเงียบๆอยู่กับความคิด ของตัวเองบ่อยๆดังนั้น ถ้าเพื่อนผู้เกิดวันที่27 ของท่านอยู่ๆก็หายหน้าไปท่านไม่ต้องติดใจอันใด อีกไม่นานคนผู้นั้นก็จะกลับมา\r\n\r\nคนเกิดวันที่27จะเก็บความรู้สึกเจ็บปวดในใจอันเกิดจากความรักได้เป็นอย่างดี ถ้าคนรักจะ แยกทางไป เขาหรือเธอก็จะเพียงนิ่งเฉยและเก็บความเจ็บปวดไว้ในใจไม่ให้ใครได้เห็น และถ้าท่านเกิดวันนี้ลดความ เอาจริงเอาจังอีกนิดเครียดน้อยอีกหน่อย ท่านก็จะมีความสุขอัน บริบูรณ์ ด้วยความดีในตัวของท่านเอง\r\n	');
INSERT INTO `horoday30` VALUES (28, 'วันที่28', '28', '', '', '', '', '', '', 'คนเกิดวันที่28เป็นคนที่มีความสุขกับชีวิตที่ไม่เคร่งครัด\r\n\r\nหลักเกณฑ์หรือกำหนดการต่างๆของชีวิต มิได้มีความสำคัญแก่ชีวิตมากนัก ชีวิตของคนเกิดวันที่28จึงค่อนข้างเป็น ชีวิตที่ตามสบาย คนเกิดวันนี้เป็นคนมีจิตใจอ่อนโยน สงสารคนง่ายรักคนง่าย ไว้ใจคนง่าย ชอบความสะดวก สบายและชอบอำนวยความสะดวก ให้กับเพื่อนหรือคนรัก เป็นคนที่รักใครๆและอยากให้ใครๆรัก อยาก ให้ทุกคนรักกันและอยาก ให้เพื่อนๆรักกันอย่างมีความสุขดังนั้นความทุกข์ของคนเกิดวันที่28 จึงมักเกิดจากการที่เพื่อน ของเขาเกิดทะเลาะกันเอง เขาจะรู้สึกโชคร้ายที่สุดเมื่อถูกเพื่อนหลอกลวง\r\n\r\nเพื่อน เป็นคำที่มี ความหมายที่สุดสำหรับคนเกิดวันที่28 เพราะคนเกิดวันนี้ขี้เหงา และอยู่คนเดียวไม่ได้เด็ดขาด ต้องมีเพื่อนชีวิตจึงจะเป็นสุข ท่านจึงพบคนเกิดวันนี้เริงร่าอยู่ในหมู่เพื่อนเสมอๆ มิใช่น้อยเลย ที่ถึงแม้จะแต่งงานมี ครอบครัวแล้วก็ยังแบ่งเวลาให้เพื่อนมากกว่าครอบครัวตัวเอง ถ้าคู่ครอง ไม่เข้าใจกันก็ถึงกับโกรธกันก็บ่อยไป แต่ อย่างไรก็ตามแม้คนเกิดวันนี้จะรักเพื่อนและให้ความ สำคัญกับเพื่อนมาก แต่ก็จะตัดสินใจเรื่องสำคัญๆด้วยตัวเอง เสมอ รักเพื่อน แต่ไม่ยอมให้เพื่อน มีอิทธิพลเหนือตน\r\n\r\nลักษณะที่ขัดแย้งกันของคนเกิดวันที่28 จะพบได้ในเรื่องความดื้อรั้น คนเกิดวันนี้เป็นคนรักเพื่อนเป็นคนสนุก สนานมีอารมณ์ขันแต่มักดื้อดึงอย่างไม่มีใครเทียบ ถ้าหากเขาหรือเธอคิดจะดื้อขึ้นมา คนเกิดวันนี้แม้ว่าจะเป็น คนสะเทือนใจได้ง่าย ใจอ่อนกับ เหตุการณ์ซึ่งแม้จะมิได้เกิดขึ้นกับตัวเองก็ตาม แต่คนเกิดวันนี้ก็เป็นคนกล้าที่จะพูด และทำ เพื่อป้องกันสิทธิของตัวเองและผู้อื่นอย่างเต็มที่เมื่อถึงความจำเป็น ดังนั้น บางทีท่านจึงอาจแปลกใจ ที่เพื่อน ผู้ดูเหมือนเป็นคนตามสบายเกิดเอาจริงเอาจังขึ้นมาในเมื่อพบเห็นการรังแกหรือถูกรังแก\r\n\r\nจุดอ่อนของคนเกิดวันที่28ก็อยู่ตรงที่ว่าปกติแล้วเป็นคนไม่เคร่งครัดอันใด ปล่อยชีวิตไปเรื่อยๆ ตามสบาย แต่เมื่อมีอะไร มากระทบกระเทือนใจแล้วมักวู่วามทำให้ความสุขน้อยลงไป จนกว่า จะรู้จักระงับและหาทางระบายออกที่นุ่มนวลขึ้น ถ้าท่านมีเพื่อนเกิดวันนี้ขยับเข้าใกล้เขาอีกนิด เพราะคนเกิดวันนี้อยู่คนเดียวไม่ได้เด็ดขาด ถ้าขาดเพื่อนแล้วจะรู้สึกว้าเหว่ ที่สุด ');
INSERT INTO `horoday30` VALUES (29, 'วันที่29', '29', '', '', '', '', '', '', 'เกิดวันที่29 ผู้มีพรสวรรค์ทางสร้างสรรค์\r\n\r\nคนเกิดวันที่29 มีโชคเบื้องต้นหรือจะเรียกว่าพรสวรรค์อยู่หนึ่งอย่าง คืออยู่ที่ความคิดสร้างสรรค์ และความสามารถในการ ประดิษฐ์อันเป็นการทำให้ความคิดสร้างสรรค์กลายเป็นสิ่งที่จับต้องได้ คนเกิดวันนี้เป็นคนช่างฝัน และสามารถทำความฝัน ให้เป็นจริงได้ นักวิทยาศาสตร์ นักประดิษฐ์ หลายคนเกิดในวันที่29 คนเกิดวันนี้ส่วนใหญ่จะมีความสุขมาก ถ้าได้ทำงาน ในด้านการประดิษฐ์ คิดค้น การทดลองทางวิทยาศาสตร์และเทคโนโลยี และเขาหรือเธอมักจะประสบความสำเร็จในด้านนี้ อย่างรุ่งโรจน์ ด้วยเหตุที่พื้นนิสัยเป็นเช่นนี้\r\n\r\nคนที่เกิดวันที่29จึงมีเพื่อนหรือคนรักที่มีความเข้าใจไม่ปล่อยให้เขาหรือเธอ จมอยู่กับเครื่องมื่อ ทดลองวิจัยทางวิทยาศาสตร์ หรือในห้องcomputer แต่ควรจะต้องพาเขาหรือเธอออกไปสู่สังคม รู้จักโลก ที่เป็นจริง รู้จักชื่นชมกับความสุขและความงามของมนุษย์ ของธรรมชาติซึ่งเรื่องนี้บางที พ่อแม่ควรจะต้องทำ แทนที่จะดีใจว่าลูกของท่านเป็นคนขยันเรียนอย่างเดียว ความทุกข์ของคน เกิดวันนี้จะเกิดขึ้นในเมื่อเขาหรือเธอต้องทำงานที่ตัวเขาหรือเธอไม่ชอบทำ หรือต้องเรียนรู้ หรือทำความเข้าใจ ในเรื่องที่เขาไม่สนใจ เขาจะเบื่อเรื่องดังกล่าวง่ายๆ คนเกิดวันนี้เบื่อง่าย ถ้าไม่ได้งานที่ชอบก็จะเบื่อทันที\r\n\r\nอันที่จริงแล้วคนเกิด วันนี้เป็นคนที่มีเสน่ห์ และน่ารักกับคน ที่เขาหรือเธอพอใจ เป็นคนที่เรียกได้ว่ารักเดียวใจเดียว เมื่อได้พอใจหรือรักใครแล้วก็ จะไม่ผันแปรไปได้ มีความรับผิดชอบต่อคนรักและครอบครัวดี แต่ใครก็ตามที่เป็นคนรักกับคน ที่เกิดวันนี้ก็จะต้องพบกับข้อ ยุ่งยากบ้าง โดยเฉพาะความยุ่งยากอันเกิดจากความเก่งซึ่งทำให้ เขาเป็นคนมองโลกอย่างไม่เข้าใจ หรือบางครั้งถึงกลับกลายเป็น คนหลงตัวเองหรือหลงกลุ่มไปได้ เช่นหลงผิดไปว่ากลุ่มของตนเท่านั้นที่มีความเก่งชำนาญในสาขาอาชีพนี้เป็นเลิศ เป็นพวกที่ ชอบมองว่าคนต่างกลุ่มมีเกียรติน้อยกว่าตน บางทีเผลอๆยังแอบดูถูกภรรยาสามีและญาติของแฟน ว่าโง่กว่าตนก็มี\r\n\r\nและที่สำคัญคนเกิดวันที่29เป็นคนที่แม้แต่คนใกล้ชิดที่สุดก็ยากที่จะหยั่งรู้ความรู้สึกจริงๆของเขา หรือเธอได้ เป็นคนพวกที่ชอบ มีชีวิตลึกลับชวนให้คนพิศวง และเขาหรือเธอผู้เกิดวันที่29จะรู้สึก อึดอัดมาก ถ้าคนรู้เกี่ยวกับตัวเขาหรือเธอมากกว่าที่ต้องการ ให้รู้');
INSERT INTO `horoday30` VALUES (30, 'วันที่30', '30', '', '', '', '', '', '', 'คนเกิดวันที่30 ฉลาด เข้มแข็ง\r\n\r\nคนเกิดวันที่30 มีพื้นนิสัยที่ดีหลายอย่าง แต่สิ่งที่พระเจ้าลืมประทานมาให้เขาหรือมีมาให้ก็มีน้อย ก็คือความมีเสน่ห์ โดยพื้นฐานของดวงชะตา คนเกิดวันที่30 มักจะเป็นคนฉลาดและมีความ มั่นใจในตัวเองสูง ไม่ว่าดูภายนอกจะมีลักษณะ อย่างไร แต่ภายในจิตใจ ของเขามี วิธีการ หรือคำตอบหรือคำตัดสินของปัญหาที่จะต้องเผชิญไว้พร้อมแล้ว และเมื่อตัดสินใจแล้ว ก็เป็นอันจบกัน ไม่ต้องหวนกลับมาพูดกันด้วยเรื่องเก่านั้นอีก การคิดในใจอย่างฉลาดนี้เอง ทำให้คนเกิดวันนี้สามารถแก้ปัญหาต่างๆลุล่วงไปได้ด้วยดี สามารถตัดสินใจทำอะไรได้โดย ไม่ลังเลใจ\r\n\r\nคนเกิดวันที่30มีบุคลิกภาพที่เข้มแข็งแสดงให้เห็นความเป็นคนเด็ดขาด ดูน่าเกรงขาม เป็นคนที่รู้ว่าตัวเองมีดีอะไรและศัตรู คู่แข่งขันมีอะไรดี สามารถใช่ความได้เปรียบที่มีอยู่เอาชนะ คู่แข่งได้ไม่ยากลำบาก อ่านความคิดคนอื่นได้ปรุโปร่ง หรือ มีญาณสังหรณ์ที่ช่วยป้องกันกลอุบาย ของคู่แข่งขันได้จึงมักจะเอาชนะคนอื่นได้เสมอ อำนาจก็ยิ่งมีมากขึ้น คนที่เกิดวันนี้มีสติปัญญาหลักแหลมเรียนรู้อะไรได้เร็วกว่าคนอื่น โดยเฉพาะอย่างยิ่งถ้าเรื่องนั้น เป็นเรื่องของการตีความ ถ้อยคำสัญลักษณ์และปรัชญาต่างๆแต่ก็ไม่ค่อยชำนาญเรื่องเครื่องกลไก ต่างๆมากนัก\r\n\r\nคนเกิดวันที่30ชอบทำอะไรยากๆ ที่คนธรรมดาสามัญไม่ค่อยทำกัน จะทำแต่สิ่งที่ดีเลิศ จริงๆแม้ในเรื่องความรัก คนเกิดวันนี้ก็มักจะพุ่งความสนใจ ไปยังคนที่มีลักษณะเป็นดอกฟ้า หรือท่านชายมากกว่าที่สนใจคนธรรมดา ถ้าท่านอยากให้คนที่เกิดวันที่30 สนใจ ท่านต้องทำตัว ให้เป็นงานที่ยากกว่าธรรมดา\r\n\r\nนอกจากจะเป็นคนชอบทำอะไรยากๆ แล้ว คนเกิดวันนี้เป็นคนที่มีอะไรบางอย่างแปลกไปจากคนอื่น มีความสามารถพิเศษที่คนทั่วๆไปอาจทำไม่ได้ หรือนึก ไม่ถึงว่าจะมีใครทำได้เช่นนั้น เป็นคนที่มี ความเห็นที่รุนแรงมาก โดยเฉพาะในด้านการเมือง ศาสนา ชีวิตแม้กระทั่ง ความรัก คนเกิดวันนี้ กับความรักนั้นมีลักษณะของคนที่ขาดเสน่ห์ คนที่เกิดวันนี้ค่อนข้างพอใจที่รักคนเก่งกาจ แต่ต้อง เก่งน้อยกว่าตนเอง ชอบใช้อำนาจแสดงให้เห็นว่าตนเองมีอำนาจเหนือคู่ครอง ');
INSERT INTO `horoday30` VALUES (31, 'วันที่31', '31', '', '', '', '', '', '', 'คนเกิดวันที่31 ได้รับพรจากพระเจ้าเรื่องสติปัญญา\r\n\r\nจึงเป็นผู้มีสติปัญญาดีเฉลียวฉลาดแบบที่เรียก กันว่าไหวพริบดี (ไม่ใช่เรียนหนังสือเก่ง)ดังนั้นเมื่อจะจับทำงานใดก็มักจะประสบความสำเร็จ ระดับสูงเสมอ โดยลักษณะนิสัย คนที่เกิด วันนี้เป็นคนสุภาพอ่อนน้อมถ่อมตน และไม่ชอบโอ้อวด หรือแม้แต่แสดงตนเกี่ยวกับความสำเร็จหรือความก้าวหน้าต่างๆ คนทั่วไปแม้จะรู้ว่าเขาหรือเธอ ซี่งเกิดวันที่31เป็นคนที่ประสบความสำเร็จ แต่ก็ไม่มีใครรู้จริง แม้แต่เพื่อนสนิท ว่าที่จริงแล้ว ความสำเร็จที่คนอื่นเห็นนั้นเป็นเพียงเศษส่วนเท่าใดของความสำเร็จที่เขาได้รับ\r\n\r\nคนเกิดวันที่31 เป็นคนรักเพื่อนฝูง ความสุขที่แท้จริงของคนเกิดวันนี้ก็คือการได้อยู่ท่ามกลางเพื่อนฝูง เขาหรือเธอที่เกิดวันนี้ เป็นคนเอื้อเฟื้อเผื่อแผ่แก่คนที่รักเป็นอย่างดี ความมีมนุษยสัมพันธ์ ( หรือจะเรียกว่ามีเสน่ห์ก็ได้ ) เป็นคุณลักษณะที่สำคัญอีกอย่างหนึ่งของคนเกิดวันนี้ เขาหรือเธอ ที่เกิดวันนี้มีบุคลิกภาพอันสง่างาม เด่น เป็นที่ต้องตาต้องใจและผู้คนมักอยากปราศรัยทักทายด้วย ประกอบกับความมี มนุษยสัมพันธ์ สามารถเข้ากับคนทุกระดับชั้นได้ดี คนเกิดวันที่31 จึงเป็นผู้ที่มีคนรู้จักมาก ในด้านความรัก\r\n\r\nคนเกิดวันนี้จะต้องเยี่ยมกว่าคนอื่นเสมอ เป็นคนที่ตั้งกฎเกณฑืหรือหลักการไว้สูง ถ้าท่านปรับตัว ตามเขาหรือเธอไม่ได้ ทำตัวอย่างที่คนเกิดวันนี้ต้องการไม่ได้ เขาหรือเธอที่เกิดวันนี้ก็จะไม่ลังเล ที่จะเมินคุณไปได้อย่าง ปราศจากเยื่อใย ที่สำคัญที่สุด ท่านอย่าทรยศหรือหักหลังคนที่เกิดวันนี้ เป็นอันขาด แม้แต่จะตุกติกมีเล่ห์เหลี่ยมท่านก็ไม่ ควรทำ เพราะเขาหรือเธอผู้เกิดวันที่31 จะโต้ตอบท่านอย่างเต็มที่และรุนแรงทันที และท่านไม่มีทางที่จะเอาชนะเขาหรือเธอได้เลย\r\n\r\nจุดอ่อนของคนเกิดวันนี้อยู่ที่ว่าแม้ดูภายนอกจะเข้มแข็งเด็ดขาด แต่ในเบื้องลึก คนเกิดวันนี้มักจะ ขาดความเชื่อมั่นในตัวเอง คนเกิดวันนี้มักไม่ทำสิ่งใดโดยปราศจากคำยืนยันจากคนที่ไว้ใจได้ เสียก่อนว่า สิ่งที่เขาทำนั้นถูกแล้วดีแล้ว ดังนั้น ถ้าท่านเป็นคู่รักคู่ครอง หรือเพื่อนของคนเกิดวันนี้ จะต้องรับบทบาทนี้ให้ได้ และข้อสำคัญที่ท่านลืมไม่ได้ก็คือ อย่าแสดงตัวว่าเขาขาดท่านไม่ได้ แต่จง แสดงให้เห็นว่าท่านขาดเขาไม่ได้ ซึ่งเป็นวิธีที่ดีที่สุดที่จะช่วยสร้างความมั่นใจ ให้เขาหรือเธอ ผู้เกิดวันที่31 ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `horofortninghtly`
-- 

CREATE TABLE `horofortninghtly` (
  `horofortninghtly_id` int(11) NOT NULL auto_increment,
  `horofortninghtly_name` varchar(55) NOT NULL,
  `horofortninghtly_name_id` varchar(55) NOT NULL,
  `horofortninghtly_bigen_date` varchar(55) NOT NULL,
  `horofortninghtly_end_date` varchar(55) NOT NULL,
  `horofortninghtly_work` text NOT NULL,
  `horofortninghtly_money` text NOT NULL,
  `horofortninghtly_love` text NOT NULL,
  `horofortninghtly_around` text NOT NULL,
  `horofortninghtly_dothing` text NOT NULL,
  `horofortninghtly_family` text NOT NULL,
  `horofortninghtly_other` text NOT NULL,
  PRIMARY KEY  (`horofortninghtly_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- dump ตาราง `horofortninghtly`
-- 

INSERT INTO `horofortninghtly` VALUES (1, '1-15มกราคม', '1', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (2, '16-31มกราคม', '2', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (3, '1-15กุมภาพันธ์', '3', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (4, '16-29กุมภาพันธ์', '4', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (5, '1-15มีนาคม', '5', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (6, '16-31มีนาคม', '6', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (7, ' 1-15เมษายน', '7', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (8, '16-30เมษายน', '8', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (9, ' 1-15พฤษภา่คม', '9', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (10, '16-31พฤษภา่คม', '10', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (11, ' 1-15มิถุนายน', '11', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (12, ' 16-30มิถุนายน', '12', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (13, '1-15กรกฎาคม', '13', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (14, '16-31กรกฎาคม', '14', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (15, '1-15สิงหาคม', '15', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (16, '16-31สิงหาคม', '16', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (17, ' 1-15กันยายน', '17', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (18, '16-30กันยายน', '18', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (19, '1-15ตุลาคม', '19', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (20, '16-31ตุลาคม', '20', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (21, ' 1-15พฤศจิกายน', '21', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (22, '16-30พฤศจิกายน', '22', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (23, '1-15ธันวาคม', '23', '', '', '', '', '', '', '', '', '');
INSERT INTO `horofortninghtly` VALUES (24, '16-31ธันวาคม', '24', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `horomonth`
-- 

CREATE TABLE `horomonth` (
  `horomonth_id` int(11) NOT NULL auto_increment,
  `horomonth_name` varchar(55) NOT NULL,
  `horomonth_name_id` varchar(55) NOT NULL,
  `horomonth_bigen_date` varchar(55) NOT NULL,
  `horomonth_end_date` varchar(55) NOT NULL,
  `horomonth_work` text NOT NULL,
  `horomonth_money` text NOT NULL,
  `horomonth_love` text NOT NULL,
  `horomonth_around` text NOT NULL,
  `horomonth_dothing` text NOT NULL,
  `horomonth_family` text NOT NULL,
  `horomonth_other` text NOT NULL,
  `horoyear_id` varchar(11) NOT NULL,
  PRIMARY KEY  (`horomonth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

-- 
-- dump ตาราง `horomonth`
-- 

INSERT INTO `horomonth` VALUES (1, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '1');
INSERT INTO `horomonth` VALUES (2, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '1');
INSERT INTO `horomonth` VALUES (3, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '1');
INSERT INTO `horomonth` VALUES (4, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '1');
INSERT INTO `horomonth` VALUES (5, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '1');
INSERT INTO `horomonth` VALUES (6, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '1');
INSERT INTO `horomonth` VALUES (7, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '1');
INSERT INTO `horomonth` VALUES (8, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '1');
INSERT INTO `horomonth` VALUES (9, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '1');
INSERT INTO `horomonth` VALUES (10, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '1');
INSERT INTO `horomonth` VALUES (11, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '1');
INSERT INTO `horomonth` VALUES (12, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '1');
INSERT INTO `horomonth` VALUES (13, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '2');
INSERT INTO `horomonth` VALUES (14, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '2');
INSERT INTO `horomonth` VALUES (15, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '2');
INSERT INTO `horomonth` VALUES (16, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '2');
INSERT INTO `horomonth` VALUES (17, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '2');
INSERT INTO `horomonth` VALUES (18, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '2');
INSERT INTO `horomonth` VALUES (19, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '2');
INSERT INTO `horomonth` VALUES (20, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '2');
INSERT INTO `horomonth` VALUES (21, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '2');
INSERT INTO `horomonth` VALUES (22, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '2');
INSERT INTO `horomonth` VALUES (23, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '2');
INSERT INTO `horomonth` VALUES (24, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '2');
INSERT INTO `horomonth` VALUES (25, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '3');
INSERT INTO `horomonth` VALUES (26, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '3');
INSERT INTO `horomonth` VALUES (27, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '3');
INSERT INTO `horomonth` VALUES (28, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '3');
INSERT INTO `horomonth` VALUES (29, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '3');
INSERT INTO `horomonth` VALUES (30, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '3');
INSERT INTO `horomonth` VALUES (31, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '3');
INSERT INTO `horomonth` VALUES (32, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '3');
INSERT INTO `horomonth` VALUES (33, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '3');
INSERT INTO `horomonth` VALUES (34, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '3');
INSERT INTO `horomonth` VALUES (35, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '3');
INSERT INTO `horomonth` VALUES (36, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '3');
INSERT INTO `horomonth` VALUES (37, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '4');
INSERT INTO `horomonth` VALUES (38, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '4');
INSERT INTO `horomonth` VALUES (39, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '4');
INSERT INTO `horomonth` VALUES (40, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '4');
INSERT INTO `horomonth` VALUES (41, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '4');
INSERT INTO `horomonth` VALUES (42, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '4');
INSERT INTO `horomonth` VALUES (43, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '4');
INSERT INTO `horomonth` VALUES (44, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '4');
INSERT INTO `horomonth` VALUES (45, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '4');
INSERT INTO `horomonth` VALUES (46, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '4');
INSERT INTO `horomonth` VALUES (47, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '4');
INSERT INTO `horomonth` VALUES (48, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '4');
INSERT INTO `horomonth` VALUES (49, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '5');
INSERT INTO `horomonth` VALUES (50, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '5');
INSERT INTO `horomonth` VALUES (51, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '5');
INSERT INTO `horomonth` VALUES (52, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '5');
INSERT INTO `horomonth` VALUES (53, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '5');
INSERT INTO `horomonth` VALUES (54, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '5');
INSERT INTO `horomonth` VALUES (55, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '5');
INSERT INTO `horomonth` VALUES (56, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '5');
INSERT INTO `horomonth` VALUES (57, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '5');
INSERT INTO `horomonth` VALUES (58, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '5');
INSERT INTO `horomonth` VALUES (59, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '5');
INSERT INTO `horomonth` VALUES (60, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '5');
INSERT INTO `horomonth` VALUES (61, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '6');
INSERT INTO `horomonth` VALUES (62, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '6');
INSERT INTO `horomonth` VALUES (63, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '6');
INSERT INTO `horomonth` VALUES (64, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '6');
INSERT INTO `horomonth` VALUES (65, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '6');
INSERT INTO `horomonth` VALUES (66, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '6');
INSERT INTO `horomonth` VALUES (67, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '6');
INSERT INTO `horomonth` VALUES (68, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '6');
INSERT INTO `horomonth` VALUES (69, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '6');
INSERT INTO `horomonth` VALUES (70, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '6');
INSERT INTO `horomonth` VALUES (71, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '6');
INSERT INTO `horomonth` VALUES (72, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '6');
INSERT INTO `horomonth` VALUES (73, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '7');
INSERT INTO `horomonth` VALUES (74, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '7');
INSERT INTO `horomonth` VALUES (75, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '7');
INSERT INTO `horomonth` VALUES (76, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '7');
INSERT INTO `horomonth` VALUES (77, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '7');
INSERT INTO `horomonth` VALUES (78, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '7');
INSERT INTO `horomonth` VALUES (79, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '7');
INSERT INTO `horomonth` VALUES (80, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '7');
INSERT INTO `horomonth` VALUES (81, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '7');
INSERT INTO `horomonth` VALUES (82, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '7');
INSERT INTO `horomonth` VALUES (83, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '7');
INSERT INTO `horomonth` VALUES (84, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '7');
INSERT INTO `horomonth` VALUES (85, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '8');
INSERT INTO `horomonth` VALUES (86, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '8');
INSERT INTO `horomonth` VALUES (87, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '8');
INSERT INTO `horomonth` VALUES (88, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '8');
INSERT INTO `horomonth` VALUES (89, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '8');
INSERT INTO `horomonth` VALUES (90, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '8');
INSERT INTO `horomonth` VALUES (91, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '8');
INSERT INTO `horomonth` VALUES (92, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '8');
INSERT INTO `horomonth` VALUES (93, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '8');
INSERT INTO `horomonth` VALUES (94, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '8');
INSERT INTO `horomonth` VALUES (95, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '8');
INSERT INTO `horomonth` VALUES (96, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '8');
INSERT INTO `horomonth` VALUES (97, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '9');
INSERT INTO `horomonth` VALUES (98, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '9');
INSERT INTO `horomonth` VALUES (99, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '9');
INSERT INTO `horomonth` VALUES (100, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '9');
INSERT INTO `horomonth` VALUES (101, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '9');
INSERT INTO `horomonth` VALUES (102, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '9');
INSERT INTO `horomonth` VALUES (103, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '9');
INSERT INTO `horomonth` VALUES (104, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '9');
INSERT INTO `horomonth` VALUES (105, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '9');
INSERT INTO `horomonth` VALUES (106, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '9');
INSERT INTO `horomonth` VALUES (107, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '9');
INSERT INTO `horomonth` VALUES (108, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '9');
INSERT INTO `horomonth` VALUES (109, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '10');
INSERT INTO `horomonth` VALUES (110, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '10');
INSERT INTO `horomonth` VALUES (111, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '10');
INSERT INTO `horomonth` VALUES (112, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '10');
INSERT INTO `horomonth` VALUES (113, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '10');
INSERT INTO `horomonth` VALUES (114, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '10');
INSERT INTO `horomonth` VALUES (115, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '10');
INSERT INTO `horomonth` VALUES (116, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '10');
INSERT INTO `horomonth` VALUES (117, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '10');
INSERT INTO `horomonth` VALUES (118, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '10');
INSERT INTO `horomonth` VALUES (119, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '10');
INSERT INTO `horomonth` VALUES (120, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '10');
INSERT INTO `horomonth` VALUES (121, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '11');
INSERT INTO `horomonth` VALUES (122, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '11');
INSERT INTO `horomonth` VALUES (123, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '11');
INSERT INTO `horomonth` VALUES (124, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '11');
INSERT INTO `horomonth` VALUES (125, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '11');
INSERT INTO `horomonth` VALUES (126, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '11');
INSERT INTO `horomonth` VALUES (127, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '11');
INSERT INTO `horomonth` VALUES (128, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '11');
INSERT INTO `horomonth` VALUES (129, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '11');
INSERT INTO `horomonth` VALUES (130, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '11');
INSERT INTO `horomonth` VALUES (131, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '11');
INSERT INTO `horomonth` VALUES (132, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '11');
INSERT INTO `horomonth` VALUES (133, 'มกราคม', '1', '', '', '\r\n', '', '', '<p>\r\n	sdfsdfsdfsd</p>\r\n', '', '\r\n', 'คนเกิดเดือนมกราคม\r\nเป็นคนค่อนข้างรอบคอบ ระมัดระวังวิตกจริต คิดมากตลอดเวลา ในบางคนก็ชอบเก็บสะสมของเก่า ของโบราณ รู้จักเก็บ มัธยัสถ์ งก ขี้เหนียว เสียดายของ ประหยัด ชอบที่จะแชร์ค่าใช้จ่าย มองกำไรขาดทุนไว้ก่อนเสมอ ดูเหมือนเห็นแก่ตัว แต่จริง ๆ แล้วฉลาดจึงสามารถเป็นนักธุรกิจที่ดีได้ ทะเยอทะยาน ชอบเอาชนะ บางทีก็คิดเล็กคิดน้อยอะไรไม่รู้ เชื่อมั่นในตัวเองสูงมาก ทรหดอดทนเป็นยอดเลยล่ะ โดยเฉพาะในเรื่องงานแล้วล่ะก็บ้างานมาก บ้านจนทำให้บางทีความรักที่มีอยู่จืดไปเลย จะแต่งงานช้าก็เพราะมัวแต่เลือกมากคิดมากอยู่ นั้นแหละ ไม่ค่อยให้ความสำคัญกับความรักสักเท่าไหร่ ถ้างานที่ต้อรับผิดชอบนั้น ยังไม่เสร็จสิ้น เพราะเป็นคนที่มีความรับผิดชอบสูง เป็นนักปฏิบัติ\r\nแต่ในด้านความรัก ก็ใช่ย่อยมีเสน่ห์ล้ำลึกนัก มีความต้องการทางเพศค่อนข้างสูงอยู่เหมือนกัน บางครั้งก็ขี้หงุดหงิดเอาแต่ใจตัวเอง แต่ทำเป็นขรึมเย็นชาซะอย่างนั้นแหล่ะ บางทีก็ชอบเก็บตัวชอบสร้ากำแพง ทำเป็นหยิ่งแต่จริง ๆ กลับเป็นคนง่าย ๆ ไม่มีอะไรหรอก ไม่มีพิษไม่มีภัยกับใคร สงบนิ่ง เจ้าระเบียบซะอีกแน่ะ รักเกียรติยศชื่อเสียงเป็นอย่างยิ่ ทำอะไรไม่ค่อยพึ่งใครชอบทำเอง แต่ก็เป็นคนมีบุญ มักได้คู่ดี\r\n', '12');
INSERT INTO `horomonth` VALUES (134, 'กุมภาพันธ์', '2', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกุมภาพันธ์\r\nมักเป็นคนที่มีอุปนิสัยร่าเริง เพื่อนฝูงมากมาย เพราะเป็นคนที่ตองการมิตรที่แท้จริง แต่ก็มักไม่ค่อยมีเพื่อน และที่สำคัญมีเพื่อนแท้น้อยมาก ชอบอยู่ในแวดวงสังคมที่ดี เพราะเป็นคนที่สามารถยิ้มแย้มแจ่มใสได้กับทุกสถานการณ์ ถึงแม้ว่าตนเองจะทุกข์อยู่ก็ตาม ชอบที่จะทำให้คนอื่นมีความสุข เป็นคนที่ช่างพูดช่างคุย ตีหน้าได้เก่ง มีนิสัยช่างคิดช่างจำแถมยังมีแผนการมากอีกด้วย เชื่อมั่นและมีความเห็นเป็นของตัวเอง ซื่อตรงดี ชอบอิสระไม่ชอบขึ้นกับใคร หรือให้ใครบังคับขู่เข็ญให้ทำ หรืออยู่ใต้การควบคุมของใคร อยากทำอะไรทำเองไม่ต้องมาสั่ง ชอบชีวิตที่เรียบง่ายมากกว่าถึงแม้ว่าตัวจะต้องอยู่ในสังคมก็ตาม เป็นคนที่มีหัวคิดริเริ่มมีไอเดียอะไรดี ๆ และแปลกใหม่อยู่เสมอ เพราะเป็นคนที่ใส่ใจเรียนรู้และสร้างสรรค์ ตามยุคตามสมัยทันเหตุการณ์ของโลกอยู่เสมอ ชอบเปลี่ยนแปลงจนคนรอบข้างตามไม่ทันหรือคิดไม่ถึงก็มี\r\nจริงใจเปิดเผยตรงไป ตรงมา นิสัยไม่ดีคือมักเอาแต่ใจและดื้อรั้นมาก ในบางครั้งก็ดูก้าวร้าวขวานผ่าซากและขี้งอนขี้น้อยอกน้อยใจ เป็นคนที่ชอบสนุกสนาน ชอบช่วยเหลือเพื่อน ทั้งที่ทำคุณกับใครไม่ค่อยขึ้นหรอก คบกับใครก็ได้ ช่างเลือกด้วย แถมไม่ชอบผูกมัดหรือมีพันธะติดกับใคร จึงหาคู่ที่ถูกใจยากออกสักหน่อย', '12');
INSERT INTO `horomonth` VALUES (135, 'มีนาคม', '3', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมีนาคม\r\nเป็นคนที่ชอบเห็นอกเห็นใจชาวบ้าน ชอบช่วยเหลือคนอื่นแล้วก็ไปรับแบกภาระซะอย่างนั้นแหล่ะ เข้ากับคนง่าย ปรับตัวได้ดีมีมนุษย์สัมพันธ์ที่ดี มีจิตใจที่เมตตาโอบอ้อมอารี มีคุณธรรมสูง ชอบสร้างบุญสร้างกุศล แต่มักเป็นคนที่ขี้เหงา ว้าเหว่ หรือไม่ชอบอยู่ในที่แคบ ๆ มักชอบที่จะอยู่ในที่โล่งแจ้งมากกว่า แต่อารมณ์มักอ่อนไหวง่ายมาก ๆ ในบางครั้งก็ขี้หงุดหงิด จิตใจไม่แน่นอน อารมณ์เปลี่ยนไปเปลี่ยนมาเหมือนน้ำ ที่วันนี้ไม่รู้จะอยู่ในโอ่งหรือว่าขวดกันแน่ บางครั้งก็ดูแข็ง\r\nบางทีก็อ่อนไหวง่ายเหลือเกิน ด้วยความใจอ่อนนี่แหล่ะมักทำให้สูญเสียโอกาสดี ๆ ไปเสมอ ดูอ่อนโยนสุภาพแต่ก็มีอารมณ์ที่ก้าวร้าว และปากร้ายได้เหมือนกัน เพราะเป็นคนที่เย็นก็ได้ ร้อนก็ได้ เสียใจง่าย ดีใจง่าย คล้อยตามคนอื่นได้ ไม่ค่อยแข่งขันอะไรกับใคร มักพอใจในสิ่งที่ตนมี เป็นคนที่เชื่อเรื่องโชคลางสิ่งลี้ลับ และชอบที่จะจดจำเรื่องเก่า ๆ หลงรักใครได้ง่าย ๆ และมักจะจมอยู่กับรักเก่า ๆ นั้น แบบพวกมีรักฝังใจไม่ยอมลืม แต่กับบางเรื่องกลายเป็นคนที่ขี้ลืมบ่อย ๆ เหมือนคนแก่ และก็เป็นคนที่ไม่ค่อยใส่ใจใฝ่หาอะไรที่มันใหม่ ๆ ซะด้วยซิ ยกเว้นชอบที่จะซื้อรองเท้าใหม่ ๆ อยู่เรื่อยเลย ว่ากันว่าใครที่เกิดในเดือนนี้เท้าสวยแล้วจิตใจจะดีแถมเป็นคนชอบชิมชอบกิน เสียด้วยซิ', '12');
INSERT INTO `horomonth` VALUES (136, 'เมษายน', '4', '', '', '', '', '', '', '', '', 'คนเกิดเดือนเมษายน\r\nเป็นคนที่มีนิสัยเหมือนเด็ก ๆ อยากรู้ อยากเห็น อยากได้อยากเป็นไปเสียหมด พอรู้พอเห็นแล้วก็เบื่อ ไม่เอาแล้ว อยากได้ของใหม่อีกแล้ว คือ เป็นคนขี้เบื่อเหมือนเด็ก ๆ ไม่ค่อยยอมฟังใครง่าย ๆ กล้าได้กล้าเสียไม่ค่อยกลัวอะไร ลุยลูกเดียว แล้วก็เจ็บ แถมเจ็บไม่รู้จักจำอีกด้วย ชอบกลับไปทำซ้ำใหม่แล้วก็เจ็บอีก บางทีก็ชอบทำเรื่องง่าย ๆ ให้เป็นเรื่องยากได้ จู้จิ้จุกจิกกับเรื่องไม่เป็นเรื่องก็ได้\r\nแต่เป็นคนที่น่าคบนะเพราะเป็นคนที่จริงใจตรง ไปตรงมา ไม่ชอบเอาใจใครหรือเยินยอใคร ชอบไม่ชอบบอกกันตรง ๆ เลย แบบว่าถือของให้ใครก็ไม่เป็น ไม่ชอบผูกมัดชอบอิสระ ชอบที่จะให้คนมาเอาใจมากกว่า และมักจะหึงและหวงคนรักนะ เพราะถ้ามีรักเมื่อไร จะเป็นคนที่รักเดียวใจเดียว รักแบบบริสุทธิ์ใจซะด้วยซิ และมักเป็นคนที่มีความต้องการทางเพศสูงอยู่เหมือนกันนะจ๊ะ\r\nทะเยอทะยานใจร้อน ทำอะไรก็รวดเร็วทันใจ เดินยังดูรีบ ๆ เลย มีอารมณ์รุนแรงขี้โมโหหงุดหงิดง่าย แต่ก็หายเร็ว ทำอะไรหุนหันพลันแล่น อยู่นิ่ง ๆ ไม่เป็นจะอึดอัดหงุดหงิด เครียด ต้องเคลื่อนไหวอยู่ตลอดเวลา เช่น ชอบออกกำลังกาย หรือทำอะไรที่มันดูเป็นภาคสนามสักหน่อย จะสบายใจกว่าให้นั่งเฉย ๆ ใครอยากเป็นแฟนต้องเข้าใจและเอาใจ อย่าปล่อยให้เหงาเชียวแหล่ะ', '12');
INSERT INTO `horomonth` VALUES (137, 'พฤษภา่คม', '5', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤษภาคม\r\nเราจะเห็นว่าเดือนนี้มีสัญลักษณ์เป็นรูปวัวเพราะฉะนั้นต้องเข้าใจก่อนเลยว่า คนที่เกิดในเดือนนี้มักต้องทำเพื่อคนอื่นและต้องอดทนอย่างมาก เหมือนวัวนั่นแหล่ะ ดื้อรั้นเงียบแบบสงบเสียด้วยซิ มักเป็นคนที่ดูจะนิ่ง ๆ ไม่ค่อยแสดงออกสักเท่าไหร่ เป็นคนที่โกรธใครยาก แต่ถ้าโกรธนานเชียว แล้วถ้ามีใครมาแหย่ ให้โกรธเข้าล่ะก็ คุณแกจะกลายเป็นวัวกระทิงทันทีเลยล่ะ\r\nเป็นคนที่รักสวยรักงาม สะอาด รักความเป็นระเบียบเรียบร้อย ทำอะไรถูกกาลเทศะ ความคิด ความอ่านมักค่อนข้างหัวโบราณสักหน่อย เป็นบุคคลที่เปลี่ยนแปลงอะไรยากมาก ๆ เช่น การกิน หรือความเชื่อ ใครบอกก็ไม่เปลี่ยน นอกจากตัวเองจะเปลี่ยนแปลงความคิดหรือการกระทำเอง ไม่ค่อยยืดหยุ่นกับชีวิต ชอบคิดว่าฉันเป็นฉันเอง เป็นคนที่ชอบอยู่นิ่ง ๆ สงบ ๆ อยู่คนเดียวก็ได้ อยู่กับเพื่อน ๆ ก็ได้\r\nโคตรอดทนและบึกบึนมาก งานทำได้ทุกอย่างหนักเอาเบาสู้ได้หมด แถมเป็นคนมัธยัสถ์ ประหยัด ชอบเก็บสะสมทรัพย์สินอีกด้วย เรียกว่าเศรษฐีได้เลย แต่ก็ไม่ค่อยได้ใช้เองหรอกชอบให้คนอื่น ยิ่งถ้าเป็นคนที่ตัวเองรักแล้วล่ะก็...เต็มที่ไปเลย เป็นคนที่อ่อนไหวต่อความรักมาก รักแล้วทุ่มเทเกินเหตุ มักถือดีเรื่องความรักเสมอ หรือจะชื่นชม ให้กำลังใจหน่อยก็จะดี คนเดือนนี้ชอบให้ชมบ่อย ๆ พวกบ้ายอไง', '12');
INSERT INTO `horomonth` VALUES (138, 'มิถุนายน', '6', '', '', '', '', '', '', '', '', 'คนเกิดเดือนมิถุนายน\r\nเป็นคนที่ฉลาดมาก มักคิดอะไรได้รวดเร็วกว่าชาวบ้าน คือ มีความถนัดในการใช้สมองมากกว่ากำลัง ชอบคิดชอบพูด ชอบเขียน อยากรู้ อยากเห็น อยากลอง ต้องการเรียนรู้ทุกสิ่งทุกอย่างบนโลกใบนี้ เพื่อความอยู่รอด จึงมักเป็นคนที่ดูทันสมัยอยู่ตลอดเวลา\r\nและในชีวิตมักมีอะไรเข้ามาทีละสองอย่างเสมอ ทำให้ต้องลำบากใจที่จะต้องเลือก ไม่ว่าจะเป็นความรัก หรือ การงาน ความคิดก็มักลังเล รักพี่เสียดายน้องอยู่นั่นแหล่ะ เป็นคนที่มีความสามารถหลายอย่าง สามารถทำอะไรหรือคิดอะไรได้ หลาย ๆ อย่างในเวลาเดียวกัน บางทีกลายเป็นคนสองบุคลิก หรือ คนสองหน้าได้เหมือนกัน สามารถแก้ปัญหาให้ใครต่อใครได้ในพริบตาเชียวล่ะ เป็นที่ปรึกษาและให้กำลังใจที่ดีเลยคนเดือนนี้น่ะ ชอบท่องเที่ยวไม่ชอบอยู่กับที่นาน ๆ\r\nชอบเปลี่ยนแปลงอะไรต่อมิอะไรอยู่ตลอดเวลา ทำให้ดูเหมือนเป็นคนที่ขาดความอดทน เป็นคนที่ค่อนข้างตรงและเอาแต่ใจตนเอง ไม่ค่อยเก็บความสงสัยเอาไว้ จะถามให้รู้เรื่องไปเลย จะทำอะไรก็เหมือนกันจะต้องทำให้มันสำเร็จ ชนิดไม่เสร็จไม่เลิก มีความว่องไวใจร้อนมากโดยเฉพาะเรื่องงาน ไม่ชอบให้ใครมาจู้จี้ขี้บ่น หรือซักถามยิ่งเวลาไปไหนมาไหน ไม่ต้องถาม ถ้าอยากบอกจะบอกจะเล่าเอง ด้วยความทันสมัยและชอบเที่ยวจึงเป็นผู้ที่ใช้เงินเปลืองมาก', '12');
INSERT INTO `horomonth` VALUES (139, 'กรกฎาคม', '7', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกรกฎาคม\r\nนับได้ว่าเป็นคนอ่อนไหวไวต่อความรู้สึก ระมัดระวังตัวหวาดระแวงตกใจง่ายไม่ค่อยไว้ใจใครง่าย ๆ รักษาผลประโยชน์รู้จักเก็บออมเงินเก่ง (ปูมักจะลากทุกอย่างเข้ารู) ถ้าเจอปัญหาเศร้าทุกข์อะไร จะขอหลบไปก่อน ไม่รับโทรศัพท์ ไม่รับแขก ไม่ยอมเจอใคร แต่พอตั้งสติได้จะค่อย ๆ กลับมาแก้ไขและกลับมาเป็นคนเดิมเอง เป็นคนรักบ้าน\r\nรักครอบครัวมาก ชอบอยู่กับบ้านและทำกิจกรรมที่บ้านมากกว่าให้ออกนอกบ้าน เพราะมันเป็นสิ่งที่ทำให้ชาวกรกฎรู้สึกปลอดภัยและอบอุ่น มีความสุขที่สุด ดูจากภายนอกออกจะแข็งกร้าว ปากแข็งแต่จริง ๆ ภายในอ่อนปวกเปียกมาก ลองดูจากสัญลักษณ์ที่คนโบราณเปรียบเทียบไว้เป็นปูไง มีกระดอง แต่ข้างในนิ่มเชียว มีความอดทนต่อความยากลำบาก ชอบใส่ใจความรู้สึกคนอื่น ไม่ว่าเป็นหญิงหรือชายมักมีความเป็นแม่อยู่ในตัว มีสัญชาตญาณในการให้ ห่วงใยเอื้ออาทร ชอบช่วยเหลือชาวบ้าน เอาอกเอาใจ (เฉพาะ) คนที่ตัวรัก เก็บรายละเอียดได้ดีไม่ว่าจะเรื่องอะไร โดยเฉพาะเรื่องเก่า ๆ หรือพวกรักฝังใจ ไม่ยอมลืม\r\nแต่เจ้าอารมณ์ชะมัดเลยล่ะ จู้จี้จขี้บ่น เจ้าระเบียบ ต้องปล่อยให้บ่นไป เดี๋ยวเหนื่อยก็หยุดไปเองแหละ ต้องระวังเรื่องเครียด เพราะเป็นคนวิตกจริตคิดมาก รักใครแล้วไม่ค่อยปล่อยง่าย ๆ แถมขี้หึงถึงตายเลยล่ะ (ปูหนีบ)', '12');
INSERT INTO `horomonth` VALUES (140, 'สิงหาคม', '8', '', '', '', '', '', '', '', '', 'คนเกิดเดือนสิงหาคม\r\nคนที่เกิดในเดือนนี้เหมือนจ้าวป่าจึงมักจะเริ่ดเชิดหยิ่งไว้ก่อนเดินยังเอา หน้าไปก่อนเลย ไม่ค่อยยอมก้มหัวให้ใครง่าย ๆ ไม่ง้อใครถ้าไม่จำเป็นจริง ๆ ชอบที่จะเป็นหัวหน้า เป็นผู้นำมากกว่าคล้อยตาม ชอบความเป็นอิสระทั้งด้านงานและการใช้ชีวิต\r\nไม่ชอบขึ้นอยู่กับใคร เชื่อมั่นในตัวเองมาก ใจใหญ่ถึงไหนถึงกัน เล็ก ๆ ไม่ ใหญ่ ๆ ทำ รักเกียรติยศชื่อเสียง เสียอะไรไม่ว่า เสียหน้าข้าไม่ยอม ใจร้อนหงุดหงิด ขี้โมโห จริงจังกับชีวิตมากจนกลายเป็นพวกบ้าอำนาจ หรือจอมเผด็จการ ฉลาดหลักแหลม เจ้าปัญญา เจ้าความคิด คิดโน่นนี่ได้ตลอดเวลา แต่บางทีก็ไม่ยอมทำเอง ชอบใช้คนอื่นทำแทน จึงควรเป็นที่ปรึกษานั่นแหล่ะดี เพราะเป็นคนที่ไม่เคยเชื่อใจหรือไว้ใจใครเลย และไม่ค่อยชอบพึ่งใครด้วย รักเฉพาะพวกพ้องพี่น้องและครอบครัวของตัวเอง สามารถเสียสละให้ได้ทุกอย่าง เป็นคนที่อยากให้ทุกคนมารัก อยากให้ทุกคนยอมหรือยกย่องตัวเอง อย่าไปขัดใจหรือโต้แย้ง\r\nปกติใครอยู่ด้วยจะน่ารักมาก เพราะจริง ๆ เป็นคนที่ขี้สงสารและชอบให้อภัย หรือให้โดยไม่ค่อยหวังผลตอบแทน เพียงแต่ไม่ชอบที่จะแสดงความอ่อนแอให้ใครเห็นเท่านั้นเอง เป็นคนที่หาเงินเก่งและก็ใช้จ่ายเก่งด้วย ถ้าพอใจอยากได้อะไรต้องได้จะจ่ายไม่อั้น ยังไงก็ต้องรักษาหน้าไว้ก่อน จะหาคู่ครองต้องเป็นคนใจเย็นเป็นผู้ใหญ่กว่า มีปัญญาที่เหนือกว่าจึงจะอยู่กันได้ หรือไม่ก็อยู่ใต้เท้าคุณสิงหาคมแกไปเลยหมดเรื่อง\r\n', '12');
INSERT INTO `horomonth` VALUES (141, 'กันยายน', '9', '', '', '', '', '', '', '', '', 'คนเกิดเดือนกันยายน\r\nนับว่าเป็นคนที่เฉลียวฉลาด คล่องแคล่วว่องไว มีเสน่ห์ ไม่ว่าเป็นชาย หรือ หญิงมักมีแต่เรื่องหยุมหยิม มีข้อสงสัย หรือ วิเคราะห์ ทุกอย่างจนเกินเหตุ เป็นคนที่เข้าใจยากอยู่สักหน่อย เพราะชอบเอาแต่ใจทำอะไรตามอารมณ์เหมือนผีเข้า ผีออก ไม่แน่นอน คนอื่นอาจจะงง ๆ เหมือนจะประสาทหลอน แต่จริง ๆ แล้วเพราะเป็นคนที่ละเอียดลออ เอามาก ๆ ชอบสังเกต พิถีพิถันออกแนวหัวโบราณ วิตกจริตคิดมากเท่านั้นเอง\r\nช่างคิดช่างฝันช่างจินตนาการ มินิสัยชอบเปลี่ยนแปลงหรือพยายามทำสิ่งต่าง ๆ ที่คนอื่นเขาทำทิ้งไว้ ค้างไว้ ให้เสร็จสมบูรณ์ตามแบบฉบับของตัวเอง พูดง่าย ๆ ก็คือชอบ จู้จี้จุกจิก เจ้าระเบียบ ชอบจับผิดคนเก่งมาก แต่ก็เป็นคนที่มองโลกในแง่ดีนะ ถึงจะชอบจับผิดก็เถอะ แล้วชอบที่จะช่วยเหลือชาวบ้านหรือดันไปแบกรับภาระคนอื่นมา จะดูเหมือนเรื่องมาก และเลือกมากไปเสียทุกเรื่องไม่ว่าจะเป็นการแต่งตัวต้องดูดีก่อนออกจากบ้าน หรืออาหารการกินต้องสะอาด โดยเฉพาะเรื่องความรักมักจะใช้เวลาเลือกค่อนข้างนาน แต่ถ้าได้รักแล้วมักจะรักนานเลยเช่นกัน\r\nเป็นคนที่ขยันทำมาหากินมาก บางครั้งประหยัดจนดูเหมือนขี้เหนียว ช่างพูดช่างเจรจา พูดเก่งและแก้ตัวเก่งอย่างมีเหตุผลเสียด้วยซิ ผิดกับการบอกรักกลับเป็นคนที่ไม่กล้าแสดงออก ขี้อาย ปากแข็งมาก ถ้าคิดจะเอ่ยปากบอกรักใครสักคน เวลารักใครชอบรักจนหมดหัวใจ จึงมักโดนคนที่ตนรักหลอกหรือเอาเปรียบอยู่เสมอ', '12');
INSERT INTO `horomonth` VALUES (142, 'ตุลาคม', '10', '', '', '', '', '', '', '', '', 'คนเกิดเดือนตุลาคม\r\nคนเดือนนี้เป็นคนสุภาพอ่อนโยน นุ่มนวล สะอาดน่ารัก เป็นนักการทูต มีพรสวรรค์ในการเจรจา (กะล่อน) แต่ประนีประนอม หรือ โน้มน้าวจิตใจคนได้ดี เป็นคนค่อนข้างตรงและเอาจริงเอาจัง คิดยังไงก็พูดออกมาอย่างนั้น สามารที่จะโอนอ่อนผ่อนตาม คล้อยตามมากกว่าขัดใจ ใครว่าอะไรก็ว่าด้วย\r\nเป็นคนที่มีเสน่ห์ อยู่ในตัวเอง ถ้าไม่หน้าตาดี บุคลิกก็ต้องดูดีมีราศี สามารถดึงดูดคนให้เข้ามาหาได้อย่างง่ายดาย ในบางคนก็รักสวยรักงานศิลปะ ชอบเข้าสังคมทำอะไรเพื่อสังคม ชอบความสนุกสนานร่าเริง ฟุ้งเฟ้อ ชอบความหรูหรา เป็นคนที่ถ้ารู้จักใคร ถูกชะตาจะรักมาก รักเร็วและทุ่มเทซะเกินเหตุ แต่ถ้านึกอยากจะเลิกก็เลิกเลยแบบไม่มีเหตุผลเช่นกัน เรียกได้ว่ารักง่าย หน่ายเร็ว เป็นคนที่รักพวกพ้องเพื่อนฝูงเอามาก ๆ ใครไม่เป็นพวกข้า ไม่ดีด้วย\r\nจนในบางครั้งดูเหมือนดื้อและก้าวร้าวมาก อารมณ์บางครั้งก็ขึ้น ๆ ลง ๆ จะตัดสินใจทำอะไรได้แต่ละอย่างคิดอยู่นั้นแหล่ะ (ลังเล) ไม่ค่อยเชื่อมั่นในตัวเอง มักต้องรอจังหวะ เหมือนตาชั่ง (สัญลักษณ์) กว่าตาชั่งที่เอียงไปเอียงมาจะตรงหรือสมดุลกันได้ก็เล่นเอานานเหมือนกัน ขยันทำงานฉลาดในการทำธุรกิจ มีความสุขุมรอบคอบและเยือกเย็นได้แต่สิ่งที่ควรระวังก็คือมักเชื่อคนง่าย จึงมักมีสิทธิ์โดนหลอกใช้ได้เหมือนกัน', '12');
INSERT INTO `horomonth` VALUES (143, 'พฤศจิกายน', '11', '', '', '', '', '', '', '', '', 'คนเกิดเดือนพฤศจิกายน\r\nคนเดือนนี้เป็นคนที่ดูแล้วค่อนข้างจะลึกลับ ถ้าไม่สนิทกันจริงไม่ค่อยเล่าเรื่องของตัวเองให้ใครฟัง ค่อนข้างไม่ค่อยไว้ใจใครง่าย ๆ มีความระแวดระวังตัวอยู่ตลอดเวลา เป็นคนที่เก็บความรู้สึกเก่ง เก็บความลับเก่ง ชอบทำตัวลึกลับ มีความในใจซ่อนเร้น มีความสงสัยอยู่ตลอดเวลา มีความทิฐิมานะ วางท่า ไว้ตัว ทำตัวเหมือนหยิ่ง อดทน อดกลั้น แต่ถ้ามีอารมณ์โกรธฉุนเฉียวขึ้นมาล่ะก็ กล้าเผชิญกับทุกสิ่ง จะหนาไหนหรือใหญ่แค่ไหนก็ไม่ค่อยกลัว\r\nช่างประชดประชัน เหน็บแนมเก่งมาก คำพูดคำจาบางทีชอบพูดแรง ๆ ตรงเกินกว่าที่คนรอบข้างจะรับได้ แต่ก็พูดออกมาจากใจจริงของตัวเองนะ เป็นคนขี้งอนใจน้อย อารมณ์แปรปรวน เอาแต่ใจเจ้าอารมณ์ ไม่ค่อยสนใจใส่ใจใคร ดูเหมือนดุร้าย ไม่น่าเข้าใกล้ จนบางครั้งคนรอบข้างจะคิดว่าเป็นบ้า แต่แท้ที่จริงแล้ว ทำไปเพื่อจะป้องกันหรือปิดบังอะไรบางอย่าง ที่เป็นปมด้อยในตัวเองที่ไม่อยากให้ใครรู้ เป็นคนฉลาดเจ้าความคิดจะตายไป ชอบพลิกแพลงเอาชนะด้วยมันสมอง ไม่ค่อยชอบใช้กำลังสักเท่าไร มักมีเล่ห์เหลี่ยมชั้นเชิงในการทำธุรกิจ\r\nด้านความรักก็มักแต่งงานช้า หรือหาคนถูกใจยากสักหน่อย เพราะมัวแต่ขี้ระแวงอยู่นั่นแหล่ะ และไม่ค่อยชอบให้ใครมาจู้จี้มากนัก มีโลกส่วนตัวสูง แต่ก็เข้าได้กับทุกคนนะ เพียงแต่คนอื่นอ่านไม่ค่อยออก ก็เท่านั้นเอง', '12');
INSERT INTO `horomonth` VALUES (144, 'ธันวาคม', '12', '', '', '', '', '', '', '', '', 'คนเกิดเดือนธันวาคม\r\nด้วยความชอบผจญภัยให้อยากอยู่บ้านแทบตาย ยังไงก็ต้องมีเหตุอันให้ต้องออกจากบ้านจนได้ ในชีวิตมักต้องไปได้ดีเอาไกลบ้าน ไกลเมือง ไกลถิ่นฐานที่เกิด หรือได้คนรักในแดนไกลแล้วชีวิตจะดีกว่า เป็นคนที่มักโชคดีเรื่องการเงิน เป็นคนอารมณ์ดี ขี้เล่นชอบพูด ชอบเล่าอะไรสนุกสนาน\r\nจนในบางครั้งเกินความเป็นจริงไปซะไกลเลยเชียว ชอบที่จะเรียนรู้อะไรใหม่ ๆ เพิ่มเติมจากที่ตัวเองรู้ ชอบพัฒนาชอบสำรวจ สามารถให้คำปรึกษากับคนรอบข้างได้ดี เพราะเป็นผู้รอบรู้และเป็นนักวางแผนที่ดีได้ เป็นคนที่ฉลาดและรอบคอบ คิดสร้างสรรค์อะไรมักจะไปเจริญหรือเป็นจริงได้ในอนาคต คือมีความคิดที่ก้าวไกลกว่าคนอื่น ๆ เหมือนหยั่งรู้อนาคตได้ยังงั้นแหล่ะ\r\nสามารถแก้ไขปัญหาได้ดี มีรสนิยมดีตรงไปตรงมาและ จริงใจ ชอบการเดินทาง เปิดหูเปิดตา ชอบกีฬา เรียกว่าอยู่นิ่ง ๆ ไม่ค่อยเป็น และชอบที่จะเป็นอิสระมากว่ามีเจ้านายคอยควบคุม อยากจะแสดงความสามารถที่มีอยู่ให้ใคร ๆ เห็นมากกว่า ชอบแหกกฎ อาจเป็นได้ว่าความถือดีว่าตัวเองมีปัญญาฉลาดกว่าคนอื่น เป็นคนที่โกรธง่ายหายเร็ว แต่อย่าย้ำซ้ำเติมความผิด ของเก่านะ จะไม่ค่อยยอมรับผิดหรือแกล้งทำเป็นไม่รู้ไม่ชี้ด้วยเลยล่ะ ทำให้เราเสียอารมณ์เปล่า ๆ ด้านความรักเป็นคนที่ไม่ชอบแฟนขี้หง ถ้าให้อิสระ คนเดือนนี้จะรักตายเลยล่ะ', '12');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `horoyear`
-- 

CREATE TABLE `horoyear` (
  `horoyear_id` int(11) NOT NULL auto_increment,
  `horoyear_name` varchar(55) NOT NULL,
  `horoyear_name_id` varchar(11) NOT NULL,
  `horoyear_work` text NOT NULL,
  `horoyear_money` text NOT NULL,
  `horoyear_love` text NOT NULL,
  `horoyear_around` text NOT NULL,
  `horoyear_dothing` text NOT NULL,
  `horoyear_family` text NOT NULL,
  `horoyear_other` text NOT NULL,
  PRIMARY KEY  (`horoyear_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- dump ตาราง `horoyear`
-- 

INSERT INTO `horoyear` VALUES (1, 'ปีชวด', '1', '', '', '', '', '', '', 'คนเกิดปีชวด - หนู  ปีชวดเป็นเทวดาผู้ชาย ธาตุน้ำ มิ่งขวัญตกอยู่ที่ต้นมะพร้าว และต้นกล้วย\r\n            ผู้ใดเกิดปีชวด ชันษาตกอยู่ที่หัวพรหม พฤหัสบดีเป็นปาก เจรจาโอหัง พูดจาเด็ดขาด เจรจากับขุนนางท้าวพระยาดี จะไปทิศใดมีผู้กลัวเกรงคอยต้อนรับ พระจันทร์กับพระพุธเป็นมือ ทำงานละเอียดมิได้ เป็นคนมีมานะอุตสาหะดี พระอาทิตย์เป็นใจ ใจไม่แน่นอนเรรวนคบกับคนดีได้ คบกับคนชั่วก็เป็นคนชั่วได้ พอใจเล่าเรียนวิชาความรู้ต่าง ๆ มีวิชาความรู้พอประมาณพอเลี้ยงตัวได้ พระพฤหัสบดีกับพระเสาร์เป็นเท้า มักเป็นคนชอบเดิน ไม่อยู่กับที่มักไปต่างแดน พระศุกร์เป็นที่นั่งเป็นคนหมกมุ่น คิดแต่ในเรื่องตัณหาเป็นคนราคะแรง ถ้าเป็นชายท่านว่ามีบาปติดตัวมาแต่กำเนิด เมื่อน้อยอาภัพ พึ่งญาติผู้ใดมิได้ ต่อภายหน้าจะมีบุญวาสนา จะได้เป็นใหญ่กว่าเพื่อนฝูงทั้งปวง อาสาขุนนางท้าวพระยาจะได้ความชอบ ถ้าเป็นหญิงมักเกิดเป็นโรคาพยาธิต่าง ๆ อาภัพผัวใจแข็ง ปากกล้า\r\n            ได้เมื่อพระเตมีย์ใบ้ พระราชบิดาสั่งให้นายสารถีจับใส่รถเอาไปฝังเสียทั้งเป็นในป่า ให้เกรงจะเจ็บป่วยนานจึงจะหาย\r\n            คนเกิดปีชวด  เดือนห้า เดือนหก เดือนเจ็ด ตกหนูท้องขาว ธาตุน้ำทะเล เป็นหนูคาบแก้ว มีปัญญา ในอ่อน ทำราชการจะได้เป็นใหญ่ มี ช้าง ม้า ข้าไทย ทำเรือกสวนไร่นา ค้าขาย จะมีทรัพย์มาก เป็นพระสงฆ์จะได้เป็นเจ้าวัด ชอบไปอยู่เมืองอื่นดี จะได้เป็นใหญ่กว่าคนทั้งหลาย\r\n            คนเกิดปีชวด เดือนแปด เดือนเก้า เดือนสิบ  ตกหนูหริ่ง ธาตุน้ำคลอง มักตกยากเข็ญใจ พูดจาไม่ยั่งยืน ใจบุญ ทำราชการไม่สู้ดี ทำเรือกสวนไร่นา พอมีอันจะกินเทียบท่าน\r\n            คนเกิดปีชวด เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกหนูผี ธาตุน้ำป่า มักเข็ญใจ ใจบาป ทำราชการชอบใจเจ้านายดี ทำไร่นาค้าขาย จะมีอันจะกินเทียมท่าน\r\n            คนเกิดปีชวด เดือนยี่ เดือนสาม เดือนสี่ ตกหนูพุก ธาตุน้ำคนตัก ทำราชการพอเทียมเพื่อน ทำเรือกสวนไร่นาค้าขายดี มีลูกมาก ใจบุญ ชอบไปอยู่ต่างประเทศ จึงจะได้ดี\r\n            คนเกิดปีชวด วันอาทิตย์ ได้เพื่อพระยาสัตลุง จะถูกนำตัวไปฆ่า ไม่ดี ย่อมมีพิษ แต่รูปงาม\r\n            คนเกิดปีชวด วันจันทร์ จะมีความสุข มีลูกมาก ดีนัก\r\n            คนเกิดปีชวด วันพฤหัสบดี ได้เมื่อเทวดาชุบ พระยาสัตลุง ให้เป็นขึ้นมา ดีนัก\r\n            คนเกิดปีชวด วันศุกร์ ได้เมื่อเทวดาแต่งโภชนาหารมาเลี้ยงพระยาสัตลุง ดีนัก\r\n            คนเกิดปีชวด วันเสาร์ ได้เมื่อพระยาสัตลุงกลับคืนมาครองราชสมบัติ ดีนักแล');
INSERT INTO `horoyear` VALUES (2, 'ปีฉลู', '2', '', '', '\r\n', '', '', '', ' คนเกิดปีฉลู - วัว  เป็นมนุษย์ผู้ชาย ธาตุดิน มิ่งขวัญตกอยู่ที่ต้นตาล\r\n            ผู้ใดเกิดปีฉลู ชันษาตกอยู่ที่ปากพรหม พระเสาร์เป็นปาก เจรจาโอหัง รู้หลักนักปราชญ์ มักชอบเจรจาเรื่องราวต่าง ๆ ของคนอื่น เล่าเรียนวิชาต่าง ๆ ดี เจรจาหลักแหลม พระอังคารกับพระพฤหัสบดีเป็นมือ ทำการงานมิสู้จะดี พระอาทิตย์เป็นใจ เป็นคนฉลาด เข้าใจเรื่องราวต่าง ๆ ได้ง่าย และเข้าใจในทางถ้อยความ พอใจคบหาสมณะ และเจ้านาย ไปไหนมักไปด้วยยวดยานพาหนะ พระเสาร์เป็นที่นั่งเป็นคนมีตัณหาแรง ถ้าเป็นชายมักจะมีเมียมาก ถ้าเป็นหญิงมักมีตำหนิในที่ลับ ถ้าเป็นชายมักเจรจาชอบในหญิง เป็นคนใจอ่อน ใจบุญ ถ้าเป็นหญิงมักหย่าผัว\r\n            ได้เมื่อพระมหาชนกลามารดาไปค้าขาย สำเภาแตก ว่ายน้ำอยู่เจ็ดวัน นางมณีเมขลาจึงอุ้มพาเหาะไปยังอุทยานหลวง ไปค้าขายต่างเมืองจะได้ลาภทรัพย์สินเงินทอง ผ้าผ่อนอันพึงใจ\r\n            คนเกิดปีฉลู เดือนห้า เดือนหก เดือนเจ็ด ตกวัวป่า ใช้ยาก ธาตุดินสุก ทำราชการจะได้เป็นมนตรี มีพี่น้องเผ่าพันธุ์มาก ใจแข็ง จะมีทรัพย์สินเงินทองมาก เมื่อน้อยดี ทำเรือกสวนไร่นาค้าขายแต่พอประมาณ\r\n            คนเกิดปีฉลู เดือนแปด เดือนเก้า เดือนสิบ ตกวัวคนอาศัย ธาตุดินตม ใจแข็ง เมื่อน้อยดี ครั้นใหญ่มาเจรจาใช้มิได้ รู้ทำกินดี มีปัญญา ทำไร่นา ค้าขายดี ทำราชการดีมีทรัพย์มาก\r\n            คนเกิดปีฉลู เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกวัวเปลี้ย หากินยาก ธาตุดินจอมเขา ทำราชการพอคุ้มตัว ทำสวนไร่นา พอมีกินเทียมเพื่อน มีปัญญา ใจกุศล\r\n            คนเกิดปีฉลู เดือนสอง เดือนสาม เดือนสี่ ตกวัวอุสุภราช  ธาตุดินสุกอุดม ทำราชการจะได้เป็นใหญ่ มีบริวารมาก ทำเรือกสวนไร่นาจะมีทรัพย์มาก ถ้าค้าขายดี จะมีทรัพย์มาก\r\n            คนเกิดปีฉลู วันอาทิตย์ วัวขวัญร้าย อาภัพ เบียดเบียนทรัพย์ท่านมิดี\r\n            คนเกิดปีฉลู วันจันทร์ วัวพระโพธิสัตว์ มีบริวารมาก ดีนัก\r\n            คนเกิดปีฉลู วันอังคาร วัวสาธารณ์ อาภัพ มิดี\r\n            คนเกิดปีฉลู วันพุธ วัวขาหักและตาบอด หาเลี้ยงตัวยาก มิดี\r\n            คนเกิดปีฉลู วันพฤหัสบดี วัวขวัญดี มีทรัพย์มาก ดีนัก\r\n            คนเกิดปีฉลู วันศุกร์ วัวพ่อแม่ตายต้องทำงานเหนื่อย มิดี\r\n            คนเกิดปีฉลู วันเสาร์ วัวโจรฆ่ากิน จะต้องลำบากมาก มิดี');
INSERT INTO `horoyear` VALUES (3, 'ปีขาล', '3', '', '', '', '', '', '', ' คนเกิดปีขาล - เสือ   เป็นผีเสื้อผู้หญิง ธาตุไม้ มิ่งขวัญตกอยู่ที่ต้นขนุนลำมะลอ และต้นรัง\r\n            ผู้ใดเกิดปีขาล ชันษาตกที่บ่าพรหม พระอังคารเป็นปาก เจรจากระด้าง มักพูดโอหัง ชอบเจรจาแต่เรื่องหญิง และมักเจรจาตลกคะนอง เป็นคนทำตัวไม่เป็นทุกข์อยู่เสมอ พระพุธกับพระศุกร์เป็นมือ เป็นคนชอบการช่างต่าง ๆ พระพฤหัสบดีเป็นใจ ตั้งมั่นอยู่ในศีลธรรม มักชอบเรียนวิชาความรู้ต่าง ๆ พระเสาร์กับพระจันทร์เป็นเท้ามักเป็นคนต้องเดิน ถ้าทำราชการมักจะถูกย้ายเนือง ๆ ถ้าค้าขายติดต่อการค้าขายกับต่างแดน หรือต่างเมืองจึงจะดี  พระอาทิตย์เป็นที่นั่งมักมีตำหนิในที่ลับ เป็นคนชอบกามารมณ์ ถ้าเป็นหญิงมักมีสองผัว\r\n            ได้เมื่อพระสุวรรณสามอยู่ป่า ตักน้ำขึ้นตั้งบนหลังกวางเอามาเลี้ยงบิดามารดาซึ่งตามืด อยู่ในบรรณศาลากลางป่า ท่านว่าจะได้ลาภข้าวของเงินทอง แต่ญาติพี่น้องของตน ดีนัก\r\n            คนเกิดปีฉลู เดือนห้า เดือนหก เดือนเจ็ด ตกเสือดาว ธาตุไม้แห้ง ทำราชการจะได้เป็นมนตรี จะตกยากครั้งหนึ่ง ทำเรือกสวนไร่นาค้าขายดี เจรจาซื่อสัตย์ ดีนัก\r\n            คนเกิดปีขาล เดือนแปด เดือนเก้า เดือนสิบ ตกเสือเหลือง ธาตุไม้หอมมีแก่น ทำราชการมิสู้ดี ทำเรือกสวนไร่นาดี จะมีลูกมีบุญ จะได้พึ่งพาอาศัย จะมีวาสนาเมื่อแก่\r\n            คนเกิดปีขาล เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกเสือปลา ธาตุไม้หอมมีแก่น ทำราชการจะได้กินบ้านกินเมือง ทำเรือกสวนไร่นามาค้าขาย จะได้เป็นเศรษฐี เจรจาซื่อสัตย์ ดีนัก\r\n            คนเกิดปีขาล เดือนยี่ เดือนสาม เดือนสี่ ตกเสือโคร่ง ธาตุไม้จอมเขา ทำราชการอาสาขุนนางดี มีปัญญา ทำเรือกสวนไร่นาดี จะมีกินเทียมเพื่อน\r\n            คนเกิดปีขาล วันอาทิตย์ เสืออยู่ถ้ำ อดอาหาร หากินกันดาร มิดี\r\n            คนเกิดปีขาล วันจันทร์ เสือติดจั่น จะได้รับทุกข์มาก จะต้องลำบาก มิดี\r\n            คนเกิดปีขาล วันอังคาร เสือกินคน มักมีโทสะมาก ใจดุร้าย มิดี\r\n            คนเกิดปีขาล วันพุธ เสือจำศีล ใจบุญ ดีนัก\r\n            คนเกิดปีขาล วันพฤหัสบดี เสือฤษีชุบ มีบุญ ภายหลังจะได้เป็นใหญ่\r\n            คนเกิดปีขาล วันศุกร์ เสือตกเหว อาภัพมิดี จะต้องลำบาก\r\n            คนเกิดปีขาล วันเสาร์ เสือเทพารักษ์ ดีนัก');
INSERT INTO `horoyear` VALUES (4, 'ปีเถาะ', '4', '', '', '', '', '', '', ' คนเกิดปีเถาะ - กระต่าย   เป็นมนุษย์ผู้หญิง ธาตุไม้ มิ่งขวัญตกอยู่ที่ต้นมะพร้าวมาลิเก และต้นงิ้ว\r\n            ผู้ใดเกิดปีเถาะ ชันษาตกอยู่ที่บ่าพรหม พระพุธเป็นปาก ปากนั้นอาภัพ เจรจาไม่สู้ไพเราะพูดจาเอาใจคนไม่เป็น พระพฤหัสบดีกับพระเสาร์เป็นมือ ทำการงานดี ฝีมือเรียบร้อยดีมาก พระศุกร์เป็นใจ กล้าหาญ ชอบอาสาขุนนางเจ้านาย แต่ตัวอาภัพ แต่ว่ามีคนรักมาก หากินพอเลี้ยงตัวได้ พระอาทิตย์กับพระจันทร์เป็นเท้า มักต้องเดินทางไกลอยู่เสมอ พระจันทร์เป็นที่พึ่ง เป็นคนกามราคะน้อย ไม่สู้สนใจในเรื่องหญิง และในการชู้สาว ถ้าเป็นหญิงมักมีสามผัว\r\n            ได้เมื่อพระเนมิราชไปเยือนเมืองสวรรค์-เมืองนรก ถ้าไปจากที่เกิดจะได้ดี จะมีทรัพย์สินเงินทองมาก ถ้าคบคนต่ำศักดิ์จะเสียเงินทอง\r\n            คนเกิดปีเถาะ เดือนห้า เดือนหก เดือนเจ็ด ตกกระต่ายหม้อ ธาตุไม้แห้ง ถ้าทาษจะได้เป็นไท ทำราชการจะได้เป็นขุนนาง ทำสวนไร่นาค้าขายดี ถ้าหญิงจะได้เป็นคุณท้าวคุณจอม\r\n            คนเกิดปีเถาะ เดือนแปด เดือนเก้า เดือนสิบ ตกกระต่ายแสนหก ธาตุไม้แก่น ทำราชการจะได้ชื่อเสียงเป็นที่เลื่องลือ เป็นที่ชอบใจท้าวพระยา ทำเรือกสวนไร่นาค้าขาย มิสู้ดี ต่อไปภายหน้า จะมีทรัพย์สินเงินทอง เทียมท่าน\r\n            คนเกิดปีเถาะ เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกกระต่ายเปลี้ย ธาตุไม้หอม มักจะตกระกำลำบาก เข็ญใจ ทำราชการอาภัพ ทำเรือกสวนไร่นาแต่พอกิน มักบาดเจ็บที่ข้อมือข้อเท้า จะมีบุญเมื่อแก่\r\n            คนเกิดปีเถาะ เดือนยี่ เดือนสาม เดือนสี่ ตกกระต่ายในดวงจันทร์ ธาตุไม้จอมเขา ดีนัก ทำราชการจะได้เป็นขุนนาง ท้าวพระยาผู้ใหญ่ ทำสวนไร่นาค้าขายดีนัก ถ้าเป็นหญิงจะได้เป็นเจ้าจอมหม่อมห้าม จะได้เป็นนางบ้านนางเมือง\r\n            คนเกิดปีเถาะ วันอาทิตย์ กระต่ายสาธารณ์ ไฟไหม้ จะต้องตกระกำลำบาก มิดี\r\n            คนเกิดปีเถาะ วันจันทร์ กระต่ายเทวดาเลี้ยง ดีนัก\r\n            คนเกิดปีเถาะ วันอังคาร กระต่ายสาธารณ์ อาภัพ มิดี\r\n            คนเกิดปีเถาะ วันพุธ กระต่ายขาหัก ลำบาก\r\n            คนเกิดปีเถาะ วันพฤหัสบดี กระต่ายสันดร แล่นไปก่อนลูก เป็นคนใจร้อนและใจเร็ว\r\n            คนเกิดปีเถาะ วันศุกร์ กระต่ายพระยา มีบริวารมาก จะได้เป็นใหญ่ ดีนัก\r\n            คนเกิดปีเถาะ วันเสาร์ กระต่ายมีบริวารมาก อุดมดีนัก');
INSERT INTO `horoyear` VALUES (5, 'ปีมะโรง', '5', '', '', '', '', '', '', ' คนเกิดปีมะโรง - งูใหญ่   เป็นเทวดาผู้ชาย ธาตุทอง มิ่งขวัญตกอยู่ต้นงิ้ว และกอไผ่\r\n            ผู้ใดเกิดปีมะโรง ชันษาตกอยู่ที่อกพรหม พระพฤหัสบดีเป็นปาก เจรจาเฉียบแหลมรู้หลักนักปราชญ์ เจรจาได้ถ้อยความ พระศุกร์กับพระอาทิตย์เป็นมือ ทำการงานมักหยาบ เป็นคนไม่มีฝีมือ ทำงานละเอียดมิได้ พระเสาร์เป็นใจ มักมีโทสะมาก โกรธง่ายหายเร็ว แต่ใจบุญ พระจันทร์กับพระพุธเป็นเท้า มักเป็นคนชอบเดิน พระอังคารเป็นที่นั่ง มีตัณหาแรง มักมีตำหนิในที่ลับ มีบุตรจะได้พึ่ง บุตรเป็นคนจะมีวาสนา มีญาติมาก และมีเงินทอง ข้าทาสชายหญิง เจรจาชอบใจสมณชีพราหมณ์ และขุนนางผู้ใหญ่ ถ้าเป็นหญิงมักกำพร้า มีผัวสามคน\r\n            ได้เมื่อพระมโหสถ แก้ปริศนาให้เทวดาฟัง จะมีทรัพย์สินเงินทองมาก ชอบใจหญิงทั้งหลาย ดีนัก จะได้เป็นใหญ่ ทำเรือกสวนไร่นาค้าขาย พอประมาณ ทำราชการมีบ่าวไพร่ บริวารติดตามมาก\r\n            คนเกิดปีมะโรงเดือนห้า เดือนหก เดือนเจ็ด วูนาคราช ธาตุทองอุดม หาศัตรูมิได้ ทำราชการดีนัก จะได้เป็นใหญ่ ทำเรือกสวนไร่นาค้าขายพอประมาณ ทำราชการมีบ่าวไพร่บริวารติดตามมาก\r\n            คนเกิดปีมะโรง เดือนแปด เดือนเก้า เดือนสิบ งูพญางูเหลือม ธาตุทองราคี ทำราชการอาสาขุนนางท้าวพระยามหากษัตริย์ดี ทำเรือกสวนไร่นาค้าขาย พอประมาณ เมื่อหนุ่มมักเข็ญใจ ต่อภายแก่จึงจะได้ดี\r\n            คนเกิดปีมะโรง เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย พญางูมีพิษ ธาตุทองยังชั่ว  ทำราชการอาสาขุนนางท้าวพระยาพอคุ้มตัวได้ ใจดี ใจบุญ ใจใหญ่ เอ็นดูคนเข็ญใจ ทำสวนไร่นาค้าขายแต่พอมีกินเทียมเพื่อน ชอบเป็นพระสงฆ์ เป็นที่ชอบใจขุนนาง\r\n            คนเกิดปีมะโรง เดือนยี่ เดือนสาม เดือนสี่ งูพญางูดิน หาพิษมิได้ ธาตุทองเนื้อดี ทำราชการอาสาขุนนางท้าวพระยาดี จะได้เป็นนายคน มีปัญญา ทำเรือกสวนไร่นาค้าขาย พอมีกินเทียมเพื่อน\r\n            คนปีมะโรง วันอาทิตย์         งูพญานาค มีบริวารมาก ดี\r\n            คนปีมะโรง วันจันทร์           งูสาธารณ์ อาภัพ มิดี\r\n            คนปีมะโรง วันอังคาร          งูมีพิษ ดุร้าย มิดี\r\n            คนปีมะโรง วันพุธ                งูตกเหว จะต้องลำบาก มิดี\r\n            คนปีมะโรง วันพฤหัสบดี    งูสาตราคม คนเอาไปเล่น มิดี\r\n            คนปีมะโรง วันศุกร์               งูคนตีหลังหัก อาภัพ มิดี\r\n            คนปีมะโรง วันเสาร์              งูเทพารักษ์ ดีนัก');
INSERT INTO `horoyear` VALUES (6, 'ปีมะเส็ง', '6', '', '', '', '', '', '', ' คนเกิดปีมะเส็ง - งูเล็ก  เป็นมนุษย์ผู้ชาย ธาตุไฟ มิ่งขวัญตกอยู่ที่กอไผ่ และต้นรัง\r\n            ผู้ใดเกิดมีมะเส็ง ชันษาตกที่ท้องพรหม พระอังคารเป็นปาก เจรจามักเป็นเชิงชู้สาว เป็นที่ชอบใจแก่คนทั้งหลาย พระเสาร์กับพระจันทร์เป็นมือ ทำการงานมักเสร็จเร็ว พระอาทิตย์เป็นใจมักรวนเรไม่แน่นอน พระอังคารกับพระพฤหัสบดีเป็นเท้า มักเดินทางไกลอยู่เสมอ พระพุธเป็นที่นั่ง มีกามารมณ์พอประมาณ ไม่ใคร่ชอบพึ่งใคร ปากอ่อน\r\n            ได้เมื่อพระโพธิสัตว์ ลาพระราชบิดาขึ้นมาแต่เมืองนาคพิภพ มาจำศีลภาวนาอยู่บนจอมปลวก อาลัมพายน์พาเอาตัวไป ถ้าจะหาทรัพย์ให้บอกกล่าวกับต้นไม้ที่เป็นมิ่งขวัญเสียก่อน จึงจะหาทรัพย์ได้ และจะอยู่เย็นเป็นสุข จะได้ลาภผ้าผ่อนเงินทองนานาประการ\r\n            คนเกิดปีมะเส็ง เดือนห้า เดือนหก เดือนเจ็ด ตกงูเห่าตาลาน ธาตุไฟฟ้า ทำราชการดีพอประมาณ พอเลี้ยงตัวได้ ใจบุญ ทำเรือกสวนไร่นาค้าขาย พอทำพอกิน ถ้าเป็นหญิงมักนอกใจผัว ใจร้าย โกรธร้าย\r\n            คนเกิดปีมะเส็ง เดือนแปด เดือนเก้า เดือนสิบ ตกงูกระด้าง ธาตุไฟคนสุม ทำราชการ ชอบทำเรือกสวนไร่นา ค้าขายดี จะมีเงินทองมาก ใจแข็งใจบุญ มีปัญญาดีนัก\r\n            คนเกิดปีมะเส็ง เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกงูเกิดในผ้าขี้ริ้ว ธาตุไฟในหิน ใจดี ใจบุญ ใจเติบ มักเอ็นดูคนเข็ญใจ มีปัญญา ทำราชการอาสาขุนนางท้าวพระยาจะได้ลาภ ทำเรือกสวนไร่นา แต่พอทำพอกิน\r\n            คนเกิดปีมะเส็ง เดือนยี่ เดือนสาม เดือนสี่ ตกพญางูเหลือม ธาตุไฟในแก้ว ทำราชการได้ที่ขุนนางท้าวพระยา จะได้กินเมือง ทำเรือกสวนไร่นาค้าขาย ดีนัก\r\n            คนเกิดปีมะเส็ง วันอาทิตย์        งูหนีไฟลงน้ำ มักจะต้องลำบาก อาภัพ มิดี\r\n            คนเกิดปีมะเส็ง วันจันทร์         งูอยู่รู จะมีความสุข ดีนัก\r\n            คนเกิดปีมะเส็ง วันอังคาร        งูออกหากิน อาภัพ จะตกยาก มิดี\r\n            คนเกิดปีมะเส็ง วันพุธ              งูสาธารณ์ หาเลี้ยงตัวยาก มิดี\r\n            คนเกิดปีมะเส็ง วันพฤหัสบดี  งูเทพารักษ์ อยู่เฝ้าทอง จะได้เป็นใหญ่ จะมีทรัพย์ ดี\r\n            คนเกิดปีมะเส็ง วันศุกร์            งูเฝ้าทรัพย์ จะมีทรัพย์มาก ดีนัก\r\n            คนเกิดปีมะเส็ง วันเสาร์           งูเล่นชู้ ถ้าเป็นชาย มักจะมีเมียมาก ถ้าเป็นหญิง มักจะมีผัวมาก ใจนักเลง');
INSERT INTO `horoyear` VALUES (7, 'ปีมะเมีย', '7', '', '', '', '', '', '', ' คนเกิดปีมะเมีย - ม้า  เป็นเทวดาผู้หญิง ธาตุไฟ มิ่งขวัญตกอยู่ที่ต้นตะเคียน และต้นกล้วย\r\n            ผู้ใดเกิดปีมะเมีย ชันษาตกอยู่ที่มือพรหม พระเสาร์เป็นปาก เจรจาโอหัง มักจะถือดี พระอาทิตย์กับพระอังคารเป็นมือ ทำการงานมิสู้ดี พระจันทร์เป็นใจ ใฝ่สูง มักคิดทำการงานใหญ่โต ซึ่งบางครั้งก็ทำไม่ได้ พระพุธกับพระศุกร์เป็นเท้า เป็นคนมิสู้จะต้องเดินทางไกล พระพฤหัสบดีเป็นที่นั่ง ไม่สู้สนในเรื่องกามารมย์ และเรื่องชู้สาว เมื่อน้อยบิดามารดารักใคร่เอาใจใส่ เป็นคนใจอ่อน\r\n            ได้เมื่อพระจันทกุมาร พระราชบิดาสั่งแก่พราหมณ์ทั้งสี่ ให้เอาบูชากองกุณฑ์ เทวดาลงมาช่วยให้เกิดพายุพัดเป็นจุณไป พราหมณ์ทั้งสี่เจ็บปวดเป็นหนักหนา จะได้เงินทองข้าคน\r\n            คนเกิดปีมะเมีย เดือนห้า เดือนหก เดือนเจ็ด ตกม้ามณีกาศ ธาตุไฟป่า มักตกเข็ญใจ ทำราชการพอประมาณ ทำเรือกสวนไร่นาค้าขายพอมีพอกิน พอเลี้ยงตัวได้ มีปัญญา ใจบุญ\r\n            คนเกิดปีมะเมีย เดือนแปด เดือนเก้า เดือนสิบ ตกม้าคนเลี้ยง ธาตุไฟคนสุม ปากร้าย ถ้าเป็นหญิงมักนอกใจผัว ทำราชการมักผิดเพราะปาก ทำเรือกสวนไร่นาค้าขายดี จะมีเงินทองทรัพย์สิน มีข้าทาสชายหญิงบริบูรณ์\r\n            คนเกิดปีมะเมีย เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกม้ากระจอกเทศ ธาตุไฟในหิน มักเข็ญใจ ทำราชการมิสู้ดี ทำเรือกสวนไร่นาค้ขายพอมีอันจะกินเทียมท่านทั้งหลาย\r\n            คนเกิดปีมะเมีย เดือนยี่ เดือนสาม เดือนสี่ ตกม้าอาชาไนย ธาตุไฟในแก้ว เป็นม้าพระยาเลี้ยง ทำราชการอาสาขุนนางท้าวพระยาจะได้เป็นใหญ่ จะมียศฐาบรรดาศักดิ์ มีข้าทาสมาก ทำสวนไร่นาค้าขาย จะได้เป็นเศรษฐี\r\n            คนเกิดปีมะเมีย วันอาทิตย์ ม้าคนเลี้ยง จะมีตบะเดชะดี\r\n             คนเกิดปีมะเมีย วันจันทร์ ม้าเทวดาเลี้ยง จะมีบุญ ดีนัก\r\n             คนเกิดปีมะเมีย วันอังคาร ม้าพระมหากษัตริย์ อุดม ดีนัก\r\n             คนเกิดปีมะเมีย วันพุธ ม้าสาธารณ์ อาภัพ มิดี\r\n             คนเกิดปีมะเมีย วันพฤหัสบดี ม้าพระโพธิสัตว์อุดม แต่จะต้องลำบาก\r\n             คนเกิดปีมะเมีย วันศุกร์ ม้าแม่ตาย อาภัพ มิดี\r\n             คนเกิดปีมะเมีย วันเสาร์ ม้าเสียเส้น จะต้องลำบาก มิดี');
INSERT INTO `horoyear` VALUES (8, 'ปีมะแม', '8', '', '', '', '', '', '', ' คนเกิดปีมะแม - แพะ  เป็นเทวดาผู้หญิง ธาตุทอง มิ่งขวัญตกอยู่ที่ต้นปาริชาติ และต้นไผ่ป่า\r\n            ผู้ใดเกิดปีมะแม่ ชันษาตกอยู่ที่มือซ้ายพรหม พระอาทิตย์เป็นปาก เจรจาเป็นที่ชอบใจแก่คนทั้งหลาย มีสมณชีพราหมณ์เป็นต้น พระจันทร์กับพระพุธเป็นมือทำการงานหยาบ  เอาดีไม่ได้ แต่เป็นคนมีมานะดี พระอังคารเป็นใจ ชอบเรียนวิชาความรู้ต่าง ๆ มีวิชาปานกลาง พอเลี้ยงตัวได้ พระพฤหัสบดีกับพระเสาร์เป็นเท้า มักต้องเป็นคนเดินมาก  พระศุกร์เป็นที่นั่ง เป็นคนมีตัณหาแรง เมื่อน้อยอาภัพ พึ่งผู้อื่นมิได้ เป็นคนปากแข็ง ใจแข็ง\r\n            ได้เมื่อพระพรหมนารอทเสด็จจากพรหมโลก หาบทองลงมายังเมืองมนุษย์ จะได้ทรัพย์สินเงินทอง ผ้าผ่อนแพรพรรณ เพราะเจ้าขุนมูลนาย ทำราชการจะได้เป็นใหญ่เป็นโต มียศฐาบรรดาศักดิ์สูง\r\n            คนเกิดปีมะแม เดือนห้า เดือนหก เดือนเจ็ด ตกแพะหาผลไม้ ธาตุทองมีฝ้า มักตกเข็ญใจ ทำราชการพอปานกลาง ทำเรือกสวนไร่นาค้าขายพอมีอันจะกินเทียมเพื่อน มักชอบเรียนวิชาความรู้ต่าง ๆ มีความรู้พอเลี้ยงตัวได้\r\n            คนเกิดปีมะแม เดือนแปด เดือนเก้า เดือนสิบ ตกแพะคนเลี้ยง ธาตุทองมีราคี ทำราชการดีแต่มักจะเกิดความอยู่เนือง ๆ ทำเรือกสวนไร่นาค้าขายดี เมื่อแก่มีทรัพย์ ใจบุญ\r\n            คนเกิดปีมะแม เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกแพะดาบส ธาตุทองขาว ทำราชการมิสู้ดี ให้เกรงจะเจ็บมือเจ็บเท้า ทำเรือกสวนไร่นาค้าขายมิสู้ดี หาได้ไว้มิคงที่ มีใจกล้าหาญ มีปัญญาดี รู้เท่าทันคน\r\n            คนเกิดปีมะแม เดือนยี่ เดือนสาม เดือนสี่ ตกแพะพระยาเลี้ยง ธาตุทองเนื้อดี ใจอ่อน ทำราชการจะเป็นใหญ่เป็นโต ทำเรือกสวนไร่นาค้าขายดี มีทรัพย์มาก ใจบุญ มีปัญญาดี\r\n            คนเกิดปีมะแม วันอาทิตย์ แพะกลางตลาด หาได้ไว้มิคงมิดี\r\n            คนเกิดปีมะแม วันจันทร์ แพะเศรษฐีเลี้ยง อุดม ดีนัก\r\n            คนเกิดปีมะแม วันอังคาร แพะตาบอด หากิน กันดาร มิดี\r\n            คนเกิดปีมะแม วันพุธ แพะราชครูเลี้ยง มีปัญญา ดีนัก\r\n            คนเกิดปีมะแม วันพฤหัสบดี แพะพระโพธิสัตว์เลี้ยง จะได้เป็นใหญ่ ดีนัก\r\n            คนเกิดปีมะแม วันศุกร์ แพะไม่มีเจ้าของ มักจะต้องลำบาก มิดี\r\n            คนเกิดปีมะแม วันเสาร์ แพะคนตาบอดเลี้ยง จะต้องลำบาก มิดี');
INSERT INTO `horoyear` VALUES (9, 'ปีวอก', '9', '', '', '', '', '', '', ' คนเกิดปีวอก - ลิง   เป็นผีเสื้อผู้ชาย ธาตุเหล็ก มิ่งขวัญตกอยู่ที่ต้นขนุน\r\n            คนเกิดปีวอก  ชันษาตกอยู่ที่ท้องพรหม พระจันทร์เป็นปาก เจรจาหยิ่งยะโส หลักแหลม รู้หลักนักปราชญ์ เล่าเรียนวิชาดีนัก  เป็นที่ชอบใจของสมณชีพราหมณ์  และเจ้านายท้าวพระยา พระอังคารกับ พระพฤหัสบดีเป็นมือ เป็นคนมีฝีมือดี แต่มักทำการเนิ่นช้า พระอาทิตย์เป็นใจ เป็นคนที่เข้าใจเรื่องกฎหมาย และทางถ้อยความต่าง ๆ พระศุกร์กับพระอาทิตย์เป็นเท้า เป็นคนมิค่อยจะสู้เดิน มักจะไปด้วยยานพาหนะ พระเสาร์เป็นที่นั่ง เป็นคนมีตัณหาแรง ถ้าเป็นหญิงมักมีตำหนิในที่ลับ ถ้าเป็นชายมักมากชู้หลายเมีย เป็นคนฝักใฝ่ในเรื่องผู้หญิง เป็นคนปากอ่อนใจบุญ เมียมักจะหน่ายหนี\r\n            ได้เมื่อพระวิธูรบัณฑิต ปุณณกะยักษ์เอาเธอผูกกับหางม้าพระเหาะไปถึงเมืองนาค เธอจึงเทศนาให้พญานาค และปุณณกยักษ์ได้ฟัง จะได้ทรัพย์สินเงินทองข้าวของเพราะขุนนาง ดีนัก\r\n            คนเกิดปีวอก เดือนห้า เดือนหก เดือนเจ็ด ตกลิงลม เลี้ยงยาก ธาตุเหล็กกล้า ทำราชการอาสาขุนนางท้าวพระยา ดีนัก ทำเรือกสวนไร่นาค้าขายมิสู้ดี เป็นคนใจอ่อน จะได้ดีเมื่อแก่\r\n            คนเกิดปีวอก เดือนแปด เดือนเก้า เดือนสิบ ตกลิงพระโพธิสัตว์ ธาตุเหล็กอ่อน ทำราชการจะได้เป็นท้าวพระยา พระ หลวง จะได้กินเมือง ทำเรือกสวนไร่นาค้าขายดี เจรจาซื่อสัตย์ ใจบุญ\r\n            คนเกิดปีวอก เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกลิงป่า ธาตุเหล็กดี เลี้ยงตัวเอง ทำราชการมิสู้ดี ทำเรือกสวนไร่นาค้าขายดี จะมีข้าทาสชายหญิงมาก ใจเป็นทหาร ใจร้อน เป็นคนมักได้\r\n            คนเกิดปีวอก เดือนยี่ เดือนสาม เดือนสี่ ตกลิงแสม ธาตุเหล็กป่า ร้ายนัก ทำราชการพอคุ้มตัวได้ ทำเรือกสวนไร่นา พอเลี้ยงตัวใจ ใจบุญ เจรจาซื่อสัตย์ดี\r\n            คนเกิดปีวอก วันอาทิตย์ ลิงพระยาเลี้ยง ดีนัก จะได้เป็นใหญ่\r\n            คนเกิดปีวอก วันจันทร์ ลิงสาธารณ์ อาภัพ มิดี\r\n            คนเกิดปีวอก วันอังคาร ลิงถูกขังกรงเหล็ก มิดี มักจะมีความทุกข์\r\n            คนเกิดปีวอก วันพุธ ลิงฤษีเลี้ยง ดี มักจะมีความรู้\r\n            คนเกิดปีวอก วันพฤหัสบดี ลิงราชครูเลี้ยง มีปัญญา ดีนัก\r\n            คนเกิดปีวอก วันศุกร์ ลิงพระโพธิสัตว์เลี้ยง ดี จะมีวาสนา\r\n            คนเกิดปีวอก วันเสาร์ ลิงถูกล่ามโซ่ มิดี มักจะต้องโทษ');
INSERT INTO `horoyear` VALUES (10, 'ปีระกา', '10', '', '', '', '', '', '', 'คนเกิดปีระกา - ไก่  เป็นผีเสื้อผู้ชาย ธาตุเหล็ก มิ่งขวัญตกอยู่ที่ต้นยาง และต้นฝ้ายเทศ\r\n            ผู้ใดเกิดปีระกา ชันษาตกอยู่ที่เข้าพรหมด้านซ้าย พระอังคารเป็นปาก เจรจาไม่มีหางเสียง ชอบกล่าวเรื่องราวของผู้อื่น พระพุธกับ พระศุกร์เป็นมือ เป็นคนมีฝีมือในการช่าง เรื่องเย็บปักถักร้อยต่าง ๆ พระพฤหสับดีเป็นใจ ไม่สู้จะฉลาด เล่าเรียนวิชาสิ่งใด ๆ ก็ดี ไม่ค่อยจะมีความทรงจำ พระเสาร์กับ พระจันทร์เป็นเท้า มักเป็นคนชอบเดิน พระอาทิตย์เป็นที่นั่ง เป็นคนมีตัณหาราคะจัด เมื่อน้อยอาภัพ ไร้ญาติพี่น้อง ใจบุญ\r\n            ได้เมื่อพระเวสสันดรพาพระนางมัทรี ชาลี กัณหาไปสู่เขาวงกฏ ทรงบรรพชาเป็นดาบสอยู่กลางป่า อาภัพพ่อแม่ญาติกา แต่ใจดีนัก\r\n            คนเกิดปีระกา เดือนห้า เดือนหก เดือนเจ็ด ตกไก่คนเลี้ยง ธาตุเหล็กดี เมื่อน้อยเข็ญใจ ทำราชการจะได้เป็นใหญ่กว่าคนทั้งปวง ทำเรือกสวนไร่นาค้าขายดี ใจอ่อน สอนง่าย ใจบุญ ถ้าเป็นหญิงมักหลายผัว\r\n            คนเกิดปีระกา เดือนแปด เดือนเก้า เดือนสิบ ตกไก่เถื่อน ธาตุเหล็กอ่อน เลี้ยงยาก เจรจากลับกลอก มีความโกรธร้านดังงูพิษ งูเห่า ทำราชการไม่สู้ดี ทำเรือกสวนไร่นาค้าขายจึงจะดี ใจบุญ มีปัญญา\r\n            คนเกิดปีระกา เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกไก่แจ้สินบน ธาตุเหล็กกล้า ทำราชการพอคุ้มตัวได้ ทำเรือกสวนไร่นาค้าขายพอทำพอกิน เป็นคนเขลา มักตกอับเข็ญใจ แต่ใจบุญ\r\n            คนเกิดปีระกา เดือนยี่ เดือนสาม เดือนสี่ ตกไก่พระยาเลี้ยง ธาตุเหล็กอุดม ทำราชการจะได้เป็นมนตรีผู้ใหญ่ จะมีทรัพย์สินเงินทอง ข้าทาสชายหญิง เป็นคนมีปัญญา ทำเรือกสวนไร่นาค้าขายดีนัก\r\n            คนเกิดปีระกา วันอาทิตย์ ไก่พระยาเลี้ยง สมบูรณ์ดีนัก\r\n            คนเกิดปีระกา วันจันทร์ ไก่หาอาหารมิได้ มักต้องตกยาก\r\n            คนเกิดปีระกา วันอังคาร ไก่พนันเอาเมือง ดีนัก\r\n            คนเกิดปีระกา วันพุธ ไก่พระโพธิสัตว์เลี้ยง ดีนัก จะมีบุญวาสนา\r\n            คนเกิดปีระกา วันพฤหัสบดี ไก่ราชครูเลี้ยง ดีนัก จะมีปัญญาความรู้ เฉลียวฉลาด\r\n            คนเกิดปีระกา วันศุกร์ ไก่คนเลี้ยง มิดี จะได้รับความลำบาก\r\n            คนเกิดปีระกา วันเสาร์ ไก่สมณพราหมณ์เลี้ยง บริบูรณ์ ดีนัก');
INSERT INTO `horoyear` VALUES (11, 'ปีจอ', '11', '', '', '', '', '', '', ' คนเกิดปีจอ - หมา  เป็นผีเสื้อผู้หญิง ธาตุดิน มิ่งขวัญตกอยู่ที่ต้นสำโรง และต้นบัวหลวง\r\n            ผู้ใดเกิดปีจอ ชันษาตกอยู่ที่เท้าขวาของพรหม พระพุธเป็นปาก เจรจากระด้าง เจรจาประเล้าประโลมไม่เป็น แต่พอเอาตัวรอดได้ พระอาทิตย์กับ พระเสาร์เป็นมือ เป็นคนมีฝีมือดี เข้าใจในการช่างต่าง ๆ พระศุกร์เป็นใจ แกล้วกล้า ชอบอาสาขุนนางท้าวพระยาเจ้านาย เป็นที่ชอบใจแก่สมณพราหมณ์ทั้งหลาย แต่ว่าตัวเองมักอาภัพ พระอาทิตย์กับพระอังคารเป็นเท้า เป็นคนมิสู้จะต้องเดิน ไปไหนมาไหนมักไปด้วยยานพาหนะ พระจันทร์เป็นที่นั่งมิสู้จะสนใจเรื่องตัณหา มีราคะไม่รุนแรง มักจะเกิดพยาธิ จะมีข้าทาสชายหญิงพอปานกลาง ที่หน้ามักจะมีแผลเป็น ใจบุญ\r\n            ได้เมื่อพระยาโปริสาท เขี้ยวงอกออกมายาว เพราะได้กินเนื้อมนุษย์ ทำฟุ้งเฟื่อง ถูกเขาขับออกจากเมือง บุญชักให้กลับเข้ามาอยู่ในเมืองอีก ให้เกรงขุนนางจงหนัก จะพลัดพรากจากที่อยู่ที่กิน ถ้าไปอยู่เมืองอื่น จะได้ลาภมาก\r\n            คนเกิดปีจอ เดือนห้า เดือนหก เดือนเจ็ด ตกหมาพระยาเลี้ยง ธาตุดินสุกอุดม เมื่อน้อยมักเข็ญใจ ครั้นเติบใหญ่มากลางคนจะมีทรัพย์มาก ทำราชการอาสาขุนนางพลันได้ดี ทำเรือกสวนไร่นา แต่พอประมาณ\r\n            คนเกิดปีจอ เดือนแปด เดือนเก้า เดือนสิบ ตกหมาคนเลี้ยง ธาตุดินดำ มีปัญญามาก ถ้าตกเข็ญใจ จะได้เป็นไท ทำราชการจะได้เป็นใหญ่ จะได้กินเมือง ทำเรือกสวนไร่นาค้าขายพอเลี้ยงตัวได้ มักทำบุญให้ทาน เจรจาซื่อสัตย์ดีนัก\r\n            คนเกิดปีจอ เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกหมากลางตลาด ธาตุดินจอมเขา ทำราชการพอประมาณ ทำเรือกสวนไร่นาค้าขายดี ใจนั้นมักเป็นทหาร\r\n            คนเกิดปีจอ เดือนยี่ เดือนสาม เดือนสี่ ตกหมาจิ้งจอก ธาตุดินทายุ้ง ทำราชการพอเลี้ยงตัวได้ ทำเรือกสวนไร่นาค้าขายพอจะมีกินเทียมเพื่อน  พอเลี้ยงตัวได้ ใจเป็นทหาร ใจแข็ง\r\n            คนเกิดปีจอ วันอาทิตย์ หมาไล่เนื้อ มักตกยาก มิดี\r\n             คนเกิดปีจอ วันจันทร์ หมาเศรษฐีเลี้ยง สมบูรณ์ ดีนัก\r\n             คนเกิดปีจอ วันอังคาร หมาขี้เรื้อน อาภัพ มิดี\r\n             คนเกิดปีจอ วันพุธ หมาสาธารณ์ อาภัพ มิดี\r\n             คนเกิดปีจอ วันพฤหัสบดี หมามีบริวาร อุดม ดีนัก\r\n             คนเกิดปีจอ วันศุกร์ หมาเศรษฐีเลี้ยง บริบูรณ์ ดีนัก\r\n             คนเกิดปีจอ วันเสาร์ หมาถูกล่ามโซ่ มีดี');
INSERT INTO `horoyear` VALUES (12, 'ปีกุล', '12', '', '', '', '', '', '', ' คนเกิดปีกุน - หมู  เป็นมนุษย์ผู้หญิง ธาตุน้ำ มิ่งขวัญตกอยู่ที่ต้นบัวหลวง และต้นบัวบก\r\n            ผู้ใดเกิดปีกุน ชันษาตกอยู่ที่เท้าซ้ายของพรหม พระพฤหัสบดีเป็นปาก เจรจาหลักแหลม รู้หลักนักปราชญ์ แตมิสู้จะมีผู้เชื่อฟัง พระศุกร์กับพระอาทิตย์เป็นมือ มักจะต้องทำการงานหนัก เหนื่อยมาก พระเสาร์เป็นใจ ใจร้อน ใจเร็ว เป็นคนเจ้าโทสะ โกรธง่ายหายเร็ว ไม่ผูกอาฆาต  พระจันทร์กับพระพุธเป็นเท้า มักเป็นคนชอบเดิน พระอังคารเป็นที่นั่ง ถ้าเป็นหญิงมักมีตำหนิในที่ลับ ถ้าเป็นชายมักจะเป็นชู้เมียท่าน เจรจาเป็นที่ชอบใจสมณชีพราหมณ์ และขุนนางท้าวพระยา\r\n            ได้เมื่อพระศุภมิตร พานางแก้วเกษิณีไปอยู่กลางป่า จากที่เกิดไปอยู่ที่อื่นจะได้ดี จะมีเงินทองมาก\r\n            คนเกิดปีกุน เดือนห้า เดือนหก เดือนเจ็ด ตกหมูเทวดาเลี้ยง ธาตุน้ำสร้าง มิสู้ดี ทำราชการมิสู้ดี ทำเรือกสวนไร่นาค้าขายพอทำกิน  ถ้าไปทำมาหากินต่างเมืองจะดี จะมีเงินทองมาก มีปัญญา ใจบุญ\r\n            คนเกิดปีกุน เดือนแปด เดือนเก้า เดือนสิบ ตกหมูคนเลี้ยงอยู่ในเล้า ธาตุน้ำอาศัย มีญาติกามาก พึ่งผู้อื่นมิได้ ต้องพึ่งตัวเอง ทำราชการมิสู้ดี ทำเรือกสวนไร่นาค้าขายดี ใจบุญนัก ทำกินโดยสัจจะ โดยซื่อ มีปัญญาดีนัก\r\n            คนเกิดปีกุน เดือนสิบเอ็ด เดือนสิบสอง เดือนอ้าย ตกหมูขี้เรื้อน ธาตุน้ำป่า มักตกเข็ญใจ ทำราชการพอประมาณ ทำเรือกสวนไร่นาค้าขาย พอมีอันจะกิน ใจบุญ เจรจาความซื่อสัตย์ดี\r\n            คนเกิดปีกุน เดือนยี่ เดือนสาม เดือนสี่ ตกหมูป่าคาบแก้ว ธาตุน้ำคลอง จับยาก เป็นพญาแก่หมูทั้งหลาย ทำราชการพลันได้ดี ทำเรือกสวนไร่นาค้าขายดี ใจบุญ\r\n            คนเกิดปีกุน วันอาทิตย์ หมูพระยาเลี้ยง จะมีบุญวาสนาดีนัก\r\n            คนเกิดปีกุน วันจันทร์ หมูคนฆ่ากิน มักตกทุกข์ มิดี\r\n            คนเกิดปีกุน วันอังคาร หมูเศรษฐีเลี้ยง จะมีทรัพย์ ดีนัก\r\n            คนเกิดปีกุน วันพุธ หมูสาธารณ์ อาภัพ มิดี\r\n            คนเกิดปีกุน วันพฤหัสบดี หมูราชครูเลี้ยง ดีนัก\r\n            คนเกิดปีกุน วันศุกร์ หมูขาหัก มักเข็ญใจ มิดี\r\n            คนเกิดปีกุน วันเสาร์ หมูมีบริวาร จะได้เป็นมนตรี ดีนัก ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `horozodiac`
-- 

CREATE TABLE `horozodiac` (
  `horozodiac_id` int(11) NOT NULL auto_increment,
  `horozodiac_name` varchar(55) NOT NULL,
  `horozodiac_name_id` varchar(55) NOT NULL,
  `horozodiac_bigen_date` varchar(55) NOT NULL,
  `horozodiac_end_date` varchar(55) NOT NULL,
  `horozodiac_work` text NOT NULL,
  `horozodiac_money` text NOT NULL,
  `horozodiac_love` text NOT NULL,
  `horozodiac_around` text NOT NULL,
  `horozodiac_dothing` text NOT NULL,
  `horozodiac_family` text NOT NULL,
  `horozodiac_other` text NOT NULL,
  `horoyear_id` varchar(11) NOT NULL,
  PRIMARY KEY  (`horozodiac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

-- 
-- dump ตาราง `horozodiac`
-- 

INSERT INTO `horozodiac` VALUES (1, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '1');
INSERT INTO `horozodiac` VALUES (2, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '1');
INSERT INTO `horozodiac` VALUES (3, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '1');
INSERT INTO `horozodiac` VALUES (4, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '1');
INSERT INTO `horozodiac` VALUES (5, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '1');
INSERT INTO `horozodiac` VALUES (6, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '1');
INSERT INTO `horozodiac` VALUES (7, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '1');
INSERT INTO `horozodiac` VALUES (8, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '1');
INSERT INTO `horozodiac` VALUES (9, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '1');
INSERT INTO `horozodiac` VALUES (10, 'ราศีตุลย์ ', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '1');
INSERT INTO `horozodiac` VALUES (11, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '1');
INSERT INTO `horozodiac` VALUES (12, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '1');
INSERT INTO `horozodiac` VALUES (13, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '2');
INSERT INTO `horozodiac` VALUES (14, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '2');
INSERT INTO `horozodiac` VALUES (15, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '2');
INSERT INTO `horozodiac` VALUES (16, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '2');
INSERT INTO `horozodiac` VALUES (17, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '2');
INSERT INTO `horozodiac` VALUES (18, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '2');
INSERT INTO `horozodiac` VALUES (19, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '2');
INSERT INTO `horozodiac` VALUES (20, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '2');
INSERT INTO `horozodiac` VALUES (21, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '2');
INSERT INTO `horozodiac` VALUES (22, 'ราศีตุลย์ ', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '2');
INSERT INTO `horozodiac` VALUES (23, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '2');
INSERT INTO `horozodiac` VALUES (24, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '2');
INSERT INTO `horozodiac` VALUES (25, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '3');
INSERT INTO `horozodiac` VALUES (26, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '3');
INSERT INTO `horozodiac` VALUES (27, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '3');
INSERT INTO `horozodiac` VALUES (28, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '3');
INSERT INTO `horozodiac` VALUES (29, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '3');
INSERT INTO `horozodiac` VALUES (30, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '3');
INSERT INTO `horozodiac` VALUES (31, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '3');
INSERT INTO `horozodiac` VALUES (32, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '3');
INSERT INTO `horozodiac` VALUES (33, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '3');
INSERT INTO `horozodiac` VALUES (34, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '3');
INSERT INTO `horozodiac` VALUES (35, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '3');
INSERT INTO `horozodiac` VALUES (36, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '3');
INSERT INTO `horozodiac` VALUES (37, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '4');
INSERT INTO `horozodiac` VALUES (38, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '4');
INSERT INTO `horozodiac` VALUES (39, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '4');
INSERT INTO `horozodiac` VALUES (40, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '4');
INSERT INTO `horozodiac` VALUES (41, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '4');
INSERT INTO `horozodiac` VALUES (42, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '4');
INSERT INTO `horozodiac` VALUES (43, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '4');
INSERT INTO `horozodiac` VALUES (44, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '4');
INSERT INTO `horozodiac` VALUES (45, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '4');
INSERT INTO `horozodiac` VALUES (46, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '4');
INSERT INTO `horozodiac` VALUES (47, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '4');
INSERT INTO `horozodiac` VALUES (48, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '4');
INSERT INTO `horozodiac` VALUES (49, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '5');
INSERT INTO `horozodiac` VALUES (50, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '5');
INSERT INTO `horozodiac` VALUES (51, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '5');
INSERT INTO `horozodiac` VALUES (52, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '5');
INSERT INTO `horozodiac` VALUES (53, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '5');
INSERT INTO `horozodiac` VALUES (54, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '5');
INSERT INTO `horozodiac` VALUES (55, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '5');
INSERT INTO `horozodiac` VALUES (56, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '5');
INSERT INTO `horozodiac` VALUES (57, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '5');
INSERT INTO `horozodiac` VALUES (58, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '5');
INSERT INTO `horozodiac` VALUES (59, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '5');
INSERT INTO `horozodiac` VALUES (60, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '5');
INSERT INTO `horozodiac` VALUES (61, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '6');
INSERT INTO `horozodiac` VALUES (62, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '6');
INSERT INTO `horozodiac` VALUES (63, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '6');
INSERT INTO `horozodiac` VALUES (64, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '6');
INSERT INTO `horozodiac` VALUES (65, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '6');
INSERT INTO `horozodiac` VALUES (66, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '6');
INSERT INTO `horozodiac` VALUES (67, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '6');
INSERT INTO `horozodiac` VALUES (68, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '6');
INSERT INTO `horozodiac` VALUES (69, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '6');
INSERT INTO `horozodiac` VALUES (70, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '6');
INSERT INTO `horozodiac` VALUES (71, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '6');
INSERT INTO `horozodiac` VALUES (72, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '6');
INSERT INTO `horozodiac` VALUES (73, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '7');
INSERT INTO `horozodiac` VALUES (74, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '7');
INSERT INTO `horozodiac` VALUES (75, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '7');
INSERT INTO `horozodiac` VALUES (76, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '7');
INSERT INTO `horozodiac` VALUES (77, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '7');
INSERT INTO `horozodiac` VALUES (78, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '7');
INSERT INTO `horozodiac` VALUES (79, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '7');
INSERT INTO `horozodiac` VALUES (80, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '7');
INSERT INTO `horozodiac` VALUES (81, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '7');
INSERT INTO `horozodiac` VALUES (82, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '7');
INSERT INTO `horozodiac` VALUES (83, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '7');
INSERT INTO `horozodiac` VALUES (84, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '7');
INSERT INTO `horozodiac` VALUES (85, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '8');
INSERT INTO `horozodiac` VALUES (86, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '8');
INSERT INTO `horozodiac` VALUES (87, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '8');
INSERT INTO `horozodiac` VALUES (88, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '8');
INSERT INTO `horozodiac` VALUES (89, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '8');
INSERT INTO `horozodiac` VALUES (90, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '8');
INSERT INTO `horozodiac` VALUES (91, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '8');
INSERT INTO `horozodiac` VALUES (92, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '8');
INSERT INTO `horozodiac` VALUES (93, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '8');
INSERT INTO `horozodiac` VALUES (94, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '8');
INSERT INTO `horozodiac` VALUES (95, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '8');
INSERT INTO `horozodiac` VALUES (96, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '8');
INSERT INTO `horozodiac` VALUES (97, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '9');
INSERT INTO `horozodiac` VALUES (98, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '9');
INSERT INTO `horozodiac` VALUES (99, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '9');
INSERT INTO `horozodiac` VALUES (100, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '9');
INSERT INTO `horozodiac` VALUES (101, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '9');
INSERT INTO `horozodiac` VALUES (102, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '9');
INSERT INTO `horozodiac` VALUES (103, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '9');
INSERT INTO `horozodiac` VALUES (104, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '9');
INSERT INTO `horozodiac` VALUES (105, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '9');
INSERT INTO `horozodiac` VALUES (106, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '9');
INSERT INTO `horozodiac` VALUES (107, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '9');
INSERT INTO `horozodiac` VALUES (108, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '9');
INSERT INTO `horozodiac` VALUES (109, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '10');
INSERT INTO `horozodiac` VALUES (110, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '10');
INSERT INTO `horozodiac` VALUES (111, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '10');
INSERT INTO `horozodiac` VALUES (112, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '10');
INSERT INTO `horozodiac` VALUES (113, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '10');
INSERT INTO `horozodiac` VALUES (114, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '10');
INSERT INTO `horozodiac` VALUES (115, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '10');
INSERT INTO `horozodiac` VALUES (116, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '10');
INSERT INTO `horozodiac` VALUES (117, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '10');
INSERT INTO `horozodiac` VALUES (118, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '10');
INSERT INTO `horozodiac` VALUES (119, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '10');
INSERT INTO `horozodiac` VALUES (120, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '10');
INSERT INTO `horozodiac` VALUES (121, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '11');
INSERT INTO `horozodiac` VALUES (122, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '11');
INSERT INTO `horozodiac` VALUES (123, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '11');
INSERT INTO `horozodiac` VALUES (124, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '11');
INSERT INTO `horozodiac` VALUES (125, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '11');
INSERT INTO `horozodiac` VALUES (126, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '11');
INSERT INTO `horozodiac` VALUES (127, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '11');
INSERT INTO `horozodiac` VALUES (128, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '11');
INSERT INTO `horozodiac` VALUES (129, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '11');
INSERT INTO `horozodiac` VALUES (130, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '11');
INSERT INTO `horozodiac` VALUES (131, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '11');
INSERT INTO `horozodiac` VALUES (132, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '11');
INSERT INTO `horozodiac` VALUES (133, 'ราศีมังกร', '1', '', '', '', '', '', '', '', '', 'ปี 2553 ที่กำลังจะมาถึงเป็นปีแห่งการต่อสู้ของชาวราศีมังกร เพราะต้องพบการงานที่หนักหน่วง ทำงานจนไม่มีเวลาพักผ่อน อาจเป็นสาเหตุให้ต้องล้มป่วยได้ง่าย ฉะนั้นต้องต่อสู้กับตัวเองอย่างหนักในการดูแลสุขภาพและออกกำลังกายเป็นพิเศษ เรื่องของหัวใจก็ต้องต่อสู้กับรักซ้อนที่จะเข้ามาพิสูจน์หัวใจของคุณว่ามั่น คงในความรักแค่ไหน แต่ถ้าสามารถผ่านพ้นวิกฤติครั้งนี้ไปได้ ความรักของคุณจะดำเนินไปด้วยดีจนถึงขีดสุด เรื่องของวัตถุนอกกายก็เป็นสิ่งที่เย้ายวนใจชาวมังกรเป็นอย่างมาก ต้องสู้กับใจของคุณเอง กำจัดความอยากในสิ่งที่ไม่จำเป็น มิเช่นนั้นจะชักหน้าไม่ถึงหลัง', '12');
INSERT INTO `horozodiac` VALUES (134, 'ราศีกุมภ์', '2', '', '', '', '', '', '', '', '', 'ปี 2553 จะเป็นปีแห่งความสำเร็จทางด้านการงานของชาวราศีกุมภ์ จะได้ทำงานใหม่ๆ ที่ท้าทายความสามารถ หรือเริ่มต้นโครงการที่จะเกิดความสำเร็จสมบูรณ์ ใครที่ตกงานอยู่จะได้รับข่าวดี มีโชคในการสมัครงาน คนที่อยู่ในวัยเรียนจะสมหวังในสิ่งที่ปรารถนา ความรักของคนโสดจะเข้ามาอย่างหวือหวา ต้องศึกษากันให้ถ้วนถี่ มิเช่นนั้นอาจจะพบกับรักลวง สำหรับคนมีคู่ต้องใช้ความไว้ใจเป็นที่ตั้งแล้วจะผ่านอุปสรรคไปได้ด้วยดี สุขภาพระวังการกำเริบของโรคประจำตัว หรือโรคที่เป็นอยู่บ่อยๆ', '12');
INSERT INTO `horozodiac` VALUES (135, 'ราศีมีน', '3', '', '', '\r\n', '\r\n', '', '\r\n', '\r\n', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีมีน จะมีสิ่งใหม่ๆ สิ่งดีๆ เกิดขึ้นมากมาย เริ่มจากการงานที่จะได้ริเริ่มทำงานแปลกใหม่ มีความคิดที่จะทำธุรกิจ ได้หุ้นส่วนที่ดีมีคุณธรรม ได้เพื่อนร่วมงานที่มาช่วยแบ่งเบาและร่วมผลักดันผลงานให้เข้าตาผู้บังคับ บัญชา และผลจากการกรำงานหนักจากปีที่แล้วส่งผลให้ค่าตอบแทนสูงตามไปด้วย คุณจะมีเงินไว้จับจ่ายของชิ้นใหญ่ที่อยากได้มานาน ด้านความรักหวานชื่นกว่าที่เคย นอกจากจะได้เดินทางร่วมกันอย่างสนุกสนานแล้ว คนรักยังจะนำโชคลาภมาสู่คุณอีกด้วย', '12');
INSERT INTO `horozodiac` VALUES (136, 'ราศีเมษ', '4', '', '', '', '', '', '', '', '', 'ในปี 2553 ชาวราศีเมษจะมีอารมณ์ร้อนกว่าปีที่ผ่านมา ฉะนั้นไม่ว่าจะตัดสินใจเรื่องใด ต้องใช้สติเป็นอย่างมาก เรื่องการงานต้องระวังให้ดีถ้าจะมีการเซ็นสัญญาหรือการร่วมทุนระวังจะถูกต้ม ตุ๋น การทำงานกับคนหมู่มากก็ต้องระวังความคิดคำพูดให้จงหนักแล้วทุกอย่างจะดำเนิน ไปได้ด้วยดี เรื่องคาวมรักสำหรับคนมีคู่ต้องใช้หลักน้ำพึ่งเรือ เสือพึ่งป่า ครองรักกันด้วยเมตตาจิต สำหรับคนโสด เมื่อตกหลุมรักใครอย่าปักใจเชื่อแต่แรก รอให้เวลาเป็นเครื่องพิสูจน์ เพราะอาจมีรักลวงเข้ามาทำให้ปวดใจได้ง่ายในปีนี้ สุขภาพโดยรวมดีแต่ต้องระวังโรคที่เกิดจากความเครียด', '12');
INSERT INTO `horozodiac` VALUES (137, 'ราศีพฤษภ', '5', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีอันรุ่งโรจน์ทางด้านการงานของชาวราศีพฤษภ มีความคิดสร้างสรรค์มากล้น นำมาซึ่งความก้าวหน้าทางด้านการงาน จะได้ริเริ่มโครงการใหม่ๆ ได้เป็นหัวหน้า ได้เป็นผู้นำทีม และด้วยการที่ต้องเป็นผู้นำคนอื่นอาจมีเรื่องให้เครียดจากผู้ใต้บังคับบัญชา บ้าง ฉะนั้นต้องปกครองคนด้วยคุณธรรม เอาใจเขามาใส่ใจเรา ในด้านความรักอาจจะมีเวลาให้กันน้อยไปสักนิด เพราะเป็นปีที่กำลังมุ่งมั่นกับการงาน เมื่อใดที่มีเวลาว่างควรหากิจกรรมที่ทำร่วมกันในครอบครัว จะทำให้บรรยากาศดีขึ้นได้ ทางด้านสุขภาพแข็งแรงดี แถมจะอ้วนท้วนขึ้นด้วยเพราะทุ่มเทเวลาให้กับการงานมากไป ควรเจียดเวลาให้กับการออกกำลังกายด้วย', '12');
INSERT INTO `horozodiac` VALUES (138, 'ราศีมิถุน', '6', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีแห่งความสุขของชาวราศีเมถุน เต็มไปด้วยเงินทอง ยศถาบรรดาศักดิ์ นำมาซึ่งความสมบูรณ์ทั้งร่างกายและจิตใจ ได้กินของดีของอร่อย ท่องเที่ยวอย่างสำราญ ในด้านของหัวใจจะชุ่มชื่นกว่าที่เคย คนที่มีคู่จะสุขใจยิ่งขึ้น มีเกณฑ์มีบุตร คนโสดจะตกหลุมรักอย่างง่ายดาย และมีโอกาสพบการพัดหวนของรักเก่า อย่างไรต้องพิจารณาให้ถ้วนถี่ แต่แม้ชีวิตส่วนตัวที่ดำเนินไปด้วยดี แต่อาจมีเรื่องของครอบครัวและบริวารมาให้ร้อนใจบ้างเป็นครั้งคราว แต่ก็ไม่หนักหนา คำแนะนำสำหรับราศีนี้คือหมั่นทำบุญทำทาน เข้าวัดฟังธรรมบ้าง เพราะชีวิตที่มีความสุขเกินไปอาจจะทำให้เกิดความประมาทได้', '12');
INSERT INTO `horozodiac` VALUES (139, 'ราศีกรกฎ', '7', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวกรกฏต้องมีสติอย่างมาก เพราะจะมีอุปสรรคผ่านเข้ามาให้ฝ่าฟัน เริ่มจากเรื่องสุขภาพที่จะต้องดูแลอย่างเคร่งครัด ห้ามละเลย อย่างน้อยต้องหาเวลาไปตรวจสุขภาพบ้าง เรื่องของการงานและความรักจะมีการเปลี่ยนแปลงที่ทำให้ต้องอึดอัดใจ แต่ทั้งหมดนี้จะผ่านเข้ามาและผ่านไปในที่สุด ชีวิตที่สวยงามรอคุณอยู่ที่ปลายทางแน่นอนถ้าคุณมุ่งมั่นที่จะแก้ปัญหา ความสุขในชีวิตของชาวกรกฏในปีนี้จะต้องสร้างขึ้นจากตัวเองเป็นหลักแล้ว ทุกอย่างจะดำเนินไปด้วยดี', '12');
INSERT INTO `horozodiac` VALUES (140, 'ราศีสิงห์', '8', '', '', '', '', '', '', '', '', 'ชาวราศีสิงห์ จะพบความมั่งคั่งในปี 2553 เพราะด้วยพลังความสร้างสรรค์และพลังกายอันเต็มเปี่ยม ทำให้มีงานเข้ามาให้ทำไม่ขาดสาย ยิ่งขยันมากก็ยิ่งได้เงินเยอะ ถือเป็นปีที่จะได้เงินเป็นกอบเป็นกำ ได้ใช้จ่ายคล่องมือ ได้ของที่อยากได้มานาน มีดวงดีในการเสี่ยงโชค จะได้ลาภผลที่คาดไม่ถึง แต่ก็อย่าประมาทกับชีวิตเกินไป เพราะอาจจะมีเรื่องท้าทายเข้ามาทดสอบคุณเช่นกัน ในด้านความรัก ชาวสิงห์มีพลังงานแห่งความสุขสูงมากในปีนี้ คนที่มีคู่จะรักกันหวานชื่น คนโสดจะสมหวัง ไม่ว่าคุณจะอกหักหรือเหงาหงอยมานานก็จะได้ชื่นใจแน่นอน ครึ่งหลังของปีมีโอกาสลุ้นสูง', '12');
INSERT INTO `horozodiac` VALUES (141, 'ราศีกันย์', '9', '', '', '', '', '', '', '', '', 'ปี 2553 ชาวราศีกันต์ต้องก้าวให้ช้าแต่เป็นความช้าที่นำมาซึ่งความมั่นคงในชีวิต ในเรื่องของรายได้ เงินจะไหลมาอย่างช้าๆ แต่สม่ำเสมอ ถ้าอดทนเก็บหอมรอมริบและบริหารเงินอย่างลงตัว คุณจะรวยแบบที่คุณคาดไม่ถึงเลยทีเดียว ในเรื่องของความรักก็เช่นกัน คุณต้องดำเนินชีวิตคู่ให้ช้าลง แต่ก้าวไปข้างหน้าอย่างมั่นคงและมีสติ เร่งสร้างรากฐานครอบครัวให้แข็งแรงเพื่อชีวิตคู่ที่คุณฝันไว้ในอนาคต สำหรับคนโสดคุณจะพบรักอย่างคาดไม่ถึงจากการเดินทาง', '12');
INSERT INTO `horozodiac` VALUES (142, 'ราศีตุลย์', '10', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่เหมาะกับการแก้ไขสิ่งผิดพลาดในปีที่ผ่านมาของชาวราศีตุลย์ เพราะมีโอกาสทางการงานการเงินให้คุณได้เริ่มต้นมากมาย ลองเลือกเป้าหมายมาสักหนึ่งสิ่งและลงมือทำอย่างค่อยเป็นค่อยไป รับรองว่าคุณจะได้ลาภผลและความมั่นคงในชีวิตแน่นอน แต่บนเส้นทางแห่งความสำเร็จคุณอาจสะดุดได้ด้วยอุปสรรคทั้งเรื่องคนและเรื่องงาน แต่ปัญหาทุกอย่างจะคลี่คลายลงได้เพียงแต่คุณต้องค่อยๆ คิดแก้ไขปัญหา อย่ารีบร้อน ส่วนเรื่องความรักจะมีเรื่องการเงินเข้ามาเกี่ยวข้องด้วย ในที่นี้หมายถึงคุณต้องการใช้เงินเพื่อจริงจังกับคนรักหรือสร้างรากฐานครอบครัวให้แข็งแรง', '12');
INSERT INTO `horozodiac` VALUES (143, 'ราศีพิจิก', '11', '', '', '', '', '', '', '', '', 'ชาว ราศีพิจิกที่คิดว่าปีที่แล้วเป็นที่ไม่ดี ปี 2553 ที่กำลังจะมาถึงจะเป็นปีที่ดีของคุณ เต็มไปความสุขสมหวัง ลาภ ยศ สรรเสริญ เด่นมากในเรื่องของความรัก สำหรับใครที่โสด คุณจะได้พบรักแท้ เจอคู่ที่ถูกใจเป็นที่สุด คนที่มีคู่แล้วความรักของคุณจะลงตัวขึ้น มีความพร้อมที่จะสร้างรากฐานครอบครัวให้มั่นคง ในด้านชีวิตการงาน จะก้าวหน้าเป็นอย่างดี โดยเฉพาะการทำงานเป็นทีมจะสำเร็จลุล่วงเป็นพิเศษ และถ้าชาวพิจิกที่คิดริเริ่มงานใหม่ๆ ก็ต้องเริ่มต้นอย่างรอบคอบ เตรียมพร้อมรับความท้าทายที่จะผ่านเข้ามา แต่ปลายทางจะเป็นปลายทางแห่งความสุขแน่นอน', '12');
INSERT INTO `horozodiac` VALUES (144, 'ราศีธนู', '12', '', '', '', '', '', '', '', '', 'ปี 2553 เป็นปีที่ชาวราศีธนูต้องใช้ชีวิตอย่างพอเพียงและไม่ประมาท ในด้านของการงานคุณอาจจะได้ทำงานที่ดี มีรายได้เข้ามามาก แต่ก็มีเรื่องให้ต้องเสียเงินโดยใช่เหตุเช่นกัน จึงอาจมีบางช่วงที่ทำให้เงินขาดมือ แต่ก็ไม่ต้องกังวลให้มากเพราะจะมีคนเข้ามาอุปถัมภ์ให้รอดพ้นวิกฤติได้เสมอ แต่ทางที่ดีควรจะประหยัดการใช้จ่ายจะดีที่สุด ความช่วยเหลือจากคนอื่นจะได้เป็นทางเลือกสุดท้าย ในด้านความรักก็เช่นกันชาวธนูยังคงรักอย่างออมใจ แอบรัก แอบชอบ แต่นั่นก็เป็นสิ่งที่ดีเพราะคนดีๆ ก็ต้องดูกันนานๆ ด้านสุขภาพห้ามประมาทเด็ดขาด หมั่นตรวจสุขภาพ เพราะถ้าปล่อยปละละเลยจะทำให้ล้มหมอนอนเสื่อได้ง่าย', '12');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `hotel_add`
-- 

CREATE TABLE `hotel_add` (
  `id_hotel` int(11) NOT NULL auto_increment,
  `hotel_cat_id` int(11) NOT NULL,
  `name_hotel` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `title_hotel` text NOT NULL,
  `detail_hotel` text NOT NULL,
  `price_hotel` varchar(11) NOT NULL,
  `promotion_hotel` varchar(11) NOT NULL,
  `detail_promotion_hotel` text NOT NULL,
  `update_hotel` datetime NOT NULL,
  `map_hotel` text NOT NULL,
  PRIMARY KEY  (`id_hotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- 
-- dump ตาราง `hotel_add`
-- 

INSERT INTO `hotel_add` VALUES (23, 0, '777', 1, 52, '<p>\r\n	777</p>\r\n', '<p>\r\n	777</p>\r\n', '77', '77', '7777', '2015-01-11 00:00:00', '77');
INSERT INTO `hotel_add` VALUES (24, 0, '', 0, 52, '<p>\r\n	asfasfasdfadsfadsasdsdff</p>\r\n', '<p>\r\n	asdfasdfsdfsd</p>\r\n', '333dd', '33', '333', '2016-01-11 00:00:00', 'dfdf');
INSERT INTO `hotel_add` VALUES (25, 0, '', 0, 52, '<p>\r\n	tes</p>\r\n', '<p>\r\n	tes</p>\r\n', 'tes', 'tes', 'tes', '2016-01-11 00:00:00', 'dd');
INSERT INTO `hotel_add` VALUES (26, 0, '', 0, 52, '<p>\r\n	asdfasdf</p>\r\n', '<p>\r\n	asdfasdfasdf</p>\r\n', 'dfdsfs', 'dfsd', 'fsdf', '2016-01-11 00:00:00', 'adsfs');
INSERT INTO `hotel_add` VALUES (27, 0, '', 0, 52, '<p>\r\n	1111111111</p>\r\n', '<p>\r\n	111111111111</p>\r\n', '11', '111', '111', '2016-01-11 00:00:00', '111111');
INSERT INTO `hotel_add` VALUES (31, 1, 'ห้องนอน', 0, 52, '<p>\r\n	หะำำหห</p>\r\n', '<p>\r\n	หหหหห</p>\r\n', 'หหห', 'หหห', 'หหห', '2016-01-11 00:00:00', 'หหห');
INSERT INTO `hotel_add` VALUES (32, 1, 'ห้องน้ำ', 0, 52, '<p>\r\n	หกด</p>\r\n', '<p>\r\n	ฟหกดหกด</p>\r\n', 'หกดกด', 'หกด', 'หกดหกด', '2016-01-11 00:00:00', 'หกดหกด');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `hotel_book`
-- 

CREATE TABLE `hotel_book` (
  `id_hotel_book` int(11) NOT NULL auto_increment,
  `id_hotel` int(11) NOT NULL,
  `number_hotel_book` varchar(100) NOT NULL,
  `name_hotel_book` varchar(100) NOT NULL,
  `email_hotel_book` varchar(55) NOT NULL,
  `adrees_hotel_book` text NOT NULL,
  `tel_hotel_book` varchar(55) NOT NULL,
  `fax_hotel_book` varchar(55) NOT NULL,
  `begin_hotel_book` datetime NOT NULL,
  `end_hotel_book` datetime NOT NULL,
  `amount_hotel_book` varchar(55) NOT NULL,
  `other_hotel_book` text NOT NULL,
  PRIMARY KEY  (`id_hotel_book`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `hotel_book`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `hotel_cat`
-- 

CREATE TABLE `hotel_cat` (
  `hotel_cat_id` int(11) NOT NULL auto_increment,
  `hotel_cat_name` varchar(100) NOT NULL,
  `hotel_cat_zone` varchar(100) NOT NULL,
  `hotel_cat_province` varchar(100) NOT NULL,
  `hotel_cat_map` text NOT NULL,
  PRIMARY KEY  (`hotel_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `hotel_cat`
-- 

INSERT INTO `hotel_cat` VALUES (1, 'kosit', 'esan', 'kalasin', 'map');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `hotel_pic`
-- 

CREATE TABLE `hotel_pic` (
  `id_pic_hotel` int(11) NOT NULL auto_increment,
  `name_pic_hotel` varchar(100) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY  (`id_pic_hotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

-- 
-- dump ตาราง `hotel_pic`
-- 

INSERT INTO `hotel_pic` VALUES (29, '120_170 key.jpg', 0);
INSERT INTO `hotel_pic` VALUES (30, '120_170 key.jpg', 0);
INSERT INTO `hotel_pic` VALUES (31, '120_170 key.jpg', 0);
INSERT INTO `hotel_pic` VALUES (32, 'b002.jpg', 0);
INSERT INTO `hotel_pic` VALUES (33, '120_170 key.jpg', 0);
INSERT INTO `hotel_pic` VALUES (49, '120_170 key.jpg', 23);
INSERT INTO `hotel_pic` VALUES (51, 'b002.jpg', 23);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `intro_style`
-- 

CREATE TABLE `intro_style` (
  `intro_id` int(11) NOT NULL auto_increment,
  `intro_bg` varchar(255) default NULL,
  `intro_repeat` varchar(255) default NULL,
  `intro_color` varchar(255) default NULL,
  `intro_detail` text,
  PRIMARY KEY  (`intro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `intro_style`
-- 

INSERT INTO `intro_style` VALUES (1, '45-84-thickbox200711010259.jpg', 'repeat-y', '#999966', '<p>\r\n	fdgdf</p>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `job`
-- 

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL auto_increment,
  `job_fullname` varchar(100) NOT NULL,
  `job_position` varchar(100) NOT NULL,
  `job_detail` text NOT NULL,
  `job_address` varchar(255) NOT NULL,
  `job_tel` varchar(55) NOT NULL,
  `job_email` varchar(100) NOT NULL,
  `job_date` varchar(55) NOT NULL,
  `jobcat_id` int(11) NOT NULL,
  PRIMARY KEY  (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `job`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `jobcat`
-- 

CREATE TABLE `jobcat` (
  `jobcat_id` int(11) NOT NULL auto_increment,
  `jobcat_position` varchar(100) NOT NULL,
  `jobcat_title` text NOT NULL,
  `jobcat_detail` text NOT NULL,
  PRIMARY KEY  (`jobcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `jobcat`
-- 

INSERT INTO `jobcat` VALUES (4, 'Web Programmer', 'เขียนเว็บโดยใช้ภาษา php,css', 'อายุ 22 ปีขึ้นไป\r\nจบปริญญาตรีด้านด้าน it');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `knowledge`
-- 

CREATE TABLE `knowledge` (
  `Knowledge_id` int(11) NOT NULL auto_increment,
  `Knowledge_title` varchar(100) NOT NULL,
  `Knowledge_link` varchar(100) NOT NULL,
  `Knowledge_detail` text NOT NULL,
  `Knowledge_title_eng` varchar(255) default NULL,
  `Knowledge_detail_eng` text,
  PRIMARY KEY  (`Knowledge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `knowledge`
-- 

INSERT INTO `knowledge` VALUES (6, 'ความรู้ดีดี', '', '<p>\r\n	ทดสอบเกี่ยวกับการใส่บทความหรือคลังความรู้ต่างๆ</p>\r\n', 'knowledge dd', '<p>\r\n	Test Article content about quick knowledge..</p>\r\n');
INSERT INTO `knowledge` VALUES (7, 'ค้นหาข้อมูล', 'http://www.google.co.th', '\r\n', 'Search ', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `main_menu`
-- 

CREATE TABLE `main_menu` (
  `main_menu_id` int(11) NOT NULL auto_increment,
  `main_menucat_id` int(11) NOT NULL,
  `main_menu_name` varchar(55) NOT NULL,
  `select_type_menu` text NOT NULL,
  `main_menu_name_eng` text NOT NULL,
  `main_menu_detail_eng` text NOT NULL,
  `main_menu_link` varchar(100) NOT NULL,
  `plugin` varchar(100) NOT NULL,
  PRIMARY KEY  (`main_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

-- 
-- dump ตาราง `main_menu`
-- 

INSERT INTO `main_menu` VALUES (52, 1, 'หน้าแรก', 'โอกาสทางธุรกิจ', 'home', '', '', 'index.php?page=home');
INSERT INTO `main_menu` VALUES (53, 1, 'สินค้าทั้งหมด', 'โอกาสทางธุรกิจ', 'product all', '', '', 'index.php?page=product');
INSERT INTO `main_menu` VALUES (56, 1, 'โปรโมชั่น', 'โอกาสทางธุรกิจ', 'promotion', '', 'http://', 'article');
INSERT INTO `main_menu` VALUES (57, 1, 'ติดต่อเรา', 'โอกาสทางธุรกิจ', 'contact', '', '', 'index.php?page=contact');
INSERT INTO `main_menu` VALUES (98, 2, 'เกี่ยวกับเรา', 'บริษัทมาบุญครอง', 'about', '', '', 'article');
INSERT INTO `main_menu` VALUES (99, 0, 'บทความทั่วไป', '', 'article general', '', '', 'article_ge');
INSERT INTO `main_menu` VALUES (100, 0, 'เว็บบอร์ด', '', 'webborad', '', '', 'index.php?page=webboard');
INSERT INTO `main_menu` VALUES (101, 0, 'สมัครสมาชิก', '', 'Register', '', 'http://localhost/wep_polo_type/index.php?page=register', 'link');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `main_menucat`
-- 

CREATE TABLE `main_menucat` (
  `main_menucat_id` int(11) NOT NULL auto_increment,
  `main_menu_namecat_name` varchar(100) NOT NULL,
  `main_menucat_detail` varchar(100) NOT NULL,
  PRIMARY KEY  (`main_menucat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `main_menucat`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member`
-- 

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL auto_increment,
  `member_user` varchar(11) NOT NULL,
  `member_password` varchar(50) NOT NULL,
  `member_fullname` varchar(50) NOT NULL,
  `member_address` varchar(50) NOT NULL,
  `member_district` varchar(50) NOT NULL,
  `member_prefecture` varchar(50) NOT NULL,
  `member_province` varchar(50) NOT NULL,
  `member_post` varchar(5) NOT NULL,
  `member_tel` varchar(11) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

-- 
-- dump ตาราง `member`
-- 

INSERT INTO `member` VALUES (78, 'Thiti S.', 'caroline', 'ฐิติ-สิงห์ทอง', '264/14 หมู่ 3', 'สุรศักดิ์', 'ศรีราชา', 'ชลบุรี', '20110', '082-3330055', 'thiti_singthong@hotmail.com');
INSERT INTO `member` VALUES (79, 'pongkorn', 'Nai17417', 'พงศ์กรณ์-ศาสุข', '29/19 ม.10', 'สุรศักดิ์', 'ศรีราชา', 'ชลบุรี', '20110', '0875366051', 'psasuk@gmail.com');
INSERT INTO `member` VALUES (80, 'korn', '5958636', 'korn-karn', '505/18 M.7', 'maehea', 'muang', 'chiangmai', '50100', '0815958636', '');
INSERT INTO `member` VALUES (81, 'ชัยณรงค์-หน', '1405', 'ชัยณรงค์-หนูพวก', '49/3 หมู่9', 'รางพิกุล', 'กำแพงแสน', 'นครปฐม', '73140', '0822443665', 'manuart_aom@hotmail.com');
INSERT INTO `member` VALUES (89, 'kosit9999', 'kosit9999', 'โฆษิต-อารมณ์สวะ', 'เสรีไทย39', 'บึงกุ่ม', 'บึงกุ่ม', 'กรุงเทพ', '10310', '0854096101', 'support@workphp.com');
INSERT INTO `member` VALUES (101, 'www.polosuc', 'vissanee', 'vissanee-wongpunya', '255/45 ม.1', 'บึงกาฬ', 'บึงกาฬ', 'หนองคาย', '43140', '0859564653', '');
INSERT INTO `member` VALUES (102, 'www.polosuc', '9823', 'อิสรา-ฝ้ายเครือ', '433/114', 'หน้าเมือง', 'เมือง', 'ราชบุรี   ', '70000', '081 3785574', 'ISARA366@mail.com');
INSERT INTO `member` VALUES (106, 'pb999', 'pb999', 'Suttinan-sittichotiphun', '322', 'สันทรายหลวง', 'สันทราย', 'เชียงใหม่', '50210', '087-5955-94', 't-hanasit@hotmail.com ');
INSERT INTO `member` VALUES (107, 'pen99', 'pen99', 'เพ็ญพิมล-บัญชาอิทธิวัฒน์', '47/46', 'คลองสามวา', 'สามวาตะวันออก', 'กรุงเทพ', '10510', '085-1616645', 't-hanasit@hotmail   thanasit072@gmail.com');
INSERT INTO `member` VALUES (108, 'Bank53', '1629', 'นายรวีโรจน์-มีสุข', '131 หมู่ 4', 'เหมืองแก้ว', 'แม่ริม', 'เชียงใหม่', '50180', '084-8675652', 'www.yumon53kl@gmail.com');
INSERT INTO `member` VALUES (109, 'kosit2', 'kosit2', 'kosit2-vkosit2', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member_upline`
-- 

CREATE TABLE `member_upline` (
  `member_id` int(55) NOT NULL auto_increment,
  `member_name_upline` varchar(55) NOT NULL,
  `member_user_upline` varchar(55) NOT NULL,
  `member_id_upline` varchar(55) NOT NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

-- 
-- dump ตาราง `member_upline`
-- 

INSERT INTO `member_upline` VALUES (58, 'ธนาสิทธิ-', 'tanasit', '999');
INSERT INTO `member_upline` VALUES (59, 'thanasit-sittichotiphun', 'thanasit072', '1000');
INSERT INTO `member_upline` VALUES (60, 'ธนะสิทธิ์-สิทธิโชติพันธ์', 'www.polosuccess.com/pb999/', '1001');
INSERT INTO `member_upline` VALUES (61, '555-555', 'nong4', '1002');
INSERT INTO `member_upline` VALUES (62, 'ฐิติ-สิงห์ทอง', 'Thiti S.', '1003');
INSERT INTO `member_upline` VALUES (63, 'พงศ์กรณ์-ศาสุข', 'pongkorn', '1004');
INSERT INTO `member_upline` VALUES (64, 'korn-karn', 'korn', '1005');
INSERT INTO `member_upline` VALUES (65, 'ชัยณรงค์-หนูพวก', 'ชัยณรงค์-หนูพวก', '1006');
INSERT INTO `member_upline` VALUES (66, 'tt-ttt', 'ttt', '1007');
INSERT INTO `member_upline` VALUES (67, 'tt-tt', 'ttt', '1008');
INSERT INTO `member_upline` VALUES (68, 'kosit1-kosit1', 'kosit1', '1009');
INSERT INTO `member_upline` VALUES (69, 'kosit2kosit2-kosit2', 'kosit2', '1010');
INSERT INTO `member_upline` VALUES (70, 'kosit999-kosit999', 'kosit999', '1011');
INSERT INTO `member_upline` VALUES (71, 'test-test', 'test', '1012');
INSERT INTO `member_upline` VALUES (72, '-', 'kosit', '1013');
INSERT INTO `member_upline` VALUES (73, 'โฆษิต-อารมณ์สวะ', 'kosit9999', '1014');
INSERT INTO `member_upline` VALUES (74, 'asdf-adf', 'ttttdfg', '1015');
INSERT INTO `member_upline` VALUES (75, 'tes-tes', 'tes', '1016');
INSERT INTO `member_upline` VALUES (76, 'fsd-sd', '65rrer', '1017');
INSERT INTO `member_upline` VALUES (77, 'ad-ads', 'nnnnn', '1018');
INSERT INTO `member_upline` VALUES (78, 'fdg-fgs', 'lllll', '1019');
INSERT INTO `member_upline` VALUES (79, 'ert-erter', 'artewrtert', '1020');
INSERT INTO `member_upline` VALUES (80, 'sss-ss', 'rtt', '1021');
INSERT INTO `member_upline` VALUES (81, 'sss-ss', 'rttsdfsd', '1022');
INSERT INTO `member_upline` VALUES (82, 'Thanasit -sittichotiphun', 'www.polosuccess.com/pb99/', '1023');
INSERT INTO `member_upline` VALUES (83, 'asd-asd', 'popo', '1024');
INSERT INTO `member_upline` VALUES (84, 'asd-asd', 'popo11', '1025');
INSERT INTO `member_upline` VALUES (85, 'vissanee-wongpunya', 'www.polosuccess.com/vissanee', '1026');
INSERT INTO `member_upline` VALUES (86, 'อิสรา-ฝ้ายเครือ', 'www.polosuccess.com/sara/', '1027');
INSERT INTO `member_upline` VALUES (87, 'aa-bb', 'test', '1028');
INSERT INTO `member_upline` VALUES (88, 'suttinan-sittichotiphun', 'www.polosuccess.com/pb99/', '1029');
INSERT INTO `member_upline` VALUES (89, 'jong-jong', 'jong', '1030');
INSERT INTO `member_upline` VALUES (90, 'thanasit-sittichotiphun', 'pb999', '1031');
INSERT INTO `member_upline` VALUES (91, 'เพ็ญพิมล-บัญชาอิทธิวัฒน์', 'pen99', '1032');
INSERT INTO `member_upline` VALUES (92, 'นายรวีโรจน์-มีสุข', 'Bank53', '1033');
INSERT INTO `member_upline` VALUES (93, 'tes-test', 'testss', '1034');
INSERT INTO `member_upline` VALUES (94, 'ss-ss', 'tessss', '1035');
INSERT INTO `member_upline` VALUES (95, 'kosit2-vkosit2', 'kosit2', '1036');
INSERT INTO `member_upline` VALUES (96, '-', 'a', '1037');
INSERT INTO `member_upline` VALUES (97, '-', '', '1038');
INSERT INTO `member_upline` VALUES (98, 'dfasdfa-adfa', 'sdf', '1039');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `myvdo`
-- 

CREATE TABLE `myvdo` (
  `id_myvdo` int(11) NOT NULL auto_increment,
  `id_catmyvdo` varchar(55) NOT NULL,
  `name_myvdo` varchar(100) NOT NULL,
  `vdo_myvdo` varchar(100) NOT NULL,
  `pic_myvdo` varchar(100) NOT NULL,
  `position_myvdo` varchar(55) NOT NULL,
  PRIMARY KEY  (`id_myvdo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

-- 
-- dump ตาราง `myvdo`
-- 

INSERT INTO `myvdo` VALUES (70, '57', 'asd', 'mpg1.flv', 'contact.png', '7');
INSERT INTO `myvdo` VALUES (71, '57', 'rtytry', 'mpg1.flv', 'control-center.png', '8');
INSERT INTO `myvdo` VALUES (74, '57', 'ทททท', 'หน่อง.flv', 'contact.png', '11');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `news`
-- 

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_title` varchar(55) NOT NULL,
  `news_description` text NOT NULL,
  `news_picture` varchar(55) NOT NULL,
  `news_update` varchar(55) NOT NULL,
  `news_detail` text NOT NULL,
  `news_cat_id` varchar(55) NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- dump ตาราง `news`
-- 

INSERT INTO `news` VALUES (39, 'ข่าวการเมือง', 'ข่าวการเมืองวันนีั', '', '18-01-12:06:45:38', '<p>\r\n	HOT NEWS</p>\r\n', '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `object_cat_system`
-- 

CREATE TABLE `object_cat_system` (
  `object_cat_id` int(11) NOT NULL auto_increment,
  `object_cat_name` varchar(111) NOT NULL,
  `object_cat_detail` varchar(111) NOT NULL,
  PRIMARY KEY  (`object_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `object_cat_system`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `object_system`
-- 

CREATE TABLE `object_system` (
  `object_id` int(11) NOT NULL auto_increment,
  `object_name` varchar(111) default NULL,
  `object_position` varchar(111) NOT NULL,
  `object_color` varchar(55) default NULL,
  `object_width` varchar(11) default NULL,
  `object_height` varchar(11) default NULL,
  `object_type` varchar(111) default NULL,
  PRIMARY KEY  (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- dump ตาราง `object_system`
-- 

INSERT INTO `object_system` VALUES (8, 'test_banner_big220811101205.gif', 'header_bg', '#00FFFF', '10', '240', NULL);
INSERT INTO `object_system` VALUES (9, '', 'header_logo', '', '', '', NULL);
INSERT INTO `object_system` VALUES (10, '', 'header_banner', '', '', '', NULL);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order1`
-- 

CREATE TABLE `order1` (
  `order_id` int(11) NOT NULL auto_increment,
  `order_title` text NOT NULL,
  `order_detail` text NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `order1`
-- 

INSERT INTO `order1` VALUES (1, '', '<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan="3" width="1">\r\n				&nbsp;</td>\r\n			<td>\r\n				<strong><img height="5" src="http://webnity.com/images/_trans.gif" width="1" /><br />\r\n				ขั้นตอนการชำระเงิน</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<img height="8" src="http://webnity.com/images/_trans.gif" width="1" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n					<tbody>\r\n						<tr>\r\n							<td>\r\n								<h4>\r\n									คุณสามารถเลือกชำระค่าบริการได้ 3 วิธี</h4>\r\n								<div class="payment_title">\r\n									1. โอนเงินผ่านธนาคาร หรือตู้ ATM</div>\r\n								<p align="center">\r\n									<b>ชื่อบัญชี &quot;</b>บริษัท แกรนด์ เอ็กซ์เซล จำกัด <b>&quot; </b></p>\r\n								<table cellpadding="7" cellspacing="0" class="tablespeed" width="100%">\r\n									<tbody>\r\n										<tr class="tablespeed_bg">\r\n											<td style="border-bottom: 0pt none;">\r\n												ธนาคาร</td>\r\n											<td style="border-bottom: 0pt none;">\r\n												เลขที่บัญชีธนาคาร</td>\r\n											<td style="border-bottom: 0pt none;">\r\n												ประเภทบัญชี</td>\r\n											<td style="border-bottom: 0pt none;">\r\n												สาขา</td>\r\n										</tr>\r\n										<tr align="center">\r\n											<td>\r\n												ธนาคาร กรุงศรีอยุธยา</td>\r\n											<td>\r\n												xxx-x-xxxxx-x</td>\r\n											<td>\r\n												กระแสรายวัน</td>\r\n											<td>\r\n												สวนมะลิ</td>\r\n										</tr>\r\n										<tr align="center">\r\n											<td>\r\n												ธนาคาร กรุงเทพ</td>\r\n											<td>\r\n												xxx-x-xxxxx-x</td>\r\n											<td>\r\n												ออมทรัพย์</td>\r\n											<td>\r\n												บางซื่อ</td>\r\n										</tr>\r\n										<tr align="center">\r\n											<td>\r\n												ธนาคาร กรุงไทย</td>\r\n											<td>\r\n												xxx-x-xxxxx-x</td>\r\n											<td>\r\n												ออมทรัพย์</td>\r\n											<td>\r\n												เตาปูน</td>\r\n										</tr>\r\n										<tr align="center">\r\n											<td>\r\n												ธนาคาร กสิกรไทย</td>\r\n											<td>\r\n												xxx-x-xxxxx-x</td>\r\n											<td>\r\n												ออมทรัพย์</td>\r\n											<td>\r\n												เตาปูน</td>\r\n										</tr>\r\n										<tr align="center">\r\n											<td>\r\n												ธนาคาร ไทยพาณิชย์</td>\r\n											<td>\r\n												xxx-x-xxxxx-x</td>\r\n											<td>\r\n												ออมทรัพย์</td>\r\n											<td>\r\n												เตาปูน</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<p align="center">\r\n									<b>หมายเหตุ :</b> ค่าธรรมเนียมในการโอนเงินเป็นความรับผิดชอบของลูกค้า ทางบริษัทฯ จะไม่รับผิดชอบในส่วนนี้</p>\r\n								<h4>\r\n									หลังจากคุณทำการชำระเงินแล้ว สามารถยืนยันการชำระค่าบริการ ตามวิธีนี้</h4>\r\n								<ul class="listarrow">\r\n									<li>\r\n										อีเมล์แจ้งมาที่ <a class="more" href="mailto:payment@siaminterhost.com" target="_blank">xxx@siaminterhost.com</a></li>\r\n									<li>\r\n										แฟกซ์สลิปใบโอนเงินมาที่หมายเลข (66) 2-912-2565 (กรุณาระบุหมายเลข Order หรือชื่อโดเมนเนมมาในสลิปใบโอนเงินด้วย)</li>\r\n									<li>\r\n										ยืนยันการชำระเงินออนไลน์ผ่านแบบฟอร์มของเราที่นี่</li>\r\n									<li>\r\n										โทรแจ้งเจ้าหน้าที่การเงินที่หมายเลข (66) 2-912-2558-64</li>\r\n								</ul>\r\n								<div class="payment_title">\r\n									2. ชำระเงินออนไลน์ผ่านบัตรเครดิต</div>\r\n								<p align="center">\r\n									<img alt="" height="23" src="http://www.siaminterhost.com/themes/rvtheme/images/icon_mcard.gif" width="37" />&nbsp;&nbsp;<img alt="" height="23" src="http://www.siaminterhost.com/themes/rvtheme/images/icon_visa.gif" width="37" /></p>\r\n								<p align="center">\r\n									ชำระค่าบริการผ่านบัตรเครดิต VISA, MASTERCARD ออนไลน์ได้ตลอด 24 ชั่วโมง<br />\r\n									<b class="fontlightblue"> (กรณีชำระผ่านบัตรเครดิต นิติบุคคลไม่สามารถทำการหักภาษี ณ ที่จ่ายได้)</b></p>\r\n								<p class="payment_title">\r\n									3. ชำระเงินผ่านเช็ค</p>\r\n								<p>\r\n									<b>สั่งจ่ายเช็คในนาม &quot;บริษัท เว็บ เอ็คซเพิร์ท จำกัด&quot; หรือ คุณสามารถส่งเช็คมาให้เราตามที่อยู่ด้านล่างนี้</b></p>\r\n								<p class="padleft35">\r\n									บริษัท แกรนด์ เอ็กซ์เซล จำกัด เลขที่ 52/37-38 ถ.สะพานปทุม-346 ต.บางปรอก อ.เมือง จ.ปทุมธานี 12000 โทร.02-978-0469 แฟกส์:02-978-0469 มือถือ:087-548-9458,087-595-4327 Email:team2009support@gmail.com</p>\r\n								<p class="para textindent">\r\n									เรามีบริการรับเช็คที่สำนักงานหรือที่บ้าน ของคุณ (เฉพาะลูกค้าที่อาศัยอยู่ในเขตกรุงเทพฯ) สำหรับลูกค้าที่สั่งซื้อบริการเข้ามาตั้งแต่ 5,000 บาทขึ้นไป หากต้องการให้เข้าไปรับเช็ค กรุณาโทรแจ้งเจ้าหน้าที่ ได้ที่หมายเลข (66) 2-222-2222- 22 เพื่อนัดหมายวันและเวลา</p>\r\n								<p class="para">\r\n									<font color="#ff0000"><b>**หมายเหตุ**</b></font></p>\r\n								<p class="para textindent">\r\n									ในกรณีที่บริษัทฯ ของท่านมีหนังสือรับรองภาษีหัก ณ ที่จ่าย ทางบริษัทฯ ขอรบกวนท่านส่งเอกสารมาให้ทางเราก่อน เมื่อได้รับเอกสารแล้ว ทางบริษัทฯ จะดำเนินการส่งใบเสร็จรับเงิน/ใบกำกับภาษีให้ตามที่อยู่ของท่านทันที</p>\r\n								<p class="para textindent">\r\n									อนึ่ง หากท่านทำรายการชำระค่าบริการเป็นที่เรียบร้อยแล้ว แต่ไม่ได้ทำการยืนยันการชำระค่าบริการทางบริษัทฯ ดังวิธีการข้างต้น ทางบริษัทฯ จะไม่สามารถปิดยอดค่าบริการ ต่ออายุ หรือส่งใบเสร็จรับเงินให้ท่านได้ เนื่องจากเราไม่สามารถตรวจสอบยอดได้ว่า เป็นรายการโอนเงินของลูกค้าท่านใด เพราะในแต่ละวันมีรายการโอนเงินผ่านบัญชีธนาคารต่าง ๆ ของทางบริษัทฯ เป็นจำนวนมากรายการ</p>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan="3" width="1">\r\n				&nbsp;</td>\r\n			<td>\r\n				<strong>หมายเหตุ:</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<img height="5" src="http://webnity.com/images/_trans.gif" width="1" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n					<tbody>\r\n						<tr>\r\n							<td align="right" valign="top" width="25">\r\n								<img align="absbottom" height="9" src="http://webnity.com/images/bullet_02.gif" width="9" /></td>\r\n							<td>\r\n								ท่านสามารถโอนเงินจากธนาคารเดียวกันสาขาใดก็ได้ โดยไม่ต้องเสียค่าธรรมเนียมการโอนเงิน</td>\r\n						</tr>\r\n						<tr>\r\n							<td align="right" valign="top">\r\n								<img align="absbottom" height="9" src="http://webnity.com/images/bullet_02.gif" width="9" /></td>\r\n							<td>\r\n								การโอนเงินในต่างจังหวัด จะมีค่าธรรมเนียมเรียกเก็บตามประกาศของธนาคารนั้นๆ</td>\r\n						</tr>\r\n						<tr>\r\n							<td align="right" valign="top">\r\n								<img align="absbottom" height="9" src="http://webnity.com/images/bullet_02.gif" width="9" /></td>\r\n							<td>\r\n								ท่านที่ประสงค์จะรับใบเสร็จรับเงิน กรุณาชำระค่าบริการเพิ่ม 20 บาท สำหรับไปรษณีย์ลงทะเบียน เพื่อป้องกันการสูญหาย โดยท่านสามารถระบุ ชื่อ ที่อยู่ ที่ต้องการให้จัดส่งใบเสร็จรับเงินได้ เมื่อทำรายการยืนยันที่เมนู ยืนยันการชำระเงิน หรือแฟกซ์มาพร้อมกับหลักฐานการชำระเงินได้ที่หมายเลข 02-222-2222</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order_detail`
-- 

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL auto_increment,
  `order_detail_amount` int(11) NOT NULL,
  `order_detail_cost` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY  (`order_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

-- 
-- dump ตาราง `order_detail`
-- 

INSERT INTO `order_detail` VALUES (92, 333, '33300', 12, 1178);
INSERT INTO `order_detail` VALUES (93, 44, '39900', 13, 1178);
INSERT INTO `order_detail` VALUES (94, 333, '33300', 12, 1179);
INSERT INTO `order_detail` VALUES (95, 30, '37800', 13, 1179);
INSERT INTO `order_detail` VALUES (96, 15, '1', 12, 1180);
INSERT INTO `order_detail` VALUES (97, 10, '1', 13, 1180);
INSERT INTO `order_detail` VALUES (98, 15, '1', 12, 1181);
INSERT INTO `order_detail` VALUES (99, 15, '2', 13, 1181);
INSERT INTO `order_detail` VALUES (100, 15, '1', 12, 1182);
INSERT INTO `order_detail` VALUES (101, 15, '2', 13, 1182);
INSERT INTO `order_detail` VALUES (102, 15, '1,500.00', 12, 1183);
INSERT INTO `order_detail` VALUES (103, 15, '2,250.00', 13, 1183);
INSERT INTO `order_detail` VALUES (104, 15, '100', 12, 1184);
INSERT INTO `order_detail` VALUES (105, 15, '150', 13, 1184);
INSERT INTO `order_detail` VALUES (106, 15, '100', 12, 1185);
INSERT INTO `order_detail` VALUES (107, 15, '150', 13, 1185);
INSERT INTO `order_detail` VALUES (108, 15, '1500', 12, 1186);
INSERT INTO `order_detail` VALUES (109, 15, '2250', 13, 1186);
INSERT INTO `order_detail` VALUES (110, 15, '1500', 12, 1187);
INSERT INTO `order_detail` VALUES (111, 15, '2250', 13, 1187);
INSERT INTO `order_detail` VALUES (112, 30, '3000', 12, 1188);
INSERT INTO `order_detail` VALUES (113, 15, '2250', 13, 1188);
INSERT INTO `order_detail` VALUES (114, 5, '500', 12, 1189);
INSERT INTO `order_detail` VALUES (115, 44, '4400', 12, 1189);
INSERT INTO `order_detail` VALUES (116, 5, '500', 12, 1190);
INSERT INTO `order_detail` VALUES (117, 1, '1000', 14, 1190);
INSERT INTO `order_detail` VALUES (118, 1, '100', 12, 1191);
INSERT INTO `order_detail` VALUES (119, 4, '600', 13, 1191);
INSERT INTO `order_detail` VALUES (120, 1, '0', 20, 1191);
INSERT INTO `order_detail` VALUES (121, 1, '0', 15, 1191);
INSERT INTO `order_detail` VALUES (122, 1, '100', 12, 1192);
INSERT INTO `order_detail` VALUES (123, 4, '600', 13, 1192);
INSERT INTO `order_detail` VALUES (124, 1, '0', 20, 1192);
INSERT INTO `order_detail` VALUES (125, 1, '0', 15, 1192);
INSERT INTO `order_detail` VALUES (126, 1, '1000', 14, 1192);
INSERT INTO `order_detail` VALUES (127, 1, '100', 12, 1193);
INSERT INTO `order_detail` VALUES (128, 1, '150', 13, 1193);
INSERT INTO `order_detail` VALUES (129, 1, '1000', 14, 1194);
INSERT INTO `order_detail` VALUES (130, 1, '100', 12, 1194);
INSERT INTO `order_detail` VALUES (131, 1, '1000', 14, 1195);
INSERT INTO `order_detail` VALUES (132, 1, '100', 12, 1195);
INSERT INTO `order_detail` VALUES (133, 1, '150', 13, 1195);
INSERT INTO `order_detail` VALUES (134, 1, '100', 12, 1196);
INSERT INTO `order_detail` VALUES (135, 1, '150', 13, 1196);
INSERT INTO `order_detail` VALUES (136, 1, '100', 12, 1197);
INSERT INTO `order_detail` VALUES (137, 1, '150', 13, 1197);
INSERT INTO `order_detail` VALUES (138, 1, '100', 12, 1198);
INSERT INTO `order_detail` VALUES (139, 77, '11550', 13, 1198);
INSERT INTO `order_detail` VALUES (140, 66, '6600', 12, 1199);
INSERT INTO `order_detail` VALUES (141, 34, '5100', 13, 1199);
INSERT INTO `order_detail` VALUES (142, 1, '1000', 14, 1200);
INSERT INTO `order_detail` VALUES (143, 1, '0', 18, 1200);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order_method`
-- 

CREATE TABLE `order_method` (
  `order_id` int(11) NOT NULL auto_increment,
  `order_detail` text NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `order_method`
-- 

INSERT INTO `order_method` VALUES (1, '<p>\r\n	รถบรรทุกรับจ้าง</p>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `picture`
-- 

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL auto_increment,
  `picturecat_id` varchar(55) NOT NULL,
  `picture_detail` varchar(55) NOT NULL,
  `picture_detail_eng` text,
  `picture_important` varchar(11) NOT NULL,
  `picture_date` varchar(55) NOT NULL,
  PRIMARY KEY  (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=131 ;

-- 
-- dump ตาราง `picture`
-- 

INSERT INTO `picture` VALUES (127, '14', '', '', '#', '22-01-12:05:37:00');
INSERT INTO `picture` VALUES (128, '14', '', '', '#', '22-01-12:05:40:01');
INSERT INTO `picture` VALUES (129, '14', '', '', '#', '22-01-12:05:40:34');
INSERT INTO `picture` VALUES (130, '14', '', '', '#', '22-01-12:05:40:42');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `picturecat`
-- 

CREATE TABLE `picturecat` (
  `picturecat_id` int(11) NOT NULL auto_increment,
  `picturecat_name` varchar(55) NOT NULL,
  `picturecat_name_eng` varchar(255) default NULL,
  `picturecat_detail` text NOT NULL,
  `picturecat_detail_eng` text,
  PRIMARY KEY  (`picturecat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `picturecat`
-- 

INSERT INTO `picturecat` VALUES (14, 'กิจกรรม/รูปภาพ', NULL, 'กิจกรรม/รูปภาพ', NULL);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `picture_banner`
-- 

CREATE TABLE `picture_banner` (
  `pic_id` int(11) NOT NULL auto_increment,
  `pic_name` varchar(55) NOT NULL,
  `pic_type` varchar(55) NOT NULL,
  `pic_detail` text NOT NULL,
  `pic_link` varchar(55) NOT NULL,
  PRIMARY KEY  (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `picture_banner`
-- 

INSERT INTO `picture_banner` VALUES (1, '3Lh2G4969961-01.jpg', '', '', 'www.google.co.th33');
INSERT INTO `picture_banner` VALUES (2, '460_ePhone10_12.gif', '', '', 'testddd');
INSERT INTO `picture_banner` VALUES (3, 'Maps.png', 'หน้าแรก', '<p>\r\n	ssss</p>\r\n', 'sss');
INSERT INTO `picture_banner` VALUES (4, 'walletS.gif', '', '', 'test');
INSERT INTO `picture_banner` VALUES (7, 'Weather.png', '', '', 'sssddddd');
INSERT INTO `picture_banner` VALUES (8, 'test', 'test', 'ddddddddd', 'www.google.co.th');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `plugin_on_web`
-- 

CREATE TABLE `plugin_on_web` (
  `plugin_id` int(11) NOT NULL auto_increment,
  `plugin_name` varchar(255) default NULL,
  `plugin_code` varchar(255) default NULL,
  `plugin_status` varchar(255) default NULL,
  `plugin_important` varchar(255) default NULL,
  `plugin_position` varchar(255) default NULL,
  PRIMARY KEY  (`plugin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `plugin_on_web`
-- 

INSERT INTO `plugin_on_web` VALUES (3, 'Plugin01', 'code plugin01', 'ok', NULL, 'left');
INSERT INTO `plugin_on_web` VALUES (4, 'Plugin02', 'Code plaugin02', 'not', NULL, 'right');
INSERT INTO `plugin_on_web` VALUES (5, 'Plugin03', 'Codepluin03', 'ok', NULL, 'left');
INSERT INTO `plugin_on_web` VALUES (6, 'Plugin04', 'code pluin04', 'ok', NULL, 'left');
INSERT INTO `plugin_on_web` VALUES (7, 'Plugin05', 'code plugin05', 'not', NULL, 'right');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `product`
-- 

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL auto_increment,
  `productcat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_title` text NOT NULL,
  `product_detail` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_promotion_price` varchar(55) NOT NULL,
  `product_send_price` int(50) NOT NULL default '0',
  `product_promotion_detail` text NOT NULL,
  `product_promotion` varchar(255) NOT NULL,
  `product_amount` varchar(255) NOT NULL,
  `product_name_eng` text NOT NULL,
  `product_title_eng` text NOT NULL,
  `product_detail_eng` text NOT NULL,
  `product_price_eng` text NOT NULL,
  `product_promotion_price_eng` text NOT NULL,
  `product_promotion_detail_eng` text NOT NULL,
  `product_promotion_eng` text NOT NULL,
  `product_date` varchar(255) NOT NULL,
  PRIMARY KEY  (`product_id`),
  KEY `productcat_id` (`productcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- 
-- dump ตาราง `product`
-- 

INSERT INTO `product` VALUES (22, 19, 'prodcut01', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.<span style="display: none">&nbsp;</span></p>', '10000', '', 0, '', 'Yes', '12', '', '', '', '', '', '', '', '2012-01-19 12:00:45');
INSERT INTO `product` VALUES (23, 19, 'prodcut02', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.<span style="display: none">&nbsp;</span></p>', '25550', '', 0, '', 'Yes', '11', '', '', '', '', '', '', '', '2012-01-19 12:02:16');
INSERT INTO `product` VALUES (24, 19, 'prodcut03', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.</p>', '10000', '', 0, '', 'Yes', '11', '', '', '', '', '', '', '', '2012-01-19 12:02:52');
INSERT INTO `product` VALUES (25, 19, 'prodcut04', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.</p>', '29999', '', 0, '', 'Yes', '11', '', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '', '', '', '', '', '2012-01-19 12:03:25');
INSERT INTO `product` VALUES (26, 20, 'prodcut011', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.</p>', '30000', '', 0, '', 'Yes', '11', '', '', '', '', '', '', '', '2012-01-19 17:09:54');
INSERT INTO `product` VALUES (27, 20, 'prodcut022', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.</p>', '40000', '', 0, '', 'Yes', '12', '', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '', '', '', '', '', '2012-01-19 17:10:25');
INSERT INTO `product` VALUES (28, 20, 'prodcut033', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.</p>', '10000', '', 0, '', 'Yes', '4', '', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '', '', '', '', '', '2012-01-19 17:23:44');
INSERT INTO `product` VALUES (29, 20, 'prodcut44', 'Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you’ll keep finding more and more ways to use it.', '<p class="intro">\r\n	Siri on iPhone 4S lets you use your voice to send messages, schedule meetings, place phone calls, and more. Ask Siri to do things just by talking the way you talk. Siri understands what you say, knows what you mean, and even talks back. Siri is so easy to use and does so much, you&rsquo;ll keep finding more and more ways to use it.</p>', '30000', '', 0, '', 'Yes', '32', '', '', '', '', '', '', '', '2012-01-19 17:24:24');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `productcat`
-- 

CREATE TABLE `productcat` (
  `productcat_id` int(11) NOT NULL auto_increment,
  `productcat_name` varchar(225) NOT NULL,
  `productcat_detail` varchar(255) NOT NULL,
  `productcat_name_eng` text NOT NULL,
  `productcat_detail_eng` text NOT NULL,
  PRIMARY KEY  (`productcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- dump ตาราง `productcat`
-- 

INSERT INTO `productcat` VALUES (19, 'ชื่อหมวดสินค้า', 'รายละเอีิยดหมวดสินค้า', 'Category Productcat Name', 'Detail Category Productcat');
INSERT INTO `productcat` VALUES (20, 'หมวดสินค้า2', '', 'หมวดสินค้า2', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `product_payment_bank`
-- 

CREATE TABLE `product_payment_bank` (
  `payment_bank_id` int(11) NOT NULL auto_increment,
  `payment_bank_name` varchar(55) NOT NULL,
  `payment_bank_number` varchar(55) NOT NULL,
  `payment_bank_ฺฺbranch` varchar(55) NOT NULL,
  `payment_bank_ฺฺother` text NOT NULL,
  PRIMARY KEY  (`payment_bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `product_payment_bank`
-- 

INSERT INTO `product_payment_bank` VALUES (1, 'ฟกหดฟ', 'กดฟหกดฟกzzzzzz', 'กดฟกดฟ', 'ddddddddddddddddddddddddddddddddddd');
INSERT INTO `product_payment_bank` VALUES (2, 'ฟกหดฟ', 'กดฟหกดฟก', 'กดฟกดฟ', 'dddddzxxxxxxxxxxxx');
INSERT INTO `product_payment_bank` VALUES (3, 'ฟกหดฟ', 'กดฟหกดฟก', 'กดฟกดฟ', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `product_payment_check`
-- 

CREATE TABLE `product_payment_check` (
  `product_payment_check_id` int(11) NOT NULL auto_increment,
  `product_payment_check_fullname` varchar(55) NOT NULL,
  `product_payment_check_email` varchar(55) NOT NULL,
  `product_payment_check_tel` varchar(11) NOT NULL,
  `product_payment_check_other` text NOT NULL,
  `product_payment_check_type` varchar(55) NOT NULL,
  `product_payment_check_amount` varchar(11) NOT NULL,
  `product_payment_check_date` varchar(55) NOT NULL,
  `product_payment_check_time` varchar(55) NOT NULL,
  `product_payment_check_bankname` varchar(55) NOT NULL,
  `product_payment_check_order_id` varchar(55) NOT NULL,
  `product_payment_check_invoice` varchar(55) NOT NULL,
  `product_payment_check_invoice_pic` varchar(55) NOT NULL,
  PRIMARY KEY  (`product_payment_check_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `product_payment_check`
-- 

INSERT INTO `product_payment_check` VALUES (2, '111xxxffffffffffffffgsfgsdfgsdfgsdfgsdfgsd', '222', '333', '10', '444', '55', '66', '77', '8888', '1006', '99', 'dd');
INSERT INTO `product_payment_check` VALUES (3, '1', '2', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `product_payment_check` VALUES (4, '1', '2', '3', '4', '', '', '5', '6', '', '', '7', '');
INSERT INTO `product_payment_check` VALUES (5, '2', '3', '4', '7', '', '', '5', '6', '', '', '1', '');
INSERT INTO `product_payment_check` VALUES (6, 'kosit', 'nn.it@hotmail.com', '010535546', '555555', '', '', '12', '12.00', '', '', '111111', '');
INSERT INTO `product_payment_check` VALUES (7, 'kosit', 'nn.it@hotmail.com', '010535546', '555555', '', '', '12', '12.00', '', '', '111111', '');
INSERT INTO `product_payment_check` VALUES (8, 'name', 'email', 'tel', 'other', '', '', 'date', 'time', 'bank', '', 'order id', '');
INSERT INTO `product_payment_check` VALUES (9, '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `product_payment_check` VALUES (10, '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `product_payment_check` VALUES (11, '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `product_payment_check` VALUES (12, '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `product_payment_check` VALUES (13, 'โฆษิต อารมณ์สวะ', 'nn.it@hotmail.com', '010535546', 'โอนเงินเรียบร้อยครับ', '', '', '12.00', '12.30', 'กรุงเทพ สาขาบางกะปิ', '', '1177', '');
INSERT INTO `product_payment_check` VALUES (14, 'โฆษิต อารมณ์สวะ', 'nn.it@hotmail.com', '010535546', 'โอนเงินเรียบร้อยครับ', '', '', '12.00', '12.30', 'กรุงเทพ สาขาบางกะปิ', '', '1177', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `product_payment_methods`
-- 

CREATE TABLE `product_payment_methods` (
  `product_payment_methods_id` int(11) NOT NULL,
  `product_payment_methods_detail` text NOT NULL,
  PRIMARY KEY  (`product_payment_methods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `product_payment_methods`
-- 

INSERT INTO `product_payment_methods` VALUES (1, '<p>\r\n	asdfasdfasasdfasdfasddfadsfasdfasdfasadfadsfa</p>\r\n<p>\r\n	adfasdfasddfasdfasdfasd</p>\r\n');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `province`
-- 

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL auto_increment,
  `zone_id` int(11) NOT NULL,
  `province_name` varchar(100) NOT NULL,
  `province_name_eng` varchar(100) NOT NULL,
  PRIMARY KEY  (`province_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `province`
-- 

INSERT INTO `province` VALUES (1, 2, 'กาฬสินธ์ุ1', '');
INSERT INTO `province` VALUES (2, 2, 'กาฬสินธ์ุ2', '');
INSERT INTO `province` VALUES (3, 2, 'กาฬสินธ์ุ3', '');
INSERT INTO `province` VALUES (4, 2, 'กาฬสินธ์ุ4', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `run_title`
-- 

CREATE TABLE `run_title` (
  `run_title_id` int(11) NOT NULL auto_increment,
  `run_title_detail` text NOT NULL,
  `run_title_detail_eng` text NOT NULL,
  PRIMARY KEY  (`run_title_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `run_title`
-- 

INSERT INTO `run_title` VALUES (1, 'บริการรถรับจ้างทั่วไทย\r\nมีรถกระบะ, 4 ล้อใหญ่ไม่ติดเวลา, 6 ล้อยาว 4 – 7.30 เมตร รถทุกคันตอนเดียว หลังคาสูง คอกเหล็ก\r\nมีผ้าใบคลุมอย่างดี บริการขนส่งสินค้า ย้ายบ้าน สำนักงาน ขนเหล็ก ขนดิน ออกบูธ แสดงสินค้า เล่นสงกรานต์ ฯลฯ พร้อมคนขับรถและจัดหาคนขนของที่ไว้ใจได้ ราคาเป็นกันเอง ตลอด 24 ชม.\r\n', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `select_style`
-- 

CREATE TABLE `select_style` (
  `select_style_id` int(11) NOT NULL auto_increment,
  `select_style_number` varchar(255) NOT NULL,
  PRIMARY KEY  (`select_style_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `select_style`
-- 

INSERT INTO `select_style` VALUES (1, '3');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `seo`
-- 

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL auto_increment,
  `seo_tag1` varchar(55) NOT NULL,
  `seo_tag2` varchar(55) NOT NULL,
  `seo_tag3` varchar(55) NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_position` int(11) NOT NULL COMMENT 'ใส่ค่า id ของ main menu',
  PRIMARY KEY  (`seo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- dump ตาราง `seo`
-- 

INSERT INTO `seo` VALUES (5, 'คำค้นหา1', 'คำค้นหา2', 'คำค้นหา3', 'คำค้นหา1,คำค้นหา2,คำค้นหา3', 52);
INSERT INTO `seo` VALUES (10, 'โปรโมชั่นที่1', 'โปรโมชั่นที่2', 'โปรโมชั่นที่3', 'อธิบายเกี่ยวกับโปรโมชั่น', 56);
INSERT INTO `seo` VALUES (11, 'สินค้าแนะนำ1', 'สินค้าแนะนำ2', 'สินค้าแนะนำ3', 'อธิบายเกี่ยวกับสินค้า', 53);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `slide_picture`
-- 

CREATE TABLE `slide_picture` (
  `slide_picture_id` int(11) NOT NULL auto_increment,
  `slide_picture_object` varchar(255) default NULL,
  `slide_position` varchar(255) NOT NULL,
  `slide_picture_link` varchar(255) default NULL,
  PRIMARY KEY  (`slide_picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `slide_picture`
-- 

INSERT INTO `slide_picture` VALUES (1, 'work1.png', '1', 'http://www.gddddogle.co.th');
INSERT INTO `slide_picture` VALUES (3, 'work2.png', '2', 'http://www.sanook.com');
INSERT INTO `slide_picture` VALUES (4, 'work3.png', '3', 'http:nn-it.com1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `topic`
-- 

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL auto_increment,
  `topic_subject` varchar(255) NOT NULL,
  `topic_detail` text NOT NULL,
  `topic_update` varchar(255) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

-- 
-- dump ตาราง `topic`
-- 

INSERT INTO `topic` VALUES (130, 'sojv''', 'sdf', '11-09-17 22:05:51', 'หน่อง');
INSERT INTO `topic` VALUES (131, 'sss', 'sss', '11-09-17 22:06:42', 'sss');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tour_add`
-- 

CREATE TABLE `tour_add` (
  `id_tour` int(11) NOT NULL auto_increment,
  `name_tour` varchar(55) NOT NULL,
  `country_tour` varchar(55) NOT NULL,
  `title_tour` text NOT NULL,
  `detail_tour` text NOT NULL,
  `price_tour` varchar(55) NOT NULL,
  `promotion_tour` text NOT NULL,
  `detail_promotion_tour` varchar(100) NOT NULL,
  `itinerary_tour` text NOT NULL,
  `date_tour` varchar(55) NOT NULL,
  `update_tour` date NOT NULL,
  `page` varchar(55) NOT NULL,
  PRIMARY KEY  (`id_tour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `tour_add`
-- 

INSERT INTO `tour_add` VALUES (4, 'ญีปุ่น', 'ทวีบเอเชีย', '<p>\r\n	ข้อมูลทัวร์</p>\r\n', '<p>\r\n	ข้อมูลทัวร์แบบละเอียด</p>\r\n', '25000', '20000', 'ข้อมูลรายละเอียดของโปรโมชั่น ', '<p>\r\n	ข้อมูล กิจกรรม กำหนดการ</p>\r\n', '07/10/2010', '2018-01-12', 'home');
INSERT INTO `tour_add` VALUES (5, 'เกาหลีใต้', 'ทวีบเอเชีย', '<p>\r\n	ข้อมูลทัวร์</p>\r\n', '<p>\r\n	ข้อมูลทัวร์แบบละเอียด</p>\r\n', '30000', '', 'ข้อมูลรายละเอียดของโปรโมชั่น ', '<p>\r\n	ข้อมูล กิจกรรม กำหนดการ&nbsp;<span style="display: none">&nbsp;</span></p>\r\n', '01/10/2010', '2018-01-12', 'general');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tour_book`
-- 

CREATE TABLE `tour_book` (
  `id_book` int(11) NOT NULL auto_increment,
  `id_tour` varchar(55) NOT NULL,
  `number_book` varchar(55) NOT NULL,
  `name_book` varchar(55) NOT NULL,
  `email_book` varchar(55) NOT NULL,
  `address_book` text NOT NULL,
  `tel_book` varchar(10) NOT NULL,
  `fax_book` varchar(10) NOT NULL,
  `date_book` varchar(55) NOT NULL,
  `other_book` text NOT NULL,
  PRIMARY KEY  (`id_book`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `tour_book`
-- 

INSERT INTO `tour_book` VALUES (2, '1', '11', '1178999', '178999', '178999', '1178999', '1178999', '2010-02-07', '11111111wwwwwwaqqcvbcvbcvbcvbcvbcv78999');
INSERT INTO `tour_book` VALUES (3, '4', '821560', 'โฆษิต อารมณ์สวะ', 'nn.iT@hotmial.com', ' bangkok 10200', '010535546', '017043322', '2005-10-10', 'ขอทราบว่า...');
INSERT INTO `tour_book` VALUES (4, '4', '821560', 'กองสิน ฟองดา', 'noo_nuy_narak@hotmail.com', ' bangkok 10223', '081222444', '02111444', '05-10-10', '');
INSERT INTO `tour_book` VALUES (6, '19', '281206', 'หน่อง', 'หหห', '', '', '', '05-10-10', '');
INSERT INTO `tour_book` VALUES (11, '7', '786682', '44444', '44444444', '4444444444444', '4444', '4444444444', '05-10-10', '44444444');
INSERT INTO `tour_book` VALUES (12, '11', '852108', 'aadad', 'asdfad', 'adfadf', 'adfa', 'fasdfasdfa', '05-10-10', 'fdfd');
INSERT INTO `tour_book` VALUES (14, '19', '197550', 'a', 'sdaa', 'sdaa', 'da', 'fasdfasdfa', '05-10-10', 'dd');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tour_pic`
-- 

CREATE TABLE `tour_pic` (
  `id_pic_tour` int(11) NOT NULL auto_increment,
  `name_pic_tour` varchar(100) NOT NULL,
  `id_tour` varchar(55) NOT NULL,
  PRIMARY KEY  (`id_pic_tour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- 
-- dump ตาราง `tour_pic`
-- 

INSERT INTO `tour_pic` VALUES (19, 'menu5.gif', '4');
INSERT INTO `tour_pic` VALUES (20, 'menu5.gif', '4');
INSERT INTO `tour_pic` VALUES (21, 'menu5.gif', '4');
INSERT INTO `tour_pic` VALUES (22, 'menu5.gif', '4');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `webdir`
-- 

CREATE TABLE `webdir` (
  `webdir_id` int(11) NOT NULL auto_increment,
  `webdir_url` varchar(100) NOT NULL,
  `webdir_homepage` varchar(100) NOT NULL,
  `webdir_detail` text NOT NULL,
  `webdir_tag1` varchar(100) NOT NULL,
  `webdir_tag2` varchar(100) NOT NULL,
  `webdir_tag3` varchar(100) NOT NULL,
  `webdir_keyword` varchar(200) NOT NULL,
  `webdir_mail` varchar(100) NOT NULL,
  `webdir_status` varchar(100) NOT NULL,
  `webdir_cat` int(11) NOT NULL,
  PRIMARY KEY  (`webdir_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- dump ตาราง `webdir`
-- 

INSERT INTO `webdir` VALUES (18, 'http://www.tor-tour.net', 'http://www.tor-tour.net', 'ท่องเทียว', 'ทัวร์', 'เที่ยวต่างประเทศ', 'เทียวทั่วไทย', 'ทัวร์,เที่ยวต่างประเทศ,เทียวทั่วไทย', 'nn.it@hotmail.com', 'show', 3);
INSERT INTO `webdir` VALUES (19, 'http://www.comtech1.com', 'http://www.comtech1.com', 'ขายอุปกรณ์คอมพิวเตอร์', 'อาร์ดดิส', 'แผ่น cd,dvd,vcd', 'หมึกปริ้นเตอร์', 'อาร์ดดิส,แผ่น cd,dvd,vcd,หมึกปริ้นเตอร์', 'nn.it@hotmail.cmo', 'check', 15);
INSERT INTO `webdir` VALUES (20, 'http://www.workphp.com', 'http://www.workphp.com', 'สอนการเขียนโปรแกรม jquery,php', 'jquery', 'php', 'สอนเขียนโปรแกรม', 'jquery,php,สอนเขียนโปรแกรมคอมพิวเตอร์', 'nn.it@hotmail.com', 'check', 14);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `youtupe`
-- 

CREATE TABLE `youtupe` (
  `id_youtupe` int(11) NOT NULL auto_increment,
  `id_cat_youtupe` int(11) NOT NULL,
  `title_youtupe` text NOT NULL,
  `embed_youtupe` text NOT NULL,
  PRIMARY KEY  (`id_youtupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- 
-- dump ตาราง `youtupe`
-- 

INSERT INTO `youtupe` VALUES (58, 77, 'กกกก', 'กกก');
INSERT INTO `youtupe` VALUES (59, 76, 'Test vdo youtube1', 'embed code her1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `zone`
-- 

CREATE TABLE `zone` (
  `zone_id` int(11) NOT NULL auto_increment,
  `zone_name` varchar(55) NOT NULL,
  `zone_name_eng` varchar(55) NOT NULL,
  PRIMARY KEY  (`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `zone`
-- 

INSERT INTO `zone` VALUES (1, 'เหนือ', '');
INSERT INTO `zone` VALUES (2, 'ตะวันออกเฉียงเหนือ', '');
INSERT INTO `zone` VALUES (3, 'ใต้', '');
INSERT INTO `zone` VALUES (4, 'ตะวันออก', '');
INSERT INTO `zone` VALUES (5, 'ตะวันตก', '');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `answer`
-- 
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `product`
-- 
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productcat_id`) REFERENCES `productcat` (`productcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
