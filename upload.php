<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
// var_dump($_POST['upload']);
// echo "<hr />";
// var_dump($_FILES['upload']);

if (isset($_SESSION['username'])) {
  echo "<a href=\"register.php\"> Register</a>";
  echo "<a href=\"login.php\"> | Login</a>";
  echo "<a href=\"upload.php\"><strong> | Upload</strong></a>";
  echo "<a href=\"users.php\"> | Users</a>";
}

if (isset($_FILES['upload'])) {
  // check to see if uploads folder exists
if (!file_exists("uploads")) {

    //if uploads folder doesn't exist, create it
    mkdir("./uploads");
}

if (!file_exists("uploads/" . $_SESSION['username'])) {
  mkdir("uploads/" . $_SESSION['username'], 0777, true);
}

  $target_dir = "uploads/" . $_SESSION['username'] . "/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);
  $uploadVerify = true;

  // Check to see if file already exists
if (file_exists($target_file)) {
  $uploadVerify = false;
  $ret = "Sorry, this file already exists.";
}

// Check file for type
$file_type = $_FILES['upload']['type'];
switch ($file_type){
    case "image/jpeg":
        $uploadVerify = true;
        break;
    case "image/png":
        $uploadVerfiy = true;
        break;
    case "image/gif":
        $uploadVerfiy = true;
        break;
    case "application/pdf":
        $uploadVerfiy = true;
        break;
    default:
        $uploadVerify = false;
        $ret = "Sorry, only jpeg, png, gif, and pdf files are allowed.";
        break;
}

if ($_FILES['upload']['size'] > 2000000) {
  $uploadVerify = false;
  $ret = "Sorry, this file is too big.";
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
