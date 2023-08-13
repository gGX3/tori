<?php
  session_start();
  include_once "config.php";
  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['Password']));
  
  if(!empty($email) && !empty($password)){
	  $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
	  if(mysqli_num_rows($sql) > 0){
		  $row = mysqli_fetch_assoc($sql);
		  $status = "Active now";
		   $sq2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
		   if($sq2){
			   $_SESSION['unique_id'] = $row['unique_id'];
			   $_SESSION['email'] = $row['email'];
			   $_SESSION['otp'] = $row['otp'];
			   $_SESSION['Nickname'] = $row['Nickname'];
               echo "success";
		   }
	  }else{
		  echo "Email or Password is incorrect!";
	  }
  }else{
      echo "All input fields are required!";	  
  }
  ?>