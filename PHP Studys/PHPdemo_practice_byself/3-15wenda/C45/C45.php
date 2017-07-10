<?php 

class C45{

	public static function run(){
		//1.定义路径常量（方便载入）
		self::setConst();
		//2.创建APP应用目录
		self::createDir();
		//3.载入框架核心文件
		self::load_file();
		//4.运行应用
		Application::runApp();
	}
	//定义路径常量
	private static function setConst(){
		//框架根目录
		$path=str_replace('\\', '/', dirname(__FILE__));//F:/wamp/www/PHPdemo practice byself/1-19-frame/C45 
		//框架根目录
		define('FRAME_ROOT',$path);
		define('FRAME_CONFIG',FRAME_ROOT.'/Config');//框架配置项目录
		define('FRAME_LIB',FRAME_ROOT.'/Lib');//--框架核心目录
		define('FRAME_CORE',FRAME_LIB.'/Core');//--框架核心Core目录
		define('FRAME_FUNCTION',FRAME_LIB.'/Function');// --框架核心Function目录
		define('FRAME_EXTENDS', FRAME_ROOT.'/Extends');// --框架扩展目录
		define('FRAME_TOOL', FRAME_EXTENDS.'/Tool');//--扩展工具目录

		//创建定义--APP应用目录的路径
		$path=dirname(FRAME_ROOT);//D:/wamp/www/PHPdemo practice byself/1-19-frame
		define('APP_ROOT',$path.'/'.APP_NAME);//APP应用根目录
		define('APP_CONFIG',APP_ROOT.'/Config');//APP应用配置项Config
		define('APP_CONTROLLER',APP_ROOT.'/Controller');//创建应用控制器目录
		define('APP_VIEW', APP_ROOT.'/View');//创建应用模板目录
		define('APP_PUBLIC', APP_VIEW.'/Public');//创建应用公共模板目录
		define('COMMON',$path.'/Common');//前后台公用目录Common
		define('MODEL',COMMON.'/Model');//前后台公用模型

		//2015年3月12日建
		define('APP_TEMP', APP_ROOT.'/Temp');
		define('APP_COMPILE', APP_TEMP.'/Compile');
		define('APP_CACHE', APP_TEMP . '/Cache');

	}

	//创建APP路径
	private static function createDir(){
		$dir=array(
			APP_ROOT,
			APP_CONFIG,
			APP_CONTROLLER,
			APP_VIEW,
			APP_PUBLIC,
			COMMON,
			MODEL,
			APP_COMPILE,
			APP_CACHE
		);
		foreach ($dir as $v) {
			is_dir($v) || mkdir($v,0777,true);
		}
	}

	//载入框架核心文件
	private static function load_file(){
		$dir=array(
			FRAME_CORE.'/Application.class.php',
			FRAME_CONFIG.'/config.php',
			FRAME_CORE.'/SmartyView.class.php',
			FRAME_FUNCTION.'/functions.php',
			FRAME_CORE.'/Controller.class.php',
			FRAME_EXTENDS.'/Org/smarty/Smarty.class.php'
		);
		foreach ($dir as $v) {
			require $v;
		}
	}

}

C45::run();

 ?>