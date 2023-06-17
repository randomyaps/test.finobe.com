<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/extraFunctions.php');
$userRank = '<strong class="text-primary">Member</strong>';
$userId = ($_GET['id'] ?? die(header('Location: '. $errorPages[0])));
$userData = fetchUser($userId);
if(!$userData){die(header('Location: '. $errorPages[0]));}
$userBlurb = str_replace("[dius]", '<img src="/imgs/diu_16.png" alt="Dius" title="Dius" class="img-responsive align-middle" width="16" height="16">' . $userData["dius"], htmlspecialchars($userData["blurb"]));
if($userData['rank'] == "admin"){$userRank = '<strong class="text-danger">Admin</strong>';}
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
<!--Kindly donated to me by era/philosophy. Thanks!!!-->
<body class="finobe-light">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
	<div id="app">
	<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
	   <div class="container mt-3">
		  <div class="card mb-4">
			 <div class="card-body">
				<div class="row">
				   <div class="col-md-4"><img src="/app/gethumb?id=<?php echo $userId; ?>&asset=user" class="img-fluid my-2" style="display: block; max-height: 325px; max-width: 325px; margin: 0px auto;"></div>
				   <div class="col-md-8">
					  <div class="row">
						 <div class="col-md-6">
							<h3><?php echo htmlspecialchars($userData["name"]); ?></h3>
							<div class="mb-xs-2 mb-md-5">
							   <p class="mb-0"><?php echo $userRank; ?></p>
							</div>
							<p><b>Friends: </b>7 <a href="#">(View ›)</a></p>
							<p><b>Join Date: </b><?php echo date("M jS, Y", strtotime($userData["date"])); ?></p>
						 </div>
						 <div class="col-md-6 blurb-quote-col">
							<p><strong>Blurb:</strong></p>
							<blockquote class="blockquote blurb-quote"><?php echo $userBlurb; ?></blockquote>
						 </div>
						 <div class="row">
							<div class="col-sm-12 mt-4"><br><br> <a href="/app/messageplayer?to=1" class="btn btn-theme mr-1">Send Message</a> <a href="#" class="btn btn-theme mr-1 disabled">Trade</a> <a href="#" id="friend-send" data-user-id="139331" class="btn btn-raised btn-primary disabled">Send Friend Request</a></div>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="row">
			 <div class="col-md-5">
				<div class="card mb-4">
				   <div class="card-header text-center">Friends <a href="/user/1/friends">(All ›)</a></div>
				   <div class="card-body">
					  <div class="row">
						 <div class="col-md-4 text-center">
							<a href="/user/3">
							   <img src="philosophy%20-%20Squared_files/3.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">acroarson</p>
							</a>
						 </div>
						 <div class="col-md-4 text-center">
							<a href="/user/5">
							   <img src="philosophy%20-%20Squared_files/5.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">pinzit</p>
							</a>
						 </div>
						 <div class="col-md-4 text-center">
							<a href="/user/113">
							   <img src="philosophy%20-%20Squared_files/113.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">Humanoider</p>
							</a>
						 </div>
						 <div class="col-md-4 text-center">
							<a href="/user/51">
							   <img src="philosophy%20-%20Squared_files/51.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">Indy</p>
							</a>
						 </div>
						 <div class="col-md-4 text-center">
							<a href="/user/295">
							   <img src="philosophy%20-%20Squared_files/295.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">muse</p>
							</a>
						 </div>
						 <div class="col-md-4 text-center">
							<a href="/user/39">
							   <img src="philosophy%20-%20Squared_files/39.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">Yap</p>
							</a>
						 </div>
						 <div class="col-md-4 text-center">
							<a href="/user/136">
							   <img src="philosophy%20-%20Squared_files/136.htm" class="img-fluid" style="max-width: 60px;"> 
							   <p class="mt-2 mb-0">MrSebas2005</p>
							</a>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
			 <div class="col-md-7">
				<div class="card mb-4">
				   <div class="card-header">Places</div>
				   <div class="card-body">
					  <div id="pills-tabContent" class="tab-content">
						 <div id="user-tab-places" role="tabpanel" aria-labelledby="pills-places-tab" class="tab-pane show active">
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place1" role="button" aria-expanded="false" aria-controls="place1" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   Fencing</a> 
							   <div id="place1" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">Fencing</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/unknown.png" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place7" role="button" aria-expanded="false" aria-controls="place7" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   NDS 2016</a> 
							   <div id="place7" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">NDS 2016</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png.json" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place8" role="button" aria-expanded="false" aria-controls="place8" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   The ADIO Skatepark</a> 
							   <div id="place8" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">The ADIO Skatepark</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place9" role="button" aria-expanded="false" aria-controls="place9" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   Paintball!</a> 
							   <div id="place9" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">Paintball!</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/e32523d5cb11b85b9f81e28b54799fbd.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place10" role="button" aria-expanded="false" aria-controls="place10" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   Flood Escape</a> 
							   <div id="place10" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">Flood Escape</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/3b5278c4aee7ba314c7af37d4279c02c.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place11" role="button" aria-expanded="false" aria-controls="place11" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   NDS 2013</a> 
							   <div id="place11" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">NDS 2013</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png.json" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place13" role="button" aria-expanded="false" aria-controls="place13" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   no</a> 
							   <div id="place13" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">no</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png.png" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place14" role="button" aria-expanded="false" aria-controls="place14" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   OBBY FOR SUCC</a> 
							   <div id="place14" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">OBBY FOR SUCC</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png_004.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place15" role="button" aria-expanded="false" aria-controls="place15" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   Drunk Cafe</a> 
							   <div id="place15" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">Drunk Cafe</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/EQmCVFLX0AsZ92O.jpg" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place17" role="button" aria-expanded="false" aria-controls="place17" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   Make a Cake And Feed the Giant Noob</a> 
							   <div id="place17" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">Make a Cake And Feed the Giant Noob</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png_003.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place18" role="button" aria-expanded="false" aria-controls="place18" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   The Normal Elevator</a> 
							   <div id="place18" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">The Normal Elevator</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png_005.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place19" role="button" aria-expanded="false" aria-controls="place19" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   Disaster Hotel</a> 
							   <div id="place19" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">Disaster Hotel</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Png_002.htm" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="user-place mb-2">
							   <a data-toggle="collapse" href="#place20" role="button" aria-expanded="false" aria-controls="place20" class="btn btn-primary text-left btn-sm btn-block" style="text-transform: none;">
							   2012 testing</a> 
							   <div id="place20" class="collapse">
								  <div class="card card-body">
									 <div class="text-center">
										<p><a href="#">2012 testing</a></p>
										<a href="#"><img src="philosophy%20-%20Squared_files/Old-Google-Logo.jpg" alt="" class="mb-4 place-thumbnail-small"></a> 
										<div data-v-152bd39d="" class="w-100">
										   <div data-v-152bd39d=""><a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>Play</a></div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
						 </div>
						 <div id="servers" role="tabpanel" aria-labelledby="pills-servers-tab" class="tab-pane">
							This user doesn't have any servers available.
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</body></html>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>

