<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

require "config.php";

$sql = "SELECT * FROM users
		WHERE reset_token_hash = ?";
		
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$user = $result->fetch_assoc();

if($user ==== null){
	die("token not found");
}

if(strtotime($user["reset_token_expires_at"]) <= time()){
	die("token has expired");
}

echo "token is valid and hasn't expired";