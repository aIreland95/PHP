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
  }
  else {

    echo "This exists, but it's not a directory.";
  }
}
else {

  mkdir("test");
}

 ?>
