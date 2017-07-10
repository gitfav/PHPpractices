<?php
class Register extends CI_Controller{
	public function __construct(){
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('I_PUBLIC',base_url("public/index"));
		define('A_PUBLIC',base_url("public/admin"));
		// 设置session
		$this->load->model('index_model/common_list_model');
		$this->load->library('session');//session需要在加载model后才能引入
		// 设置缓存
		// $this->output->cache(60/60);
	}
	//注册部分
	public function index(){
		$post=$this->input->post();
		if (!empty($post)) {
			// var_dump($post);
			$user=array(
				'username' => $post['uname'],
				'password' => md5($post['pw']),
				'restime' => time(),
				'nname' => $post['nname'],
			);
			$this->common_list_model->add_('user',$user);
			// 链接回主页
			$url=site_url('');
			echo "<script>location.href='$url';</script>";
		}else{
			$this->load->view('index_view/register.html');
		}
	}
	//登录部分
	public function login(){
		$post=$this->input->post();
		$where="username='{$post['logname']}'";
		$_SESSION['username']=$post['logname'];
		// var_dump($post);
		if (isset($post['rem'])) {
			setcookie(session_name(),session_id(),time()+3600*24*7,'/');
		}else{
			setcookie(session_name(),session_id(),0,'/');
		}
		
		$time['logintime']=time();
		$this->common_list_model->update_('user',$time,$where);
		// 链接回主页
		// $url=site_url('');
		echo "<script>history.back();</script>";
	}
	//退出
	public function out(){
		$this->load->library('session');
		session_unset();
		session_destroy();
		// $url=site_url('');
		echo "<script>history.back();</script>";
	}
}
?>