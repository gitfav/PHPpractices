<?php
require '../../functions.php';
$arr = array(
	'asdgv'		=>123,
	'aaa'		=>222,
	'BBB'		=>array(
		'ccc'=>'dfdsf',
		'ddd'=>'12312',
		'fff'=>array(
			'HHH'=>123,
			'GGG'=>'23232',
			'nnn'=>'sdfsdf',
			),

		),
	);

function digui($arr,$flag=1){

	$case = $flag==1 ? CASE_UPPER : CASE_LOWER;
	$arr = array_change_key_case($arr,$case);
	
	foreach ($arr as $k => $v) {
		if(is_array($v)){
			$arr[$k] = digui($v,$flag);
		}
	}
	return $arr;
}

p(digui($arr,2));


