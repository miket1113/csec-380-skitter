<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
include_once("common.php");

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
?>
