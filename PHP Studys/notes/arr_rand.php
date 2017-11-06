<?php

header("Content-Type: text/html; charset=utf-8");

$a = ['a', 'b', 'c'];
$b = array_rand($a,2); //从数组中随机去除两个数

var_dump($b);