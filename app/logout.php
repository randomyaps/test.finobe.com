<?php
$baseUrl = "http://". $_SERVER['SERVER_NAME'] ."";
session_start();
if (isset($_COOKIE['finobetoken'])) {
	session_destroy();
	setcookie('finobetoken', null, -1, '/', $_SERVER['SERVER_NAME']); 
	setcookie('loginbanner', null, -1, '/', $_SERVER['SERVER_NAME']); 
  	unset($_COOKIE['finobetoken']);
	unset($_SESSION['loginbanner']);
  	header("Location: ". $baseUrl ."/");
	die();
} else {
  	header("Location: ". $baseUrl ."/");
	die();
}
?>