<?php

	header('Content-type:text/html;charset=utf-8');
	$message=require_once"./db.php";	//把原来的数据给二维数组message，如果没有db.php文件则出错。如果文件无数据返回空值。

	if (!empty($_POST)) {
		$_POST["time"]=time();
		$message[]=$_POST;		//如果$message不加‘[]’，侧只是把$_POST赋值给$message。加上‘[]’定义message这是个二维数组。
		$data=var_export($message,true);	//message包括了全部数据
		$data="<?php return ".$data."?>";
		file_put_contents("./db.php",$data);
		echo "<script>alert('操作成功');location.href='./index.php'</script>";//数据传输完毕,重新刷新回到原界面。
		
	}
	else {
		require_once"./index.html";	//在php文件中，引入了.html文件（相当于引用了这文件的全部文字，如同一个文件。在<form>中点提交按钮相当于把数据传递到_POST全局变量中，然后重新刷新php文件。）
	}

?>