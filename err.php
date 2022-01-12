<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/loadvls.php'); ?>
<?php
if(isset($_GET['err'])){
   //we got an error incoming...
   $err = strip_tags($_GET['err']);
}else{
   //no error? then default to 404
   $err = "404";
}

//no XSS.
//number 1 priority.
if(preg_match('/^\d+$/', $err) == 0){
   $err = "404";
}

$existerrors = array('500', '404');
if (!in_array($err, $existerrors)){
   $err = "404";
}

if ($err == "500"){
   //no funny chinese because this error is critical and both user
   //and webhoster should be able to understand
   $errtitle = "500 - Internal Server Error";
   $errmsg = "An internal server error occurred.";
   $errbottom = "Please report this to the webhost, as it means something is not configured right, or something went VERY wrong.";
}elseif($err =="404"){
   //funny chinese because this error is or might not be so critical
   $errtitle = "404 - 網頁不存在。";
   $errmsg = "Check the URL of what you're trying to get to.";
   $errbottom = "If you've come here without manually typing a URL, you should probably report this as a bug.";
}
?>
<!DOCTYPE HTML>
<html>
<style>
</style>
<body class="finobe-light">
<div id="app">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   	<?php
   		//this is so that page dosent go apeshit when we have a 500 internal error aka database error
   		if ($err == "500") {
            //we print a separate navbar, due to the actual navbar file using database thingy
            //so unless you want your site to auto-ddos itself, keep it like this
               echo "<nav class='navbar navbar-expand-lg navbar-light  bg-faded navbar-static-top mb-3'>
               <div class='container'>
                  <a href='". $baseUrl ."/' class='navbar-brand'><img src='". $baseUrl ."/imgs/finobesvg.svg' alt='". $ProjectName ."' class='navbar-brandimg d-inline-block mr-2' style='width: auto;'>". $ProjectName ."</a> <button type='button' data-toggle='collapse' data-target='#navbar-collapse' aria-controls='navbar-collapse' aria-expanded='false' aria-label='Toggle navigation' class='navbar-toggler navbar-toggler-right'><span class='navbar-toggler-icon'></span></button> 
               </div>
            </nav>";
         }else{
            include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');
         }
   	?>
      <div class="container">
         <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12 col-sm-5 col-md-3">
                           <div class="d-block d-sm-none">
                              <img src="<?php echo $baseUrl; ?>/imgs/cryemoji.svg" alt="哭" class="img-fluid mb-4" style="max-width:70px">
                           </div>
                           <div class="d-none d-sm-block">
                              <img src="<?php echo $baseUrl; ?>/imgs/cryemoji.svg" alt="哭" class="img-fluid">
                           </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                           <h3><?php echo $errtitle; ?></h3>
                           <p>
                              <?php echo $errmsg; ?>                    
                           </p>
                           <p class="mb-0"><?php echo $errbottom ?></p>
                           <p class="mb-0">
                              <a href="<?php echo $baseUrl; ?>" class="btn btn-outline-primary">Home &rsaquo;</a>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>
