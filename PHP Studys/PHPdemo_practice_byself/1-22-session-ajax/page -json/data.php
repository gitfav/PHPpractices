<?php
require '../../functions.php';
$data = array(
	'第一篇文章',
	'第二篇文章',
	'第3篇文章',
	'第4篇文章',
	'第5篇文章',
	'第6篇文章',
	'第7篇文章',
	'第8篇文章',
	'第9篇文章',
	'第10篇文章',
	'第11篇文章',
	'第12篇文章',
	'第13篇文章',
	);
$index = $_POST['page'];

$new = array_chunk($data, 4);

echo json_encode($new[$index]);
die;

?>