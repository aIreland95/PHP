<?php
// Aaron Ireland
// cookies.php - display last visit date and time

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
        $date2 = date();

        $elapsedTime = $date2 - $date1;

        echo "You have been here before.";
        echo "<br> Your last visit was - " . $visit;
        echo "<br> It has been " . $elapsedTime . " seconds since you reloaded this page.";
        echo "<br> \`[-|-]/";

        setcookie('timer', date("g:i:s - m/d/y"), time() + (60), "/");
      }
      else {
        echo "This is your first time here.";
        echo "<br> \`[-|-]/";
        $date1 = date();
      }
      date_default_timezone_set('America/New_York');
      setcookie($cookie_name, $cookie_value, time() + (60), "/");
      setcookie('lastVisit', date("g:i:s - m/d/y"), time() + (60), "/");
    ?>
  </body>
</html>
