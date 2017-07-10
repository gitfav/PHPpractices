<?php 
	header("Content-type:text/html;charset=utf-8");
	require_once"./functions.php";
	$message= array(
		array(
			'user'=>'zhoulaoshi',
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
	echo $message[0]['title'];
	p(current($message));		//返回当前条的值
	p(key($message));		//返回当前条的下标
	echo "<hr>";

	p(current($message));	
	next($message);		//next是将数组中的指针向前移动一位。与prev相反。
	var_dump(current($message));	
	next($message);
	p(current($message));	
	// next($message);
	// var_dump(current($message));

	// //以下是对上面换一种方法输出。
	// while (current($message)) {
	// 	p(current($message));
	// 	next($message);
	// }

	prev($message);
	$c=current($message);	//$c变为一个一维位数组。
	next($c);
	echo key($c),"</br>";
	echo current($c),'<hr>';


	$total=count($message);
	echo $total,'</br>';
	$total=count($message[2]);
	echo $total,'<hr>';

	$arr_b=array(1,2,3,4,6,8);
	//in_array检查一个元素 是否在数组中，如果在返回true，不在返回false
	if (in_array(4, $arr_b)) {
		echo 'Yes';
	}
	else{
		echo 'No';
	}
	echo "</br>";
	//array_key_exists检查给定的键名或索引是否存在于数组中,如果在返回true，不在返回false
	if (array_key_exists(11,$arr_b)) {
		echo "键名在";
	}else {
		echo "键名不在";
	}


 ?>