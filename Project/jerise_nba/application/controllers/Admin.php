<?php
class Admin extends CI_Controller{
	public function  admin(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		$this->load->helper('cookie');
		define('A_PUBLIC', base_url("public/admin"));
	}
	public function index(){
		$this->load->model('admin_model/agende_list_model');
		$this->load->library('session');
		
		if (isset($_SESSION['admin_name']) || isset($_SESSION['admin_id'])) {
			$session['admin_name']=$_SESSION['admin_name'];
			$session['admin_id']=$_SESSION['admin_id'];
			$where="uid={$session['admin_id']}";
			$user=$this->agende_list_model->get_('user',$where);
			$data['user']=$user[0];
			$this->load->view('admin_view/index',$data);
		}else{
			$this->load->view('admin_view/login.html');
		}
	}


}
?>