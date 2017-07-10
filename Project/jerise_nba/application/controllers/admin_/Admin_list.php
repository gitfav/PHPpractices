<?php
class Admin_list extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
		$this->load->model('admin_model/agende_list_model');
		$this->load->library('Session');
		// var_dump($_SESSION);
	}
	
	//注册用户或者管理员
	public function add_admin(){
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}

		$post=$this->input->post();
		if (empty($post)) {
			$this->load->view('admin_view/add_admin.html');
		}else{
			$this->load->model('admin_model/agende_list_model');
			$user=array(
				'username' => $post['username'],
				'password' => md5($post['password']),
				'nname' => $post['nname'],
				'restime' => time(),
			);
			if (isset($post['is_admin'])){
				$user['is_admin']='Y';
			}
			$this->agende_list_model->add_('user',$user);
			$data['url']=site_url('admin_/admin_list/add_admin');
			$this->load->view('admin_view/a_success.html',$data);
		}	
	}
	//用ajax判断用户名是否存在
	public function is_uname(){
		$post=$this->input->post();
		
		if (isset($post['nname'])) {
			$name=$post['nname'];
			$where="nname='{$name}'";
		}
		if (isset($post['username'])) {
			$name=$post['username'];
			$where="username='{$name}'";
		}
		$this->load->model('admin_model/agende_list_model');
		if ($this->agende_list_model->get_('user',$where)) {
			echo 0;
		}else {
			echo 1;
		}
	}
	//异步验证验证码
	public function is_code(){
		$post=$this->input->post();
		$post['verify']=strtoupper($post['verify']);
		if($post['verify']==$_SESSION['code']){
			echo 1;
		}else{
			echo 0;
		}
	}
	//用ajax检测
	public function ajax_login(){
		$post=$this->input->post();
		// var_dump($post);
		// echo 1;
		$username=$post['username'];
		$password=md5($post['pwd']);
		$where="username='{$username}'";
		$user=$this->agende_list_model->get_('user',$where);
		if (empty($user) || $user[0]['password']!=$password) {
			echo 0;
		}else{
			echo 1;
		}
	}
	//管理员的登录
	public function login(){
		// $this->load->library('session');
		$this->load->model('admin_model/agende_list_model');
		$post=$this->input->post();
		$username=$post['userName'];
		$password=md5($post['psd']);
		$post['verify']=strtoupper($post['verify']);

		$this->load->library('session');
		$session['code']=$_SESSION['code'];
		// $session=$this->session->all_userdata('code');
		if ($session['code']!=$post['verify']) {
			header('Content-type:text/html;charset=utf-8');
			echo "<script>alert('验证码错误');window.history.back();</script>";
			die;
		}
		
		$where="username='{$username}'";
		$user=$this->agende_list_model->get_('user',$where);
		if (empty($user) || $user[0]['password']!=$password || $user[0]['is_admin']!='Y') {
			header('Content-type:text/html;charset=utf-8');
			echo "<script>alert('账号或密码错误');window.history.back();</script>";
			die;
		}
		$time['logintime']=time();
		$this->agende_list_model->update_('user',$time,$where);
		$_SESSION['admin_name']=$user[0]['username'];
		$_SESSION['admin_id']=$user[0]['uid'];
		setcookie(session_name(),session_id(),0,'/');
		// var_dump(session_id());
		// 链接回主页
		$url=site_url('admin');
		echo "<script>location.href='$url';</script>";
	}
	//用户退出
	public function out(){
		$this->load->library('session');
		session_unset();
		session_destroy();
		$url=site_url('admin');
		echo "<script>location.href='$url';</script>";
	}
	//更改密码
	public function alter_pw(){
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}


		$this->load->model('admin_model/agende_list_model');
		$this->load->library('session');
		$post=$this->input->post();
		$session['admin_id']=$_SESSION['admin_id'];
		if (empty($post)) {	
			$where="uid={$session['admin_id']}";
			$user=$this->agende_list_model->get_('user',$where);
			$data['user']=$user[0];
			$this->load->view('admin_view/alter_passwd.html',$data);
		}else{
			$post['passwdF']=md5($post['passwdF']);
			$where="uid={$session['admin_id']}";
			$pw['password']=$post['passwdF'];
			$this->agende_list_model->update_('user',$pw,$where);

			$data['url']=site_url('admin_/admin_list/alter_pw');
			$this->load->view('admin_view/alter_success.html',$data);
		}
	}
	//用户列表
	public function user_list(){
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}

		$this->load->model('admin_model/agende_list_model');
		$user=$this->agende_list_model->get_all('user');
		$data['user']=$user;
		$this->load->view('admin_view/admin.html',$data);
	}
	//删除用户
	public function delete(){
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}

		$this->load->model('admin_model/agende_list_model');
		$num=$this->uri->segment(4);
		$del=array(
			"uid" => $num,
		);
		$this->agende_list_model->del_('user',$del);
		$data['url']=site_url('admin_/admin_list/user_list');
		$this->load->view('admin_view/del_success.html',$data);
	}
	//管理员的添加和剔除
	public function is_admin(){
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}

		$this->load->model('admin_model/agende_list_model');
		$num=$this->uri->segment(4);
		// echo $num;
		$where="uid=$num";
		$user=$this->agende_list_model->get_('user',$where);
		// var_dump($user);
		if ($user[0]['is_admin']=='Y') {
			$up=array(
				'is_admin' => 'N',
			);
			$this->agende_list_model->update_('user',$up,$where);
		}else{
			$up=array(
				'is_admin' => 'Y',
			);
			$this->agende_list_model->update_('user',$up,$where);
		}
		$data['url']=site_url('admin_/admin_list/user_list');
		$this->load->view('admin_view/alter_success.html',$data);
	}
}
?>