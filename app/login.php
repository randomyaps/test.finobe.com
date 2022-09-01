<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
include($_SERVER['DOCUMENT_ROOT'] . '/app/appscripting/ServerHandling.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
switch(true){ case($FinobeToken):die(header('Location: '. $baseUrl));break;}
?>
<html>
	<body class="finobe-light">
	<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
		<div id="app" class="container-fluid">
			<?php include($_SERVER['DOCUMENT_ROOT'] . '/app/appscripting/GetError.php');?>
		   <div class="row d-flex flex-column justify-content-center align-items-center mh-100vh">
			  <form method="post" class="col-sm-8 col-md-6 col-lg-4 py-5 align-items-center justify-content-center d-flex flex-column" action="<?php echo $CurrPage; ?>">
				 <input type="hidden" name="_token" value="tFFnDRGRMY1SLyimGUjoZt1ik7Ut9AFbIp4oQheP"> 
				 <div class="form-group text-center">
				 <div><img src="<?php echo $baseUrl; ?>/imgs/finobesvg.svg" alt="<?php echo $ProjectName; ?>" class="img-fluid login__logo-img"></div>
					<h2 class="my-3">Login</h2>
				 </div>
				 <div class="form-group w-75">
				 <label for="login">Username</label> 
				 <input id="name" type="text" name="name" required="required" autofocus="autofocus" class="form-control" autocomplete="off">
				 </div>
				 <div class="form-group w-75">
				 <label for="password">Password</label> 
				 <input id="password" type="password" name="password" required="required" class="form-control" autocomplete="off">
				 </div>
				 <div class="form-group d-flex justify-content-between align-items-start w-75"><button type="submit" class="btn btn-primary flex-grow-1 mr-2" name="loginbtn">Login</button> 
				 <a href="<?php echo $baseUrl; ?>" class="btn btn-light border flex-grow-2 ml-2">go back</a>
				 </div>
			  </form>
		   </div>
		</div>
	</body>
</html>
