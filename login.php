<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php
$username = $_POST['Username'];
$password = $_POST['Password'];
?>

  <body>
    <form method="post" action="">
      <input type="text" name="Username" placeholder="Username"> <br />
      <input type="password" name="Password">
      <br>
      <input type="submit" value="Go">
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
