<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
$errorCode = (int)($_GET['err'] ?? 0);

switch($errorCode){
	case "500":
		$errtitle = "500 - Internal Server Error";
		$errmsg = "An internal server error occurred.";
		$errbottom = "Please report this to the webhost, as it means something is not configured right, or something went VERY wrong.";
		break;
	default:
		$errtitle = "404 - 網頁不存在。";
		$errmsg = "Check the URL of what you're trying to get to.";
		$errbottom = "If you've come here without manually typing a URL, you should probably report this as a bug.";
		break;
}
?>
<!DOCTYPE HTML>
<html>
<style>
</style>
<body class="finobe-light">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php'); ?>
<div id="app">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php'); ?>
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
                              <a href="<?php echo $baseUrl; ?>" class="btn btn-outline-primary">Home ></a>
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
