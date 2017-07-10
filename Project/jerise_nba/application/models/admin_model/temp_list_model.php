<?php
class Temp_list_model extends CI_Model{
	public function  __construct(){
		parent::__construct();

		$this->load->database();
	}
	public function get_arcago(){
		$query=$this->db->query('select * from area_category where fid!=0');
		return $query->result_array();
	}
	public function add_temp($t_data){
		$str=$this->db->insert('temp',$t_data);
		return $str;
	}
	public function get_temp_one($num){
		//输入一个参数，取得此id的队伍信息
		$data=$this->db->query("select * from temp where teid=$num")->result_array();
		return $data;
	}
	public function get_temp_list(){
		$area=$this->db->query('select * from area_category');
		$temp=$this->db->query('select * from temp');
		$data['area']=$area->result_array();
		$data['temp']=$temp->result_array();
		return $data;
	}
	//修改球队信息
	public function alter_temp($t_data,$where){
		$data=$this->db->update('temp',$t_data,$where);
		return $data;
	}

}
?>