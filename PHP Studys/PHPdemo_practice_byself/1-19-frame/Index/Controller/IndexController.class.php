<?php
class IndexController extends Controller{
	public function index(){
		if (IS_POST) {
			$message=require './data/db.php';
			$_POST['time']=time();
			$message[]=$_POST;
			$this->write_db($message);
			$this->success('./Index.php','留言成功');
		}
		else {
			if (!is_file('./data/db.php')) {
				$data='<?php return ?>';
				file_put_contents('./data/db.php', $data);
			}
			$message=require'./data/db.php';
			$this->assign('message',$message);
			$this->display();
		}
	}
	public function edit(){
		if (IS_POST) {
			$message=require'./data/db.php';
			$index=$_POST['index'];
			$_POST['time']=time();
			unset($_POST['index']);
			$message[$index]=$_POST;
			$this->write_db($message);
			$this->success('./Index.php','修改成功');
		}
		else{
			$message=require'./data/db.php';
			$index=$_GET['index'];
			$Newdata=$message[$index];
			$this->assign('Newdata',$Newdata);
			$this->display();//a已经等于'edit'。
		}		
	}
	public function del(){
		$message=require'./data/db.php';
		$index=$_GET['index'];
		unset($message[$index]);
		$this->write_db($message);
		$this->success('./Index.php','删除成功');
	}
}
?>