<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
session_destroy();

echo "<script nonce=\"EasyJQeuryNonce\">window.location.href = '/index.html';</script>";
?>
