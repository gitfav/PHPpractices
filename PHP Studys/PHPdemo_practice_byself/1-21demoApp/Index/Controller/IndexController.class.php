<?php
class IndexController extends Controller{

	public function index(){
		$message = require './db.php';
		if(IS_POST){
			$_POST['time'] = time();
			$message[] = $_POST;
			$this->write_db($message);
			$this->success('留言添加成功');

		}else{
			$this->assign('message',$message);
			$this->assign('user','yuonly');
			// $this->var;
			// $message = $this->var['message'];
			// $user = $this->var['user'];
			// require APP_VIEW.'/Index/index.html';
			$this->display();
			// $this->display();
		}
		
	}

	public function add(){
		$this->display();
	}
}