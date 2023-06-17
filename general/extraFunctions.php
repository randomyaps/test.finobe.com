<?php

	function fetchGames($Genre="All",int $pageNum=0,int $perPage=10){
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		$generaldb->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
		switch(true){
			case (in_array($Genre, $allowedGameGenres)):
				$fetchInfo = $generaldb->prepare("SELECT * FROM assets WHERE genre = :genre AND assetype = 'place' AND approved = '1' ORDER BY id DESC LIMIT :pageNum, :perPage");
				$fetchInfo->execute([':genre' => $Genre, ':pageNum' => $pageNum, ':perPage' => $perPage]);
				
				$fetchPages = $generaldb->prepare("SELECT count(*) FROM assets WHERE genre = :genre AND assetype = 'place' AND approved = '1'"); 
				$fetchPages->execute([':genre' => $Genre]); 
				$totalRows = $fetchPages->fetchColumn(); 
				$totalPages = ceil($totalRows / $perPage);
				break;
			default:
				$fetchInfo = $generaldb->prepare("SELECT * FROM assets WHERE assetype = 'place' AND approved = '1' ORDER BY id DESC LIMIT :pageNum, :perPage");
				$fetchInfo->execute([':pageNum' => $pageNum, ':perPage' => $perPage]);
				
				$fetchPages = $generaldb->prepare("SELECT count(*) FROM assets WHERE assetype = 'place' AND approved = '1'"); 
				$fetchPages->execute(); 
				$totalRows = $fetchPages->fetchColumn(); 
				$totalPages = ceil($totalRows / $perPage);
				break;
		}
		$fetchResults = $fetchInfo->fetchAll();
		$fetchResults = [
			"totalData" => $fetchInfo->fetchAll(),
			"totalRows" => $totalRows,
			"totalPages" => $totalPages
		];
		return $fetchResults;
	}
	
	function fetchAsset(int $id, $type){
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		switch(true){
			case (preg_match('/^[a-z0-9_]+$/i', $type) == 0):
				return array();
				break;
			default:
				$fetchInfo = $generaldb->prepare("SELECT * FROM assets WHERE assetype = :asset AND approved = '1' AND id = :id");
				$fetchInfo->execute([':asset' => $type, ':id' => $id]);
				break;
		}
		$fetchResults = $fetchInfo->fetchAll();
		return $fetchResults[0];
	}

	function fetchUser(int $id=0){
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		$fetchInfo = $generaldb->prepare("SELECT * FROM users WHERE id = :id");
		$fetchInfo->execute([':id' => $id]);
		$fetchResults = $fetchInfo->fetchAll();
		if (!$fetchResults){
			return array();
		}else{
			return $fetchResults[0];
		}
	}

	function random_tkn(int $length = 64,string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): 
	string {
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