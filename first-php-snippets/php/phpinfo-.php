<?php
// phpinfo-.php
// PHP and GD basic information for servers that have phpinfo() disabled
// Radu  Maier
// oimoroi@gmail.com
// version 1.00.060806
error_reporting(E_ALL);

$gdinfo = gd_info();

$gdversion = $gdinfo["GD Version"];

$gdfreetype = $gdinfo["FreeType Support"];
if ($gdinfo["FreeType Support"] == '1') {$gdfreetype = 'yes';}

$gdfreetypeL = $gdinfo["FreeType Linkage"];

$gdgif1 = $gdinfo["GIF Read Support"];
if ($gdinfo["GIF Read Support"] == '1') {$gdgif1 = 'yes';}

$gdgif2 = $gdinfo["GIF Create Support"];
if ($gdinfo["GIF Create Support"] == '1') {$gdgif2 = 'yes';}

$gdjpg = $gdinfo["JPG Support"];
if ($gdinfo["JPG Support"] == '1') {$gdjpg = 'yes';}

$gdpng = $gdinfo["PNG Support"];
if ($gdinfo["PNG Support"] == '1') {$gdpng = 'yes';}

echo '<B>PHP Version:</B> ' . PHP_VERSION . '<BR>';
echo '<B>GD Version:</B> ' . $gdversion . '<BR>';
echo '<B>FreeType Support:</B> ' . $gdfreetype . '<BR>';
echo '<B>Freetype Linkage:</B> ' . $gdfreetypeL . '<BR>';
echo '<B>GIF Read Support:</B> ' . $gdgif1 . '<BR>';
echo '<B>GIF Create Support:</B> ' . $gdgif2 . '<BR>';
echo '<B>JPG Support:</B> ' . $gdjpg . '<BR>';
echo '<B>PNG Support:</B> ' . $gdpng . '<BR>';
?>