<?php
class Sporter extends CI_Controller{
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
		//球员基本信息模板
		$where="spid=$num";
		$sport=$this->common_list_model->get_('sports',$where);		
		$birthday=$sport[0]['sp_birthday'];
		$age = date('Y', time()) - date('Y', strtotime($birthday)) - 1;
		$t_age = date('Y', time()) - $sport[0]['sp_inj'];
		if (date('m', time()) == date('m', strtotime($birthday))){
			if (date('d', time()) > date('d', strtotime($birthday))){  
				$age++;  
			}  
		}elseif (date('m', time()) > date('m', strtotime($birthday))){  
			$age++;  
		}
		$sport[0]['age']=$age;//球员年龄
		$sport[0]['t_age']=$t_age;//球员球龄
		$where="spid=$num and sid={$this_Y[0]['sid']} and optem='常规赛'";
		$score_max=$this->common_list_model->pai_max('sport_race',$where,'sp_score',1);
		if (empty($score_max)) {//获取赛季最高分
			$sport[0]['score_max']=0;
		}else{
			$sport[0]['score_max']=$score_max[0]['sp_score'];
		}
		$this->data['sport']=$sport[0];
		
		//取得球员赛季数据模板
		$where="spid=$num";
		$season_data=$this->common_list_model->pai_max('sport_season',$where,'season',50);
		$this->data['season_data']=$season_data;

