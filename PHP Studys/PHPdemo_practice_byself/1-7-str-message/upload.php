<?php 

      $up=isset($_POST['up'])?$_POST['up']:'';
      $wei=ltrim(strrchr($up, '.'),'.');//获得文件扩展名
      $allow_type=array('jpg','gif','png','bmp');
      $a=(in_array($wei, $allow_type)?'allow':'no');//inarray 判断元素是否在数组中，在返回true 不在返回false
      echo $a;


 ?>






<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
      <title>无标题</title>
</head>
<body>

      <form action="" method="post">
            <input type="file" name="up">
            <input type="submit" value="上传">
      </form>

</body>
</html>