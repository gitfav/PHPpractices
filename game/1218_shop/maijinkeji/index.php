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

	$userid = insertUser(array("openid"=>$userinfo['openid'], "name"=>$userinfo['nickname'], "image"=>$userinfo['headimgurl']));


}else{

	$wxInfo->getCode(); 

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>回收通环保大战</title>

<meta content="yes" name="apple-mobile-web-app-capable">

<meta content="black" name="apple-mobile-web-app-status-bar-style"> 

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<link rel="stylesheet" href="css/style.css?v=10000">

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

		  title: '回收通环保大战！', // 分享标题

		  desc: '小伙伴们大家一起做环保吧！', // 分享描述

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

		  title: '回收通环保大战！', // 分享标题

		  desc: '小伙伴们大家一起做环保吧！', // 分享描述

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


		$(document).bind("touchstart",function(e){ e.preventDefault(); });//阻止默认触摸效果

		$(document).bind("touchmove",function(e){ e.preventDefault(); });//阻止默认触摸效果

		$(document).bind("touchend",function(e){ e.preventDefault(); });//阻止默认触摸效果

		

		$(".content").width($(window).width());

		$(".content").height($(window).height());



		//init();

		$(window).resize(function(e) {

			//init();

			$(".content").width($(window).width());

			$(".content").height($(window).height());

			location.reload();

		});


		$('.StartBtn').on('tap',function(e){

				$("#start").hide();

				$("#content").show();

				init();

				e.preventDefault();//阻止其他触摸事件

		},this);


		$('.startRule').on('tap',function(e){

			$("#start").hide();

			$("#rule").show();

			e.preventDefault();//阻止其他触摸事件

		});


		$('.showRank').on('tap',function(e){


			showRank();

			


		});

		//规则页--开始游戏

		/*$('#rule').click(function(){

			$("#rule").hide();

			$("#start").show();

		});*/

		$('#rule').on('tap',function(e){

			$("#rule").hide();

			$("#start").show();

		});

		/*$('.ruleBtn').click(function(){

			$("#rule").hide();

			$("#start").hide();

			//$("#rule").remove(); 

			//$("#start").remove(); 

			$("#content").show();

			init();

		});*/

		$('.ruleBtn').on('tap',function(e){

			$("#rule").hide();

			$("#start").hide();

			$("#content").show();

			init();

			e.preventDefault();//阻止其他触摸事件

		});

		//排行榜页--确定

		/*$('.rankBtn').click(function(){

			location.reload();

		});*/

		$('.rankBtn').on('tap',function(e){

			location.reload();

		});

		

		

		//设置头像高度

		$(".endHead").css('height',$(window).width()*0.24+'px');

		

		


		$('.endShare').on('tap',function(e){

			$("#share").show();

		});

		/*$('.endShare').click(function(){

			$("#share").show();

		});*/

		//结束页--分享关闭

		/*$('#share').click(function(){

			$("#share").hide();

		});*/

		$('#share').on('tap',function(e){

			$("#share").hide();

		});

		//结束页--再玩一次

		/*$('.endStart').click(function(){

			//window.open('http://www.baidu.com/');

			//location.reload();

		});*/

		$('.endStart').on('tap',function(e){

			//window.open('http://www.baidu.com/');

			//location.reload();

			reStart();

		});

		//结束页--领取基金

		/*$('.endFunds').click(function(){

			window.open('http://www.baidu.com/');

		});*/

		$('.endFunds').on('tap',function(e){

			window.open('http://www.baidu.com/');

		});

		//结束页--排行榜显示

		/*$('.endRank').click(function(){

			showRank();

		});*/

		/*$('.endRank').on('tap',function(e){

			showRank();

		});*/

		


		//排行榜--排行榜关闭

		/*$('.rankClose').click(function(){

			$("#rank").hide();

		});*/

		$('.rankClose').on('tap',function(e){

			$("#rank").hide();

		});

});

//$("#rank").show();

//读取排行榜信息列表

