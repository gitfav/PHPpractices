<?php
//框架核心类
class C45{
	//唯一对外方法，将框架运行
	public static function run(){

		//1,定义框架路径常量
		self::setConst();

		//2,创建应用目录
		self::createDir();

		//3,载入框架核心文件
		self::load_core();

		Application::runApp();
	}

	private static function createDir(){
		$dirs = array(
			APP_ROOT,
			APP_CONFIG,
			APP_CONTROLLER,
			APP_VIEW,
			APP_PUBLIC,
			);
		foreach ($dirs as  $d) {
			is_dir($d) || mkdir($d,0777,true);
		}

		// mkdir(pathname)
	}
	private static function setConst(){
		$path =  str_replace('\\','/',dirname(__FILE__));
		define('FRAME_ROOT',$path);
		//Lib
		define('FRAME_LIB',FRAME_ROOT.'/Lib');
		define('FRAME_CORE',FRAME_LIB.'/Core');
		define('FRAME_FUNCTION',FRAME_LIB.'/Functions');

		//============应用模具结构常量
		define('APP_ROOT',dirname(FRAME_ROOT).'/'.APP_NAME);
		define('APP_CONFIG',APP_ROOT.'/Config');
		define('APP_CONTROLLER',APP_ROOT.'/Controller');
		define('APP_VIEW',APP_ROOT.'/View');
		define('APP_PUBLIC',APP_VIEW.'/Public');
	}

	private static function load_core(){
		$dirs = array(
			FRAME_CORE.'/Application.class.php',
			FRAME_FUNCTION.'/functions.php',
			FRAME_CORE.'/Controller.class.php',
			);
		foreach ($dirs as $f) {
			require $f;
		}
	}
}

C45::run();

?>