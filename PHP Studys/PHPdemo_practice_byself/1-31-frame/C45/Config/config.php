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
	'UPLOAD_PATH'		=> './upload'

	// smarty配置项
	"SMARTY_LEFT"		=>	"{hd",
	"SMARTY_RIGHT"		=>	"}",
	"SMARTY_CACHE"		=>	false,
	"SMARTY_CACHETIME"	=>	10,

	);
 ?>