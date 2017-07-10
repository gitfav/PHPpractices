<?php
/*
*	应用类
*/
class Application{

	public  static function runApp(){
		//定义外部访问路径
		self::setUrl();

		//框架初始化
		self::init();
		
		//自动加载
		spl_autoload_register(array(__CLASS__,'auto'));
		//创建demo  IndexController类
		self::createDemo();
		//执行应用
		self::run();
	}
	private static function setUrl(){
		//首页路径
		//http://127.0.01/c45/1-20-frame/again/index.php
		$root = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
		define('__ROOT__',$root);
		//定义外部Public 路径
		$public = dirname($root).'/'.APP_NAME.'/View/Public';
		define('__PUBLIC__',$public);
		
	}

	//框架初始化
	private static function init(){
		//1,设定时区
		date_default_timezone_set('PRC');
		//2,加载配置项
		//框架配置项路径
		$sysConfig = FRAME_CONFIG.'/config.php';
		//应用配置项路径
		$appConfig = APP_CONFIG.'/config.php';
		if(!is_file($appConfig)){
			$data =<<<str
<?php
return array();
?>
str;
			file_put_contents($appConfig, $data);
		}
		C(require $sysConfig);
		C(require $appConfig);
		//3,开启sesseion
		// TODO
		session_start();
	}

	//自动加载
	private static function auto($className){
		$flag = substr($className, -10);
		if($flag=='Controller'){
			$file = APP_CONTROLLER.'/'.$className.'.class.php';
		}else{
			$file = FRAME_TOOL.'/'.$className.'.class.php';
		}
		
		if(!is_file($file)){
			header('Content-type:text/html;charset=utf-8');
			die($className.'类不存在');
		}
		require $file;

	}

	//创建demo
	private static function createDemo(){
		$path = APP_CONTROLLER.'/IndexController.class.php';
		$data =<<<str
<?php
class IndexController{

	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo "<h2 style='text-align:center'>欢迎使用C45框架</h2>";
	}
}
?>
str;
		if(!is_file($path)){//条件成立，说明没有这个文件，则创建
			file_put_contents($path, $data);
		}
	}
	//访问不同控制器中的不同方法
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