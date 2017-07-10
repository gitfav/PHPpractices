<?php
class IndexController extends Controller{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		$this->display();
	}
}
?>