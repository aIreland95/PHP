<?php

// check if folder "test" exists

$output = shell_exec('ls -lah');
echo "<pre>$output</pr>";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$check = file_exists("test");

if ($check == false) { echo "This file does not exist..."; }
else { echo "This file exists!"; }

 ?>
