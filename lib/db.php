<?php

global $db;

$db = new mysqli(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
$db->set_charset("utf8");
