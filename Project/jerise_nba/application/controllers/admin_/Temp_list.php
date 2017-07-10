<?php
class Temp_list extends CI_Controller{
	public function  Temp_list(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		define('A_PUBLIC', base_url("public/admin"));
	}
	public function index(){
		$this->load->model('admin_model/temp_list_model');
		$data=$this->temp_list_model->get_temp_list();
		// var_dump($data);
		$this->load->view('admin_view/temp_category.html',$data);
		/*到数据库取得数据*/
		
	}

	public function add_temp_view(){
		$this->load->model('admin_model/temp_list_model');
		$this->load->library('Session');
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}
		//获取球队所在的地区
		$data['ar_ca']=$this->temp_list_model->get_arcago();
		// var_dump($data);//检测数据传输
		$this->load->view('admin_view/add_temp.html',$data);
	}

	// 添加新的球队
	public function add_temp(){
		$t_data['te_name']=$this->input->post('te_name');
		$t_data['te_e_name']=$this->input->post('te_e_name');
		$t_data['te_s_name']=$this->input->post('te_s_name');
		$t_data['te_city']=$this->input->post('te_city');
		$t_data['te_boss']=$this->input->post('te_boss');
		$t_data['te_gym']=$this->input->post('te_gym');
		$t_data['te_in_time']=$this->input->post('te_in_time');
		$t_data['te_champion']=$this->input->post('te_champion');
		$t_data['te_rank']=$this->input->post('te_rank');
		$t_data['te_coach']=$this->input->post('te_coach');
		$t_data['acid']=$this->input->post('acid');
		//以下为上传的模块
		//上传时，特别注意的是：默认情况下上传的文件来自于提交表单里名为userfile的文件域
		// var_dump($_FILES);
		if ($_FILES['userfile']['tmp_name']!='') {
			$config['upload_path'] = './public/admin/Images/T_coach';
  			$config['allowed_types'] = 'gif|jpg|png';
  			$config['file_name']=time().strchr($_FILES['userfile']['name'],'.');
  			$config['max_size'] = '2048';
 	 		$config['max_width']  = '0';
 			$config['max_height']  = '0';
 			$this->load->library('upload',$config);//取得上传类
 			if (!$this->upload->do_upload()) {
 				 $error = array('error' => $this->upload->display_errors());
 				 show_error($error);
 			}else{
 				 $data=$this->upload->data();
 				 // var_dump($data);
 				 $t_data['f_coach']=$data['file_name'];//把图像名赋给$data
 			}
		}

		$this->load->model('admin_model/temp_list_model');
		$query=$this->temp_list_model->add_temp($t_data);
		// var_dump($t_data);
		// var_dump($query);
		if (!$query) {
			show_error('插入失败');
		}
		$this->load->view('admin_view/add_success.html');
	}
	//修改球队信息的页面
	public function alter_temp_view(){
		// echo $this->uri->segment(4);
		$num=$this->uri->segment(4);
		$this->load->model('admin_model/temp_list_model');
		$temp=$this->temp_list_model->get_temp_one($num);
		$data['ar_ca']=$this->temp_list_model->get_arcago();
		$data['temp']=$temp[0];
		// var_dump($data);
		$this->load->view('admin_view/alter_temp.html',$data);
	}
	//修改球队信息
	public function alter_temp(){
		$this->load->model('admin_model/temp_list_model');
		$this->load->library('Session');
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}
		// var_dump($_POST);
		$t_data=$this->input->post();
		$num=$this->uri->segment(4);
		// var_dump($t_data);
		$where="teid=$num";
		// echo $num;
		$query=$this->temp_list_model->alter_temp($t_data,$where);
		if (!$query) {
			show_error('更改失败');
		}else{
			$data['url']=site_url('admin_/temp_list/index');
			$this->load->view('admin_view/alter_success.html',$data);
		}	
	}
	//修改球队图片信息的页面
	public function img_add_view(){
		$this->load->model('admin_model/temp_list_model');
		$this->load->library('Session');
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}

		$num=$this->uri->segment(4);
		$temp=$this->temp_list_model->get_temp_one($num);
		$data['temp']=$temp[0];
		// var_dump($data);
		$this->load->view('admin_view/img_upload.html',$data);
	}
	public function img_ajax(){
		if (isset($_POST['f_coach'])) {
			$data['f_coach']=$this->input->post('f_coach');
			$num=$this->uri->segment(4);
			$where="teid=$num";
			$this->load->model('admin_model/temp_list_model');
			$query=$this->temp_list_model->alter_temp($data,$where);
		}elseif (isset($_POST['te_logo'])) {
			$data['te_logo']=$this->input->post('te_logo');
			$num=$this->uri->segment(4);
			$where="teid=$num";
			$this->load->model('admin_model/temp_list_model');
			$query=$this->temp_list_model->alter_temp($data,$where);
		}
	}

	public function del_temp(){
		$num=$this->uri->segment(4);
		$this->load->model('admin_model/agende_list_model');

		$this->load->library('Session');
		if (!(isset($_SESSION['admin_name']) || isset($_SESSION['admin_id']))) {
			$url=site_url('admin');
			echo "<script>location.href='$url';</script>";
		}

		$where="teid=$num";
		$this->agende_list_model->del_('temp',$where);
		//球队的所有赛程删除
		$where="h_id={$num} or v_id={$num}";
		$this->agende_list_model->del_('nba_agende',$where);
		//球员变成自由球员
		$teid['teid']=0;
		$where="teid=$num";
		$this->agende_list_model->update_('sports',$teid,$where);
		$data['url']=site_url('admin_/temp_list/index');
		$this->load->view('admin_view/del_success.html',$data);
	}
}
?>