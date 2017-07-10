<?php
class Agende_list extends CI_Controller{
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
	
	public function add_agende_view(){
		$this->load->model('admin_model/agende_list_model');
		$temp=$this->agende_list_model->get_all_temp();
		$data['temp']=$temp;
		//获取此年赛季年份
		$thisYear=$this->agende_list_model->get_this_year();
		$data['thisYear']=$thisYear[0];
		// var_dump($data);
		$this->load->view('admin_view/add_agende.html',$data);
	}
	public function add_agende(){
		$data=$this->input->post();
		$this->load->model('admin_model/agende_list_model');
		//插入两队的队名
		$temp=$this->agende_list_model->get_temp($data['h_id'],$data['v_id']);
		$data['temp_home']=$temp[0]['te_s_name'];
		$data['temp_visit']=$temp[1]['te_s_name'];
		
		$str=$this->agende_list_model->add_agende($data);	
		// var_dump($data);
		if ($str) {
			$data['url']=site_url('admin_/agende_list/add_agende_view');
			$this->load->view('admin_view/a_success.html',$data);

		}else{
			show_error('插入失败');
		}
	}
	//修改赛程信息
	public function alter_agende(){
		$num=$this->uri->segment(4);
		$this->load->model('admin_model/agende_list_model');
		if (empty($_POST)) {
			$temp=$this->agende_list_model->get_all_temp();
			$data['temp']=$temp;
			//获取此年赛季年份
			$allYear=$this->agende_list_model->get_season_year();
			$data['allYear']=$allYear;
			$where="agid=$num";
			$agende=$this->agende_list_model->get_('nba_agende',$where);
			$data['agende']=$agende[0];
			$this->load->view('admin_view/alter_agende.html',$data);
		}else{
			$ag=$this->input->post();
			//主队名字的修改
			$where="teid={$ag['h_id']}";
			$temp=$this->agende_list_model->get_('temp',$where);
			$ag['temp_home']=$temp[0]['te_s_name'];
			//客队名字的修改
			$where="teid={$ag['v_id']}";
			$temp=$this->agende_list_model->get_('temp',$where);
			$ag['temp_visit']=$temp[0]['te_s_name'];
			
			$where="agid=$num";
			$this->agende_list_model->update_('nba_agende',$ag,$where);
			$data['url']=site_url('admin_/agende_list/agende_view');
			$this->load->view('admin_view/alter_success.html',$data);
		}
		
	}
	//删除赛程
	public function delete_agende(){
		$num=$this->uri->segment(4);
		$this->load->model('admin_model/agende_list_model');
		$del=array('agid' => $num);
		$this->agende_list_model->del_('nba_agende',$del);
		$data['url']=site_url('admin_/agende_list/agende_view');
		$this->load->view('admin_view/del_success.html',$data);
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
		$this->load->view('admin_view/agende_list.html',$data);
	}
	//添加赛程数据
	public function add_agende_data(){
		$num=$this->uri->segment(4);
		$this->load->model('admin_model/agende_list_model');
		$agende=$this->agende_list_model->get_this_agende($num);
		$season=$this->agende_list_model->get_this_season($agende[0]['season_id']);

		$sporters[]=$this->agende_list_model->get_sporter($agende[0]['h_id']);
		$sporters[]=$this->agende_list_model->get_sporter($agende[0]['v_id']);
		$data['agende']=$agende[0];
		$data['h_temp']=$sporters[0];
		$data['v_temp']=$sporters[1];
		$data['season']=$season[0]['year'];
		$data['sid']=$agende[0]['season_id'];
		$data['optem']=$agende[0]['type'];
		$data['agid']=$agende[0]['agid'];
		// var_dump($data);
		$this->load->view('admin_view/add_data.html',$data);
	}

