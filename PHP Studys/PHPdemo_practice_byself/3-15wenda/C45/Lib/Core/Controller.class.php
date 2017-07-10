<?php

class Controller extends SmartyView{

	//成功跳转方法
	protected function success($msg,$url='./index.php'){
		header('Content-type:text/html;charset=utf-8');
		echo "<script>alert('$msg');location.href='$url';</script>";
		die;
	}

	protected function error($msg){
		header('Content-type:text/html;charset=utf-8');
		echo "<script>alert('$msg');window.history.back();</script>";
		die;
	}
}
?>