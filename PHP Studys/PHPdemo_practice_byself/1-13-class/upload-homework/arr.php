//原样
Array
(
    [up] => Array
        (
            [name] => 1.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\php7B08.tmp
            [error] => 0
            [size] => 10093
        )

    [up1] => Array
        (
            [name] => Array
                (
                    [0] => 2.jpg
                    [1] => 
                    [2] => 3.jpg
                )

            [type] => Array
                (
                    [0] => image/jpeg
                    [1] => 
                    [2] => image/jpeg
                )

            [tmp_name] => Array
                (
                    [0] => D:\wamp\tmp\php7B19.tmp
                    [1] => 
                    [2] => D:\wamp\tmp\php7B1A.tmp
                )

            [error] => Array
                (
                    [0] => 0
                    [1] => 4
                    [2] => 0
                )

            [size] => Array
                (
                    [0] => 10120
                    [1] => 0
                    [2] => 13977
                )
        )
)


//我渴望的样子
Array
(
    [0] => Array
        (
            [name] => 1.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\php7B08.tmp
            [error] => 0
            [size] => 10093
        )

    [1] => Array
    	(
    		[name] => 2.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\php7B08.tmp
            [error] => 0
            [size] => 10093


    ),
    [2] => Array
    	(
    		[name] => 2.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\php7B08.tmp
            [error] => 0
            [size] => 10093


    ),
    [3] => Array
    	(
    		[name] => 2.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\php7B08.tmp
            [error] => 0
            [size] => 10093


    ),

    
)

