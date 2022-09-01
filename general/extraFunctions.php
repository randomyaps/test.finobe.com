<?php

	function fetchGames($Genre){
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		switch(true){
			case (in_array($Genre, $allowedGameGenres)):
				$fetchInfo = $generaldb->prepare("SELECT * FROM assets WHERE genre = :genre AND assetype = 'place' AND approved = '1' ORDER BY id DESC");
				$fetchInfo->execute([':genre' => $Genre]);
				break;
			default:
				$fetchInfo = $generaldb->prepare("SELECT * FROM assets WHERE assetype = 'place' AND approved = '1' ORDER BY id DESC");
				$fetchInfo->execute();
				break;
		}
		$fetchResults = $fetchInfo->fetchAll();
		return $fetchResults;
	}
	
	function fetchAsset($id, $type){
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		$Sanitized = (int)($id ?? 0);
		switch(true){
			case (preg_match('/^[a-z0-9_]+$/i', $type) == 0):
				return array();
				break;
			default:
				$fetchInfo = $generaldb->prepare("SELECT * FROM assets WHERE assetype = :asset AND approved = '1' AND id = :id");
				$fetchInfo->execute([':asset' => $type, ':id' => $Sanitized]);
				break;
		}
		$fetchResults = $fetchInfo->fetchAll();
		return $fetchResults[0];
	}

	function random_tkn(
		int $length = 64,
		string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	): string {
		if ($length < 1) {
			throw new \RangeException("Length must be a positive integer");
		}
		$pieces = [];
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$pieces []= $keyspace[random_int(0, $max)];
		}
		return implode('', $pieces);
	}

?>