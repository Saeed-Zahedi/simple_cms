<?php

$current_user=null;
$current_user_id=null;

define('SESSION_EXPIRETION_TIME',24*3600);
function get_current_user_id(){
    global $current_user_id;
    return  $current_user_id;
}
function current_user(){
    global $current_user;
    return $current_user;
}
function is_user_logged_in(){
    global $current_user_id;
    if($current_user_id){
        return true;
    }
    else{
        return false;
    }
}
function clear_user_session(){
    unset($_SESSION['last_access']);
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
}
function check_for_previous_login(){
    $last_accses = 0;
    if (isset($_SESSION['last_access'])) {
        $last_accses=$_SESSION['last_access'];
    }
    $expired=(time()-$last_accses)>SESSION_EXPIRETION_TIME;
    if($expired){
       clear_user_session();
        return;

    }
    $username=$_SESSION['username'];
    $user=get_user($username);
    if($user){
        $user_id=$_SESSION['user_id'];
        if($user_id!=$user['id']){
            clear_user_session();
            return;
        }
    }
    $password=$_SESSION['password'];
    if ($password != $user['password']) {
        clear_user_session();
        return;
    }
    global$current_user;
    global$current_user_id;
    $current_user=$user;
    $current_user_id=$user['id'];  
}
function user_logout(){
    global$current_user;
    global$current_user_id;
    $current_user=null;
    $current_user_id=null; 
    clear_user_session(); 

}
function user_login($username,$password){
    user_logout();
    $user=get_user($username);
    if(!$user){
        return;
    }
    if(sha1($password)!=$user['password']){
        return;
    }
    global$current_user;
    global$current_user_id;
    $current_user=$user;
    $current_user_id=$user['id'];
    $_SESSION['last_access']=time();
    $_SESSION['user_id']=$current_user_id;
    $_SESSION['username']=$user['username'];
    $_SESSION['password']=$user['password'];    
}
?>