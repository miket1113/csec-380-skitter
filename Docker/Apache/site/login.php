<?php
$sess_id = session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
#echo phpinfo();

$email = $_POST['email'];
$password = $_POST['password'];

#java stuff

# if failure, destroy session
#session_unset(); 
#session_destroy();
#die("False - login failed");

# if success, set params
$_SESSION['login'] = ['born' => time(),'ip' => $_SERVER['REMOTE_ADDR'],'valid' => true];
$_SESSION['user_id'] = $row['user_id'];
die("True - login successful");
?>
