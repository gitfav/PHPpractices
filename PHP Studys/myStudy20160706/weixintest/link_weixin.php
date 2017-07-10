<?php 
	
	$echostr   = $_GET["echostr"];
	
	$signature = $_GET["signature"];
	$timestamp = $_GET["timestamp"];
	$nonce     = $_GET["nonce"];

	$token = "jerise";
	$arr = array($nonce,$timestamp,$token);
	
	sort($arr, SORT_STRING);
	$str = implode($arr);
	$str = sha1($str);

	if($str == $signature && $echostr){
    	echo $echostr;
        exit;
    }else{
    	$wei = new weixin();
    	$wei->reponseMsg();
    }
// 	<xml>
// <ToUserName><![CDATA[toUser]]></ToUserName>
// <FromUserName><![CDATA[fromUser]]></FromUserName>
// <CreateTime>12345678</CreateTime>
// <MsgType><![CDATA[text]]></MsgType>
// <Content><![CDATA[你好]]></Content>
// </xml>
    class weixin{
    	public function reponseMsg(){
        	//1、获取到微信推送过来的POST数据 (xml格式)
    		$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
    		//2、处理消息类型，并设置回复类型和内容
    		$postObj = simplexml_load_string($postArr);
    		//判断该数据包是否是订阅的事件推送
    		if (strtolower($postObj->MsgType) == 'event') {
    			//如果是关注 subscribe 事件
    			if (strtolower($postObj->Event) == 'subscribe') {
    				//回复用户消息
    				$toUser = $postObj->FromUserName;
    				$fromUser = $postObj->ToUserName;
    				$time = time();
    				$msgType = 'text';
    				$Content = '欢迎关注我们的微信公众账号';
    				$template = "<xml>
								<ToUserName><![CDATA[%s]]></ToUserName>
								<FromUserName><![CDATA[%s]]></FromUserName>
								<CreateTime>%s</CreateTime>
								<MsgType><![CDATA[%s]]></MsgType>
								<Content><![CDATA[%s]]></Content>
								</xml>";
					$info = sprintf($template,$toUser,$fromUser,$time,$msgType,$Content);

					echo $info;
    			}
    		}

            if (strtolower($postObj->MsgType) == 'text'){
                $toUser = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time = time();
                $msgType = 'text';
                $keyword = trim($postObj->Content);
                $template = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            </xml>";
                if ($keyword == '帮助') {
                    $Content="请问需要什么帮助？\n"."发送1：了解我们\n"."发送2：我们有什么？";
                    $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$Content);

                    echo $info;
                }else{
                    echo "";
                    exit;
                }
            }
    	}
    }
?>