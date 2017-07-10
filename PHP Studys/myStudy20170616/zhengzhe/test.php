<?php
header('Content-type:text/html;charset=utf-8');
$temp = 0=='a'?1:2;
var_dump(0=='a');
echo $temp;

//匹配ip地址
echo preg_match('/^((25[0-5]|2[0-4]\d|[01]?\d\d?)\.){3}(25[0-5]|2[0-4]\d|[01]?\d\d?)$/','12.21.204.2',$match);
//用分枝首先确定了 250-255 和 200-249 。 [01]?\d\d? 则确定了 0-199 的范围，综合起来就是 0-255 。
var_dump($match);

echo preg_match('/^(http:\/\/)?([^\/]+)/i','http://www.jerise.com/sd/ss',$match);
//不用匹配到结束，所以不使用 $ 。
var_dump($match);
$host = $match[2];
echo preg_match('/[^\.\/]+\.[^\.\/]+$/',$host,$match);//没有^ 开始符号，从字符串尾部判断。
var_dump($match);

$str = "<pre>学习php是一件快乐的事。</pre><pre>所有的phper需要共同努力！</pre>";
preg_match_all('/<pre>([\s\S]*?)<\/pre>/',$str,$mat);// /s和/S组合表示任何字符都可以了   pre_match_all可以返回整个模式匹配的次数
var_dump($mat);

$str = '士大夫似的sfd士大夫士大夫';
preg_match_all("/[^x80-xff]+/", $str, $match);
//preg_match_all("/[x{4e00}-x{9fa5}]+/u", $str, $match);
var_dump($match);


$str = "The quick brown fox jumped over the lazy dog.";

$patterns[0] = "/quick/";
$patterns[1] = "/brown/";
$patterns[2] = "/fox/";

$replacements[2] = "bear";
$replacements[1] = "black";
$replacements[0] = "slow";

print preg_replace($patterns, $replacements, $str)."<br>";

ksort($replacements);//键值排序
print preg_replace($patterns, $replacements, $str)."<br>";

$str = "php mysql,apache ajax";
$keywords = preg_split("/[\s,]+/", $str);
var_dump($keywords);

$str = "php mysql,apache ajax";
$keywords = preg_split("/[\s,]+/", $str, -1, PREG_SPLIT_OFFSET_CAPTURE);//如果指定了 limit（第三个参数），则最多返回 limit 个子串，如果 limit 是 -1，则意味着没有限制，可以用来继续指定可选参数 flags
/**
 * 第四个参数
 * PREG_SPLIT_NO_EMPTY：preg_split() 只返回非空的成分
 * PREG_SPLIT_DELIM_CAPTURE：定界符模式中的括号表达式也会被捕获并返回
 * PREG_SPLIT_OFFSET_CAPTURE：对每个出现的匹配结果也同时返回其附属的字符串偏移量。注意这改变了返回的数组的值，使其中的每个单元也是一个数组，其中第一项为匹配字符串，第二项为其在 subject 中的偏移量。
 */
var_dump($keywords);
/*
split()
split() 函数同 preg_split() 类似，用正则表达式将字符串分割到数组中，返回一个数组，但推荐使用 preg_split() 。
语法：
array split( string pattern, string string [, int limit] )
如果设定了 limit ，则返回的数组最多包含 limit 个单元，而其中最后一个单元包含了 string 中剩余的所有部分。如果出错，则返回 FALSE。
*/