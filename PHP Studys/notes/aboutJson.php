<?php

header("Content-Type: text/html; charset=utf-8");
$arr = [
    '1'=>'你好',
    '2'=>'很好',
    '3'=>'拉拉',
];
$arr = json_encode($arr,JSON_UNESCAPED_UNICODE); //加入 JSON_UNESCAPED_UNICODE 参数，中文部不被解析成unicode
var_dump($arr);