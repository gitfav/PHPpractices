<?php 

	//==========获取文件名,及文件夹名
	$file='./as/sd/index.php';//获取文件名
	$filename=basename($file);
	echo $filename,"</br>";
	$dir='./sd/df/p';//获取文件夹名
	echo basename($dir),'<hr>';

	//============获取路径 文件及文件夹==========
	$file = './abc/c/b/index.php';
	echo dirname($file),"</br>";
	$dir = './absdfsd/index/p';
	echo dirname($dir),'<hr>';

	//================文件是否存在 判断文件或文件夹是否存在==========
	$file='./sad/index.php';
	$file_1='./dir1.php';
	$re=file_exists($file);
	var_dump($re);
	$re=file_exists($file_1);
	var_dump($re);

	//=================mkdir 创建目录 支持递归
	$dir='./sds/a/s';
	if (!is_dir($dir)) {
		mkdir($dir,0777,true);
	}

	$dir = './mkdir/abc/c/d/e';
	//递归创建 需传递后两个参数
	is_dir($dir) || mkdir($dir,0777,true);	//此处的‘或’，是先经过左边，如果为0，执行后一句。如果为1，跳过后一句。

	//=============将框架所需要的目彔全部创建==============
	$dirs=array(
		'./all/temp/cache',
		'./all/controller',
		'./all/model',
		'./all/view',
	);
	if (!empty($dirs)) {
		foreach ($dirs as $k => $v) {
			file_exists($v) or mkdir($v,0777,true);//或is_dir($v) || mkdir($v,0777,true);
		}
	}

	//===================rmdir 删除文件夹 不支持递归
	$dir='./all/model';	//不支持递归
	is_dir($dir) && rmdir($dir);//也可以用‘and’。

	//==============重命名==============
	is_file('./all/view') and rename('./all/view', './all/view2');

	//=============复制 
	// $res = './file1.php';
	// $dst = './file1_copy.php';
	// copy($res,$dst);

	//复制文件测试   否=========要想复制文件夹，创建文件夹---复制文件夹中的文件
	$resDir = '../1-5-array/C.php';
	$dstDir = './copyDirTest/D.php';
	copy($resDir,$dstDir);



 ?>