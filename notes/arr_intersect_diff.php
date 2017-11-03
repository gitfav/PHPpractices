<?php

header("Content-Type: text/html; charset=utf-8");


$arr1 = ['1','d'];
$arr2 = ['1','d','6'];
var_dump(array_intersect($arr1,$arr2)); //取数组间的交集

$a = array_diff($arr1,$arr2);   //计算数组间的差集
$b = array_diff($arr2,$arr1);

//如果$a和$b都为空 ，说明$arr1 = $arr2。