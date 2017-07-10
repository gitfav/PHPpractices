<?php
class Sporter_model extends CI_Model{
	public function  __construct(){
		parent::__construct();

		$this->load->database();
	}
	
	//获取全部球队的信息
	public function get_all_temp(){
		$data=$this->db->query('select teid,te_name from temp')->result_array();
		return $data;
	}
	//向球员输入基本信息
	public function put_sporter($data){
		return $this->db->insert('sports',$data);
	}
	//获取此年赛季年数
	public function get_season_year(){
		$data=$this->db->query("select * from season where this_season='YES'")->result_array();
		return $data;
	}
	//获得表的数据
	public function get_($table,$where){
		$data=$this->db->query("select * from $table where $where")->result_array();
		return $data;
	}
	//向某个表更新数据
	public function update_($table,$data,$where){
		$this->db->update($table,$data,$where);
	}
}
?>