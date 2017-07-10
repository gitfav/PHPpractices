<?php 

class UserModel extends Model{
	public function getDate(){
		return $this->all();
	}

	public function addUser(){
		$data=array(
			'username' => $_POST['username'],
			'password' => md5($_POST['pwd']),
		);
		if ($this->add($data)) {
			return true;
		}else{
			return false;
		}
	}
}

 ?>