<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php
$username = $_GET['Username'];
$password = $_GET['Password'];
?>

  <body>
    <form method="get" action="">
      <input type="text" name="Username" placeholder="Username"> <br />
      <input type="password" name="Password">
      <br>
      <input type="submit" value="Go">
    </form>

<?php
echo "Username was " + $username;
echo "<br>";
echo "Password was " + $password;
?>

  </body>
</html>
