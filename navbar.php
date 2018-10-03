echo "<br />";
// echo "<a href=users.php>Users</a>"

echo (basename($_SERVER['PHP_SELF']) == "users.php") ? "<a href="users.php"><strong>Users</strong></a> : "<a href="users.php">Users</a>";
