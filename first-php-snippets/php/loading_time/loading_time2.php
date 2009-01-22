<?php
 /*
*@author steve gricci
*@access public
*@skill beginner
*@site www.deepcode.net
*/

//put at begining of file

function utime (){
$time = explode( " ", microtime());
$usec = (double)$time[0];
$sec = (double)$time[1];
return $sec + $usec;
}
$start = utime();

//put at end of page before /body and /h // tml tags

$end = utime(); $run = $end - $start; echo "Page expelled in " . substr($run, 0, 5) . " secs.";
//Nothing after this
?>