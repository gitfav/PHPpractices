<?php

class Controller{
	//控制器一些公用方法
	protected $var = array();//存放变量
	//成功跳转方法
	public function success($url,$msg='操作成功'){
		header('Content-type:text/html;charset=utf-8');
		echo "<script>alert('$msg');location.href='$url'</script>";
	}

	protected function error($url,$msg){
		echo "<script>alert('$msg');location.href='$url'</script>";
	}


// 显示模板方法
	protected function display($tpl=null){
		extract($this->var);//将数组的键名变为变量，键值变为变量值

		$c = isset($_GET['c'])?ucfirst($_GET['c']):'Index';
		$file = is_null($tpl)?(isset($_GET['a'])?$_GET['a']:'index'):$tpl;
		$path = APP_VIEW.'/'.$c.'/'.$file.'.html';
		if (!is_file($path)) {
			header('Content-type:text/html;charset=utf-8');
			die($path.'模板不存在');
		}
		require $path;
	}
	//assign 分配变量,作用是把$message变成属性
	protected function assign($name,$value){
		$this->var[$name] = $value;
	}

//写数据文件方法，用于更新数据
	protected function write_db($data,$path='./data/db.php'){
		$data = var_export($data,true);
		$data = "<?php return $data ;?>";
		file_put_contents($path, $data);
	}

}
?>