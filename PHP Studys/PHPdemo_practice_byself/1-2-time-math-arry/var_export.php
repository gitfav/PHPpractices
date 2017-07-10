<?php

	$arr = array(
		array(
			'user'=>'laozhou',
			'title'=>'学习不刻苦不如卖红薯',
			'content'=>'好的',

			),
		array(
			'user'=>'laozhou',
			'title'=>'学习不刻苦不如卖红薯',
			'content'=>'好的',

			),
		array(
			'user'=>'laozhou',
			'title'=>'学习不刻苦不如卖红薯',
			'content'=>'好的',

			),

		);
//输出或返回一个变量的字符串表示
//将数组转换成字符串的表示，并返回
	$data = var_export($arr,true);

	var_dump($data);
?>