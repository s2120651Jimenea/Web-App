DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(8) unsigned NOT NULL auto_increment, 
  `user_lname` varchar(30) NOT NULL default '',
  `user_fname` varchar(30) NOT NULL default '',
  `user_email` varchar(50) NOT NULL default '',
  `user_pass` varchar(50) NOT NULL default '',
  `user_status` int(1) NOT NULL default '0',
  `user_branch` varchar(30) NOT NULL default '',
  `user_access` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

INSERT INTO tbl_users(user_lname,user_fname,user_email,user_pass,user_status,user_branch,user_access) 
VALUES ("Parreno","Marlon","mparreno@gmail.com","123",'1',"Main","Owner");

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `prod_id` int(8) unsigned NOT NULL auto_increment, 
  `prod_name` varchar(30) NOT NULL default '',
  `prod_desc` varchar(250) NOT NULL default '',
  `prod_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `prod_status` int(1) NOT NULL default '0',
  `type_id` int(3) NOT NULL default '0',
  PRIMARY KEY  (`prod_id`),
  KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

INSERT INTO tbl_product(prod_name,prod_desc,prod_price,prod_status) 
VALUES ("Hikvision DS-2CD2143G0-I","4-megapixel Dome Camera With A Fixed Lens And Built-in Infrared Illumination For Night Vision. It Also Features A Weatherproof Design For Outdoor Use.","7500",'1');

DROP TABLE IF EXISTS `tbl_type`;
CREATE TABLE `tbl_type` (
  `type_id` int(3) unsigned NOT NULL auto_increment, 
  `type_name` varchar(30) NOT NULL default '',
  `type_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=301;

INSERT INTO tbl_type(type_name,type_status) 
VALUES ("Monitor",'1');
INSERT INTO tbl_type(type_name,type_status) 
VALUES ("PC Case",'1');
INSERT INTO tbl_type(type_name,type_status) 
VALUES ("CCTV",'1');
INSERT INTO tbl_type(type_name,type_status) 
VALUES ("iPad",'1');

DROP TABLE IF EXISTS `tbl_product_inv`;
CREATE TABLE `tbl_product_inv` (
  `rec_id` int(6) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `prod_qty` int(8) NOT NULL default '0',
  KEY  (`prod_id`),
  KEY (`rec_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_receive`;
CREATE TABLE `tbl_receive` (
  `rec_id` int(6) unsigned NOT NULL auto_increment, 
  `rec_amount` int(10) NOT NULL default '0',
  `rec_branch` varchar(30) NOT NULL default '0',
  `rec_date_added` date NOT NULL,
  `rec_time_added` time NOT NULL,
  `rec_saved` int(1) NOT NULL default '0',
  `rec_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`rec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_receive_items`;
CREATE TABLE `tbl_receive_items` (
  `rec_id` int(6) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `rec_qty` int(8) NOT NULL default '0',
  KEY  (`rec_id`),
  KEY  (`prod_id`)
) ENGINE=MYISAM;

DROP TABLE IF EXISTS `tbl_release`;
CREATE TABLE `tbl_release` (
  `rel_id` int(8) unsigned NOT NULL auto_increment, 
  `rel_branch` varchar(30) NOT NULL default '0',
  `rel_date_added` date NOT NULL,
  `rel_time_added` time NOT NULL,
  `rel_saved` int(1) NOT NULL default '0',	
  `rel_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`rel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_release_items`;
CREATE TABLE `tbl_release_items` (
  `rel_id` int(8) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `rel_qty` int(8) NOT NULL default '0',
  KEY  (`rel_id`),
  KEY  (`prod_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_release_inv`;
CREATE TABLE `tbl_release_inv` (
  `rel_id` int(8) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `prod_qty` int(8) NOT NULL default '0',
  KEY  (`prod_id`),
  KEY (`rel_id`)
) ENGINE=MyISAM;