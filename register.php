<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require('dbconnection.php');
$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_BCRYPT);
$sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
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
    <form method="post" action="">

      <?php
      if (isset($_SESSION['username'])) {
        echo "<a href=\"register.php\"><strong> Register</strong></a>";
        echo "<a href=\"login.php\"> | Login</a>";
        echo "<a href=\"upload.php\"> | Upload</a>";
        echo "<a href=\"users.php\"><strong> | Users</strong></a>";
      }
      ?>
      
      <br>
      <input type="text" name="username" placeholder="Username"> </br>
      <input type="password" name="password" placeholder="Password"> </br>
      <input type="submit">
    </form>
  </body>
</html>
