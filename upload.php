<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header('login.php');
}
?>

Upload your file.
<form action="" method="post">
  <input type="file" name="upload">
</form>
