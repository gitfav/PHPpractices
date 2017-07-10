<?php
class ShowController extends CommonController{
	private $arr=array();
	public function index(){
		$asid=$_GET['asid'];
		//得到问题id，并加入必要的数据
		$ask=M()->query("SELECT * from hd_ask where asid=$asid");
		$cid=$ask[0]['cid'];
		$ask[0]['time']=date('Y-m-d H:i:s',$ask[0]['time']);
		$uid=$ask[0]['uid'];
		$user=M()->query("SELECT * from hd_user where uid=$uid");
		if (empty($user)) {
			$ask[0]['username']='';
		}else{
			$ask[0]['username']=$user[0]['username'];
		}
		//得到问题的所有回答
		$answer=M()->query("SELECT * from hd_answer where asid=$asid order by time desc");
		foreach ($answer as $k => $v) {
			$uid=$v['uid'];
			$user=M()->query("SELECT * from hd_user where uid=$uid");
			$answer[$k]['time']=date('Y-m-d H:i:s',$answer[$k]['time']);//而你的$c是一个string,所以系统会提示你参数的类型不正确，你要把第二个参数强制转化成int型，这样就不会提示你了
			if (empty($user)) {
				$answer[$k]['face']='';
				$answer[$k]['username']='';
			}else{
				$answer[$k]['face']=$user[0]['face'];
				$answer[$k]['username']=$user[0]['username'];
			}
		}
		$str="";//定义初值
		for ($i=1; $i <  ceil(count($answer)/3)+1; $i++) { 
			$str=$str."<a href='javascript:void(0)'>$i</a>";
		}
		for ($i=0; $i < ceil(count($answer)/3); $i++) { 
			$le[]=$i;
		}
		if (empty($le)) {
			$le='';
		}
		$all_le=count($answer);

		$this->assign('le',$le);
		$this->assign('all_le',$all_le);
		$this->assign('str',$str);
		$this->assign('ask',$ask);
		$this->assign('answer',$answer);
		
		//得到问题的标签
		if (isset($cid)) {
			$this_t=M()->query("SELECT * FROM hd_category where cid=$cid");
			$pid=$this_t[0]['pid'];
	
			// 获得选择标签的全部父级标签
			$this->get_father($cid);
			$f_arr=array();
			$f_arr=$this->arr;
			$length=count($f_arr);
			$this->assign('length',$length);
			// p($f_arr);
			// echo count($arr);
			//数组头尾互换
			for ($i=0,$j=count($f_arr)-$i-1; $i < count($f_arr)/2; $i++) {
				if (count($f_arr)>1) {
					$a=$f_arr[$j];
					$f_arr[$j]=$f_arr[$i+1];
					$f_arr[$i+1]=$a;
				}	
			}
			// p($f_arr);
			$this->assign('f_arr',$f_arr);
			$set=1;

		}else{
			// 全部分类
			$all=M()->query("SELECT * FROM hd_category where pid=0");
			$this->assign('all',$all);

			$set=0;
		}
		$this->assign('set',$set);
		$this->display();
	}

	private function get_father($id){		
		$this_t=M()->query("SELECT * FROM hd_category where cid=$id");
		$this->arr[]=$this_t[0];
		$cid=$this_t[0]['pid'];
		if ($cid!=0) {
			$father_t=M()->query("SELECT * from hd_category where cid=$cid"); 
			$this->get_father($father_t[0]['cid']);
		}
	}

	public function answer(){
		if (!isset($_SESSION['uid'])) {
			$this->error("请登入账号");
		}elseif ($_POST['content']=='') {
			$this->error('请输入内容');
		}
		// echo $_POST['content'];
		// echo $_GET['asid'];
		// echo $_SESSION['uid'];
		$uid=$_SESSION['uid'];
		$asid=$_GET['asid'];
		$content=$_POST['content'];
		$time=time();
		M()->exe("INSERT into hd_answer(content,time,uid,asid) values('$content',$time,$uid,$asid)");
		M()->exe("UPDATE hd_ask set answer=answer+1 where asid=$asid");
		M()->exe("UPDATE hd_user set answer=answer+1,point=point+3,exp=exp+2 where uid=$uid");
		$this->success('回答成功',__APP__.'?c=show&a=index&asid='.$asid);
	}

	public function accept(){
		$anid=$_GET['anid'];
		//获取回答信息
		$answer=M()->query("SELECT * from hd_answer where anid=$anid");
		$asid=$answer[0]['asid'];
		$an_uid=$answer[0]['uid'];
		//获取问题的信息
		$ask=M()->query("SELECT * from hd_ask where asid=$asid");
		$as_uid=$ask[0]['uid'];
		//改变问题solve
		M()->exe("UPDATE hd_ask set solve=1 where asid=$asid");
		//改变回答的accept
		M()->exe("UPDATE hd_answer set accept=1 where anid=$anid");
		$reward=$ask[0]['reward'];
		M()->exe("UPDATE hd_user set exp=exp+$reward,point=point+10,accept=accept+1 where uid=$an_uid");
		$this->success('采纳成功',__APP__.'?c=show&a=index&asid='.$asid);

		// echo $asid;
		// echo $anid;
	}
}
?>