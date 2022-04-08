<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/loadvls.php'); ?>
<?php
//incase of any errors regarding HTTP access,
//modify baseurl http to https.
$baseUrl = "http://". $_SERVER['SERVER_NAME'] ."";
$ProjectName = "Finobe";
$downloadUrl = "". $baseUrl ."/downloadexample";
$CurrencyName = "Dius";
$CurrencyIcon = "" . $baseUrl . "/imgs/diu_16.png";
//THE NEXT FOLLOWING VARIABLES ARE EXAMPLES
//I DO NOT CONDONE ANY ACTS DONE BY THE FOLLOWING TWITTER ACCOUNT OR DISCORD SERVER.
//disclaimer was added because a tester found out that yourmom redirects to a 18+ server
$DiscordJoin = "https://discord.gg/yourmom";
$Twitter = "https://twitter.com/yourmom";
//for easier modification, DB variables have been added, edit them here and you should be
//all set-up!
$hostdb = "localhost";
$accdb = "root";
$passdb = "yourmom";
$namedb = "finobe";
?>
