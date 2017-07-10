<?php

//isset 检测变量是否存在，存在返回boole值true 不存在返回false
// var_dump(isset($_GET['b']));
var_dump(isset($_GET['b']));


// $b = isset($_GET['b']) ? $_GET['b'] : '';

// echo $b;


$d = 123;

// echo $d;
//unset 删除变量$d
unset($d);

// echo $d;


//检测常量是否存在  defined(常量名)

define('ABC',123);

echo ABC;


var_dump(defined('ABC'));

var_dump(defined('BCS'));