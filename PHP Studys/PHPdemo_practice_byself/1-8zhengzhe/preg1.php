<?php 

	header('Content-type:text/html;charset=utf-8');
	$preg="/houdunwang/";
	$str="houdun.com后盾";
	$str_2="houdunwang.com后盾";
	$re=preg_match($preg, $str);
	$re_2=preg_match($preg, $str_2);//preg_match 匹配成功返回 1 true   匹配失败返回 0 false
	var_dump($re);
	var_dump($re_2);
	echo "<hr>";//1


	//匹配数字

	$preg='/\d/';//[0-9]
	$str='zsgf5zs';
	var_dump(preg_match($preg, $str));

	//[0-9]
	 $preg = '/[0-9]/';
	$str = 'sdfsadfsa';
	var_dump(preg_match($preg, $str));

	//非数字
	$preg='/[^0-9]/';//还有\D
	$str='286738';
	var_dump(preg_match($preg, $str));
	echo '<hr>';//2

	//\w  与任意一个英文字母,数字或下划线匹配	     //\W    除了字母,数字或下划线外与任何字符匹配
	$preg = '/\w/';
	$str = 'sdfsd';
	var_dump(preg_match($preg, $str));

	// \s 匹配空格换行等空白
	$preg = '/\s/';
	$str = 'safsad';
	var_dump(preg_match($preg, $str));

	// 转义
	$preg = '/\*/';
	$str = 'sdfsd*"sadfsdf';
	var_dump(preg_match($preg, $str));
	echo '<hr>';//3

	//字符串拆分  explode
	$str = '1.jpg@2.jpg@3.jpg@4.jpg';
	$pic = explode('@', $str);
	var_dump($pic);

	$str = '1.jpg@2.jpg#3.jpg#4.jpg@5.jpg';
	$arr = explode('@', $str);
	var_dump($arr);
	$preg = '/[@#]/';	//如果只是一个字符，可以写成   '/@/';
	$arr = preg_split($preg, $str);//字符串拆分   返回数组（如果是字符串返回字符串）。
	var_dump($arr);
	echo "<hr>";

	//原子组
	$str = 'houdunwanghoudun.com 后盾官网 bbs.houdunwang.com论坛,houdunwang';
	$preg = '/(houdun)wang/';			//加括号是指匹配括号里的并且满足后面拥有的字符串。
	//preg_replace
	$str = preg_replace($preg, '<span style="color:red;">\1</span>wang', $str);//将houdunwang字符串中的houdun描红，返回新的字符串(如果是数组返回数组)。\1表示$preg中的内容。
	echo $str,"</br>";

	//选择修饰符
	$str = 'www.baidu.com百度 www.sina.com新浪';
	$preg = '/(sina|baidu)/';//| 这个符号带表选择修释符，也就是 | 左右两侧有一个匹配到就可以
	$str = preg_replace($preg, 'houdunwang', $str);//用houdun代替了sina和baidu。
	echo $str;

	//电话号正则
	$preg='/^(138|186|189|185|131|133|139)\d{8}$/';//{}属于重复匹配,这先验证号前三位，再重复匹配8次，验证后8为是否为数字。
	$num="13819928372";
	var_dump(preg_match($preg, $num));
	echo "<hr>";

	$preg = '/\w*(@)\w*(\.com)/';
	$mail = '8737473@qq.com';
	var_dump(preg_match($preg, $mail));
	
	//模式修正符 i忽略大小写
	$preg='/a/i';
	$str='Ahhjj';
	var_dump(preg_match($preg, $str));

	//s 将换行看做普通字符
	$preg='/<div>.*<\/div>/s';//.*表示div中无论是什么内容。
	$str='<div>div内容
		</div>';
	var_dump(preg_match($preg, $str));

	//e
	$preg = '/<div>(.*)<\/div>/is';//(.*)表示div中无论是什么内容。
	$str = '<div>abdfsdf</div>';
	$new = preg_replace($preg, 'strtoupper("\1")', $str);
	echo $new,"</br>";
	$preg = '/<div>(.*)<\/div>/eis';
	$new = preg_replace($preg, 'strtoupper("\1")', $str);
	echo $new,'<hr>';


	//==========preg_match_all 匹配全部合法正则 存入数组========
	//禁止贪婪 ? 或模式修正符U
	$preg='/<div>(.*)<\/div>/U';//等价于 $preg = '/<div>(.*?)<\/div>/';	取括号里的内容。
	$str='<div>sdjfasadsd</div><div>qwesdfsgver</div><a></a>';
	preg_match_all($preg, $str, $m);
	var_dump($m);


	//preg_relace_callback  正则替换回调函数
	function upTO($v){
		return strtoupper($v[1]);
	}
	$preg='/<div>(.*?)<\/div>/';
	$str='<div>sdfs</div>';
	$str=preg_replace_callback($preg, 'upTO', $str);
	echo $str;

	//在匹配字符串中，先生成一个数组，/  /中的全部表示数组中的0，第一个()表示数组总的2，随后依次推。



 ?>