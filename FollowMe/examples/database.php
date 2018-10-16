<?php
// Setting up the database connection
$db_host = 'localhost'; // database is installed on PHP server
$db_user = 'aaron'; // name to login to mysql
$db_password = 'southhills#'; // password to login to mysql
$db_name = 'aaron'; // name of database within mysql
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>
