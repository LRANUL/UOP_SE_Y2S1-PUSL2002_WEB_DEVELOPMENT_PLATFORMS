<?php
/**
 * Code requests data from login page and customise the page for the users.
 *
 */
require_once "config.php";
session_start();
$now = time();
if (!isset($_SESSION["email"]) && $now > $_SESSION['expire']) {
    echo '<script>alert("Your session has expired, login again.")</script>';
    header("location: login");
}

else {
    $email = ($_SESSION["email"]);
    $sql = "select name,LicenseNo,ContactNo,NIC from driver where email = '" . $email . "'";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
                $nic = $row['NIC'];
                $phone = $row['ContactNo'];
                $license = $row['LicenseNo'];
                $name = $row['name'];

            }
        } else {
            echo '<script>alert("Somethings Wrong with your Account Contact Support")</script>';

        }
    }
}
if (isset($_POST['support'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "insert into support (NIC,subject,Description) value('" . $nic . "', '" . $subject . "','" . $message . "')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Message Sent")</script>';


    } else {
        echo '<script>alert("Message not sent, Try Again later")</script>'
            . mysqli_error($conn);
    }
}

if (isset($_POST['updpass'])) {
    $password = $_POST['password'];;
    $options = array("cost" => 4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);


    $sql = "Update Users set Password = '" . $hashPassword . "'where NIC = '" . $nic . "'";
    if (mysqli_query($conn, $sql)) {
        header("Location: login");

        echo '<script>alert("Password Changed, login using your new credentials")</script>';

    } else {
        echo '<script>alert("Error, Try Again later")</script>'
            . mysqli_error($conn);
    }
}
if (isset($_POST['updphone'])) {
    $password = $_POST['phone'];
    $sql = "Update driver set ContactNo  = '" . $phone . "' where NIC = '" . $nic . "'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Phone Number Changed")</script>';

    } else {
        echo '<script>alert("Error, Try Again later")</script>'
            . mysqli_error($conn);
    }
}
if (isset($_POST['updemail'])) {
    $password = $_POST['email'];
    $sql = "Update users set Email  = '" . $email . "' where NIC = '" . $nic . "'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Email Changed")</script>';

    } else {
        echo '<script>alert("Error, Try Again later")</script>'
            . mysqli_error($conn);
    }
}
if(isset($_POST['reportsend'])) {

    include_once 'config.php';

    $targetDir = "uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty(array_filter($_FILES['files']['name']))) {
        foreach ($_FILES['files']['name'] as $key => $val) {

            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {

                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                    $insertValuesSQL .= "('" . $fileName . "', NOW()),";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ', ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ', ';
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $desc = $_POST['desc'];
            $severity = $_POST['severity'];
            $type = $_POST['type'];
            $sql = "insert into report (NIC,Severity,Type,Description,Latitude,Longitude,Media) value('" . $nic . "', '" . $severity . "','" . $type . "','" . $desc . "','" . $lat . "','" . $lng . "','" . $insertValuesSQL . "')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_query($conn, $result)) {
                echo '<script>alert("Report Send !")</script>';

            } else {
                echo '<script>alert("Error, Try Again later")</script>'
                    . mysqli_error($conn);
            }
        }
    }
}
$report="SELECT ID,Severity, Type, Description, Date_Time, Longitude, Latitude FROM report where NIC = $nic";
$reports=mysqli_query($conn, $report);

