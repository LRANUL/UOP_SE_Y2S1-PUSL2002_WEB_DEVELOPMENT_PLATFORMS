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
    .row{border:3px;
            padding: 20px;
			}
    
    </style>
</head>
<body>
	<div class="container my-container">
                        <center><h1 style="padding: 20PX;">Account MANAGER</h1></center>
         <div class="row">
             <div class="col-lg-3">
             <button type="submit" class="btn btn-primary stretched-link" style="width: 200px;">Create WebMaster</button>
             </div>
             <div class="col-lg-3">
             <button type="submit" class="btn btn-primary stretched-link" style="width: 200px;">Create Police</button>
             </div>
             <div class="col-lg-3">
             <button type="submit" class="btn btn-primary stretched-link" style="width: 200px;">Create RDA</button>
             </div>
             <div class="col-lg-3">
             <button type="submit" class="btn btn-primary stretched-link" style="width: 200px;">Create Insurance</button>
             </div>
         </div>              


		<div class="row justify-content-around">
            <div class="col-lg-5"> <!-- USERS WEB  -->
            
                <div class="card" style="width: 100%;">
                        <div class="card-header">
                            WebMaster
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">User - IShanC7  

                        <button type="submit" class="btn btn-primary stretched-link float-right">Delete</button></li>
                        </ul>
                </div>
                
            </div>
            <div class="col-lg-5"><!-- USERS POL   -->
                <div class="card" style="width: 100%;">
                <div class="card-header">
                    Police
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">User - IShanC7  
                <button type="submit" class="btn btn-primary stretched-link float-right">Delete</button> </li>
                </ul>
                </div>
             </div>	
        </div>
        
        <div class="row justify-content-around">
			<div class="col-lg-5"><!-- USERS RDA   -->
                <div class="card" style="width: 100%;">
                <div class="card-header">
                    RDA Agent
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">User - IShanC7  
                    <button type="submit" class="btn btn-primary stretched-link float-right">Delete</button> </li>
                </ul>
                </div>

                
            </div>
            <div class="col-lg-5"><!-- USERS INSu  -->
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                    Insurance
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">User - IShanC7  
                    <button type="submit" class="btn btn-primary stretched-link float-right">Delete</button> </li>
                    </ul>
                </div>
            </div>
                                
                                    
           </div>

           <div class="row justify-content-around">
               <div class="col-10">
                        
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                Driver
                            </div>
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">User - IShanC7  
                            <button type="submit" class="btn btn-primary stretched-link float-right">Delete</button> </li>
                            </ul>
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