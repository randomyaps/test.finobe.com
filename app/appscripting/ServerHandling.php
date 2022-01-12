<?php
session_start();
//wtf????
//i was probably having a headache when i coded this
//because most of the redirects used a separate thingy and not the baseurl variable
//that i had set here before i made loadvls.php
//wtffffffff
$username = "";
$blurb = "Hi!";
$dius = "10";
$date = date("Y-m-d");
$fbtokenregister = "";
$fbtokenlogin = "";
$errors = array();
$DatabaseExtranetConnection = mysqli_connect($hostdb, $accdb, $passdb, $namedb) or header('Location: ' . $baseUrl . '/err.php?err=500');

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

if (isset($_POST['registerbtn'])) {
$username = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['name']));
$email = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['email']));
$email_2 = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['email_confirmation']));
$password = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['password']));
$password_2 = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['password_confirmation']));
$letters = strlen($username);

	if (empty($username)) {
		array_push($errors, "You cannot have a empty username!");
	}
	if (empty($password)) {
		array_push($errors, "Your password cannot be empty.");
	}
	if ($password !== $password_2) {
		array_push($errors, "The passwords dont match.");
	}
	
	if ($email !== $email_2) {
		array_push($errors, "The emails dont match.");
	}
	//ok now that we know everything is filled in,
	//lets check for anyone attempting special characters
    if (preg_match('/^[a-z0-9_]+$/i', $username) == 0) {
    array_push($errors, "Your username cannot have invalid characters.");
    }
	if (preg_match('/^[a-z_]+$/i', $password_2) == 0) {
    array_push($errors, "Password cannot have invalid characters.");
    }
	
	if ($letters > "16") {
	array_push($errors, "You cannot use more than 16 characters.");
	}
	
	$DoesUserExist = $DatabaseExtranetConnection->prepare("SELECT * FROM users WHERE username=?");
	$DoesUserExist->bind_param("s", $username);
	$DoesUserExist->execute();
	$result = $DoesUserExist->get_result();
	$UserExistResultation = $result->fetch_assoc();
	
	if ($UserExistResultation) {
		//uhoh something was found
		//check if username is the same
		if ($UserExistResultation['username'] == $username) {
			array_push($errors, "Name has been taken already.");
		}
	}
	//after all of those checks,
	//if nothing went wrong you shall be registered.
	if (count($errors) == "0") {
		//encrypt the password
		$EncryptPassword = password_hash($password_2, PASSWORD_DEFAULT);
		//finobe token
		$fbtokenregister = random_tkn();
		$ActuallyRegisterUser = $DatabaseExtranetConnection->prepare("INSERT INTO users (username, password, dius, blurb, date, finobetoken, email) 
			VALUES(?, ?, ?, ?, ?, ?, ?)");
		$ActuallyRegisterUser->bind_param("sssssss", $username, $EncryptPassword, $dius, $blurb, $date, $fbtokenregister, $email_2);
		$ActuallyRegisterUser->execute();
		setcookie("finobetoken", $fbtokenregister, time()+9900, "/", $_SERVER['SERVER_NAME']);
		$_SESSION['loginbanner'] = "1";
		header('Location: ' . $baseUrl . '/index.php');
	}
}

if (isset($_POST['loginbtn'])) {
	//begin the obtaining of the data
	$username = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['name']));
	$password = mysqli_real_escape_string($DatabaseExtranetConnection, strip_tags($_POST['password']));
	//usual checks
	if (empty($username)) {
		array_push($errors, "Username box is empty.");
	}
	if (empty($password)) {
		array_push($errors, "Password box is empty.");
	}
	
	if (preg_match('/^[a-z0-9_]+$/i', $username) == 0) {
    array_push($errors, "User does not exist.");
    }
	if (preg_match('/^[a-z0-9_]+$/i', $password) == 0) {
    array_push($errors, "User does not exist.");
    }
	
//ok now prepare funny password checking
    $LoginCheck = $DatabaseExtranetConnection->prepare("SELECT password, finobetoken FROM users WHERE username=?");
    $LoginCheck->bind_param("s", $username);
    $LoginCheck->execute();
    $LoginCheck->bind_result($rpassword, $fbtokenlogin);
    $LoginCheck->fetch();
    
    //done preparing, prepare actual login
		if (count($errors) == 0) {  
			if (!empty($rpassword)){
				if(password_verify($password,$rpassword)){
						setcookie("finobetoken", $fbtokenlogin, time()+9900, "/", $_SERVER['SERVER_NAME']);
						header('Location: ' . $baseUrl . '/index.php');
					}else{
						array_push($errors, "Your password isnt right!");
					}
			}else{
			array_push($errors, "User does not exist.");
		}
	}
}
?>
