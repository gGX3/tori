<?php
    session_start();
    include "config.php";
    
    $q = "SELECT * FROM `globalchat`";
    if($rq = mysqli_query($conn, $q)){

        if(mysqli_num_rows($rq) > 0){
                 
            while($data = mysqli_fetch_assoc($rq)){
                if($data["Nickname"] == $_SESSION["Nickname"]){
                    ?>

                            <div class="chat sender">
                                <div class="details">
                                     <p><?= $data["msg"]?></p>
                                </div>
                            </div>
                        

                    <?php
                }else{
                    ?>
                          <div class="chat reciever">
                                <span class = "nnmm"><?= $data["Nickname"]?></span>
                                <div class="details">
                                    <p><?= $data["msg"]?></p>
                                </div>
                            </div>  
                    <?php
                }

            }

    }else{
        echo "chat is empty at this moment";
    }
  }
?>