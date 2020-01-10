<?php
    require_once("../connection.php");
 if(isset($_POST['user'])) {
     $q='Select * from `users` where `Name`="'.$_POST['user'].'"';
     $r = mysqli_query($con,$q);
     if($r){
        if(mysqli_num_rows($r)>0){
            echo '<p>USer already exist</p>';
        }else{echo '<p>ok name</p>';}
     }else{echo $q;}
 }
?>