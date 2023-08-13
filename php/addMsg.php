<?php
  session_start();
  include_once "config.php";
  $msg = $_GET["msg"];
  $nn = $_SESSION["Nickname"];
 
  if(!empty($msg)){
  $q = "SELECT * FROM `users` WHERE Nickname = '$nn'";
  if($rq = mysqli_query($conn, $q)){
    if(mysqli_num_rows($rq) == 1){
       
        $q = "INSERT INTO `globalchat`(`Nickname`, `msg`) VALUES ('$nn', '$msg')";
        $rq = mysqli_query($conn, $q);
    }
     
   }
  }

?>