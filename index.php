<?php
header('Content-Type: text/xml');
$username="UserName";
$password="Password";
$database="Database_Name";
mysql_connect('localhost',$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

echo "<?xml version=\"1.0\"?>\n".
     "<!DOCTYPE squad SYSTEM \"squad.dtd\">\n".
     "<?xml-stylesheet href=\"squad.xsl?\" type=\"text/xsl\"?>\n";
?>
<squad nick="82ndab">
	<name>My Team</name>
	<email>contact@myteam.net</email>
	<web>http://www.myteam.net</web>
	<picture>teampatch.paa</picture>
	<title>The Team's Motto</title>
<?php

// NOTES

// Currently the WHERE id_arma IS NOT NULL does not remove the users who don't have the arma id enter into the database (meaning that is shows them too instead of hiding them)
$result = mysql_query("SELECT id_arma, real_name AS profile_name, arma_motto AS profile_remark, real_name AS name, email_address AS email FROM smf_members WHERE id_arma IS NOT NULL");

  $num=mysql_numrows($result);
  //mysql_close();
  $i=0;
  
  while ($i < $num) {
	  
   $id_arma = mysql_result($result,$i,"id_arma");
   if(TRUE) {
   $profile_name = mysql_result($result,$i,"profile_name");
   $profile_remark = mysql_result($result,$i,"profile_remark");
   $profile_username = mysql_result($result,$i,"name");
   /*$profile_email = mysql_result($result,$i,"email");*/
   /*$profile_icq = mysql_result($result,$i,"icq");*/
   
   echo "<member id=\"$id_arma\" nick=\"$profile_name\">" .
		"<name>$profile_name</name>".
		"<email></email>".
		"<icq></icq>".
		"<remark>$profile_remark</remark>".
	"</member>\n";
   }
   $i++;
  }
  mysql_close();
?>
</squad>
