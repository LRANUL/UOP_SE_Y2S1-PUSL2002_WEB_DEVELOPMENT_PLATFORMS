<?php 
session_start();
if(isset($_SESSION['username'])){
//echo 'hii' .$_SESSION['username'];
//echo '<a href="logout.php"> Log out </a>';
?>
<!doctype html>
<head>
<style>
<?php require_once("sub_file/style.php"); ?>

</style>
</head>
<body>
<?php require_once("sub_file/new-message.php"); ?>

    <div class="container" id ="container">
        <div id= "menu">
        <?php 
            echo $_SESSION['username']; 
            echo '<a style="float:right; color:white;"  href="logout.php">Logout</a>';
        ?>
        </div>

        <div id="left-col">
             <?php  require_once("sub_file/left-col.php"); ?>
        </div>

        <div id="right-col">
              <?php require_once("sub_file/right-col.php"); ?>
                  
        </div>

    </div>
</body>

</html>



<?php




}else {
    header("location:login.php");
}
?>

