<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
if (isset($_COOKIE['FinobesiToken'])) {
	$FinobeToken = $_COOKIE['FinobesiToken'];
} else {
	$FinobeToken = null;
}

if ($FinobeToken !== null) {
	$userFetch = $generaldb->prepare("SELECT * FROM users WHERE token = :token");
	$userFetch->execute([":token" => $FinobeToken]);
	$infoFetched = $userFetch->fetch(PDO::FETCH_ASSOC);
	$userDius = ($infoFetched['dius'] ?? null);
	$userName = ($infoFetched['name'] ?? null);
	$userRank = ($infoFetched['rank'] ?? null);
	$userId = ($infoFetched['id'] ?? null);
	$userMessage = ($infoFetched['message'] ?? null);
	switch(true){case($userId == null):die('invalid token');break;}
}else{
	$userDius = null;
	$userRank = null;
	$userMessage = null;
	$userName = null;
	$userId = null;
}
?>