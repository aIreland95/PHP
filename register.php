<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require('dbconnection.php');
// grab post data, can be dangerous because of XSS or MySQL Injection
$username = $_POST['username'];
// sanitize the $username by removing tags
$username = filter_var($username, FILTER_SANITIZE_STRING);
// trim any whitespace from beginning and end of $username
$username = trim($username);
// take off the lashes in an inout box
$username = stripslashes($username);
// take off blank spaces within the username
$username = str_replace(' ','',$username);
// grab post data...password will be hashed, so no need to sanitize
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

      <a href ="register.php"><strong> Register</strong></a>
      <a href="login.php"> | Login</a>

      <?php
      /* if (isset($_SESSION['username'])) {
        echo "<a href=\"upload.php\"> | Upload</a>";
        echo "<a href=\"users.php\"><strong> | Users</strong></a>";
      } */
      ?>

      <br>
      <input type="text" name="username" placeholder="Username"> </br>
      <input type="password" name="password" placeholder="Password"> </br>
      <input type="submit">
    </form>
  </body>
</html>
