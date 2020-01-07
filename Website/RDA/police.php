<!--
  Police Webpage coded by H.V.L.Hasanka
-->

<?php

  // Including the database connection file
//  include_once("connect.php");

  // Retriving the number of new reports
//  $result = mysqli_query($conn, "SELECT * FROM persons WHERE id=$id");

//  while($res = mysqli_fetch_array($result))

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RDA AMD</title>
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

    <!-- JavaScript code for Notification Alert -->
    <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
    });
    </script>

</style>
</head>
<body>
    <div></div>
    <div class="card"></div>
    <div>
        <div class="header-blue" style="background-color: #99ddff;background-size: contain;background-image: url(&quot;X&quot;);">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">
                    <p
                      style="font-family: 'Open Sans', sans-serif;
                             letter-spacing: 1.5px;
                             font-size: 25px;
                             color: black;">
                      <strong>RDA Accident Management - POLICE&nbsp;</strong><br>
                    </p>
                  </a>
                  <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navcol-1">
                      <form class="form-inline mr-auto" target="_self">
                          <div class="form-group"><label for="search-field"></label></div>
                      </form>
                      <a class="btn btn-light action-button" role="button" href="#"
                        style="color: black; border-color: black;">
                        Sign Out</a>
                  </div>
              </div>
            </nav>
            <!-- Bootstrap Spinner -->
            <div style="position: absolute;
                        left: 50%;
                        transform: translate(-50%, -0%);">
              <div class="spinner-grow text-light"
                style="width: 100px;
                       height: 100px;">
              </div>
            </div>
            <!-- Bell Notification Icon -->
            <a href="#" data-toggle="popover" data-trigger="focus" title="New Notifications" data-content="######" data-placement="bottom"
              style="position: absolute;
                     top: 75px;
                     left: 95%;
                     transform: translate(-5%, -0%);">
              <i class="fas fa fa-bell"
                style="font-size: 30px;
                       color: black;">
              </i>
            </a>
      </div>
    </div>

    <!-- Bootstrap Cards -->
    <div style="background-color: #66ccff;">
      <p style="text-align: center;
                font-size: 30px;
                padding-top: 15px;
                font-family: 'Open Sans', sans-serif"><b>Current Statistics</b></p>
        <div class="container"
          style="padding-bottom: 10px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="card"
                      style="border-radius: 20px;">
                        <div class="card-body text-white bg-primary" data-bs-hover-animate="pulse"
                          style="border-radius: 20px;">
                            <h4 class="text-center card-title">Registered Users</h4>
                            <small class="form-text text-uppercase text-center text-white">150 users</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card"
                      style="border-radius: 20px;">
                        <div class="card-body text-white bg-danger" data-bs-hover-animate="pulse"
                          style="border-radius: 20px;">
                            <h4 class="text-center text-white card-title">Accidents</h4>
                            <small class="form-text text-uppercase text-center text-white">300 ACCIDENTS</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card"
                      style="border-radius: 20px;">
                        <div class="card-body bg-success" data-bs-hover-animate="pulse"
                          style="border-radius: 20px;">
                            <h4 class="text-center text-white card-title">Managed</h4>
                            <small class="form-text text-center text-white">10 MANAGED ACCIDENTS</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"  data-bs-hover-animate="pulse">
                    <div class="card text-white bg-warning"
                      style="border-radius: 20px;">
                        <div class="card-body bg-warning"
                          style="border-radius: 20px;">
                            <h4 class="text-center card-title">Ongoing</h4>
                            <small class="form-text text-center text-white">50 ATTENDING ACCIDENTS</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="highlight-blue" style="background-color:#4d88ff;">
        <div class="container-fluid">
            <div class="intro">
                <h2 class="text-uppercase text-center">Road Development Authority(RDA) AMD - POLICE PORTAL</h2>
            </div>
        </div>
    </div>
    <div style="background-color: rgb(8,49,129);">
        <div class="container">
            <div class="row">
                <div class="col-auto col-md-12 text-center align-self-center m-auto" style="background-color: rgb(8,49,129);">
                    <nav class="navbar navbar-light navbar-expand-xl navigation-clean-button" style="background-color: rgb(8,49,129);">
                        <div class="container">
                          <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                          </button>
                          <!-- Bootstrap NavBar -->
                          <div class="collapse navbar-collapse" id="navcol-1">
                            <span class="navbar-text actions">
                              <!-- Bootstrap Collapse -->
                              <button type="button" class="btn btn-primary bg-success action-button" data-toggle="collapse" data-target="#viewStatisticsContainer">View Statistics on Accidents</button>
                                <div id="viewStatisticsContainer" class="collapse">
                                  <button type="button" class="btn btn-info btn-block" style="margin-top: 20px;
                                                                                              border-radius: 10px;">Type</button>
                                  <button type="button" class="btn btn-info btn-block" style="margin-top: 20px;
                                                                                              border-radius: 10px;">Location</button>
                                  <button type="button" class="btn btn-info btn-block" style="margin-top: 20px;
                                                                                              border-radius: 10px;">Past and Present Fluctuation</button>
                                </div>
                            </span>
                          </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="text-white bg-dark map-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Map of Current Accidents</h2>
            </div>
        </div><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&amp;q=7.8731%2C+80.7718&amp;zoom=7" width="100%" height="450"></iframe></div>
    <div class="highlight-blue" style="background-color: rgb(8,49,129);"></div>
    <div class="footer-dark" style="background-color: #0b0d39;">
        <footer>
            <div class="container">
                <p class="copyright">Road Development Authority - Accident Management Department © 2020<br></p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
