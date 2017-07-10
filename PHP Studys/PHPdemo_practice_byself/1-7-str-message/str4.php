<?php 
	header("Content-type:text/html;charset=utf-8");

	//字符串截取
  	$string='abcdefg';
  	$new=substr($string, 1);//结果bcdefg  从第一位开始截取
  	$new=substr($string, 1,2);//结果bc  从第一位开始截 接两个
  	echo $new,'</br>';

  	//字符串截取，从特定符号开始截
  	$email='yuonly@qq.com houdun@sina.com';
  	echo strchr($email,'@'),"</br>";	//从@开始截取 结果@qq.com
  	$str="houdunwang@qq.com houdun@sina.com houdun@163.com";
  	echo strrchr($str, "@"),'</br>';		//从右侧开始找  遇到@开始截取
  	// //举例 判断文件上传类型



  	$email='yuonly@qq.c@om';
  	echo strpos($email, '@'),'</br>';//从零开始计算@在 $email中的位置
  	echo strrpos($email, '@'),'</br>';//从右侧开始查找@ 的位置
  	//截取字符串扩展名开始

  	$ext='1sdfsad.sadfsd.jpg';
  	$index=strrpos($ext,'.');
  	echo $index,'</br>';
  	echo substr($ext, $index+1),'<hr>';

  	//字符串替换
  	$str='houdunwang.com';
  	$new=str_replace('c', '@', $str);//将C替换成@
  	echo $new,'</br>';
  	$arrnew=str_replace(array('c','h'), '@', $str);//将$str 中的c和h 替换成@
  	echo $arrnew,'</br>';
  	$arrnewArr=str_replace(array('c','h','g'), array('_c_','_h_'), $str);//将$str中的 c替换成 _c_   h 替换成   _h_
  	echo $arrnewArr,'<hr>';

  	//url编码解码 防止乱码
  	$param='中国';
  	$url="http://www.baidu.com?a=$param";
  	echo $url,'</br>';
  	$urlcode=urlencode($param);//url编码
  	echo $urlcode,'</br>';
  	echo urldecode($urlcode);//解码


  ?>