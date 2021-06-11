<?php

use Menu\Models\Menu;

function getAllmenu(){
    $lang = session('lang');
    $menuWise = Menu::orderBy('sort_order','asc')
        ->where('lang_code',$lang)->where('status','active')->where('parent',0)
        ->get();
    return $menuWise;
}

function showtime($time){
    return date_format(new DateTime($time),'h:i');
}

function youtube_id($url = '')
{
    if($url==''){
        return '';
    }
    $id = '';

    $last_index = strrpos($url,"/");
    if($last_index < strlen($url)){
        $id = substr($url,$last_index +1);
    }

    if(strpos($id,'watch')!==false){
        $id=   substr( $id,strpos($id,'=')+1) ;
    }
    if(strpos($id,'?')!==false){
        $id = substr($url,0,(strpos($id,'?')+1));
    }
    return $id;
}

function getImgYoutube($link){
    return 'https://img.youtube.com/vi/'.youtube_id($link).'/0.jpg';
}

function sub($str,$num){
    return mb_substr(strip_tags($str), 0, $num);
}
