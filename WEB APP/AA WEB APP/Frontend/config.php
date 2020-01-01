<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'RDAAdmin');
define('DB_PASSWORD', 'PUsl2002');
define('DB_NAME', 'AAWA');
 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($conn === false){
    die("ERROR E01: Database Connection Broken !" . mysqli_connect_error());
}
?>