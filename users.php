<?php
// check to see if session has started
if (!isset($_SESSION)) {
  session_start();
}

// if user not logged in, sends them to login page
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

// bring in the database connection
require('dbconnection.php');

// create the SQL query
$sql = "SELECT * from users";

// execute the SQL query
$resut = $conn->query($sql);

// close dbconnection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table>
      <tr>
        <th>User ID </th>
        <th>Username </th>
        <th>Password Hash</th>
      </tr>

<?php
// loop through all table records
while($row = $result-fetch_assoc()) {
  echo "<tr>";
      echo "<td>" . $row['userid'] . <"/td>";
      echo "<td>" . $row['username'] . <"/td>";
      echo "<td>" . $row['password'] . <"/td>";
  echo = "</tr>";
}
?>

    </table>

  </body>
</html>
