<?php
class LoginController extends Controller{

	public function register(){
		if ($_POST['pwd']!=$_POST['pwded']) {
			error('index.php','两次密码不一样');
			die;
		}
		if ($_POST['code']!=$_SESSION['code']) {
			error('./index.php','验证码错误');
			die();
		}
		if (K('user')->addUser()) {
			success('./index.php','注册成功');
		}else {
			error('./index.php','注册失败');
		}
	}

	public function code(){
		
		$code = new Code();
   		$code->show();
	}
}
?>