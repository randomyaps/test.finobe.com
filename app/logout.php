<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
switch(true){
	case ($FinobeToken):
		setcookie('FinobesiToken', null, -1, '/', $_SERVER['SERVER_NAME']); 
		unset($_COOKIE['FinobesiToken']);
		die(header("Location: ". $baseUrl ."/"));
		break;
	default:
		die(header("Location: ". $baseUrl ."/"));
		break;
}
?>