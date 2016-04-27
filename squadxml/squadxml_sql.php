<?php exit;?>
CREATE TABLE IF NOT EXISTS `squadxml_exesystem` (
  `xml_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `arma_id` varchar(255) DEFAULT NULL,
  `arma_remark` text NOT NULL,
  `arma_icq` varchar(255) NOT NULL,
  PRIMARY KEY (`xml_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;