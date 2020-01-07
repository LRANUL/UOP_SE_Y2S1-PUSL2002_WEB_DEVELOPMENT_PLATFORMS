<!DOCTYPE html>
<?php
require_once "config.php";
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>RDA Login</title>
  <meta name="description" content="Road Development Authority, Accident Management Department is Sri Lankan's Largest Accident Management and Reporting Community ! ">
  <link rel="icon" type="image/png" sizes="1500x1500" href="assets/img/RDAAMS_logo.png">
  <link rel="icon" type="image/png" sizes="1500x1500" href="assets/img/RDAAMS_logo.png">
  <link rel="icon" type="image/png" sizes="undefinedxundefined" href="assets/img/RDAAMS_logo.png">
  <link rel="icon" type="image/png" sizes="undefinedxundefined" href="assets/img/RDAAMS_logo.png">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="manifest" href="manifest.json">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body>
  <?php
  $Host = $_SERVER['REMOTE_ADDR'];
  $Time=time();
  $TimeDifference = (time()-30);
  mysqli_query($conn, "INSERT INTO LoginCheck VALUES (null,'$Host','$Time')");
  $result = mysqli_query($conn, "SELECT COUNT(*) FROM LoginCheck WHERE TrackIP LIKE '$Host'
  AND TimeCheck > $TimeDifference");
  $attempts = mysqli_fetch_array($result);
  if($attempts[0] > 3)
  {
    alert("Maximum attempts reached, please try again later."<br>"Time to Retry: " + $TimeDifference);
  }
  if ( !isset($_POST['username'], $_POST['password']) ) {

	alert('Please fill both the username and password field!');
}
if ($stmt = $con->prepare('SELECT email, password, firstName, lastName FROM login WHERE email = ?')) {

	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
}
if ($stmt->num_rows > 0) {
	$stmt->bind_result($email, $password, $firstname, $lastname);
	$stmt->fetch();

	if (password_verify($_POST['password'], $password)) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['Firstname'] = $_POST['firstName'];
    $_SESSION['Lastname'] = $_POST['lastname'];
		echo 'Welcome ' . $_SESSION['firstname'+'lastname'] . '!';
	} else {
		alert 'Incorrect password!';
	}
} else {
	alert 'Incorrect email, user not registered.';
}
$stmt->close();
?>
  ?>
  <div>
    <div class="header-blue" style="max-height: 100px;">
      <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;">
        <div class="container-fluid"><a class="navbar-brand" href="home">Road Development Authority</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white"></span></button>
          <div
          class="collapse navbar-collapse" id="navcol-1" style="margin-right: -10px;">
          <ul class="nav navbar-nav">
            <li class="nav-item" role="presentation"><a class="nav-link" href="features">Features</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="support">Support</a></li>
          </ul>
          <form class="form-inline mr-auto" target="_self">
            <div class="form-group"><label for="search-field"></label></div>
          </form><span class="navbar-text"> <a class="login" href="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="signup">Sign Up</a></div>
        </div>
      </nav>
    </div>
  </div>
  <div class="login-clean" style="background-image: url(&quot;assets/img/Town%20BG.jpg&quot;);background-size: cover;background-repeat: no-repeat;">
    <form method="post">
      <h3 class="text-center">Login to account</h3><img style="background-image: url(&quot;assets/img/Accident%20Recover.jpg&quot;);background-size: cover;background-position: top;width: 250px;height: 200px;padding: 20px;">
      <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" maxlength="50"></div>
      <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" maxlength="30"></div>
      <div class="form-group"><button class="btn btn-success btn-block" data-bs-hover-animate="pulse" type="submit">Log In</button></div><a class="forgot" href="support">Forgot your email or password?</a><a class="forgot" href="signup">Don't have an account? Signup here.</a></form>
    </div>
    <div class="card"></div>
    <div class="footer-clean">
      <footer>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-4 col-md-3 text-center item">
              <h3>About</h3>
              <ul>
                <li><a href="http://www.rda.gov.lk/">Ministry</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <p class="text-center copyright">Road Development Authority - Accident Management Department © 2020</p>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>

  </html>
