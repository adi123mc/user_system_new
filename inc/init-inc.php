<?php

session_start();

$exceptions = array('register' , 'login');

$page = substr(end(explode('/', $_SERVER['SCRIPT_NAME'])), 0 , -4);

if (in_array($page, $exceptions) === false) {
	if (isset($_SESSTION['username']) === false) {
		header('Location: login.php');
	die(mysql_error());
	}

}

mysql_connect("127.0.0.1", "root", "");
mysql_select_db('user_system');

$path = dirname(__FILE__);

include("/inc/user-inc.php");
?>