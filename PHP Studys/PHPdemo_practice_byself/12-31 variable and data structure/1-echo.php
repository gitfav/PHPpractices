<?php

	header('content-type:text/html;charset=utf-8;');
	echo "<h2>这是h2标签</h2>";
	// echo "<script>alert(123)</script>";
	echo 'Arnold once said :"I\'ll be back"';
	echo "<br/>";

	class foo
	{
		var $foo;
		var $bar;

		function foo()
		{
			$this->foo = 'foo';
			$this->bar = array('bar1','bar2','bar3');
		}
	}

	$foo = new foo();
	$name = 'Myname';
	$a= <<<EOT
		name is "$name".<p>asdfsad</p>
		foo is "$foo->foo".
		arr is {$foo->bar[1]}<br/>
EOT;
//以上的Heredoc 结构 输出字符串 就象双引号字符串
	$a = htmlspecialchars($a);
	var_dump($a);
	echo <<<"FOOBAR"
	Hello World!<br/>
FOOBAR;

	echo  <<<'EOT'
	HELL WORLD!<br/>
EOT;
//以上的Nowdoc  结构 输出字符串 就象单引号字符串


	$juice = "apple";

	echo "He drank some $juice juice.".PHP_EOL.'<br/>';
// Invalid. "s" is a valid character for a variable name, but the variable is $juice.
// echo "He drank some juice made of $juices.";//会报错

	class beer
	{
		const softdrink = 'rootbeer';
		public static $ale = 'ipa';
	}

	$rootbeer = 'A & W';
	$ipa = 'Alexander keith\'s';

	echo "I'd like an {${beer::softdrink}}".PHP_EOL.'<br/>';
	echo "I'd like an {${beer::$ale}}";

	$a = 4.323121E16;
	var_dump($a);
	echo '<br/>';
	var_dump(strval($a));
	$b='12312';
	$foo = "1 sadfsa"+1;
	var_dump($foo);
	var_dump(ord('"'));


?>