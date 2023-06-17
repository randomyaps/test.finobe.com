<?php
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/generalConfigs.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/loadingValues/userInfo.php');
include($_SERVER['DOCUMENT_ROOT'] . '/general/extraFunctions.php');
$gameId = (int)($_GET['id'] ?? die(header('Location: '. $errorPages[0])));
$gameResults = fetchAsset($gameId, "place");
$creatorInfo = fetchUser($gameResults['creatorid']);
?>
<!DOCTYPE HTML>
<html>
      <style>.badge-shen{background:#f5c177;color:#000;}.badge-iago{background:#6f5e56;color:#fff;}</style>
      <style type="text/css">.finobe__vloader[data-v-3ec8574b] {
         display: flex;
         width: 100%;
         min-height: 250px;
         z-index: 9999; /* :thinking:; */
         flex-direction: column;
         justify-content: center;
         align-items: center;
         }
      </style>
      <style type="text/css">/* Fat */
         .page-input[data-v-e236382e] {
         max-width: 2.5rem;
         display: inline;
         vertical-align: middle;
         text-align: center;
         }
         /* Number up/down thing is ugly */
         input[type='number'][data-v-e236382e] {
         -webkit-appearance: textfield;
         -moz-appearance: textfield;
         appearance: textfield;
         }
         input[type='number'][data-v-e236382e]::-webkit-inner-spin-button,
         input[type='number'][data-v-e236382e]::-webkit-outer-spin-button,
         input[type='number'][data-v-e236382e]:hover::-webkit-inner-spin-button,
         input[type='number'][data-v-e236382e]:hover::-webkit-outer-spin-button {
         -webkit-appearance: none;
         margin: 0;
         }
      </style>
      <style type="text/css">.n-loading-center[data-v-6e596b1f] {
         z-index: 9999;
         }
         .col-thumbnail[data-v-6e596b1f] {
         display: flex;
         align-content: center;
         align-items: center;
         }
      </style>
      <style type="text/css">.item-list[data-v-4533fc68] {
         max-height: calc(100vh + 500px);
         overflow-x: hidden;
         overflow-y: auto;
         }
         .trade-send-btn[data-v-4533fc68] {
         max-width: 200px;
         }
         .card > .selected-text[data-v-4533fc68] {
         display: flex;
         position: absolute;
         align-items: center;
         justify-content: center;
         flex-direction: column;
         background-color: rgba(14, 14, 14, .5);
         width: 100%;
         height: 100%;
         border-radius: 3px;
         color: #fff;
         z-index: 9999;
         opacity: 0;
         pointer-events: none;
         transition: opacity .1s linear;
         }
         .card.card-is-selected > .selected-text[data-v-4533fc68] {
         opacity: 1;
         }
         .card.card-is-selected > .card-block[data-v-4533fc68] {
         pointer-events: none;
         }
      </style>
      <style type="text/css">.btn-play[data-v-152bd39d] {
         padding: .75rem 5rem;
         }
         .fat-spin[data-v-152bd39d] {
         -webkit-animation: fa-spin 1s infinite linear;
         animation: fa-spin 1s infinite linear;
         margin-right: 2px;
         }
         .checkmark[data-v-152bd39d] {
         width: 16px;
         height: 16px;
         border-radius: 50%;
         vertical-align: middle;
         display: inline-block;
         stroke-width: 8px;
         stroke: #fff;
         stroke-miterlimit: 10;
         box-shadow: inset 0px 0px 0px #00b857;
         }
         .checkmark.make-animate[data-v-152bd39d] {
         -webkit-animation: fill-data-v-152bd39d .2s ease-in-out forwards,scale-data-v-152bd39d .3s ease-in-out .2s both;
         animation: fill-data-v-152bd39d .2s ease-in-out forwards,scale-data-v-152bd39d .3s ease-in-out .2s both;
         }
         .check[data-v-152bd39d] {
         -webkit-transform-origin: 50% 50%;
         transform-origin: 50% 50%;
         stroke-dasharray: 48;
         stroke-dashoffset: 48;
         -webkit-animation: stroke-data-v-152bd39d .3s cubic-bezier(.65, 0, .45, 1) .1s forwards;
         animation: stroke-data-v-152bd39d .3s cubic-bezier(.65, 0, .45, 1) .1s forwards;
         }
         @-webkit-keyframes stroke-data-v-152bd39d {
         100% {
         stroke-dashoffset: 0;
         }
         }
         @keyframes stroke-data-v-152bd39d {
         100% {
         stroke-dashoffset: 0;
         }
         }
         @-webkit-keyframes scale-data-v-152bd39d {
         0%,
         100% {
         -webkit-transform: none;
         transform: none;
         }
         50% {
         -webkit-transform: scale3d(1.1, 1.1, 1);
         transform: scale3d(1.1, 1.1, 1);
         }
         }
         @keyframes scale-data-v-152bd39d {
         0%,
         100% {
         -webkit-transform: none;
         transform: none;
         }
         50% {
         -webkit-transform: scale3d(1.1, 1.1, 1);
         transform: scale3d(1.1, 1.1, 1);
         }
         }
         @-webkit-keyframes fill-data-v-152bd39d {
         100% {
         box-shadow: inset 0px 0px 0px 30px #00b857;
         }
         }
         @keyframes fill-data-v-152bd39d {
         100% {
         box-shadow: inset 0px 0px 0px 30px #00b857;
         }
         }
         .fade-enter-active[data-v-152bd39d],
         .fade-leave-active[data-v-152bd39d] {
         transition: opacity .2s;
         }
         .fade-enter[data-v-152bd39d],
         .fade-leave-to[data-v-152bd39d] {
         opacity: 0;
         }
      </style>
      <style type="text/css">.option[data-v-ef83b9bc] {
         width: 100%;
         display: inline-block;
         background-color: #fff;
         padding: 6px 10px;
         color: #000;
         transition: all .15s linear;
         border-radius: .25rem;
         cursor: pointer;
         }
         .option[data-v-ef83b9bc]:hover {
         color: #000;
         text-decoration: none;
         box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .1), 0 1px 4px 2px rgba(0, 0, 0, .1);
         }
         .option.active[data-v-ef83b9bc],
         .option.active[data-v-ef83b9bc]:hover {
         border-color: #0270a6;
         box-shadow: 0 0 0 .2rem rgba(3, 155, 229, .5);
         cursor: default;
         }
      </style>
      <style type="text/css">@charset "UTF-8";
         .forum-voter[data-v-73be696c] {
         display: flex;
         width: 200px;
         }
         .forum-voter > .total[data-v-73be696c] {
         padding: 0 6px;
         margin-right: 6px;
         min-width: 30px;
         text-align: center;
         height: 22px;
         border-radius: 4px;
         }
         .forum-voter > .up[data-v-73be696c],
         .forum-voter > .down[data-v-73be696c] {
         background-color: #ececec;
         padding: 0 6px;
         min-width: 50px;
         display: flex;
         justify-content: space-around;
         height: 22px;
         color: #6b6b6b;
         cursor: pointer;
         }
         .forum-voter > .up.disabled[data-v-73be696c],
         .forum-voter > .down.disabled[data-v-73be696c] {
         cursor: not-allowed;
         }
         .forum-voter > .up > i[data-v-73be696c]:before,
         .forum-voter > .down > i[data-v-73be696c]:before {
         display: inline-block;
         margin-top: 4px;
         }
         .forum-voter > .up[data-v-73be696c] {
         border-top-left-radius: 4px;
         border-bottom-left-radius: 4px;
         border: 1px solid #e6e6e6;
         border-right: 1px solid #e6e6e6;
         }
         .forum-voter > .down[data-v-73be696c] {
         border-top-right-radius: 4px;
         border-bottom-right-radius: 4px;
         border: 1px solid #e6e6e6;
         }
         .forum-voter > .up.active[data-v-73be696c] {
         color: #039be5;
         }
         .forum-voter > .down.active[data-v-73be696c] {
         color: #ba68c8;
         }
         .forum-voter > .up[data-v-73be696c]:hover:not(.active):not(.disabled),
         .forum-voter > .down[data-v-73be696c]:hover:not(.active):not(.disabled) {
         color: #000;
         }
         .finobe-dark .forum-voter > .up[data-v-73be696c],
         .finobe-dark .forum-voter > .down[data-v-73be696c] {
         background-color: #2b2d31;
         color: #d6dbdd;
         }
         .finobe-dark .forum-voter > .up[data-v-73be696c] {
         border: 1px solid rgba(246, 246, 246, .125);
         border-right: 1px solid rgba(246, 246, 246, .125);
         }
         .finobe-dark .forum-voter > .down[data-v-73be696c] {
         border: 1px solid rgba(246, 246, 246, .125);
         }
         .finobe-dark .forum-voter > .up.active[data-v-73be696c] {
         color: #039be5;
         }
         .finobe-dark .forum-voter > .down.active[data-v-73be696c] {
         color: #ba68c8;
         }
         .finobe-dark .forum-voter > .up[data-v-73be696c]:hover:not(.active):not(.disabled),
         .finobe-dark .forum-voter > .down[data-v-73be696c]:hover:not(.active):not(.disabled) {
         color: #dcdcdc;
         }
         .far.fa-arrow-up[data-v-73be696c]:before {
         content: "\F062";
         }
         .far.fa-arrow-down[data-v-73be696c]:before {
         content: "\F063";
         }
      </style>
      <style type="text/css">.modal[data-v-2386736f] {
         transition: all .2s ease;
         }
         .modal-enter[data-v-2386736f],
         .modal-leave-active[data-v-2386736f] {
         opacity: 0;
         }
         .modal-enter.modal[data-v-2386736f],
         .modal-leave-active.modal[data-v-2386736f] {
         -webkit-transform: scale(.9);
         transform: scale(.9);
         }
      </style>
      <style type="text/css">.whats-this[data-v-1377793b] {
         line-height: 2;
         }
      </style>
      <style type="text/css">.btn-play[data-v-20da418e] {
         padding: .75rem 5rem;
         }
         .fat-spin[data-v-20da418e] {
         -webkit-animation: fa-spin 1s infinite linear;
         animation: fa-spin 1s infinite linear;
         margin-right: 2px;
         }
         .checkmark[data-v-20da418e] {
         width: 16px;
         height: 16px;
         border-radius: 50%;
         vertical-align: middle;
         display: inline-block;
         stroke-width: 8px;
         stroke: #fff;
         stroke-miterlimit: 10;
         box-shadow: inset 0px 0px 0px #00b857;
         }
         .checkmark.make-animate[data-v-20da418e] {
         -webkit-animation: fill-data-v-20da418e .2s ease-in-out forwards,scale-data-v-20da418e .3s ease-in-out .2s both;
         animation: fill-data-v-20da418e .2s ease-in-out forwards,scale-data-v-20da418e .3s ease-in-out .2s both;
         }
         .check[data-v-20da418e] {
         -webkit-transform-origin: 50% 50%;
         transform-origin: 50% 50%;
         stroke-dasharray: 48;
         stroke-dashoffset: 48;
         -webkit-animation: stroke-data-v-20da418e .3s cubic-bezier(.65, 0, .45, 1) .1s forwards;
         animation: stroke-data-v-20da418e .3s cubic-bezier(.65, 0, .45, 1) .1s forwards;
         }
         @-webkit-keyframes stroke-data-v-20da418e {
         100% {
         stroke-dashoffset: 0;
         }
         }
         @keyframes stroke-data-v-20da418e {
         100% {
         stroke-dashoffset: 0;
         }
         }
         @-webkit-keyframes scale-data-v-20da418e {
         0%,
         100% {
         -webkit-transform: none;
         transform: none;
         }
         50% {
         -webkit-transform: scale3d(1.1, 1.1, 1);
         transform: scale3d(1.1, 1.1, 1);
         }
         }
         @keyframes scale-data-v-20da418e {
         0%,
         100% {
         -webkit-transform: none;
         transform: none;
         }
         50% {
         -webkit-transform: scale3d(1.1, 1.1, 1);
         transform: scale3d(1.1, 1.1, 1);
         }
         }
         @-webkit-keyframes fill-data-v-20da418e {
         100% {
         box-shadow: inset 0px 0px 0px 30px #00b857;
         }
         }
         @keyframes fill-data-v-20da418e {
         100% {
         box-shadow: inset 0px 0px 0px 30px #00b857;
         }
         }
         .fade-enter-active[data-v-20da418e],
         .fade-leave-active[data-v-20da418e] {
         transition: opacity .2s;
         }
         .fade-enter[data-v-20da418e],
         .fade-leave-to[data-v-20da418e] {
         opacity: 0;
         }
      </style>
      <style type="text/css">.whats-this[data-v-59802440] {
         line-height: 2;
         }
      </style>
      <style type="text/css">.game-card-div[data-v-5ad0ed22] {
         display: inline-flex;
         height: 178px;
         }
         .game-card[data-v-5ad0ed22]:hover,
         .game-card-div[data-v-5ad0ed22]:hover,
         .game-card-div:hover > .game-card-link[data-v-5ad0ed22] {
         z-index: 10000;
         }
         .game-card[data-v-5ad0ed22] {
         position: relative;
         overflow-y: hidden;
         height: 170px;
         }
         .game-card-link > .game-card > .visits[data-v-5ad0ed22] {
         display: none;
         }
         .game-card-link:hover > .game-card[data-v-5ad0ed22] {
         height: auto;
         }
         .game-card-link:hover > .game-card > .visits[data-v-5ad0ed22] {
         display: block;
         padding: .25rem 0 .5rem .65rem;
         border-top: 1px solid #ccc;
         }
      </style>
      <style type="text/css">.group-members-select[data-v-318d200a] {
         min-width: 200px;
         }
         .group-member-link > span > img[data-v-318d200a] {
         max-width: 64px;
         }
         .group-member-link[data-v-318d200a] {
         text-decoration: none !important;
         }
         .finobe-light .group-member-link[data-v-318d200a]:link,
         .finobe-light .group-member-link[data-v-318d200a]:hover,
         .finobe-light .group-member-link[data-v-318d200a]:visited {
         color: #212529;
         }
         .finobe-dark .group-member-link[data-v-318d200a]:link,
         .finobe-dark .group-member-link[data-v-318d200a]:hover,
         .finobe-dark .group-member-link[data-v-318d200a]:visited {
         color: #ececec;
         }
         .group-member-card[data-v-318d200a] {
         width: 112px;
         }
      </style>
      <style type="text/css">.no-default-chevron::after {
         content: none !important;
         }
      </style>
