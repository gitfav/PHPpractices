<?php

$arr = array(1,2,3);

$str = serialize($arr);//序列化后可存入cookie

setcookie('arr',$str);//写入cookie

$a = unserialize($_COOKIE['arr']);//从已存储的表示中创建 PHP 的值

var_dump($a);



?>