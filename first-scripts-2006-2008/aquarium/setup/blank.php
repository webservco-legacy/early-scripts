<?php
error_reporting(E_ALL);
include '../include/config.inc.php';
include '../include/dbopen.inc.php';
$tname = "aquarium_";
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
         "`ub_c_name` VARCHAR(30) NOT NULL, ".
         "`ub_c_location` VARCHAR(30) NOT NULL, ".
         "`ub_c_contact` VARCHAR(30) NOT NULL, ".
         "`ub_c_subj` VARCHAR(60) NOT NULL, ".
         "`ub_c_message` MEDIUMTEXT NOT NULL, ".
         "`ub_c_date` DATE NOT NULL, ".
         "`ub_c_time` TIME NOT NULL, ".
         "`ub_c_read` DATE NOT NULL, ".
         "`ub_c_answered` DATE NOT NULL, ".
         "`ub_stats_id` TINYINT(3) UNSIGNED NOT NULL, ".
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