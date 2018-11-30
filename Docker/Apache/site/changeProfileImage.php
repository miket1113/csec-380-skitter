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
		die("<script nonce=\"EasyJQeuryNonce\">window.location.href = '/index.html';</script>");
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
		die("<script nonce=\"EasyJQeuryNonce\">window.location.href = '/index.html';</script>");
	}

	// Reset our counter
	$_SESSION['login']['born'] = time();

	if(isset($_POST["submit"])){
	    $check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false){
		$image = $_FILES['image']['tmp_name'];
		#$imgContent = addslashes(file_get_contents($image));

		$filename = 'images/'.uniqid();
		move_uploaded_file($image, $filename);
		//Insert image content into database
		$insert = $mysqli->query("UPDATE users SET img = '$filename' WHERE user_id = '{$_SESSION['user_id']}'");
		if($insert){
			header("Location: https://localhost/home.html");
			die();
		}else{
		    echo "File upload failed, please try again.";
		    die("Error - Issue executing prepared statement: " . mysqli_error($mysqli));
		} 
	    }else{
		echo "Please select an image file to upload.";
	    }
	}
}
?>
