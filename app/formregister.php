<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
include($_SERVER['DOCUMENT_ROOT'] . '/app/appscripting/ServerHandling.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
switch(true){case($FinobeToken):die(header('Location: '. $baseUrl));break;}
?>
<!DOCTYPE HTML>
<html>
<body class="finobe-light">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   <div id="app">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
				  <br></br>
<?php
	switch(true){
		case (count($errors) > 0):
			foreach($errors as $message){
				echo "<div class='alert alert-danger text-center'>". $message ."</div>"; 
			}
			break;
	}
?>
                  <div class="alert alert-warning rounded text-center">
                     We don't care what password you use, just make it unique.
                  </div>
                  <div class="card">
                     <div class="card-header">
                        Register
                     </div>
                     <div class="card-body">
						<form method="post" action="<?php echo $CurrPage; ?>">
                           <div class="form-group row">
                              <label for="name" class="col-md-3 col-form-label text-md-right">Username</label>
                              <div class="col-md-9">
                                 <input type="text" class="form-control" id="name" name="name" required="" autofocus="">
                                 <small id="nameHelp" class="form-text text-muted">Use a username that conforms to our rules.</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                              <div class="col-md-9">
                                 <input type="email" class="form-control" id="email" name="email" required="">
                                 <small id="emailHelp" class="form-text text-muted">You'll need to verify your email - give us a valid one.</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
                              <div class="col-md-9">
                                 <input type="password" class="form-control" id="password" name="password" required="">
                                 <small id="nameHelp" class="form-text text-muted">Passwords should be 6 or more characters.</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="password_confirmation" class="col-md-3 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-9">
                                 <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="">
								 <small id="passwordHelp" class="form-text text-muted">We don't like email confirmation fields, but we don't like typos even more.</small>
                              </div>
                           </div>
                           <p class="text-center">By creating an account, <b>you agree to our <a href="<?php echo $baseUrl; ?>/legal/terms">terms of service</a>, <a href="<?php echo $baseUrl; ?>/legal/rules">rules</a>, and <a href="<?php echo $baseUrl; ?>/legal/privacy">privacy policy</a>.</b></p>
                           <div class="form-group">
                              <center><button type="submit" name="registerbtn" class="btn btn-primary" style="text-transform:none">Register</button></center>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>