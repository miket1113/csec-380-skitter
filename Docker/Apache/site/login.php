<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
#echo phpinfo();

$username = $_POST['username'];
$password = $_POST['password'];

#java stuff
#if(isset($_POST["username"])){
#	$url = 'http://auth/login';
#	$data = array('username' => $username, 'password' => $password);
#
#	$options = array(
#	    'http' => array(
#		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
#		'method'  => 'POST',
#		'content' => http_build_query($data)
#	    )
#	);
#	$context  = stream_context_create($options);
#	$result = file_get_contents($url, false, $context);

#	NOTE: This fails because it does not contain the csrf token or JSESSIONID
#	    required to make POST requests to the page. Future work requires reworking
#	    the login page and session management

#	if ($result === FALSE) { 
#		die("YOU SUCK AT CODING");
#	}
#
#	if (strpos($result, 'false') !== false) {
#		if failure, destroy session
#		session_unset(); 
#		session_destroy();
#		die("False - login failed");
#	}
#}




# if success, set params
$_SESSION['login'] = ['born' => time(),'ip' => $_SERVER['REMOTE_ADDR'],'valid' => true];
$_SESSION['user_id'] = $username;
die("True - login successful");
?>
