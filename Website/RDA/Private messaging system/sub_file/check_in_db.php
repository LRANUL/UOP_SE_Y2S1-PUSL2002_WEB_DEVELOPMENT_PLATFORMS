<?php
require_once("../connection.php");
if(isset($_POST['user'])){

    $q='SELECT * from `users` where `user_name` = "'.$_POST['user'].'"';
    $r= mysqli_query($con, $q);
    if($r){
        if(mysqli_num_rows($r) > 0){
            while($row = mysqli_fetch_assoc($r)){
                $user_name = $row['user_name'];
                echo '<option value="'.$user_name.'">';
            }

        }else{
            echo '<option value="no user">';
        }
    }else{
        echo q;
    }

}
?>