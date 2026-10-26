<?php

$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];


$mtime = explode(' ', microtime());
$totaltime = $mtime[0] + $mtime[1] - $starttime;
printf('Page loaded in %.3f seconds.', $totaltime);

?>