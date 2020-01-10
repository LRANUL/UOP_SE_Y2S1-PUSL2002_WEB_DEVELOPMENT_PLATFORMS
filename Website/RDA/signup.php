<?php
/**
* Following code Encypts registerd password with salt and inserts new data to Tables 'Users'
*and 'Driver', validations are done and warnings about issues and other related details agrees are shown to user.
*--R.P.L--
*/
require_once "config.php";

  if(isset($_POST['submit'])) {
      $nic = $_POST['nic'];
      $Name = $_POST['firstname'];
      $Surname = $_POST['lastname'];
      $birth = $_POST['birth'];
      $contact = $_POST['contact'];
      $license = $_POST['licenseno'];
      $insuranceno = $_POST['insuranceno'];
      $insurance = $_POST['insurance'];
      $email = $_POST['email'];
      $password = $_POST['password'];
/*Below hash function currently sets salt at cost 4, this can be increased till value till 22 to increase strength but this will effect stability
of the pages and server as encoding process requires more processing power. */
      $options = array("cost" => 4);
      $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

      $sql = "insert into users (nic, firstname,email, password) value('" . $nic . "', '" . $Name . "', '" . $email . "','" . $hashPassword . "')";

      $sql1 = "INSERT INTO driver(nic,firstname,lastname,DateOfBirth,ContactNo,LicenseNo,InsuranceNo,InsuranceName) value('" . $nic . "', '" . $Name . "', '" . $Surname . "', '" . $birth . "','" . $contact . "', '" . $license . "','" . $insuranceno . "','" . $insurance . "')";
      if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
          header("Location: login");

      } else {
          echo '<script>alert("Registration Failed, Try Again later")</script>'
              . mysqli_error($conn);
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>RDA Signup</title>
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

<div>
<div class="header-blue" style="height: 100px;">
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;">
<div class="container-fluid"><a class="navbar-brand" href="index">Road Development Authority</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white"></span></button>
<div
class="collapse navbar-collapse" id="navcol-1">
<ul class="nav navbar-nav">
<li class="nav-item" role="presentation"><a class="nav-link" href="features">Features</a></li>
<li class="nav-item" role="presentation"><a class="nav-link" href="support">Support</a></li>
</ul>
<form class="form-inline mr-auto" target="_self">
<div class="form-group"><label for="search-field"></label></div>
</form><span class="navbar-text"> <a data-bs-hover-animate="pulse" class="login" href="login">Log In</a></span><a class="btn btn-light action-button" role="button" data-bs-hover-animate="pulse" href="signup">Sign Up</a></div>
</div>
</nav>
</div>
</div>
<div class="register-photo">
<div class="form-container">
<div class="image-holder" style="background-image: url(&quot;assets/img/Signup.jpg&quot;);background-size: cover;background-repeat: no-repeat;background-position: left;"></div>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" style="height: 620px;" >
<h2 class="text-center"><strong>Create</strong> an account.</h2>
<div class="form-group">
<input class="form-control" type="text" name="firstname" placeholder="First Name" maxlength="100">
<input class="form-control" type="text" name="lastname" placeholder="Last Name" style="margin-bottom: 15px;" maxlength="100">
<input class="form-control" type="number" name="nic" placeholder="NIC / Passport No" style="margin-bottom: 15px;" maxlength="14">
<input class="form-control" type="date" name="birth" placeholder="Date of Birth">
    <input class="form-control" type="tel" name="contact" placeholder="Phone" maxlength="10">
    <input class="form-control" type="tel" name="insuranceno" placeholder="Insurance No" maxlength="10">
<input class="form-control" type="tel" name="licenseno" placeholder="License No" maxlength="10">
<input class="form-control" type="text" name="insurance" placeholder="Insurance Name" maxlength="100">
<input class="form-control" type="email" name="email" placeholder="Email" style="margin-bottom: 15px;" maxlength="50">
<input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom: 15px;" maxlength="30">
<input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" maxlength="30"></div>
<div class="form-check"><label class="form-check-label">
<input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
<div class="form-group">
    <button class="btn btn-info btn-block" data-bs-hover-animate="pulse" type="submit" name="submit" style="margin-top: 15px;">Sign Up</button>
</div><a class="already" href="login.php">You already have an account? Login here.</a></form>
</div>
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
