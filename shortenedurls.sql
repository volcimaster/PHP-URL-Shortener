-- 
-- Table structure for table `shurl`
-- 

CREATE TABLE `shurl` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `short` varchar(255) NOT NULL UNIQUE,
  `long_url` varchar(768) NOT NULL UNIQUE,
  `created` int(10) unsigned NOT NULL,
  `creator` char(15) NOT NULL,
  `referrals` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
