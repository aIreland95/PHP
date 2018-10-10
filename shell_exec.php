<?php

// check if folder "test" exists

$output = shell_exec('ls -lah');
echo "<pre>$output</pr>";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$check = shell_exec('find /var/www/html/aaron/PHP "test"');
echo "<pre>$check</pre>";
 ?>
