<?php 

	header("Content-type:text/html;charset=utf-8");
	require_once"./functions.php";
	$a=1.98;

	//向上取整
	echo ceil($a),"</br>";
	//向下取整
	echo floor($a),"</br>";

	//四舍五入
	$b=1.45;
	echo round($b),"<hr>";

	//去最大值和最小值
	$max=max(1,4,2,4.2,-2);
	$min=min(23,24,2.1,0.32);
	echo $max,"</br>",$min,"</br>";

	//随机生成随机数
	$rand=mt_rand(5,9);	//只能生成整数
	echo $rand,"</br>";

	$arr=array("一号同学","7号","周老师","009");
	$rand=$arr[mt_rand(0,3)];
	p($rand);

	//指数
	$total=pow(2,4);	//2*2*2*2
	p($total);

 ?>