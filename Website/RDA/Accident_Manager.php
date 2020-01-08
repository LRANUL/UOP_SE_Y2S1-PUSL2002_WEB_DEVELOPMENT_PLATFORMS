<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Accident Manager</title>
    <style>
     body{margin:30px;}
     .my-container{border:1px solid green;}
    .my-row{border:3px solid;
			}
    
    </style>
</head>
<body>
	<div class="container my-container">
        				<center><h1 style="padding: 20PX;">ACCIDENT MANAGER</h1></center>
		<div class="row justify-content-around">
			<div class="col-lg-5 my-col"><!--for the clickable accident list-->
			<?php 
				include("connection.php");
				$sql1 = "SELECT ID,NIC,Severity,'Type',Description,Date_Time,Longitude,Latitude  FROM `report`";
						
					$resultset = mysqli_query($conn, $sql1) or die("database error:". mysqli_error($conn));
				while( $record = mysqli_fetch_assoc($resultset) ) {
			?>
			
			
			<Form method="post" action="" >
			   <div class="card" style="height: 13rem;">
			   <form action="" method="post">
					  <div class="card-body">
						<h5 class="card-title" id="title"><?php echo $record['ID'];?> . ACCIDENT  </h5>
						<input name="" id="" class="" type="hidden" value="<?php echo $record['ID'] ?>" >
						<input name ="username" type="hidden" value = "<?php echo $record['ID'] ?>" >
						<input name ="long" type="hidden" value = "<?php echo $record['Longitude'] ?>" >
						<input name ="lat" type="hidden" value = "<?php echo $record['Latitude'] ?>" >
						<input name ="lat" type="hidden" value = "<?php echo $record['Type'] ?>" >
						<input name ="lat" type="hidden" value = "<?php echo $record['Severity'] ?>" >

						<p class="card-text"><?php echo $record['Description']; ?></p>
						<p class="card-text"><small class="text-muted">updated <?php echo $record['Date_Time']; ?> </small></p>
						<button type="submit"  class="btn btn-primary stretched-link">View Details</button>
						</div>
			   </div>
			   </form>	
			   <?php } /*function pre_r($array){echo '<pre>'; 
					print_r($array); 
					echo '</pre>';}*/
				?>

		</div>

			<div class="col-lg-4 my-col"><!--for picture,map slider and info-->
				<div class="container my-container">
					<div class="row my-row " style="height: 13rem;">
					<?php	if(isset($_POST['username'])){$medid = $_POST['username'];}
					else{$medid = -1;}
					$sql2 = "SELECT Media FROM `reportmedia` where ReportID = $medid";
				
				
							$resultset2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
							if($row = mysqli_fetch_array($resultset2)) {	
							echo '<img src="data:image/jpeg;base64,'.base64_encode($row["Media"]).'" height="100%" width="100%"/>';
							}
							else{
								echo '<img src="Accident Recover.jpg" height="100%" width="100%"/>';
							}
					?>
						</div>
						<div class="row my-row" >
					<script>
							function myMap() {
							var mapProp= {
						
							center:new google.maps.LatLng(var1,-0.120850),
							zoom:5,
							};
							var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
							}
						</script>

						<div id="googleMap" style="width:100%;height:400px;"></div>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3092MJgdnw35zv9y4jU2bWsRXq1z3-PU&callback=myMap">
                         </script>						
													
					<!--map slider--></div>
					<div class="row my-row"><div class="card" style="width: 100%;">
                            <div class="card-header">
                                Details
							</div>
						<?php	if(isset($_POST['Type'])){$TYPE = $_POST['Type'];}
					else{$TYPE = -1;} ?>
					<?php	if(isset($_POST['Severity'])){$Sv = $_POST['Severity'];}
					else{$Sv = "Unknown";} ?>
                            <ul class="list-group list-group-flush">
							<li class="list-group-item">Severity - type <?php echo $Sv  ?> </li>
							<li class="list-group-item">Vehicals involved -<?php echo $TYPE  ?></li>
                            </ul>
                            </div></div>
				</div>
			</div>
           
       </div>
	</div>
	
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>
</html>