<?php
/*
*	应用类
*/
class Application{

	public static function runApp(){
		self::setUrl();//定义外部访问路径
		self::init();//框架初始化
		spl_autoload_register(array(__CLASS__,'auto'));//自动加载
		self::createDemo();
		self::run();
	}

	private static function setUrl(){
		$root='http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
		define('__ROOT__',$root);
		$public=dirname($root).'/'.APP_NAME.'/View/Public';
		define('__PUBLIC__',$public);
	}

	private static function init(){
		//1,设定时区
		date_default_timezone_set('PRC');
		//2,加载配置项
		//框架配置项路径
		$sysConfig=FRAME_CONFIG.'/config.php';
		//应用配置项路径	
		$appConfig=APP_CONFIG.'/config.php';
		if (!is_file($appConfig)) {
			$data=<<<str
<?php
	return array();
?>
str;
			file_put_contents($appConfig,$data);
		}
		C(require $sysConfig);
		C(require $appConfig);
		session_start();
		//3,开启sesseion
		// TODO
	}

	private static function auto($className){
		$flag=substr($className,-10);
		if ($flag=='Controller') {
			$file=APP_CONTROLLER.'/'.$className.'.class.php';
		}
		else{
			$file=FRAME_TOOL.'/'.$className.'.class.php';
		}
		if (!is_file($file)) {
			header('Content-type:text/html;charset=utf-8');
			die($className.'类不存在');
		}
		require $file;
	}

	private static function createDemo(){
		$file=APP_CONTROLLER.'/IndexController.class.php';
		if (!is_file($file)) {
			$data=<<<str
<?php
class IndexController{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo "<h2 style='text-align:center'>欢迎使用C45框架</h2>";
	}
}
?>
str;
			file_put_contents($file, $data);
		}
	}

	private static function run(){
		$class = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		$method = isset($_GET['a']) ? $_GET['a'] : 'index';
		$className = $class.'Controller';
		$obj = new $className();
		if(method_exists($obj, $method)){
			$obj->$method();
		}else{
			header('Content-type:text/html;charset=utf-8');
			die($className.'类中不存在'.$method.'方法');
		}		
	}

}



?>