if (isset($_POST['changereport'])) {
    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $severity = $_POST['severity'];
    $type = $_POST['type'];
    $sql = "Update report set Description = '" . $desc . "',Type = '" . $type . "', Severity = '" . $severity . "' where NIC = '" . $nic . "' AND ID = '" . $id . "'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Report Updated")</script>';

    } else {
        echo '<script>alert("Error, Try Again later")</script>'
            . mysqli_error($conn);
    }
}
?>

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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="jquery-2.1.4.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<script>

    var map, infoWindow;
    var glatitude,glongitude;
    function initMap() {
        map = new google.maps.Map(document.getElementById('dvMap'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 15,
            styles: [
                {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#263c3f'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#6b9a76'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#38414e'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#212a37'}]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9ca5b3'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#746855'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#1f2835'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#f3d19c'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{color: '#2f3948'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#17263c'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#515c6d'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#17263c'}]
                }
            ]
        });
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                glatitude = {lat: position.coords.latitude};
                glatitude={ lng: position.coords.longitude};

                var marker = new google.maps.Marker({
                    position: pos,
                    draggable: true,
                    animation: google.maps.Animation.BOUNCE,
                    map: map
                });
                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }


</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&callback=initMap">
</script>


</div>
<div>
    <div class="header-blue">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="index.html"><img class="wobble animated"
                                                                                        src="assets/img/RDAAMS_logo.png"
                                                                                        style="background-size: contain;width: 90px;"
                                                                                        loading="eager"></a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                            class="navbar-toggler-icon text-white"></span></button>
                <div
                        class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav"></ul>
                    <h5 style="color: rgb(255,255,255);"><strong>Road Development Authority</strong></h5>
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group"><label for="search-field"></label></div>
                    </form>
                    <span class="text-primary navbar-text"> <button class="btn btn-light text-white action-button"
                                                                    type="button"><a
                                    href="logout.php">Log Out</a></button></span></div>
            </div>
        </nav>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-top: 15px;">
                <div class="table-responsive d-inline">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="table-active">Report to us</th>
                            <th>Need help ?</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div><a class="btn btn-light border rounded border-dark" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="collapse-3" href="#collapse-3"
                                        role="button" style="width: 140px;">Report</a>
                                    <div class="collapse"
                                         id="collapse-3">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data>
                                            <h2 class="text-center"><strong>Report</strong> to us.</h2>
                                            <div class="form">
                                                <br>
                                                <h6 class="text-muted card-subtitle mb-2">NIC:&nbsp;<label
                                                            class="control-label"><?php echo $nic; ?></label></h6>
                                                <br>
                                                <p class="text-muted card-subtitle mb-2">Reporting from current marker Location 📡</p>
                                                <select name="severity">
                                                    <option value="1">Light Accident</option>
                                                    <option value="2">Moderate Accident</option>
                                                    <option value="3">Intense Accident</option>
                                                </select>
                                                <select name="type">
                                                    <option value="Car">Car</option>
                                                    <option value="Van">Van</option>
                                                    <option value="Bus">Bus</option>
                                                    <option value="Bike">Bike</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="Truck">Truck</option>
                                                </select>

                                                <div class="form-group"><textarea class="form-control" name="desc"
                                                                                  placeholder="Description"
                                                                                  rows="4"></textarea></div>
                                                <input type="file" name="files[]" multiple >
                                                <div class="form-group">
                                                    <button class="btn btn-info btn-block"
                                                            data-bs-hover-animate="pulse" type="submit"
                                                            name="reportsend" style="margin-top: 15px;">Send Report
                                                    </button>
                                                </div>
                                                <button class="btn btn-outline-dark btn-block btn-sm" data-toggle="modal"
                                                        data-target="#myreports" type="button">My Reports
                                                </button>

                                            </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div><a class="btn btn-success" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapse-2" href="#collapse-2" role="button"
                                        style="width: 140px;">Help</a>
                                    <div class="collapse" id="collapse-2"><small class="form-text text-muted">If you are
                                            in trouble let use know.

                                        </small>
                                        <button
                                                class="btn btn-outline-dark btn-block btn-sm" data-toggle="modal"
                                                data-target="#faq" type="button">FAQ
                                        </button>
                                        <button class="btn btn-primary btn-block btn-sm bg-warning border rounded-0 float-right"
                                                data-toggle="modal" data-target="#chat" type="button">Chat
                                        </button>
                                        <div class="modal fade" role="dialog"
                                             tabindex="-1" id="chat">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Chat with us</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Please wait while we connect you.</p>
                                                        <div>
                                                            <iframe src="https://links.collect.chat/5df9be91d66bd24b6228f67d"
                                                                    width="100%" height="500px"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="faq">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Frequently Asked Questions</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <h4 class="text-left">How to report incidents ?</h4>
                                                            <div class="form-group"><small class="form-text text-muted">Once
                                                                    you have logged in to your account, you will see
                                                                    <strong>Report </strong>button on the menu of the
                                                                    screen, click it and add the relevant details to it.
                                                                    Afterwards you may fetch your current location use
                                                                    the map next to pin point it.</small></div>
                                                            <div
                                                                    class="form-group">
                                                                <h4 class="text-left">How do I change my email
                                                                    address?</h4>
                                                            </div>
                                                            <div class="form-group"><small class="form-text text-muted">Under
                                                                    Manage Profile section you will see your current
                                                                    details, if you need to update them click the
                                                                    <strong>Update</strong>&nbsp;button below your
                                                                    details.</small></div>
                                                        </form>
                                                        <h4 class="text-left">My map doesn't load, I only see RDA
                                                            logo?</h4><small class="form-text text-muted">This may be
                                                            due to an update we are carrying out, in order to provide
                                                            you with a high quality experience we carry our updates
                                                            during midnight and usually takes about 30 minutes. If we do
                                                            have major upgrades we will notify about it to you. If the
                                                            problem persists try contacting us or use the chat
                                                            below.</small></div>
                                                    <div
                                                            class="modal-footer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive d-inline">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Manage Profile</th>
                            <th>Service issues ?</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr></tr>
                        <tr>
                            <td>
                                <div><a class="btn btn-primary" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapse-1" href="#collapse-1" role="button"
                                        style="width: 140px;">Profile</a>
                                    <div class="collapse" id="collapse-1">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-muted card-subtitle mb-2">Name:&nbsp;<label
                                                            class="control-label"><?php echo $name; ?></label></h6>
                                                <h6 class="text-muted card-subtitle mb-2">Email:&nbsp;<label
                                                            class="control-label"><?php echo $email; ?></label></h6>
                                                <h6 class="text-muted card-subtitle mb-2">NIC:&nbsp;<label
                                                            class="control-label"><?php echo $nic; ?></label></h6>
                                                <h6 class="text-muted card-subtitle mb-2">Mobile:&nbsp;<label
                                                            class="control-label"><?php echo $phone; ?></label></h6>
                                                <h6 class="text-muted card-subtitle mb-2">License No:&nbsp;<label
                                                            class="control-label"><?php echo $license; ?></label></h6>
                                                <button class="btn btn-dark text-right" data-toggle="modal"
                                                        data-target="#updProfile" type="button">Update
                                                </button>
                                                <div class="modal fade" role="dialog"
                                                     tabindex="-1" id="updProfile">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Profile</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">×</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Please update your details properly, to avoid getting
                                                                    locked out.</p>
                                                                <div class="card">
                                                                    <div class="card-body border rounded">
                                                                        <p>Please enter your new password to update your
                                                                            account.</p>
                                                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                                                              method="post">
                                                                            <div class="col"><label
                                                                                        class="col-form-label">New
                                                                                    Password:&nbsp;</label></div>
                                                                            <div class="col"><input type="text"
                                                                                                    name="password">
                                                                            </div>
                                                                            <button class="btn btn-info btn-block"
                                                                                    data-bs-hover-animate="pulse"
                                                                                    type="submit" name="updpass"
                                                                                    style="margin-top: 15px;">Update
                                                                            </button>
                                                                        </form>
                                                                        <div class="card-body">
                                                                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                                                                  method="post">
                                                                                <p>Update your phone number.</p>
                                                                                <div class="col"><label
                                                                                            class="col-form-label">Mobile:&nbsp;</label>
                                                                                </div>
                                                                                <div class="col"><input type="text"
                                                                                                        name="phone">
                                                                                </div>
                                                                                <button class="btn btn-info btn-block"
                                                                                        data-bs-hover-animate="pulse"
                                                                                        type="submit" name="updphone"
                                                                                        style="margin-top: 15px;">Update
                                                                                </button>
                                                                            </form>
                                                                            <div class="card-body border rounded">
                                                                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                                                                      method="post">
                                                                                    <p>Update your email address.</p>
                                                                                    <div class="col"><label
                                                                                                class="col-form-label">Email:&nbsp;</label>
                                                                                    </div>
                                                                                    <div class="col"><input type="text"
                                                                                                            name="email">
                                                                                        <button class="btn btn-info btn-block"
                                                                                                data-bs-hover-animate="pulse"
                                                                                                type="submit"
                                                                                                name="updemail"
                                                                                                style="margin-top: 15px;">
                                                                                            Update
                                                                                        </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-light" type="button"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button class="btn btn-primary"
                                                                                    type="button">Save
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </td>
                            <td>
                                <div><a class="btn btn-secondary" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapse-4" href="#collapse-4" role="button"
                                        style="width: 140px;">Complain</a>
                                    <div class="collapse" id="collapse-4">
                                        <div class="modal-body">
                                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                                <div class="form-group">
                                                    <h6 class="text-muted card-subtitle mb-2">NIC:&nbsp;<label
                                                                class="control-label"><?php echo $nic; ?></label></h6>
                                                    <select class="form-control" style="margin-top: 15px;"
                                                            name="subject">
                                                        <optgroup label="Select Subject">
                                                            <option value="Accident Neglected" selected="">Accident
                                                                Neglected
                                                            </option>
                                                            <option value="Police Not Arrived">Police Not Arrived
                                                            </option>
                                                            <option value="Pickup Not Arrived">Pickup Not Arrived
                                                            </option
                                                            >
                                                            <option value="Insurance Based">Insurance Based</option>
                                                        </optgroup>
                                                    </select></div>
                                                <class
                                                ="form-group"><textarea class="form-control" name="message"
                                                                        placeholder="Message" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="support">send</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                </div>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
    <div id="dvMap" style="width: 100%; height: 500px">
    </div>
    <div class="modal fade" role="dialog"
         tabindex="-1" id="myreports">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Your Reports</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
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
                                <?php while ($record = mysqli_fetch_assoc($reports)) {?>
                                <td><?php echo $record['ID']; ?></td>
                                <td><?php echo $record['Severity']; ?></td>
                                <td><?php echo $record['Type']; ?></td>
                                <td><?php echo $record['Description']; ?></td>
                                <td><?php echo $record['Date_Time']; ?></td>
                                <td><?php echo $record['Longitude']; ?></td>
                                <td><?php echo $record['Latitude']; ?></td>
                                <td>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <input class="form-control" type="tel" name="id" placeholder="Confirm Report ID" maxlength="10">
                                        <select name="severity">
                                            <option value="1">Light Accident</option>
                                            <option value="2">Moderate Accident</option>
                                            <option value="3">Intense Accident</option>
                                        </select>
                                        <select name="type">
                                            <option value="Car">Car</option>
                                            <option value="Van">Van</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Bike">Bike</option>
                                            <option value="SUV">SUV</option>
                                            <option value="Truck">Truck</option>
                                        </select>

                                        <div class="form-group"><textarea class="form-control" name="desc"
                                                                          placeholder="Description"
                                                                          rows="4"></textarea></div>
                                        <div class="form-group"><button class="btn btn-primary" type="submit" name="changereport">Change</button></div>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="footer-clean">
    <footer></footer>
    <p class="text-center copyright">Road Development Authority - Accident Management Department © 2020</p>
</div>
<div class="card"></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/smart-forms.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>