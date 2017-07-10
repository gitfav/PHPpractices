<?php
header('Content-type:text/html;charset=utf-8');
//交通工具类
abstract class Tracfic{

	public abstract function go();//不能有{}符号
	//继承了抽象类， 那么在子类中必须实现全部抽象方法
	public abstract function stop();
	//抽象类中 既可以有抽象方法，也可以有普通方法
	public function addOil(){
		echo '加油';
	}
}


class Car extends Tracfic{

	public function go(){
		echo '开车';
	}

	public function stop(){
		echo '停车';
	}
}

class Plane extends Tracfic{

	public function go(){
		echo '飞行';
	}

	public function stop(){
		echo '降落';
	}
}

$tools = new Car();

// $tools->go();

$tools = new Plane();

$tools->go();

$tools->addOil();

// class Car{
// 	public function drive(){
// 		echo '开车';
// 	}
// }

// class Plane{
// 	public function fly(){
// 		echo '飞行';
// 	}
// }

// $tools = new Car();

// $tools->drive();





?>