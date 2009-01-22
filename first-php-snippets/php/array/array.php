<?php
error_reporting(6143);

function getValue($array, $value)
{
	$parts = explode('.', $value);
	$total = count($parts);
	//XXX
	return tester($array, $parts);
}

function tester($array, $values)
{
	$tv = count($values);
		
	if ( ( $tv > 0 ) && array_key_exists($values[0], $array) )
	{
		$val = $values[0];
		array_shift($values);
		return tester($array[$val], $values); 
	}
	return $array;
}

$a['path']['to']['file'] = '/path/to/file.ini';
$a['path']['to']['another']['file'] = '/path/to/another/file.txt';
$a['some']['stuff'] = 'some value';

echo getValue($a, 'path.to.file');

//echo getValue($a, 'some.stuff');
?>