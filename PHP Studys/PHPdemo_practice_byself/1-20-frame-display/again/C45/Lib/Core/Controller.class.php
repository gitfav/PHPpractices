<?php

class Controller{

	

	//控制器一些公用方法
	protected $var=array();//存放变量的属性
	//成功跳转方法
	public function success($url,$msg='操作成功'){
		echo "<script>alert('$msg');location.href='$url'</script>";
	}

	protected function error($url,$msg){
		echo "<script>alert('$msg');location.href='$url'</script>";
	}

	// 显示模板方法
	protected function display($tpl=null){
		extract($this->var);//将数组的键名变为变量名，键值变为该变量名的值
		//extract 分析===========
		//$this->var = array(
		// 	'message' => $message,
		// 	'user'	  => $user,	
		// //);
		// $message = $this->var['message'];	
		// $user = $this->var['user'];
		$c = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		$file = is_null($tpl) ? (isset($_GET['a']) ? $_GET['a'] : 'index') : $tpl;
		$path = APP_VIEW.'/'.$c.'/'.$file.'.html';
		// echo $path;die;
		if(!is_file($path)){
			header('Content-type:text/html;charset=utf-8');
			die($path.'模板不存在');
		}
		require $path;
	}

	protected function assign($name,$value){
		$this->var[$name] = $value;
	}
	//写数据文件方法，用于更新留言
	protected function write_db($data){
		$data = "<?php return ".var_export($data,true).";?>";
		file_put_contents('./data/db.php', $data);
	}
}
?>