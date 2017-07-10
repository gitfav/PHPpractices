<?php 
    /*
     * param ori_img 原图像的名称和路径
     * param new_img 生成图像的名称
     * param percent 表示按照原图的百分比进行缩略，此项为空时默认按50%
     * param width 指定缩略后的宽度
     * param height 指定缩略后的高度
     * 
     * 注：当 percent width height 都传入值的时候，且percent>0时，优先按照百分比进行缩略
     * by：http://www.daixiaorui.com 更多源码与你分享
     * 温馨提示：使用此功能要在php.ini中开启 gd2
     *
     **/
    $ori_img = './banner_img02.jpg';
    $new_img = 'small1.jpg';
    makeThumb($ori_img,$new_img,100);
    function makeThumb($ori_img,$new_img, $percent=50, $width=0, $height=0){
        $original = getimagesize($ori_img); //得到图片的信息，可以print_r($original)发现它就是一个数组
        var_dump($original);exit();
        //$original[2]是图片类型，其中1表示gif、2表示jpg、3表示png
        switch ($original[2]) {
            case '1':
                $s_original = imagecreatefromgif($ori_img);
                break;
            case 2 : $s_original = imagecreatefromjpeg($ori_img);
                break;
            case 3 : $s_original = imagecreatefrompng($ori_img);
                break;
            default:
                echo '错误';
                exit;
                break;
        }
        if($percent > 0){
            $width = $original[0] * $percent / 100;
            $width = ($width > 0) ? $width : 1;
            $height = $original[1] * $percent / 100;
            $height = ($height > 0) ? $height : 1;
        }
        //创建一个真彩的画布
        $canvas = imagecreatetruecolor($width,$height);
        imagecopyresized($canvas, $s_original, 0, 0, 0, 0, $width, $height, $original[0], $original[1]);
        header("Content-type:image/jpeg");
        imagejpeg($canvas);   //向浏览器输出图片
        // $loop = imagejpeg($canvas, $new_img);   //生成新的图片
        // if($loop){
        //     echo "OK!<br/>";
        // }
    }