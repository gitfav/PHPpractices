<?php 

      header('Content-type:text/html;charset=utf-8');
      $message=require_once"./db.php";
      if (!empty($_POST)) {
                  $_POST["time"]=time();
                  $index=$_POST["index"];
                  unset($_POST["index"]);
                  $message[$index]=$_POST;
                  $data=var_export($message,true);  //message包括了全部数据
                  $data="<?php return ".$data."?>";
                  file_put_contents("./db.php",$data);
                  echo "<script>alert('操作成功'); location.href='./index.php'</script>";

      }
      else {
              $index=$_GET['index'];
              $Newdata=$message[$index];
              require_once"./edit.html";
      }


 ?>