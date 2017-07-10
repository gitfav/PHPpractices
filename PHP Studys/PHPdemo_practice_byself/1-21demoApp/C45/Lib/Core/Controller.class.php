<?php

class Controller{
	protected $var;

	protected function write_db($data,$path='./db.php'){
		$data = "<?php return ".var_export($data,true).";?>";

		file_put_contents($path, $data);
	}

	protected function success($msg='操作成功',$url='./index.php'){
		echo "<script>alert('$msg');location.href='$url';</script>";
	}

	protected function display($tpl=null){
		extract($this->var);
		if(is_null($tpl)){
			$a = isset($_GET['a']) ? $_GET['a'] : 'index';
		}else{
			$a = $tpl;
		}
		$c = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		$file =  APP_VIEW.'/'.$c.'/'.$a.'.html';
		require $file;
	}

	protected function assign($name,$value){
		$this->var[$name] = $value;
		// p($this->var);
	}
}