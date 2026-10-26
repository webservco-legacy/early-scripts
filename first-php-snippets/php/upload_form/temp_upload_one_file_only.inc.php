<?php
$file_error_txt = 'err';

$errMsg = '';

if (isset($_POST['upload_img'])) {
  $file_name  = $_FILES['userfile']['name'];
  $file_type  = $_FILES['userfile']['type'];
  $file_temp  = $_FILES['userfile']['tmp_name'];
  $file_error = $_FILES['userfile']['error'];
  $file_size  = $_FILES['userfile']['size'];
  
  $err = '0';
  
  if ($file_error == '4') {$errMsg = 'Selecta&#355;i o imagine!'; $err = '1';}
  else if ($file_type != 'image/jpeg' && ($file_type != 'image/gif' && $file_type != 'image/png')) {$errMsg = 'Sunt admise doar imagini (jpeg,gif,png)!'; $err = '1';}
  else if ($file_error == '3') {$errMsg = 'Eroare! Upload par&#355;ial'; $err = '1';}
  else if (!is_uploaded_file($file_temp)) {$errMsg = 'Eroare! Fi&#351;ierul nu este trimis prin formular!'; $err = '1';}
  else if ($file_error == '0') {$errMsg = 'OK!'; $err = '0';}
  
  if ($err == '0') {
    $upload_dir = VAR_PICS_SERV_DIR;
    $upload_path = $upload_dir . basename($file_name);
    
    if (move_uploaded_file($file_temp, $upload_path)) {
      echo 'Upload OK!';
    }
    else {echo 'Eroare la upload!';}
  }
  else {
    echo '<TABLE CELLPADDING="0" CELLSPACING="0" ALIGN="center" BORDER="0"><TR><TD CLASS="err_msg">';
    echo $errMsg;
    echo '</TD></TR></TABLE>';
    echo '<BR><BR>';
    //require_once HTM_DIR . 'form_image_upload.inc.php';
    
  }
}
?>
<DIV CLASS="pg_title">
TEMP
</DIV>
<DIV CLASS="pg_subtitle">
</DIV>
<DIV CLASS="pg_content">
<FORM ENCTYPE="multipart/form-data" CLASS="" NAME="image_upload_form" ID="image_upload_form" ACTION="" METHOD="post">
<INPUT TYPE="hidden" NAME="MAX_FILE_SIZE" ID="MAX_FILE_SIZE" VALUE="2000000" />
file:&nbsp;
<INPUT TABINDEX="1" CLASS="form_file" TYPE="file" NAME="userfile" ID="userfile" SIZE="80" ACCEPT="image/gif,image/jpeg,image/png" />
<BR><BR>
<INPUT TABINDEX="2" TYPE="submit" CLASS="form_sub" NAME="upload_img" ID="upload_img" VALUE="Adaug&#259;">
</FORM>
</DIV>