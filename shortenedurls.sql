-- 
-- Table structure for table `shurl`
-- 

CREATE TABLE `shurl` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `long_url` varchar(2550) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `creator` char(15) NOT NULL,
  `referrals` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
