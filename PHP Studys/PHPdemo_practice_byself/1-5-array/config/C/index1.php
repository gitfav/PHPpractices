<?php

$config = require './config.php';
require_once"./functions.php";

C($config);

p(C('DB_DRIVER'));


p(C('DB_PORT',23));

new mysqli(C('DBHOST'),'DBUSER',C('PSWF'));
?>