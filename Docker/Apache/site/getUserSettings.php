<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
include_once("common.php");

var_dump($_SESSION);
if(!isset($_SESSION['user_id'])) {
   die('Variable is not set');
}

# create entry if user doesn't exist
$result = $mysqli->query("SELECT * FROM users WHERE id = {$_SESSION['user_id']}");
if($result->num_rows < 1){
	$result = $mysqli->query("INSERT INTO users(user_id) VALUES ('{$_SESSION['user_id']}')");
	echo "USER NOT FOUND";
	if(!$result){
            die(mysqli_error($mysqli));
        }
}

# get info
$result = $mysqli->query("SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
if($result->num_rows > 0){
	echo "FOUND ROW";
	$row = $result->fetch_assoc();
	echo $row['name'];
        echo $row['email'];
	echo $row['img'];
	//Render image
	//header("Content-type: image/jpg"); 
	//echo $imgData['image'];
}
?>
