<?php
class IndexController extends Controller{
	
	public function index(){

		if(IS_POST){
			$message = require './data/db.php';
			$_POST['time'] = time();
			$message[] = $_POST;
			$this->write_db($message);
			$this->success('./index.php','留言成功');
		}else{
			$message = require './data/db.php';
			//assign 分配变量,作用是把$message变成属性
			$this->assign('message',$message);
			// $this->assign('user',$user);
			//分析
			// $this->var['message'] = $message;
			// require APP_VIEW.'/Index/index.html';
			//$this->display('index.html');
			$this->display();
		}
	}

	public function edit(){

	}


	// private function success($url,$msg){
	// 	echo "<script>alert('$msg');location.href='$url'</script>";
	// }

	public function ajaxAdd(){
		$message = require './data/db.php';
		$_POST['time'] = time();
		$message[] = $_POST;
		$this->write_db($message);
		echo 1;die;
	}



















	//测试扩展类自动加载的
	public function code(){
		$code = new Code();
		$code->show();
	}
}
?>