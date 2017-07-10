<?php
header('Content-type:text/html;charset=utf-8');
//接口

//接口和抽象类可以实现统一子类方法名的目的
interface  Db{

	public function connect();

	public function add();

	public function select();

}


class Mysql implements Db{

	public function connect(){
		echo 'mysql链接数据库';
	}

	public function add(){
		echo 'mysql添加';
	}

	public function select(){
		echo 'mysql查询';
	}
}

$db = new Mysql();

$db->connect();

class SQLSERVER implements Db{

	public function connect(){
		echo 'SQLSERVER链接数据库';
	}

	public function add(){
		echo 'SQLSERVER添加';
	}

	public function select(){
		echo 'SQLSERVER查询';
	}
}

$db = new SQLSERVER();

$db->connect();