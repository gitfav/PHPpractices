<?php 

	header("Content-type:text/html;charset=utf-8");
	return array(
	 /********************************数据库********************************/
    	'DB_DRIVER'                     => 'mysqli',    //数据库驱动
    	'DB_CHARSET'                    => 'utf8',      //数据库字符集
    	'DB_HOST'                       => '127.0.0.1', //数据库连接主机  如127.0.0.1
    	'DB_PORT'                       => 3306,        //数据库连接端口
    	'DB_USER'                       => 'root',      //数据库用户名
    	'DB_PASSWORD'                   => '',          //数据库密码
    	'DB_DATABASE'                   => 'c41shop',          //数据库名称
    	'DB_PREFIX'                     => 'shop_',          //表前缀
    	'DB_BACKUP'                     => 'backup/',   //数据库备份目录
	
    	'AUTO_LOAD_FILE'                => array('functions.php'), 

	);

 ?>