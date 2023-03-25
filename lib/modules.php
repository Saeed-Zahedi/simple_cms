<?php
function render_page(){
include_once('template/header.php');
    if (function_exists('process_inputs')) {
        process_inputs();
    }
    show_messages();
    if (function_exists('get_content')) {
        get_content();
    }
include_once('template/footer.php'); 
}
function load_module(){
    $module = get_module_name();
    if (empty($module)) {
        $module = 'home';
    }
    if(is_user_logged_in()&&$module=='login'){
        redirect(home_url());
    }
    if (file_exists("template/modules/$module.php")) {
        require_once("template/modules/$module.php");
        check_for_authentication_required();
    } elseif (page_exist_by_slug($module)) {
        global $current_page;
        $current_page = get_page_by_slug($module);
        if (!$current_page['hidden']) {
            require_once("template/modules/page-loader.php");
        } else {
            add_message('invlaid address', 'error');
            require_once("template/modules/home.php");
        }
    }
    else {
        add_message('invlaid address', 'error');
    require_once("template/modules/home.php");
}
render_page();
}
function check_for_authentication_required(){
    if (is_authentication_required()&&!is_user_logged_in()) {
        $login_url=home_url('login');
        redirect($login_url);
    }
}
function is_authentication_required()
{
    if (function_exists('authentication_required')) {
        return authentication_required();
    }
    return false;
}
$messages = array();
function add_message($message=null,$type='error'){
    if (!$message) {
        return;
    }
    global $messages;
    $messages[] = array(
        'message' => $message,
        'type' => $type,
    );
}
function show_messages(){
    global $messages;
    if (empty(($messages))) {
        return;
    }
    foreach($messages as $iteam){
        $message = $iteam['message'];
        $type = $iteam['type'];
        if ($type == 'error') {
            $type = 'danger';
        }
    }
    ?>
    <div class="alert alert-<?php echo $type; ?> alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $message?>
</div>
<?php
}
?>