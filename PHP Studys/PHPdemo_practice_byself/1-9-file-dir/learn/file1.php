<?php


//is_writable 判断文件是否可写
$file = './dir1.php';

// var_dump(is_writable($file));

// //is_readable 判断文件是否可读

// var_dump(is_readable($file));

//===========计算文件大小= filesize 只能计算文件大小，无法计算文件夹大小-===========

$file = './dir1.php';

// echo filesize($file);

$dir = '../1-5-array';

// echo filesize($dir);

//=======================计算文件夹大小================

function getSize($dir){
	if(!is_dir($dir)) return false;
	$total = 0;//累计大小变量
	foreach (glob($dir.'/*') as  $d) {
		//是文件夹 递归  是文件 计算大小
		$total += is_dir($d) ? getSize($d) : filesize($d);
	}
	return $total;
}

$dir = '../1-5-array';

echo getSize($dir);




?>