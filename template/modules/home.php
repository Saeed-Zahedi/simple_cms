<?php

function get_title(){
    echo 'home  ';
}
function get_content(){
    ?>

    <p>
    everyone can see this
</p>   
<?php
    $page_count = page_count();
echo "there are $page_count pages in this system"
?>
<?php display_pages_list(); ?>
<?php }