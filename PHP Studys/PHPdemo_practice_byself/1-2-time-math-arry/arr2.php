<?php 
	
	header("Content-type:text/html;charset=utf-8");
	require_once"./functions.php";
	$arr=array('weqw','qwe','df','sad','dfccv','asdds');
	foreach ($arr as $key => $value) {	//一个循环语句
		echo $key;		//返回健名（下标）
		echo $value;		//返回数组的值
		echo "<hr>";	
	}

	foreach ($arr as $k=> $v) {
		echo $k,"</br>";
	}

	foreach ($arr as $v) {
		echo $v,'</br>';
	}
	echo "<hr>";


	//遍历留言
	$message=array(
		array(
			'user'=>'zhoulaoshi',
			'title'=>'短短三天，我们已经认识两年了',
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

	foreach ($message as $k => $v) {
		echo $k;
		echo $v,'</br>';
	}
	echo "<hr>";
	foreach ($message as $key => $value) {
		p($value);
	}
	echo "<hr>";
	foreach ($message[1] as $k => $v) {
		echo $k;
		echo $v,'</br>';
	}
	

 ?>