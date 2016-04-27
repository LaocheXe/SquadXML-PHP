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
     "<?xml-stylesheet href=\"squad.xsl?\" type=\"text/xsl\"?>\n";
	 
$pluginpref = e107::pref('squadxml');
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

$qry = "SELECT u.user_id, u.user_name, x.arma_id, x.arma_remark, x.arma_icq, u.user_email FROM `#squadxml_exesystem` AS x LEFT JOIN `#user` AS u ON u.user_id = x.user_id";



$num = $sql->gen($qry);



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
  
  while ($row=$sql->fetch()) {
   $profile_id = $row['arma_id'];
   $profile_name = $row['user_name'];
   $profile_remark = $row['arma_remark'];
   $profile_email = $row['user_email'];
   $profile_icq = $row['arma_icq'];
   
   echo "<member id=\"$profile_id\" nick=\"$profile_name\">" .
		"<name>$profile_name</name>".
		"<email>$profile_email</email>".
		"<icq>$profile_icq</icq>".
		"<remark>$profile_remark</remark>".
	"</member>\n";

  // $i++;
  }
  
  echo '</squad>';
  
?>