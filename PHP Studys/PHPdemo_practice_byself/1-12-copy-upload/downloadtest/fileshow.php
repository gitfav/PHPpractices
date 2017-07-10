<?php 

	require'../../functions.php';
	$file=glob('./*');
	p($file);

 ?>

<!DOCTYPE HTML>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 	<title>无标题</title>
 </head>
 <body>

 	<table border="1">
 		<tr>
 			<th>文件名</th>
 			<th>操作</th>
 		</tr>
 		<?php foreach ($file as $k => $v) {?>
 			<tr>
 				<td><?php echo basename($v); ?></td>
 				<td><a href="./download.php?f=<?php echo $v; ?>">下载</a></td>
 			</tr>
 		<?php } ?>
 	</table>
 
 </body>
 </html>