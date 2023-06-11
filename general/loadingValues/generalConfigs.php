<?php
$baseUrl = "http://". $_SERVER['SERVER_NAME'] ."";
$ProjectName = "Finobe";
$downloadUrl = $baseUrl ."/downloadexample";
$CurrencyName = "Dius";
$CurrencyIcon = "" . $baseUrl . "/imgs/diu_16.png";
$allowedGameGenres = array('All', 'Featured', 'Original', 'Copies');
$errorPages = array($baseUrl . '/err?err=404', $baseUrl . '/err?err=500', $baseUrl . '/err?err=401');
$CurrPage = $_SERVER["REQUEST_URI"];

$DiscordJoin = "https://-----/----";
$Twitter = "https://-----/----";

$hostdb = "localhost";
$accdb = "root";
$passdb = "";
$namedb = "finobe";

$generaldb = new PDO("mysql:host=$hostdb;dbname=$namedb", $accdb, $passdb);
?>
