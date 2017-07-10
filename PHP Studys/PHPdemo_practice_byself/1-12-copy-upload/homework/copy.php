<?php



function cp($res,$dst){
	//1，创建真正的目标路径
	$newDst = $dst.'/'.basename($res);
	//2, 如果没有目标目录===》创建，有==》不操作
	is_dir($newDst) || mkdir($newDst,0777,true);
	//3, 进入目录，复制文件和文件夹
	$dir = glob($res.'/*');
	foreach ($dir as $r) {
		if(is_dir($r)){
			cp($r,$newDst);
		}else{
			$to = $newDst.'/'.basename($r);
			copy($r,$to);
		}
	}
}

cp('./copytest/11/res','./b');

//===============分析=============

// 1，组合真正路径  ../copytest/to/dst/res

?>