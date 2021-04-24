<?php

/* -------------------------- */
    chapter($chapters);

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


function chapter($chapters){
    if ($_GET['ch'] != '') {
        $chapters = 'assets/gb/wlopfans/' . $_GET['ch'];
        if(is_dir($chapters)) {
            echoimg('assets/gb/wlopfans/' . $_GET['ch'] . '/');
        } else {
            echoimg('assets/gb/wlopfans/10-1/');
        }
    } else {
        echoimg('assets/gb/wlopfans/10-1/');
    }
}

function echoimg($dir) {
    $num = '1';
    echo '<div class="imgs">';

    $count1 = counter($dir);
    while ($num <= $count1) {
        echo '<img src="' . $dir . $num . '.png" center>';
        $num++;
    }

    echo '</div>';
    echo '<div style="height: 30px;"></div><div><div class = "comment" id="vk_comments" style="height: auto!important"></div></div>';
}
