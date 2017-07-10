<?php
class News extends CI_Controller{
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
		// $this_Y=$this->common_list_model->get_this_year();//确认本赛季
		$num=$this->uri->segment(4);
		$this->data['num']=$num;
		// echo $num;
		//得到新闻信息模块
		$where="new_image!='' and newid!=$num";
		$news_=$this->common_list_model->pai_max_s('new_title,newid','new',$where,'new_time',7);
		$this->data['news_']=$news_;

		$where="newid=$num";
		$news=$this->common_list_model->get_("new",$where);
		$this->data['news']=$news[0];

		//得到评论信息
		$where="newid=$num and f_reid=0";
		$content=$this->common_list_model->get_('reply',$where);
		foreach ($content as $k => $v) {
			$content[$k]['time']=date('Y-m-d H:s:i',$v['time']);
			$where="uid={$v['uid']}";
			$uid=$this->common_list_model->get_s('uid,nname,face','user',$where);
			$content[$k]['user']=$uid[0];//输入用户信息
			$where="f_reid={$v['reid']}";
			$replay=$this->common_list_model->get_('reply',$where);
			$content[$k]['replay']=$replay;
			foreach ($content[$k]['replay'] as $k_ => $v_) {
				$where="uid={$v_['uid']}";
				$uid=$this->common_list_model->get_s('uid,nname,face','user',$where);
				$content[$k]['replay'][$k_]['user']=$uid[0];//输入用户信息
				$content[$k]['replay'][$k_]['time']=date('Y-m-d H:s:i',$v_['time']);
			}
		}
		// var_dump($content[0]);
		$this->data['content']=$content;

		$this->load->view('index_view/headers/new_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/news.html');
	}
	public function news_list(){
		$all_n=$this->common_list_model->get_s('newid,new_title,new_time,new_comment','new','');
		foreach ($all_n as $k => $v) {
			$all_n[$k]['new_time']=date('Y-m-d H:s:i',$v['new_time']);
		}
		
		$this->data['all_n']=$all_n;
		$this->load->view('index_view/headers/temp_history_header.html',$this->data);
		$this->load->view('index_view/com_header.html');
		$this->load->view('index_view/new_list.html');
	}
	//评论区
	public function replay(){
		$post=$this->input->post();
		if (!isset($_SESSION['username'])) {
			echo '<script>alert("请登录");history.back();</script>';
			die;
		}
		if (!isset($post['f_reid'])) {
			$post['f_reid']=0;
		}
		$post['time']=time();
		$where="username='{$_SESSION['username']}'";
		$num=$this->common_list_model->get_s('comment_num','user',$where);//评论数量增加
		$data['comment_num']=$num[0]['comment_num']+1;
		$this->common_list_model->update_('user',$data,$where);

		$user=$this->common_list_model->get_s('uid','user',$where);
		//新闻页面评论数量加1
		$where="newid={$post['newid']}";
		$new_n=$this->common_list_model->get_s('new_comment','new',$where);
		$new_c['new_comment']=$new_n[0]['new_comment']+1;
		$this->common_list_model->update_('new',$new_c,$where);
		$post['uid']=$user[0]['uid'];
		//插入发表内容
		$this->common_list_model->add_('reply',$post);
		$url=site_url("index_/news/index/{$post['newid']}");
		echo "<script>location.href='$url';</script>";
	}

	public function replay_t(){
		$post=$this->input->post();
		if (!isset($_SESSION['username'])) {
			echo '<script>alert("请登录");history.back();</script>';
			die;
		}
		$post['time']=time();
		$where="username='{$_SESSION['username']}'";
		$num=$this->common_list_model->get_s('comment_num','user',$where);//评论数量增加
		$data_['comment_num']=$num[0]['comment_num']+1;
		$this->common_list_model->update_('user',$data_,$where);

		$user=$this->common_list_model->get_s('uid','user',$where);
		$post['uid']=$user[0]['uid'];

		$where="reid={$post['f_reid']}";
		$data['re_num']="{$post['re_num']}"+1;
		$user=$this->common_list_model->update_('reply',$data,$where);
		//新闻页面评论数量加1
		$where="newid={$post['newid']}";
		$new_n=$this->common_list_model->get_s('new_comment','new',$where);
		$new_c['new_comment']=$new_n[0]['new_comment']+1;
		$this->common_list_model->update_('new',$new_c,$where);
		$post['re_num']=0;
		$this->common_list_model->add_('reply',$post);

		$url=site_url("index_/news/index/{$post['newid']}");
		echo "<script>location.href='$url';</script>";
	}

	public function good_ajax(){
		$post=$this->input->post();
		// var_dump($post);
		$where="reid={$post['id']}";
		$num=$this->common_list_model->get_s('good','reply',$where);
		$data['good']=$num[0]['good']+1;
		// var_dump($data);
		$user=$this->common_list_model->update_('reply',$data,$where);
		echo $data['good'];
	}
}
?>