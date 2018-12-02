<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

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

	if(isset($_SESSION["user_id"])){
		$url = 'http://flask:5000/following';
		$data = array('user' => $_SESSION["user_id"]);

		$options = array(
		    'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result === FALSE) { 
			die("YOU SUCK AT CODING");
		}

		die($result);
	}
}
?>
