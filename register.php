<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require('dbconnection.php');
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password');"
$conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Registry Page</h2>
    <form method="post" action="">
      <input type="text" name="username"> </br>
      <input type="password" name="password"> </br>
      <input type="submit">
    </form>
  </body>
</html>
