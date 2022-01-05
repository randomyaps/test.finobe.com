<?php
if (isset($_COOKIE['finobetoken'])) {
	$FinobeToken = $_COOKIE['finobetoken'];
} else {
	$FinobeToken = null;
}

$generaldb = mysqli_connect('localhost', 'root', 'yourmom', 'finobe') or header('location: http://' . $_SERVER['SERVER_NAME'] . '/error.php?err=404');

$infofetch = $generaldb->prepare("SELECT dius, banned, bannedreason, warn, username, role, id FROM users WHERE fbtoken = ?");
$infofetch->bind_param("s", $FinobeToken);
$infofetch->execute();
$infofetch->bind_result($dius, $banned, $reason, $warn, $username, $role, $id);
$infofetch->fetch();

if ($role == "admin"){
	//AYOOOO ADMIN PANEL?????
	//FBOKTA?????? REAL??????????????
	$headeradminpanel = "<li class='nav-item'><a href='". $baseUrl ."/app/okta/admin' class='nav-link'>Admin</a></li>";
}else{
	$headeradminpanel = "";
}

if ($FinobeToken !== null){
	if ($id !== null) {
		echo "<nav class='navbar navbar-expand-lg navbar-light  bg-faded navbar-static-top mb-3'>
	   <div class='container'>
		  <a href='". $baseUrl ."/' class='navbar-brand'><img src='imgs/logo.png' alt='". $ProjectName ."' class='navbar-brandimg d-inline-block mr-2' style='width: auto;'>". $ProjectName ."</a> <button type='button' data-toggle='collapse' data-target='#navbar-collapse' aria-controls='navbar-collapse' aria-expanded='false' aria-label='Toggle navigation' class='navbar-toggler navbar-toggler-right'><span class='navbar-toggler-icon'></span></button> 
		  <div id='navbar-collapse' class='collapse navbar-collapse'>
			 <ul class='nav navbar-nav mr-auto'>
				<li class='nav-item'><a href='". $baseUrl ."/user?id=". $id ."' class='nav-link'>Profile</a></li>
				<li class='nav-item'><a href='". $baseUrl ."/places' class='nav-link'>Games</a></li>
				<li class='nav-item'><a href='". $baseUrl ."/catalog' class='nav-link'>Catalog</a></li>
				<li class='nav-item'><a href='". $baseUrl ."/forum' class='nav-link'>Forum</a></li>
				<li class='nav-item'><a href='". $baseUrl ."/groups' class='nav-link'>Groups</a></li>
				<li class='nav-item'><a href='". $baseUrl ."/users' class='nav-link'>Users</a></li>
				<li class='nav-item'><a href='". $baseUrl ."/blog' class='nav-link'>Blog</a></li>
				". $headeradminpanel ."
				<li class='nav-item dropdown'>
				   <a href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' class='nav-link dropdown-toggle'><strong>More</strong></a> 
				   <div class='navbar-nobelium-dropdown dropdown-menu'><a href='". $baseUrl ."/wiki/' class='dropdown-item'>Blog</a> <a href='". $baseUrl ."/videos' class='dropdown-item'>Discord</a></div>
				</li>
			 </ul>
			 <ul class='nav navbar-nav my-2 my-lg-0'>
				<li class='nav-item'><a href='". $baseUrl ."/app/inbox' class='nav-link'><i aria-hidden='true' class='far align-middle fa-envelope mr-1'></i></a></li>
				<li class='nav-item dropdown dropdown-notifications'>
				   <a href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' class='nav-link dropdown-toggle'><i aria-hidden='true' class='far fa-bell align-middle mr-1'></i> <span class='caret'></span></a> 
				   <div class='dropdown-menu dropdown-menu-right'>
					  <div class='dropdown-header'><span class='align-middle'>Messages</span></div>
					  <div class='dropdown-divider'></div>
					  <div class='navbar-notification-list'><a data-notify-id='196905' href='#' class='notification-title notification-link dropdown-item'><i aria-hidden='true' class='far fa-envelope align-center fa-fw'></i> TestMsgPreview</a></div>
				   </div>
				</li>
				<li class='nav-item dropdown'>
				   <a href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' class='nav-link dropdown-toggle'><i aria-hidden='true' class='fas fa-users align-middle'></i> <span>&nbsp;</span></a> 
				   <div class='navbar-nobelium-dropdown dropdown-menu dropdown-menu-right'><a href='". $baseUrl ."/app/inbox' class='dropdown-item'>
					  Messages																	</a> <a href='". $baseUrl ."/app/friends' class='dropdown-item'>Friends</a>
				   </div>
				</li>
				<li data-animation='false' data-toggle='tooltip' data-placement='bottom' title='' class='nav-item nav-link n-money-text' data-original-title='". $dius ." Dius'><a><img src='imgs/dius.svg' alt='Dius' title='Dius' class='img-responsive align-middle' width='20' height='20'> ". $dius ."</a></li>
				<li class='nav-item dropdown'>
				   <a href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' class='nav-link dropdown-toggle'><i aria-hidden='true' class='far align-middle fa-user mr-1'></i> ". $username ." <span class='caret'></span></a> 
				   <div class='navbar-nobelium-dropdown dropdown-menu dropdown-menu-right'><a href='". $baseUrl ."/create' class='dropdown-item'><i aria-hidden='true' class='fas fa-fw fa-plus align-middle mr-1'></i> Create</a> <a href='". $baseUrl ."/character' class='dropdown-item'><i aria-hidden='true' class='fas fa-fw fa-user align-middle mr-1'></i> Character</a> <a href='". $baseUrl ."/app/settings' class='dropdown-item'><i aria-hidden='true' class='fas fa-fw fa-wrench align-middle mr-1'></i> Settings</a> <a href='". $baseUrl ."/app/logout' class='dropdown-item'><i aria-hidden='true' class='fas fa-fw fa-sign-out-alt align-middle mr-1'></i> Logout</a></div>
				</li>
			 </ul>
		  </div>
	   </div>
	</nav>";
		if(isset($_COOKIE['loginbanner'])){
			setcookie("loginbanner", "", time() - 3600, "/", $baseUrl, 1);
			echo "<div class='alert alert-danger text-center'>Logged in successfully.</div>";
		}
		
	//separating these two cause it might cause confusion for Php Developers that are looking at code
	}else{
		//id check is needed, because What if people break Site by putting Random Finobe Token
		die('Token Error. <a href="'. $baseUrl .'/app/logout">Logout</a> and login again.');
	}
} else {
	echo "<nav class='navbar navbar-expand-lg navbar-light  bg-faded navbar-static-top mb-3'>
   <div class='container'>
      <a href='". $baseUrl ."/' class='navbar-brand'><img src='imgs/logo.png' alt='". $ProjectName ."' class='navbar-brandimg d-inline-block mr-2' style='width: auto;'>". $ProjectName ."</a> <button type='button' data-toggle='collapse' data-target='#navbar-collapse' aria-controls='navbar-collapse' aria-expanded='false' aria-label='Toggle navigation' class='navbar-toggler navbar-toggler-right'><span class='navbar-toggler-icon'></span></button> 
      <div id='navbar-collapse' class='collapse navbar-collapse'>
         <ul class='nav navbar-nav mr-auto'></ul>
         <ul class='nav navbar-nav my-2 my-lg-0'>
            <li class='nav-item'><a href='". $baseUrl ."/app/login' class='nav-link'>Login</a></li>
            <li class='nav-item'>
               <div></div>
               <div class='us'><a href='". $baseUrl ."/app/register' class='nav-link'>Register</a></div>
            </li>
         </ul>
      </div>
   </div>
</nav>";
}
?>
