<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/extraFunctions.php');
$userId = ($_GET['id'] ?? die(header('Location: '. $errorPages[0])));
$userData = fetchUser($userId);
if(!$userData){die(header('Location: '. $errorPages[0]));}
$userBlurb = str_replace("[dius]", '<img src="/imgs/diu_16.png" alt="Dius" title="Dius" class="img-responsive align-middle" width="16" height="16">' . $userData["dius"], $userData["blurb"]);
?>
<!DOCTYPE HTML>
<html>
<style>
		.nav-scroller.mb-3, .navbar.mb-3 {
			margin-bottom: 0rem !important;
		}

		.alert-padding {
			display: none;
		}

		.alert {
			margin-bottom: 0;
		}
		
		.home-main-content {
		    background: url(imgs/xmas_small.jpg) no-repeat center center;
		    background: url(imgs/xmas_small.jpg) no-repeat center center, -webkit-linear-gradient(top left, #312a6c, #852d91);
		    background: url(imgs/xmas_small.jpg) no-repeat center center, -moz-linear-gradient(top left, #312a6c, #852d91);
		    /*background: url(imgs/hallo.png) no-repeat center center;
		    background: url(imgs/hallo.png) no-repeat center center, -webkit-linear-gradient(top left, #312a6c, #852d91);
		    background: url(imgs/hallo.png) no-repeat center center, -moz-linear-gradient(top left, #312a6c, #852d91);*/
			background-size: cover;
			margin: 0;
			padding: 0;
			height: 300px;
			color: #ececec;
			display: flex;
		}

		.home-main-content > .container {
			display: flex;
			flex-direction: column;
			align-self: center;
		}
</style>
<body class="finobe-light">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   <div id="app">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
	<div id="profile">
	   <div class="card" style="top: 100px; left: 20%; width: 60%; height: 340px;">
		  <p></p>
		  <span style="position: relative; left: 37%; font-size: 1.5em;"><?php echo htmlspecialchars($userData["name"]); ?></span> 
		  <span style="position: relative; left: 37%; font-size: 1.1em;">Member</span> 
		  <span style="position: relative; left: 70%; font-size: 1.05em;"><b>Blurb:</b></span> 
		  <span style="position: relative; left: 70%; font-size: 1em; width: 250px;"><?php echo $userBlurb; ?></span> 
		  <span style="position: relative; left: 37%; font-size: 1em;"><b>Friends:</b>  0 </span> 
		  <span style="position: relative; left: 37%; font-size: 1em;"><b>Join Date:</b> <?php echo date("M jS, Y", strtotime($userData["date"])); ?></span> 
		  <span style="position: relative; top: -43%;"><img src="" style="position: relative; left: 3%; width: 300px; height: 300px;" width="300" height="300"></span>
	   </div>
	   <div display:="" none="" class="card" style="top: 150px; left: 20%; width: 28%; height: 150px;">
		  <p style="text-align: center; position: relative; top: 22.5px;">Friends </p>
		  <hr>
		  <p align="center">No friends. What a party-pooper.</p>
	   </div>
	   <div display:="" none="" class="card" style="top: 0px; left: 52%; width: 28%; height: 150px;">
		  <p style="text-align: left; left: 5%; position: relative; top: 22.5px;">Places</p>
		  <hr>
		  <p align="center">This user has no active places.</p>
	   </div>
	</div>
   </div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>

