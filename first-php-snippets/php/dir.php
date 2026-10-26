<?php
error_reporting(E_ALL);

function lsdir($dir) {
  $subdirs = NULL;
  $i = '1';
  if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
      while (($file = readdir($dh)) !== false) {
        if ($file != "." && $file != "..") {
          if (filetype($dir . $file) == 'dir') {
            $subdirs[$i] = $file;
            $i++;
          }
        }
      }
    closedir($dh);
    }
  }
  return $subdirs;
}

function _lsDir($dir, $dirs=TRUE, $files=FALSE)
    {
        $slash = ($dir[strlen($dir)-1]) != '/' ? FALSE : TRUE;
    $dir = $slash ? $dir : $dir.'/';
    
    $list = array('d'=>array(), 'f'=>array());
        $i = 0;
        $j = 0;
        if(is_dir($dir))
        {
      if($dh = opendir($dir))
            {
                while (FALSE !== ($file = readdir($dh)))
                {
          if($file != '.' && $file != '..')
          {
            if(strpos($file, '.') !== 0)
            {
              if($dirs && is_dir($dir.$file))
              {
                  $list['d'][$i] = $file;
                  $i++;
              }
              if($files && is_file($dir.$file))
              {
                  $list['f'][$j] = $file;
                  $j++;
              }
            }
          }
                }
                closedir($dh);
            }
        }
        return $list;
    }
$dir = 'e:/home/devel/workspace/RudWEb/rudweb/intl/';
  $dirs = _lsDir($dir, FALSE, TRUE);

$slash = ($dir[strlen($dir)-1]) != '/' ? FALSE : TRUE; 
if($slash){echo 'x';}

echo '<pre>';
print_r($dirs);