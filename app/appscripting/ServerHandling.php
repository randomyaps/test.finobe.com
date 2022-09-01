<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
include($_SERVER['DOCUMENT_ROOT'] . '/general/extraFunctions.php');
session_start();
$errors = array();
$date = date("Y-m-d");

switch(true){
	case (isset($_POST['loginbtn'])):
		$username = strip_tags($_POST['name']);
		$password = strip_tags($_POST['password']);
		
		switch(true){case (empty($username)):array_push($errors, "Username box is empty.");break;}
		switch(true){case (empty($username)):array_push($errors, "Password box is empty.");break;}
		switch(true){case (preg_match('/^[a-z0-9_]+$/i', $username) == 0):array_push($errors, "User does not exist.");break;}
		switch(true){case (preg_match('/^[a-z0-9_]+$/i', $password) == 0):array_push($errors, "User does not exist.");break;}
		
		switch(true){
			case (count($errors) == 0):
				$loggon = $generaldb->prepare("SELECT password, token FROM users WHERE name = :username");
				$loggon->execute([':username' => $username]);
				$results = $loggon->fetch(PDO::FETCH_ASSOC);
				$checkpsw = ($results['password'] ?? null);
				$token = ($results['token'] ?? null);
			
				switch(true){
					case (!empty($checkpsw)):
						switch(true){
							case (password_verify($password,$checkpsw)):
								setcookie("FinobesiToken", $token, time()+9900, "/", $_SERVER['SERVER_NAME']);
								header("Location: ". $baseUrl);
								die();
								break;
							default:
								array_push($errors, "Your password is incorrect.");
								break;
						}
						break;
					default:
						array_push($errors, "This account does not exist.");
						break;
				}
				break;
		}
		break;
	case (isset($_POST['registerbtn'])):
		$username = strip_tags($_POST['name']);
		$password = strip_tags($_POST['password']);
		$password2 = strip_tags($_POST['password_confirmation']);
		$email = strip_tags($_POST['email']);
		$token = random_tkn();
		
		switch(true){
			case (empty($username)):
				array_push($errors, "Username box is empty.");
				break;
			default:
				switch(true){case (preg_match('/^[a-z0-9_]+$/i', $username) == 0):array_push($errors, "Your username cannot have invalid characters.");break;}
				switch(true){case(strlen($username) > 20):array_push($errors, "Name cannot be longer than 20 characters.");break;}
				break;
		}
		switch(true){
			case (empty($password)):
				array_push($errors, "Password box is empty.");
				break;
			default:
				switch(true){case (preg_match('/^[a-z0-9_]+$/i', $password) == 0):array_push($errors, "Password cannot have invalid characters.");break;}
				switch(true){case ($password !== $password2):array_push($errors, "Passwords dont match.");break;}
				switch(true){case(strlen($password) > 20):array_push($errors, "Password cannot be longer than 20 characters.");break;}
				break;
		}
		switch(true){
			case (empty($email)):
				array_push($errors, "Email box is empty.");
				break;
			default:
				switch(true){case (!filter_var($email, FILTER_VALIDATE_EMAIL)):array_push($errors, "Invalid email.");break;}
				break;
		}
		
		//UEC User Exist Check
		$UEC = $generaldb->prepare("SELECT * FROM users WHERE name = :username");
		$UEC->execute([':username' => $username]);
		$Row = $UEC->fetch(PDO::FETCH_ASSOC);
		switch(true){case ($Row):array_push($errors, "User already exists.");break;}
		
		switch(true){
			case (count($errors) == 0):
				$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
				$InsertToDB = $generaldb->prepare("INSERT INTO users (name, email, password, rank, message, dius, blurb, date, token) VALUES(?,?,?,'user',NULL,'10','new to finoob.',?,?)")->execute([$username, $email, $hashedpassword, $date, $token]);
				setcookie("FinobesiToken", $token, time()+9900, "/", $_SERVER['SERVER_NAME']);
				header("Location: ". $baseUrl);
				die();
				break;
		}
		break;
}
?>
