<?php

include_Once('config.php');
session_start();
if (!isset($_SESSION["email"])) {
    header("location: login");
}

 $users="SELECT * FROM driver";
 $Uresult= mysqli_query($conn,$users);

 $map="SELECT Longitude, Latitude from report";
 $MAresult=mysqli_query($conn,$map);

 $report="SELECT * FROM vreport where Status IS NULL";
 $Rresult=mysqli_query($conn, $report);

 $Managed="SELECT * FROM vreport where Status = 'Accept'";
 $Mresult=mysqli_query($conn,$Managed);


$ongoing="SELECT * FROM report where Status = 'Pending' OR Status='Help Sent'";
$Oresult=mysqli_query($conn, $ongoing);

$graph="SELECT Type, count(*) as number from report Group by Type";
$gresult=mysqli_query($conn,$graph);


if (isset($_POST['Accept'])) {
    $id = $_POST['id'];
    $insert = "Update vreport set Status = 'Accept' Where ID=$id";
    $result = mysqli_query($conn, $insert);
}

if (isset($_POST['Decline'])) {
    $id = $_POST['id'];
    $delete = "Update vreport set Status = 'Decline' Where ID=$id";
    $result = mysqli_query($conn, $delete);
}

$markers=array();

$query =  $conn->query("SELECT Type,Longitude,Latitude,Description FROM vreport");

while( $row = $query->fetch_assoc() ){
    $type = $row['Type'];
    $desc = $row['Description'];
    $longitude = $row['Longitude'];
    $latitude = $row['Latitude'];

    $markers[]=array( 'type'=>$type, 'lat'=>$latitude, 'lng'=>$longitude,'desc'=>$desc);
}

