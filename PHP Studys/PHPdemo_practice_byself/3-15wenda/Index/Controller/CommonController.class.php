<?php
class CommonController extends Controller{

	public function __construct(){
		parent::__construct();
		// $data为标签
		$data=M()->query("SELECT * from hd_category where pid=0");
		foreach ($data as $key => $v) {
			$data[$key]['son']=M()->query("SELECT * from hd_category where pid={$v['cid']}");
		}
		$this->assign('data',$data);

		//当前登录用户的信息
		if (isset($_SESSION['uid'])) {
			$u=$_SESSION['uid'];
			$user=M()->query("SELECT * FROM hd_user WHERE uid=$u");
			$this->assign('user',$user);
		}

		// $count_ask为问题总数
		$count_ask=M()->query("SELECT count(*) as c from hd_ask");
		$this->assign('count_ask',$count_ask);

		//未解决问题
		$no_solve=M()->query("SELECT * FROM hd_ask where solve=0 order by time desc limit 10");
		$this->assign('no_solve',$no_solve);

		//高分悬赏
		$h_reward=M()->query("SELECT * FROM hd_ask order by reward desc limit 5");
		$this->assign('h_reward',$h_reward);
	}
}
?>