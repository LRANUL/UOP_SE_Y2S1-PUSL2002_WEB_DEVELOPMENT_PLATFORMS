<!--
  Police Webpage (police.php) coded by H.V.L.Hasanka
-->

<?php
  //Including the database connection file
  include_once("config.php");

  $email = "";

  // Starts the session period
  session_start();

  if (!isset($_SESSION["email"])) {
      header("location: login.php");
  }
  else (isset($_POST["submit"])) {
      $email = $_POST["email"];
  }

  $firstName = "";
  $lastName = "";

  $flNameSQL = "SELECT FirstName, LastName FROM Police_Agent WHERE Email = '$email';";

  $flNameResult = mysqli_query($conn, $flNameSQL);

  while($flNameRow = mysqli_fetch_array($flNameResult)){
    $firstName = $flNameRow["FirstName"];
    $lastName = $flNameRow["LastName"];
  }
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

    <!-- Retrieving Chart.JS  library from local files-->
    <script src="assets/js/Chart.js"></script>
    <script src="assets/js/Chart.min.js"></script>

    <script>

      // JavaScript code used for Notification Alert
      $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
      });

      // JavaScript functions used to update the status of the report
        function updateStatusApprove(reportID){
          <?php
          $currentStatus = "";

          $checkCurrentStatusSQL = "SELECT Status FROM report WHERE ID = '?>+ reportID +<?php';";

          $checkCurrentStatusResult = mysqli_query($conn, $checkCurrentStatusSQL);

          while($checkCurrentStatusRow = mysqli_fetch_array($checkCurrentStatusResult)){
            $currentStatus = $checkCurrentStatusRow["Status"];
          }

          if($currentStatus == "Approved")
          {
            ?>alert("Report Status already assigned as Approved");<?php
          }
          else{
            $updateStatusSQL = "UPDATE report SET Status = 'Approved' WHERE ID = '?>+ reportID +<?php';";

            $updateStatusResult = mysqli_query($conn, $updateStatusSQL);

            if($updateStatusResult == true){
              ?>alert("Record Status Successfully Updated to Approved ");<?php
            }

          }
          ?>
        }

        function updateStatusSendHelp(){
          <?php
          $currentStatus = "";

          $checkCurrentStatusSQL = "SELECT Status FROM report WHERE ID = '?>+ reportID +<?php';";

          $checkCurrentStatusResult = mysqli_query($conn, $checkCurrentStatusSQL);

          while($checkCurrentStatusRow = mysqli_fetch_array($checkCurrentStatusResult)){
            $currentStatus = $checkCurrentStatusRow["Status"];
          }

          if($currentStatus == "Help Sent")
          {
            ?>alert("Report Status already assigned as Help Sent");<?php
          }
          else{
            $updateStatusSQL = "UPDATE report SET Status = 'Help Sent' WHERE ID = '?>+ reportID +<?php';";

            $updateStatusResult = mysqli_query($conn, $updateStatusSQL);

            if($updateStatusResult == true){
              ?>alert("Record Status Successfully Updated to Help Sent");<?php
            }
          }
          ?>
        }

        function updateStatueComplete(){
          <?php
          $currentStatus = "";

          $checkCurrentStatusSQL = "SELECT Status FROM report WHERE ID = '?>+ reportID +<?php';";

          $checkCurrentStatusResult = mysqli_query($conn, $checkCurrentStatusSQL);

          while($checkCurrentStatusRow = mysqli_fetch_array($checkCurrentStatusResult)){
            $currentStatus = $checkCurrentStatusRow["Status"];
          }

          if($currentStatus == "Completed")
          {
            ?>alert("Report Status already assigned as Completed");<?php
          }
          else{
            $updateStatusSQL = "UPDATE report SET Status = 'Completed' WHERE ID = '?>+ reportID +<?php';";

            $updateStatusResult = mysqli_query($conn, $updateStatusSQL);

            if($updateStatusResult == true){
              ?>alert("Record Status Successfully Updated to Completed");<?php
            }
          }
          ?>
        }

        function updateStatusDisapprove(){
          <?php
          $currentStatus = "";

          $checkCurrentStatusSQL = "SELECT Status FROM report WHERE ID = '?>+ reportID +<?php';";

          $checkCurrentStatusResult = mysqli_query($conn, $checkCurrentStatusSQL);

          while($checkCurrentStatusRow = mysqli_fetch_array($checkCurrentStatusResult)){
            $currentStatus = $checkCurrentStatusRow["Status"];
          }

          if($currentStatus == "Disapproved")
          {
            ?>alert("Report Status already assigned as Disapproved");<?php
          }
          else{
            $updateStatusSQL = "UPDATE report SET Status = 'Disapproved' WHERE ID = '?>+ reportID +<?php';";

            $updateStatusResult = mysqli_query($conn, $updateStatusSQL);

            if($updateStatusResult == true){
              ?>alert("Record Status Successfully Updated to Disapproved");<?php
            }
          }
          ?>
        }

    </script>



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
                      <p style="color: black;
                                position: relative;
                                left: -100px;
                                top: 30px;
                                font-size: 20px;"> Hello &nbsp <b><?php echo $firstName; ?>&nbsp<?php echo $lastName; ?></b> </p>
                      <a class="btn btn-light action-button" role="button" href="logout.php" style="color: black;
                                                                                                    border-color: black;
                                                                                                    position: absolute;
                                                                                                    top: 24px;">Logout
                      </a>
                  </div>
              </div>
            </nav>

            <!-- Bootstrap Spinner -->
            <div style="position: absolute;
                        left: 50%;
                        transform: translate(-50%, -0%);">
              <div class="spinner-grow text-light" style="width: 100px;
                                                          height: 100px;">
              </div>
            </div>
            <!-- Bell Notification Icon -->
            <a href="#" data-toggle="popover" data-trigger="focus" title="New Notifications"
            data-content="" data-placement="bottom"
              style="position: absolute;
                     top: 58px;
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
                    <div class="card bg-light" style="border-radius: 20px;">
                        <div class="card-body text-white bg-primary" data-bs-hover-animate="pulse" style="border-radius: 20px;">
                            <h4 class="text-center card-title">Registered Users</h4>

                            <?php
                              // The count of the 'NIC' is because it is unique and same user can't register twice.
                              $totalRegisteredUsersSQL = "SELECT COUNT(NIC) AS 'COUNT' FROM driver;";

                              // Retriving the total number of registered users
                              $totalRegisteredUsersResult = mysqli_query($conn, $totalRegisteredUsersSQL);

                              // Putting the retrived value to an array format
                              while($regUsers = mysqli_fetch_array($totalRegisteredUsersResult)){
                            ?>

                            <p class="form-text text-uppercase text-center text-white" style="font-size: 20px;">
                              <b><?php echo $regUsers["COUNT"];} ?></b> Users
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light" style="border-radius: 20px;">
                        <div class="card-body text-white bg-danger" data-bs-hover-animate="pulse" style="border-radius: 20px;">
                            <h4 class="text-center text-white card-title">Current Accidents</h4>

                            <?php
                              // Format: 2020-01-08
                            //  $currentDate = date("Y-m-d");

                              // Here the count of the 'NIC' cn't be used because the COUNT() function only retrieves distinct values.
                              $currentAccidentsSQL = "SELECT COUNT(ID) AS 'COUNT' FROM report WHERE Status = 'Pending' OR Status = 'Approved' OR Status = 'Help Sent'";

                              // Retriving the total number of registered users
                              $currentAccidentsResult = mysqli_query($conn, $currentAccidentsSQL);

                              // Putting the retrived value to an array format
                              while($cAccidents = mysqli_fetch_array($currentAccidentsResult)){
                            ?>

                            <p class="form-text text-uppercase text-center text-white" style="font-size: 20px;">
                              <b><?php echo $cAccidents["COUNT"];} ?></b> ACCIDENT(S)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light" style="border-radius: 20px;">
                        <div class="card-body bg-success" data-bs-hover-animate="pulse" style="border-radius: 20px;
                                                                                               height: 127px;">
                            <h4 class="text-center text-white card-title">Pending Complaints</h4>

                            <?php
                              // Here the count of the 'NIC' cn't be used because the COUNT() function only retrieves distinct values.
                              $driverComplaintsSQL = "SELECT COUNT(ID) AS 'COUNT' FROM Support WHERE Status = 'Pending';";

                              // Retriving the total number of registered users
                              $driverComplaintsResult = mysqli_query($conn, $driverComplaintsSQL);

                              // Putting the retrived value to an array format
                              while($dComplaints = mysqli_fetch_array($driverComplaintsResult)){
                            ?>

                            <p class="form-text text-center text-white" style="font-size: 20px;">
                              <b><?php echo $dComplaints["COUNT"];} ?></b> COMPLAINT(S)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"  data-bs-hover-animate="pulse">
                    <div class="card text-white bg-light" style="border-radius: 20px;">
                        <div class="card-body" style="border-radius: 20px;
                                                      height: 127px;
                                                      background-color: #006AB1;">
                            <h4 class="text-center card-title">Managed Accidents</h4>

                            <?php
                              // Format: 2020-01-08
                              $currentDate = date("Y-m-d");

                              // Here the count of the 'NIC' cn't be used because the COUNT() function only retrieves distinct values.
                              $managedAccidentsSQL = "SELECT COUNT(ID) AS 'COUNT' FROM report WHERE Date_Time = '$currentDate%' AND Status = 'Approved' OR
                              Status = 'Help Sent' OR Status = 'Complete';";

                              // Retriving the total number of registered users
                              $managedAccidentsResult = mysqli_query($conn, $managedAccidentsSQL);

                              // Putting the retrived value to an array format
                              while($mAccidents = mysqli_fetch_array($managedAccidentsResult)){
                            ?>

                            <p class="form-text text-center text-white" style="font-size: 20px;">
                              <b><?php echo $mAccidents["COUNT"];} ?></b> ACCIDENT(S)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bg-light" style="border-radius: 20px;
                                                      margin-top: 10px;">
                        <div class="card-body" data-bs-hover-animate="pulse" style="border-radius: 20px;
                                                                                    height: 70px;
                                                                                    background-color: #00B185;">
                            <h4 class="text-center text-white card-title" style="margin-left: -200px;">Ongoing</h4>

                            <!-- Adding a vertical line -->
                            <div style="border-left: 2px solid white;
                                        height: 60px;
                                        position: absolute;
                                        left: 50%;
                                        margin-left: -3px;
                                        top: 0;
                                        margin-top: 5px;">
                            </div>

                            <?php
                              // Here the count of the 'NIC' cn't be used because the COUNT() function only retrieves distinct values.
                              $attendingAccidentsSQL = "SELECT COUNT(ID) AS 'COUNT' FROM report WHERE Status = 'Approved' OR Status = 'Help Sent';";

                              // Retriving the total number of registered users
                              $attendingAccidentsResult = mysqli_query($conn, $attendingAccidentsSQL);

                              // Putting the retrived value to an array format
                              while($aAccidents = mysqli_fetch_array($attendingAccidentsResult)){
                            ?>

                            <p class="form-text text-center text-white" style="font-size: 20px;
                                                                               margin-left: 330px;
                                                                               margin-top: -40px;">
                              <b><?php echo $aAccidents["COUNT"];} ?></b> ATTENDING ACCIDENT(S)
                            </p>
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

    <div style="background-color: rgb(8,49,129);
                height: 180px; ">
        <p style="font-size: 30px;
                  color: white;
                  position: absolute;
                  left: 50%;
                  transform: translate(-50%, -0%);
                  margin-top: 10px;"><b>View Graphical Statistics on Accidents</b></p>
        <div style="position: absolute;
                    left: 25%;">

          <!-- Bootstrap Modal -->
          <!-- TYPE button -->
          <button type="button" class="btn btn-info btn-primary" style="margin-top: 70px;
                                                                        border-radius: 10px;
                                                                        width: 300px;
                                                                        height: 80px;
                                                                        font-size: 20px;" data-toggle="modal" data-target="#typeModal">Type of Accidents</button>

              <!-- 'TYPE' MODAL -->
              <div class="modal fade" id="typeModal">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                    <div>
                      <!-- MODEL - Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Type of Accidents</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- MODAL - Body -->
                      <div class="modal-body">
                        <div>
                          <!-- TYPE OF ACCIDENT GRAPH IMPLEMENTATION - BEGIN -->
                          <!-- Specifying place to render the chart -->
                          <div>
                            <canvas id="typeAccident" width="150" height="100"></canvas>
                          </div>

                          <script>
                            <?php
                              $countOfVehicles = array();

                              $typeAccidentSQL = "SELECT Type, COUNT(Type) AS 'COUNT' FROM report GROUP BY Type ORDER BY Type;";

                              $typeAccidentResult = mysqli_query($conn, $typeAccidentSQL);

                              while($typeAccidentRow = mysqli_fetch_array($typeAccidentResult)){
                                $countOfVehicle[] = ($typeAccidentRow["COUNT"]);
                              }
                            ?>


                            // Retrieving the ID of the assign canvas located at the position of the chart rendering position
                            var tAGraphLocation = document.getElementById('typeAccident').getContext('2d');

                            // DATASET of the chart
                            var data = {
                              labels: ["Bike", "Bus", "Car", "SUV", "Truck", "Van"],
                              datasets: [
                                {
                                  label: "Number of Vehicles",
                                  data: [<?php echo $countOfVehicle[0] ?>, <?php echo $countOfVehicle[1] ?>, <?php echo $countOfVehicle[2] ?>, <?php echo $countOfVehicle[3] ?>,
                                          <?php echo $countOfVehicle[4] ?>, <?php echo $countOfVehicle[5] ?>,],
                                  backgroundColor: [
                                    "#86BCDE",
                                    "#86BCDE",
                                    "#86BCDE",
                                    "#86BCDE",
                                    "#86BCDE",
                                    "#86BCDE"
                                  ],
                                  borderColor: [
                                    "#A886DE",
                                    "#A886DE",
                                    "#A886DE",
                                    "#A886DE",
                                    "#A886DE",
                                    "#A886DE"
                                  ],
                                  borderWidth: 1
                                }]};

                            // OPTIONS of the chart
                            var options = {
                              responsive: true,
                              title: {
                                display: false,
                                position: "top",
                                text: "Bar Graph",
                                fontSize: 18,
                                fontColor: "#111"
                              },
                              legend: {
                                display: true,
                                position: "top",
                                labels: {
                                  fontColor: "#333",
                                  fontSize: 16
                                }
                              },
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    min: 0
                                  }
                                }]
                              }
                            };

                            // Increasing the font size of the x axis and y axis
                            //chart.defaults.global.defaultFontSize = 10;
                            // CREATING chart with chart class object
                            var chart = new Chart(tAGraphLocation, {
                              type: "bar",
                              data: data,
                              options: options
                            });
                          </script>
                          <!-- TYPE OF ACCIDENT GRAPH IMPLEMENTATION - END -->


                        </div>
                      </div>
                      <!-- MODAL - Footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- LOCATION button -->
          <button type="button" class="btn btn-info btn-primary" style="margin-left: 10px;
                                                                        margin-top: 70px;
                                                                        border-radius: 10px;
                                                                        width: 300px;
                                                                        height: 80px;
                                                                        font-size: 20px;" data-toggle="modal" data-target="#locationModal">Location of Accidents</button>
            <!-- 'LOCATION' MODAL -->
            <div class="modal fade" id="locationModal">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                  <!-- MODEL - Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Location of Accidents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- MODAL - Body -->
                  <div class="modal-body">
                    <!-- LOCATION OF ACCIDENT GRAPH IMPLEMENTATION - BEGIN -->
                    <!-- Specifying place to render the chart -->
                    <div>
                      <canvas id="locationAccident" width="150" height="100"></canvas>
                    </div>

                    <?php
                        /* REFERENCES */
                        /* Stack Overflow. (2020). PHP Latitude Longitude to Address. [online] Available at: https://stackoverflow.com/questions/12810654/php-latitude-longitude-to-address [Accessed 10 Jan. 2020]. */
  /*                      function getaddress($lat,$lng)
                        {
                           $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
                           $json = @file_get_contents($url);
                           $data=json_decode($json);
                           $status = $data->status;
                           if($status=="OK")
                           {
                             return $data->results[0]->formatted_address;
                           }
                           else
                           {
                             return false;
                           }
                        }
                        /* REFERENCES */
  /*
                        $reportAddress = array();

                        $locationAccidentSQL = "SELECT Latitude, Longitude FROM report;";

                        $locationAccidentResult = mysqli_query($conn, $locationAccidentSQL);

                        while($locationAccidentRow = mysqli_fetch_array($locationAccidentResult)){
                          $reportLatitude = $locationAccidentRow["Latitude"];
                          $reportLongitude = $locationAccidentRow["Longtitude"];
                          $rAddress = getaddress($reportLatitude,$reportLongitude);
                          for ($i=0; $i < length.$reportAddress; $i++) {
                            if($rAddress != $reportAddress[i])
                            {
                              $reportAddress[i] = $rAddress;
                            }
                            else
                            {
                              break;
                            }
                          }
                        }
  */
                      ?>

                    <script>
                      new Chart(document.getElementById("locationAccident"), {
                          type: 'doughnut',
                          data: {
                            labels: ["Colombo", "Galle", "Kandy", "Nuwara Eliya", "Homogama"],
                            datasets: [
                              {
                                label: "Number of Accidents",
                                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                data: [5,1,2,2,1]
                              }
                            ]
                          },
                          options: {
                            title: {
                              display: false,
                              text: 'Number of Accidents Per City'
                            }
                          }
                      });
                      </script>
                      <!-- LOCATION OF ACCIDENT GRAPH IMPLEMENTATION - END -->





                  </div>

                  <!-- MODAL - Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          <!-- PAST AND PRESENT FLUCTUATIONS button -->
          <button type="button" class="btn btn-info btn-primary" style="margin-left: 10px;
                                                                        margin-top: 70px;
                                                                        border-radius: 10px;
                                                                        width: 300px;
                                                                        height: 80px;
                                                                        font-size: 20px;" data-toggle="modal" data-target="#papfModal">Past and Present Fluctuation <br>of Accidents</button>
            <!-- 'PAST AND PRESENT FLUCTUATIONS' MODAL -->
            <div class="modal fade" id="papfModal">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                  <!-- MODEL - Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Past and Present Fluctuation of Accidents by Location</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- MODAL - Body -->
                  <div class="modal-body">
                    <!-- PAST AND PRESENT FLUCTUATION OF ACCIDENT GRAPH IMPLEMENTATION - BEGIN -->
                    <!-- Specifying place to render the chart -->
                    <div>
                      <canvas id="pastAndPresentAFC" width="150" height="100"></canvas>
                    </div>

                    <script>
                    new Chart(document.getElementById("pastAndPresentAFC"), {
                      type: 'line',
                      data: {
                        labels: [2017,2018,2019,2020],
                        datasets: [{
                            data: [307,356,452,25],
                            label: "Colombo",
                            borderColor: "#3e95cd",
                            fill: false
                          }, {
                            data: [235,247,285,6],
                            label: "Galle",
                            borderColor: "#8e5ea2",
                            fill: false
                          }, {
                            data: [242,275,354,14],
                            label: "Kandy",
                            borderColor: "#3cba9f",
                            fill: false
                          }, {
                            data: [234,256,313,9],
                            label: "Nuwara Eliya",
                            borderColor: "#e8c3b9",
                            fill: false
                          }, {
                            data: [153,184,256,6],
                            label: "Homogama",
                            borderColor: "#c45850",
                            fill: false
                          }
                        ]
                      },
                      options: {
                        title: {
                          display: false,
                          text: 'Past and Present Fluctuation in Accidents by Location'
                        }
                      }
                    });

                  </script>
                  <!-- PAST AND PRESENT FLUCTUATION OF ACCIDENT GRAPH IMPLEMENTATION - BEGIN -->


                  </div>

                  <!-- MODAL - Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
    <div class="text-white bg-dark map-clean" style="height: 1200px;">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Map of Current Accidents</h2>
            </div>
        </div>
          <div>
            <!-- Specifying Location to render Google Map -->
            <div id="policeGMap" style="width: 67%;
                                        height: 900px;
                                        float: right;"></div>

            <div style="width: 33%;
                        height: 900px;
                        border: 1px solid #ccc;
                        background-color: #E2E5EA;">

              <p style="text-align: center;
                        font-size: 30px;
                        margin-top: 5px;
                        font-family: 'Open Sans', sans-serif;
                        letter-spacing: 1.5px;">Accident Catalog</p>

              <div style="height: 93%; width: 100%; background-color: #82DAFE; border-radius: 10; overflow-y: scroll;">

                <?php
                  $reportReportID = "";
                  $reportNIC = "";
                  $reportSeverity = "";
                  $reportType = "";
                  $reportDescription = "";
                  $reportDateTime = "";
                  $reportLatitude = "";
                  $reportLongtitude = "";
                  $reportStatus = "";

                  // Retrieving report details
                  $reportDetailsSQL = "SELECT ID, NIC, Severity, Type, Description, Date_Time, Longitude, Latitude, Status FROM report;";

                  $reportDetailsResult = mysqli_query($conn, $reportDetailsSQL);

                  while($reportDetailsRow = mysqli_fetch_array($reportDetailsResult)){
                    $reportReportID = $reportDetailsRow["ID"];
                    $reportNIC = $reportDetailsRow["NIC"];
                    $reportSeverity = $reportDetailsRow["Severity"];
                    $reportType = $reportDetailsRow["Type"];
                    $reportDescription = $reportDetailsRow["Description"];
                    $reportDateTime = $reportDetailsRow["Date_Time"];
                    $reportLatitude = $reportDetailsRow["Longitude"];
                    $reportLongtitude = $reportDetailsRow["Latitude"];
                    $reportStatus = $reportDetailsRow["Status"];

                      $reportMediaMedia = "";

                      // Retrieving the images of ACCIDENT
                      $reportMediaSQL = "SELECT Media FROM report WHERE ID = '$reportReportID';";

                      $reportMediaResult = mysqli_query($conn, $reportMediaSQL);

                      while($reportMediaRow = mysqli_fetch_array($reportMediaResult)){
                        $reportMediaMedia = ["Media"];
                      }

                      $driverFirstName = "";
                      $driverLastName = "";
                      $driverContactNumber = "";

                      // Retrieving driver details
                      $reportDriverSQL = "SELECT name, LastName, ContactNo FROM Driver WHERE NIC = '.$reportNIC.';";

                      $reportDriverResult = mysqli_query($conn, $reportDriverSQL);

                      while($reportDriverRow = mysqli_fetch_array($reportDriverResult)){
                        $driverFirstName = ["name"];
                        $driverLastName = ["LastName"];
                        $driverContactNumber = ["ContactNo"];
                      }
                    ?>

                    <div class="card" style="width: 100%; height: 340px; border: 0.5px solid #82DAFE; border-radius: 10px;">
                      <div class="card-body">
                        <!-- Header Section  - Description-->
                        <div style="width: 350px; height: 80px;">
                          <p style="font-size: 20px; margin-top: -15px; color: black;"> <b><?php echo $reportDescription; ?></b> </p>
                        </div>
                        <!-- Body Section -->
                        <div style="width: 350px;
                                    height: 200px;">
                          <p style="font-size: 20px;
                                    margin-top: -16px;
                                    color: black;
                                    text-decoration: underline;"> Driver Details:</br> </p>
                          <p style="font-size: 20px;
                                    color: black;
                                    margin-left: 20px;
                                    margin-top: -20px;"> Name:  <b><?php echo "$driverFirstName"; ?>&nbsp<?php echo $driverLastName;?></b> </p>
                          <p style="font-size: 20px;
                                    margin-top: -20px;
                                    color: black;
                                    position: relative;
                                    left: 20px;"> Contact Number: <b><?php echo $driverContactNumber; ?></b> </p>
                          <p style="font-size: 20px;
                                    margin-top: -20px;
                                    color: black;"> Type: <b><?php echo $reportType; ?></b> | <span style="color: red;"> Severity: <b><?php echo $reportSeverity; ?></b></span> </p>
                          <p style="font-size: 20px;
                                    margin-top: -20px;
                                    color: black;"> Status: <b><?php echo $reportStatus; ?></b> </p>
                          <p style="font-size: 20px;
                                    margin-top: -20px;
                                    color: black;"> Report Date Time: <span style="font-size: 17px;"> <b><?php echo $reportDateTime; ?></b> <span> </p>
                        </div>

                        <!-- Main Image Box -->
                        <div style="height: 160px; width: 160px; background-color: #82DAFE; position: absolute; top: 15px; left: 400px;">
                          <h1 style="text-align: center;"> IMAGE </h1>
                        </div>

                        <p style="font-size: 18px;
                                  position: absolute;
                                  top: 200px;
                                  left: 450px;
                                  color: black;"> Report ID: <b><?php echo $reportReportID; ?></b> </p>

                        <!-- Buttons Section -->
                        <div style="margin-left: 20px; margin-top: -20px;">
                          <button class="btn btn-primary" onclick="highlightMarker('$reportLatitude', '$reportLongtitude', '$reportStatus')" style="width: 495px; margin-bottom: 5px;">
                            <span class="spinner-border spinner-border-sm"></span>
                            Click to Highlight Marker on Map
                          </button>
                          <button type="button" onclick="updateStatusApprove(<?php echo $reportReportID; ?>);" class="btn btn-outline-primary" style="width: 120px;"> <b>Approve</b>
                          </button>
                          <button type="button" onclick="updateStatusSendHelp(<?php echo $reportReportID; ?>);" class="btn btn-outline-info" style="width: 120px;"> <b>Send Help</b>
                          </button>
                          <button type="button" onclick="updateStatueComplete(<?php echo $reportReportID; ?>);" class="btn btn-outline-success" style="width: 120px;"> <b>Completed</b>
                          </button>
                          <button type="button" onclick="updateStatusDisapprove(<?php echo $reportReportID; ?>);" class="btn btn-outline-secondary" style="width: 120px;"> <b>Disapprove</b>
                          </button>
                        </div>
                      </div>
                    </div>
                  <div style="height: 5px;"></div>
                <?php } ?>  <!-- Closing - Report details retrieval -->

              </div>
            </div>

            <!-- Highlighting the marker -->
            <script type="text/javascript">
              function highlightMarker(markerLatitude, markerLongitude, reportStatus){}
                if(reportStatus == 3){

                  gMapsMarker.setMap(null);

                  var gMapsMarkerk = new google.maps.Marker({position: { lat: markerLatitude, lng: markerLongitude},
                                                           animation: google.maps.Animation.DROP, icon: 'assets/img/GoogleMapMarkers/importantReports.png' });
                  gMapsMarkerk.setMap(policeGMap);
                }
                else{

                  gMapsMarker2.setMap(null);

                  var pendingReportsIcon = {url: "assets/img/GoogleMapMarkers/pendingReports.png",
                              scaledSize: new google.maps.Size(32, 48) // Resizing the customer marker
                              };

                    var gMapsMarkern = new google.maps.Marker({position: { lat: markerLatitude, lng: markerLongitude},
                                                             animation: google.maps.Animation.DROP, icon: pendingReportsIcon });
                    gMapsMarkern.setMap(policeGMap);
                }
              }

            </script>

            </div>

            <!-- Google Map LEGEND -->
            <div style="height: 135px;
                        width: 1200px;
                        background-color: white;
                        border-radius: 20px;
                        margin-top: 24px;
                        position:absolute;
                        left: 50%;
                        transform: translateX(-50%);">
              <p style="font-size: 25px;
                        margin-left: 15px;
                        text-decoration: underline;">Google Map Legend</p>
              <div style="margin-left: 20px;
                          margin-top: 50px;
                          text-align: center;">
                <img src="assets/img/GoogleMapMarkers/importantReports.png" style="display: inline-block;
                                                      position: relative;
                                                      left: 100px;
                                                      bottom: 40px;">
                  <p style="display: inline-block;">Severity: 3 Reports</p>
                <img src="assets/img/GoogleMapMarkers/approvedReports.png" style="display: inline-block;
                                                      position: relative;
                                                      left: 90px;
                                                      bottom: 40px;">
                  <p style="display: inline-block;">Approved Reports</p>
                <img src="assets/img/GoogleMapMarkers/helpSentReport.png" style="display: inline-block;
                                                      position: relative;
                                                      left: 100px;
                                                      bottom: 40px;">
                  <p style="display: inline-block;">Help Sent Reports</p>
                <img src="assets/img/GoogleMapMarkers/pendingReports.png" style="display: inline-block;
                                                     position: relative;
                                                     left: 80px;
                                                     bottom: 40px;" height="50px" width="35px">
                  <p style="display: inline-block;">Pending Reports</p>
                <img src="assets/img/GoogleMapMarkers/completedReport.png" style="display: inline-block;
                                                      position: relative;
                                                      left: 90px;
                                                      bottom: 40px;">
                  <p style="display: inline-block;">Completed Reports</p>
                <img src="assets/img/GoogleMapMarkers/disapprovedReports.png" style="display: inline-block;
                                                         position: relative;
                                                         left: 95px;
                                                         bottom: 40px;">
                  <p style="display: inline-block;">Disapproved Reports</p>
              </div>
            </div>

          </div>
    <div class="footer-dark" style="background-image: linear-gradient(#36d1dc, #5b86e5); ">
        <footer>
            <div class="container">
                <p class="copyright" style="color: black; font-size: 16px;"><b>Road Development Authority - Accident Management Department &copy 2020</b></p>
            </div>
        </footer>
    </div>



    <script>

      // Implementing Google Map and Custom Markers
      function myMap() {
        // Assigning the default map propertices during page load
        var policeGMapProperties= {
          center:new google.maps.LatLng(7.671935, 80.675026),
          zoom:8,
        };

        // Creating the map according to the map properties.
        var policeGMap = new google.maps.Map(document.getElementById("policeGMap"),policeGMapProperties);


        // Displaying the markers on the map
        // Retrieving the latitude and longitude on the reports from the database
        <?php
          // Important Accident Reports
          // Retrieves all the data if the Severity is 3 and Status is pending or help sent or important.
          $policeGMapIARSQL = "SELECT * FROM report WHERE Severity = 3 AND (Status = 'Pending' OR Status ='Help Sent' OR Status = 'Important');";

          $policeGMapIARResult = mysqli_query($conn, $policeGMapIARSQL);

          while($policeGMapIARRow = mysqli_fetch_array($policeGMapIARResult)){ ?>

            var markerContentStringIAR = '<p style="font-size: 20px;"> </b>IMPORTANT Report</b> </p>' +
                                         '<div>' +
                                         '<p> Report ID: <b><?php echo $policeGMapIARRow["ID"]; ?></b> </p>' +
                                         '<p> Description: <b><?php echo $policeGMapIARRow["Description"]; ?></b> </p>' +
                                         '<p> Severity: <b><?php echo $policeGMapIARRow["Severity"] ?></b> </p>' +
                                         '<p> Status: <b><?php echo $policeGMapIARRow["Status"];?></b> </p>' +
                                         '<p> Report Date Time: <b><?php echo $policeGMapIARRow["Date_Time"] ?> </p>' +
                                         '<div style="position=absolute; left: 10px; top: 10px;"><img src="#" width=20 height=20 alt="Accident Image"></div>' +
                                         '</div>';

            var markerInfoWindowIAR = new google.maps.InfoWindow({
              content: markerContentStringIAR
            });

            var gMapsMarkerIAR = new google.maps.Marker({position: { lat: <?php echo $policeGMapIARRow["Latitude"] ?>, lng: <?php echo $policeGMapIARRow["Longitude"] ?> },
                                                     animation: google.maps.Animation.BOUNCE, icon: 'assets/img/GoogleMapMarkers/importantReports.png', title: 'Important Report' });
            gMapsMarkerIAR.setMap(policeGMap);

            gMapsMarkerIAR.addListener('click', function() {
              markerInfoWindowIAR.open(policeGMap, gMapsMarkerIAR);
            });
      <?php }


      // Pending Accidents Reports
      $policeGMapPARSQL = "SELECT * FROM report WHERE Status = 'Pending';";

      $policeGMapPARResult = mysqli_query($conn, $policeGMapPARSQL);

      while($policeGMapPARRow = mysqli_fetch_array($policeGMapPARResult)){ ?>

      var markerContentStringPAR = '<p style="font-size: 20px;"> </b>Pending Report</b> </p>' +
                                   '<div>' +
                                   '<p> Report ID: <b><?php echo $policeGMapPARRow["ID"]; ?></b> </p>' +
                                   '<p> Description: <b><?php echo $policeGMapPARRow["Description"]; ?></b> </p>' +
                                   '<p> Severity: <b><?php echo $policeGMapPARRow["Severity"] ?></b> </p>' +
                                   '<p> Status: <b><?php echo $policeGMapPARRow["Status"];?></b> </p>' +
                                   '<p> Report Date Time: <b><?php echo $policeGMapPARRow["Date_Time"] ?> </p>' +
                                   '<div style="position=absolute; left: 10px; top: 10px;"><img src="#" width=20 height=20 alt="Accident Image"></div>' +
                                   '</div>'


        var markerInfoWindowPAR = new google.maps.InfoWindow({
          content: markerContentStringPAR
        });

        var pendingReportsIcon = {url: "assets/img/GoogleMapMarkers/pendingReports.png",
                    scaledSize: new google.maps.Size(32, 48) // Resizing the customer marker
                    };

          var gMapsMarkerPAR = new google.maps.Marker({position: { lat: <?php echo $policeGMapPARRow["Latitude"] ?>, lng: <?php echo $policeGMapPARRow["Longitude"] ?> },
                                                   animation: google.maps.Animation.DROP, icon: pendingReportsIcon, title: 'Pending Report' });
          gMapsMarkerPAR.setMap(policeGMap);

          gMapsMarkerPAR.addListener('click', function() {
            markerInfoWindowPAR.open(policeGMap, gMapsMarkerPAR);
          });
      <?php }


      // Approved Accident Reports
      $policeGMapAARSQL = "SELECT * FROM report WHERE Status = 'Approved';";

      $policeGMapAARResult = mysqli_query($conn, $policeGMapAARSQL);

      while($policeGMapAARRow = mysqli_fetch_array($policeGMapAARResult)){ ?>

          var markerContentStringAAR = '<p style="font-size: 20px;"> </b>Approved Report</b> </p>' +
                                       '<div>' +
                                       '<p> Report ID: <b><?php echo $policeGMapAARRow["ID"]; ?></b> </p>' +
                                       '<p> Description: <b><?php echo $policeGMapAARRow["Description"]; ?></b> </p>' +
                                       '<p> Severity: <b><?php echo $policeGMapAARRow["Severity"] ?></b> </p>' +
                                       '<p> Status: <b><?php echo $policeGMapAARRow["Status"];?></b> </p>' +
                                       '<p> Report Date Time: <b><?php echo $policeGMapAARRow["Date_Time"] ?> </p>' +
                                       '<div style="position=absolute; left: 10px; top: 10px;"><img src="#" width=20 height=20 alt="Accident Image"></div>' +
                                       '</div>'

          var markerInfoWindowAAR = new google.maps.InfoWindow({
            content: markerContentStringAAR
          });

          var gMapsMarkerAAR = new google.maps.Marker({position: { lat: <?php echo $policeGMapAARRow["Latitude"] ?>, lng: <?php echo $policeGMapAARRow["Longitude"] ?> },
                                                   animation: google.maps.Animation.DROP, icon: 'assets/img/GoogleMapMarkers/approvedReports.png', title: 'Approved Report' });
          gMapsMarkerAAR.setMap(policeGMap);

          gMapsMarkerAAR.addListener('click', function() {
            markerInfoWindowAAR.open(policeGMap, gMapsMarkerAAR);
          });
      <?php }


      // Completes Accident Reports
      $policeGMapCARSQL = "SELECT * FROM report WHERE Status = 'Completed';";

      $policeGMapCARResult = mysqli_query($conn, $policeGMapCARSQL);

      while($policeGMapCARRow = mysqli_fetch_array($policeGMapCARResult)){ ?>
          var markerContentStringCAR = '<p style="font-size: 20px;"> </b>Completed Report</b> </p>' +
                                       '<div>' +
                                       '<p> Report ID: <b><?php echo $policeGMapCARRow["ID"]; ?></b> </p>' +
                                       '<p> Description: <b><?php echo $policeGMapCARRow["Description"]; ?></b> </p>' +
                                       '<p> Severity: <b><?php echo $policeGMapCARRow["Severity"] ?></b> </p>' +
                                       '<p> Status: <b><?php echo $policeGMapCARRow["Status"];?></b> </p>' +
                                       '<p> Report Date Time: <b><?php echo $policeGMapCARRow["Date_Time"] ?> </p>' +
                                       '<div style="position=absolute; left: 10px; top: 10px;"><img src="#" width=20 height=20 alt="Accident Image"></div>' +
                                       '</div>'

          var markerInfoWindowCAR = new google.maps.InfoWindow({
            content: markerContentStringCAR
          });

          var gMapsMarkerCAR = new google.maps.Marker({position: { lat: <?php echo $policeGMapCARRow["Latitude"] ?>, lng: <?php echo $policeGMapCARRow["Longitude"] ?> },
                                                   animation: google.maps.Animation.DROP, icon: 'assets/img/GoogleMapMarkers/completedReport.png', title: 'Completed Report' });
          gMapsMarkerCAR.setMap(policeGMap);

          gMapsMarkerCAR.addListener('click', function() {
            markerInfoWindowCAR.open(policeGMap, gMapsMarkerCAR);
          });
      <?php }


      // Help Sent Accident Reports
      $policeGMapHSARSQL = "SELECT * FROM report WHERE Status = 'Help Sent';";

      $policeGMapHSARResult = mysqli_query($conn, $policeGMapHSARSQL);

      while($policeGMapHSARRow = mysqli_fetch_array($policeGMapHSARResult)){ ?>
          var markerContentStringSAR = '<p style="font-size: 20px;"> </b>Completed Report</b> </p>' +
                                       '<div>' +
                                       '<p> Report ID: <b><?php echo $policeGMapHSARRow["ID"]; ?></b> </p>' +
                                       '<p> Description: <b><?php echo $policeGMapHSARRow["Description"]; ?></b> </p>' +
                                       '<p> Severity: <b><?php echo $policeGMapHSARRow["Severity"] ?></b> </p>' +
                                       '<p> Status: <b><?php echo $policeGMapHSARRow["Status"];?></b> </p>' +
                                       '<p> Report Date Time: <b><?php echo $policeGMapHSARRow["Date_Time"] ?> </p>' +
                                       '<div style="position=absolute; left: 10px; top: 10px;"><img src="#" width=20 height=20 alt="Accident Image"></div>' +
                                       '</div>'

          var markerInfoWindowSAR = new google.maps.InfoWindow({
            content: markerContentStringSAR
          });

          var gMapsMarkerHSAR = new google.maps.Marker({position: { lat: <?php echo $policeGMapHSARRow["Latitude"] ?>, lng: <?php echo $policeGMapHSARRow["Longitude"] ?> },
                                                   animation: google.maps.Animation.DROP, icon: 'assets/img/GoogleMapMarkers/helpSentReport.png', title: 'Help Sent Report' });
          gMapsMarkerHSAR.setMap(policeGMap);

          gMapsMarkerSAR.addListener('click', function() {
            markerInfoWindowSAR.open(policeGMap, gMapsMarkerSAR);
          });
      <?php }


      // Disapproved Accident Reports
      $policeGMapDARSQL = "SELECT * FROM report WHERE Status = 'Disapproved';";

      $policeGMapDARResult = mysqli_query($conn, $policeGMapDARSQL);

      while($policeGMapDARRow = mysqli_fetch_array($policeGMapDARResult)){ ?>
          var markerContentStringDAR = '<p style="font-size: 20px;"> </b>Completed Report</b> </p>' +
                                       '<div>' +
                                       '<p> Report ID: <b><?php echo $policeGMapDARRow["ID"]; ?></b> </p>' +
                                       '<p> Description: <b><?php echo $policeGMapDARRow["Description"]; ?></b> </p>' +
                                       '<p> Severity: <b><?php echo $policeGMapDARRow["Severity"] ?></b> </p>' +
                                       '<p> Status: <b><?php echo $policeGMapDARRow["Status"];?></b> </p>' +
                                       '<p> Report Date Time: <b><?php echo $policeGMapDARRow["Date_Time"] ?> </p>' +
                                       '<div style="position=absolute; left: 10px; top: 10px;"><img src="#" width=20 height=20 alt="Accident Image"></div>' +
                                       '</div>'

          var markerInfoWindowDAR = new google.maps.InfoWindow({
            content: markerContentStringDAR
          });

          var gMapsMarkerDAR = new google.maps.Marker({position: { lat: <?php echo $policeGMapDARRow["Latitude"] ?>, lng: <?php echo $policeGMapDARRow["Longitude"] ?> },
                                                   animation: google.maps.Animation.DROP, icon: 'assets/img/GoogleMapMarkers/disapprovedReports.png', title: 'Disapproved Report' });
          gMapsMarkerDAR.setMap(policeGMap);

          gMapsMarkerDAR.addListener('click', function() {
            markerInfoWindowDAR.open(policeGMap, gMapsMarkerDAR);
          });
      <?php } ?>

      /*
      // Implementing the heat map on the google map
      var heatLevelData = "";
      var heatMapData = [];

      <?php
        //$heatLevelSQL = "SELECT * FROM report";

        //$heatLevelResult = mysqli_query($conn, $heatLevelSQL);


        //while($heatLevelRow = mysqli_fetch_array($heatLevelResult)){ ?>
          heatMapData = new google.maps.LatLng(<?php //echo $heatLevelRow["Latitude"]; ?>, <?php// echo $heatLevelRow["Longtitude"]; ?>);

          $heatLevelData = ["new google.maps.LatLnf(<?php// echo $heatLevelRow["Latitude"]; ?>, <?php// echo $heatLevelRow["Longtitude"]; ?>)];

        <?php// } ?>

        var heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatmapData
        });

        heatmap.setMap(policeGMap); */

      }
    </script>




    <!-- Google Map Key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&callback=myMap"></script>

    <!-- Retrieving the visualization libraries -->
  <!--  <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&libraries=visualization">
    </script> -->


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>

</body>
</html>
