<?php
function process_inputs(){
    user_logout();
    redirect(home_url('login'));
}
process_inputs();
?>