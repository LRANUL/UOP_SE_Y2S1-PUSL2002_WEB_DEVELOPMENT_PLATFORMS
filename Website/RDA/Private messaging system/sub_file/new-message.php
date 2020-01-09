<div class="" id="new-message">
    <p class="m-header">New Message</p>
    <p class="m-body">
    <form action="" method="post" align="center">
        <input type="text" list="user" 
        onkeyup="check_in_db()" class="message-input" 
        placeholder="user_name" name="user_name" id="user_name"/>
        <!-- this shows available users -->
        <datalist id="user"></datalist>
         <br><br>
        <textarea name="message" class="message-input" id="" placeholder="write your message" ></textarea><br><br>
        <input type="submit" value="Send" name="send" id="send">
        <button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
    </form>
    </p>
    <p class="m-footer">click send to send</p>

</div>
<?php 
    require_once("connection.php");
    if(isset($_POST['send'])){
        $sender_name = $_SESSION['username'];
        $reciever_name = $_POST['user_name'];
        $message = $_POST['message'];
        $date= date("y-m-d h:i:sa");
            /* INSERT INTO `messages`(`id`, `sender_name`, `reciver_name`, `message_text`, `date_time`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])*/
        $q = 'INSERT INTO `messages`(`id`, `sender_name`, `reciver_name`, `message_text`, `date_time`) 
        VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")';

        $r = mysqli_query($con, $q);
        if($r){
            header("location:index.php?user=".$reciever_name);
        }else {
            echo $q;
        }
    }
?>




<script src="sub_file/jquery-3.4.1.min.js"></script>
<script>
document.getElementById("send").disabled = true;
function check_in_db(){
    var user_name = document.getElementById("user_name").value;
    $.post("sub_file/check_in_db.php",
    {
        user:user_name
    },
    function(data,status){
        //alert(data);
        if(data =='<option value="no user">'){
            document.getElementById("send").disabled = true;
        }else{
                document.getElementById("send").disabled = false;
        }
        document.getElementById("user").innerHTML = data ;
    }
    );


}
</script>