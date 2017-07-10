<?php

	$str = file_get_contents('http://daqianduan.com');

	$preg = '/(<a.*href=")(.*)(".*>)(.*)(<\/a>)/U';

	$new = preg_replace($preg, '\1http://www.houdunwang.com\3后盾网\5', $str);

	echo $new;
?>