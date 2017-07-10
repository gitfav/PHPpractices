<?php
class Jerise extends CI_Controller{
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

		//获取近几日的赛程
		$yesdayD=date('Y-m-d',strtotime("-1 day"));//昨天日期
		$todayD=Date('Y-m-d',strtotime("0 day"));//今天日期
		$trodayD=date('Y-m-d',strtotime("+1 day"));//明天日期
		$btrodayD=date('Y-m-d',strtotime("+2 day"));//后天日期
		$agende['yesdayD']=$this->common_list_model->get_agende($yesdayD);
		$agende['todayD']=$this->common_list_model->get_agende($todayD);
		$agende['trodayD']=$this->common_list_model->get_agende($trodayD);
		$agende['btrodayD']=$this->common_list_model->get_agende($btrodayD);
		foreach ($agende as $k => $v) {
			if (!empty($v)) {
				$agende[$k]=$this->pai($agende[$k],'rtime');//函数里无法改变函数外的值，需重新赋值
				// if (count($v)>=2) {
				// 	$a=2;
				// }else{
				// 	$a=1;
				// }
				for ($i=0; $i < count($v); $i++) { 
					$h_id=$v[$i]['h_id'];
					$v_id=$v[$i]['v_id'];
					$agende[$k][$i]['h_logo']=$this->add('temp','teid',$h_id);
					$agende[$k][$i]['v_logo']=$this->add('temp','teid',$v_id);
					$agende[$k][$i]['rtime']=substr($agende[$k][$i]['rtime'], 0,5);
				}
				// var_dump($v);
			}
		}
		$this->data['agende']=$agende;
		//比赛日期。无年份
		$this->data['yesdayD' ]= date('m-d',strtotime("-1 day"));
		$this->data['todayD'] = Date('m-d');
		$this->data['trodayD'] = date('m-d',strtotime("+1 day"));
		$this->data['btrodayD'] = date('m-d',strtotime("+2 day"));

		//以下为各种方式的排名
		//球员本日得分，篮板，助攻，盖帽，抢断排名
		$where="day='$todayD'";
		$today_data=array(
			'max_score' => $this->common_list_model->pai_max('sport_race',$where,'sp_score',10),
			'max_be' => $this->common_list_model->pai_max('sport_race',$where,'	sp_be_re+sp_be_af',10),
			'max_assist' => $this->common_list_model->pai_max('sport_race',$where,'sp_assist',10),
			'max_block' => $this->common_list_model->pai_max('sport_race',$where,'sp_block',10),
			'max_steal' => $this->common_list_model->pai_max('sport_race',$where,'sp_steal',10),
		);
		foreach ($today_data as $k => $v) {
			foreach ($v as $k_ => $v_) {
				$where="spid={$v_['spid']}";
				$this_s=$this->common_list_model->get_s('sp_face','sports',$where);
				$today_data[$k][$k_]['face']=$this_s[0]['sp_face'];
			}
		}
		//球员本赛季得分，篮板，助攻，盖帽，抢断排名
		$this_Y=$this->common_list_model->get_this_year();
		$where="sid='{$this_Y[0]['sid']}'";
		$ratio=$this->common_list_model->get_s('sum(num)/count(*) as t_ratio','temp_season',$where);//确保上榜的球员有一定的比赛出场次数，$ratio[0]['t_ratio']}的值最终为82场。
		$where="sid='{$this_Y[0]['sid']}' and (sp_appear/{$ratio[0]['t_ratio']})>0.3";
		$season_data=array(
			'max_score' =>$this->common_list_model->pai_max('sport_season',$where,'sp_score/sp_appear',10),
			'max_be' => $this->common_list_model->pai_max('sport_season',$where,'(sp_be_re+sp_be_af)/sp_appear',10),
			'max_assist' => $this->common_list_model->pai_max('sport_season',$where,'sp_assist/sp_appear',10),
			'max_block' => $this->common_list_model->pai_max('sport_season',$where,'sp_block/sp_appear',10),
			'max_steal' => $this->common_list_model->pai_max('sport_season',$where,'sp_steal/sp_appear',10),
		);
		foreach ($season_data as $k => $v) {
			foreach ($v as $k_ => $v_) {
				$where="spid={$v_['spid']}";
				$this_s=$this->common_list_model->get_s('sp_face','sports',$where);
				$season_data[$k][$k_]['face']=$this_s[0]['sp_face'];
			}
		}
		//球队的赛季排名
		$where="sid='{$this_Y[0]['sid']}'";
		$max_temp=$this->common_list_model->pai_max('temp_season',$where,'(win-lose)',30);
		foreach ($max_temp as $k => $v) {
			$where="teid={$v['teid']}";
			$temp=$this->common_list_model->get_s('te_s_name,acid','temp',$where);
			$where="acid={$temp[0]['acid']}";
			$area_s=$this->common_list_model->get_s('fid','area_category',$where);
			$where="acid={$area_s[0]['fid']}";
			$area=$this->common_list_model->get_s('area,acid','area_category',$where);
			$max_temp[$k]['te_name']=$temp[0]['te_s_name'];
			$max_temp[$k]['acid']=$area[0]['acid'];
			$max_temp[$k]['area']=$area[0]['area'];
			if ($area[0]['acid']==1) {
				$east_temp[]=$max_temp[$k];
			}else{
				$west_temp[]=$max_temp[$k];
			}
		}
		// var_dump($east_temp);
		$this->data['east_temp']=$east_temp;
		$this->data['west_temp']=$west_temp;
		$this->data['today_data']=$today_data;
		$this->data['season_data']=$season_data;

		//新闻模块
		$where="new_image!=''";
		$news_head=$this->common_list_model->pai_max_s('new_title,new_image,newid','new',$where,'new_time',5);
		// var_dump($news);
		
		$news=$this->common_list_model->pai_max_s('new_title,newid','new',$where,'new_time','5,12');
		// var_dump($news);
		$this->data['news_head']=$news_head;
		$this->data['news']=$news;


		$this->load->view('index_view/headers/index_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/index.html');

	}

	private function add($table,$what,$id){
		$where="$what=$id";
		$data=$this->common_list_model->get_($table,$where);
		return $data[0]['te_logo'];
	}
	//根据数组中的时间排序
	private function pai($a,$str){
		$le=count($a);
		foreach ($a as $k => $v) {
			for ($i=$k; $i < $le; $i++) { 
				if ($v[$str]>$a[$i][$str]) {
					$ce=$a[$k];

					$a[$k]=$a[$i];
					$a[$i]=$ce;
				}
			}
		}
		return $a;
	}
}
?>