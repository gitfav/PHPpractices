<?php
class CategoryController extends CommonController{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		$data=M()->query("SELECT * from hd_category");
		$data=$this->get_data($data);
		// p($data);
		$this->assign('data',$data);
		$this->display();
	}

	private function get_data($data,$pid=0,$level=0){
		$da=array();
		foreach ($data as $k => $v) {
			if ($v['pid']==$pid) {
				$v['title'] = str_repeat('---', $level) . $v['title'];
				$da[]=$v;
				// $d=M()->query("SELECT * from hd_category where pid={$v['cid']}");
				// if ($d!='') {
				$da=array_merge($da,$this->get_data($data,$v['cid'],$level+1)); 
				// }
			}
		}		
		return $da;	
	}
}
?>