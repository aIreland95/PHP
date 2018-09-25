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

  echo "<form action=\"\" method=\"post\">";

  while ($row = $result->fetch_assoc()) {

    echo "<input type=\"text\"disabled value=\"$row['user_id']\">";
  }

}
else {
  echo "You should not be here.";
}





?>
