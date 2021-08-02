<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <title>GhostBlade | WlopFans.club</title>
      <meta name="image" content="https://wlopfans.club/assets/img/gblogo.png">
      <meta name="name" content="GhostBlade | WlopFans.club">
      <link rel="stylesheet" href="assets/css/style_menu.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <style>
         h1.title {
         padding-top: 15px;
         padding-bottom: 15px;
         margin-bottom: 10px;
         font-size: 40px;
         }
         .menuacc {
         z-index: 1;
         }
         .backmenu1 {
         background: url('assets/img/back.jpg') no-repeat center center;
         background-size: cover;
         position: fixed;
         width: 100%;
         height: 100%;
         z-index: -1;
         }
         body {
         position: relative;
         height: 100%;
         }
         div.github-button {
         z-index: 2;
         position: fixed;
         right: 20px;
         bottom: 20px;
         }
      </style>
   </head>
   <body>
      <div class="github-button">
         <a class="github-button" href="https://github.com/itsolegdm/WlopFans.club-reader" data-size="large" data-color-scheme="no-preference: dark; light: dark; dark: dark;" aria-label="Star itsolegdm/WlopFans.club-reader on GitHub">GitHub</a>
      </div>
      <div class="backmenu1"></div>
      <div class="menuacc">
         <div class="">
            <h1 class="title">
               GhostBlade
            </h1>
            <div class="menu">
               <div class="acc">
                  <button class="accordion">Глава 10</button>
                  <div class="panel">
                     <!-- <div class="content"> -->
                     <div class="menuitem">
                        <a href="index.php?ch=10-1" class="menuitem">
                           <span>10.1</span>
                           <ion-icon name="chevron-forward-outline"></ion-icon>
                        </a>
                     </div>
                     <div class="menuitem">
                        <a href="index.php?ch=10-2" class="menuitem">
                           <span>10.2</span>
                           <ion-icon name="chevron-forward-outline"></ion-icon>
                        </a>
                     </div>
                     <div class="menuitem">
                        <a href="index.php?ch=10-3" class="menuitem">
                           <span>10.3</span>
                           <ion-icon name="chevron-forward-outline"></ion-icon>
                        </a>
                     </div>
                     <div class="menuitem">
                        <a href="index.php?ch=10-4" class="menuitem">
                           <span>10.4</span>
                           <ion-icon name="chevron-forward-outline"></ion-icon>
                        </a>
                     </div>
                     <!-- </div> -->
                  </div>
                  <button class="accordion">Глава 11</button>
                  <div class="panel">
                     <div class="menuitem">
                        <a href="index.php?ch=11-1" class="menuitem">
                           <span>11.1</span>
                           <ion-icon name="chevron-forward-outline"></ion-icon>
                        </a>
                     </div>
                     <div class="menuitem">
                        <a href="index.php?ch=11-2" class="menuitem">
                           <span>11.2</span>
                           <ion-icon name="chevron-forward-outline"></ion-icon>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function() {
           $(".accordion").click(function() {
             console.log($(this))
             $(this).toggleClass('active').siblings('.accordion').removeClass('active');
             var panel = $(this).next(".panel")
             panel.css({
                 'maxHeight': panel.prop('scrollHeight'),
                 'marginTop': '7px'
               })
             if (panel.css('maxHeight') != '0px'){
               panel.css({
                 'maxHeight': '0px',
                 'marginTop': '0px'
               })
             } else {
               panel.css({
                 'maxHeight': panel.prop('scrollHeight'),
                 'marginTop': '7px'
               })
             }
             var panel = $(panel).siblings('.panel')
             panel.css({
                 'maxHeight': '0px',
                 'marginTop': '0px'
               })
           });
         });
      </script>
      <script async defer src="https://buttons.github.io/buttons.js"></script>