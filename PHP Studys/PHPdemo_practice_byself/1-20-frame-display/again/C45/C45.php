<?php
/*
* 框架核心类
*/

class C45{
	//框架运行
	public static function run(){
		//1,定义路径常量
		self::setConst();
		//2,创建应用目录
		self::createDir();

		//3,载入核心文件
		self::loadCore();
		//4,
		Application::runApp();
	}
	//定义路径常量方法,以便载入方法可用。
	private static function setConst(){
		//获取C45框架的根目录
		$path = str_replace('\\', '/', dirname(__FILE__));
		//框架根目录
		define('FRAME_ROOT',$path);
		//Lib目录
		define('FRAME_LIB',FRAME_ROOT.'/Lib');
		//Core目录
		define('FRAME_CORE',FRAME_LIB.'/Core');
		//Function目录
		define('FRAME_FUNCTION',FRAME_LIB.'/Function');
		//框架配置项目录
		define('FRAME_CONFIG',FRAME_ROOT.'/Config');
		//扩展目录
		define('FRAME_EXTENDS',FRAME_ROOT.'/Extends');
		//扩展工具目录
		define('FRAME_TOOL',FRAME_EXTENDS.'/Tool');
		//==============App目录结构常量定义=========
		$dir = dirname(FRAME_ROOT);
		//定义应用根目录
		define('APP_ROOT',$dir.'/'.APP_NAME);
		//应用控制器路径
		define('APP_CONTROLLER',APP_ROOT.'/Controller');
		//应用配置项路径
		define('APP_CONFIG',APP_ROOT.'/Config');
		//模板存放路径
		define('APP_VIEW',APP_ROOT.'/View');
		//公共css js 存放public路径
		define('APP_PUBLIC',APP_VIEW.'/Public');
	}
	//创建应用目录
	private static function createDir(){
		//将要创建的应用目录存入数组 
		$dirs = array(
			APP_ROOT,
			APP_CONTROLLER,
			APP_CONFIG,
			APP_VIEW,
			APP_PUBLIC,
			);
		foreach ($dirs as $d) {
			is_dir($d) || mkdir($d,0777,true);
		}
	}
	private static function loadCore(){
		//载入方法需要路径,因此在载入之前，需要定义路径常量
		//要载入文件的路径数组
		$files = array(
			FRAME_CORE.'/Controller.class.php',
			FRAME_CORE.'/Application.class.php',
			FRAME_FUNCTION.'/functions.php',

			);
		foreach ($files as $f) {
			require $f;
		}

	}

}
C45::run();

?>