<!DOCTYPE HTML>
<html>
<?php
if (isset($_COOKIE['finobetoken'])) {
	//oh shit our user is attempting to access a page that they are only supposed to see when they are not logged in!!!!
	header('Location: '. $baseUrl .'/index.php');
	die();
}
?>
<body class="finobe-light">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   <div id="app">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="card">
                     <div class="card-header">
                        Register                    
                     </div>
                     <div class="card-body text-center">
                        <img src="<?php echo $baseUrl; ?>/imgs/finobesvg.svg" class="mb-4" style="max-width:75px">
                        <h4>Welcome to <?php echo $ProjectName; ?>!</h4>
                        <p class="mb-1">Remember to read our <a href="<?php echo $baseUrl; ?>/legal/rules/">rules</a> and <a href="<?php echo $baseUrl; ?>/legal/terms/">terms of service</a> first.</p>
                        Now, a question before we start: <strong>Are you 13 years of age or older?</strong>
                        <p></p>
                        <p class="mt-4">
                           <a href="https://google.com" class="btn btn-danger mr-1" style="text-transform:none">no, I'm not 13+</a>
                           <a href="<?php echo $baseUrl; ?>/app/formregister.php" class="btn btn-primary" style="text-transform:none">yes, I'm 13 or older</a>
                        </p>
                        </class="mb-1">
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>

