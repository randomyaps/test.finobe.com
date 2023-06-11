<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php'); 
?>
<!DOCTYPE HTML>
<html>
<body class="finobe-light" onload="fetchPlaceList('All')">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   <script src="<?php echo $baseUrl; ?>/general/js/responsivefrontend.js" type="text/javascript"></script>
   <div id="app">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
      <br></br>
            <div class="container">
            <div>
               <h3 class="font-weight-light mb-2" style="float: left;">Games</h3>
               <a href="<?php echo $downloadUrl; ?>" target="_blank" class="btn btn-outline-primary btm-sm mb-2 ml-2 mr-1" style="float: left;"><i class="far align-middle fa-fw fa-download mr-1"></i>download client</a>
            </div>
            <form method="POST" action="<?php echo $CurrPage; ?>">
               <center>
                  <div id="SearchBar" class="SearchBar">
                     <div class="input-group">
                        <input name="search" id="search" type="text" placeholder="Search" class="form-control"> 
                        <div class="input-group-append">
                           <button type="submit" id="gamesearch" name="gamesearch" class="btn btn-secondary btn-md">
                              <i aria-hidden="true" class="fas far fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </center>
            </form>
            <div class="mb-2"></div>
            <div class="text-center form-inline">
               <ul class="pagination">
                  <li class="page-item"><a href="#" onclick="fetchPlaceList('Featured')" class="page-link">Featured</a></li>
                  <li class="page-item"><a href="#" onclick="fetchPlaceList('Original')" class="page-link">Original</a></li>
                  <li class="page-item"><a href="#" onclick="fetchPlaceList('Copies')" class="page-link">Copies</a></li>
                  <li class="page-item"><a href="#" onclick="fetchPlaceList('All')" class="page-link">All</a></li>
               </ul>
            </div>
            <div class="mb-2"></div>
            <div class="container-fluid content-row d-none d-lg-block">
               <div id="gamesList" class="row">

               </div>
            </div>
         </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>