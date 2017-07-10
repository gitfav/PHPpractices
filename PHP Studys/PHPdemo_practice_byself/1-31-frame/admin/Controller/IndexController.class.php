<?php
class IndexController{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo "<h2 style='text-align:center'>欢迎使用C45框架</h2>";
	}
}
?>