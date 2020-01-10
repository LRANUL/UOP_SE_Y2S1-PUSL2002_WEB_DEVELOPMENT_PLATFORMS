<?php
require_once "config.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];


    $sql = "select * from users where email = '".$email."'";
    $rs = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($rs);

    if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['Password'])) {
            if ($type == "Police_Agent"){
                session_start();
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);  // 12 hour session window
                $_SESSION["email"] = $email;
            header("Location: police");
        }
        else if($type == "Insurance_Agent"){
        session_start();
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);  // 12 hour session window
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $email;
            header("Location: insurance");
        }
        else if($type == "RDA_Agent"){
            session_start();
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);  // 12 hour session window
            $_SESSION["email"] = $email;
            header("Location: agent");
        }
        else if($type == "Web_Master"){
            session_start();
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);  // 12 hour session window
            $_SESSION["email"] = $email;
            header("Location: webmaster");
        }
        else{
            echo '<script>alert("Wrong Password")</script>';
        }
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Contact Support")';
        echo '</script>';
    }
}}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RDA Agent Login</title>
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
<body style="filter: blur(0px);">
    <div>
        <div class="header-blue" style="max-height: 100px;">
            <nav class="navbar navbar-light navbar-expand fixed-top navigation-clean-search" style="background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;opacity: 1;">
                <div class="container-fluid"><a class="navbar-brand" href="index">Road Development Authority</a>
                  <button class="navbar-toggler" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white"></span></button></div>
            </nav>
        </div>
    </div>

    <div class="login-clean" style="background-image: url(&quot;assets/img/City%20BG.jpg&quot;);/*filter: blur(8px);*//*-webkit-filter: blur(8px);*/background-size: cover;background-repeat: no-repeat;background-position: center;filter: blur(0px);">
<div style="text-align:center;background-color:white;">
      <h3>- AUTHORISED PERSONNEL'S ONLY -</h3>
        <h6>If You Came Here By Accident Please Follow This <a href="index">LINK</a> To Customer Page<br>
          UNAUTHORISED ACCESS IS STRICTLY PROHIBITED.</h6>
    </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
            <h3 class="text-center">Login to account</h3>
            <select class="custom-select" required="" name="type">
                <optgroup label="Select Access">
                    <option value="Police_Agent">Sri Lanka Police</option>
                    <option value="Insurance_Agent">Insurance/Assurance</option>
                    <option value="RDA_Agent">RDA Staff</option>
                    <option value="Web_Master">Administration</option></optgroup>
            </select>
            <div
                class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
    <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
    <div class="form-group"><button class="btn btn-outline-primary btn-block" data-bs-hover-animate="pulse" type="submit" name="submit">Log In</button></div><a class="forgot" href="support">Forgot your email or password?</a></form>
    </div>
    <div class="card"></div>
    <div class="footer-clean">
        <footer></footer>
        <p class="text-center copyright">Road Development Authority - Accident Management Department © 2020</p>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
