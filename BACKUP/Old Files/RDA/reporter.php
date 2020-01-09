<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>RDA - Reporter</title>
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
</head>

<body>
  <div>
    <div class="header-blue">
      <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
        <div class="container-fluid"><a class="navbar-brand" href="home"><img class="wobble animated"
          src="assets/img/RDAAMS_logo.png" style="background-size: contain;width: 90px;"
          loading="eager"></a><button data-toggle="collapse" class="navbar-toggler"
          data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
          class="navbar-toggler-icon text-white"></span></button>
          <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav"></ul>
            <h5 style="color: rgb(255,255,255);"><strong>Road Development Authority</strong></h5>
            <form class="form-inline mr-auto" target="_self">
              <div class="form-group"><label for="search-field"></label></div>
            </form><span class="text-primary navbar-text">
              <button class="btn btn-light text-white action-button" type="button"onclick="window.location.href = 'Home';">Log Out</button></span>
            </div>
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
                        <div class="collapse" id="collapse-3">
                          <p>Collapse content.</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div><a class="btn btn-success" data-toggle="collapse" aria-expanded="false"
                        aria-controls="collapse-2" href="#collapse-2" role="button"
                        style="width: 140px;">Help</a>
                        <div class="collapse" id="collapse-2"><small class="form-text text-muted">If
                          you are in trouble let use know.<button
                          class="btn btn-outline-dark btn-block btn-sm"
                          data-toggle="modal" data-target="#picktk" type="button">Pickup
                          Truck</button></small>
                          <button class="btn btn-outline-dark btn-block btn-sm"
                          data-toggle="modal" data-target="#faq"
                          type="button">FAQ</button><button
                          class="btn btn-primary btn-block btn-sm bg-warning border rounded-0 float-right"
                          data-toggle="modal" data-target="#chat" type="button">Chat</button>
                          <div class="modal fade" role="dialog" tabindex="-1" id="chat">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Chat with us</h4><button
                                  type="button" class="close" data-dismiss="modal"
                                  aria-label="Close"><span
                                  aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                  <p>Please wait while we connect you.</p>
                                  <div><iframe
                                    src="https://links.collect.chat/5df9be91d66bd24b6228f67d"
                                    width="100%" height="500px"></iframe></div>
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
                                    aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <h4 class="text-left">How to report incidents ?</h4>
                                      <div class="form-group"><small
                                        class="form-text text-muted">Once you have
                                        logged in to your account, you will see
                                        <strong>Report </strong>button on the menu
                                        of the screen, click it and add the relevant
                                        details to it. Afterwards you may fetch your
                                        current location use the map next to pin
                                        point it.</small></div>
                                        <div class="form-group">
                                          <h4 class="text-left">How do I change my email
                                            address?</h4>
                                          </div>
                                          <div class="form-group"><small
                                            class="form-text text-muted">Under Manage
                                            Profile section you will see your current
                                            details, if you need to update them click
                                            the <strong>Update</strong>&nbsp;button
                                            below your details.</small></div>
                                          </form>
                                          <h4 class="text-left">My map doesn't load, I only see
                                            RDA logo?</h4><small
                                            class="form-text text-muted">This may be due to an
                                            update we are carrying out, in order to provide you
                                            with a high quality experience we carry our updates
                                            during midnight and usually takes about 30 minutes.
                                            If we do have major upgrades we will notify about it
                                            to you. If the problem persists try contacting us or
                                            use the chat below.</small>
                                          </div>
                                          <div class="modal-footer"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="picktk">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Pickup Truck</h4><button
                                            type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Select your position and call for pickup truck, call
                                              us for confirmation on truck arrival. Call us if
                                              have health concern right now. +94112255777</p>
                                              <button class="btn btn-primary" type="button" onclick="gpslocate()">Locate
                                                Me</button>
                                                <button class="btn btn-success" type="button">Call
                                                  us</button>
                                                </div>
                                                <div class="modal-footer"></div>
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
                                              <h6 class="text-muted card-subtitle mb-2">
                                                Name:&nbsp;<label>Lable Name</label></h6>
                                                <h6 class="text-muted card-subtitle mb-2">
                                                  Email:&nbsp;<label>Lable Email</label></h6>
                                                  <h6 class="text-muted card-subtitle mb-2">NIC:&nbsp;<label>Lable
                                                    NIC</label></h6>
                                                    <h6 class="text-muted card-subtitle mb-2">
                                                      Mobile:&nbsp;<label>Lable Phone</label></h6>
                                                      <h6 class="text-muted card-subtitle mb-2">License
                                                        No:&nbsp;<label>Lable License</label></h6><button
                                                        class="btn btn-dark text-right" data-toggle="modal"
                                                        data-target="#updProfile" type="button">Update</button>
                                                        <div class="modal fade" role="dialog" tabindex="-1"
                                                        id="updProfile">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h4 class="modal-title">Profile</h4><button
                                                              type="button" class="close"
                                                              data-dismiss="modal"
                                                              aria-label="Close"><span
                                                              aria-hidden="true">×</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <p>Please update your details properly, to avoid
                                                                getting locked out.</p>
                                                                <div class="card">
                                                                  <div class="card-body border rounded">
                                                                    <p>Please enter your new password to
                                                                      update your account.</p>
                                                                      <div class="col"><label
                                                                        class="col-form-label">Old
                                                                        Password:&nbsp;&nbsp;</label>
                                                                      </div>
                                                                      <div class="col"><input type="text">
                                                                      </div>
                                                                      <div class="col"><label
                                                                        class="col-form-label">New
                                                                        Password:&nbsp;</label></div>
                                                                        <div class="col"><input type="text">
                                                                        </div><button
                                                                        class="btn btn-light border rounded float-right"
                                                                        type="button">update</button>
                                                                      </div>
                                                                      <div class="card-body">
                                                                        <p>Update your phone number.</p>
                                                                        <div class="col"><label
                                                                          class="col-form-label">Mobile:&nbsp;</label>
                                                                        </div>
                                                                        <div class="col"><input type="text">
                                                                        </div><button
                                                                        class="btn btn-light border rounded float-right"
                                                                        type="button">update</button>
                                                                      </div>
                                                                      <div class="card-body border rounded">
                                                                        <p>Update your email address.</p>
                                                                        <div class="col"><label
                                                                          class="col-form-label">Email:&nbsp;</label>
                                                                        </div>
                                                                        <div class="col"><input type="text">
                                                                        </div><button
                                                                        class="btn btn-light border rounded float-right"
                                                                        type="button">update</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="modal-footer"><button
                                                                    class="btn btn-light" type="button"
                                                                    data-dismiss="modal">Close</button><button
                                                                    class="btn btn-primary"
                                                                    type="button">Save</button></div>
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
                                                            <form>
                                                              <div class="form-group"><input class="form-control" type="text"
                                                                name="ID" placeholder="Incident No" inputmode="email"
                                                                required=""><select class="form-control"
                                                                style="margin-top: 15px;" name="subject">
                                                                <optgroup label="Select Subject">
                                                                  <option value="12" selected="">Accident Neglected
                                                                  </option>
                                                                  <option value="13">Police Not Arrived</option>
                                                                  <option value="14">Pickup Not Arrived</option>
                                                                  <option value="">Insuranced Based</option>
                                                                </optgroup>
                                                              </select></div>
                                                              <div class="form-group"><textarea class="form-control"
                                                                name="message" placeholder="Message"
                                                                rows="14"></textarea></div>
                                                                <div class="form-group"><button class="btn btn-primary"
                                                                  type="submit">send </button></div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                              <div class="col-md-6"><iframe class="bg-primary border rounded border-primary shadow-lg"
                                                allowfullscreen="" frameborder="0"
                                                var lng = "7.8731";
                                                var lat = "80.7718";
                                                map.setCenter(LatLng)
                                                src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&amp;center=7.8731,80.7718&amp;zoom=7";
                                                width="100%" height="450"
                                                style="background-image: url(&quot;assets/img/RDAAMS_logo.png&quot;);background-size: contain;background-repeat: no-repeat;background-position: center;"></iframe>
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
                                        <script>
                                        // Note: This example requires that you consent to location sharing when
                                        // prompted by your browser. If you see the error "The Geolocation service
                                        // failed.", it means you probably did not give permission for the browser to
                                        // locate you.
                                        var map, infoWindow;
                                        function gpslocate() {
                                          map = new google.maps.Map(document.getElementById('map'), {
                                            center: { lat: 7.8731, lng:80.7718 },
                                            zoom: 7
                                          });
                                          infoWindow = new google.maps.InfoWindow;

                                          // Try HTML5 geolocation.
                                          if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(function (position) {
                                              var pos = {
                                                latgps: position.coords.latitude,
                                                lnggps: position.coords.longitude
                                              };

                                              infoWindow.setPosition(pos);
                                              infoWindow.setContent('Location found.');
                                              infoWindow.open(map);
                                              map.setCenter(pos);
                                              lat = latgps;
                                              lng = lnggps;
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
                                          <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&callback=initMap">
                                          </script>
                                        </body>

                                        </html>
