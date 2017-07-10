<?php 
return array(
	//验证码
	'CODE_LEN'		=> 4,
	'CODE_SEED'		=> '1234567890qwertyuiopasdfghjklzxcvbnm',
	'CODE_WIDTH'	=> 150,
	'CODE_HEIGHT'	=> 80,
	'FONT_SIZE'		=> 40,
	'FONT_FILE'		=> FRAME_ROOT.'/Data/Font/jianti.ttf',

	//上传
	'UPLOAD_ALLOW_TYPE' => array('png','gif'),
	'UPLOAD_SIZE'		=> 100000000000,
	'UPLOAD_PATH'		=> APP_NAME.'/View/Public/faces',

	// smarty配置项
	"SMARTY_LEFT"		=>	"{*",
	"SMARTY_RIGHT"		=>	"}",
	"SMARTY_CACHE"		=>	false,
	"SMARTY_CACHETIME"	=>	10,

	// 连接数据库的配置项
	'DB_HOST'			=> '127.0.0.1',
	'DB_USER'			=> 'root',
	'DB_PASSWORD'		=> '',
	'DB_NAME'			=> 'wenda',
	'DB_CHARSET'		=> 'utf8',

	);
 ?>