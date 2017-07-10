<?php
class Sporter_list extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
		
		$this->load->model('admin_model/sporter_model');
	}
	
	public function index(){
		$this->load->model('admin_model/sporter_model');
		$thisYear=$this->sporter_model->get_season_year();
		$temp=$this->sporter_model->get_all_temp();
		// var_dump($_POST);
		$teid=$this->input->post('teid');
		$sports=array();
		if (!empty($_POST) and $teid!='') {
			$where="teid=$teid";
			$sports=$this->sporter_model->get_('sports',$where);
		}
		$data['temp']=$temp;
		$data['thisYear']=$thisYear[0];
		$data['de_temp']=$teid;
		$data['sports']=$sports;
		$this->load->view('index_view/sporter_list.html',$data);
		
	}
}
?>