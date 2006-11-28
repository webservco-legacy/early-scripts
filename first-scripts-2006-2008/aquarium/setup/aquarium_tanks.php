<?php
error_reporting(E_ALL);
include '../include/config.inc.php';
include '../include/dbopen.inc.php';
$tname = "aquarium_tanks";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<HTML>

<HEAD>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">

	<TITLE>The Underground Beat - Admin - Create MySQL table: <?=$tname?></TITLE>

	<META NAME="author" CONTENT="Radu Maier">
	
	<META NAME="keywords" CONTENT="underbeat, oi moroi, moroi, underground, beat, The Underground Beat, Underground Beat">
	
	<META NAME="description" CONTENT="The Underground Beat">
</HEAD>

<BODY BGCOLOR="#EDEDED">
    <DIV ALIGN="center">
<?php
$query = "CREATE TABLE $tname ( ".
		 "`id` INT(5) UNSIGNED NOT NULL, ".
		 "`tank_name` VARCHAR(30) NOT NULL, ".
		 "`tank_type` TINYINT(1) NOT NULL, ". /*  planted */
         "`tank_length` DOUBLE(4,2) NOT NULL, ".
         "`tank_width` DOUBLE(4,2) NOT NULL, ".
         "`tank_height` DOUBLE(4,2) NOT NULL, ".
         "`tank_volume` DOUBLE(4,2) NOT NULL, ".
         "`tank_purchase` DATE NOT NULL, ".
         "`tank_price` DOUBLE(9,2) NOT NULL, ".
         "`tank_loss` DATE NOT NULL, ".
         "`tank_status` TINYINT(1) NOT NULL, ". /*  online */
		 "`tank_description` MEDIUMTEXT NOT NULL, ".
         "PRIMARY KEY (`id`) ". 
		 ") ENGINE=MyISAM DEFAULT CHARSET=latin1";
		
mysql_query($query) or die('<FONT COLOR="#990000"><B>Oups!<BR>' . mysql_error() . '</B></FONT>');

echo 'Table <B>' . $tname . '</B> created!';
?>
    </DIV>
</BODY>
</HTML>
<?php
include '../include/dbclose.inc.php';
?>