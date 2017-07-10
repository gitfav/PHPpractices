<?php

$name = 'c45';

setcookie('name',$name);//设置cookie 时间会话

setcookie('age',19,time()+3600,'/c45');

var_dump($_COOKIE);
?>