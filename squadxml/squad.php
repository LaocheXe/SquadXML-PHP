<?php
header('Content-Type: text/xsl');
$_E107['no_online'] = true;
$_E107['no_forceuserupdate'] = true;
$_E107['no_menus'] = true;
$_E107['allow_guest'] = true; // allow crons to run while in members-only mode.
$_E107['no_maintenance'] = true;
require_once("../../class2.php");


// MAybe make a database table as squadxml_catagories with order function



echo '<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="text()">
	<xsl:value-of select="."/>
</xsl:template>
<xsl:template match="*">
	<xsl:apply-templates/>
</xsl:template>
<xsl:template match="/">
	<HTML>
	<HEAD>
		<TITLE>Squad XML - <xsl:value-of select="/squad/name"/></TITLE>
		<LINK REL="stylesheet" TYPE="text/css" HREF="squad.css"/>
	</HEAD>
	<BODY>
	<!--Main TABLE -->                                                                             
	<TABLE class="main">
	<TR>
	  <TD class="left_row" valign="top">
	<!-- Squad Info Table -->
		<TABLE class="sqd_info">
			<TR height="30">
				<TD class="one">
					<DIV class="sqd_name">
						<xsl:value-of select="/squad/name"/>
					</DIV>
				</TD>
			</TR>
			<TR height="30">
				<TD class="two">
					<DIV class="sqd_title">
						<xsl:value-of select="/squad/title"/>
					</DIV>
				</TD>
			</TR>
			<TR height="100%">
				<TD width="100%" height="100%" valign="top">
					<DIV class="sqd_logo">
					<img src="sqd_logo.png" alt="Picture: Squad Logo"/>
					</DIV>
				</TD>
			</TR>
			<TR height="10">
				<TD class="sqd_website">
					Website: 
					<A>
					   <xsl:attribute name="href">
					   <xsl:value-of select="/squad/web"/>
					   </xsl:attribute>
					   <xsl:value-of select="/squad/name"/>
					</A>
				</TD>
			</TR>
			<TR>
				<TD class="sqd_email">	
				 	Email:
					<A>
					  <xsl:attribute name="href">
					  mailto:<xsl:value-of select="/squad/email"/>
					  </xsl:attribute>
					  <xsl:value-of select="/squad/email"/>
					</A>	
				</TD>
			</TR>
            <TR>
            </TR>
            <TR>
            <TD>
            </TD>
            </TR>
			<TR height="10">
				<TD class="sqd_website"> 
					<A>
					   <xsl:attribute name="href"></xsl:attribute>
                       
					</A>
				</TD>
			</TR>
			<TR height="10">
				<TD class="sqd_website">
					<A>
					   <xsl:attribute name="href"></xsl:attribute>
                       
					</A>
				</TD>
			</TR>                   
		</TABLE>
	<!-- Squad Info Table -->
		</TD>
		<TD class="right_row" valign="top">			
	<!-- Member-Info Table -->
						<TABLE class="member_info">
							<Tr>
							<!-- <Th>Rank</Th> -->
								<Th>Member</Th>
								<th>Position</th>
							</Tr>
							<!-- <Tr>
								<Th colspan="3"><center>Command Element</center></Th>
							</Tr> -->
							<!-- <xsl:for-each select="/squad/member[unit="CE"]"> -->
							<!-- Below will be replaced -->
							<xsl:for-each select="/squad/member">
							<TR>
								<xsl:attribute name="class">
								  <xsl:choose>
								     <xsl:when test="position() mod 2 = 0">one</xsl:when>
								     <xsl:otherwise>two</xsl:otherwise>
								  </xsl:choose>
								</xsl:attribute>
								<!-- <TD class="member_rank" >
								  <xsl:value-of select="rank"/>
								</TD> -->
								<TD class="member_name" rowspan="2">
								  <xsl:value-of select="name"/>
								</TD>
							<!--	<TD class="member_email">
								  <A>
								    <xsl:attribute name="href">
								      mailto:<xsl:value-of select="email"/>
								    </xsl:attribute>
								    <xsl:value-of select="email"/>
								  </A>
								</TD>
								<TD class="member_icq">
								  <xsl:value-of select="icq"/>
								</TD> -->
							</TR>
							<TR>
							<xsl:attribute name="class">
							  <xsl:choose>
							     <xsl:when test="position() mod 2 = 0">one</xsl:when>
							     <xsl:otherwise>two</xsl:otherwise>
							  </xsl:choose>
							</xsl:attribute>
								<TD class="member_remark" colspan="2" valign="top">
								  <xsl:value-of select="remark"/>
								</TD>
							</TR>
							</xsl:for-each>
						</TABLE>
	<!-- Member Info Table -->					
	<!--Main TABLE -->
	</TD>
	</TR>
	</TABLE>
	</BODY>
	</HTML>
</xsl:template>
</xsl:stylesheet>';
?>