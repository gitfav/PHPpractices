<?php
/*
*	为了学习但入口 通过get参数访问不同控制器中不同方法而创建的类
*/
class TestController{

	public function index(){
		echo '这是Test中的index';
	}

	public function begin(){
		echo '这是Test中的begin';
	}

	public function end(){
		echo '这是Test中的end';
	}

}

?>