<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://www.houdunphp.com/show/wenda/Admin/Tpl/Public/Css/public.css" />
	<style type="text/css">
		.table input{
			height: 28px;
			vertical-align: middle;
		}
	</style>
</head>
<body>
	<form action="<?php echo U('Common/edit');?>" method="POST">
	<table class="table">
		<tr>
			<td colspan='2' class="th">网站设置</td>
		</tr>
			<tr>
				<td align='right' width='45%'>网站名称：</td>
				<td>
					 <input type="text" name='WEBNAME' value='<?php echo C("WEBNAME");?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>网站关键词：</td>
				<td>
					 <input type="text" name='KEYWORDS' value='<?php echo C("KEYWORDS");?>' style="width:400px;"/>
				</td>
			</tr>
			<tr>
				<td align='right'>网站描述：</td>
				<td>
					 <input type="text" name='DISCRIPTION' value='<?php echo C("DISCRIPTION");?>' style="width:400px;"/>
				</td>
			</tr>
			<tr>
				<td align='right'>版权信息：</td>
				<td>
					<input type="text" style="width:400px;" name="COPY" value='<?php echo C("COPY");?>'/>
				</td> 
			</tr>
			<tr>
				<td align='right'>备案号：</td>
				<td>
					<input type="text" style="width:400px;" name="RECORDRES_ON" value='<?php echo C("RECORD");?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>是否开放注册：</td>
				<?php if(C("RES_ON") == 1){?>
					<td>
						<input type="radio" name="RES_ON" value="1" checked="checked"/>开启
						<input type="radio" name="RES_ON" value="0"/>关闭
					</td>
				<?php  }else{ ?>
					<td>
						<input type="radio" name="RES_ON" value="1" />开启
						<input type="radio" name="RES_ON" value="0" checked="checked"/>关闭
					</td>
				<?php }?>
			</tr>
			<tr>
				<td align='right'>网站状态：</td>
				<?php if(C("WEB_ON") == 1){?>
					<td>
						<input type="radio" name="WEB_ON" value="1" checked="checked"/>开启
						<input type="radio" name="WEB_ON" value="0"/>关闭
					</td>
				<?php  }else{ ?>
					<td>
						<input type="radio" name="WEB_ON" value="1" />开启
						<input type="radio" name="WEB_ON" value="0" checked="checked"/>关闭
					</td>
				<?php }?>
			</tr>
			<tr>
				<td colspan='2' height='60' align='center'>
					<input type="submit" value='保存修改' class='input_button'/>
				</td>
			</tr>

</table>
</form>
</body>
</html>
