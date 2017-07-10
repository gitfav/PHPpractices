<?php

class Application{

	public static function runApp(){
		//设置外部路径
		self::setUrl();
		//初始化框架
		self::init();

		//自动载入
		spl_autoload_register(array('Application','auto'));
		//创建默认控制器 IndexController
		self::createDemo();

		self::run();
	}

	private static function setUrl(){
		$root = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
		define('__ROOT__',$root);
		$public = dirname(__ROOT__).'/'.APP_NAME.'/View/Public';
		define('__PUBLIC__',$public);
	}

	private static function init(){
		//设置时区
		date_default_timezone_set('PRC');
		//加载配置项
		$sysConfig = FRAME_ROOT.'/Config/config.php';
		$appConfig = APP_ROOT.'/Config/config.php';
		if(!is_file($appConfig)){
			$data = "<?php return array();?>";
			file_put_contents($appConfig, $data);
		}
		$sysConfigData = require $sysConfig;
		$appConfigData = require $appConfig;
		C($sysConfigData);
		C($appConfigData);
		//开启session
		session_start();
	}

	private static function auto($className){
		// echo $className;
		$ext = substr($className, -10);
		if($ext=='Controller'){
			$file = APP_CONTROLLER.'/'.$className.'.class.php';
		}else{
			$file = FRAME_ROOT.'/Extends/Tool/'.$className.'.class.php';
		}
		if(!is_file($file)){
			header('Content-type:text/html;charset=utf-8');
			die($file.'类不存在');
		}
		require $file;
	}


	//执行不同类中的不同方法
	private static function run(){
		$class = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		$method = isset($_GET['a']) ? $_GET['a'] : 'index';
		$className = $class.'Controller';
		// echo $className;echo "<br>";
		// echo $method;

		$obj = new $className();
		//$obj = new IndexController();
		$obj->$method();
	}

	private static function createDemo(){
		$data =<<<str
<?php
class IndexController{

	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo "<h2>欢迎使用c45框架</h2>";
	}
}
str;
		$filename = APP_CONTROLLER.'/IndexController.class.php';
		is_file($filename) || file_put_contents($filename, $data);
	}
}