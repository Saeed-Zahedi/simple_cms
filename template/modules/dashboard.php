<?php
function authentication_required(){
    return true;
}

function get_title(){
    echo 'users';
}

function get_content(){
    ?>

    <p>
        only logged in users can see this
    </p>


<?php }