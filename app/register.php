<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
switch(true){ case($FinobeToken):die(header('Location: '. $baseUrl));break;}
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
                           <a href="<?php echo $baseUrl; ?>/app/formregister" class="btn btn-primary" style="text-transform:none">yes, I'm 13 or older</a>
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

