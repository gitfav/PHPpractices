<?php

class LoginController extends Controller{

	//登陆方法
	public function login(){
		if(IS_POST){
			//获取用户信息
			$users = require './data/user.php';
			foreach ($users as  $u) {
				//如果用户名密码一致，那么登陆成功
				if($u['username']==$_POST['username'] && $u['password']==$_POST['password']){
					//如果选择了7天登陆，则设定cookie的过期时间
					if(isset($_POST['day7'])){
					
						setcookie(session_name(),session_id(),time()+3600*24*7);
					}
					//将用户名存入session
					$_SESSION['user'] = $_POST;
					$this->success('./index.php','登陆成功');
				}
			}
			//全部比对完，说明用户没注册过
			$this->error('./index.php?c=login&a=login','用户名不存在');
		}else{
			$this->display();
		}
	}

	//注册方法
	public function register(){
		if(IS_POST){
			$data = require './data/user.php';
			$data[] = $_POST;
			$path = './data/user.php';
			$this->write_db($data,$path);
			$this->success('./index.php?c=login&a=login','用户注册成功');
		}else{
			$this->display();
		}
	}

	public function out(){

		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		// echo 111;
		$this->success('./index.php','退出成功');
	}
}