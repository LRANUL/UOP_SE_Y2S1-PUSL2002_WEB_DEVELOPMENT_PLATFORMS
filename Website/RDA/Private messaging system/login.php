<?php 
session_start();
require_once("connection.php"); ?>
<!doctype html>
<html>
<style>
*{margin:0px; padding:0px;}
    #container{border:1px solid black; width:300px; margin:0px auto}
    .input{width:92%;padding:2%;}
</style>
<body>
<h1 align="center">Login</h>
<div id="container">
    <form action="" method="POST">
    <input type="text" class="input" placeholder="user_name" name="user_name"><br><br>
    <input type="password" class="input" placeholder="password" name="password"><br><br>
    <input type="submit" value="login" name="login" />
    <a href="register.php">Register here </a>
    </form>
</div>

<?php
    if(isset($_POST['login'])){
        $user_name = $_POST['user_name'] ;
        $password = $_POST['password'];
        
        $q = 'select * from `users` Where `user_name` ="'.$user_name.'" AND `password` = "'.$password.'"';
        $r=mysqli_query($con,$q);
        if($r){
            if(mysqli_num_rows($r) > 0){
                $_SESSION['username'] = $user_name;
                echo $_SESSION['username'];
                header("location:index.php");
            }else{
                echo 'check credentials';
            }
        }else{echo $q;}
    }
    ?>
</body>
</html>