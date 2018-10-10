<?php

// check if folder "test" exists

$output = shell_exec('ls -lah');
echo "<pre>$output</pr>";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$check = shell_exec('ls uploads');

if ($check == NULL) {
  echo "This file does not exist...";
}
else {
  echo "This file exists!";
}


 ?>
