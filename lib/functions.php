<?php
function home_url($path=null){
    if (!$path) {
        return;     
    }
    return SITE_URL . $path;
}
function get_module_name(){
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $req = str_replace(SITE_URL, '', $url);
    $question_mark_pos = strpos($req, '?');
    if ($question_mark_pos !== false) {
        $req = substr($req, 0, $question_mark_pos);
    }

    return $req;
}
function redirect($url){
    header("Location:$url");
    die();
}
function is_valid_url($url){
    if (empty($url)) {
        return false;
    }
    return (filter_var($url, FILTER_VALIDATE_URL) !== false);
}


