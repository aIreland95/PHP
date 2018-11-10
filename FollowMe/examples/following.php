<?php

$following_sql = "SELECT user_id FROM fm_follows WHERE following_user_id = '$userid'";
$following_result = $conn->query($following_sql);

while($row = $following_result->fetch_row()) {
  $user_ids[] = $row[0];
}

while($row = $result->fetch_assoc()) {

  $following_userid = $row['user_id'];

  if (in_array($following_userid, $user_ids)) {
    echo "<li>";
    echo	"<div class=\"row\">";
    echo		"<div class=\"col-md-2 col-sm-2 ml-auto mr-0\">";
    echo			"<img src=" . $row['image_url'] . " alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">";
    echo		"</div>";
    echo		"<div class=\"col-md-7 col-sm-4  ml-0 mr-0\">";
    echo			"<h6>" . $row['first_name'] . " " . $row['last_name'] . "<br/><small>" . $row['title'] . "</small></h6>";
    echo		"</div>";
    echo	"</div>";
    echo "</li>";
    echo "<hr />";
  }
}

?>
