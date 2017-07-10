<?php 
class MynewsController extends CommonController{

	public function index(){
		$uid=$_SESSION['uid'];
		$ask=M()->query("SELECT * FROM hd_ask where uid=$uid");
		foreach ($ask as $k => $v) {
			$ask[$k]['time']=date('Y-m-s',$v['time']);
			$category=M()->query("SELECT * FROM hd_category where cid={$ask[$k]['cid']}");
			$ask[$k]['category']=$category[0]['title'];
		}

		$asids=M()->query("SELECT asid FROM hd_answer where uid=$uid");
		$answer=array();
		foreach ($asids as $k => $v) {
			$an_tr=M()->query("SELECT * from hd_ask where asid={$v['asid']}");
			$answer[]=$an_tr[0];
		}
		foreach ($answer as $k => $v) {
			$answer[$k]['time']=date('Y-m-s',$v['time']);
			$category=M()->query("SELECT * FROM hd_category where cid={$answer[$k]['cid']}");
			$answer[$k]['category']=$category[0]['title'];
		}

		$this->assign('answer',$answer);
		$this->assign('ask',$ask);
		$this->display();
	}

	public function my_face(){
		$this->display();
	}
	public function my_face_up(){
		// p($_FILES);
		$uid=$_SESSION['uid'];
		if ($_FILES['face']['name']==''||empty($_FILES)) {
			$this->error('请导入图片');
		}else{
			$up=new Upload();
			$name=$up->upload();
			// p($name);
			M()->exe("UPDATE hd_user set face='{$name[0]}' where uid=$uid");
			$this->success('上传成功',__APP__.'?c=Mynews');
		}
	}

}
 ?>