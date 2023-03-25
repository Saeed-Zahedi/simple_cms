<?php

function get_title(){
    global $current_page;
    return $current_page['title'];
}
function get_content(){
    global $current_page;
    echo $current_page['content'];
}  