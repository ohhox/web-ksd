<?php

function getLink($url, $text, $id = "", $class = "", $more = "") {
    $Mainurl = URL;
    return "<a href='{$Mainurl}$url' $more id='$class' class='$class'> $text </a>";
}

function pshow($param) {
    echo "<pre>";
    print_r($param);
    echo "</pre>";
}

function Go($url) {
    header("Location: $url");
}

function toThaiText(array $data) {
    $res = array();
    foreach ($data as $key => $value) {        
        $res[$key] = iconv('utf-8', 'tis-620', $value);
    }
    return $res;
}

function ThaiTextToutf(array $data) {
    $res = array();
    foreach ($data as $key => $value) {
       $res[$key] = iconv('tis-620', 'utf-8', $value); 
    }
    return $res;
}
