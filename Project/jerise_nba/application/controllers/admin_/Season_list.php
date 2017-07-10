<?php
class Season_list extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
		$this->load->model('admin_model/season_list_model');
		$this->load->library('Session');
		// var_dump($_SESSION);
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}
	}
	public function index(){
		$this->load->model('admin_model/season_list_model');
		$data['season']=$this->season_list_model->get_season();
		if (empty($_POST)) {
			foreach ($data['season'] as $k => $v) {
				if ($v['this_season']=='YES') {
					$data['this_season']=$v['year'];
				}
			}
			$this->load->view('admin_view/alter_season.html',$data);
		}else{
			$this_year=$this->input->post();
			foreach ($data['season'] as $k => $v) {
				if ($this_year['sid']==$v['sid']) {
					$v['this_season']='YES';
					$up['year']=$v['year'];
					$up['this_season']=$v['this_season'];
					$where='sid='.$v['sid'];
					$this->season_list_model->alter_season($up,$where);
				}elseif ($v['this_season']=='YES') {
					$v['this_season']='NO';
					$down['year']=$v['year'];
					$down['this_season']=$v['this_season'];
					$where='sid='.$v['sid'];
					$this->season_list_model->alter_season($down,$where);
				}
			}
			$data['url']=site_url('admin_/season_list');
			$this->load->view('admin_view/alter_success.html',$data);
		}
	}
	public function add_season(){
		if (empty($_POST)) {
			$this->load->view('admin_view/add_season.html');
		}else{
			$this->load->model('admin_model/season_list_model');
			$data=$this->input->post();
			$season['year']=$data['year'];
			if ($data['default']=='YES') {
				$where="this_season='YES'";
				$t_data['this_season']='NO';
				$this->season_list_model->alter_season($t_data,$where);
			}
			$season['this_season']=$data['default'];
			$query=$this->season_list_model->add_season($season);
			$where="year={$data['year']}";
			$year=$this->season_list_model->get_s('sid','season',$where);
			$temp=$this->season_list_model->get_all_temp();
			foreach ($temp as $k => $v) {
				$where="season={$data['year']} and teid={$v['teid']}";
				if ((!$this->season_list_model->get_s('*','temp_season',$where)) and $v['teid']!=0) {
					$t_season=array(
						'season' => $data['year'],
						'sid' => $year[0]['sid'],
						'teid' => $v['teid'],
					);
					$this->season_list_model->add_('temp_season',$t_season);
				}
			}
			if ($query) {
				$da['url']=site_url('admin_/season_list/add_season');
				$this->load->view('admin_view/alter_success.html',$da);
			}else{
				show_error('插入失败');
			}
			// var_dump($data);
		}
	}
}
?>