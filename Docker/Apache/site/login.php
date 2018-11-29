<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
#echo phpinfo();

$username = $_POST['username'];
$password = $_POST['password'];

#java stuff

# if failure, destroy session
#session_unset(); 
#session_destroy();
#die("False - login failed");

# if success, set params
$_SESSION['login'] = ['born' => time(),'ip' => $_SERVER['REMOTE_ADDR'],'valid' => true];
$_SESSION['user_id'] = $username;
die("True - login successful");
?>
