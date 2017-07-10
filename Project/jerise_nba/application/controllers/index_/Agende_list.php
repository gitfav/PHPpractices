<?php
class Agende_list extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
		$this->load->model('admin_model/agende_list_model');
		$this->load->library('Session');
	}
	//显示球赛表
	public function agende_view(){
		$this->load->model('admin_model/agende_list_model');
		$Year=$this->agende_list_model->get_season_year();//获取此年份的年数
		if (empty($_POST)) {
			$date=date('Y-m');
			$agende=$this->agende_list_model->get_agende($date);
			foreach ($Year as $key => $v) {
				if ($v['this_season']=='YES') {
					$data['pointYear']=$thisYear=$v['year'];//获取选中此赛季的年数
				}
			}
			$data['thisYear']=$thisYear;
		}elseif($this->input->post('teid')==''){
			if ($this->input->post('month')!='') {
				$date=$this->input->post('year').'-'.$this->input->post('month');//组合日期
			}else{
				$date=date('Y-m');
			}
			$agende=$this->agende_list_model->get_agende($date);
			$data['pointYear']=$thisYear=$this->input->post('year');
			if (!empty($agende)) {
				foreach ($Year as $key => $v) {
					if ($v['sid']==$agende[0]['season_id']) {
						$thisYear=$v['year'];//获取选中球赛的赛季年数
					}
				}
			}
			$data['thisYear']=$thisYear;//获取选中的年数
		}else{
			$teid=$this->input->post('teid');
			if ($this->input->post('month')!='') {
				$date=$this->input->post('year').'-'.$this->input->post('month');//组合日期
			}else{
				$date=date('Y-m');
			}
			$agende=$this->agende_list_model->get_temp_agende($date,$teid);
			$data['pointYear']=$thisYear=$this->input->post('year');
			if (!empty($agende)) {
				foreach ($Year as $key => $v) {
					if ($v['sid']==$agende[0]['season_id']) {
						$thisYear=$v['year'];//获取选中球赛的赛季年数
					}
				}
			}
			$data['thisYear']=$thisYear;//获取选中的年数
		}
		//获取此月有比赛的全部日期
		$day=array();	
		foreach ($agende as $k => $v) {
			$a=1;
			foreach ($day as $key => $value) {
				if ($v['rdate']==$value) {
					$a=0;
					break;
				}
			}
			if ($a==1) {
				$day[]=$v['rdate'];
			}	
		}
		sort($day);
		$temp=$this->agende_list_model->get_all_temp();//获取全部球队
		//全部赋给$data
		$data['year']=$Year;
		$data['agende']=$agende;
		$data['day']=$day;
		$data['teid']=$this->input->post('teid');
		$data['month']=$this->input->post('month');
		$data['temp']=$temp;
		// var_dump($data);
		$this->load->view('index_view/agende_list.html',$data);
	}
}
?>