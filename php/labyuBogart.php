<?php
    include_once "config.php";
	
	//colect the messages of user gamit ang ajax
	$getMsg = mysqli_real_escape_string($conn, $_POST['text']);
	
	//check yung user query sa database query
	$check_data = "SELECT replies FROM bogart WHERE queries LIKE '%$getMsg%'";
	$run_query = mysqli_query($conn, $check_data) or die("Error");
	
	
	if(mysqli_num_rows($run_query) > 0){
		 $fetch_data = mysqli_fetch_assoc($run_query);
		 $reply = $fetch_data['replies'];
		 sleep(1);
		 echo $reply;
	}else{
		$ch = rand(1, 10);
		
		if($ch > 5){
		 sleep(1);
	     echo "ano? HAHAHAHAHAHHA";	
		}else{
			sleep(1);
			echo "ha?";
		}
	}
?>