<?php

require_once "config.php";
session_start();
if (!isset($_SESSION["email"])) {
    header("location: login");
}

$markers=array();

$query =  $conn->query("SELECT Type,Longitude,Latitude,Description FROM report");

while( $row = $query->fetch_assoc() ){
    $type = $row['Type'];
    $desc = $row['Description'];
    $longitude = $row['Longitude'];
    $latitude = $row['Latitude'];

    $markers[]=array( 'type'=>$type, 'lat'=>$latitude, 'lng'=>$longitude,'desc'=>$desc);
}
$sql1="SELECT * FROM Support";
$support=mysqli_query($conn, $sql1);
$sql2="SELECT * FROM feedback";
$feedback=mysqli_query($conn, $sql2);
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
            "<p><?php echo $markers[$i]['type'];?> Accident </p><p><?php echo $markers[$i]['desc'];?>",
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
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <style>
        #dvMap{
            height: 500px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div></div>
    <div class="card"></div>
    <div>
        <div class="header-dark" style="background-image: url(&quot;assets/img/black.jpg&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">Accident Management Department</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                            class="collapse navbar-collapse" id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form>
                        <span class="text-primary navbar-text"> <button class="btn btn-light text-white action-button" type="button"><a href="logout.php">Log Out</a></button></span></div>
               </div>
        </nav>
        <!--Comment-->
    </div>
    </div>
    <div class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-white bg-primary" data-bs-hover-animate="pulse">
                            <h5 class="text-center card-title">Registered Users</h5><small class="form-text text-uppercase text-center text-white">150 users</small></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-white bg-danger" data-bs-hover-animate="pulse">
                            <h5 class="text-center text-white card-title">Accidents</h5><small class="form-text text-uppercase text-center text-white">300 ACCIDENTS</small></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body bg-success" data-bs-hover-animate="pulse">
                            <h5 class="text-center text-white card-title">Managed</h5><small class="form-text text-center text-white">10 MANAGED ACCIDENTS</small></div>
                    </div>
                </div>
                <div class="col-md-3" data-bs-hover-animate="pulse">
                    <div class="card text-white bg-warning">
                        <div class="card-body bg-warning">
                            <h5 class="text-center card-title">Ongoing</h5><small class="form-text text-center text-white">50 ATTENDING ACCIDENTS</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="highlight-blue" style="background-color: #585858;background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;">
        <div class="container-fluid">
            <div class="intro">
                <h2 class="text-uppercase text-center">RDA Customer care<img src="assets/img/sri-lanka_map.png" loading="eager" width="80px"></h2>
            </div>
        </div>
    </div>
    <div class="bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-auto col-md-12 text-center align-self-center m-auto">
                    <nav class="navbar navbar-light navbar-expand-xl bg-secondary navigation-clean-button">
                        <div class="container">
                            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                                        class="sr-only">Toggle navigation</span><span
                                        class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-1"><span
                                        class="navbar-text actions"> </span><span class="navbar-text actions"> <a
                                            class="btn btn-primary bg-success action-button" role="button" href="#"
                                            style="margin: 10px;">Manage Accident Reports</a><a
                                            class="btn btn-primary bg-dark action-button" role="button" href="#"
                                            style="margin: 10px;">Account Manager</a><a
                                            class="btn btn-primary bg-dark action-button" data-toggle="modal" data-target="#support"  type="button"
                                            style="margin: 10px;">Complaint Manager</a><a
                                            class="btn btn-primary bg-dark action-button" data-toggle="modal" data-target="#feedback"  type="button"
                                            style="margin: 10px;">Feedback Manager</a></span>
                                <div><a class="btn btn-primary" data-toggle="collapse" aria-expanded="true"
                                        aria-controls="collapse-1" href="#collapse-1" role="button"
                                        style="border-radius: 20px;margin: 10px;">Map</a>
                                    <div class="collapse show" id="collapse-1"></div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="support" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Customer Support / Complaints</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                          style="height: 620px;">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NIC</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php while ($record = mysqli_fetch_assoc($support)) {?>
                                            <td><?php echo $record['ID']; ?></td>
                                            <td><?php echo $record['NIC']; ?></td>
                                            <td><?php echo $record['Subject']; ?></td>
                                            <td><?php echo $record['Description']; ?></td>
                                            <td><?php echo $record['Status']; ?></td>
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
            </div>
    <div class="modal" id="feedback" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Visitor Feedback / Complaint</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                          style="height: 620px;">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php while ($record = mysqli_fetch_assoc($feedback)) {?>
                                <td><?php echo $record['ID']; ?></td>
                                <td><?php echo $record['Name']; ?></td>
                                <td><?php echo $record['Email']; ?></td>
                                <td><?php echo $record['Subject']; ?></td>
                                <td><?php echo $record['Description']; ?></td>
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
    </div>
    <div class="text-white bg-dark map-clean">
        <div class="container">
            <div id="collapse-1" class="collapse">
                <div id="dvMap"></div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"></div>
            </div>
        </div>
    </div>
    <div class="bg-dark highlight-blue" style="background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;"></div>
    <div class="footer-dark" style="background: linear-gradient(135deg, #172a74, #21a9af);background-color: #184e8e;padding-bottom: 80px;font-family: 'Source Sans Pro', sans-serif;">
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
