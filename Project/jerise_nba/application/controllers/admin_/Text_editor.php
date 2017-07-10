<?php
class Text_editor extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
		$this->load->model('admin_model/agende_list_model');
		$this->load->library('Session');
		// var_dump($_SESSION);
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}
	}
	public function index(){
		$post=$this->input->post();
		if (empty($post)) {
			$this->load->view('admin_view/text');
		}else{
			// var_dump($post);
			$post['new_time']=time();
			$this->agende_list_model->add_('new',$post);
			$data['url']=site_url('admin_/text_editor');
			$this->load->view('admin_view/a_success.html',$data);
		}
	}

	public function add_his(){
		$post=$this->input->post();
		if (empty($post)) {
			$this->load->view('admin_view/text_h');
		}else{
			$post['h_time']=time();
			$this->agende_list_model->add_('temp_his',$post);
			$data['url']=site_url('admin_/text_editor/add_his');
			$this->load->view('admin_view/a_success.html',$data);
			// var_dump($post);
		}
		
	}
}
?>