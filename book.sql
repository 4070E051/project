-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Sep 27, 2013, 04:42 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `shopcart`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `message`
-- 

CREATE TABLE `message` (
  `id` tinyint(1) NOT NULL auto_increment,
  `user` varchar(25) character set utf8 NOT NULL,
  `title` varchar(50) character set utf8 NOT NULL,
  `content` tinytext character set utf8 NOT NULL,
  `lastdate` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=32 ;

-- 
-- 列出以下資料庫的數據： `message`
-- 

INSERT INTO `message` VALUES (27, 'guest', '???è??', '???è??', '2013-05-31');
INSERT INTO `message` VALUES (28, 'guest', 'æ¸¬è©¦1', 'test', '2013-05-31');
INSERT INTO `message` VALUES (29, '123', '123', '123', '2013-06-10');
INSERT INTO `message` VALUES (30, '123', '123', 'ä¸€ç™¾å€‹å•è™Ÿ\r\n', '2013-06-10');
INSERT INTO `message` VALUES (31, 'guest', '12', '11', '2013-06-10');

-- --------------------------------------------------------

-- 
-- 資料表格式： `msgtable`
-- 

CREATE TABLE `msgtable` (
  `id` bigint(20) NOT NULL auto_increment,
  `ntime` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- 列出以下資料庫的數據： `msgtable`
-- 

INSERT INTO `msgtable` VALUES (8, '2013-05-20', 'welcome');

-- --------------------------------------------------------

-- 
-- 資料表格式： `rep_message`
-- 

CREATE TABLE `rep_message` (
  `id` bigint(100) NOT NULL auto_increment,
  `mid` bigint(100) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `user` varchar(100) NOT NULL,
  `lastdate` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 列出以下資料庫的數據： `rep_message`
-- 

INSERT INTO `rep_message` VALUES (1, 8, 'ddddddddddddddd', 'guest', '2012-08-27');
INSERT INTO `rep_message` VALUES (2, 8, 'ddddddddddddddddddddddaa', 'guest', '2012-08-27');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_cart`
-- 

CREATE TABLE `tbl_cart` (
  `ct_id` int(10) unsigned NOT NULL auto_increment,
  `pd_id` int(10) unsigned NOT NULL default '0',
  `ct_qty` mediumint(8) unsigned NOT NULL default '1',
  `ct_session_id` char(32) NOT NULL default '',
  `ct_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_id` varchar(100) NOT NULL default '0',
  PRIMARY KEY  (`ct_id`),
  KEY `pd_id` (`pd_id`),
  KEY `ct_session_id` (`ct_session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

-- 
-- 列出以下資料庫的數據： `tbl_cart`
-- 

INSERT INTO `tbl_cart` VALUES (68, 88, 11, '18420e929a10596dfedb78bb147253d8', '2013-09-27 15:47:06', '0');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_category`
-- 

CREATE TABLE `tbl_category` (
  `cat_id` int(10) unsigned NOT NULL auto_increment,
  `cat_parent_id` int(11) NOT NULL default '0',
  `cat_name` varchar(50) NOT NULL default '',
  `cat_description` varchar(200) NOT NULL default '',
  `cat_image` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_parent_id` (`cat_parent_id`),
  KEY `cat_name` (`cat_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- 
-- 列出以下資料庫的數據： `tbl_category`
-- 

INSERT INTO `tbl_category` VALUES (41, 0, 'test', 'test', '');
INSERT INTO `tbl_category` VALUES (42, 41, 'test', 'test', '');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_currency`
-- 

CREATE TABLE `tbl_currency` (
  `cy_id` int(10) unsigned NOT NULL auto_increment,
  `cy_code` char(3) NOT NULL default '',
  `cy_symbol` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`cy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 列出以下資料庫的數據： `tbl_currency`
-- 

INSERT INTO `tbl_currency` VALUES (1, 'EUR', '&#8364;');
INSERT INTO `tbl_currency` VALUES (2, 'GBP', '&pound;');
INSERT INTO `tbl_currency` VALUES (3, 'JPY', '&yen;');
INSERT INTO `tbl_currency` VALUES (4, 'USD', '$');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_order`
-- 

CREATE TABLE `tbl_order` (
  `od_id` int(10) unsigned NOT NULL auto_increment,
  `od_date` datetime default NULL,
  `od_last_update` datetime NOT NULL default '0000-00-00 00:00:00',
  `od_status` varchar(100) NOT NULL,
  `od_memo` varchar(255) NOT NULL default '',
  `od_shipping_first_name` varchar(50) NOT NULL default '',
  `od_shipping_last_name` varchar(50) NOT NULL default '',
  `od_shipping_address1` varchar(100) NOT NULL default '',
  `od_shipping_address2` varchar(100) NOT NULL default '',
  `od_shipping_phone` varchar(32) NOT NULL default '',
  `od_shipping_city` varchar(100) NOT NULL default '',
  `od_shipping_state` varchar(32) NOT NULL default '',
  `od_shipping_postal_code` varchar(10) NOT NULL default '',
  `od_shipping_cost` decimal(5,2) default '0.00',
  `od_payment_first_name` varchar(50) NOT NULL default '',
  `od_payment_last_name` varchar(50) NOT NULL default '',
  `od_payment_address1` varchar(100) NOT NULL default '',
  `od_payment_address2` varchar(100) NOT NULL default '',
  `od_payment_phone` varchar(32) NOT NULL default '',
  `od_payment_city` varchar(100) NOT NULL default '',
  `od_payment_state` varchar(32) NOT NULL default '',
  `od_payment_postal_code` varchar(10) NOT NULL default '',
  `user_id` varchar(100) NOT NULL,
  PRIMARY KEY  (`od_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1005 ;

-- 
-- 列出以下資料庫的數據： `tbl_order`
-- 

INSERT INTO `tbl_order` VALUES (1003, '2012-09-11 10:00:36', '2012-09-11 10:25:11', 'å·²å¯„å‡º', '', 'Dd', 'Ddd', 'dd', 'dd', 'dd', 'Ddd', 'dd', '1234', 5.00, 'Dd', 'Ddd', 'dd', 'dd', 'dd', 'Ddd', 'dd', '1234', 'test');
INSERT INTO `tbl_order` VALUES (1004, '2013-05-10 10:18:13', '2013-05-10 10:18:13', '', '', 'Test', 'Setes', 'set', 'set', 'set', 'Est', 'set', 'set', 5.00, 'Test', 'Setes', 'set', 'set', 'set', 'Est', 'set', 'set', 'test1');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_order_item`
-- 

CREATE TABLE `tbl_order_item` (
  `od_id` int(10) unsigned NOT NULL default '0',
  `pd_id` int(10) unsigned NOT NULL default '0',
  `od_qty` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`od_id`,`pd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `tbl_order_item`
-- 

INSERT INTO `tbl_order_item` VALUES (1001, 22, 1);
INSERT INTO `tbl_order_item` VALUES (1003, 22, 2);
INSERT INTO `tbl_order_item` VALUES (1004, 22, 2);

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_product`
-- 

CREATE TABLE `tbl_product` (
  `pd_id` int(10) unsigned NOT NULL auto_increment,
  `cat_id` int(10) unsigned NOT NULL default '0',
  `pd_name` varchar(100) NOT NULL default '',
  `pd_description` text NOT NULL,
  `pd_price` decimal(9,2) NOT NULL default '0.00',
  `pd_qty` smallint(5) unsigned NOT NULL default '0',
  `pd_image` varchar(200) default NULL,
  `pd_thumbnail` varchar(200) default NULL,
  `pd_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `pd_last_update` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`pd_id`),
  KEY `cat_id` (`cat_id`),
  KEY `pd_name` (`pd_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

-- 
-- 列出以下資料庫的數據： `tbl_product`
-- 

INSERT INTO `tbl_product` VALUES (88, 42, 'test', 'test', 12.00, 12, '', '', '2013-09-27 15:46:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_shop_config`
-- 

CREATE TABLE `tbl_shop_config` (
  `sc_name` varchar(50) NOT NULL default '',
  `sc_address` varchar(100) NOT NULL default '',
  `sc_phone` varchar(30) NOT NULL default '',
  `sc_email` varchar(30) NOT NULL default '',
  `sc_shipping_cost` decimal(5,2) NOT NULL default '0.00',
  `sc_currency` int(10) unsigned NOT NULL default '1',
  `sc_order_email` enum('y','n') NOT NULL default 'n'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `tbl_shop_config`
-- 

INSERT INTO `tbl_shop_config` VALUES ('PlainCart - Just a plain online shop', 'Old warehouse under the bridge,\r\nWater Seven, Grand Line', '777-FRANKY', 'franky@tomsworkers.com', 5.00, 4, 'y');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tbl_user`
-- 

CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(20) NOT NULL default '',
  `user_password` varchar(32) NOT NULL default '',
  `user_regdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `mail` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- 列出以下資料庫的數據： `tbl_user`
-- 

INSERT INTO `tbl_user` VALUES (1, 'admin', 'admin', '2005-02-20 17:35:44', '2013-09-27 15:31:49', '1', '1', '1');
INSERT INTO `tbl_user` VALUES (4, 'test', 'test', '0000-00-00 00:00:00', '2012-08-17 22:32:15', 'test', 'test', '');
INSERT INTO `tbl_user` VALUES (6, 'test1', 'test1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'est', '');
INSERT INTO `tbl_user` VALUES (7, 'abc123', '147258', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '');
