<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/loadvls.php'); ?>
<?php
$nosearch = null;
$GameBase = mysqli_connect($hostdb, $accdb, $passdb, $namedb) or header('Location: ' . $baseUrl . '/err.php?err=500');
if (isset($_POST['gamesearch'])){
   $gamesch = mysqli_real_escape_string($GameBase, strip_tags($_POST['search']));
   htmlspecialchars($gamesch);

   if (empty($gamesch)) {
      //if no search is NULL, then all of this is ignored.
      $nosearch = null;
   }else{
      $nosearch = "1";
   }
}
?>
<!DOCTYPE HTML>
<html>
<body class="finobe-light">
   <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
   <div id="app">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
      <br></br>
            <div class="container">
            <div>
               <h3 class="font-weight-light mb-2" style="float: left;">Places</h3>
               <a href="<?php echo $downloadUrl; ?>" target="_blank" class="btn btn-outline-primary btm-sm mb-2 ml-2 mr-1" style="float: left;"><i class="far align-middle fa-fw fa-download mr-1"></i>download client</a>
            </div>
            <form method="POST" action="places.php">
               <center>
                  <div id="SearchBar" class="SearchBar">
                     <div class="input-group">
                        <input name="search" id="search" type="text" placeholder="Search" class="form-control"> 
                        <div class="input-group-append">
                           <button type="submit" id="gamesearch" name="gamesearch" class="btn btn-outline-secondary btn-md">
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
                  <li class="page-item active">
                     <a href="#" class="page-link active">Featured</a>
                  </li>
                  <li class="page-item"><a href="#" class="page-link ">Original</a></li>
                  <li class="page-item"><a href="#" class="page-link ">Copies</a></li>
                  <li class="page-item"><a href="#" class="page-link ">All</a></li>
               </ul>
            </div>
            <div class="mb-2"></div>
            <div class="container-fluid content-row d-none d-lg-block">
               <div class="row">
                  <?php 
                  if ($nosearch == "1") {
                     $GameFetch = mysqli_query($GameBase, "SELECT * FROM games WHERE title LIKE '%". $gamesch ."%'");
                  }else{
                     $GameFetch = mysqli_query($GameBase, "SELECT * FROM games");
                  }
                  
                  $FoundRows = mysqli_num_rows($GameFetch);
                  if ($FoundRows > 0) {
                        while($Game = $GameFetch->fetch_assoc()) {
                           $gameclick = 'window.location="'. $baseUrl .'/view.php?id='. $Game['id'] .'&asset=game";';
                          echo "<div class='col-lg-2 mb-4'>
                     <div class='game-card h-100 video-card' style='' onclick='". $gameclick ."'>
                        <span class='thumbnail'>
                           <img src='". $baseUrl ."/app/gethumb.php?id=". $Game['id'] ."&asset=game'  class='card-img-top'>
                           <div style='position: absolute; top: -3px;'><span class='badge badge-danger badge-notification'>". $Game['version'] ."</span></div>
                           <!--<span class='badge badge-success badge-notification'>Online</span></div>-->
                        </span>
                        <span class='data py-2 px-2 d-flex flex-column'>
                           <span class='catalog-no-overflow-plz' style='font-size: 15px;'>". $Game['title'] ."</span>
                           <span class='author text-muted' style='font-size: 13px;'>by ". $Game['by'] ."</span>
                           <span class='catalog-no-overflow-plz text-muted'>". $Game['playing'] ." playing</span> 
                        </span>
                     </div>
                  </div>";
                      }
                  } else {
                      echo "<p align='center'>There are no games! 这真是令人难以置信的悲哀。</p>";
                  }
                  $GameBase->close();
                  ?>
               </div>
            </div>
         </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>