<?php

function get_title()
{
    echo 'loggin';
}

function get_content()
{
?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">login </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">username</label>
                        <div class="col-sm-10">
                            <?php
    $username = '';
    if (isset($_POST['username']))
        $username = $_POST['username'];
                            ?>
                            <input class="form-control" id="username" name="username" placeholder="username"
                                value="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="login" class="btn btn-primary">login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
<?php
}
function process_inputs()
{

    if (!isset($_POST['login'])) {
        return;
    }
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (empty($username)) {
        add_message('username field can not be empty', 'error');
        return;
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    if (empty($password)) {
        add_message('password field can not be empty', 'error');
        return;
    }
    user_login($username, $password);
    if (!is_user_logged_in()) {
        add_message('invalid username or password', 'error');
    } else {
        redirect(home_url('dashboard'));
    }

}
process_inputs();
?>