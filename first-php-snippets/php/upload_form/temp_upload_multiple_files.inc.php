<?php
$errMsg = '';
?>
<DIV CLASS="pg_title">
TEMP
</DIV>
<DIV CLASS="pg_subtitle">
&nbsp;<?//=$_SERVER['HTTP_HOST']?><?//=$_SERVER['REQUEST_URI']?>
</DIV>
<DIV CLASS="pg_content">
<?php
$nr_poze = '1';
if (isset($_GET['nr_poze'])) {$nr_poze = $_GET['nr_poze'];}
?>
<FORM ENCTYPE="application/x-www-form-urlencoded" CLASS="" NAME="image_nr_form" ID="image_nr_form" ACTION="" METHOD="get">
Num&#259;r c&#226;mpuri:&nbsp;
<SELECT CLASS="form_sel" NAME="nr_poze" ID="nr_poze" SIZE="1">
  <OPTION VALUE="1"<?php if ($nr_poze == '1') {echo ' SELECTED';} ?>>1</OPTION>
  <OPTION VALUE="2"<?php if ($nr_poze == '2') {echo ' SELECTED';} ?>>2</OPTION>
  <OPTION VALUE="3"<?php if ($nr_poze == '3') {echo ' SELECTED';} ?>>3</OPTION>
  <OPTION VALUE="4"<?php if ($nr_poze == '4') {echo ' SELECTED';} ?>>4</OPTION>
  <OPTION VALUE="5"<?php if ($nr_poze == '5') {echo ' SELECTED';} ?>>5</OPTION>
  <OPTION VALUE="6"<?php if ($nr_poze == '6') {echo ' SELECTED';} ?>>6</OPTION>
  <OPTION VALUE="7"<?php if ($nr_poze == '7') {echo ' SELECTED';} ?>>7</OPTION>
  <OPTION VALUE="8"<?php if ($nr_poze == '8') {echo ' SELECTED';} ?>>8</OPTION>
  <OPTION VALUE="9"<?php if ($nr_poze == '9') {echo ' SELECTED';} ?>>9</OPTION>
  <OPTION VALUE="10"<?php if ($nr_poze == '10') {echo ' SELECTED';} ?>>10</OPTION>
</SELECT>
&nbsp;
<A CLASS="default" HREF="javascript:void(0);" onClick="submitform(document.forms['image_nr_form']); return false;">afi&#351;eaz&#259;</A>
</FORM>

<BR>
<?php
if (isset($_POST['upload_img'])) {
  
  foreach ($_FILES['userfile']['error'] as $key => $error) {
    $file_name  = $_FILES['userfile']['name'][$key];
    $file_type  = $_FILES['userfile']['type'][$key];
    $file_temp  = $_FILES['userfile']['tmp_name'][$key];
    $file_error = $_FILES['userfile']['error'][$key];
    $file_size  = $_FILES['userfile']['size'][$key];
    
    $err = '0';
    
    //if ($file_error == '4') {$errMsg = 'Selecta&#355;i o imagine &#238;n c&#226;mpul ' . $key . '!'; $err = '1';}
    if ($file_error == '0' && ($file_type != 'image/jpeg' && ($file_type != 'image/gif' && $file_type != 'image/png'))) {$errMsg = 'Eroare C&#226;mpul '. $key . '! Sunt admise doar imagini (jpeg,gif,png)!'; $err = '1';}
    else if ($file_error == '3') {$errMsg = 'Eroare C&#226;mpul '. $key . '! Upload par&#355;ial'; $err = '1';}
    else if ($file_error == '0' && !is_uploaded_file($file_temp)) {$errMsg = 'Eroare C&#226;mpul '. $key . '! Fi&#351;ierul nu este trimis prin formular!'; $err = '1';}
    else if ($file_error == '0') {$errMsg = 'OK!'; $err = '0';}
    
    if ($err == '0') {
      $upload_dir = VAR_PICS_SERV_DIR;
      $upload_path = $upload_dir . basename($file_name);
    
      if($file_error == '0') {
        if (move_uploaded_file($file_temp, $upload_path)) {
          echo '<TABLE CELLPADDING="0" CELLSPACING="0" ALIGN="center" BORDER="0"><TR><TD CLASS="ok_msg">';
          echo 'Poza ' . $key . ' a fost ad&#259;ugat&#259;!';
          echo '</TD></TR></TABLE>';
          echo '<BR>';
        } // UPLOAD OK
        else {
          echo '<TABLE CELLPADDING="0" CELLSPACING="0" ALIGN="center" BORDER="0"><TR><TD CLASS="err_msg">';
          echo 'Eroare! Poza ' . $key . ' nu a fost ad&#259;ugat&#259;!';
          echo '</TD></TR></TABLE>';
          echo '<BR>';
        } // EROARE DE UPLOAD
      } // POST OK  
      else if ($file_error == '4') {
        echo '<TABLE CELLPADDING="0" CELLSPACING="0" ALIGN="center" BORDER="0"><TR><TD CLASS="ok_msg">';
        echo 'Poza ' . $key . ' nu a fost ad&#259;ugat&#259;!';
        echo '&nbsp;';
        echo '(c&#226;mp gol)';
        echo '</TD></TR></TABLE>';
        echo '<BR>';
      } // BLANK POST
    } // ERROR = 0  
    else {
      echo '<TABLE CELLPADDING="0" CELLSPACING="0" ALIGN="center" BORDER="0"><TR><TD CLASS="err_msg">';
      echo $errMsg;
      echo '<BR>';
      echo 'Poza ' . $key . ' nu a fost ad&#259;ugat&#259;!';
      echo '</TD></TR></TABLE>';
      echo '<BR><BR>';
    } // ERROR = 1
  }
}
?>
<FORM ENCTYPE="multipart/form-data" CLASS="" NAME="image_upload_form" ID="image_upload_form" ACTION="" METHOD="post">
<INPUT TYPE="hidden" NAME="MAX_FILE_SIZE" ID="MAX_FILE_SIZE" VALUE="2000000" />
<?php
for ($i=1; $i<=$nr_poze; $i++) {
?>
Poza <?=$i?>:&nbsp;
<INPUT CLASS="form_file" TYPE="file" NAME="userfile[<?=$i?>]" ID="userfile[<?=$i?>]" SIZE="50" ACCEPT="image/gif,image/jpeg,image/png" />
<BR>
<?php
}
?>
<BR><BR>
<INPUT TYPE="submit" CLASS="form_sub" NAME="upload_img" ID="upload_img" VALUE="Adaug&#259;">
</FORM>
</DIV>