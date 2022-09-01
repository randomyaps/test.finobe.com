<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
include($_SERVER['DOCUMENT_ROOT'] . '/general/extraFunctions.php');
$gameGet = ($_GET['genreType'] ?? null);
switch(true){case (!in_array($gameGet, $allowedGameGenres)):$gameGet = "All";break;}
$gamesFetched = fetchGames($gameGet);
switch (true){
	case ($gamesFetched):
		foreach($gamesFetched as $gameInfo){
			echo "<div class='col-lg-2 mb-4' onclick='goPlace(". $gameInfo["id"] .")'>
			<div class='game-card h-100 video-card'>
			<span class='thumbnail'>
			<img src='". $baseUrl ."/app/gethumb.php?id=". $gameInfo['id'] ."&asset=game'  class='card-img-top'>
			<div style='position: absolute; top: -3px;'><span class='badge badge-danger badge-notification'>". $gameInfo['version'] ."</span></div>
			<!--<span class='badge badge-success badge-notification'>Online</span></div>-->
			</span>
			<span class='data py-2 px-2 d-flex flex-column'>
			<span class='catalog-no-overflow-plz' style='font-size: 15px;'>". $gameInfo['title'] ."</span>
			<span class='author text-muted' style='font-size: 13px;'>by ". $gameInfo['creatorname'] ."</span>
			<span class='catalog-no-overflow-plz text-muted'>". $gameInfo['playing'] ." playing</span> 
			</span>
			</div>
			</div>";
		}
		break;
	default:
		echo "<p align='center'>There are no games! 这真是令人难以置信的悲哀。</p>";
		break;
}
?>