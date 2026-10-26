<?php
error_reporting(E_ALL);

$algos = hash_algos();
foreach ($algos as $id => $algo)
{
    echo $algo,': <b>',hash_file($algo, 'hash.php'),'</b><br />';
}
?>


