<?php
use Base\Supports\FlashMessage;
use Illuminate\Support\Str;

if (!function_exists('is_in_dashboard')) {
    /**
     * @return bool
     */
    function is_in_dashboard()
    {
        $segment = request()->segment(1);
        if ($segment === config('SOURCE_ADMIN_ROUTE', 'adminlks')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('convert_flash_message')) {
    function convert_flash_message($mess = 'create')
    {
        switch ($mess) {
            case 'create':
                $m = config('messages.success_create');
                break;
            case 'edit':
                $m = config('messages.success_edit');
                break;
            case 'delete':
                $m = config('messages.success_delete');
                break;
            case 'cancel':
                $m = config('messages.cancel');
                break;
            case 'role':
                $m = config('messages.role_error');
                break;
            default:
                $m = config('messages.success_create');
        }

        return $m;
    }
}

if (!function_exists('upload_url')) {
    function upload_url($url){
        return env('APP_URL').'/upload/'.$url;
    }
}
if (!function_exists('public_url')) {
    function public_url($url){
        return env('APP_URL').'/'.$url;
    }
}

if (!function_exists('domain_url')) {
    function domain_url(){
        return env('APP_URL');
    }
}


if (! function_exists('str_slug')) {
    function convert_vi_to_en($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }
}
if (! function_exists('str_slug')) {

    function str_slug($title, $separator = '-', $language = 'en')
    {
        return convert_vi_to_en(Str::slug($title, $separator, $language));
    }
}

if (! function_exists('cut_string')) {

    function cut_string($str, $int)
    {
        if(strlen($str)>$int){
            return substr($str,0,$int).'...';
        }else{
            return substr($str,0,$int);
        }

    }
}

if (! function_exists('format_date')) {
    function format_date($date = '')
    {
        return date_format(new DateTime($date), 'd/m/Y');
    }
}

function stringDate($time){
    $time = strtotime($time);
    return date('d',$time) .' tháng '.date('m',$time).' ,'.date('Y',$time);
}

