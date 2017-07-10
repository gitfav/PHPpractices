<?php
	
	$message = require './db.php';


	if(!empty($_POST)){
		//覆盖旧数据
		$_POST['time'] = time();

		$index = $_POST['index'];

		unset($_POST['index']);	//删除存在_POST中index变量。_POST["index"]=$k;

		$message[$index] = $_POST;

		//写如数据库操作
		$data = var_export($message,true);

		$data = "<?php return ".$data.";?>";

		file_put_contents('./db.php', $data);

		//跳转操作
		//跳转操作开始
	echo "<script>alert('操作成功');location.href='./index.php'</script>";

	}else{

		//显示旧数据
		$index = $_GET['index'];

		$nowData = $message[$index];

		require './edit.html';

	}

?>