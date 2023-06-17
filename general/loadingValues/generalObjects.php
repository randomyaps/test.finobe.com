<?php
class User {
	public int $userId = 0;
	public ?string $userName = "User";
	public int $userDius = 0;
	public ?string $userRank = "user";
	public ?string $userBlurb = "temp";
	public ?string $userMessage = null;
	
    public function __construct(?string $finobeToken=null)
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
				if ($CurrPage !== "/app/logout"){
					die(header('Location: '. $baseUrl .'/app/logout'));
				}
			}
		}
		return $this;
    }
	
	public function createnew(?string $userName, ?string $eMail, ?string $passWord, ?string $userToken){
		include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
		if(!filter_var($eMail, FILTER_VALIDATE_EMAIL)){return null;}
		$encrPassword = password_hash($passWord, PASSWORD_DEFAULT);
		$newUser = $generaldb->prepare("INSERT INTO users (name, email, password, rank, message, dius, blurb, date, token) VALUES(?,?,?,'user',NULL,'10','new to finoob.',?,?)")->execute([$userName, $eMail, $encrPassword, date("Y-m-d"), $userToken]);
	}
}
?>