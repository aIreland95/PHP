<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

var_dump($_POST['upload']);
echo "<hr />";
var_dump($_FILES['upload']);

if (isset($_FILES['upload'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);
  $uploadVerify = true;

  // Check to see if file already exists
if (file_exists($target_file)) {
  $uploadVerify = false;
  $ret = "Sorry, this file already exists...idiot.";
}

// Check file for type
$finfo = finfo_open(FILEINFO_MIME_TYPES);
$file_type = finfo_file($finfo, $_FILES['upload']['tmp_file']);
echo $file_type;

if ($_FILES['upload']['size'] > 2) {
  $uploadVerify = false;
  $ret = "Sorry, this file is too big...idiot.";
}


  if ($uploadVerify) {
  move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
  }
}
?>

Upload your file.
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload">
  <br />
  <input type="submit" name="Submit">
</form>

<h3 style="color:red;">
  <?php if ($ret) {echo $ret;} ?>
</h3>