	//添加球员，赛程等数据
	public function add_sport_data(){
		$all=$this->input->post();
		// var_dump($all);

		$this->load->model('admin_model/agende_list_model');
		//以下每个获取球员的数据
		$sporter_data=array();
		foreach ($all['sp_name'] as $k => $v) {
			$temp=array();
			if ($all['is_out'][$k]=='Y') {
				$temp=array(
					'agid' => $all['agid'],
					'season' => $all['season'],
					'day' => $all['day'],
					'sid' => $all['sid'],
					'spid' => $all['spid'][$k],
					'sp_temp' => $all['sp_temp'][$k],
					'teid' => $all['teid'][$k],
					'optem' => $all['optem'],
					'sp_name' => $v,
					'sp_first' => $all['sp_first'][$k],
					'sp_time' => $all['sp_time'][$k],
					'sp_shot' => $all['sp_shot'][$k],
					'sp_shotin' => $all['sp_shotin'][$k],
					'sp_tree' => $all['sp_tree'][$k],
					'sp_treein' => $all['sp_treein'][$k],
					'sp_pen' => $all['sp_pen'][$k],
					'sp_penin' => $all['sp_penin'][$k],
					'sp_be_re' => $all['sp_be_re'][$k],
					'sp_be_af' => $all['sp_be_af'][$k],
					'sp_assist' => $all['sp_assist'][$k],
					'sp_steal' => $all['sp_steal'][$k],
					'sp_block' => $all['sp_block'][$k],
					'sp_error' => $all['sp_error'][$k],
					'sp_foul' => $all['sp_foul'][$k],
					'sp_score' => $all['sp_score'][$k]
				);
				$where="spid={$all['spid'][$k]}";
				$sport=$this->agende_list_model->get_('sports',$where);
				if ($sport[0]['max']<$all['sp_score'][$k]) {
					$max['max']=$all['sp_score'][$k];
					$this->agende_list_model->update_('sports',$max,$where);
				}
				$sporter_data[]=$temp;
				$this->agende_list_model->add_('sport_race',$temp);
				//球员常规赛的赛季表
				if ($all['optem']=='常规赛'){
				$is_emp=$this->agende_list_model->get_sporter_season($temp['sid'],$temp['spid'],$temp['teid']);
				if (empty($is_emp)) {
					$temp_season=array(
						'season' => $all['season'],
						'sid' => $all['sid'],
						'spid' => $all['spid'][$k],
						'sp_temp' => $all['sp_temp'][$k],
						'teid' => $all['teid'][$k],
						'sp_name' => $v,
						'sp_appear' => 1,
						'sp_time' => $all['sp_time'][$k],
						'sp_shot' => $all['sp_shot'][$k],
						'sp_shotin' => $all['sp_shotin'][$k],
						'sp_treein' => $all['sp_treein'][$k],
						'sp_tree' => $all['sp_tree'][$k],
						'sp_penin' => $all['sp_penin'][$k],
						'sp_pen' => $all['sp_pen'][$k],
						'sp_be_re' => $all['sp_be_re'][$k],
						'sp_be_af' => $all['sp_be_af'][$k],
						'sp_assist' => $all['sp_assist'][$k],
						'sp_steal' => $all['sp_steal'][$k],
						'sp_block' => $all['sp_block'][$k],
						'sp_error' => $all['sp_error'][$k],
						'sp_foul' => $all['sp_foul'][$k],
						'sp_score' => $all['sp_score'][$k],
					);
					if ($all['sp_first'][$k]=='YES') {
						$temp_season['sp_first']=1;
					}
					$this->agende_list_model->add_('sport_season',$temp_season);
				}else{
					$temp_season=array(
						'sp_appear' => $is_emp[0]['sp_appear']+1,
						'sp_time' => $is_emp[0]['sp_time']+$all['sp_time'][$k],
						'sp_shot' => $is_emp[0]['sp_shot']+$all['sp_shot'][$k],
						'sp_shotin' => $is_emp[0]['sp_shotin']+$all['sp_shotin'][$k],
						'sp_treein' => $is_emp[0]['sp_treein']+$all['sp_treein'][$k],
						'sp_tree' => $is_emp[0]['sp_tree']+$all['sp_tree'][$k],
						'sp_penin' => $is_emp[0]['sp_penin']+$all['sp_penin'][$k],
						'sp_pen' => $is_emp[0]['sp_pen']+$all['sp_pen'][$k],
						'sp_be_re' => $is_emp[0]['sp_be_re']+$all['sp_be_re'][$k],
						'sp_be_af' => $is_emp[0]['sp_be_af']+$all['sp_be_af'][$k],
						'sp_assist' => $is_emp[0]['sp_assist']+$all['sp_assist'][$k],
						'sp_steal' => $is_emp[0]['sp_steal']+$all['sp_steal'][$k],
						'sp_block' => $is_emp[0]['sp_block']+$all['sp_block'][$k],
						'sp_error' => $is_emp[0]['sp_error']+$all['sp_error'][$k],
						'sp_foul' => $is_emp[0]['sp_foul']+$all['sp_foul'][$k],
						'sp_score' => $is_emp[0]['sp_score']+$all['sp_score'][$k],
					);
					if ($all['sp_first'][$k]=='YES') {
						$temp_season['sp_first']=$is_emp[0]['sp_first']+1;
					}
					$where="sid={$temp['sid']} and spid={$temp['spid']} and teid={$temp['teid']}";
					$this->agende_list_model->update_('sport_season',$temp_season,$where);
				}
				}
			}
		}
		
		//以下获取添加到赛程表的数据
		$h_id=$all['h_id'];
		$v_id=$all['v_id'];
		$agende_data=array(
			'h_shot' => 0,
			'h_shotin' =>0,
			'h_tree' => 0,
			'h_treein' =>0,
			'h_pen' => 0,
			'h_penin' =>0,
			'h_be_re' => 0,
			'h_be_af' =>0,
			'h_assist' => 0,
			'h_steal' =>0,
			'h_block' => 0,
			'h_error' =>0,
			'h_foul' =>0,
			'h_score' =>0,
			'v_shot' => 0,
			'v_shotin' =>0,
			'v_tree' => 0,
			'v_treein' =>0,
			'v_pen' => 0,
			'v_penin' =>0,
			'v_be_re' => 0,
			'v_be_af' =>0,
			'v_assist' => 0,
			'v_steal' =>0,
			'v_block' => 0,
			'v_error' =>0,
			'v_foul' =>0,
			'v_score' =>0,
		);
		foreach ($sporter_data as $k => $v) {
			if ($v['teid']==$h_id) {
				$agende_data['h_shot']+=$v['sp_shot'];
				$agende_data['h_shotin']+=$v['sp_shotin'];
				$agende_data['h_tree']+=$v['sp_tree'];
				$agende_data['h_treein']+=$v['sp_treein'];
				$agende_data['h_pen']+=$v['sp_pen'];
				$agende_data['h_penin']+=$v['sp_penin'];
				$agende_data['h_be_re']+=$v['sp_be_re'];
				$agende_data['h_be_af']+=$v['sp_be_af'];
				$agende_data['h_assist']+=$v['sp_assist'];
				$agende_data['h_steal']+=$v['sp_steal'];
				$agende_data['h_block']+=$v['sp_block'];
				$agende_data['h_error']+=$v['sp_error'];
				$agende_data['h_foul']+=$v['sp_foul'];
				$agende_data['h_score']+=$v['sp_score'];
			}else{
				$agende_data['v_shot']+=$v['sp_shot'];
				$agende_data['v_shotin']+=$v['sp_shotin'];
				$agende_data['v_tree']+=$v['sp_tree'];
				$agende_data['v_treein']+=$v['sp_treein'];
				$agende_data['v_pen']+=$v['sp_pen'];
				$agende_data['v_penin']+=$v['sp_penin'];
				$agende_data['v_be_re']+=$v['sp_be_re'];
				$agende_data['v_be_af']+=$v['sp_be_af'];
				$agende_data['v_assist']+=$v['sp_assist'];
				$agende_data['v_steal']+=$v['sp_steal'];
				$agende_data['v_block']+=$v['sp_block'];
				$agende_data['v_error']+=$v['sp_error'];
				$agende_data['v_foul']+=$v['sp_foul'];
				$agende_data['v_score']+=$v['sp_score'];
			}
		}
		$agende_data['end']='Y';
		if ($agende_data['h_score']>$agende_data['v_score']) {
			$agende_data['w_id']=$h_id;
		}else{
			$agende_data['w_id']=$v_id;
		}
		// var_dump($agende_data);
		$where="agid={$all['agid']}";
		$this->agende_list_model->update_('nba_agende',$agende_data,$where);

		//球队常规赛赛季数据
		if ($all['optem']=='常规赛') {
		// 主队
		$where="teid=$h_id and sid={$all['sid']}";
		$temp=$this->agende_list_model->get_('temp_season',$where);
		if (empty($temp)) {
			$h_temp=array(
				'season' => $all['season'],
				'sid' => $all['sid'],
				'teid' => $h_id,
				'num' => 1,
				'shot' => $agende_data['h_shot'],
				'shot_in' => $agende_data['h_shotin'],
				'be_re' => $agende_data['h_be_re'],
				'be_af' => $agende_data['h_be_af'],
				'assist' => $agende_data['h_assist'],
				'score' => $agende_data['h_score'],
			);
			if ($agende_data['w_id']==$h_id) {
				$h_temp['win']=1;
			}else{
				$h_temp['lose']=1;
			}
			$this->agende_list_model->add_('temp_season',$h_temp);
		}else{
			$h_temp=array(
				'num' => $temp[0]['num']+1,
				'shot' => $temp[0]['shot']+$agende_data['h_shot'],
				'shot_in' => $temp[0]['shot_in']+$agende_data['h_shotin'],
				'be_re' => $temp[0]['be_re']+$agende_data['h_be_re'],
				'be_af' => $temp[0]['be_af']+$agende_data['h_be_af'],
				'assist' => $temp[0]['assist']+$agende_data['h_assist'],
				'score' => $temp[0]['score']+$agende_data['h_score'],
			);
			if ($agende_data['w_id']==$h_id) {
				$h_temp['win']=$temp[0]['win']+1;
			}else{
				$h_temp['lose']=$temp[0]['lose']+1;
			}
			$where="sid={$all['sid']} and teid=$h_id";
			$this->agende_list_model->update_('temp_season',$h_temp,$where);
		}
		//球队赛季数据 客队
		$where="teid=$v_id and sid={$all['sid']}";
		$temp=$this->agende_list_model->get_('temp_season',$where);
		if (empty($temp)) {
			$v_temp=array(
				'season' => $all['season'],
				'sid' => $all['sid'],
				'teid' => $v_id,
				'num' => 1,
				'shot' => $agende_data['v_shot'],
				'shot_in' => $agende_data['v_shotin'],
				'be_re' => $agende_data['v_be_re'],
				'be_af' => $agende_data['v_be_af'],
				'assist' => $agende_data['v_assist'],
				'score' => $agende_data['v_score'],
			);
			if ($agende_data['w_id']==$v_id) {
				$v_temp['win']=1;
			}else{
				$v_temp['lose']=1;
			}
			$this->agende_list_model->add_('temp_season',$v_temp);
		}else{
			$v_temp=array(
				'num' => $temp[0]['num']+1,
				'shot' => $temp[0]['shot']+$agende_data['v_shot'],
				'shot_in' => $temp[0]['shot_in']+$agende_data['v_shotin'],
				'be_re' => $temp[0]['be_re']+$agende_data['v_be_re'],
				'be_af' => $temp[0]['be_af']+$agende_data['v_be_af'],
				'assist' => $temp[0]['assist']+$agende_data['v_assist'],
				'score' => $temp[0]['score']+$agende_data['v_score'],
			);
			if ($agende_data['w_id']==$v_id) {
				$v_temp['win']=$temp[0]['win']+1;
			}else{
				$v_temp['lose']=$temp[0]['lose']+1;
			}
			$where="sid={$all['sid']} and teid=$v_id";
			$this->agende_list_model->update_('temp_season',$v_temp,$where);
		}
		}
		$data['url']=site_url('admin_/agende_list/agende_view');
		$this->load->view('admin_view/a_success.html',$data);
	}
}
?>