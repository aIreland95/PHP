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

  $target_file = $tagret_dir . basename($_FILES['upload']['name']);
  echo $target_file;

  move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
}

?>

Upload your file.
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload">
  <br />
  <input type="submit" name="Submit">
</form>