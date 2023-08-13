<?php
   $conn = mysqli_connect("localhost", "root", "", "tori");
    if(!$conn){
		echo "Database connected" . mysqli_connect_error();
	}
?>