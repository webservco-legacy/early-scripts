<?php
for ($i=1; $i<5; $i++) {
	$idprodusfinal[$i] = 100 + $i;
}
?>

<?php
echo $idprodusfinal[1];
?>

<br><br>
<?php
for ($i=1; $i<5; $i++) {
	echo 'id-ul  nr. ' . $i . ' = ' . $idprodusfinal[$i] . '<br>';
}
?>