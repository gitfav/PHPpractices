<?php
class IndexController extends Controller{
	public function index(){
		$model = K('category');
		$category = $model->getData();
		$this->assign('category',$category);

		$ask = K('ask');
		$ask = $ask->getDate();
		$this->assign('ask',$ask);
		$this->display();
	}
}
?>