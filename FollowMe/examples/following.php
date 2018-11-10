<?php

$follow_sql = "SELECT following_user_id FROM fm_follows WHERE user_id = '$userid'";
$follow_result = $conn->query($follow_sql);

while($row = $follow_result->fetch_row()) {
  $following_user_ids[] = $row[0];
}

while($row = $follow_result->fetch_assoc()) {

  $user_id = $row['user_id'];

  if (in_array($user_id, $following_user_ids)) {
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
