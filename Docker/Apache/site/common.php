<?php

$dbhost = 'mysql';
$dbuser = 'root';
$dbpass = 'Passw0rd';
$dbname = 'user_settings';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    die( "Sorry, this website is experiencing problems.");
}
#error_reporting(0);

?>
