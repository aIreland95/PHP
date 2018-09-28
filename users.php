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

if (isset($_SESSION['username'])) {
  echo "<a href=\"login.php\"> | Login</a>";
}
if (isset($_SESSION['username'])) {
  echo "<a href=\"upload.php\"> | Upload</a>";
}
if (isset($_SESSION['username'])) {
  echo "<a href=\"users.php\"> | Users</a>";
}

if (isset($_POST['id']) && isset($_POST['delete'])) {
  $sql = "DELETE FROM users WHERE user_id = " . $_POST['id'];
  $result = $conn->query($sql);
}

// create the SQL query
$sql = "SELECT * from users";

// execute the SQL query
$result = $conn->query($sql);

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
        <th>Actions</th>
      </tr>

<?php
// loop through all table records
while($row = $result->fetch_assoc()) {
  echo "<tr>";
      echo "<td>" . $row['user_id'] . "</td>";
      echo "<td>" . $row['username'] . "</td>";
      echo "<td>" . $row['password'] . "</td>";
      echo "<td>
        <form action=\"editUser.php\" method=\"get\">
          <input type=\"hidden\" name=\"id\" value=\"" . $row['user_id'] . "\">
          <input type=\"submit\" value=\"edit\" name=\"edit\">
        </form>
        </td>";

      echo "<td>
              <form action=\"\" method=\"post\">
                <input name=\"id\" type=\"hidden\" value=\"" . $row['user_id'] . "\">
                <input type=\"submit\" value=\"Delete\" name=\"delete\">
              </form>
          </td>";
  echo "</tr>";
}
?>

    </table>

  </body>
</html>
