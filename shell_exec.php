<?php

// check if folder "test" exists

$output = shell_exec('ls -lah');
echo "<pre>$output</pr>";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$check = file_exists("test");

if ($check) {

  $checkDir = is_dir("test");

  if ($checkDir) {

    echo "This exists and is a directory!";
    echo "<br />";
    $testArray = scandir("test/");
    // var_dump($testArray);

    foreach ($testArray as $key => $value) {

      if ($value == "." || $value == "..") { continue; }
      echo $value . "<br />";

      $userArray = shell_exec('w -s');
    }
  }
  else {

    echo "This exists, but it's not a directory.";
  }
}
else {

  mkdir("test");
}

$users = shell_exec("W");
$usersExploded = explode("\n", $users);

foreach ($usersExploded as $key => $value) {
  if ($key == "0" || $key == "1") { continue; }
  $username = substr($value, 0, strpos($value, ' '));
  echo $username . "<br>";
}

 ?>
