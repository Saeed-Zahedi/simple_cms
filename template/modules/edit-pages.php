<?php
function authentication_required(){
    return true;
}

function get_title(){
    echo 'edit pages';
}

function get_content(){
    ?>
    <h3>pages</h3>
    
    <table class="table table-bordered table-hover">
        <tr class="info">
            <th style="width: 60px; ">row</th>
            <th>title</th>
            <th style="width: 240px; ">action</th>
</tr> 
 <?php
 $pages=get_all_pages(true);
    $counter = 0;
    foreach ($pages as $page) {
        $counter++;
        $title = $page['title'];
        $id = $page['id'];
        $hidden = $page['hidden'];
 ?>
    <tr>
        <td>
            <?php echo $counter ?>
</td>
<td>
            <?php echo "<strong>$title</strong>"; ?>
            <?php if ($hidden): ?>
                <span style="font-size: small;">[hidden]</span >
                <?php endif; ?>
                <br>
                <span style="color= #398439">
                <?php echo get_page_url($id); ?>
            </span>
</td>
<td> <a class="btn btn-sm btn-primary" href="<?php echo get_page_edit_url($id);?>">edit
<?php if($hidden):?>
  <a class="btn btn-sm btn-success" href="<?php echo get_page_unhide_url($id);?>">visiable    
    <?php else:?>
<a class="btn btn-sm btn-warning" href="<?php echo get_page_hide_url($id);?>">hide
<?php endif;?>
<a class="btn btn-sm btn-danger" href="<?php echo get_page_delete_url($id);?>">delete</td>
</tr>
<?php }?>
</table>
<br>
    <a class="btn btn-primary" href="<?php echo home_url('new'); ?>">new page</a>
            <?php
    }
function process_inputs(){
    if (empty($_GET)) {
        return;
    }
    $action = strtolower($_GET['action']);
    $id = $_GET['id'];
    switch ($action) {
        case 'hide':
            hide_page($id);
            break;  
            case 'unhide':
                unhide_page($id);
                break;
                case 'delete':
                    delete_page($id);
                    break;

    }
    redirect(home_url('edit-pages'));
}  

