<?php
// cookies are used to identify users, can be created using setcookie() function
// we'll use name, value, and expire for the function
$cookie_name = "user";
$cookie_value = "bob";
// 86400 = 1 day
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if (isset($_COOKIE['user'])) {

        $visit = $_COOKIE['lastVisit'];

        echo "You have been here before.";
        echo " Your last visit was - " . $visit;
        echo " \`[-|-]/";
      }
      else {
        echo "This is your first time here.";
        echo " \`[-|-]/";
        // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      }
      setcookie($cookie_name, $cookie_value, time() + (60), "/");
      setcookie('lastVisit', date("G:i - m/d/y"), time() + (60), "/");
      date_default_timezone_set('America/New_York');
    ?>
  </body>
</html>
