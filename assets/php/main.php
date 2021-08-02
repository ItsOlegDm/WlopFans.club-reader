<?php
define('IPSKEY', 'TOKEN'); // Токен ipstack.com
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

    echo '<div class = "debug">';
    echo 'debug: true <br>';
    echo 'ip: '.$ip;
    echo '<br>';
    echo 'country: '.$countrycode.'<br>';
    if ($_GET['vk'] == 'true') {$countrycode = 'RU'; echo 'cchange: true <br>';} else { echo 'cchange: false <br>';}
    if ($countrycode != 'UA') { echo 'comm: true <br>';} else {echo 'comm: false <br>';}
    echo '</div>';
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

