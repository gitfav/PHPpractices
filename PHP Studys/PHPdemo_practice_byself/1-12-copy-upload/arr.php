//多文件文处理之前的数据类型

Array
(
    [up] => Array
        (
            [name] => HDPHP (2).pdf
            [type] => application/pdf
            [tmp_name] => D:\wamp\tmp\phpCECF.tmp
            [error] => 0
            [size] => 1574493
        )

    [up1] => Array
        (
            [name] => Array
                (
                    [0] => HDJS.pdf
                    [1] => HDPHP (2).pdf
                    [2] => HDPHP.pdf
                )

            [type] => Array
                (
                    [0] => application/pdf
                    [1] => application/pdf
                    [2] => application/pdf
                )

            [tmp_name] => Array
                (
                    [0] => D:\wamp\tmp\phpCF3D.tmp
                    [1] => D:\wamp\tmp\phpCF8C.tmp
                    [2] => D:\wamp\tmp\phpCFAC.tmp
                )

            [error] => Array
                (
                    [0] => 0
                    [1] => 0
                    [2] => 0
                )

            [size] => Array
                (
                    [0] => 1024486
                    [1] => 1574493
                    [2] => 1967175
                )

        )

)
//要想批量上传，我们希望的数据结构为

Array
(
    [0] => Array
        (
            [name] => HDPHP (2).pdf
            [type] => application/pdf
            [tmp_name] => D:\wamp\tmp\phpCECF.tmp
            [error] => 0
            [size] => 1574493
        )

    [1]=> Array
        (
            [name] =>HDJS.pdf
            [type] => application/pdf
            [tmp_name] => D:\wamp\tmp\phpCF3D.tmp
            [error] => 0
            [size] => 1574493
        )
     [2]=> Array
        (
            [name] =>HDJS.pdf
            [type] => application/pdf
            [tmp_name] => D:\wamp\tmp\phpCF3D.tmp
            [error] => 0
            [size] => 1574493
        )
    [3]=> Array
        (
            [name] =>HDJS.pdf
            [type] => application/pdf
            [tmp_name] => D:\wamp\tmp\phpCF3D.tmp
            [error] => 0
            [size] => 1574493
        )

)