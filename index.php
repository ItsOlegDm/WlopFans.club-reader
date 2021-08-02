
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
    <link rel="stylesheet" href="assets/css/style.css?v=15">
    <link rel="stylesheet" href="assets/css/style_menu.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        .menuacc {
            display: none;
          }
    </style>
    <?
    require_once('assets/php/main.php');
    ?>

</head>
<body>
    <!-- To enable debug mode, add to link '&debug=true' -->
    <!-- To enable admin mode, add to link '&admin=true' -->
<div class="menuacc" id="accmenu" >
  <div>
    <div class="menu" id="menu">
        <div class="closemenu" id="closemenu">
        <ion-icon onclick="menu()" name="close-circle-outline"></ion-icon>
        </div>    

        <div class="acc">
        <button class="accordion">Глава 10</button>
        <div class="panel">
          <!-- <div class="content"> -->
            <div class="menuitem">
              <a href="?ch=10-1" class="menuitem"><span>10.1</span> <ion-icon name="chevron-forward-outline"></ion-icon></a> 
            </div>
            <div class="menuitem">
              <a href="?ch=10-2" class="menuitem"><span>10.2</span> <ion-icon name="chevron-forward-outline"></ion-icon></a> 
            </div>
            <div class="menuitem">
              <a href="?ch=10-3" class="menuitem"><span>10.3</span> <ion-icon name="chevron-forward-outline"></ion-icon></a> 
            </div>
            <div class="menuitem">
              <a href="?ch=10-4" class="menuitem"><span>10.4</span> <ion-icon name="chevron-forward-outline"></ion-icon></a> 
            </div>
          <!-- </div> -->
        </div>

        <button class="accordion">Глава 11</button>
        <div class="panel">
          <div class="menuitem">
              <a href="?ch=11-1" class="menuitem"><span>11.1</span> <ion-icon name="chevron-forward-outline"></ion-icon></a> 
            </div>
            <div class="menuitem">
              <a href="?ch=11-2" class="menuitem"><span>11.2</span> <ion-icon name="chevron-forward-outline"></ion-icon></a> 
            </div>
          </div>
        </div>
    </div>
    </div>

</div>




    <center>
      <div class="reader">
          <div class="title">
              <h1>GhostBlade</h1>
              <h2>Глава <? titlechapter(); ?></h2>
          </div>

          <div class="readerimg">
              <div class="readercontrols">
                      <?pbtn();?>
                      <a onclick="menu()" class="btn">ОГЛАВЛЕНИЕ</a>
                      <?nbtn();?>
              </div>
              <div>
              <? chapter(); ?>
              </div>
              <div class="readercontrols">
                      <?pbtn();?>
                      <a onclick="menu()" class="btn">ОГЛАВЛЕНИЕ</a>
                      <?nbtn();?>
              </div>
          </div>
          <? echo $comm; ?>
      </div>
    </center>

    <span class="footer">© wlopfans.club - all rights reserved.</span>
</body>


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
<script>
            accmenu.style.display = 'none';
function menu () {
    var accmenu = document.getElementById('accmenu');

    if (accmenu.style.display == 'flex') {
        accmenu.style.opacity = "0";
        setTimeout(() => {
            accmenu.style.display = 'none';
         }, 200);
    } else {
        accmenu.style.display = 'flex';
        setTimeout(() => {
            accmenu.style.opacity = '1';
         }, 100);
    }
}


document.getElementById("accmenu").addEventListener("click",
function(e){
e = e || window.event;
var target = e.target || e.srcElement;
console.log(target.id);
 if(target.id == "accmenu" || target.id == "closemenu") menu();
});
</script>