<?php
class Sporter_list extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
		
		$this->load->model('admin_model/sporter_model');
		$this->load->library('Session');
		// var_dump($_SESSION);
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}
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
		$this->load->view('admin_view/sporter_list.html',$data);
		
	}

	public function add_sporter_view(){
		$this->load->model('admin_model/sporter_model');
		$data['temp']=$this->sporter_model->get_all_temp();
		$this->load->view('admin_view/add_sporter.html',$data);
	}
	public function add_sporter(){
		$data=$this->input->post();
		if ($data['teid']=='YES') {
			$data['teid']='';
			$data['is_in_union']='YES';
		}
		// var_dump($data);
		$this->load->model('admin_model/sporter_model');
		$query=$this->sporter_model->put_sporter($data);
		// var_dump($query);
		if ($query) {
			$data['url']=site_url('admin_/sporter_list/add_sporter_view');
			$this->load->view('admin_view/a_success.html',$data);
		}
	}
	public function alter_sporter(){
		$num=$this->uri->segment(4);
		$this->load->model('admin_model/sporter_model');
		if (empty($_POST)) {
			$where="spid=$num";
			$sporter=$this->sporter_model->get_('sports',$where);
			$temp=$this->sporter_model->get_all_temp();
			$data['temp']=$temp;
			$data['sporter']=$sporter[0];
			$this->load->view('admin_view/alter_sporter.html',$data);
		}else{
			$alter=$this->input->post();
			// echo $num;
			$where="spid=$num";
			$this->sporter_model->update_('sports',$alter,$where);
			$data['url']=site_url("admin_/sporter_list");
			$this->load->view("admin_view/alter_success.html",$data);
		}		
	}
}
?>