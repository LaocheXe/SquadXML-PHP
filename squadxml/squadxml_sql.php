<?php exit;?>
CREATE TABLE IF NOT EXISTS `squadxml_exesystem` (
  `xml_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `arma_id` varchar(255) DEFAULT NULL,
  `arma_remark` text NOT NULL,
  `arma_icq` varchar(255) NOT NULL,
  `sqd_id` int(10) DEFAULT NULL,
  `arma_order` int(10) NOT NULL,
  PRIMARY KEY (`xml_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `squads_exesystem` (
  `sqd_id` int(10) NOT NULL AUTO_INCREMENT,
  `squad_name` varchar(255) DEFAULT NULL,
  `squad_tags` varchar(255) DEFAULT NULL,
  `squad_email` varchar(255) DEFAULT NULL,
  `squad_website` varchar(255) DEFAULT NULL,
  `squad_paa` varchar(255) DEFAULT NULL,
  `squad_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sqd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;