<?php
class Season_list_model extends CI_Model{
	public function  __construct(){
		parent::__construct();

		$this->load->database();
	}
	//获取所有赛季年份
	public function get_season(){
		$query=$this->db->query('select * from season');
		return $query->result_array();
	}
	public function alter_season($t_data,$where){
		$data=$this->db->update('season',$t_data,$where);
		return $data;
	}
	//添加赛季
	public function add_season($data){
		return $this->db->insert('season',$data);
	}
	//获取数据
	public function get_s($filed,$table,$where){
		$data=$this->db->query("select $filed from $table where $where")->result_array();
		return $data;
	}
	//获取全部球队的信息
	public function get_all_temp(){
		$data=$this->db->query('select teid,te_name from temp')->result_array();
		return $data;
	}
	//向某个表添加数据
	public function add_($table,$data){
		$str=$this->db->insert($table,$data);
		return $str;
	}

	//实验
	public function select(){
		// $query=$this->db->query("select * from sport_season where sid=1");
		// return $query->result_array();

		// insert into table(nid) values(3) on duplicate key update name='name2'  需要主键或unqiune
	}

}
?>