function showRank(){

	var openid = '<?php echo $openid;?>';//'oNepzv6isAybg_NmAgf9zucHDvMQ';

	var data = {openid:openid};  

	var dataStr = encodeURI( JSON.stringify(data) ) ;

	dataStr = toAcsii(dataStr);

	if(openid){

		$.post(netUrl,{value:dataStr,funcname:'getranklist'},

		function(data){//提交成功读取排行榜

			if( data.data.ret != 0 ){

				 alert("网络错误！请退出重进！");

				 return ;

			}else{

				$('.rankScore span').html(data.data.score);

				$('.rankRank span').html(data.data.rank);

				$("#userList").empty();

				var dataBack = data.data.rankList;

				$.each(dataBack, function(i, n) {

					var tbBody = ""

					if (dataBack[i].openid) {

						var j = i+1;

						tbBody += "<tr><td>NO."+j+"</td>"+ "<td><img src='"+n.image+"' style='width:26px;height:26px;margin:0 auto;' /></td>" + "<td>" + n.name + "</td>" + "<td>" + n.score  + "</td></tr>";

					}

					$("#userList").append(tbBody);

				});

				//给排行榜加滚动

				$("#rank").show();

				rankDrag();

			}

		},"json");

	}else{

		alert("openid不存在");

	}

}

//排行榜滚动页

function rankDrag(){

	var rankX = 0;

	var rankY = 0;

	var oRankTab = document.getElementById('rankTab');

	var oRankList = document.getElementById('rankList');

	var rankTop = oRankTab.offsetTop;

	var rankHeight = oRankTab.offsetHeight;

	var rankUD = 0;

	oRankTab.addEventListener('touchstart', function(event) {

			event.preventDefault();

			// 如果这个元素的位置内只有一个手指的话

			if (event.targetTouches.length == 1) {

					var touch = event.targetTouches[0];

					// 把元素放在手指所在的位置

					RSpressY = touch.pageY;

			}

	 }, false);

	oRankTab.addEventListener('touchmove', function(event) {

			event.preventDefault();

			if (event.targetTouches.length == 1) {

					var touch = event.targetTouches[0];

					RpressX = touch.pageX;

					RpressY = touch.pageY;

					if(RpressY-RSpressY<0){

						//alert('up');

						rankUD = 1;//向上值为1

						oRankList.scrollTop +=20;

					}else if(RpressY-RSpressY>0){

						//alert('down');

						rankUD = 2;//向下值为2

						oRankList.scrollTop -=10;

					}

			}

	 }, false);

	oRankTab.addEventListener('touchend', function(event) {

			event.preventDefault();

			oRankTab.removeEventListener("touchstart", false); 

			oRankTab.removeEventListener("touchmove", false); 

	 }, false);

}



//游戏过程函数

