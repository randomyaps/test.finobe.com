<?php
class User {
	public int $userId = 0;
	public ?string $userName = "User";
	public int $userDius = 0;
	public ?string $userRank = "user";
	public ?string $userBlurb = "temp";
	public ?string $userMessage = "temp";
	
    public function __construct(?string $finobeToken)
    {
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		if($finobeToken !== null){
			$userFetch = $generaldb->prepare("SELECT * FROM users WHERE token = :token");
			$userFetch->execute([":token" => $finobeToken]);
			$infoFetched = $userFetch->fetch(PDO::FETCH_ASSOC);
			if($infoFetched){
				$this->userId = (int)($infoFetched['id'] ?? null);
				$this->userName = ($infoFetched['name'] ?? null);
				$this->userDius = (int)($infoFetched['dius'] ?? null);
				$this->userRank = ($infoFetched['rank'] ?? null);
				$this->userBlurb = ($infoFetched['blurb'] ?? null);
				$this->userMessage = ($infoFetched['message'] ?? null);
			}else{
				if ($CurrPage !== "/app/logout.php"){
					die(header('Location: '. $baseUrl .'/app/logout.php'));
				}
			}
		}
    }
}
?>