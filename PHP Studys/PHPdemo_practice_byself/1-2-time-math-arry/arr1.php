<?php

require_once '../functions.php';
//索引数组，下标由数字组成
//声明方式一：
$arr = array(1,2,3,5,7,9,8);
//声明方式二：
$arr = array(0=>1,4=>6,8=>7,3=>5);
//声明方式三：
$arr1[6] = 'houdun';
$arr1[3] = 'wang';
$arr1[2] = '1';
$arr1[1] = 567;

//关联数组  键名不是数字
$a = array(
	'a'=>123,
	'b'=>456,
	'c'=>888,
	'd'=>'houdunwang',
	'e'=>'老周',
	);

// p($a);

//多维数组 
$b = array(
	array(
		'sdafb'=>5,
		'sdfc'=>6,
		'd'=>array(
			1,3,4,65
			),

		),
	2,
	44,
	6,

	);
//留言板
$message = array(
	array(
		'user' => 'zhoulaoshi',
		'title'=> '短短三天，我们已经认识两年了',
		'content'=>'没有这么套近乎的',
		'addtime'=>'2015-01-02 18:18:18'
		),
	array(
		'user' => 'XuTianQing',
		'title'=> '高富帅都像爷这么活着',
		'content'=>'车子票子房子儿子妻子，五子登科',
		'addtime'=>'2015-01-02 18:20:28'
		),
	array(
		'user' => 'WangNing',
		'title'=> '我们屌丝就不能逆袭了么？',
		'content'=>'哥们智商高绝',
		'addtime'=>'2015-01-02 20:20:28'
		),

	);
//给数组添加新元素
$message[] = array(
	'user' => 'GuLaoShi',
	'title'=> '五套房的土豪',
	'content'=>'东南西北想睡哪儿睡哪儿',
	'addtime'=>'2015-01-02 21:20:28'

	);
//删除数组中的元素
unset($message[1]);
//修改

$message[2] = 123;
// p($message);



//**********



?>