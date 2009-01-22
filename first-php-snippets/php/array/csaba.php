<?php error_reporting(E_ALL); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Single dimension aray to multi dimension aray</title>
</head>

<body>
<?php
	$single = array('first_s', 'second_s', 'third_s', 'fourth_s', 'fifth_s');
	printOut($single);
	
	echo '------------------------------';
	
	$multi = singleToMulti($single);
	printOut($multi);	
?>
</body>
</html>
<?php
function printOut($input = array())
{
	if ( is_array($input) )
	{
		echo '<pre>';
		print_r($input);
		echo 'Array length: '.count($input);
		echo '</pre>';	
	} else {
		echo $input . '<br />';
		echo 'String lenght: '.strlen($input);	
	}
}

function singleToMulti($input = array())
{
	if ( is_array($input) )
	{
		foreach ( $input as $val ) {
			if (!isset($sm_array) ) {
				$sm_array[$val] = array();
				$last_array = &$sm_array[$val];
			} else {
				$last_array[$val] = array();
				$last_array = &$last_array[$val];
			}
		}
		return $sm_array; 
	} else {
		return array();	
	}
}
?>