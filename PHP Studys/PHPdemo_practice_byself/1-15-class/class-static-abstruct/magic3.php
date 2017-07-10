<?php

class M{
	//调用一个不存在的方法的时候，自动运行__call 第一个参数是方法名，第二个参数是  :该方法的参数数组
	public function __call($func,$param){
		var_dump($func);

		var_dump($param);
	}
}

$m = new M();

$m->getMsg('123','aaa','bbb');



?>