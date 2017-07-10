<?php 

	header("Content-type:text/html;charset=utf-8");
	require_once"./functions.php";

	$arr=array(1,0,3,2,0,5,0);
	//用array_filter过滤掉了数组中的0（falsh）。
	$arr=array_filter($arr);
	p($arr);

	function func($v){
		if ($v==3) {
			return true;	//返回true时，值被保留。
		}else{
			return false;	//返回falsh时，值被过滤。	
		}
	}
	$arr=array_filter($arr,'func');	//循环过滤掉得到需要的值，就是返回true（不为0）的值。
	p($arr);

	$arr1=array('baise','hongse','lanse','lvse');
	$arr2 = array('baise','fense','lanse','heise');
	function ap($arr1,$arr2){
		if ($arr1===$arr2) {
			return 'same';
		}
		else {
			return'different';
		}
	}
	$new=array_map('ap',$arr1,$arr2);
	p($new);
