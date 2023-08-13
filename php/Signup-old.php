<?php
  session_start();
  include_once "config.php";
  
  $fname = mysqli_real_escape_string($conn, $_POST[ucfirst('Fname')]);
  $lname = mysqli_real_escape_string($conn, $_POST[ucfirst('Lname')]);
  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $nickname = mysqli_real_escape_string($conn, $_POST['Nickname']);
  $password = mysqli_real_escape_string($conn, md5($_POST['Password']));
  $Role = 'user';
  $verification_status = '0';

  
  
  if(!empty($fname) && ($lname) && ($email) && ($password) && ($nickname)){
   
	if(strlen($nickname) <= 12 ){
		$nmv = "SELECT * FROM users WHERE Nickname = '$nickname'";
		$resultnmv = mysqli_query($conn, $nmv);
		$rowCountnmv = mysqli_num_rows($resultnmv);
		if($rowCountnmv>0){
		 echo "$nickname - This nickname already exist!";
		}else{
	
			  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				  $sql = "SELECT * FROM users WHERE email = '$email'";
				  $result = mysqli_query($conn, $sql);
				  $rowCount = mysqli_num_rows($result);
				  if($rowCount>0){
					  echo "$email - This email already exist!";
				  }
				  else{
					  if(isset($_FILES['image'])){
						  $img_name = $_FILES['image']['name'];
						  $img_type = $_FILES['image']['type'];
						  $tmp_name = $_FILES['image']['tmp_name'];
						  
						  $img_explode = explode('.', $img_name);
						  $img_ext = end($img_explode);
						  
						  $extensions = ['png', 'jpeg', 'jpg'];
						   if(in_array($img_ext, $extensions) === true){
							   $time = time();
							   $new_img_name = $time.$img_name;
							   
							   if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){
								   $status = "active now";
								   $random_id = rand(time(), 10000000);
								   $otp = mt_rand(1111,9999); //eto yung otp generator
								   
								   $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, otp, verification_status, Role, Nickname)
														VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}', '{$otp}', '{$verification_status}', '{$Role}', '{$nickname}')");
								   if($sql2){
									   $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
									   if(mysqli_num_rows($sql3) > 0){

										  //borderrrrrrrrrrrrr
										   
			                               $mail = require __DIR__ . "/mailer.php";										   
										   $mail->setFrom('tori.team.message@gmail.com', 'Tori');
										   $mail->addAddress($email, $fname);
										   $mail->Subject = 'Verify Your Account';
									       $mail->Body    = 'This is your OTP  '.$otp;
										  
										   //$mail->addAttachment('attachment.txt');
										   if (!$mail->send()) {
											   echo 'Mailer Error: ' . $mail->ErrorInfo;
										   } else {
											      $row = mysqli_fetch_assoc($sql3);
												  $_SESSION['unique_id'] = $row['unique_id'];
												  $_SESSION['Nickname'] = $row['Nickname'];
												  $_SESSION['email'] = $row['email'];
												  $_SESSION['otp'] = $row['otp'];
												  $success = "b";
												  echo $success;  
										   }
										   
										   
										   
										    
										   //borderrrrrrrrrrrr
									   }
								   }
								   else{
									   echo "Something went wrong!";
								   }
							   }
						   }
						   else{
							   echo "Please select an Image file - jpeg, jpg, png!";
						   }
					  }
					  else{
						  echo "Please select an Image file!";
					  }
				  }
			  }
			  else{
				  echo "$email - This is not a valid email";
			  }
		    	}
	        }else{
			   echo "Nickname should not more than 12 character";
		   }
         }else{
	  echo "All input field are required!";
 }
  
?>