<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
//code image retrieving and renders later
//for now return THE LOADER
echo(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/imgs/pending.gif'));
?>