?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw"></script>
<script type="text/javascript">
    var map;
    var Markers = {};
    var infowindow;
    var locations = [
        <?php for($i=0;$i<sizeof($markers);$i++){ $j=$i+1;?>
        [
            'RDA AA',
            "'<h6><?php echo $markers[$i]['type'];?><p>Accident</p>",
        <?php echo $markers[$i]['lat'];?>,
            <?php echo $markers[$i]['lng'];?>,
        ]<?php if($j!=sizeof($markers))echo ","; }?>
    ];
    var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);
    function initialize() {
        var mapOptions = {
            zoom: 9,
            center: origin
        };
        map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
        infowindow = new google.maps.InfoWindow();
        for(i=0; i<locations.length; i++) {
            var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][1]);
                    infowindow.setOptions({maxWidth: 200});
                    infowindow.open(map, marker);
                }
            }) (marker, i));
            Markers[locations[i][4]] = marker;
        }
        locate(0);
    }
    function locate(marker_id) {
        var myMarker = Markers[marker_id];
        var markerPosition = myMarker.getPosition();
        map.setCenter(markerPosition);
        google.maps.event.trigger(myMarker, 'click');
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!DOCTYPE html>
<html>

<head>
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
    <link rel="stylesheet" href="staff/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="staff/assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
  
    <script>
      //this for the creation of the charts
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Number'],
          <?php
          while ($row=mysqli_fetch_array($gresult))
          {
            echo "['".$row["Type"]."',".$row["number"]."],";
          }

          ?>        
        ]);

        var options = {
          title: 'Percentage Of All The Types Vehicles In An Accident ',
          is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</head>

<body>


    <div></div>
    <div class="card"></div>
    <div>
        <div class="header-blue" style="background-color: rgb(190,255,193);background-size: contain;background-image: url(&quot;X&quot;);">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand" href="index.html"><img class="wobble animated" src="assets/img/RDAAMS_logo.png" style="background-size: contain;width: 90px;" loading="eager"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white"></span></button>
                    <div
                            class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav"></ul>
                        <h5 style="color: rgb(255,255,255);"><strong>Road Development Authority</strong></h5>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form>
                         <span class="text-primary navbar-text"> <button class="btn btn-light text-white action-button" type="button"><a href="Private messaging system/index.php">Message</a></button></span>
                        <span class="text-primary navbar-text"> <button class="btn btn-light text-white action-button" type="button"><a href="logout.php">Log Out</a></button></span></div>
                </div>
            </nav>
    </div>
    </div>
    <div style="background-color: rgb(190,255,193);">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <button type="button" class="btn btn-info btn-lg bg-secondary" data-toggle="modal" data-target="#RegisterModal">
                          <div class="card-body text-white bg-secondary" data-bs-hover-animate="pulse">
                            <h5 class="text-center card-title">Registered Users</h5>
                          </div>
                     </div>
                      <div class="modal" id="RegisterModal" role="dialog">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">Registered users</h4>
                           </div>
                               <div class="modal-body">
                                <table class="table table-striped">
                                  <thead>
                                     <tr>
                                       <th scope="col">NIC</th>
                                       <th scope="col">First Name</th>
                                       <th scope="col">Last Name</th>
                                       <th scope="col"> Date of Birth</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Contact Number</th>
                                       <th scope="col"> Insurance number</th>
                                       <th scope="col"> License Number</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                   <tr>
                                    <?php while ($record = mysqli_fetch_assoc($Uresult)) {?>
                                      <td><?php echo $record['NIC']; ?></td>
                                      <td><?php echo $record['name']; ?></td>
                                      <td><?php echo $record['LastName']; ?></td>
                                      <td><?php echo $record['DateOfBirth']; ?></td>
                                      <td><?php echo $record['Email']; ?></td>
                                      <td><?php echo $record['ContactNo']; ?></td>
                                      <td><?php echo $record['InsuranceNo']; ?></td>
                                      <td><?php echo $record['LicenseNo']; ?></td>
                                  </tr>
                                   <?php } ?>
                                   </tbody>
                                </table>
                               </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                       <button type="button" class="btn btn-info btn-lg bg-danger" data-toggle="modal" data-target="#Accidents">
                          <div class="card-body text-white bg-danger" data-bs-hover-animate="pulse">
                            <h5 class="text-center card-title">Accidents Report</h5>
                          </div>
                     </div>
                      <div class="modal fade" id="Accidents" role="dialog">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">Accidents</h4>
                           </div>
                               <div class="modal-body">
                                 <table class="table table-striped">
                                  <thead>
                                     <tr>
                                      <th scope="col">ID</th>
                                       <th scope="col">Severity</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Description</th>
                                       <th scope="col">Date_Time</th>
                                       <th scope="col">Longitude</th>
                                       <th scope="col">Latitude</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                <tr>
                                    <?php while ($record = mysqli_fetch_assoc($Rresult)) {?>
                                      <td><?php echo $record['ID']; ?></td>
                                      <td><?php echo $record['Severity']; ?></td>
                                      <td><?php echo $record['Type']; ?></td>
                                      <td><?php echo $record['Description']; ?></td>
                                      <td><?php echo $record['Date_Time']; ?></td>
                                      <td><?php echo $record['Longitude']; ?></td>
                                      <td><?php echo $record['Latitude']; ?></td>
                                      <td>
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <input class="form-control" type="tel" name="id" placeholder="Confirm ID" maxlength="10">
                                            <input type="submit" value="Accept" name="Accept" />
                                            <input type="submit" value="Decline" name="Decline" />
                                      </form>
                                      </td>
                                  </tr>
                                   <?php } ?>
                                   </tbody>
                                </table>
                               </div>
                               
                             <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                       <button type="button" class="btn btn-info btn-lg bg-success" data-toggle="modal" data-target="#manageModal">
                          <div class="card-body text-white bg-success" data-bs-hover-animate="pulse">
                            <h5 class="text-center card-title"> Managed Accidents</h5>
                          </div>
                     </div>
                      <div class="modal fade" id="manageModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">Managed Accidents</h4>
                           </div>
                               <div class="modal-body">
                                <table class="table table-striped">
                                  <thead>
                                     <tr>
                                      <th scope="col">ID</th>
                                       <th scope="col">Severity</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Description</th>
                                       <th scope="col">Date_Time</th>
                                       <th scope="col">Longitude</th>
                                       <th scope="col">Latitude</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                <tr>
                                    <?php while ($record = mysqli_fetch_assoc($Mresult)) {?>
                                      <td><?php echo $record['ID']; ?></td>
                                      <td><?php echo $record['Severity']; ?></td>
                                      <td><?php echo $record['Type']; ?></td>
                                      <td><?php echo $record['Description']; ?></td>
                                      <td><?php echo $record['Date_Time']; ?></td>
                                      <td><?php echo $record['Longitude']; ?></td>
                                      <td><?php echo $record['Latitude']; ?></td>
                                </tr>
                                   <?php } ?>
                                   </tbody>
                                </table>
                               </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                     <button type="button" class="btn btn-info btn-lg bg-warning" data-toggle="modal" data-target="#ongoingModal">
                          <div class="card-body text-white bg-warning" data-bs-hover-animate="pulse">
                            <h4 class="text-center card-title">Ongoing</h4>
                          </div>
                     </div>
                      <div class="modal fade" id="ongoingModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">Ongoing</h4>
                           </div>
                               <div class="modal-body">
                                <table class="table table-striped">
                                  <thead>
                                     <tr>
                                      <th scope="col">ID</th>
                                       <th scope="col">NID</th>
                                       <th scope="col">Severity</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Description</th>
                                       <th scope="col">Date_Time</th>
                                       <th scope="col">Longitude</th>
                                       <th scope="col">Latitude</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                    <tr>
                                    <?php while ($record = mysqli_fetch_assoc($Oresult)) {?>
                                      <td><?php echo $record['ID']; ?></td>
                                      <td><?php echo $record['NIC']; ?></td>
                                      <td><?php echo $record['Severity']; ?></td>
                                      <td><?php echo $record['Type']; ?></td>
                                      <td><?php echo $record['Description']; ?></td>
                                      <td><?php echo $record['Date_Time']; ?></td>
                                      <td><?php echo $record['Longitude']; ?></td>
                                      <td><?php echo $record['Latitude']; ?></td>
                                    </tr>
                                <?php  } ?>
                                   </tbody>
                                </table>
                               </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                        </button>
                    </div>
                </div>
            </div>
    <div class="highlight-blue" style="background-color: rgb(84,176,99);">
        <div class="container-fluid">
            <div class="intro">
                <h2  class="text-uppercase text-center">RDA AMD - INSURANCE PORTAL</h2>
            </div>
        </div>
    </div>
    <div style="background-color: rgb(190,255,193);">
        <div class="container">
            <div class="row">
                <div class="col-auto col-md-12 text-center align-self-center m-auto" style="background-color: rgb(206,255,214);">
                    <nav class="navbar navbar-light navbar-expand-xl navigation-clean-button" style="background-color: rgb(206,255,214);">
                </div>
                       
                   </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
   <div id="piechart" style=" width: 100%; height: 400px;"></div>
   </div> 
    <div class="  map-clean" style="background-color: rgb(190,255,193);">
        <div class="container">
            <div class="intro" style="background-color: rgb(84,176,99)";>
                <h2 class="text-center">Location of Accident</h2>
            </div>
            <div>
               <div id="dvMap" style="width:100%;height:450px;"></div>
            </div>
        </div>
    </div>
    </div>
  </div>
 
   <div class="highlight-blue" style="background-color: rgb(190,255,193);"></div>
    <div class="footer-dark" style="background-color: rgb(0,22,38);">
        <footer>
            <div class="container" style="text-align: center;">
                <p class="copyright">Road Development Authority - Accident Management Department © 2020<br></p>
            </div>
        </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>  
    <script src="assets/js/jquery.canvasjs.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</body>
</html>
