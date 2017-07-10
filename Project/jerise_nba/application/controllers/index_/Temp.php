<?php
class Temp extends CI_Controller{
	private $data=array();
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

		date_default_timezone_set("PRC");//设置时区
		if (isset($_SESSION['username'])) {
			// var_dump($_SESSION);
			$where="username='{$_SESSION['username']}'";
			$user=$this->common_list_model->get_('user',$where);
			$user=array(
				'username' => $_SESSION['username'],
				'nname' => $user[0]['nname'],
				'uid' => $user[0]['uid'],
			);
			$this->data['user']=$user;
		}

		//把球队放入其地区的数组中，地区放入东西地区中
		$area=$this->common_list_model->get_all('area_category');
		$temp=$this->common_list_model->get_all('temp');
		foreach ($area as $k => $v) {
			if ($v['fid']!=0) {
				foreach ($temp as $k_ => $v_) {
					if ($v['acid']==$v_['acid']) {
						$area[$k]['temp'][]=$v_;
					}
				}
			}
			if ($v['fid']==1) {
				$east[]=$area[$k];
			}
			if ($v['fid']==2) {
				$west[]=$area[$k];
			}
		}
		$this->data['east']=$east;
		$this->data['west']=$west;
	}
	
	public function index(){
		$this_Y=$this->common_list_model->get_this_year();//确认本赛季
		$num=$this->uri->segment(4);
		// echo $num;
		//得到球队信息模块
		$where="teid=$num";
		$this_temp=$this->common_list_model->get_('temp',$where);
		$where="acid={$this_temp[0]['acid']}";
		$this_area=$this->common_list_model->get_('area_category',$where);
		$this_temp[0]['where']=$this_area[0]['area'];
		$this->data['this_temp']=$this_temp[0];

		//得到球员信息模块
		$where="teid=$num";
		$this_t_sports=$this->common_list_model->pai_max('sports',$where,'sp_num',30);
		foreach ($this_t_sports as $k => $v) {
			$birthday=$v['sp_birthday'];
			$age = date('Y', time()) - date('Y', strtotime($birthday)) - 1;
			$t_age = date('Y', time()) - $v['sp_inj'];
			if (date('m', time()) == date('m', strtotime($birthday))){
				if (date('d', time()) > date('d', strtotime($birthday))){  
					$age++;  
				}  
			}elseif (date('m', time()) > date('m', strtotime($birthday))){  
				$age++;  
			}
			$this_t_sports[$k]['age']=$age;
			$this_t_sports[$k]['t_age']=$t_age;
		}
		$this->data['this_t_sports']=$this_t_sports;
		
		//得到球员本赛季的数据模块
		$where="teid=$num and sid={$this_Y[0]['sid']}";
		$field="((sp_score+sp_be_re+sp_be_af+sp_assist+sp_steal+sp_block)-(sp_shot-sp_shotin)-(sp_pen-sp_penin)-sp_error)/sp_appear";
		$sp_data=$this->common_list_model->pai_max('sport_season',$where,$field,30);//根据球员效率值排名
		$this->data['sp_data']=$sp_data;
		
		//球队本赛季分区排名模块
		$where="acid={$this_temp[0]['acid']}";
		$acid=$this->common_list_model->get_s('te_s_name,teid','temp',$where);
		foreach ($acid as $k => $v) {
			if ($k==0) {
				$where='teid='.$v['teid'];
			}else{
				$where=$where.' or teid='.$v['teid'];
			}
		}
		$where="($where)"." and sid={$this_Y[0]['sid']}";
		$ar_ag=$this->common_list_model->pai_max('temp_season',$where,'(win-lose)',30);
		foreach ($ar_ag as $k => $v) {
			foreach ($acid as $k_ => $v_) {
				if ($v['teid']==$v_['teid']) {
					$ar_ag[$k]['name']=$v_['te_s_name'];
					break;
				}
			}
		}
		$this->data['ar_ag']=$ar_ag;

		//球本赛季近期赛程模块
		$today_d=date('Y-m-d',strtotime('0 day'));
		$now_t=date('H:i:s',time());
		// echo $now_t;
		$where="(v_id=$num or h_id=$num) and season_id={$this_Y[0]['sid']} and rdate<'$today_d and rtime<$now_t'";
		$up_agende=$this->common_list_model->pai_max('nba_agende',$where,'rdate',5);
		$where="(v_id=$num or h_id=$num) and season_id={$this_Y[0]['sid']} and rdate>'$today_d and rtime>$now_t'";
		$down_agende=$this->common_list_model->pai_min('nba_agende',$where,'rdate',5);
	
		$this->data['down_agende']=$down_agende;
		$this->data['up_agende']=$up_agende;

		//获取本赛季的数据
		$where="h_id=$num and season_id={$this_Y[0]['sid']} and end='Y' and type='常规赛'";
		$h_pos=$this->common_list_model->get_s("count(*) as numb,sum(v_score) as score,(sum(v_be_re)+sum(v_be_af)) as be,sum(v_assist) as assist,sum(v_shot) as shot,sum(v_shotin) as shotin",'nba_agende',$where);
		$where="v_id=$num and season_id={$this_Y[0]['sid']} and end='Y' and type='常规赛'";
		$v_pos=$this->common_list_model->get_s("count(*) as numb,sum(h_score) as score,(sum(h_be_re)+sum(h_be_af)) as be,sum(h_assist) as assist,sum(h_shot) as shot,sum(h_shotin) as shotin",'nba_agende',$where);
		$pos=array(
			'numb'=> $h_pos[0]['numb']+$v_pos[0]['numb'],
			'score'=> $h_pos[0]['score']+$v_pos[0]['score'],
			'be'=> $h_pos[0]['be']+$v_pos[0]['be'],
			'assist'=> $h_pos[0]['assist']+$v_pos[0]['assist'],
			'shot'=> $h_pos[0]['shot']+$v_pos[0]['shot'],
			'shotin'=> $h_pos[0]['shotin']+$v_pos[0]['shotin'],
		);
		$where="teid=$num and sid={$this_Y[0]['sid']}";
		$sel=$this->common_list_model->get_('temp_season',$where);
		$this->data['pos']=$pos;
		$this->data['sel']=$sel[0];
		

		$this->data['num']=$num;
		$this->load->view('index_view/headers/temps_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/temps.html');
	}

	public function history_cate(){
		$all_t=$this->common_list_model->get_s('hsid,h_title,h_time','temp_his','');
		foreach ($all_t as $k => $v) {
			$all_t[$k]['h_time']=date('Y-m-d H:s:i',$v['h_time']);
		}
		
		$this->data['all_t']=$all_t;
		$this->load->view('index_view/headers/temp_history_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/tempHis_list.html');
	}
	public function history(){
		$num=$this->uri->segment(4);
		echo $num;
		$where="hsid=$num";
		$temp=$this->common_list_model->get_s('h_title,h_text','temp_his',$where);
		$this->data['temp']=$temp[0];
		$this->load->view('index_view/headers/temp_history_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/tempsHistory.html');
	}
}
?>