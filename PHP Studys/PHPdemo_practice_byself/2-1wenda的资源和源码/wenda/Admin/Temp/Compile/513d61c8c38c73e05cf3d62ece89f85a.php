<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://www.houdunphp.com/show/wenda/Admin/Tpl/Public/Css/public.css" />
</head>
<body>
	<form action="<?php echo U('Common/edit');?>" method='post'>
		<table class="table">
			<tr>
				<th colspan='2'>经验级别规则设置</th>
			</tr>
			<tr>
				<td align='right'>登录：</td>
				<td>
					+ <input type="text" name='LV_LOGIN' value='<?php echo C("LV_LOGIN");?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>提问：</td>
				<td>
					+ <input type="text" name='LV_ASK' value='<?php echo C("LV_ASK");?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>回答：</td>
				<td>
					+ <input type="text" name='LV_ANSWER' value='<?php echo C("LV_ANSWER");?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>采纳：</td>
				<td>
					+ <input type="text" name='LV_ACCEPT' value='<?php echo C("LV_ACCEPT");?>' />
				</td>
			</tr>
		</table>
		<table class='table'>
			<tr>
				<th colspan='8'>各等级所需经验</th>
			</tr>

			<tr>
				<td>LV1:</td>
				<td>
					<input type="text" name='lv1' value='<?php echo C("LV1");?>'/>
				</td>
				<td>LV2:</td>
				<td>
					<input type="text" name='lv2' value='<?php echo C("LV2");?>'/>
				</td>
				<td>LV3:</td>
				<td>
					<input type="text" name='lv3' value='<?php echo C("LV3");?>'/>
				</td>
				<td>LV4:</td>
				<td>
					<input type="text" name='lv4' value='<?php echo C("LV4");?>'/>
				</td>
			</tr>

			<tr>
				<td>LV5:</td>
				<td>
					<input type="text" name='lv5' value='<?php echo C("LV5");?>'/>
				</td>
				<td>LV6:</td>
				<td>
					<input type="text" name='lv6' value='<?php echo C("LV6");?>'/>
				</td>
				<td>LV7:</td>
				<td>
					<input type="text" name='lv7' value='<?php echo C("LV7");?>'/>
				</td>
				<td>LV8:</td>
				<td>
					<input type="text" name='lv8' value='<?php echo C("LV8");?>'/>
				</td>
			</tr>

			<tr>
				<td>LV9:</td>
				<td>
					<input type="text" name='lv9' value='<?php echo C("LV9");?>'/>
				</td>
				<td>LV10:</td>
				<td>
					<input type="text" name='lv10' value='<?php echo C("LV10");?>'/>
				</td>
				<td>LV11:</td>
				<td>
					<input type="text" name='lv11' value='<?php echo C("LV11");?>'/>
				</td>
				<td>LV12:</td>
				<td>
					<input type="text" name='lv12' value='<?php echo C("LV12");?>'/>
				</td>
			</tr>

			<tr>
				<td>LV13:</td>
				<td>
					<input type="text" name='lv13' value='<?php echo C("LV13");?>'/>
				</td>
				<td>LV14:</td>
				<td>
					<input type="text" name='lv14' value='<?php echo C("LV14");?>'/>
				</td>
				<td>LV15:</td>
				<td>
					<input type="text" name='lv15' value='<?php echo C("LV15");?>'/>
				</td>
				<td>LV16:</td>
				<td>
					<input type="text" name='lv16' value='<?php echo C("LV16");?>'/>
				</td>
			</tr>

			<tr>
				<td>LV17:</td>
				<td>
					<input type="text" name='lv17' value='<?php echo C("LV17");?>'/>
				</td>
				<td>LV18:</td>
				<td>
					<input type="text" name='lv18' value='<?php echo C("LV18");?>'/>
				</td>
				<td>LV19:</td>
				<td>
					<input type="text" name='lv19' value='<?php echo C("LV19");?>'/>
				</td>
				<td>LV20:</td>
				<td>
					<input type="text" name='lv20' value='<?php echo C("LV20");?>'/>
				</td>
			</tr>

			<tr>
				<td colspan='8' align='center' height='60'>
					<input type="submit" value='保存修改' class='input_button'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
