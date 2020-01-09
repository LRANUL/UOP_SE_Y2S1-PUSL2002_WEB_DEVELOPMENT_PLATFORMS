<div id="right-col-container">
     <div id="message-container">
     <?php 
    
    if(isset($_GET['user'])){
        $_GET['user'] = $_GET['user'];

    }else{
        $q = 'SELECT  `sender_name`, `reciver_name` from  `messages`
        where `sender_name` = "'.$_SESSION['username'].'" OR `reciver_name` = "'.$_SESSION['username'].'" ORDER BY `date_time` DESC LIMIT 1 ';
        $r = mysqli_query($con,$q);
        if($r){
            if(mysqli_num_rows($r) >0){
                while($row=mysqli_fetch_assoc($r)){
                    $sender_name = $row['sender_name'];
                    $reciver_name = $row['reciver_name'];

                    if($_SESSION['username'] == $sender_name ){
                        $_GET['user'] = $reciver_name;
                    }else{
                        $_GET['user'] =$sender_name;
                    }


                }

            }else{
                echo 'no messages from u';
            }
            
        }else {
            echo $q;
        }
    }


     $q='SELECT * FROM `messages` WHERE `sender_name` = "'.$_SESSION['username'].'" AND `reciver_name` = "'.$_GET["user"].'"
     OR `sender_name` = "'.$_GET['user'].'"
     AND `reciver_name` = "'.$_SESSION['username'].'" ';

        $r = mysqli_query($con,$q);

        if($r){
            while($row = mysqli_fetch_assoc($r)){
                $sender_name = $row['sender_name'];
                $reciever_name = $row['reciver_name'];
                $message = $row['message_text'];
                if($sender_name == $_SESSION['username']){
                    ?>
                    <div class="gray-message">
                        <a href="#">Me</a>
                        <p><?php echo $message; ?> </p>
                    </div>
                    <?php
                }else{?>
                <div class="white-message">
                        <a href="#"><?php echo $sender_name; ?></a>
                        <p><?php echo $message; ?> </p>
                    </div>
                    <?php

                }

            }
        }else{
            echo $q;
        }
        
     ?>
                

      </div>
      <form action="" method="post">
      <textarea class="textarea" name="" id="message_text" placeholder="Write your message"></textarea>
      </form>
                    <textarea class="textarea" name="" id="" placeholder="Write your message"></textarea>
</div>
<script src="sub_file/jquery-3.4.1.min.js"></script>
<script>
$("document").ready(function(event){

    $("#right-col-container").on('submit','#message-form',function(){
        var message_text = $("#message_text").val();
        //send the data to sending_process.php file
        $.post("sub_file/sending_process.php?user=<?php echo $_GET['user'];?>",{
           text: message_text,
        },
        function(data,status){
            alert (data);
            $("#message_text").val("");
            document.getElementById("message-container").innerHTML += data;
        }
        );
    });
    $("#right-col-container").keypress(function(e){
        if(e.keycode==13 && !e.shiftkey){
            $("#message-form").submit();

        }
    });

})
</script>