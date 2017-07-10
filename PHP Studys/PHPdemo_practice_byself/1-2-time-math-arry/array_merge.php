<?php

require_once '../functions.php';

$arr1 = array(1,2,3,4,5);

$arr2 = array(1,3,5,7,8,9);

//索引数组，合并
$new = array_merge($arr1,$arr2);

// p($new);
//关联数组，相同的覆盖，后面的优先级高，不相同的合并
$text1 = array('username'=>'laozhou','age'=>13,'address'=>'beijing');
$text2 = array('username'=>'xutianqing','money'=>'100万','girlfriend'=>'many');
$text3 = array('username'=>'sunlaoshi');
$new = array_merge($text1,$text2,$text3);
p($new);



?>