<?php
class LoginController extends Controller{
	public function login(){
		if (IS_POST) {
			$message=require'./data/user.php';
			foreach ($message as $v) {
				if ($_POST['username']==$v['username']&&$_POST['password']==$v['password']) {
					if (isset($_POST['day7'])) {//如果选择了7天登陆，则设定cookie的过期时间
						setcookie(session_name(),session_id(),time()+3600*24*7);
					}
					$_SESSION['user']=$_POST;//将用户名存入session
					$this->success('./index.php','登入成功');
				}		
			}
			$this->error('./index.php?c=login&a=login','用户不存在');
		}
		else {
			if (!is_file('./data/user.php')) {
				$data='<?php return ?>';
				file_put_contents('./data/user.php', $data);
			}
			$this->display();
		}
	}

	public function register(){
		if (IS_POST) {
			$message=require'./data/user.php';
			$message[]=$_POST;
			$this->write_db($message,'./data/user.php');
			$this->success('./index.php?c=login&a=login','注册成功');
		}
		else {
			if (!is_file('./data/user.php')) {
				$data='<?php return ?>';
				file_put_contents('./data/user.php', $data);
			}
			$this->display();
		}
	}

	public function out(){
		unset($_SESSION['user']);
		$this->success('./index.php','删除成功');
	}
}
?>