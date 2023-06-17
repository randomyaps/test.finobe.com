<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalObjects.php');
if (isset($_COOKIE['FinobesiToken'])) {
	$FinobeToken = $_COOKIE['FinobesiToken'];
	$loggedIn = new User($FinobeToken);
} else {
	$FinobeToken = null;
}
?>