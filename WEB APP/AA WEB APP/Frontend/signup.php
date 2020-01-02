
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
    <?php

require_once "config.php";


$nic = $email = $password = $confirm_password = "";
$nic_err = $email_err = $password_err = $confirm_password_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter your email to register.";
    } else{

        $sql = "SELECT Email FROM Driver WHERE Email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["Email"]);

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered, if you need to reset your password follow the link below.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Registration failed! Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

if(empty(trim($_POST["nic"]))){
        $username_err = "Please enter your NIC to register.";
    } else{

        $sql = "SELECT NIC FROM Driver WHERE NIC = ?";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_nic);

            $param_nic = trim($_POST["NIC"]);

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $nic_err = "This NIC is already registered, if you need to reset your password follow the link below.";
                } else{
                    $nic = trim($_POST["nic"]);
                }
            } else{
                echo "Registration failed! Please try again later.";
            }
        }


        mysqli_stmt_close($stmt);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } elseif(strlen(trim($_POST["password"])) > 30){
        $password_err = "Password must be less than 30 characters.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please enter both password to confirm.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords did not match.";
        }
    }


    if(empty($nic_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){


        $sql = "INSERT INTO Driver VALUES (?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_nic, $param_email, $param_password);


            $param_nic = $nic;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);


            if(mysqli_stmt_execute($stmt)){

                header("location: login.php");
            } else{
                echo "Registration didn't went through. Please try again later.";
            }
        }


        mysqli_stmt_close($stmt);
    }


    mysqli_close($conn);
}
?>
    <div>
        <div class="header-blue" style="height: 100px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;">
                <div class="container-fluid"><a class="navbar-brand" href="home">Road Development Authority</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Features</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Support</a></li>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" style="height: 620px;" >
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                  <input class="form-control" type="text" name="first_name" placeholder="First Name" maxlength="100">
                  <input class="form-control" type="text" name="last_name" placeholder="Last Name" style="margin-bottom: 15px;" maxlength="100">
                  <input class="form-control" type="number" name="nic" placeholder="NIC / Passport No" style="margin-bottom: 15px;" maxlength="14">
                  <input class="form-control" type="date" name="date_of_birth" placeholder="Date of Birth">
                  <input class="form-control" type="tel" name="phone" placeholder="Contact No" maxlength="10">
                  <input class="form-control" type="email" name="email" placeholder="Email" style="margin-bottom: 15px;" maxlength="50">
                  <input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom: 15px;" maxlength="30">
                  <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" maxlength="30"></div>
                <div class="form-check"><label class="form-check-label">
                  <input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                <div class="form-group"><button class="btn btn-info btn-block" data-bs-hover-animate="pulse" type="submit" style="margin-top: 15px;">Sign Up</button></div><a class="already" href="login.php">You already have an account? Login here.</a></form>
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

</html>
