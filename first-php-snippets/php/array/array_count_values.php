<?php
$gestiunea = array("0", "0", "1", "1", "0");
$gestiunea_depozit = array_count_values($gestiunea);
echo $gestiunea_depozit[0];
?>