function init(){

	


	


	$(document).bind("touchstart",function(e){ e.preventDefault(); });//阻止默认触摸效果

	$(document).bind("touchmove",function(e){ e.preventDefault(); });//阻止默认触摸效果

	$(document).bind("touchend",function(e){ e.preventDefault(); });//阻止默认触摸效果

	var winHeight = $(window).height();

	var winWidth  = $(window).width();

	var pzHeight = $("#content section").height();

	var oCount = document.getElementById("content");

	$("#jieshou").width($("#jieshou").height()*1.6);


	var diaoTime=new Array();

	var diaoTimer=new Array();

	var score=0;


	var disX = 0;

	var disY = 0;

	var oJieshou = document.getElementById('jieshou');

	var jieshouLeft = oJieshou.offsetLeft;

	var jieshouTop = oJieshou.offsetTop;

	var jieshouHeight = oJieshou.offsetHeight;

	var jieshouWidth = oJieshou.offsetWidth;

	//alert(jieshouTop);

	oJieshou.addEventListener('touchstart', function(event) {

			event.preventDefault();


			if (event.targetTouches.length == 1) {

					var touch = event.targetTouches[0];


					pressX = touch.pageX;

					pressY = touch.pageY;

					disX = pressX - oJieshou.offsetLeft;

					disY = pressY - oJieshou.offsetTop;

					//alert(pressX);

					//touchStart.value = pressX + ';' + pressY;

			}

	 }, false);

	oJieshou.addEventListener('touchmove', function(event) {

			event.preventDefault();

			if (event.targetTouches.length == 1) {

					var touch = event.targetTouches[0];

					pressX = touch.pageX;

					pressY = touch.pageY;

					if(pressX-disX<=0){

						oJieshou.style.left = 0 + 'px';

						jieshouLeft = 0;

						//alert(jieshouLeft);

					}else if(pressX-disX>=winWidth-oJieshou.offsetWidth){

						oJieshou.style.left = winWidth-oJieshou.offsetWidth + 'px';

						jieshouLeft = winWidth-oJieshou.offsetWidth;

						//alert(jieshouLeft);

					}else{

						oJieshou.style.left = pressX - disX + 'px';

						jieshouLeft = pressX - disX;

						//alert(jieshouLeft);

					}

			}

	 }, false);

	oJieshou.addEventListener('touchend', function(event) {

			event.preventDefault();

			oJieshou.removeEventListener("touchstart", false); 

			oJieshou.removeEventListener("touchmove", false); 

	 }, false);


	var step1 = 2;

	var step2 = 20;

	var time1 = 100;

	var time2 = 10;

	function creatE(top,left,step,bomb){

		this.top=top;//起始坐标

		this.left=left;

		this.step=step;//定时器移动步伐


		this.bomb=bomb;//炸弹标记 1炸弹  0瓶子

		var getDiv = document.getElementById("obj_diaoluo");

		var newNode = document.createElement("img");//创建P标签

		if(this.bomb){

			var num = Math.floor(Math.random()*(2-1+1)+1); //1-2

			newNode.src = "img/rub"+num+".png";//png

			newNode.style.width = $(window).width()*0.2+"px";

			//newNode.src = "img/bobm.png";

			//newNode.style.width = 50+"px";

		}else{

			var num = Math.floor(Math.random()*(4-1+1)+1); //1-4

			newNode.src = "img/wq"+num+".png";//png

			newNode.style.width = $(window).width()*0.2+"px";

		}

		newNode.style.position ="absolute";

		newNode.style.top = top+"px";

		newNode.style.left = (left-newNode.offsetWidth)+"px"

		getDiv.appendChild(newNode);//与下面效果一样



		this.Dtop=null;

		this.timer=null;

		this.height=newNode.offsetHeight;

		this.Pheight=winHeight;

		this.moveDown=function moveDown(t,bombF){

			//pingzi.timer=null;

			//alert(newNode.offsetTop);

			//alert(t);

			//alert(h);

			var oScoreNow = document.getElementById("scoreNow");

			var Dtop;

			var height=newNode.offsetHeight;

			Dtop = newNode.offsetTop + step;

			/*for(var j=0;j<diaoTime.length;j++){

				window.clearInterval(diaoTime[j]);//定时器还没关上---注意

				}*/

			document.getElementById("aa").innerText="Ptop="+newNode.offsetTop + " Pleft="+newNode.offsetLeft+ " birdtop="+jieshouTop+"h="+height;

			pengZh(bombF ,t);

			function pengZh(bombF,tt){

				if((newNode.offsetTop+height>=jieshouTop)&&(newNode.offsetTop<=jieshouTop+jieshouHeight)&&((newNode.offsetLeft>=jieshouLeft&&newNode.offsetLeft<=jieshouLeft+jieshouWidth)||(newNode.offsetLeft+newNode.offsetWidth>=jieshouLeft&&newNode.offsetLeft+newNode.offsetWidth<=jieshouLeft+jieshouWidth))){

				//if((newNode.offsetTop+this.height>=jieshouTop)){

						if(bombF==0){

							score = score+10;

							//window.clearInterval(diaoTime[stopTimer++]);//定时器还没关上---注意

							oScoreNow.innerHTML = "分数："+score;

							window.clearInterval(diaoTime[tt]);//定时器还没关上---注意

							getDiv.removeChild(newNode);		

						}else if(bombF==1){

							if(score<=50){

								score = 0;

							}else{

								score = score-50;

							}

							newNode.src = "img/BZ3.png";

							//newNode.style.top = (winHeight*0.87-winWidth*0.4)+"px";

							//newNode.style.left = (left-winWidth*0.075)+"px";

							//newNode.style.width = winWidth*0.4+"px";

							oScoreNow.innerHTML = "分数："+score;

							window.clearInterval(diaoTime[tt]);//定时器还没关上---注意

							getDiv.removeChild(newNode);		

							//setTimeout(gameOver,100);

							function gameOver(){

								//alert("game over");

								//alert(score);

								//getDiv.innerHTML='<img src = "img/dong.png" class="pingziD" />';

								getDiv.innerHTML='';

								window.clearInterval(diaoTime[tt]);//定时器还没关上---注意

								window.clearInterval(timeGame);

								window.clearInterval(CreatTime);//定时器还没关上---注意		

								for(var b=0;b<diaoTime.length;b++){

									window.clearInterval(diaoTime[b]);//定时器还没关上---注意

								}

								//提交成绩

								var netUrl = "http://www.zsxgh5.com/game/maijinkeji/door.php";

								var openid = '<?php echo $openid;?>';//'oNepzv6isAybg_NmAgf9zucHDvMQ';

								var data = {openid:openid,score:score};  

								var dataStr = encodeURI( JSON.stringify(data) ) ;

								dataStr = toAcsii(dataStr);

								if(openid){

									$.post(netUrl,{funcname:'sendscore',value:dataStr},

									function(data){

										//window.location.href = "ranks.php";

										alert(score);

										$('#end').show();

									},'json');

									

								}else{

									alert("openid不存在");

								}

								

							}

						}

				}else if(newNode.offsetTop>=(jieshouTop)){  // if((newNode.offsetTop)>=winHeight){

					//window.clearInterval("1");//定时器还没关上---注意

					//window.clearInterval(this.timer);

					window.clearInterval(diaoTime[tt]);//定时器还没关上---注意

					getDiv.removeChild(newNode);

					//newNode.style.display = 'none';

				}else{

					newNode.style.top = Dtop + 'px';

				}

				if(timeSet==0){

						//alert("game over");

						//alert(score);

						oScoreNow.innerHTML = "分数："+score;

						window.clearInterval(timeGame);//定时器还没关上---注意

						window.clearInterval(CreatTime);//定时器还没关上---注意		

						//getDiv.innerHTML='<img src = "img/dong.png" class="pingziD" />';

						getDiv.innerHTML='';

						for(var b=0;b<diaoTime.length;b++){

							window.clearInterval(diaoTime[b]);//定时器还没关上---注意

						}

						//提交成绩

						var netUrl = "http://www.zsxgh5.com/game/maijinkeji/door.php";

						var openid = '<?php echo $openid;?>';//'oNepzv6isAybg_NmAgf9zucHDvMQ';

						var data = {openid:openid,score:score};  

						var dataStr = encodeURI( JSON.stringify(data) ) ;

						dataStr = toAcsii(dataStr);

						if(openid){

							$.post(netUrl,{funcname:'sendscore',value:dataStr},

							function(data){

								//window.location.href = "ranks.php";

								//alert(score);

								//结束时候的分数

								$('#endScore').html(score);

								//结束时候的基金

								$('#endFund').html(score/5);

								//结束时候的省时

								$('#endTime').html(Math.round(score/60));

								//结束时候的描述语言

								if(score<150){

									$('#endTxt').html('您的成绩快垫底了快来反超他们为环保做贡献吧。');

								}else if(score>=150 && score<300){

									$('#endTxt').html('您的成绩为中等水平建议再玩一局。');

								}else{

									$('#endTxt').html('您的成绩已经很高了快点击领取基金吧。');

								}

								

								$('#end').show();

							},'json');

							

						}else{

							alert("openid不存在");

						}

				}

			}

		}

	}



	var pingzi;

	//var timer = null;

	var k = 0;

	var stopTimer =0;

	var arr = ["0.045","0.295","0.545","0.795",];

	function creat(bombFlag){	

		var num = Math.floor(Math.random()*(3-0+1)+0); //0-3

		pingzi=new creatE(winHeight*0.1,winWidth*arr[num],step1,bombFlag);

		diaoTimer[k] = pingzi;

		timer=window.setInterval(diaoTimer[k].moveDown,5,k,bombFlag);//function(){pingzi.moveDown();}//类函数需要重新定义才能在定时器中使用

		diaoTime[k] = timer;

		k++;

	}



	var count = 0 ;

	var creatFlag = 1 ;

	var CreatTime=null;

	var bombNum = 0;   //每创建多少瓶子就产生一个炸弹

	function randomCreat(){

			bombNum++;

			if(bombNum%5==0){  //每创建8瓶子就产生一个炸弹

				creat(1);    //0 创建炸弹

			}else{

				creat(0);    //0 创建瓶子

			}

		}

	//变速产生瓶子和炸弹

	function changeSpeed(){   

			 var second =Math.floor(timeSet/10);

		 //alert(second);

		if(creatFlag==1){

			randomCreat();

			creatFlag =0;

		}

		//randomCreat

		if(second>20){

			CreatTime=window.setInterval(randomCreat,700);

		}else if(second<=20&&second>10){

			window.clearInterval(CreatTime);

			CreatTime=window.setInterval(randomCreat,500);

		}else if(second<=10&&second>5){

				window.clearInterval(CreatTime);

			CreatTime=window.setInterval(randomCreat,500);

		}else if(second<=5){

				window.clearInterval(CreatTime);

			CreatTime=window.setInterval(randomCreat,300);

		}

	}



	var timeSet = 300;    //游戏时间初值

	var oTimeSet = document.getElementById("timeSet");

	var timeGame = window.setInterval(gameTime,100);

	//var timeGame = null;

	function gameTime(){

		if(timeSet==300){

			changeSpeed();

		}else if(timeSet==200){

			changeSpeed();

		}else if(timeSet==100){

			changeSpeed();

		}else if(timeSet==50){

			changeSpeed();

		}



		if(timeSet==0){

			timeSet=0;

		}else{

			timeSet--;

		}

		oTimeSet.innerHTML="时间倒计时<br>"+Math.floor(timeSet/10);

	}



	var firstTime = new Date();

	function testTime(){

		var nowTime = new Date();

		var GTime = nowTime.getTime()-firstTime.getTime();  

		var lostTime = GTime/1000;       //游戏时间

		return lostTime;

	}

}

