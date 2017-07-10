<?php

//==========获取文件名,及文件夹名
// $file = './abc/c/d/index.php';

// $filename = basename($file);

// echo $filename;

// echo "<hr>";

// $dir = './abc/c/b';

// echo basename($dir);

//============获取路径 文件及文件夹==========

// $file = './abc/c/b/index.php';

// echo dirname($file);

// $dir = './absdfsd/index/';

// echo dirname($dir);


//================文件是否存在 判断文件或文件夹是否存在==========

// $file = './abc/c/index.php';

// $file1 = './file1.php';
// $re = file_exists($file1);

// // var_dump($re);

// $dir = '../1-9-file-dir12';

// $re = file_exists($dir);

// var_dump($re);

//==============判断文件夹是否存在 

// $dir = '../1-9-file-dir';

// // $re = is_dir($dir);

// // var_dump($dir);

// $file = './file1.php';

// $re = is_dir($file);

// var_dump($re);

//=================mkdir 创建目录 支持递归

$dir = './mkdir';
//如果不存在，创建目录
// if(!is_dir($dir)){
// 	mkdir($dir);
// }
// is_dir($dir) || mkdir($dir);


$dir = './mkdir/abc/c/d/e';
//递归创建 需传递后两个参数
is_dir($dir) || mkdir($dir,0777,true);

//=============课堂练习===============

// $dir1 = 'temp/cache';

// $dir2 = 'controller';

// $dir3 = 'model';

// $dir4 = 'view';

// $dirs = array(
// 	 'temp/cache',
// 	 'controller',
// 	 'model',
// 	 'view'
// 	);

// if(!empty($dirs)){
// 	foreach ($dirs as $d) {
// 		is_dir($d) || mkdir($d,0777,true);
// 	}
// }


//===================rmdir 删除文件夹 不支持递归
// $dir = './temp';

// is_dir($dir) and rmdir($dir); 

//==============重命名===============
is_file('./model') and rename('./model', './model123');

//=============复制 

// $res = './file1.php';

// $dst = './file1_copy.php';

// copy($res,$dst);

//复制文件夹测试   否=========要想复制文件夹，创建文件夹---复制文件夹中文件
// $resDir = '../1-5-array';

// $dstDir = './copyDirTest';

// copy($resDir,$dstDir);








?>