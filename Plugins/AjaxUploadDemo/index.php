<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Ajax Upload Demo</title>
        <script type="text/javascript" src="Scirpt/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="Scirpt/ajaxupload.js"></script>
        <script type="text/javascript">
            $(function ()
            {
                // 创建一个上传参数
                var uploadOption =
                {
                    // 提交目标
                    action: "upload.php",
					// 服务端接收的名称
					name: "file",
                    // 自动提交
                    autoSubmit: false,
                    // 选择文件之后…
                    onChange: function (file, extension) {
                        if (new RegExp(/(jpg)|(jpeg)|(bmp)|(gif)|(png)/i).test(extension)) {
                            $("#filepath").val(file);
                        } else {
                            alert("只限上传图片文件，请重新选择！");
                        }
                    },
                    // 开始上传文件
                    onSubmit: function (file, extension) {
                        $("#state").val("正在上传" + file + "..");
                    },
                    // 上传完成之后
                    onComplete: function (file, response) {
                        if (response == "Success") $("#state").val("上传完成！");
                        else $("#state").val(response);
                    }
                }

                // 初始化图片上传框
                var oAjaxUpload = new AjaxUpload('#selector', uploadOption);

                // 给上传按钮增加上传动作
                $("#up").click(function ()
                {
                    oAjaxUpload.submit();
                });
            });
        </script>
    </head>
    <body>
        <div>
            <label>一个普通的按钮：</label><input type="button" value="选取图片" id="selector" />
            <br />
            <label>选择的图片路径：</label><input type="text" readonly="readonly" value="" id="filepath" />
            <br />
            <label>不是submit按钮：</label><input type="button" value="上传" id="up" />
            <br />
            <label>上传状态和结果：</label><input type="text" readonly="readonly" value="" id="state" />
            <p>
                DEMO BY ABEL : <a href="http://abel.cnblogs.com/" target="_blank">abel.cnblogs.com</a>
            </p>
        </div>
    </body>
</html>
