<?php
$id=$_GET['id'];

$paginabon = ceil(($id) / 7);

echo 'id= ' . $id . '<br>';
echo 'paginabon= ' . $paginabon;
?>