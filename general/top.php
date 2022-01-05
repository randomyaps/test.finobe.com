<?php
//hi!!!
//we set variables here because this loads at the first Moment that Page is loaded!!!!!!!!!
$baseUrl = "http://". $_SERVER['SERVER_NAME'] ."";
$ProjectName = "Finobe";
$DiscordJoin = "https://discord.gg/yourmom";
$Twitter = "https://twitter.com/yourmom";
echo "<title>". $ProjectName ."</title>
<link rel='stylesheet' href='". $baseUrl ."/css/app.css'>
<link rel='stylesheet' href='https://use.typekit.net/bzr7dxi.css'>";
//embed!!!!
echo "
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<meta name='csrf-token' content='UoWWdpkURTTM6O5NFqC8YmUD3tQykALzti6x44z2'>
<meta name='og:title' content='". $ProjectName ."'>
<meta name='author' content='". $ProjectName ."'>
<meta name='description' content='". $ProjectName .", it is website. He is for old brick-builder. Good for use.'>
<meta name='og:description' content='". $ProjectName .", it is website. He is for old brick-builder. Good for use.'>
<meta name='og:site_name' content='". $ProjectName ."'>";
?>