<body class="finobe-light">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/top.php');?>
      <div id="app">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/options.php');?>
         <div id="noclientmodal-2016" tabindex="-1" role="dialog" class="modal fade">
            <div role="document" class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-body text-center">
                     <p class="my-2">It looks like the client didn't launch. If it did, just ignore this.</p>
                     <br> 
                     <p>Otherwise, here:</p>
                     <p><a href="<?php echo $downloadUrl; ?>" class="btn btn-success btn-lg"><i class="far fa-download mr-1"></i> Download client</a></p>
                  </div>
                  <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-primary">oh, okay</button></div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="card">
               <div class="card-header bg-primary text-white">
                  Finobe Place			
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-7 my-2 text-center"><img src="<?php echo $baseUrl; ?>/app/gethumb.php?id=<?php echo $gameResults["id"]; ?>&asset=game" alt="" class="place-thumbnail"></div>
                     <div class="col-lg-5 my-2">
                        <h3 class="mb-0">
                           <?php echo htmlspecialchars($gameResults["title"]); ?>
                        </h3>
                        <p class="my-0">by <a href="<?php echo $baseUrl; ?>/user/<?php echo $gameResults["creatorid"]; ?>"><?php echo htmlspecialchars($creatorInfo["name"]); ?></a></p>
                        <p class="mt-0 mb-2"><span class="badge badge-danger"><?php echo $gameResults["version"]; ?></span></p>
                        <p class="place-description"><?php echo htmlspecialchars($gameResults["info"]); ?></p>
                        <div data-v-152bd39d="" class="w-100">
                           <div data-v-152bd39d="">
                              <a data-v-152bd39d="" href="#" class="btn btn-success btn-lg btn-play btn-block btn-normal-case"><i data-v-152bd39d="" class="far fa-play fa-fw mr-1"></i>
                              Play
                              </a> <!---->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div data-panel-id="#statistics-panels" class="row mt-4 mb-0 finobe-tabs"><a href="#" data-panel="#statistics" class="col-6 tab active">Statistics</a> <a href="#" data-panel="#badges" class="col-6 tab">Badges</a></div>
            </div>
            <div id="statistics-panels" class="mt-0 mb-4 card finobe-tabs-card">
               <div id="statistics" class="card-body finobe-tab-panel">
                  <div class="row">
                     <div class="col-sm text-center">
                        <p class="mb-2"><strong>Created</strong></p>
                        <p data-toggle="tooltip" data-placement="bottom" title="" class="mb-0 text-center" data-original-title="<?php echo $gameResults["createdon"]; ?>"><?php echo $gameResults["createdon"]; ?></p>
                     </div>
                     <hr class="d-block d-md-none w-100 w-md-0">
                     <div class="col-sm text-center">
                        <p class="mb-2"><strong>Playing</strong></p>
                        <p class="mb-0"><?php echo $gameResults["playing"]; ?></p>
                     </div>
                     <hr class="d-block d-md-none w-100 w-md-0">
                     <div class="col-sm text-center">
                        <p class="mb-2"><strong>Max Players</strong></p>
                        <p class="mb-0"><?php echo $gameResults["maxplayer"]; ?></p>
                     </div>
                  </div>
               </div>
               <div id="badges" class="card-body finobe-tab-panel d-none">
                  <div>
                     <div>
                        <div class="text-center pt-2">
                           <p><strong>No badges found.</strong></p>
                        </div>
                     </div>
                     <div class="mt-4 text-center">
                        <div data-v-e236382e="" class="paginator clearfix"><a data-v-e236382e="" class="btn btn-theme mr-2 disabled"><i data-v-e236382e="" class="far fa-chevron-left"></i></a> <span data-v-e236382e=""><input data-v-e236382e="" type="number" min="1" place="current" class="form-control form-control-sm page-input mr-1"> of <span data-v-e236382e="" place="total">1</span></span> <a data-v-e236382e="" class="btn btn-theme ml-2 disabled"><i data-v-e236382e="" class="far fa-chevron-right"></i></a></div>
                     </div>
                  </div>
               </div>
            </div>
            <h4 class="font-light mt-2">Servers</h4>
            <div class="card mb-2">
               <div class="card-body text-center">
                  No servers found				
               </div>
            </div>
         </div>
      </div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/general/bottom.php'); ?>
 </body>
</html>

