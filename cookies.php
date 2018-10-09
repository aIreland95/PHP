<?php
// Aaron Ireland
// cookies.php - display last visit date and time

// cookies are used to identify users, can be created using setcookie() function
// we'll use name, value, and expire for the function
$cookie_name = "visit";
$cookie_value = mktime();
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
      if (isset($_COOKIE['visit'])) {

        $seconds = $_COOKIE['visit'];
        $current = mktime();
        $secondsCalc = ($current - $seconds);

        echo "You have been here before.";
        echo "<br> Your last visit was - " . date("g:i:s - m/d/y");
        echo "<br> It has been " . $secondsCalc . " seconds since you reloaded this page.";
        echo "<br> \`[-|-]/";

      }
      else {
        echo "This is your first time here.";
        echo "<br> \`[-|-]/";
      }
      date_default_timezone_set('America/New_York');
      setcookie($cookie_name, $cookie_value, time() + (60), "/");
    ?>
  </body>
</html>
