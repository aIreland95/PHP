<?php
session_start();
require('dbconnection.php');

if (isset($_POST['username'])) {
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  $sql = "SELECT username, password FROM users WHERE username = $username";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php

if (isset($_POST['logout'])) {
  unset($_SESSION['username']);
}
?>

  <body>
    <form method="post" action="">
      <input type="text" name="Username" placeholder="Username"> <br />
      <input type="password" name="Password">
      <br>
      <input type="submit" value="Go">
      <br>
      <input type="submit" name="logout" value="logout">
    </form>

<?php

if (isset($username) && isset($password))
{
  if ($username == "aaron" && $password = "password")
  {
    $_SESSION['username'] = $username;
  }
}

echo "Logged in as: " . $_SESSION['username'];

?>

  </body>
</html>
