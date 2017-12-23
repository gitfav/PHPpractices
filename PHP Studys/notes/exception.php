<?php

header("Content-Type: text/html; charset=utf-8");

function checkNum($number)
{
    if ($number > 1) {
        throw new Exception("Value must be 1 or below"); //抛出异常，外面应该有try{}catch{]...final{}接收这个异常并输出
    }
    return true;
}


try {
    checkNum(2);
    echo 'If you see this, the number is 1 or below';
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
echo '<br>';

/*********自定义异常类*********/
class customException extends Exception
{
    public function errorMessage()
    {
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

try {
    throw new customException('sdgfsdfsf');
} catch (customException $e) {
    echo $e->errorMessage();
}
echo '<br>';

/*********函数可设置处理所有未捕获异常的用户定义函数*********/

function myException($exception)
{
    echo "<b>Exception:</b> ", $exception->getMessage();
}

set_exception_handler('myException');

throw new Exception('Uncaught Exception occurred');

//简而言之：如果抛出了异常，就必须捕获它。