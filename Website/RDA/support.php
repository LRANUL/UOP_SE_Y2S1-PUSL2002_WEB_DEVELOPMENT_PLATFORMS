<?php
require_once "config.php";

if(isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$sql = "insert into feedback (Email,Name,Subject,Description) value('" . $email . "', '" . $name . "', '" . $subject . "','" . $message . "')";
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Message Sent")</script>';


} else {
    echo '<script>alert("Message not sent, Try Again later")</script>'
. mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RDA Support</title>
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
          <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
              <div class="container-fluid"><a class="navbar-brand" href="index">Road Development Authority</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white"></span></button>
                  <div
                      class="collapse navbar-collapse" id="navcol-1">
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
    <div class="contact-clean" style="background-image: url(&quot;assets/img/2351187.jpg&quot;);background-size: cover;">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >
            <h2 class="text-center">Contact us</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" style="margin-bottom: 15px;" required="">
              <input class="form-control" type="text" name="email" placeholder="Email" inputmode="email" required=""><select class="form-control"
                    style="margin-top: 15px;" name="subject">
                    <optgroup selected="" label="Select Subject">
                      <option value="General" >General</option>
                      <option value="Account">Account</option>
                      <option value="Complaint">Complaints</option>
                    </optgroup></select></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">send</button></div>
        </form>
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
