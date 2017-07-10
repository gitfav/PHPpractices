<?php
class Common_model extends CI_Model{
	public function  __construct(){
		parent::__construct();

		$this->load->database();
	}
	//获取全部球队的信息
	public function get_all_temp(){
		$data=$this->db->query("select teid,te_name from temp")->result_array();
		return $data;
	}
	//获取此年赛季年数
	public function get_season_year(){
		$data=$this->db->query("select * from season where this_season='YES'")->result_array();
		return $data;
	}

}
?>