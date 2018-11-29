<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
include_once("common.php");

#var_dump($_SESSION);

# create entry if user doesn't exist
if (isset($_SESSION['user_id'])){
	$result = $mysqli->query("SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'");
	if(!$result){
	    die("Failed to query database for user: ".mysqli_error($mysqli));
	}
	if(mysqli_num_rows($result) < 1){
		$result = $mysqli->query("INSERT INTO users(user_id) VALUES ('{$_SESSION['user_id']}')");
		#echo "USER NOT FOUND";
		if(!$result){
		    die("Failed to create row for user: ".mysqli_error($mysqli));
		}
	}
}

# get info
$result = $mysqli->query("SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'");
if(!$result){
    die("Failed to query database for user: ".mysqli_error($mysqli));
}
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	#$arr = array('user_id'=>$row['user_id'],'name'=>$row['name'],'email'=>$row['email'],'img'=>base64_encode($row['img']));
	#header('Content-Type: application/json');
	#echo json_encode($arr);
	echo "{$row['user_id']}\r\n{$row['name']}\r\n{$row['email']}\r\n";
	echo base64_encode($row['img']);
}
?>
