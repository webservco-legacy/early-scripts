<?php
error_reporting(6143);

function OLD_array_insert($arr,$ins) {
    # Loop through all Elements in $ins:
    if (is_array($arr) && is_array($ins)) foreach ($ins as $k => $v) {
      # Key exists in $arr and both Elemente are Arrays: Merge recursively.
      if (isset($arr[$k]) && is_array($v) && is_array($arr[$k])) $arr[$k] = array_insert($arr[$k],$v);
      # Place more Conditions here (see below)
      # ...
      # Otherwise replace Element in $arr with Element in $ins:
      else $arr[$k] = $v;
    }
    # Return merged Arrays:
    return($arr);
 }
 
function array_insert($arr,$ins) {
    if (is_array($arr) && is_array($ins)) 
    {
        foreach ($ins as $k => $v) {
        if (isset($arr[$k]) && is_array($v) && is_array($arr[$k]))
        { 
        $arr[$k] = array_insert($arr[$k],$v);
        }
        else
        {
            $arr[$k] = $v;
        }
        }
    }
    return($arr);
}

$a = array(
    'dev'=>array(), 'test'=>array(), 'prod'=>array()
);

$x = array();
$x['dev']['setting'] = 'dev.setting.value';

$p = array();
$p['dev']['path']['core'] = 'dev.path.core.value';
$p['dev']['path']['app'] = 'dev.path.app.value';
$p['dev']['path']['www'] = 'dev.path.www.value';
$p['dev']['url']['app'] = 'dev.url.app.value';

$c = array_insert( $a, $x );

$cfg = array_insert( $c, $p );
?>
<pre>
A:
<?php print_r($a); ?>
<hr />
X:
<?php print_r($x); ?>
<hr />
P:
<?php print_r($p); ?>
<hr />
C:
<?php print_r($c); ?>
<hr />
CFG:
<?php print_r($cfg); ?>
</pre>