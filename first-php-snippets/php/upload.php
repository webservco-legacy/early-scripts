<?php
// URL POZE
$upload_url = "http://80.96.77.225:1980/pub/temp/";
// CALE POZE
$upload_dir = "d:/home/devel/server/htdocs/pub/temp/";
// NOUL NUME
$new_file_name = "mypic";
?>
<HTML>
<HEAD>
<TITLE>&#160;</TITLE>
</HEAD>

<BODY>
<?php
if (isset($_POST['upload_img'])) {
  // fisierul temporar
  $temp_file = $_FILES['poza']['tmp_name'];
  // extensia
  $file_ext = "";
  switch ($_FILES['poza']['type']) {
    case "image/gif": {$file_ext = ".gif"; break;}
    case "image/png": {$file_ext = ".png"; break;}
    default: {$file_ext = ""; break;}
  }
  // upload path
  $upload_path = $upload_dir . $new_file_name . $file_ext;
  // do the thing
  if (move_uploaded_file($temp_file, $upload_path)) {
    echo "upload ok!<BR><BR>";
    echo "\n<A HREF=\"".$upload_url.$new_file_name.$file_ext."\" TARGET=\"blank\">".$new_file_name.$file_ext."</A>";
    echo "\n<HR>";
  }
  else {
    echo "upload error!";
    echo "\n<HR>";
  }

}
?>
<FORM ENCTYPE="multipart/form-data" CLASS="" NAME="myform" ID="myform" ACTION="" METHOD="post">
<INPUT CLASS="" TYPE="file" NAME="poza" ID="poza" SIZE="40" ACCEPT="image/gif,image/jpeg,image/png" />
<INPUT TYPE="submit" CLASS="" NAME="upload_img" ID="upload_img" VALUE="trimite">
</FORM>
<PRE>

<?php
print_r($_FILES);
echo "<HR>";
//print_r(get_defined_constants(true));
?>
</PRE>

</BODY>
</HTML>