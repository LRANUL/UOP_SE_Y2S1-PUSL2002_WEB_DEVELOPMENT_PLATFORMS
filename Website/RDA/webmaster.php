<?php

require_once "config.php";
session_start();
$now = time();
if (!isset($_SESSION["email"]) && $now > $_SESSION['expire']) {
    echo '<script>alert("Your session has expired, login again.")</script>';
    header("location: access");
}
$users="SELECT nic,name,email,type FROM users";
$Uresult= mysqli_query($conn,$users);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $options = array("cost" => 4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $sql = "insert into users (email, password,type) value('" . $email . "', '" . $hashPassword . "', '" . $type . "')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("' . $type . '"+" Registration Done")</script>' . mysqli_error($conn);


    } else {
        echo '<script>alert("Registration Failed, Try Again later")</script>'
            . mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $options = array("cost" => 4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $sql = "Update users set Password = .$hashPassword.  where email = .$email. ";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Credentials Updated")</script>' . mysqli_error($conn);


    } else {
        echo '<script>alert("Update Failed")</script>'
            . mysqli_error($conn);
    }
}
if (isset($_POST['delete'])) {
    $nic = $_POST['nic'];
    $sql = "delete from users where nic = .$nic. ";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("User Removed")</script>' . mysqli_error($conn);


    } else {
        echo '<script>alert("Update Failed")</script>'
            . mysqli_error($conn);
    }
}
//sample values for the graph
$dataPoints = array(
    array("label" => "Insurance", "y" => 30.7),
    array("label" => "Police", "y" => 20.6),
    array("label" => "Customer Care", "y" => 23.9),
    array("label" => "User", "y" => 24.8)
);

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
    <meta name="description"
          content="Road Development Authority, Accident Management Department is Sri Lankan's Largest Accident Management and Reporting Community ! ">
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

    <script>
        window.onload = function () {


            var chart = new CanvasJS.Chart("piechart", {
                theme: "dark2",
                animationEnabled: true,
                title: {
                    text: "The Usage of the website"
                },
                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bold",
                    showInLegend: true,
                    legendText: "{label}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
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
    <div class="header-dark"
         style="background-image: url(&quot;assets/img/black.jpg&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
            <div class="container"><a class="navbar-brand" href="#">Accident Management Department</a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
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
                        <h5 class="text-center card-title">Registered Users</h5><small
                            class="form-text text-uppercase text-center text-white">150 users</small></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-white bg-danger" data-bs-hover-animate="pulse">
                        <h5 class="text-center text-white card-title">Accidents</h5><small
                            class="form-text text-uppercase text-center text-white">300 ACCIDENTS</small></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-success" data-bs-hover-animate="pulse">
                        <h5 class="text-center text-white card-title">Managed</h5><small
                            class="form-text text-center text-white">10 MANAGED ACCIDENTS</small></div>
                </div>
            </div>
            <div class="col-md-3" data-bs-hover-animate="pulse">
                <div class="card text-white bg-warning">
                    <div class="card-body bg-warning">
                        <h5 class="text-center card-title">Ongoing</h5><small class="form-text text-center text-white">50
                            ATTENDING ACCIDENTS</small></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="highlight-blue" style="background-color: #585858;">
    <div class="container-fluid">
        <div class="intro">
            <h2 class="text-uppercase text-center">RDA ADMINSTRATION<img src="assets/img/sri-lanka-map.jpg"
                                                                         loading="eager" width="80px"></h2>
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
                                class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navcol-1"><span
                                class="navbar-text actions"> </span><span class="navbar-text actions"> <button
                                    class="btn btn-dark" data-toggle="modal" data-target="#CreateAcc" type="button"
                                    style="border-radius: 20px;">Create Account</button><a
                                    class="btn btn-primary bg-success action-button" role="button" href="#"
                                    style="margin: 10px;">Manage Accident Reports</a><a
                                    class="btn btn-primary bg-dark action-button" data-toggle="modal" data-target="#RegisterModal" type="button"
                                    style="margin: 10px;">Account Manager</a><a
                                    class="btn btn-primary bg-dark action-button" role="button" href="#"
                                    style="margin: 10px;">Complaint</a><a
                                    class="btn btn-primary bg-dark action-button" role="button" href="#"
                                    style="margin: 10px;">Feedback</a></span>
                            <div><a class="btn btn-primary" data-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapse-1" href="#collapse-1" role="button"
                                    style="border-radius: 20px;margin: 10px;">Map</a>
                                <div class="collapse show" id="collapse-1"></div>
                            </div>
                        </div>
                        <div class="modal fade" role="dialog" tabindex="-1" id="CreateAcc">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">RDA Administration</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                              style="height: 620px;">
                                            <h2 class="text-center"><strong>Create</strong> employee account.</h2>
                                            <div class="form">
                                                <input class="form-control" type="email" name="email"
                                                       placeholder="Email" style="margin-bottom: 15px;"
                                                       maxlength="50">
                                                <input class="form-control" type="password" name="password"
                                                       placeholder="Password" style="margin-bottom: 15px;"
                                                       maxlength="30">
                                                <select name="type">
                                                    <option value="RDA_Agent">RDA Staff
                                                    </option>
                                                    <option value="Police_Agent">Police Staff</option>
                                                    <option value="Insurance_Agent">Insurance Staff</option>
                                                </select>
                                                <div class="form-group">
                                                    <button class="btn btn-info btn-block"
                                                            data-bs-hover-animate="pulse" type="submit"
                                                            name="submit" style="margin-top: 15px;">Register
                                                    </button>
                                                </div>
                                                <img src="assets/img/RDAAMS_logo.png" style="width:300px ">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <div class="modal" id="RegisterModal" role="dialog">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Registered users</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                                          style="height: 620px;">
                                                        <h2 class="text-center"><strong>Manage</strong> employee account.</h2>
                                                        <div class="form">
                                                            <input class="form-control" type="email" name="email"
                                                                   placeholder="Email" style="margin-bottom: 15px;"
                                                                   maxlength="50">
                                                            <input class="form-control" type="password" name="password"
                                                                   placeholder="Password" style="margin-bottom: 15px;"
                                                                   maxlength="30">

                                                            <div class="form-group">
                                                                <button class="btn btn-info btn-block"
                                                                        data-bs-hover-animate="pulse" type="submit"
                                                                        name="update" style="margin-top: 15px;">Update Password
                                                                </button>
                                                            </div>
                                                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                                                  style="height: 620px;">
                                                            <div class="form">
                                                                <input class="form-control" type="tel" name="nic"
                                                                       placeholder="NIC" style="margin-bottom: 15px;"
                                                                       maxlength="50">
                                                                <div class="form-group">
                                                                    <button class="btn btn-danger btn-block"
                                                                            data-bs-hover-animate="pulse" type="submit"
                                                                            name="delete" style="margin-top: 15px;">Delete
                                                                    </button>
                                                                </div>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">NIC</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Type</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <?php while ($record = mysqli_fetch_assoc($Uresult)) {?>
                                                            <td><?php echo $record['nic']; ?></td>
                                                            <td><?php echo $record['name']; ?></td>
                                                            <td><?php echo $record['email']; ?></td>
                                                            <td><?php echo $record['type']; ?></td>
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
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="text-white bg-dark map-clean">
    <div class="container">
        <div id="collapse-1" class="collapse">
            <h2 class="text-center">Locations</h2>
            <div id="dvMap"></div>
        </div>
    </div>
</div>
<div>
    <div id="piechart" style="height: 350px; width: 100%;"></div>
</div>

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
</div>
<div class="bg-dark highlight-blue"></div>
<div class="footer-dark">
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
<script src="assets/js/jquery.canvasjs.min.js"></script>
</body>

</html>
