<?php
session_start();
require('dbconnection.php');

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

// SQL statement to execute, SURROUND VARIABLES WITH SINGLE QUOTES
  $sql = "SELECT username, password FROM users WHERE username = '$username'";

// Execute the SQL and return array to $result
  $result = $conn->query($sql);

//Extracting the returned query information
  while ($row = $result->fetch_assoc()) {
    if ($username == $row['username'] && password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
    }
  }
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

<a href="register.php">Register</a>
<a href="login.php"><strong> | Login</strong></a>

<?php

if (isset($_SESSION['username'])) {
  echo "<a href=\"upload.php\"> | Upload</a>";
  echo "<a href=\"users.php\"> | Users</a>";
}
?>

<br />

    <form method="post" action="">
      <input type="text" name="username" placeholder="username"> <br />
      <input type="password" name="password">
      <br>
      <input type="submit" value="Go">
      <br>
      <input type="submit" name="logout" value="logout">
    </form>

<?php

echo "Logged in as: " . $_SESSION['username'];

?>

  </body>
</html>
