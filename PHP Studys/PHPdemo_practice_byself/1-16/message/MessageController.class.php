<?php
/*
*	留言板控制器 
*/
class MessageController{

	private $message;//存放老数据的属性

	public function __construct(){
		//获取老数据
		$this->message = require './db.php';
	}
	//显示首页方法
	public function index(){
		//因为模板中遍历的是$message 数组，所以将留言存入$message	
		$message = $this->message;
		//载入首页模板
		require './index.html';
	}
	//添加留言方法
	public function add(){
		$message = $this->message;
		//添加留言的时间
		$_POST['time'] = time();
		//添加留言
		$message[] = $_POST;
		//将留言覆盖数据库,完成新数据的添加
		$data = var_export($message,true);
		$data = "<?php \n return $data;\n?>";
		file_put_contents('./db.php', $data);
		//跳转回首页
		echo "<script>alert('添加留言成功');location.href='./index.php'</script>";
	}
	//显示编辑方法
	public function edit(){
		if(IS_POST){

		}else{
			require './edit.html';
		}
	}
	//显示删除方法
	public function del(){
		echo 'Message这里是删除';
	}
}
?>