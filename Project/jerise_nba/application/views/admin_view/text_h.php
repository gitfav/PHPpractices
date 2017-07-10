<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <!-- 配置文件 -->
    <script type="text/javascript" src="<?php echo A_PUBLIC; ?>/editor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo A_PUBLIC; ?>/editor/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo A_PUBLIC; ?>/editor/lang/zh-cn/zh-cn.js"></script>
    <script src="<?php echo A_PUBLIC; ?>/uploadify/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="<?php echo A_PUBLIC; ?>/Js/public.js" type="text/javascript"></script>
    <script src="<?php echo A_PUBLIC; ?>/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo A_PUBLIC; ?>/uploadify/uploadify.css">
   
    <title>写文章</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" placeholder="请输入文章标题" name="h_title" style="width:200px;height:30px;"><br>
        <!-- 加载编辑器的容器 -->
        <script id="container" name="h_text" type="text/plain" style="width : 960px; height:500px;"></script>
        <input type="submit" value="提交文章">
    </form>
        <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>   
    

</body>

</html>