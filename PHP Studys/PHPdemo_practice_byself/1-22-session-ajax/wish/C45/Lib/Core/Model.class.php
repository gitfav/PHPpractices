<?php

class Model{

	protected $table = null;//表名

	protected static $link = null;
	//sql 操作
	protected $opt = array(
		'field'		=> '*',
		'where'		=> '',
		'group'		=> '',
		'having'	=> '',
		'order'		=> '',
		'limit'		=> '',
		);
	public function __construct($table){
		//设定表名
		$this->table = $table;

		//链接数据库
		$this->_connect();
	}
	/*
	*	建立数据库链接
	*/
	protected function _connect(){
		//没有数据库链接，建立链接
		if(is_null(self::$link)){
			$link = @new Mysqli('localhost','root','','h360'); 
			//如果有错误号，打印链接错误信息
			if($link->connect_errno){
				echo $link->connect_error;die;
			}
			//设置字符集           mysqli 使用 query 运行sql语句 
			$link->query('SET NAMES UTF8');

			self::$link = $link;
		}	
	}
	/*
	*	针对有结果集的操作
	*   用来执行查询语句
	*/
	public function qu($sql){
		$result = self::$link->query($sql);
		$rows = array();
		if(self::$link->affected_rows>0){
			
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
		}
		return $rows;
	}
	/*
	*	针对无结果集的操作  增 删 改
	*	
	*/
	public function exe($sql){
		$re = self::$link->query($sql);
		if(!$re){
			echo 'SQL错误:'.$sql;die;
		}
		return self::$link->insert_id ? self::$link->insert_id : self::$link->affected_rows;
	}

	//查询方法
	public function all(){
		$sql = 'SELECT '.$this->opt['field'].' FROM '.$this->table.$this->opt['where'].$this->opt['group'].$this->opt['having'].$this->opt['order'].$this->opt['limit'];
		return $this->qu($sql);
	}

	//设定查询字段
	public function field($field){
		$this->opt['field'] = $field;
		return $this;
	}
	//组合where条件
	public function where($where){
		$this->opt['where'] = ' WHERE '.$where;
		return $this;
	}
	//组合分组
	public function group($group){
		$this->opt['group'] = ' GROUP BY '.$group;
		return $this;
	}

	//组合having
	public function having($having){
		$this->opt['having'] = ' HAVING '.$having;
		return $this;
	}

	//组合ORDER BY
	public function order($order){
		$this->opt['order'] = ' ORDER BY '.$order;
		return $this;
	}
	//组合LIMIT
	public function limit($limit){
		$this->opt['limit'] = ' limit '.$limit;
		return $this;
	}


	// array(
	// 	'username' => 'yuonly',
	// 	'age'		=> 18,


	// 	);
	// insert into student ('username','age') values ('yuonly',18);

	//add(array())  插入方法
	public function add($data =null){
		if(is_null($data)) $data = $_POST;

//==============分析====================
		// array
		//   'username' => string '123' (length=3)
		//   'age' => string '123' (length=3)
		//   'sex' => string '女' (length=3)

		// insert into student (username,age,sex) values ('123','123','女');
		$values = '"'.implode('","', $data).'"';
		$keys = array_keys($data);
		$keys = implode(',', $keys);

		$sql = 'INSERT INTO '.$this->table.' ('.$keys.') values ('.$values.')';
		return $this->exe($sql);
	}

	//更新方法
	public function update($data=null){
		if(is_null($data)) $data=$_POST;
		if(empty($this->opt['where'])){
			echo '危险操作，请给出where条件';die;
		}
//=====================分析=================
		// array
		//   'username' => string '123' (length=3)
		//   'age' => string '123' (length=3)
		//   'sex' => string '女' (length=3)
		// update student set username='yuonly',age='18',sex='男' where sid='1'

		$field = '';
		foreach ($data as $k => $v) {
			$field .= $k.'="'.$v.'",';
		}
		$field = rtrim($field,',');
		$sql = 'UPDATE '.$this->table.' SET '.$field.$this->opt['where'];
		return $this->exe($sql);
	}

	//save()  更新方法

	public function del(){
		if(empty($this->opt['where'])){
			echo '危险操作，请给出where条件';die;
		}
		$sql = 'DELETE FROM '.$this->table.$this->opt['where'];
		return $this->exe($sql);
	}

	//del()   删除


	
}

?>