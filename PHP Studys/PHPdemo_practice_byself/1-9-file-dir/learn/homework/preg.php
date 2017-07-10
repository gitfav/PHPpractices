<?php

//验证邮箱

// sdfjlk@qq.com
// 34121@163.com
// dfs_dfsj@sohu.net/cn/org

$preg = '/^\w{5,10}@\w{2,10}\.(com|cn|org|net)$/is';


$email = '5723123@qq.com';

// var_dump(preg_match($preg, $email));


//网址
//1,  http://www.baidu.com
//2,  http://baidu.com
//3, www.baidu.com

//4, baidu.cn/org/net

$preg = '/^(http:\/\/www\.|http:\/\/|www\.)?\w*-?\w+\.(com|cn|org)$/';

$web = 'www.bai-du.com';

$web1 = 'http://www.baidu.com';

$web2 = 'baidu.com';

var_dump(preg_match($preg, $web));

var_dump(preg_match($preg, $web1));

var_dump(preg_match($preg, $web2));

?>