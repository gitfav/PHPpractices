<?php 

	class Model{

		protected $table=null;
		protected static $link=null;
		protected $opt = array(
			'field'		=> '*',
			'where'	=> '',
			'group'		=> '',
			'having'	=> '',
			'order'		=> '',
			'limit'		=> '',
			);

		public function __construct($table){
			$this->table=$table;
			$this->_connect();//链接数据库
		}

		public function _connect(){

			if (is_null(self::$link)) {
				$link=@new Mysqli('localhost','root','','c45');
				if ($link->connect_errno) {
					echo $link->connect_error;die;
				}
				$link->query('SET NAMES UTF8');
				self::$link=$link;
			}
		}

		/*
		*	针对有结果集的操作
		*   用来执行查询语句
		*/
		public function qu($sql){
			$result=self::$link->query($sql);
			$rows=array();
			if (self::$link->affected_rows>0) {
				while ($row=$result->fetch_assoc()) {
					$rows[]=$row;
				}
			}
			return $rows;
		}

		//针对无结果集的操作  增 删 改
		public function exe($sql){
			self::$link->query($sql);
			return self::$link->insert_id?self::$link->insert_id : self::$link->affected_rows();
		}

		public function all(){
			$sql='SELECT '.$this->opt['field'].' FROM '.$this->table.$this->opt['where'].$this->opt['group'].$this->opt['having'].$this->opt['order'].$this->opt['limit'];
			return $this->qu($sql);
		}

		//设定查询字段
		public function field($field){
			$this->opt['field']=$field;
			return $this;
		}

		//组合where条件
		public function where($where){
			$this->opt['where']=' WHERE '.$where;
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

	}

 ?>