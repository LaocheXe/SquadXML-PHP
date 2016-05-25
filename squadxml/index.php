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
//}

/** TODO - Filter **/
/////////////////////
/*******************

if roster filter enable than
if filter command eletement
echo
<member> info 

- add <rank> - to display there rank
- add <unit> - to filter in the xsl file (squad.php <- update file name to something else maybe?)

</member>
elseif filter blah

Look at 15thMEU squad.xsl file - that filter's all of them into different elements.

*******************/
////////////////////
/**    GET IT?   **/

/*
elseif($pluginpref['unitSquads'] == 1)
{
	$qry = "SELECT u.user_id, u.user_name, x.arma_id, x.arma_remark, x.arma_icq, s.sqd_id, u.user_email, u.user_hideemail, s.squad_name, s.squad_tags, s.squad_email, s.squad_website, s.squad_paa, s.squad_title FROM `#squadxml_exesystem` AS x INNER JOIN `#squads_exesystem` AS s ON x.sqd_id = s.sqd_id LEFT JOIN `#user` AS u ON u.user_id = x.user_id";
	$num = $sql->gen($qry);
	
	while ($row=$sql->fetch()) {
		if(!$row['x.sqd_id'])
		{
			$unitTags = $row['squad_tags'];
			$unitName = $row['squad_name'];
			$unitEmail = $row['squad_email'];
			$unitWebsite = $row['suqad_website'];
			$unitPicture = $row['squad_paa'];
			$unitTitle = $row['squad_title'];
		}
		else
		{
			$unitTags = $pluginpref['unitTags'];
			$unitName = $pluginpref['unitName'];
			$unitEmail = $pluginpref['unitEmail'];
			$unitWebsite = $pluginpref['unitWebsite'];
			$unitPicture = $pluginpref['unitPaa'];
			$unitTitle = $pluginpref['unitTitle'];
		}
		
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
	
		echo '<squad nick="'.$unitTags.'">
		<name>'.$unitName.'</name>
		<email>'.$unitEmail.'</email>
		<web>'.$unitWebsite.'</web>
		<picture>'.$unitPicture.'</picture>
		<title>'.$unitTitle.'</title>';
   
   		echo "<member id=\"$profile_id\" nick=\"$profile_name\">" .
		"<name>$profile_name</name>".
		"<email>$profile_email</email>".
		"<icq>$profile_icq</icq>".
		"<remark>$profile_remark</remark>".
		"</member>\n";
		echo '</squad>';
  	}
}
*/

/*  $num=mysql_numrows($result);
  $i=0;
  
  while ($i < $num) {
	  
   $id_arma = mysql_result($result,$i,"user_armaid");
  // $rank = mysql_result($result,$i,"rank");
  // $pos = mysql_result($result,$i,"pos"); //Position - Davis
   if(isset($id_arma)) {
		//if($rank != 0) {
		//	if (substr($pos, 1, 1) == 4 && substr($pos, 0, 1) == 7) { //See if not pilot (7) and if not pilot, then see if not A10 Pilot (4) ((Basicly removes the Airforce pilots from the group)) - Davis
		//	} elseif (substr($pos, 1, 1) == 2 && substr($pos, 0, 1) == 7) {
		//	} elseif (substr($pos, 1, 1) == 1 && substr($pos, 0, 1) == 7) {
		//	} else {
   $profile_rankl = mysql_result($result,$i,"rankl");
   $profile_titleu = mysql_result($result,$i,"titleu");		   
   $profile_posl = mysql_result($result,$i,"posL");	   
   $profile_name = mysql_result($result,$i,"profile_name");
   $profile_remark = "".$profile_posl."  --  ".$profile_titleu."";
   $profile_username = mysql_result($result,$i,"name");

   
   echo "<member id=\"$id_arma\" nick=\"$profile_name\">" .
		"<name>$profile_name</name>".
		"<email></email>".
		"<icq></icq>".
		"<remark>$profile_remark</remark>".
	"</member>\n";
   }
//   }
//   }
   $i++;
  }
  mysql_close();
?>
</squad>*/

 // $num=mysql_numrows($row);
 // $i=0;
  

  
?>