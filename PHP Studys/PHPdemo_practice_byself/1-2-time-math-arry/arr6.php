<?php 

	header("Content-type:text/html;charset=utf-8");
	require_once "functions.php";


	$arr=array(
		'a'=>array(
			'u'=>array(
				'o'=>'32',
				'r'=>'sd'
			),
			'i'=>'fee',
			'l'=>'543d'
		),
		'bd'=>'dwdx',
		'cq'=>'mj',
		'd'=>'pihg',
		'e'=>'gf vb',
		'f'=>'fgsfv',
		'g'=>'4frr5',
		5
	);
	//返回字符串键名全为小写或大写的数组
	//默认改成小写 //不支持递归操作
	$arr=array_change_key_case($arr);
	p($arr);
	$arr=array_change_key_case($arr,CASE_UPPER);
	p($arr);
	$arr=array_change_key_case($arr,CASE_LOWER);
	p($arr);

	$str='123456';
	var_dump(is_array($str));
	var_dump(is_string($str));


 ?>