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
</head>

<body>
    <div></div>
    <div class="card"></div>
    <div>
        <div class="header-blue" style="background-color: rgb(190,255,193);background-size: contain;background-image: url(&quot;X&quot;);">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background-color: #005276;">
                <div class="container-fluid"><a class="navbar-brand" href="#"><strong>RDA Accident Management - Insurance</strong><br></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form><a class="btn btn-light action-button" role="button" href="index">Sign Out</a></div>
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
                      <div class="modal fade" id="RegisterModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">Registered users</h4>
                           </div>
                               <div class="modal-body">
                                <table class="table table-striped">
                                  <thead>
                                     <tr>
                                       <th scope="col">Name</th>
                                       <th scope="col"> Registragtion number</th>
                                       <th scope="col"> Date of Birth</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                    <td>mark</td>
                                    <td>102516546</td>
                                    <td>12/14/12</td>
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
                            <h5 class="text-center card-title">Accidents</h5>
                          </div>
                     </div>
                      <div class="modal fade" id="Accidents" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">Accidents</h4>
                           </div>
                               <div class="modal-body">
                                 <div id="googleMap" style="width:100%;height:400px;"></div>

                            <script>
                              function myMap() {
                              var mapProp= {
                               center:new google.maps.LatLng(6.8211,80.0409),
                               zoom:8,
                               };
                              var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

                              var marker = new google.maps.Marker({position: { lat: 6.8211, lng: 80.0409 }});


                               marker.setMap(map);

                                }

                              for (let i =0; i <= 5; i++) {
                               var marker = new google.maps.Marker({position: { lat: 5.8211, lng: 80.0409 }});
                                marker.setMap(map);
                                }
                           </script>
                         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3092MJgdnw35zv9y4jU2bWsRXq1z3-PU&callback=myMap">
                         </script>


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
                                       <th scope="col">Name</th>
                                       <th scope="col"> Registragtion number</th>
                                       <th scope="col"> Date of Birth</th>
                                       <th scope="col"> Accepted time</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                    <tr>
                                    <td>mark</td>
                                    <td>102516546</td>
                                    <td>12/14/12</td>
                                    <td>10.00pm</td>
                                    </tr>
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
                                       <th scope="col">Name</th>
                                       <th scope="col"> Registragtion number</th>
                                       <th scope="col"> Date of Birth</th>
                                       <th scope="col"> Estimated time</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                    <tr>
                                    <td>mark</td>
                                    <td>102516546</td>
                                    <td>12/14/12</td>
                                    <td> 10 min</td>
                                    </tr>
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
    <div class="highlight-blue" style="background-color: rgb(84,176,99);">
        <div class="container-fluid">
            <div class="intro">
                <h2  class="text-uppercase text-center">RDA AMD - INSURANCE PORTAL</h2>
            </div>
        </div>
    </div>
    <div style="background-color: rgb(206,255,214);">
        <div class="container">
            <div class="row">
                <div class="col-auto col-md-12 text-center align-self-center m-auto" style="background-color: rgb(206,255,214);">
                    <nav class="navbar navbar-light navbar-expand-xl navigation-clean-button" style="background-color: rgb(206,255,214);">
                        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-1"><span class="navbar-text actions"> </span><span class="navbar-text actions"> <a class="btn btn-primary bg-success action-button" role="button" href="#" style="margin: 10px;">View Accident Reports</a></span></div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="text-white bg-dark map-clean" style="background-color: rgb(255,255,255);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Map</h2>
            </div>
        </div><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDEoqYdMxy9glgnny_X1WMcJDFYf3lAHtw&amp;q=7.8731%2C+80.7718&amp;zoom=7" width="100%" height="450"></iframe></div>
    <div class="highlight-blue" style="background-color: rgb(206,255,214);"></div>
    <div class="footer-dark" style="background-color: rgb(0,22,38);">
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
