<?php

	header('Content-type:text/html;charset=utf-8;');
	//单引号与双引号的区别
	$d=123456;
	$str='这里是单引号$d';//单引号不解析变量，将内容全部当成字符串原样保留。
	echo $str,'</br>';

	$str="这里是双引号$d";//双引号解析变量。
	echo $str,'</br>';

	//定界符  ---- 定界符跟双引号一样，也解析变量,易于排版，注意定界符前后的空格，否则报错
	$d='这里是变量zzzzzzz';
$str=<<<str
	这里是定界符中的字符串，我们看看是否解析变量
	dsdfsad
	sadfasdfasdsadfsad
	sadfasdfasdf

	$d
str;
	//结束符必须从第一列开始，并且后面除了分号以外不能包含任何其他字符，空格也不可以。
	echo $str ,"</br>";
$str=<<<php
	ssdfasdsadfsad
php;
	echo $str;

$data=<<<data
	<?php
		return $d;
	?>
data;
	echo $data,"<hr>";


	//字符串转义 用\
	$str = "houdunwang\\\".com";//先输出\，再输出"。
	$str_2='houdunwang\".com';//结果与上面一样
	echo $str,'</br>';

	$ab='abcd';
	echo "{$ab}d这里是变量分离测试{$ab}","</br>";//如果$ab不加上双括号而后面加上了字母d，侧会报错。

	$data=array(1,2,3,4,5,6);
	$data=var_export($data,true);

	$data="<?php \r \n return $data; \r \n ?>";//\r \n 好使必须是双引号
	file_put_contents('./data.php', $data);
	

	
?>