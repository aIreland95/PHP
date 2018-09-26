<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

if (isset($_GET['id']) && ($_GET['edit']=="edit")) {
  require('dbconnection.php'); // brings in the database connection
  $sql = "SELECT * FROM users WHERE user_id = " . $_GET['id']; // id is int data type, don't quote it
  $result = $conn->query($sql);

  echo "<form action=\"\" method=\"get\">";

  while ($row = $result->fetch_assoc()) {

    echo "<input name=\"user_id\" type=\"text\"disabled value=\"" . $row['user_id'] . "\">";
    echo "<br />";
    echo "<input name=\"username\" type=\"text\" placeholder=\"" . $row['username'] . "\">";
    echo "<br />";
    echo "<input name=\"password\" type=\"text\" placeholder=\"" . $row['password'] . "\">";
    echo "<input type=\"submit\" name=\"submit\" value=\"change\">";

    $oldID = $row['user_id'];
  }
echo "</form>";
}
else {
  echo "Something went wrong...";
}

echo $newUser;
echo $newPass;

if (isset($_GET['submit']) && $_GET['username'] != null) {
  require('dbconnection.php');
  $newUser = $_GET['username'];
  $sql = "UPDATE users SET username = '$newUser' WHERE user_id = '$oldID'";
  $conn->query($sql);
  header('Location: users.php');
}

if (isset($_GET['submit']) && $_GET['password'] != null) {
  require('dbconnection.php');
  $newPass = $_GET['password'];
  $encrypt = password_hash($newPass, PASSWORD_BCRYPT);
  $sql = "UPDATE users SET password = '$encrypt' WHERE user_id = '$oldID'";
  $conn->query($sql);
  header('Location: users.php');
}

?>
