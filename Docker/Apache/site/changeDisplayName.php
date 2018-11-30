<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
include_once("common.php");

$has_session = session_status() == PHP_SESSION_ACTIVE;
if($has_session){
	$destroy = false;
	if (!isset($_SESSION['login']) or !isset($_SESSION['user_id'])){
		session_regenerate_id(true);
		session_destroy();
		die("Invalid Session");
	}
	if($_SERVER['REMOTE_ADDR'] !== $_SESSION['login']['ip']){
		$destroy = true;
	}
	if($_SESSION['login']['born'] < time() - 300){
		$destroy = true;	
	}
	if($_SESSION['login']["valid"] !== true){
		$destroy = true;
	}
	if($destroy===true){
		session_destroy();
		die("Invalid Session");
	}

	// Reset our counter
	$_SESSION['login']['born'] = time();

	if(!empty($_POST['name'])){
		//Insert image content into database
		$insert = $mysqli->query("UPDATE users SET name = '{$_POST['name']}' WHERE user_id = '{$_SESSION['user_id']}'");
		if($insert){
			echo("name updated   ");
		}else{
		   die("Error - Issue executing prepared statement: " . mysqli_error($mysqli));
		} 
	}
	if(!empty($_POST['email'])){
		//Insert image content into database
		$insert = $mysqli->query("UPDATE users SET email = '{$_POST['email']}' WHERE user_id = '{$_SESSION['user_id']}'");
		if($insert){
			die("email updated");
		}else{
		   die("Error - Issue executing prepared statement: " . mysqli_error($mysqli));
		} 
	}
}
?>
