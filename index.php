<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/loadvls.php'); ?>
<?php
	//oh shit our user is attempting to access a page that they are not supposed to see!!!
	header('Location: '. $baseUrl .'/err.php?err=404');
	die();
?>