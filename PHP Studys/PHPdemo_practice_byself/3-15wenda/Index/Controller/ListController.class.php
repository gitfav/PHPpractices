<?php
class ListController extends CommonController{
	private $arr=array();
	public function index(){
		header('Content-type:text/html;charset=utf-8');

		if (isset($_GET['cid'])) {
			$cid=$_GET['cid'];
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
			
			//获得选择标签的全部子级，如果无子级，就获取同级标签
			$s_p_arr=M()->query("SELECT * FROM hd_category where pid=$cid");
			if (empty($s_p_arr)) {
				$s_p_arr=M()->query("SELECT * FROM hd_category where pid=$pid");
			}
			// p($s_p_arr);
			$this->assign('s_p_arr',$s_p_arr);

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

	public function select(){
		// echo json_encode($w);
		$w=$_POST['w'];
		// $cate=array();
		$cid=$_GET['cid'];
		if (!empty($cid)) {
			switch ($w) {
				case 0:
					$str=M()->query("SELECT * from hd_ask where cid=$cid and solve=0");
					foreach ($str as $k => $v) {
						$cate=M()->query("SELECT title from hd_category where cid=$cid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				case 1:
					$str=M()->query("SELECT * from hd_ask where cid=$cid and solve>0");
					foreach ($str as $k => $v) {
						$cate=M()->query("SELECT title from hd_category where cid=$cid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				case 2:
					$str=M()->query("SELECT * from hd_ask where cid=$cid and reward>=50");
					foreach ($str as $k => $v) {
						$cate=M()->query("SELECT title from hd_category where cid=$cid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				case 3:
					$str=M()->query("SELECT * from hd_ask where cid=$cid and answer=0");
					foreach ($str as $k => $v) {
						$cate=M()->query("SELECT title from hd_category where cid=$cid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				default:
					$this->error('错误');
					break;
			}
		}else{
			switch ($w) {
				case 0:
					$str=M()->query("SELECT * from hd_ask where solve=0");
					foreach ($str as $k => $v) {
						$vcid=$str[$k]['cid'];
						$cate=M()->query("SELECT title from hd_category where cid=$vcid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				case 1:
					$str=M()->query("SELECT * from hd_ask where solve>0");
					foreach ($str as $k => $v) {
						$vcid=$str[$k]['cid'];
						$cate=M()->query("SELECT title from hd_category where cid=$vcid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				case 2:
					$str=M()->query("SELECT * from hd_ask where reward>=50");
					foreach ($str as $k => $v) {
						$vcid=$str[$k]['cid'];
						$cate=M()->query("SELECT title from hd_category where cid=$vcid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				case 3:
					$str=M()->query("SELECT * from hd_ask where answer=0");
					foreach ($str as $k => $v) {
						$vcid=$str[$k]['cid'];
						$cate=M()->query("SELECT title from hd_category where cid=$vcid");
						$str[$k]['tit']=$cate[0]['title'];
						$str[$k]['time']=date('Y-m-d H:i:s', $str[$k]['time']); 
					}
					break;
				default:
					$this->error('错误');
					break;
			}
		}
		// $this->assign('str',$str);
		echo json_encode($str);
		die;
	}
}
?>