document.writeln("<SCRIPT language=javascript type=text/javascript>
<!--//--><![CDATA[//><!--
echoInfo(); //显示播放状态和播放时间 mengjia 070427
function echoInfo(){var playStateText,timeText;try{switch(bnTxtPlayer.wObject.playState){case 1:playStateText=\"停止\";break;case 2:playStateText=\"暂停中\";break;case 3:playStateText=\"播放中\";break;case 4:playStateText=\"向前搜索\";break;case 5:playStateText=\"向后搜索\";break;case 6:playStateText=\"缓冲中\";break;case 7:playStateText=\"等待中\";break;case 8:playStateText=\"播放完毕\";break;case 9:playStateText=\"正在连接\";break;case 10:playStateText=\"准备就绪\";break;default:playStateText=\"未知错误:\"+bnTxtPlayer.wObject.playState}
timeText=(bnTxtPlayer.wObject.controls.currentPositionString==\'\'?\"00:00\":bnTxtPlayer.wObject.controls.currentPositionString);setTimeout(\"echoInfo()\",300)}
catch(e){playStateText=\"未知错误\";timeText=\"\"}
finally{sina.$(\"stateText\").innerHTML=playStateText;sina.$(\"timeText\").innerHTML=timeText}}

//--><!]]>
</SCRIPT>");