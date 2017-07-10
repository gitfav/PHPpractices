<?php 
class Model{
	private static $link=Null;

	public function __construct(){
		if (is_null(self::$link)) {
			$mysqli = @new Mysqli(C('DB_HOST'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'));
			if ($mysqli->connect_errno) halt('您输入的数据库密码或名称错误');
			$mysqli->query('SET NAMES '.C('DB_CHARSET'));
			self::$link = $mysqli;
		}
	}

	public function exe($sql){
		$link = self::$link;
		$link->query($sql);
		$this->_error($sql);
		return $link->insert_id ?$link->insert_id:$link->affected_rows;
	}

	public function query($sql){
		$link = self::$link;
		$result = $link->query($sql);
		$this->_error($sql);
		$rows = array();
		while($row = $result->fetch_assoc()) {
			$rows[]=$row;
		}
		return $rows;
	}
	private function _error($sql){
		if(self::$link->errno) {
			halt('SQL错误：' . self::$link->error . '<br/>SQL:<span style="color:red">' . $sql . '</span>');
		}
	}

}





 ?>