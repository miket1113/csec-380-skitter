<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
include_once("common.php");

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
?>
