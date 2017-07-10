<?php 

	require_once '../functions.php';


	$dir='../1-1function';
	$file=glob($dir.'/*');//返回该路径下的全部文件及文件夹数组
	p($file);
	//===============输出文件目录树==========

	$dir='../1-1function';
	function showDir($dirname,$level=1){
		if (!is_dir($dirname)) {return false;}
		echo str_repeat("&nbsp;&nbsp;&nbsp", $level)."<font color=red>".$dirname."</br>";
		foreach (glob($dirname.'/*') as $v) {
			if (is_dir($v)) {
				showDir($v,$level+1);
			}
			if (is_file($v)) {
				echo str_repeat("&nbsp;&nbsp;&nbsp", $level+1)."<font color=red>".'|--'.$v."</br>";
			}
		}
	}

	showDir($dir);


	//删除文件  unlink
	// unlink('./laji.php');
	//删除目录下所有的文件及文件夹
	function del($dirname){
		if (!is_dir($dirname)) {
			return false;
		}
		foreach (glob($dirname.'/*') as $v) {
			if (is_file($v)) {
				unlink($v);
			}
			else{
				del($v);
			}
		}
		rmdir($dirname);
	}

	$dir='./ie';
	del($dir);


	//==============复制文件夹操作===============

 ?>