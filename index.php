<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/loadvls.php'); ?>
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
		    background: url(img/xmas_small.jpg) no-repeat center center;
		    background: url(img/xmas_small.jpg) no-repeat center center, -webkit-linear-gradient(top left, #312a6c, #852d91);
		    background: url(img/xmas_small.jpg) no-repeat center center, -moz-linear-gradient(top left, #312a6c, #852d91);
		    /*background: url(img/hallo.png) no-repeat center center;
		    background: url(img/hallo.png) no-repeat center center, -webkit-linear-gradient(top left, #312a6c, #852d91);
		    background: url(img/hallo.png) no-repeat center center, -moz-linear-gradient(top left, #312a6c, #852d91);*/
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
	  <?php
	  if (isset($_SESSION['loginbanner'])) {
		  echo "
		  <div class='text-center alert alert-success' role='alert'>
			   <div class='container'>
				  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
				  Successfully logged in.
			   </div>
			</div>";
		unset($_SESSION['loginbanner']);
	  }
	  ?>
      <div class="home-main-content">
<?php 
if (!isset($_COOKIE['finobetoken'])) {
	echo "
	<div class='container d-flex justify-content-center'>
            <h1 class='mb-4 home-text'>We do what ". $ProjectName ." does</h1>
            <p class='home-text'>". $ProjectName ." puts games on your not-phone.</p>
            <p>
               <a href='". $baseUrl ."/app/register' class='btn btn-primary btn-lg mt-3 mr-2'>Get started &rsaquo;</a>
            </p>
         </div>";
} else {
	echo "
	<div class='container d-flex justify-content-center'>
            <h1 class='mb-4 home-text'>Hi there, ". $username ."</h1>
            <p>
               <a href='". $baseUrl ."/places.php' class='btn btn-success btn-lg mt-3 mr-2'>join a game &rsaquo;</a>
            </p>
    </div>";
}
?>
      </div>
      <div class="container mt-4">
         <div class="row">
            <div class="col-sm-6 mb-2">
               <a href="<?php echo $DiscordJoin; ?>" class="catalog-card">
                  <div class="card">
                     <div class="card-body">
                        <h3><img style="max-width:30px;max-height:30px" class="img-inline align-middle mr-1" src="<?php echo $baseUrl; ?>/imgs/discordsvg.svg"> Discord</h3>
                        <p class="text-muted mb-0">Join our Discord server and talk to people in our community!</p>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-sm-6 mb-2">
               <a href="<?php echo $Twitter; ?>" class="catalog-card">
                  <div class="card">
                     <div class="card-body">
                        <h3><img style="max-width:30px;max-height:30px" class="img-inline align-middle mr-1" src="<?php echo $baseUrl; ?>/imgs/twittersvg.svg"> Twitter</h3>
                        <p class="text-muted mb-0">We tweet whenever we post a video, and may even hint at some upcoming events on our Twitter.</p>
                     </div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>