		// 取得最近球员比赛数据模板
		$where="spid=$num and sid={$this_Y[0]['sid']}";
		$near_data=$this->common_list_model->pai_max('sport_race',$where,'day',5);
		foreach ($near_data as $k => $v) {
			$where="agid={$v['agid']}";
			$agen=$this->common_list_model->get_s('type,h_score,v_score,temp_home,temp_visit','nba_agende',$where);
			$near_data[$k]['type']=$agen[0]['type'];
			$near_data[$k]['h_score']=$agen[0]['h_score'];
			$near_data[$k]['v_score']=$agen[0]['v_score'];
			$near_data[$k]['temp_home']=$agen[0]['temp_home'];
			$near_data[$k]['temp_visit']=$agen[0]['temp_visit'];
		}
		$this->data['near_data']=$near_data;
		// var_dump($near_data);
		//球员赛季分数排名
		$where="sid='{$this_Y[0]['sid']}'";
		$ratio=$this->common_list_model->get_s('sum(num)/count(*) as t_ratio','temp_season',$where);//确保上榜的球员有一定的比赛出场次数，$ratio[0]['t_ratio']}的值最终为82场。
		$where="sid='{$this_Y[0]['sid']}' and (sp_appear/{$ratio[0]['t_ratio']})>0.3";
		$pai_score=$this->common_list_model->pai_max_s('sp_score,spid,sp_name,sp_appear','sport_season',$where,'sp_score/sp_appear',200);
		$pai_sp_be=$this->common_list_model->pai_max_s('sp_be_re,sp_be_af,spid,sp_name,sp_appear','sport_season',$where,'(sp_be_re+sp_be_af)/sp_appear',200);
		$pai_assist=$this->common_list_model->pai_max_s('sp_assist,spid,sp_name,sp_appear','sport_season',$where,'sp_assist/sp_appear',200);
		$pai_shot=$this->common_list_model->pai_max_s('sp_shot,sp_shotin,spid,sp_name,sp_appear','sport_season',$where,'sp_shotin/sp_shot',200);
		$pai_tree=$this->common_list_model->pai_max_s('sp_tree,sp_treein,spid,sp_name,sp_appear','sport_season',$where,'sp_treein/sp_tree',200);
		foreach ($pai_score as $k => $v) {
			if ($v['spid']==$num) {
				if ($k==0 and count($pai_score)>=5) {
					$pai_score_f[$k]=$v;$pai_score_f[$k]['pai']=$k+1;
					$pai_score_f[$k+1]=$pai_score[$k+1];$pai_score_f[$k+1]['pai']=$k+2;
					$pai_score_f[$k+2]=$pai_score[$k+2];$pai_score_f[$k+2]['pai']=$k+3;
					$pai_score_f[$k+3]=$pai_score[$k+3];$pai_score_f[$k+3]['pai']=$k+4;
					$pai_score_f[$k+4]=$pai_score[$k+4];$pai_score_f[$k+4]['pai']=$k+5;
					break;
				}elseif($k==1 and count($pai_score)>=5){
					$pai_score_f[$k-1]=$pai_score[$k-1];$pai_score_f[$k-1]['pai']=$k;
					$pai_score_f[$k]=$v;$pai_score_f[$k]['pai']=$k+1;
					$pai_score_f[$k+1]=$pai_score[$k+1];$pai_score_f[$k+1]['pai']=$k+2;
					$pai_score_f[$k+2]=$pai_score[$k+2];$pai_score_f[$k+2]['pai']=$k+3;
					$pai_score_f[$k+3]=$pai_score[$k+3];$pai_score_f[$k+3]['pai']=$k+4;
					break;
				}elseif($k==199 and count($pai_score)>=200){
					$pai_score_f[$k-4]=$pai_score[$k-4];$pai_score_f[$k-4]['pai']=$k-3;
					$pai_score_f[$k-3]=$pai_score[$k-3];$pai_score_f[$k-3]['pai']=$k-2;
					$pai_score_f[$k-2]=$pai_score[$k-2];$pai_score_f[$k-2]['pai']=$k-1;
					$pai_score_f[$k-1]=$pai_score[$k-1];$pai_score_f[$k-1]['pai']=$k;
					$pai_score_f[$k]=$v;$pai_score_f[$k]['pai']=$k+1;
					break;
				}elseif ($k==198 and count($pai_score)>=200) {
					$pai_score_f[$k-3]=$pai_score[$k-3];$pai_score_f[$k-3]['pai']=$k-2;
					$pai_score_f[$k-2]=$pai_score[$k-2];$pai_score_f[$k-2]['pai']=$k-1;
					$pai_score_f[$k-1]=$pai_score[$k-1];$pai_score_f[$k-1]['pai']=$k;
					$pai_score_f[$k]=$v;$pai_score_f[$k]['pai']=$k+1;
					$pai_score_f[$k+1]=$pai_score[$k+1];$pai_score_f[$k+1]['pai']=$k+2;
					break;
				}else{
					if (isset($pai_score[$k-2])) {
						$pai_score_f[$k-2]=$pai_score[$k-2];$pai_score_f[$k-2]['pai']=$k-1;
					}
					if (isset($pai_score[$k-1])) {
						$pai_score_f[$k-1]=$pai_score[$k-1];$pai_score_f[$k-1]['pai']=$k;
					}
					$pai_score_f[$k]=$v;$pai_score_f[$k]['pai']=$k+1;
					if (isset($pai_score[$k+1])) {
						$pai_score_f[$k+1]=$pai_score[$k+1];$pai_score_f[$k+1]['pai']=$k+2;
					}
					if (isset($pai_score[$k+2])) {
						$pai_score_f[$k+2]=$pai_score[$k+2];$pai_score_f[$k+2]['pai']=$k+3;
					}
					break;
				}
			}else{
				$pai_score_f=array();
			}
		}
		foreach ($pai_sp_be as $k => $v) {
			if ($v['spid']==$num) {
				if ($k==0) {
					$pai_sp_be_f[$k]=$v;$pai_sp_be_f[$k]['pai']=$k+1;
					$pai_sp_be_f[$k+1]=$pai_sp_be[$k+1];$pai_sp_be_f[$k+1]['pai']=$k+2;
					$pai_sp_be_f[$k+2]=$pai_sp_be[$k+2];$pai_sp_be_f[$k+2]['pai']=$k+3;
					$pai_sp_be_f[$k+3]=$pai_sp_be[$k+3];$pai_sp_be_f[$k+3]['pai']=$k+4;
					$pai_sp_be_f[$k+4]=$pai_sp_be[$k+4];$pai_sp_be_f[$k+4]['pai']=$k+5;
					break;
				}elseif($k==1){
					$pai_sp_be_f[$k-1]=$pai_sp_be[$k-1];$pai_sp_be_f[$k-1]['pai']=$k;
					$pai_sp_be_f[$k]=$v;$pai_sp_be_f[$k]['pai']=$k+1;
					$pai_sp_be_f[$k+1]=$pai_sp_be[$k+1];$pai_sp_be_f[$k+1]['pai']=$k+2;
					$pai_sp_be_f[$k+2]=$pai_sp_be[$k+2];$pai_sp_be_f[$k+2]['pai']=$k+3;
					$pai_sp_be_f[$k+3]=$pai_sp_be[$k+3];$pai_sp_be_f[$k+3]['pai']=$k+4;
					break;
				}elseif($k==199){
					$pai_sp_be_f[$k-4]=$pai_sp_be[$k-4];$pai_sp_be_f[$k-4]['pai']=$k-3;
					$pai_sp_be_f[$k-3]=$pai_sp_be[$k-3];$pai_sp_be_f[$k-3]['pai']=$k-2;
					$pai_sp_be_f[$k-2]=$pai_sp_be[$k-2];$pai_sp_be_f[$k-2]['pai']=$k-1;
					$pai_sp_be_f[$k-1]=$pai_sp_be[$k-1];$pai_sp_be_f[$k-1]['pai']=$k;
					$pai_sp_be_f[$k]=$v;$pai_sp_be_f[$k]['pai']=$k+1;
					break;
				}elseif ($k==198) {
					$pai_sp_be_f[$k-3]=$pai_sp_be[$k-3];$pai_sp_be_f[$k-3]['pai']=$k-2;
					$pai_sp_be_f[$k-2]=$pai_sp_be[$k-2];$pai_sp_be_f[$k-2]['pai']=$k-1;
					$pai_sp_be_f[$k-1]=$pai_sp_be[$k-1];$pai_sp_be_f[$k-1]['pai']=$k;
					$pai_sp_be_f[$k]=$v;$pai_sp_be_f[$k]['pai']=$k+1;
					$pai_sp_be_f[$k+1]=$pai_sp_be[$k+1];$pai_sp_be_f[$k+1]['pai']=$k+2;
					break;
				}else{
					if (isset($pai_sp_be[$k-2])) {
						$pai_sp_be_f[$k-2]=$pai_sp_be[$k-2];$pai_sp_be_f[$k-2]['pai']=$k-1;
					}
					if (isset($pai_sp_be[$k-1])) {
						$pai_sp_be_f[$k-1]=$pai_sp_be[$k-1];$pai_sp_be_f[$k-1]['pai']=$k;
					}
					$pai_sp_be_f[$k]=$v;$pai_sp_be_f[$k]['pai']=$k+1;
					if (isset($pai_sp_be[$k+1])) {
						$pai_sp_be_f[$k+1]=$pai_sp_be[$k+1];$pai_sp_be_f[$k+1]['pai']=$k+2;
					}
					if (isset($pai_sp_be[$k+2])) {
						$pai_sp_be_f[$k+2]=$pai_sp_be[$k+2];$pai_sp_be_f[$k+2]['pai']=$k+3;
					}
					break;
				}
			}else{
				$pai_sp_be_f=array();
			}
		}
		foreach ($pai_assist as $k => $v) {
			if ($v['spid']==$num) {
				if ($k==0) {
					$pai_assist_f[$k]=$v;$pai_assist_f[$k]['pai']=$k+1;
					$pai_assist_f[$k+1]=$pai_assist[$k+1];$pai_assist_f[$k+1]['pai']=$k+2;
					$pai_assist_f[$k+2]=$pai_assist[$k+2];$pai_assist_f[$k+2]['pai']=$k+3;
					$pai_assist_f[$k+3]=$pai_assist[$k+3];$pai_assist_f[$k+3]['pai']=$k+4;
					$pai_assist_f[$k+4]=$pai_assist[$k+4];$pai_assist_f[$k+4]['pai']=$k+5;
					break;
				}elseif($k==1){
					$pai_assist_f[$k-1]=$pai_assist[$k-1];$pai_assist_f[$k-1]['pai']=$k;
					$pai_assist_f[$k]=$v;$pai_assist_f[$k]['pai']=$k+1;
					$pai_assist_f[$k+1]=$pai_assist[$k+1];$pai_assist_f[$k+1]['pai']=$k+2;
					$pai_assist_f[$k+2]=$pai_assist[$k+2];$pai_assist_f[$k+2]['pai']=$k+3;
					$pai_assist_f[$k+3]=$pai_assist[$k+3];$pai_assist_f[$k+3]['pai']=$k+4;
					break;
				}elseif($k==199){
					$pai_assist_f[$k-4]=$pai_assist[$k-4];$pai_assist_f[$k-4]['pai']=$k-3;
					$pai_assist_f[$k-3]=$pai_assist[$k-3];$pai_assist_f[$k-3]['pai']=$k-2;
					$pai_assist_f[$k-2]=$pai_assist[$k-2];$pai_assist_f[$k-2]['pai']=$k-1;
					$pai_assist_f[$k-1]=$pai_assist[$k-1];$pai_assist_f[$k-1]['pai']=$k;
					$pai_assist_f[$k]=$v;$pai_assist_f[$k]['pai']=$k+1;
					break;
				}elseif ($k==198) {
					$pai_assist_f[$k-3]=$pai_assist[$k-3];$pai_assist_f[$k-3]['pai']=$k-2;
					$pai_assist_f[$k-2]=$pai_assist[$k-2];$pai_assist_f[$k-2]['pai']=$k-1;
					$pai_assist_f[$k-1]=$pai_assist[$k-1];$pai_assist_f[$k-1]['pai']=$k;
					$pai_assist_f[$k]=$v;$pai_assist_f[$k]['pai']=$k+1;
					$pai_assist_f[$k+1]=$pai_assist[$k+1];$pai_assist_f[$k+1]['pai']=$k+2;
					break;
				}else{
					if (isset($pai_assist[$k-2])) {
						$pai_assist_f[$k-2]=$pai_assist[$k-2];$pai_assist_f[$k-2]['pai']=$k-1;
					}
					if (isset($pai_assist[$k-1])) {
						$pai_assist_f[$k-1]=$pai_assist[$k-1];$pai_assist_f[$k-1]['pai']=$k;
					}
					$pai_assist_f[$k]=$v;$pai_assist_f[$k]['pai']=$k+1;
					if (isset($pai_assist[$k+1])) {
						$pai_assist_f[$k+1]=$pai_assist[$k+1];$pai_assist_f[$k+1]['pai']=$k+2;
					}
					if (isset($pai_assist[$k+2])) {
						$pai_assist_f[$k+2]=$pai_assist[$k+2];$pai_assist_f[$k+2]['pai']=$k+3;
					}
					break;
				}
			}else{
				$pai_assist_f=array();
			}
		}
		foreach ($pai_shot as $k => $v) {
			if ($v['spid']==$num) {
				if ($k==0) {
					$pai_shot_f[$k]=$v;$pai_shot_f[$k]['pai']=$k+1;
					$pai_shot_f[$k+1]=$pai_shot[$k+1];$pai_shot_f[$k+1]['pai']=$k+2;
					$pai_shot_f[$k+2]=$pai_shot[$k+2];$pai_shot_f[$k+2]['pai']=$k+3;
					$pai_shot_f[$k+3]=$pai_shot[$k+3];$pai_shot_f[$k+3]['pai']=$k+4;
					$pai_shot_f[$k+4]=$pai_shot[$k+4];$pai_shot_f[$k+4]['pai']=$k+5;
					break;
				}elseif($k==1){
					$pai_shot_f[$k-1]=$pai_shot[$k-1];$pai_shot_f[$k-1]['pai']=$k;
					$pai_shot_f[$k]=$v;$pai_shot_f[$k]['pai']=$k+1;
					$pai_shot_f[$k+1]=$pai_shot[$k+1];$pai_shot_f[$k+1]['pai']=$k+2;
					$pai_shot_f[$k+2]=$pai_shot[$k+2];$pai_shot_f[$k+2]['pai']=$k+3;
					$pai_shot_f[$k+3]=$pai_shot[$k+3];$pai_shot_f[$k+3]['pai']=$k+4;
					break;
				}elseif($k==199){
					$pai_shot_f[$k-4]=$pai_shot[$k-4];$pai_shot_f[$k-4]['pai']=$k-3;
					$pai_shot_f[$k-3]=$pai_shot[$k-3];$pai_shot_f[$k-3]['pai']=$k-2;
					$pai_shot_f[$k-2]=$pai_shot[$k-2];$pai_shot_f[$k-2]['pai']=$k-1;
					$pai_shot_f[$k-1]=$pai_shot[$k-1];$pai_shot_f[$k-1]['pai']=$k;
					$pai_shot_f[$k]=$v;$pai_shot_f[$k]['pai']=$k+1;
					break;
				}elseif ($k==198) {
					$pai_shot_f[$k-3]=$pai_shot[$k-3];$pai_shot_f[$k-3]['pai']=$k-2;
					$pai_shot_f[$k-2]=$pai_shot[$k-2];$pai_shot_f[$k-2]['pai']=$k-1;
					$pai_shot_f[$k-1]=$pai_shot[$k-1];$pai_shot_f[$k-1]['pai']=$k;
					$pai_shot_f[$k]=$v;$pai_shot_f[$k]['pai']=$k+1;
					$pai_shot_f[$k+1]=$pai_shot[$k+1];$pai_shot_f[$k+1]['pai']=$k+2;
					break;
				}else{
					if (isset($pai_shot[$k-2])) {
						$pai_shot_f[$k-2]=$pai_shot[$k-2];$pai_shot_f[$k-2]['pai']=$k-1;
					}
					if (isset($pai_shot[$k-1])) {
						$pai_shot_f[$k-1]=$pai_shot[$k-1];$pai_shot_f[$k-1]['pai']=$k;
					}
					$pai_shot_f[$k]=$v;$pai_shot_f[$k]['pai']=$k+1;
					if (isset($pai_shot[$k+1])) {
						$pai_shot_f[$k+1]=$pai_shot[$k+1];$pai_shot_f[$k+1]['pai']=$k+2;
					}
					if (isset($pai_shot[$k+2])) {
						$pai_shot_f[$k+2]=$pai_shot[$k+2];$pai_shot_f[$k+2]['pai']=$k+3;
					}
					break;
				}
			}else{
				$pai_shot_f=array();
			}
		}
		foreach ($pai_tree as $k => $v) {
			if ($v['spid']==$num) {
				if ($k==0) {
					$pai_tree_f[$k]=$v;$pai_tree_f[$k]['pai']=$k+1;
					$pai_tree_f[$k+1]=$pai_tree[$k+1];$pai_tree_f[$k+1]['pai']=$k+2;
					$pai_tree_f[$k+2]=$pai_tree[$k+2];$pai_tree_f[$k+2]['pai']=$k+3;
					$pai_tree_f[$k+3]=$pai_tree[$k+3];$pai_tree_f[$k+3]['pai']=$k+4;
					$pai_tree_f[$k+4]=$pai_tree[$k+4];$pai_tree_f[$k+4]['pai']=$k+5;
					break;
				}elseif($k==1){
					$pai_tree_f[$k-1]=$pai_tree[$k-1];$pai_tree_f[$k-1]['pai']=$k;
					$pai_tree_f[$k]=$v;$pai_tree_f[$k]['pai']=$k+1;
					$pai_tree_f[$k+1]=$pai_tree[$k+1];$pai_tree_f[$k+1]['pai']=$k+2;
					$pai_tree_f[$k+2]=$pai_tree[$k+2];$pai_tree_f[$k+2]['pai']=$k+3;
					$pai_tree_f[$k+3]=$pai_tree[$k+3];$pai_tree_f[$k+3]['pai']=$k+4;
					break;
				}elseif($k==199){
					$pai_tree_f[$k-4]=$pai_tree[$k-4];$pai_tree_f[$k-4]['pai']=$k-3;
					$pai_tree_f[$k-3]=$pai_tree[$k-3];$pai_tree_f[$k-3]['pai']=$k-2;
					$pai_tree_f[$k-2]=$pai_tree[$k-2];$pai_tree_f[$k-2]['pai']=$k-1;
					$pai_tree_f[$k-1]=$pai_tree[$k-1];$pai_tree_f[$k-1]['pai']=$k;
					$pai_tree_f[$k]=$v;$pai_tree_f[$k]['pai']=$k+1;
					break;
				}elseif ($k==198) {
					$pai_tree_f[$k-3]=$pai_tree[$k-3];$pai_tree_f[$k-3]['pai']=$k-2;
					$pai_tree_f[$k-2]=$pai_tree[$k-2];$pai_tree_f[$k-2]['pai']=$k-1;
					$pai_tree_f[$k-1]=$pai_tree[$k-1];$pai_tree_f[$k-1]['pai']=$k;
					$pai_tree_f[$k]=$v;$pai_tree_f[$k]['pai']=$k+1;
					$pai_tree_f[$k+1]=$pai_tree[$k+1];$pai_tree_f[$k+1]['pai']=$k+2;
					break;
				}else{
					if (isset($pai_tree[$k-2])) {
						$pai_tree_f[$k-2]=$pai_tree[$k-2];$pai_tree_f[$k-2]['pai']=$k-1;
					}
					if (isset($pai_tree[$k-1])) {
						$pai_tree_f[$k-1]=$pai_tree[$k-1];$pai_tree_f[$k-1]['pai']=$k;
					}
					$pai_tree_f[$k]=$v;$pai_tree_f[$k]['pai']=$k+1;
					if (isset($pai_tree[$k+1])) {
						$pai_tree_f[$k+1]=$pai_tree[$k+1];$pai_tree_f[$k+1]['pai']=$k+2;
					}
					if (isset($pai_tree[$k+2])) {
						$pai_tree_f[$k+2]=$pai_tree[$k+2];$pai_tree_f[$k+2]['pai']=$k+3;
					}
					break;
				}
			}else{
				$pai_tree_f=array();
			}
		}
		$this->data['best_score']=$pai_score[0];
		$this->data['best_sp_be']=$pai_sp_be[0];
		$this->data['best_assist']=$pai_assist[0];
		$this->data['best_shot']=$pai_shot[0];
		$this->data['best_tree']=$pai_tree[0];
		$this->data['pai_score_f']=$pai_score_f;
		$this->data['pai_sp_be_f']=$pai_sp_be_f;
		$this->data['pai_assist_f']=$pai_assist_f;
		$this->data['pai_shot_f']=$pai_shot_f;
		$this->data['pai_tree_f']=$pai_tree_f;
		// var_dump($pai_tree_f);

		$this->data['num']=$num;
		$this->load->view('index_view/headers/sporter_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/sporters.html');
	}
}
?>