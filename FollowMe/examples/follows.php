<?php

// Aaron Ireland
// follows.php - pulls users from database and displays their info for following

if (!isset($_SESSION)) {
  session_start();
}
require('database.php');

$sql = "SELECT user_id, first_name, last_name, title, image_url FROM fm_users";
$result = $conn->query($sql);

$userid = $_SESSION['user_id'];
$sql = "SELECT following_user_id FROM fm_follows WHERE user_id = '$userid'";

$follow_result = $conn->query($sql);

while($row = $follow_result->fetch_row()) {

  $following_user_ids[] = $row[0];
}

while ($row2 = $result->fetch_assoc()) {

 // if (isset($_POST['userid']) && isset($_POST['uncheck'])) {
//  $sql = "DELETE FROM fm_follows WHERE user_id = " . $_POST['id'] and following_user_id = ...;
//  $del_result = $conn->query($sql); }

  $firstName = $row2['first_name'];

  if ($_POST["$firstName"] == "yes") {

  $follow_id = $row2['user_id'];
  $sql = "INSERT IGNORE INTO fm_follows (user_id, following_user_id) VALUES ('$userid','$follow_id')";
  $conn->query($sql); }

  // one major thing to consider is how to monitor whether a value gets checked or unchecked while a page is running
  // javascript is not an option however
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Follow me by Aaron</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body>
  <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
    <div class="container">
			<div class="navbar-translate">
	       <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			     <span class="navbar-toggler-bar"></span>
				   <span class="navbar-toggler-bar"></span>
				   <span class="navbar-toggler-bar"></span>
	       </button>
	       <a class="navbar-brand" href="#">Follow Me</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a href="login.php" class="nav-link">Login</a>
	                </li>
                  <li class="nav-item">
                     <a href="editprofile.php" class="nav-link">Edit Profile</a>
                 </li>
                 <li class="nav-item">
                     <a href="follows.php" class="nav-link">Follows</a>
                 </li>
									<li class="nav-item">
	                    <a href="profile.php" class="nav-link">
												<?php echo $_SESSION['email']; ?>
											</a>
	                </li>
	            </ul>
	        </div>
		</div>
    </nav>

    <div class="wrapper">
      <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			  <div class="filter"></div>
		  </div>

			<br />
			<br />

			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
					<ul class="list-unstyled follows">
            <form method="post" action="">
						<?php

            while($row = $result->fetch_assoc()) {

              $user_id = $row['user_id'];

              if ($user_id == $userid){

              }
              else {

              echo "<li>";
  						echo	"<div class=\"row\">";
  						echo		"<div class=\"col-md-2 col-sm-2 ml-auto mr-auto\">";
  						echo			"<img src=" . $row['image_url'] . " alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">";
  						echo		"</div>";
  						echo		"<div class=\"col-md-7 col-sm-4  ml-auto mr-auto\">";
  						echo			"<h6>" . $row['first_name'] . " " . $row['last_name'] . "<br/><small>" . $row['title'] . "</small></h6>";
  						echo		"</div>";
  						echo		"<div class=\"col-md-3 col-sm-2  ml-auto mr-auto\">";
  						echo			"<div class=\"form-check\">";
  						echo				"<label class=\"form-check-label\">";
  						echo					"<input class=\"form-check-input\" name=" . $row['first_name'] . " type=\"checkbox\" value=\"yes\"";

              if (in_array($user_id, $following_user_ids)) {

                echo " checked";
              }
              echo ">";
  						echo					"<span class=\"form-check-sign\"></span>";
  						echo				"</label>";
  						echo			"</div>";
  						echo		"</div>";
  						echo	"</div>";
  						echo "</li>";
              echo "<hr />";

              }
            }
						?>
          </form>
					</ul>
          <input type="submit">
				</div>
			</div>
		</div>


	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                        <li><a href="http://blog.creative-tim.com">Blog</a></li>
                        <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tem
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
