<?php

define('IPSKEY', 'bf5737af966a501afa73370f49f10c7b');
$comm = ifua(getIp());
if ($_GET['ch'] != '') {
    if(is_dir('assets/img/gb/' . $_GET['ch'])) {
        require_once('assets/img/gb/conf/'. $_GET['ch'].'.php');
    } else {
        require_once('assets/img/gb/conf/default.php');
    }
}else {
    require_once('assets/img/gb/conf/default.php');
}
/* -------------------------- */

 function counter($cont) {
    $dir = opendir($cont);
    $count = 0;
    while($file = readdir($dir)){
    if($file == '.' || $file == '..' || is_dir($cont . $file)){
        continue;
    }
       $count++;
    }
       return $count;
 }


function chapter(){
    if ($_GET['ch'] != '') {
        $chapters = 'assets/img/gb/' . $_GET['ch'];
        if(is_dir($chapters)) {
            echoimg('assets/img/gb/' . $_GET['ch'] . '/');
        } else {
            echo '<span>Нет контента</span>';
            echo '<script type="text/javascript"> window.location="contents.php";</script>';
            exit;
            // exit;
        }
    } else {
            echo '<span>Нет контента</span>';
            echo '<script type="text/javascript"> window.location="contents.php";</script>';
            exit;
        // exit;
    }
}

function echoimg($dir) {
    $num = '1';
    echo '<div class="imgs">';

    $count1 = counter($dir);
    while ($num <= $count1) {

        if ($num == '1') {
            $class = 'class="readerbordertop"';
        } elseif ($num == $count1) {
            $class = 'class="readerborderbottom"';
        } else {
            $class = '';
        }

        echo '<img src="' . $dir . $num . '.png"'.$class.'center>';
        $num++;
    }

}


function titlechapter () {
        echo str_replace("-", ".", $_GET['ch']);
}

function pbtn() {
    if (PREVIOUS != 'none') {
        echo '<a class="btn_arr" href="?ch='.PREVIOUS.'"><ion-icon name="arrow-back-outline"></ion-icon></a>';
    } else {
        echo '<a class="btn_arr_inactive"><ion-icon name="arrow-back-outline"></ion-icon></a>';
    }
}
function nbtn() {
    if (NEXT != 'none') {
        echo '<a class="btn_arr" href="?ch='.NEXT.'"><ion-icon name="arrow-forward-outline"></ion-icon></a>';
    } else {
        echo '<a class="btn_arr_inactive"><ion-icon name="arrow-forward-outline"></ion-icon></a>';
    }
}


/* -------------------------- */
getIp();
function getIp() {
    $keys = [
      'HTTP_CLIENT_IP',
      'HTTP_X_FORWARDED_FOR',
      'REMOTE_ADDR'
    ];
    foreach ($keys as $key) {
      if (!empty($_SERVER[$key])) {
        $ip = trim(end(explode(',', $_SERVER[$key])));
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
          return($ip);
        }
      }
    }
  }

function ifua ($ip) {
    $array = json_decode(file_get_contents('http://api.ipstack.com/' . $ip . '?access_key=' . IPSKEY), true);
    $countrycode = $array['country_code'];

 
    /* dev */
    if ($_GET['debug'] == 'true') {

    echo '<div class = "debug">
Debug: true 
<br>
Ip: '.$ip.'
<br>
Country: '.$countrycode.'
<br>';
if ($_GET['vk'] == 'true') {$countrycode = 'RU'; echo 'CChange: true <br>';} else { echo 'CChange: false <br>';}
if ($countrycode != 'UA') { echo 'Comm: true <br>';} else {echo 'Comm: false <br>';}
echo 'Loaded: '.counter('assets/img/gb/' . $_GET['ch'] . '/').' images
<br>
Chapter: '.str_replace("-", ".", $_GET['ch']).'
<br>
Reader version: v2.0.1
<br><br><br><br>
<div style="color: #de6161"><b>
ВАЖНО!
<br>
Мы не сохраняем ваш IP!
<br>
Он используется только для
<br>
получения страны, чтоб у 
<br>
украинцев работал ридер!
<br>
(Отключаются вк комментарии)</b></div>
';
// if (PREVIOUS != 'none') {echo 'Previous chapter available: true <br>';} else {echo 'Previous chapter available: false <br>';}
// if (NEXT != 'none') {echo 'Next chapter aviable: true <br>';} else {echo 'Next chapter aviable: false <br>';}
echo '</div>';
    }
    if ($_GET['vzlomadminki'] == 'true' || $_GET['admin'] == 'true') {
        echo '<script type="text/javascript"> window.location="https://wlopfans.club/natribu/index.php";</script>';
        exit;
        }
    /* dev */

    if ($countrycode != 'UA') {
        echo '    <script>document.oncontextmenu = cmenu; function cmenu() { return false; }</script>
        <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
        <script type="text/javascript">VK.init({apiId: 7823393, onlyWidgets: true});</script>';
        return('<div id="vk_comments"></div><script type="text/javascript">VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});</script>');
    } else {
        return('');
    }
}

function comments ($comm) {
    echo $comm;
}

function mainh () {
    if ($_GET['int'] != '') {
        if (file_exists('assets/interviews/'.$_GET['int'].'.php')) {
            require_once('assets/interviews/'.$_GET['int'].'.php');
        }
        require_once('assets/php/interview.php');
    } else {
        require_once('assets/php/comic.php');
    }
}
    