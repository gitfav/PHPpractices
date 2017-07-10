<?php 

$phone=$_POST['phone'];
// $str = 'my number '.$phone;
// echo $str;
$userphone = array(
	18500076005,
	13804557997,
	123123123,
	222222222,
	);

foreach ($userphone as $k => $v) {
	if ($phone==$v) {
		$str=array(
			'staues'=>0
			);
		echo json_encode($str);die;
	}
}
$str=array(
		'staues'=>1
		);
echo json_encode($str);die;


 ?>