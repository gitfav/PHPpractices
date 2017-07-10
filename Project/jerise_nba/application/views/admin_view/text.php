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
    <script type="text/javascript">
    <?php $timestamp = time();?>
    // 传头像按钮的js
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'swf'      : '<?php echo A_PUBLIC; ?>/uploadify/uploadify.swf',
            'uploader' : '<?php echo A_PUBLIC; ?>/uploadify/new_img.php',
            'auto' : false,//是否自动上传
            'buttonText' : '上传图片',//改变按钮文字
            'multi' : false,//允许同时上传多张图片
            'width' : '100',
            'height' : '25',
            'cancelImg': './uploadify-cancel.png',
            'onUploadSuccess' : function(file,data,response){
                $('.img1').attr('src', '<?php echo A_PUBLIC; ?>/Images/new/'+data);
                $('input[name=new_image]').attr('value', data);
            }
        });
        $('.start').click(function() {
            $('#file_upload').uploadify('upload','*');
        });
        });
    </script>
    <style type="text/css">
      body {
       font: 13px Arial, Helvetica, Sans-serif;
    }
    .start{
        text-align: center;
        text-decoration: none;
        font-family: '微软雅黑','黑体','宋体';
        color: black;
        display: inline-block;
        border-radius: 5px;
        width:50px;
        height: 16px;
        border: 2px #E8E8E8 solid;
    }
    .start:hover{
        background: #DEDEDE;
    }
</style>
    <title>写文章</title>
</head>

<body>
                 <form>
                     <img class="img1" src="" alt=""  width="508" height="336px" />
                    <div id="queue"></div>
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                </form>
                <a href="javascript:void(0)" class="start">开始</a><br>
    <form action="" method="post">
        <input type="hidden" name="new_image" value=""><br>
        <input type="text" placeholder="请输入文章标题，少于12个字" name="new_title" style="width:200px;height:30px;">
        <!-- 加载编辑器的容器 -->
        <script id="container" name="new_text" type="text/plain" style="height:500px;"></script>
        <input type="submit" value="提交文章">
    </form>
        <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>   
    

</body>

</html>