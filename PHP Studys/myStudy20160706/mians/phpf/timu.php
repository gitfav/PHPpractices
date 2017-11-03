<?php
header('content-type:text/html;charset=utf-8');
$post = $_POST;
if(!empty($post['message']))
{
	$post['message'] = ' '.$post['message'] ;
	$post['message'] .= ' ';//加上空格符，以免把邮箱给忽视掉
	//获取邮箱
	preg_match_all('/[\s]?[\w.]+@([\w.]+)\.[a-z]{2,6}[\s]{1,}/', $post['message'], $mat,PREG_OFFSET_CAPTURE);//用正则获取邮箱

	$content = file_get_contents('./ciku.txt', 'r');
	$content = explode('|', $content);

	$after_replace = str_replace($content, '**', $post['message']);

	foreach ($mat[0] as $k => $v) {
		$s = str_replace($content, '**', $v[0]);//把邮箱也过滤，得到已经过滤字符串的格式。
		$after_replace = str_replace($s, $v[0], $after_replace);//用原来的邮箱代替过滤的邮箱
	}
	$after_replace = trim($after_replace);
	var_dump($after_replace);

}