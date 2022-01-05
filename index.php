<!DOCTYPE HTML>
<html>
<body class="finobe-light">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   <div id="app">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
      <div class="home-main-content">
         <div class="container d-flex justify-content-center">
            <h1 class="mb-4 home-text">We do what <?php echo $ProjectName; ?> does</h1>
            <p class="home-text"><?php echo $ProjectName; ?> puts games on your not-phone.</p>
            <p>
               <a href="<?php echo $baseUrl; ?>/app/register" class="btn btn-primary btn-lg mt-3 mr-2">Get started &rsaquo;</a>
            </p>
         </div>
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
   <script src="<?php echo $baseUrl; ?>/js/vendor.js"></script>
   <script src="<?php echo $baseUrl; ?>/js/app.js"></script>
 </body>
</html>

