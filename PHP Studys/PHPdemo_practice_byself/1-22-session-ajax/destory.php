<?php 

session_name('c45');
session_start();
session_unset();//释放当前在内存中已经创建的所有$_SESSION变量，但不删除session文件以及不释放对应的session id
session_destroy();//删除当前用户对应的session文件以及释放session id，内存中的$_SESSION变量内容依然保留
//以上两部达到删除所有session资源。

 ?>