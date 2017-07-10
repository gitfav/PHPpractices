<?php
class Common_list_model extends CI_Model{
	public function  __construct(){
		parent::__construct();

		$this->load->database();
	}
	
	public function add_agende($data){
		$str=$this->db->insert('nba_agende',$data);
		return $str;
	}
	//获取全部球队
	public function get_all_temp(){
		$data=$this->db->query('select teid,te_name from temp')->result_array();
		return $data;
	}
	//获取相对的球队
	public function get_temp($h,$v){
		$data=$this->db->query("select te_name,te_s_name from temp where teid=$h or teid=$v")->result_array();
		return $data;
	}
	//获取赛季年数
	public function get_season_year(){
		$data=$this->db->query("select * from season")->result_array();
		return $data;
	}
	//获取今年的年数
	public function get_this_year(){
		$data=$this->db->query("select * from season where this_season='YES'")->result_array();
		return $data;
	}
	//获取指定的年数
	public function get_this_season($sid){
		$data=$this->db->query("select * from season where sid=$sid")->result_array();
		return $data;
	}	
	//获取时间范围内的赛程列表
	public function get_agende($data){
		$time=$this->db->query("select type,season_id,rtime,temp_home,h_id,h_score,temp_visit,v_id,v_score,end from nba_agende where date_format(rdate,'%Y-%m-%d')='$data'")->result_array();
		return $time;
	}
	//获取某球队的赛程列表
	public function get_temp_agende($data,$teid){
		$time=$this->db->query("select * from nba_agende where date_format(rdate,'%Y-%m')='$data' and (h_id=$teid or v_id=$teid)")->result_array();
		return $time;
	}
	//用agid获取相当赛程
	public function get_this_agende($num){
		$data=$this->db->query("select * from nba_agende where agid=$num")->result_array();
		return $data;
	}
	//获取球队的所有球员
	public function get_sporter($id){
		$data=$this->db->query("select * from sports where teid=$id;")->result_array();
		return $data;
	}
	//获取球员赛季数据表
	public function get_sporter_season($sid,$spid,$teid){
		$data=$this->db->query("select * from sport_season where sid=$sid and spid=$spid and teid=$teid")->result_array();
		return $data;
	}
	//向某个表添加数据
	public function add_($table,$data){
		$str=$this->db->insert($table,$data);
		return $str;
	}
	//向某个表更新数据
	public function update_($table,$data,$where){
		$this->db->update($table,$data,$where);
	}
	//获得表的数据
	public function get_($table,$where){
		$data=$this->db->query("select * from $table where $where")->result_array();
		return $data;
	}
	//获得表的数据
	public function get_s($filed,$table,$where){
		if ($where=='') {
			$data=$this->db->query("select $filed from $table")->result_array();
		}else{
			$data=$this->db->query("select $filed from $table where $where")->result_array();
		}
		return $data;
	}
	public function get_all($table){
		$data=$this->db->query("select * from $table")->result_array();
		return $data;
	}
	//删除某个表的元素
	public function del_($table,$del){
		$this->db->delete($table,$del);
	}
	//根据$field字段排序数据，取得前$n个数排序，由大到小。
	public function pai_max($table,$where,$field,$n){
		$query=$this->db->query("select * from $table where $where order by $field desc limit $n")->result_array();
		return $query;
	}
	//根据$field字段排序数据，取得前$n个数排序，由小到大。
	public function pai_min($table,$where,$field,$n){
		$query=$this->db->query("select * from $table where $where order by $field asc limit $n")->result_array();
		return $query;
	}
	//根据$field字段排序数据，取得前$n个数排序，由大到小,无限制。
	public function pai_max_s($field_one,$table,$where,$field,$n){
		$query=$this->db->query("select $field_one from $table where $where order by $field desc limit $n")->result_array();
		return $query;
	}
}
?>