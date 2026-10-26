<?php
$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];
?>
<p>
It may look complex, but the above code is actually dead simple.  Microtime is a function that returns a value giving the current time in seconds and milliseconds from the UNIX Epoch (internationally set as 0:00:00 January 1, 1970 GMT).   Explode then splits this value into its two component parts (seconds and milliseconds), and then inserts both values separately into an array.   With those values determined, of course, we can go on to insert the following code near the end of the webpage, after all the main code:
</p>
<p>
I'm pretty sure you can guess what's going on here.  The microtime is determined again and inserted into the endtime array.  We then delete the starttime array from it and come up with a brand new value, totaltime (which is the value we've wanted all along).  The number is then rounded to 5 significant figures, and output by the ECHO command. 
</p>
<?php
$endtime = microtime();
$endarray = explode(" ", $endtime);
$endtime = $endarray[1] + $endarray[0];
$totaltime = $endtime - $starttime;
$totaltime = round($totaltime,5);
echo "This page loaded in $totaltime seconds.";
?>

