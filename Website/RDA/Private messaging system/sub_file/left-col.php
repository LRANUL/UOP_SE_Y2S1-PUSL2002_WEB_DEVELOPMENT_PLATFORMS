<div id="left-col-container">
      <div class="white-back" onclick="document.getElementById('new-message').style.display ='block'">
           
            <p align="center">New Message</p>
       </div>

<?php  // distinct = returns only one value if there are more than one
      $q = 'SELECT DISTINCT `reciver_name`,`sender_name` 
      FROM messages WHERE `sender_name` = "'.$_SESSION['username'].'" OR `reciver_name` = "'.$_SESSION['username'].'"
      ORDER BY `date_time` DESC
            ';
      $r = mysqli_query($con,$q);
      if($r){
            if(mysqli_num_rows($r) >0){
                  $counter = 0;
                  $added_user = array();
                  while($row=mysqli_fetch_assoc($r)){
                        $sender_name = $row['sender_name'];
                        $reciever_name = $row['reciver_name'];

                        if($_SESSION['username'] == $sender_name){
                              //
                              if(in_array($reciever_name,$added_user)){

                              }else{
                                    ?>
                                    <div class="gray-back">
                                    <img src="images/profile.jpg" class="image" style=""/>
                                          <?php echo '<a href="?user='.$reciever_name.'">' .$reciever_name.'</a>'; ?>
                                    </div>
                                    <?php $added_user = array($counter => $reciever_name);
                                    $counter++;
                              }

                        }elseif($_SESSION['username'] == $reciever_name){
                              //
                              if(in_array($sender_name,$added_user)){

                              }else{ 
                                    ?>
                                    <div class="gray-back">
                                    <img src="images/profile.jpg" class="image" style=""/>
                                          <?php echo '<a href="?user='.$sender_name.'">'.$sender_name.'</a>'; ?>
                                    </div>
                                    <?php $added_user = array($counter => $sender_name);
                                    $counter++;
                              }

                        }
                              
                        }
                  }
            
            else{
                  echo 'no user';
            }
      }else{
            echo $q;
      }
?>

       
                
 </div> 