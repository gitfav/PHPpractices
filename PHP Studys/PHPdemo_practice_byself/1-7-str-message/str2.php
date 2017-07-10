<?php 

	//统计字符串长度
	$str='1234567';
	echo strlen($str),'</br>';

	//trim函数
	$str="         123123abdfad          ";
	echo $str,'</br>';
	echo trim($str),'</br>';//去除前后的空格
	$str="@@@@@1 1231231231@@@@";
	echo trim($str,'@'),'</br>';	//去掉前后的@
	echo trim(trim($str,'@'),1),'</br>';//先去除去掉前后的@，再去除前后的1。
	echo ltrim($str,'@'),'</br>';//去掉左边@
	echo rtrim($str,'@'),'</br>';//去掉右边@

 ?>