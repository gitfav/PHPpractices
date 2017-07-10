<?php
	require '../functions.php';

	// $dir = '../1-5-array/*';

	// $files = glob($dir.'/*');//返回该路径下的全部文件及文件夹数组

	// p($files);
//===============输出文件目录树==========
	$dir = '../1-5-array';
	function showDir($dirName,$level=1){
		if(!is_dir($dirName))return false;	
		echo str_repeat("&nbsp;&nbsp;&nbsp;",$level)."<font color=red>".$dirName."<br/>";
		$scDir = glob($dirName.'/*');
		foreach($scDir as $v){
			if(is_dir($v)) showDir($v ,$level+1);
			if(is_file($v))	echo  str_repeat("&nbsp;&nbsp;&nbsp;",$level+1)."├─".$v."<br/>";
		}
		return;
	}

	showDir($dir);

//删除文件  unlink

	// unlink('./laji.php');

//删除目录下所有的文件及文件夹 

	function del($dir){
		if(!is_dir($dir)) return false;
		//把我的子孙干掉
		foreach (glob($dir.'/*') as  $d) {
			is_dir($d) ? del($d) : unlink($d);
		}
		//最终删掉我自己
		rmdir($dir);
	}


	// $dir = './model123';

	// del($dir);


//==============复制文件夹操作===============
	//  './abc'     './my/test/abc';
function cp($res,$dst){
	//1，组合正真的目标路径

	//2,创建该目录

	//3,遍历$res来源文件夹 如果是文件 copy复制 如果是文件夹 递归调用自己

}

//统一路径
// \   换成  /  统一处理成结尾没有/
function changePath($path){
	return rtrim(str_replace('\\', '/', $path),'/');
}

$dir = 'www\abc\dfd/asdf/';

$dir2 = 'abc/sdfs\sdfs\sdf';

$glob1 =  changePath($dir);

echo $glob1;
echo "<hr>";
$glob2 =  changePath($dir2);

echo $glob2;
?>