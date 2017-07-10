<?php 

      $str = "sdfsadf'\"\0&gsdfsadf";
      echo $str,'</br>';
      $new = addslashes($str);//把’ ” \ NULL(\0) 4个字符前添加\显示      单引号转化，可以发防止sql注入。
      $new2 = stripslashes($new);//是addslashes的反函数，显示转移后的字符。
      echo $new,"</br>";
      echo $new2,"<hr>";


      $script = "<script>alert(1)</script>";
      // echo $script;
      echo strip_tags($script),"</br>";//清理字符串中的html标签
      echo strip_tags($script,'<script>');//允许有第二个参数，为不去除哪个标签


 ?>