function reStart(){

	/*var timeSet = 600;

	var score = 0;

	var k = 0;

	var stopTimer =0;

	var count = 0 ;

	var creatFlag = 1 ;

	var CreatTime=null;

	var bombNum = 0;   //每创建多少瓶子就产生一个炸弹

	var k = 0;

	var diaoTime=new Array();

	var diaoTimer=new Array();*/



	$('#timeSet').html('时间倒计时<br>0');

	$('#scoreNow').html('分数：0');

	$('#start').hide();

	$('#end').hide();

	$('#content').show();

	init();

}

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

<div class="content" id="rule">

	<!--<img src="img/StartBtn.png" class="ruleBtn">-->

</div>

<div class="content" id="share"></div>

<div class="content" id="start">

	<img src="img/p1_1.png" class="startTil">

	<img src="img/p1_word.png" class="startWord">

	<img src="img/p1_buttom1.png" class="StartBtn">

	<img src="img/p1_buttom2.png" class="startRule">

	<img src="img/p1_buttom3.png" class="startRank showRank">

</div>

<div class="content" id="content">

    <span id="aa">数据</span>

		<!--<img src = "img/p2_1.png" id="headImg">-->

		<img src = "<?php echo $userinfo['headimgurl'];?>" id="headImg">

    <span id="timeSet">时间倒计时<br>30</span>

    <span id="scoreNow">分数：0</span>

    <div id ="obj_diaoluo">

        <!--<img src = "img/dong.png" class="pingziD" />-->

    </div>

    <img src = "img/lanzi.png" id="jieshou">

