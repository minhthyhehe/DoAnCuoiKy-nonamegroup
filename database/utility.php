<?php
function fixSqlInjection($str) {
	$str = str_replace('\\', '\\\\', $str);
	$str = str_replace('\'', '\\\'', $str);
	return $str;
}

function authenToken($role) {
	if (isset($_SESSION['user'])) {
		return $_SESSION['user'];
	}

	$token = getCOOKIE('token');
	if (empty($token)) {
		return null;
	}

	$sql    = "select users.* from users, login_tokens where users.id = login_tokens.id_user and login_tokens.token = '$token'";
	$result = executeResult($sql);
	
	if ($result != null && count($result) == 1 && in_array($result[0]['role'], $role)) {
		$_SESSION['user'] = $result[0];
		$result[0]['token'] = "'$token'";
		return $result[0];
	}

	return null;
}

function getPOST($key) {
	$value = '';
	if (isset($_POST[$key])) {
		$value = $_POST[$key];
	}
	return fixSqlInjection($value);
}

function getCOOKIE($key) {
	$value = '';
	if (isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
	}
	return fixSqlInjection($value);
}

function getGET($key) {
	$value = '';
	if (isset($_GET[$key])) {
		$value = $_GET[$key];
	}
	return fixSqlInjection($value);
}

function md5Security($pwd) {
	return md5($pwd.MD5_PRIVATE_KEY);
}