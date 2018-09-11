<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header('login.php');
}

if (isset($_POST['upload'])) {
  $target_dir = "uploads/";
  $target_file = $tagret_dir . basename($_FILES['upload']['name']);
  move_uploaded_file($_FILES['upload']['tmp_namr'], $target_file);
}


?>

Upload your file.
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload">
  <br />
  <input type="submit">
</form>
