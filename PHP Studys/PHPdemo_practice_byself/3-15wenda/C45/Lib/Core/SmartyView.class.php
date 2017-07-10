<?php 
class Smartyview{
	private static $smarty=null;
	public function __construct(){
		if (is_null(self::$smarty)) {
			$smarty = new Smarty();
			// 模版目录
			$smarty->template_dir = APP_VIEW . '/' . CONTROLLER;
			// 编译目录
			$smarty->compile_dir = APP_COMPILE;
			// 缓存目录
			$smarty->cache_dir = APP_CACHE;
			// 开始定界符
			$smarty->left_delimiter = C('SMARTY_LEFT');
			// 结束定界符
			$smarty->right_delimiter = C('SMARTY_RIGHT');
			// 开启缓存
			$smarty->caching = C('SMARTY_CACHE');
			// 缓存时间
			$smarty->cache_lifetime = C('SMARTY_CACHETIME');
			// 不缓存块
			$smarty->register_block("nocache","nocache", false );
			self::$smarty = $smarty;
		}

	}

	protected function display($tpl = NULL){
		$fullPath = $this->_get_tpl($tpl);
		if (!is_file($fullPath)) {
			halt($fullPath . '模版文件不存在');
		}
		self::$smarty->display($fullPath,$_SERVER['REQUEST_URI']);
	}

	protected function assign($v,$value){
		self::$smarty->assign($v,$value);
	}

	protected function is_cached($tpl=NULL){
		$fullPath = $this->_get_tpl($tpl);
		return self::$smarty->is_cached($tpl,$_SERVER['REQUEST_URI']);
	}

	private function _get_tpl($tpl){
		if (is_null($tpl)) {
			$fullPath = APP_VIEW . '/' . CONTROLLER . '/' . ACTION . '.html';
		}else{
			$fullPath = APP_VIEW . '/' . CONTROLLER . '/' . $tpl . '.html';
		}
		return $fullPath;
	}


}







 ?>