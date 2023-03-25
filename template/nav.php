<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo APP_TITLE; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          
          <li><a href="<?php echo home_url('home'); ?>">home</a>
         <?php display_pages_list(false); ?>  
        </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php if(is_user_logged_in()):?>
            <li><a href="<?php echo home_url('dashboard')?>">users page</a></li>
            <li><a href="<?php echo home_url('edit-pages')?>">edit pages</a></li>
          <li><a href="<?php echo home_url('logout');?>">logout</a></li>
          <?php else:?>
           <li> <a href="<?php echo home_url('login');?>">loggin</a></li>
          <?php endif;?>
        </li>
      </ul>
        </div>
      </div>
    </nav>
