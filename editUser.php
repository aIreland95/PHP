<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

if (isset($_SESSION['username'])) {
  echo "<a href=\"register.php\"> Register</a>";
  echo "<a href=\"login.php\"> | Login</a>";
  echo "<a href=\"upload.php\"> | Upload</a>";
  echo "<a href=\"users.php\"> | Users</a>";
}

if (isset($_GET['id']) && ($_GET['edit']=="edit")) {
  require('dbconnection.php'); // brings in the database connection
  $sql = "SELECT * FROM users WHERE user_id = " . $_GET['id']; // id is int data type, don't quote it
  $result = $conn->query($sql);

  echo "<form action=\"\" method=\"get\">";

  while ($row = $result->fetch_assoc()) {

    echo "<input name=\"dis_user_id\" type=\"text\"disabled value=\"" . $row['user_id'] . "\">";
    echo "<input name=\"user_id\" type=\"hidden\" value=\"" . $row['user_id'] . "\">";
    echo "<br />";
    echo "<input name=\"username\" type=\"text\" placeholder=\"" . $row['username'] . "\">";
    echo "<br />";
    echo "<input name=\"password\" type=\"text\" placeholder=\"" . $row['password'] . "\">";
    echo "<input type=\"submit\" name=\"submit\" value=\"change\">";

  }
echo "</form>";
}
else {
  echo "Something went wrong...";
}


if (isset($_GET['submit']) && $_GET['username'] != null) {
  require('dbconnection.php');
  $newUser = $_GET['username'];
  $user_id = $_GET['user_id'];
  echo $newUser;
  echo $newPass;
  $sql = "UPDATE users SET username = '" . $newUser . "' WHERE user_id = " . $user_id;
  $conn->query($sql);
  header('Location: users.php');
}

if (isset($_GET['submit']) && $_GET['password'] != null) {
  require('dbconnection.php');
  $newPass = $_GET['password'];
  $user_id = $_GET['user_id'];
  $encrypt = password_hash($newPass, PASSWORD_BCRYPT);
  $sql = "UPDATE users SET password = '" . $encrypt . "' WHERE user_id = " . $user_id;
  $conn->query($sql);
  header('Location: users.php');
}

?>
