<?php

function get_title(){
    echo 'new page';
}

function get_content()
{
?>
     
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="title" name="title" placeholder="page title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">slug</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="slug" name="slug" placeholder="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">content</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="10" name="content" id="content"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-2 control-label">
                        <label>
                            <input type="checkbox" value="" id="hidden" name="hidden">
                           hidden:
                        </label>
                        </div>
                    </div>
                    <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">save</button>
            </div>
        </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({ selector:'textarea' });</script>


<?php
}
function process_inputs(){
    if (empty($_POST)) {
        return;
    }
    $page = $_POST;
    $page['id'] =null;
    if (isset($page['hidden'])&&$page['hidden'] === 'on') {
        $page['hidden'] = 1;
    } else {
        $page['hidden'] = 0;
    }
    $id=add_page($page);
    redirect(get_page_edit_url($id));
}