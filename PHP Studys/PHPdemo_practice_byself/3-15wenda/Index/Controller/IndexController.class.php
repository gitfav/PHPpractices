<?php
class IndexController extends CommonController{

	public function index(){
		// parent::__construct();
		header('Content-type:text/html;charset=utf-8');
		$this->display();
	}

	// 注册界面
	public function reg(){
		if ($_POST) {
			header('Content-type:text/html;charset=utf-8');
			if ($_SESSION['code']!=strtoupper($_POST['verify'])) {
				$this->error('验证码错误，请重新输入。');
			}
			//两次密码检测在js中
			// if ($_POST['pwd']!=$_POST['pwded']) {
				// $this->error('两次密码不一样，请重新输入。');
			// }
			$username=Q($_POST['username']);
			$password=md5(Q($_POST['pwd']));
			$link=@new Mysqli('127.0.0.1','root','','wenda');
			if ($link->connect_errno) die($link->connect_error);
			$stmt=$link->prepare('INSERT INTO hd_user(username,passwd,restime,exp) values(?,?,?,?)');
			if ($stmt) {
				$time=time();
				$exp=5;
				$stmt->bind_param('sssi',$username,$password,$time,$exp);
				if ($stmt->execute()) {
					$this->success('注册成功',__APP__);
				}elseif ($stmt->errno==1062) {
					$this->error('用户名已经存在');
				}
			}else{
				echo $link->error;
			}
			// p($username);
			// p($password);
			// p($_SESSION['code']);
		}
	}
	// 登入界面
	public function login(){
		$username=Q($_POST['account']);
		//账号确定
		$sql="SELECT * FROM hd_user WHERE username='$username'";
		// p($sql);
		$date=M()->query($sql);
		if (!$date) {
			$this->error('账号不存在');
		}
		//密码确定
		$password=md5(Q($_POST['pwd']));
		// p($date[0]['passwd']);
		// p($password);
		if ($date[0]['passwd']!=$password) {
			$this->error('密码错误');
		}
		$_SESSION['username']=$date[0]['username'];
		$_SESSION['uid']=$date[0]['uid'];
		//cookie设置
		if (isset($_POST['auto'])) {
			setcookie(session_name(),session_id(),time()+3600*24*7,'/');
		}else{
			setcookie(session_name(),session_id(),0,'/');
		}
		//写入登录时间
		$time=time();
		$sql="UPDATE hd_user set logintime='$time' where username='$username'";
		M()->exe($sql);
		$this->success('登录成功');
	}

	//账号退出
	public function out(){
		session_unset();
		session_destroy();
		$this->success('退出成功');
	}

	//验证码
	public function code(){
		$code=new Code();
		$code->show();
	}

	//提问界面
	public function ask(){
		header('Content-type:text/html;charset=utf-8');
		if (!isset($_SESSION['uid'])) {
			$this->error("请登入账号");
		}

		$this->display();
	}
	public function asked(){
		if (IS_POST) {
			$content=$_POST['content'];
			$reward=$_POST['reward'];
			$cid=$_POST['cid'];
			$uid=$_SESSION['uid'];
			$time=time();
			if ($content=='') {
				$this->error('请输入提问内容');
			}elseif ($cid==0) {
				$this->error('请输入问题所属分类');
			}else{
				M()->exe("INSERT into hd_ask(content,time,reward,uid,cid) values('$content',$time,$reward,$uid,$cid)");
				M()->exe("UPDATE hd_user set ask=ask+1,exp=exp-$reward,point=point+10 where uid=$uid");
				$this->success('提问成功');
			}
			
			
		}
	}

	public function ajax_cid(){
		$id=$_POST['id'];
		// echo json_encode($id);
		$data=M()->query("SELECT * from hd_category where pid=$id");

		echo json_encode($data);
	}
}
?>