<?php

	//include载入文件失败，但后面的代码还可以被执行。
	// $abc=123;
	// include './index23.html';

	// echo 1234;

	// //require致命性错误，载入文件失败，后面代码不执行。
	// $abc=123;
	// require './index23.html';
	// echo 12345;

	//include多次载入
	// $abc=123;
	// include'./index1.html';
	// include'./index1.html';
	// echo 12345;

	//require多次载入
	$abc=123;
	require'/index1.html';
	require'/index1.html';
	echo 123;
?>