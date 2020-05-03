system功能

1. 可以觀看旅遊套商品
2. 會員系統
3. 可以加入購物車

資料庫SQL

會員管理
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

旅遊套商品

分類
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

旅遊套商品
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

購物車
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
