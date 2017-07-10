<?php
header('Content-type:text/html;charset=utf-8');
/*
*	$msg 写入数据库的原始数组
*   $path 数据库文件存放路径
*/
function write_db($msg,$path){
	//重写数据库
	$data = var_export($msg,true);

	$data = "<?php return $data;?>";

	file_put_contents($path, $data);
}

function success($url,$msg){
	echo "<script>alert('$msg');location.href='$url'</script>";
}
?>