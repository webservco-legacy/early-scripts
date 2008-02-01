<?php
/*
./ubmywork.php
start: 10:37 05.12.2007
06:29 2008-01-21
*/

$ln_wd['0'] = "sunday";
$ln_wd['1'] = "monday";
$ln_wd['2'] = "tuesday";
$ln_wd['3'] = "wednesday";
$ln_wd['4'] = "thursday";
$ln_wd['5'] = "friday";
$ln_wd['6'] = "saturday";


function dayofweek($date) {
  global $ln_wd;
  $d  = substr($date, 8, 2);
  $m  = substr($date, 5, 2);
  $y  = substr($date, 0, 4);
  $wd  = date("w",mktime(0, 0, 0, $m  , $d, $y));
  switch($wd) {
    case "0": {$wd = $ln_wd['0']; break;}
    case "1": {$wd = $ln_wd['1']; break;}
    case "2": {$wd = $ln_wd['2']; break;}
    case "3": {$wd = $ln_wd['3']; break;}
    case "4": {$wd = $ln_wd['4']; break;}
    case "5": {$wd = $ln_wd['5']; break;}
    case "6": {$wd = $ln_wd['6']; break;}
    default: {$wd = "n/a"; break;}
  }
  return $wd;
}
echo dayofweek("2008-01-04");
?>