</div>

<div class="content" id="end">

	<img src="<?php echo $userinfo['headimgurl']; ?>" class="endHead">

	<!--<img src="img/p3_1.png" class="endHead">-->

    <div class="endTxt"><p><!--九九--><?php echo $userinfo['nickname'];?>: 你在这次环保大战中获得了<span id="endScore">500</span>分，能为环保工人节省<span id="endTime">5</span>分钟，获得<span id="endFund">25</span>元奖励。<span id="endTxt">您的成绩为中等水平没快去再来一局吧</span></p></div>

	<img src="img/p3_word.png" class="endImg endWord">

    <img src="img/p3_buttom1.png" class="endImg endShare">

    <img src="img/p3_buttom2.png" class="endImg endRank  showRank">

    <img src="img/p3_buttom3.png" class="endImg endStart">

    <img src="img/p3_buttom4.png" class="endImg endFunds">

</div>

<div class="content" id="rank">

	<div id="rankTil"><strong>排行榜</strong><img src="img/close.png" class="rankClose"></div>

    <div class="rankCon">

        <div class="rankBg">

            <div class="rankTab" id="rankList">

                <table id="rankTab">

                <thead>

                <tr height="30">

                    <th width="20%">名次</th>

                    <th width="20%">头像</th>

                    <th width="40%">微信号</th>

                    <th width="20%">成绩</th>

                </tr>

                </thead>

                <tbody id="userList">

                <tr>

                    <td>2</td>

                    <td><img src ="./img/p3_1.png" style="height:26px;" /></td>

                    <td></td>

                    <td>10</td>

                </tr>

                <tr>

                    <td>2</td>

                    <td><img src ="./img/p3_1.png" style="height:26px;" /></td>

                    <td></td>

                    <td>10</td>

                </tr>

                </tbody>

                </table>

            </div>

        </div>

    </div>

    <p class="rankScore">我的成绩：<span></span></p>

    <p class="rankRank">排名：<span></span></p>

</div>

<audio src="img/1.mp3" preload autoplay="autoplay"></audio>



<script type="text/javascript">

//var $$j = jQuery.noConflict(); //自定一个快捷方式让jquery和其他库不冲突 

function openSite(){

	 window.open("http://mp.weixin.qq.com/");			

}

function openRanks(){

	 window.open("http://www.zsxgh5.com/game/maijinkeji/ranks.php");			

}

function onceMore(){

	 window.open("http://www.zsxgh5.com/game/maijinkeji/index.php");			

}

</script>

</body>

</html>

