<?php
header('Content-Type: text/xml');
$_E107['no_online'] = true;
$_E107['no_forceuserupdate'] = true;
$_E107['no_menus'] = true;
$_E107['allow_guest'] = true; // allow crons to run while in members-only mode.
$_E107['no_maintenance'] = true;
require_once("../../class2.php");

echo "<?xml version=\"1.0\"?>\n".
     "<!DOCTYPE squad SYSTEM \"squad.dtd\">\n".
     "<?xml-stylesheet href=\"squad.php?\" type=\"text/xsl\"?>\n";
	 
	 // TODO: Order By Rank
	 // Will need database table for Roster Plugin and admin area to assign Ranks
	 // After that - add to squadxml_exesystem database table rost_id for roster
	 // Add in SQL query inner join roster table with rost_id and have the list order by Order
	 
	 
$pluginpref = e107::pref('squadxml');
//if($pluginpref['unitSquads'] == 0)
//{
	$unitSquads = $pluginpref['unitSquads'];

	if ($unitSquads == 0)
	{
		$unitTags = $pluginpref['unitTags'];
		$unitName = $pluginpref['unitName'];
		$unitEmail = $pluginpref['unitEmail'];
		$unitWebsite = $pluginpref['unitWebsite'];
		$unitPicture = $pluginpref['unitPaa'];
		$unitTitle = $pluginpref['unitTitle'];
		
		echo '<squad nick="'.$unitTags.'">
		<name>'.$unitName.'</name>
		<email>'.$unitEmail.'</email>
		<web>'.$unitWebsite.'</web>
		<picture>'.$unitPicture.'</picture>
		<title>'.$unitTitle.'</title>';
	
	$qry = "SELECT u.user_id, u.user_name, x.arma_id, x.arma_remark, x.arma_icq, u.user_email, u.user_hideemail FROM `#squadxml_exesystem` AS x LEFT JOIN `#user` AS u ON u.user_id = x.user_id";
	$num = $sql->gen($qry);
	
	while ($row=$sql->fetch()) {
	$profile_id = $row['arma_id'];
	$profile_name = $row['user_name'];
	$profile_remark = $row['arma_remark'];
	if($row['user_hideemail'] == 0)
	{
		$profile_email = $row['user_email'];
	}
	elseif($row['user_hideemail'] == 1)
	{
		$profile_email = '';
	}
	$profile_icq = $row['arma_icq'];
   
   echo "<member id=\"$profile_id\" nick=\"$profile_name\">" .
		"<name>$profile_name</name>".
		"<email>$profile_email</email>".
		"<icq>$profile_icq</icq>".
		"<remark>$profile_remark</remark>".
	"</member>\n";
  }
  echo '</squad>';
	}
	else if ($unitSquads == 1)
	{
		
		$qry1 = "SELECT s.sqd_id, s.squad_name, s.squad_tags, s.squad_email, s.squad_website, s.squad_paa, s.squad_title FROM `#squads_exesystem` AS x LEFT JOIN `#squadxml_exesystem` AS x ON x.sqd_id = s.sqd_id";
		$num = $sql->gen($qry1);
		
		while ($row1=$sql->fetch($qry1)) {
			$unitName = $row1['squad_name'];
			$unitTags = $row1['squad_tags'];
			$unitEmail = $row1['squad_email'];
			$unitWebsite = $row1['squad_website'];
			$unitPicture = $row1['squad_paa'];
			$unitTitle = $row1['squad_title'];
			
			echo '<squad nick="'.$unitTags.'">
					<name>'.$unitName.'</name>
					<email>'.$unitEmail.'</email>
					<web>'.$unitWebsite.'</web>
					<picture>'.$unitPicture.'</picture>
					<title>'.$unitTitle.'</title>';
		
			//$qry2 = "SELECT x.xml_id, x.sqd_id, s.sqd_id FROM `#squadxml_exesystem` AS x LEFT JOIN `#squads_exesystem` AS s ON s.sqd_id = x.sqd_id ORDER BY sqd_id";
			//$num = $sql2->gen($qry2);
		
			//$qry2 = "SELECT u.user_id, u.user_name, x.arma_id, x.arma_remark, x.arma_icq, u.user_email, u.user_hideemail FROM `#squadxml_exesystem` AS x LEFT JOIN `#user` AS u ON u.user_id = x.user_id";
			//$num2 = $sql2->gen($qry2);
			
			//$qry2 = "SELECT x.sqd_id, s.sqd_id, u.user_id, u.user_name, x.arma_id, x.arma_remark, x.arma_icq, u.user_email, u.user_hideemail FROM `#squadxml_exesystem` AS x INNER JOIN `#user` AS u ON u.user_id = x.user_id INNER JOIN `#squads_exesystem` AS s ON s.sqd_id = x.sqd_id ORDER BY x.sqd_id";
			//$num2 = $sql->gen($qry2);
			
			$qry2 = "SELECT u.user_id, u.user_name, x.arma_id, x.arma_remark, x.arma_icq, u.user_email, u.user_hideemail FROM #squadxml_exesystem AS x LEFT JOIN #user AS u ON u.user_id = x.user_id ORDER BY x.arma_order";
			$num = $sql2->gen($qry2);
	
			while ($row2=$sql->fetch()) {
				$profile_id = $row2['arma_id'];
				$profile_name = $row2['user_name'];
				$profile_remark = $row2['arma_remark'];
				if($row2['user_hideemail'] == 0)
				{
					$profile_email = $row2['user_email'];
				}
				elseif($row2['user_hideemail'] == 1)
				{
					$profile_email = '';
				}
				$profile_icq = $row2['arma_icq'];
   
  	 			echo "<member id=\"$profile_id\" nick=\"$profile_name\">" .
				"<name>$profile_name</name>".
				"<email>$profile_email</email>".
				"<icq>$profile_icq</icq>".
				"<remark>$profile_remark</remark>".
				"</member>\n";
  				}
  				echo '</squad>';
			}
		};
?>