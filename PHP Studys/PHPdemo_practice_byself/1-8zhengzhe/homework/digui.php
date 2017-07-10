<?php
require '../../functions.php';
$str = 'USDFSD';
// echo strtolower($str);
// echo strtoupper($str);

// strtoupper(sdfsda)

$arr = array(
	'sdf'=>array(
		'1' => 'JKLDJF',
		'2' => 'sdjflksdj',
		'3' => array(
			'sdafsadf',
			'SDFSDA',
			'dfdDFA',

			),
		),
	'1' => 'SDFDSF',
	0=> 'sdfdsf',
	);
//三元表达式，简写板
// function change_arr_value($arr,$flag=1){
// 	$func = $flag==1 ? 'strtolower' : 'strtoupper';
// 	foreach ($arr as $k => $v) {
// 		$arr[$k] = is_array($v) ? change_arr_value($v,$flag) : $func($v);
// 	}
// 	return $arr;
// }


function change_arr_value($arr,$flag=1){
	$func = $flag==1 ? 'strtolower' : 'strtoupper';
	foreach ($arr as $k => $v) {
		if(is_array($v)){
			$arr[$k] = change_arr_value($v,$flag);
		}else{
			$arr[$k] = $func($v);
		}
	}
	return $arr;
}


p(change_arr_value($arr,2));



echo "<hr>";

$func = 'strtolower';

$str = 'JKLJsdfasdfds';

echo strtolower($str);echo "<hr>直接用函数-------";

echo "<hr>用变量函数func-------------";

echo $func($str);echo "<hr>";


$flag = 2;

$func = $flag==1 ? 'strtolower' : 'strtoupper';

echo $func;










?>