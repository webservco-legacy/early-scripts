<?php
/*
temp.php
started 15:25 24.11.2007
15:25 24.11.2007
*/
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// SCRIPT INFO
$prog_file = "ubmypg.php";
$prog_name = "temp";
$prog_desc = "MySQL / PostgreSQL Query Tool";
$prog_version = "1.0.071116";
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// EDIT HERE
$ubws_dbhost = "localhost";
$ubws_dbport = "3306";
$ubws_dbport_my = "3306";
$ubws_dbport_pg = "5432";
$ubws_dbuser = "test";
$ubws_dbpass = "REDACTED";
$ubws_dbname = "test";
$db_type = "my";
$dbname = "Not Defined";
$query  = "SELECT * FROM tablename";
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// ERROR REPORTING
error_reporting(E_ALL);
//error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL ^ E_WARNING);
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// ENABLE PARSE TIMER
$ubws_cfg['misc']['loadtm'] = 1;
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// TIMER FUNCTIONS
/* ********** ********** ********** PAGE PARSE TIME ********** ********** ********** */
/*
originally by ReDuX (http://www.daniweb.com/code/snippet70.html)
*/
// timer start function
function startTimer() {
  global $starttime;
  $mtime = microtime();
  $mtime = explode(' ', $mtime);
  $mtime = $mtime[1] + $mtime[0];
  $starttime = $mtime;
}
// timer end function
function endTimer() {
  global $starttime;
  $mtime = microtime();
  $mtime = explode(' ', $mtime);
  $mtime = $mtime[1] + $mtime[0];
  $endtime = $mtime;
  $totaltime = round(($endtime - $starttime), 5);
  return $totaltime;
}
function pageLoadTime() {
  global $ubws_cfg;
  if ($ubws_cfg['misc']['loadtm'] === 1) {
    echo "<HR>Parse time: " . endTimer();
  }
}
startTimer();
/* ********** ********** ********** //PAGE PARSE TIME ********** ********** ********** */
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// DATABASE FUNCTIONS
function ubws_dbopen($db_type) {
  global $ubws_dbhost, $ubws_dbport, $ubws_dbuser, $ubws_dbpass, $ubws_dbname;
  switch($db_type) {
    case "my": {
      $ubws_dbconn = mysql_connect($ubws_dbhost . ":" . $ubws_dbport , $ubws_dbuser, $ubws_dbpass) or die ("<B>Oups! [" . mysql_errno() . "]: " .mysql_error() . "</B>");
      mysql_select_db($ubws_dbname) or die ("<B>Oups! [" . mysql_errno() . "]: " .mysql_error() . "</B>");
      break;
    }
    case "pg": {
      global $ubws_dbhost, $ubws_dbport, $ubws_dbuser, $ubws_dbpass, $ubws_dbname;
      $ubws_dbconn = pg_connect("host=" . $ubws_dbhost . " port=".$ubws_dbport." dbname=".$ubws_dbname." user=".$ubws_dbuser." password=".$ubws_dbpass."") or die("Oops! Could not connect" . pg_connection_status($ubws_dbconn));
      break;
    }
    default  : {$ubws_conn = NULL; break;}
  }
  return $ubws_dbconn;
}
function ubws_dbclose($db_type, $ubws_dbconn) {
  switch($db_type) {
    case "my": {mysql_close($ubws_dbconn); break;}
    case "pg": {pg_close($ubws_dbconn); break;}
    default  : {break;}
  }
}
function ubws_qres($db_type, $query) {
  switch($db_type) {
    case "my": {$result = mysql_query($query) or die("Oops! Query Failed. " . mysql_errno() . " : " . mysql_error()); break;}
    case "pg": {$result = pg_query($query) or die("Oops! Query Failed. " . pg_last_error()); break;}
    default  : {$result = NULL; break;}
  }
  return $result;
}
function ubws_qtotal($db_type, $result) {
  switch($db_type) {
    case "my": {$total = mysql_num_rows($result); break;}
    case "pg": {$total = pg_num_rows($result); break;}
    default  : {$total = NULL; break;}
  }
  return $total;
}
function ubws_fetch_assoc($db_type, $result) {
  switch($db_type) {
    case "my": {$row = mysql_fetch_assoc($result); break;}
    case "pg": {$row = pg_fetch_assoc($result); break;}
    default  : {$row = NULL; break;}
  }
  return $row;
}
function ubws_affected($db_type, $result) {
  switch($db_type) {
    case "my": {$affected = mysql_affected_rows(); break;}
    case "pg": {$affected = pg_affected_rows($result); break;}
    default  : {$affected = NULL; break;}
  }
  return $affected;
}
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// FORM HANDLING
if (isset($_POST['click'])) {
  $ubws_dbhost = $_POST['dbhost'];
  $ubws_dbport = $_POST['dbport'];
  $ubws_dbuser = $_POST['dbuser'];
  $ubws_dbpass = $_POST['dbpass'];
  $ubws_dbname = $_POST['dbname'];
  $query = $_POST['query'];
  switch($_POST['db']) {
    case "my": {$db_type = "my"; $dbname = "MySQL"; break;}
    case "pg": {$db_type = "pg"; $dbname = "PostgreSQL"; break;}
    default  : {$db_type = "na"; $dbname = "Not Defined"; break;}
  }
}
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// ACTUAL PAGE CONTENT FOLLOWS
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML><HEAD><TITLE><?php echo $prog_name;?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</HEAD>
<BODY>
<?php
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
// XXX
  $query = "SELECT DISTINCT statiunea FROM tablename;";
  ubws_dbopen($db_type);
  
  $result = ubws_qres($db_type, $query);
  $total = ubws_qtotal($db_type, $result);
  if ($total !== '0') {
    for ($i=1; $i<=$total; $i++) {
    $row = ubws_fetch_assoc($db_type, $result);
    
    echo "<FORM><INPUT TYPE=\"checkbox\"><BR><TEXTAREA COLS=\"100\" ROWS=\"40\">" . "STATIUNEA: " . $row['statiunea'] . "\n\n";
    
    $query2  = "SELECT * FROM tablename WHERE statiunea = '".$row['statiunea']."'";
    $result2 = ubws_qres($db_type, $query2);
    $total2  = ubws_qtotal($db_type, $result2);
    if ($total2 !== '0') {
      for ($j=1; $j<=$total2; $j++) {
        $row2 = ubws_fetch_assoc($db_type, $result2);
?>
Hotel / Vila: <?php echo $row2['hotel_vila'] . "\n";?>
Perioada: <?php echo $row2['perioada'] . "\n";?>
Nopti: <?php echo $row2['nopti'] . "\n";?>
Tarif Net: <?php echo $row2['tarif_net'] . "\n";?>
Tarif Loc DBL: <?php echo $row2['tarif_loc_dbl'] . "\n";?>
Servicii: <?php echo $row2['servicii'] . "\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n";?>
<?php
      }
    }
    echo "</TEXTAREA></FORM><BR><BR><HR>";
    }
  }
  ubws_dbclose($db_type, ubws_dbopen($db_type));
// XXX
/* ********** ********** ********** ********** ********** ********** ********** ********** ********** ********** */
?>
<HR>
</BODY>
</HTML>