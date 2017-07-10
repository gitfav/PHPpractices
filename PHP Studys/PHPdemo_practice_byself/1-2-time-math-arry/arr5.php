<?php 

	header("Content-type:text/html;charset=utf-8");
	require_once"functions.php";
	$people=array("西北人","东北人","南方");
	//array_push 向数组末尾压入元素，并返回数组长度值
	array_push($people, "中原人");

	$num=array_push($people, '高原人');//返回值，数组一共有多少元素
	p($people);
	p($num);

	 //删除数组中最后一个元素 ,并返回被删除的元素。
	$num=array_pop($people);
	p($people);
	p($num);

	//删除数组中第一个元素  ,并返回被删除的元素。
	$num=array_shift($people);
	p($people);
	p($num);

	$life=array("苦逼1","苦逼2","苦逼3");
	array_unshift($life,"苦逼4","kubi5");
	p($life);

	//反转数组顺序
	$life=array_reverse($life);
	p($life);

	$abc=array('name'=>'laozhou','age'=>10,'address'=>'beijing');
	//将数组的键名提出，返回一个新数组
	$new=array_keys($abc);
	p($new);
	//将数组的键值提出，返回一个键值新数组
	$value=array_values($abc);
	p($value);


 ?>