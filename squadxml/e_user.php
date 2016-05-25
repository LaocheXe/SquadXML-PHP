<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2014 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

if (!defined('e107_INIT')) { exit; }

// v2.x Standard 
class squadxml_user // plugin-folder + '_user'
{		
		
	function profile($udata)  // display on user profile page.
	{
		$sql = e107::getDB();
		$squadXML = $sql->retrieve('squadxml_exesystem', '*', 'user_id = '.$udata['user_id']);

		$var = array(
			0 => array('label' => "", 'text' => "<b>Squad XML</b>"),
			1 => array('label' => "ArmA ID", 'text' => intval($squadXML['arma_id'])/*, 'url'=> e_PLUGIN_ABS."squadxml/squadxml.php"*/),
			2 => array('label' => "Remark", 'text' => $squadXML['arma_remark']),
			3 => array('label' => "ICQ Number", 'text' => $squadXML['arma_icq'])
		);
		
		
		
		return $var;
	}
	
}