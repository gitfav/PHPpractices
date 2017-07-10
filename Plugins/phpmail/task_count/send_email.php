<?php

header('Content-type:text/html;charset=utf-8');

ini_set('date.timezone','Asia/Shanghai');
if (time()<strtotime(date('Y-m-d'))+24*3600-2) {
	exit();
}

$count_num = new Taskcount();
$re = $count_num->count_db();

	require_once "email.class.php";
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.126.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "wangrjmailbox@126.com";//SMTP服务器的用户邮箱
	$smtpemailto = 'ruhao.yu@maijin8.com';//发送给谁
	$smtpuser = "wangrjmailbox";//SMTP服务器的用户帐号
	$smtppass = "wohenhao514925";//SMTP服务器的用户密码
	$mailtitle = '<h1>任务系统数据（'.date('Y-m-d').'）</h1>';//邮件主题
	$mailcontent = '添加的人数：'.$re['all_num']['0']['all_num'].'<br>
					今日注册人数：'.$re['all_reg']['0']['all_reg'].'<br>
					今日通过任务系统，并被邀请的注册人数：'.$re['all_regtask']['0']['all_regtask'].'<br>
					今日进入任务系统的新用户：'.$re['all_task']['0']['all_task'].'<br>
					今日分享过的人数：'.$re['last_share']['0']['last_share'].'<br>
					今日获得奖金的任务：'.$re['get_money_task']['0']['get_money_task'].'<br>
					今日新进入并玩游戏的人数：'.$re['get_game']['0']['get_game'].'<br>
					今日玩游戏获得基金的人数：'.$re['get_fund_task']['0']['get_fund_task'].'<br>
					领取过奖金的总人数：'.$re['get_reward_pep']['0']['get_reward_pep'].'<br>
					'.date('Y-m-d H:i:s',time());
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	var_dump($re);

class Taskcount{

	protected static $link = null;

	public function __construct(){

		//链接数据库
		$this->_connect();

	}

	public function count_db(){

		$time = strtotime(date('Y-m-d'));

		//添加人数()
		$sql = 'select count(wx_id) as all_num from h_wxuser where wx_jointime>"'.date('Y-m-d').'"';
		$re['all_num'] = $this->qu($sql);

		//今日注册人数()
		$sql = 'select count(wx_id) as all_reg from h_wxuser where wx_jointime>"'.date('Y-m-d').'"  and wx_mobile!=" "';
		$re['all_reg'] = $this->qu($sql);

		//今日通过任务系统，并被邀请的注册人数()
		$sql = 'select count(wx_id) as all_regtask from h_wxuser where wx_jointime>"'.date('Y-m-d').'" and wx_invitation!=" " and wx_mobile!=" " and wx_invitation!="undefined"';
		$re['all_regtask'] = $this->qu($sql);


		//今日进入任务系统的用户
		$sql = 'select count(center_id) as all_task from h_wxuser_task where center_jointime>"'.$time.'"';
		$re['all_task'] = $this->qu($sql);

		//今日分享过的人数
		$sql = 'select count(center_id) as last_share from h_wxuser_task where center_laster_share>"'.$time.'"';
		$re['last_share'] = $this->qu($sql);

		//今日获得奖金的任务
		$sql = 'select count(log_id) as get_money_task from h_task_log where task_id!=5 and task_process=4 and reward_gettime>"'.$time.'" and is_obtail_money=1';
		$re['get_money_task'] = $this->qu($sql);

		//今日新进入并玩游戏的人数
		$sql = 'select count(game_id) as get_game from h_task_gamerank where game_jointime>"'.$time.'"';
		$re['get_game'] = $this->qu($sql);

		//今日玩游戏获得基金的人数
		$sql = 'select count(wx_id) as get_fund_task from h_task_log where task_id=5 and task_process=4 and reward_gettime>"'.$time.'"';
		$re['get_fund_task'] = $this->qu($sql);

		//领取过奖金的总人数
		$sql = 'select count(center_id) as get_reward_pep from h_wxuser_task where center_bonus>0';
		$re['get_reward_pep'] = $this->qu($sql);


		return $re;

	}

	/*
	*	建立数据库链接
	*/
	private function _connect(){
		//没有数据库链接，建立链接
		if(is_null(self::$link)){
			$link = new Mysqli('','','','wxmj');
			//如果有错误号，打印链接错误信息
			if($link->connect_errno){
				echo $link->connect_error;die;
			}
			//设置字符集           mysqli 使用 query 运行sql语句 
			$link->query('SET NAMES UTF8');

			self::$link = $link;
		}	
	}
	/*
	*	针对有结果集的操作
	*   用来执行查询语句
	*/
	private function qu($sql){
		$result = self::$link->query($sql);
		$rows = array();
		if(self::$link->affected_rows>0){
			
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
		}
		return $rows;
	}

}