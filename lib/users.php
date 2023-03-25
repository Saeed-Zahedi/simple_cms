<?php

function user_count(){
  global $db;
$result = $db->query("
    SELECT *
    FROM users
");

return $result->num_rows;
}
function user_exist($username){
    $user=get_user($username);
    return isset($user['id']);
}
function add_user($userdate){
    $username=$userdate['username'];
    if(!$username){
        return;
    }
    $password=sha1($userdate['password']);
    $first_name=$userdate['first_name'];
    $last_name=$userdate['last_name'];
    global $db;
    if(!user_exist($username)){
        $db->query("
        INSERT INTO users (username,password,first_name,last_name)VALUES
        ('$username','$password','$first_name','$last_name');
        ");
    }
    else{
        $db->query("
        UPDATE users
        SET password='$password',first_name='$first_name',last_name='$last_name'
        WHERE username='$username';
        ");
    }
}
function update_userdata($userdate){
    add_user($userdate);
}
function get_user($username) {

  if(!$username) {
    return null;
}
global $db;
$result = $db->query("
    SELECT *
    FROM users
    WHERE username = '$username'
");

$row = $result->fetch_assoc();
return $row;
}
function delete_user($username){
    if(!user_exist($username)){
        return;
    }
    else{
        global $db;
        $db->query("
        DELETE FROM users
        WHERE username='$username';
        ");
    }
}
