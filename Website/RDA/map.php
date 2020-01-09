
<?php

require("config.php");

$markers=array();

$query =  $conn->query("SELECT Type,Longitude,Latitude,Description FROM report");

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
    <title>RDA Features</title>
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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script src="jquery-2.1.4.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        #dvMap{
            height: 500px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div>
        <div class="header-blue" style="max-height: 100px;">
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
        <div id="dvMap"></div>
    </div>
</body>
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
    <div class="card"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</div>

</html>
