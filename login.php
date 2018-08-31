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
  echo "Username was $username";
  echo "<br>";
  echo "Password was $password";
}
?>

  </body>
</html>
