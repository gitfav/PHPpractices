<?php

class ClassName123{

	public function __construct(){
		//类名
		echo __CLASS__;


	}

	public function test(){
		//方法名
		echo __METHOD__;
	}

	public function getPath(){
		//获取当前文件绝对路径
		echo __FILE__;
	}
}


$c1 = new ClassName123();

// $c1->test();
echo "<br>";
$c1->test();

?>