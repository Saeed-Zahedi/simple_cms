<?php
session_start();
define('MYSQL_SERVER', 'localhost');
define('MYSQL_DATABASE', 'simple_cms');
define('MYSQL_USERNAME', 'saeed');
define('MYSQL_PASSWORD', '1234');
define('DB_FILENAME','myapp.data');
define('SITE_URL','http://localhost/faradars/project1/');
define('SITE_PATH',__DIR__);
define('APP_TITLE','SIMPLE CMS');

foreach(glob('lib/*.php') as $file){
    include_once($file);
}