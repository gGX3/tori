

<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

require "config.php";

$sql = "SELECT * FROM users
		WHERE reset_token_hash = ?";
		
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if($user === null){
	echo "token not found";
}elseif(strtotime($user["reset_token_expires_at"]) <= time()){
	echo "token has expired";
}elseif(strlen($_POST["nPassword"]) < 8){
	echo "Password must be at least 8 characters";
}elseif(! preg_match("/[a-z]/i", $_POST["nPassword"])){
	echo "Password must contain at least one number";
}elseif(! preg_match("/[0-9]/", $_POST["nPassword"])){
	echo "Password must contain at least one number";
}elseif($_POST["nPassword"] !== $_POST["rPassword"]){
	echo "Password must contain at least one numbevbvvvvvvr";
}else{

	$password_hash = mysqli_real_escape_string($conn, md5($_POST['nPassword']));
	

	$sql1 = "UPDATE users 
		SET password = ?,
	       reset_token_hash = NULL,
		   reset_token_expires_at = NULL
		WHERE unique_id = ?";
	   
	$stmt = $conn->prepare($sql1);

	$stmt->bind_param("ss", $password_hash, $user['unique_id']);

	$stmt->execute();
	echo "success";
	
}












?>