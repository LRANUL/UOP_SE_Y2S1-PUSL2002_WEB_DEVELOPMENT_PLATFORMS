<?php require_once("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    *{margin:0px; padding:0px;}
    #container{border:1px solid black; width:300px; margin:0px auto}
    .input{width:92%;padding:2%;}
    </style>
</head>
<body>
    <h1 align="center"> Registration Form </h1>
        <div id = "container">
        <form  method="POST">
        <input type="text" name="user_name" id="user_name" placeholder="user name" onkeyup="check_user()" class= "input"  required/><br><br>
        <div id="checking">Checking</div>
        
        <input type="password" placeholder="password" name="password" class= "input" required/><br><br>
        <input type="submit" id="register" name="register" value="register">
        <a href="login.php">login here</a>
        </form>
        <?php if(isset($_POST['register'])){
            
            $user_name= $_POST['user_name'];
            $password= $_POST['password'];
            $q = "INSERT INTO `users`(`id`, `user_name`, `password`) VALUES ('','".$user_name."','".$password."')";
             $r=mysqli_query($con,$q); 
             if($r){
                 header("location:login.php");
             }else{echo $q;}
        }
        ?>
        <script src="sub_file/jquery-3.4.1.min.js"></script>
        <script>
         document.getElementById("register").disabled= true;
        function check_user(){
           var user_name = document.getElementById("user_name").value;
            $.post("sub_file/user_check.php",
            {
                user:user_name
            },
            function(data,status){

                if(data=='<p>USer already exist</p>'){
                    document.getElementById("register").disabled= true;
                }else{ document.getElementById("register").disabled= false;}

                document.getElementById("checking").innerHTML = data;
            }
            );

        }
        </script>
    </div>

</body>
</html>