<?php
session_start();

require_once ('../../database/DBHelper.php');
require_once ('../../database/utility.php');

$token = getCOOKIE('token');
if (empty($token)) {
	header('Location: ../signin.php');
	die();
}

// Xoa token khoi database
$sql = "delete from login_tokens where token = '$token'";
execute($sql);

// Xoa token khoi cookie
setcookie('token', '', time()-7*24*60*60, '/');
unset($_SESSION['user']);
header('Location: ../signin');
die();