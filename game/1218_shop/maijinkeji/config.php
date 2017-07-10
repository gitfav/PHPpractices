<?php

class ServerInfo
{
    public $host = "";
    public $dbname = "";
    public $dbuser = "";
    public $dbpsd = "";
    
    public $serverhost = "";
    public $serverport = "";
    
    public function ServerInfo($phost,$pdbname,$pdbuser,$pdbpsd,$pserverhost,$pserverport)
    {
    	$this->host = $phost;
    	$this->dbname = $pdbname;
    	$this->dbuser = $pdbuser;
    	$this->dbpsd = $pdbpsd;
    	$this->serverhost = $pserverhost;
    	$this->serverport = $pserverport;
    }
    
    public function getHost() {
        return $this->host;
    }
    
    public function getDBname() {
        return $this->dbname;
    }
    
    public function getDBuser() {
        return $this->dbuser;
    }
    public function getDBpsd() {
        return $this->dbpsd;
    }
    public function getServerhost() {
        return $this->serverhost;
    }
    public function getServerport() {
        return $this->serverport;
    }
}

$GLOBALS['host'] = "127.0.0.1";
$GLOBALS['dbname'] = "maijinkeji";
$GLOBALS['dbuser'] = "maijinkeji";
$GLOBALS['dbpsd'] = "zsxg@2015";



$GLOBALS['serverhost'] = "";
$GLOBALS['serverport'] = "";

//访问本地接口的IP地址，防止其他地址访问
$GLOBALS['requestip'] = array("127.0.0.1","192.168.1.5","192.168.1.8","192.168.1.3","192.168.1.7","192.168.1.6");

//服务器配置
$GLOBALS['server_configs'] = array("S2"=>new ServerInfo("6228.cname.edong.com:3306","yjcx","yjcxserver","nvF4vdMCGSVDwjMu","6228.cname.edong.com","5130"),
									"S1"=>new ServerInfo("6231.cname.edong.com:3306","yjcx","yjcxserver","nvF4vdMCGSVDwjMu","6231.cname.edong.com","5130"));

function isIpAllow($ip)
{
	foreach($GLOBALS['requestip'] as $i)
	{
		if ($i == $ip)
			return true;
	}
	return true;
}

function request_by_other($remote_server,$post_string){
	$context = array(
		'http'=>array(
		'method'=>'POST',
		'header'=>'Content-type: application/x-www-form-urlencoded'."\r\n".
		'Content-length: '.strlen($post_string),
		'content'=>$post_string)
	);
	$stream_context = stream_context_create($context);
	//echo $remote_server;
	$data = file_get_contents($remote_server,FALSE,$stream_context);
	//echo $post_string;
	/*$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, $remote_server);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $post_string);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);*/

	return $data;
}

function setServerInfo($sid)
{
	if (!array_key_exists("S".$sid,$GLOBALS['server_configs']))
	{
		return false;
	}
	$info = $GLOBALS['server_configs']["S".$sid];
	$GLOBALS['host'] = $info->getHost();
	$GLOBALS['dbname'] = $info->getDBname();
	$GLOBALS['dbuser'] = $info->getDBuser();
	$GLOBALS['dbpsd'] = $info->getDBpsd();
	$GLOBALS['serverhost'] = $info->getServerhost();
	$GLOBALS['serverport'] = $info->getServerport();
	return true;
}

/**
		 * 对byte做异或运算 
		 * @param byte
		 * @param startIndex
		 * @param endIndex
		 * 
		 */		
		function ByteArrayArichmeticXOR(&$byte, $startIndex, $endIndex)
		{
			$key = $GLOBALS['key'];
			$len = $endIndex > strlen($byte) ? strlen($byte) : $endIndex;
			$keyLen = strlen($key);
			$i = $startIndex;
			for(; $i < $len; $i++)
			{
				//echo$byte[$i];
				//echo $key[($i - $startIndex) % $keyLen];
				//echo $byte[$i];
				$byte[$i] = $byte[$i] ^ $key[($i - $startIndex) % $keyLen];
				
			}
		}

		$GLOBALS['key'] = '9595354db3ea8f30ae8e8e4ffd606d3e';
		//$GLOBALS['key'] = '9595354db3ea8f30ae8e8e4ffd606d3d';
		
		
		
		?>
