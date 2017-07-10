<?php
header("Content-Type:text/html;charset=utf-8");
if (!is_weixin()){
	exit("请使用手机微信登录");
}
function is_weixin(){
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ){
		return true;
	}
	return false;
}
require_once 'user.php';
require_once "/www/web/www_zsxgh5_com/public_html/game/group/jssdk_token_ticket.php";
$wxInfo = new JSSDK_token_ticket(1); 
$Signpackage = $wxInfo->getSignPackage();
if($_GET['code']){
	$code = $_GET['code'];
	$userinfo = $wxInfo->getInfoFrom($code);
	$openid = $userinfo['openid'];
	$headimgurl = $userinfo['headimgurl'];
	//$userid = insertUser(array("openid"=>$userinfo['openid'], "name"=>$userinfo['nickname'], "image"=>$userinfo['headimgurl']));
}else{
	$wxInfo->getCode();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>北京霾金科技</title>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="stylesheet" href="css/login.css?v=10000">
<link rel="stylesheet" href="css/reset.css">
<script src="js/zepto.min.js"></script>
<script src="js/touch3.js"></script>
<script>
		function getUserId()
		{
			  return "<?php echo $userid;?>";
		}
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
function rightMouse(){
	function clickIE4() {
		if (event.button == 2) {
			return false;
		}
	}
	function clickNS4(e) {
		if (document.layers || document.getElementById && !document.all) {
			if (e.which == 2 || e.which == 3) {
				return false;
			}
		}
	}
	function OnDeny() {
		if (event.ctrlKey || event.keyCode == 78 && event.ctrlKey || event.altKey || event.altKey && event.keyCode == 115) {
			return false;
		}
	}
	if (document.layers) {
		document.captureEvents(Event.MOUSEDOWN);
		document.onmousedown = clickNS4;
		document.onkeydown = OnDeny();
	} else if (document.all && !document.getElementById) {
		document.onmousedown = clickIE4;
		document.onkeydown = OnDeny();
	}
	document.oncontextmenu = new Function("return false");
	document. onselectstart=new Function("event.returnValue=false ");
}
$(function(){
	rightMouse();	
})
wx.config({
		debug: false,
		appId: '<?php echo $Signpackage[appId];?>',
		timestamp: '<?php echo $Signpackage[timestamp];?>',
		nonceStr: '<?php echo $Signpackage[nonceStr];?>',
		signature: '<?php echo $Signpackage[signature];?>',
		jsApiList: ['addCard','onMenuShareTimeline','onMenuShareAppMessage']
});
wx.ready(function(){
	setTimeLine();
	setAppMessage();
});
var sharesuccessfunc;
var sharefuncobj;
//分享到朋友圈
function setTimeLine(){
	wx.onMenuShareTimeline({
		  title: '北京霾金科技环保大战！', // 分享标题
		  desc: '北京霾金科技环保大战！', // 分享描述
		  link: 'http://www.zsxgh5.com/game/maijinkeji/index.php', // 分享链接//?ie=utf-8&wd=app制作
		  imgUrl: 'http://www.zsxgh5.com/game/maijinkeji/icon.png', // 分享图标
		  success: function () { 
				var netUrl = "http://www.zsxgh5.com/game/maijinkeji/door.php";
				var openid = '<?php echo $openid;?>';
				var share = 0;
				var data = {openid:openid,share:share};  
				var dataStr = encodeURI( JSON.stringify(data) ) ;
				dataStr = toAcsii(dataStr);
				if(openid){
					$.post(netUrl,{funcname:'countShare',value:dataStr},
					function(data){
					   //location.reload();
					},"json");
					$.post(netUrl,{funcname:'sendshare',value:dataStr},
					function(data){
					   //location.reload();
					},"json");
				}else{
					//alert("openid不存在");
				}
		  },
		  cancel: function () { 
		  }
	  });
}
//分享给朋友。
function setAppMessage(){
	wx.onMenuShareAppMessage({
		  title: '北京霾金科技环保大战！', // 分享标题
		  desc: '北京霾金科技环保大战！', // 分享描述
		  link: 'http://www.zsxgh5.com/game/maijinkeji/index.php', // 分享链接//?ie=utf-8&wd=app制作
		  imgUrl: 'http://www.zsxgh5.com/game/maijinkeji/icon.png', // 分享图标
		  type: '', // 分享类型,music、video或link，不填默认为link
		  dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		  success: function () {
				var netUrl = "http://www.zsxgh5.com/game/maijinkeji/door.php";
				var openid = '<?php echo $openid;?>';
				var share = 0;
				var data = {openid:openid,share:share};  
				var dataStr = encodeURI( JSON.stringify(data) ) ;
				dataStr = toAcsii(dataStr);
				if(openid){
					$.post(netUrl,{funcname:"countShare",value:dataStr},
					function(data){
					   //location.reload();
					},"json");
					$.post(netUrl,{funcname:"sendshare",value:dataStr},
					function(data){
					   //location.reload();
					},"json");
				}else{
					//alert("openid不存在");
				}
		  },
		  cancel: function () { 
		  }
	  });
}
//字符串转化成ASCII码
function toAcsii(jsj){
	var str = '';
	for(var i=0;i<jsj.length;i++){
		str += (jsj.charCodeAt(i)+i)+'|||';  //4表示的是位置，实际应用中可以运行循环
	}
	return str;
}
</script>
<script>
//全局变量
var netUrl = "http://www.zsxgh5.com/game/maijinkeji/door.php";
$(document).ready(function(e) {
		//阻止手机默认触摸操作事件
		//$(document).bind("touchstart",function(e){ e.preventDefault(); });//阻止默认触摸效果
		//$(document).bind("touchmove",function(e){ e.preventDefault(); });//阻止默认触摸效果
		//$(document).bind("touchend",function(e){ e.preventDefault(); });//阻止默认触摸效果
		var winH = $(window).height();
		var winW = $(window).width();
		$(".content").width(winW);
		$(".content").height(winH);
		
		//获取手机验证码
		$('.getCode').click(function(){
				//loginPhone
				var phone = $('.loginPhone').val();
				var data = {phone:phone};  
				var dataStr = encodeURI( JSON.stringify(data) ) ;
				dataStr = toAcsii(dataStr);
				if(checkNum('regMobile',phone)){
					alert("下边写提交验证！");
					$.post(netUrl,{funcname:"countShare",value:dataStr},
					function(data){
						
					},"json");
				}else{
					alert("手机号输入不正确！");
				}
		},this);
		//提交信息
		$('.loginSubmit').click(function(){
				var phone = $('.loginPhone').val();
				var code = $('.loginCode').val();
				var pass = $('.loginPass').val();
				if(!code || !checkCode(phone,code)){
					alert('验证码不正确！');
					return false;
				}
				if(!checkNum('regName',pass)){
					alert('密码格式不对！');	
					return false;
				}
				var data = {phone:phone,code:code,pass:pass};  
				var dataStr = encodeURI( JSON.stringify(data) ) ;
				dataStr = toAcsii(dataStr);
				alert("注册成功！");return false;
				if(checkNum('regMobile',phone)){
					$.post(netUrl,{funcname:"countShare",value:dataStr},
					function(data){
							alert("注册成功！");
					},"json");
				}else{
					alert("手机号输入不正确！");
				}
				//临时
		},this);
		//表单验证checkNum('regMobile',value)
		function checkNum(type,value){
			var temp = false ;
			var regBox = {
					regEmail : /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/,//邮箱
					regName : /^[a-z0-9_-]{6,10}$/,//姓名
					regMobile : /^0?1[3|4|5|8][0-9]\d{8}$/,//手机号
					regTel : /^0[\d]{2,3}-[\d]{7,8}$/,//座机
			}
			temp = regBox[type].test(value) ;  
			return temp ;
		}
		//手机验证码验证
		function checkCode(phone,code){
			var mess = false ;
			var data = {phone:phone,code:code};  
			var dataStr = encodeURI( JSON.stringify(data) ) ;
			dataStr = toAcsii(dataStr);
			$.post(netUrl,{funcname:"countShare",value:dataStr},
			function(data){
					if(data.ret==0){
							mess = true;
					}
			},"json");
			//临时设置
			mess = true;
			return mess;
		}
});
</script>
<script>  
	document.createElement("header");  
	document.createElement("footer");  
	document.createElement("nav");  
	document.createElement("article");  
	document.createElement("section"); 
	document.createElement("aside"); 
	document.createElement("figure");  
</script>  
</head>
<body>
<div class="content" id="login">
		<div class="loginBu"></div>
		<p class="loginTil">尊敬的<span class="loginName"><?php echo $userinfo['nickname']; ?></span>，恭喜您<br/>获得<span class="loginMoney">50</span>元奖励</p>
		<h3 class="loginTxt">快来注册吧</h3>
		<div id="loginForm">
				<ul>
					<li class="clear"><input type="tel" name="phone" class="loginPhone" value="" placeholder="手机号" /><button type="button" name="getCode" class="getCode">获取验证码</button></li>
					<li><input type="text" name="loginCode" class="loginCode" value="" placeholder="验证码" /></li>
					<li><input type="password" name="loginPass" class="loginPass" value="" placeholder="首次登陆密码(字母数字6-10)" /></li>
					<li><button type="button" name="loginSubmit" class="loginSubmit">确认注册并领取</button></li>
				</ul>
		</div>
</div>
</body>
</html>