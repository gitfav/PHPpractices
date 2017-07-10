<?php

    function build_order_no(){
        return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }

    echo build_order_no();
    echo '<pre>';
    $str = uniqid();
    echo $str;
    echo '<pre>';
    print_r($str);
    echo '<pre>';
    // echo substr($str, 7,13);
    // echo substr(uniqid(), 7, 13);
    // echo '<pre>';
    // echo substr(uniqid(), 7, 13);
    // echo '<pre>';
    echo 1,2,3,4;
    echo '<pre>';
    print(str_split(substr($str, 7, 13)));
    echo '<pre>';
    print_r(str_split(substr($str, 7, 13)));
    echo '<pre>';
    var_dump(str_split(substr($str, 7, 13)));


    function myfunction($v1,$v2) 
	{
	if ($v1===$v2)
		{
		return "same";
		}
	return "different";
	}
	$a1=array("Horse","Dog","Cat");
	$a2=array("Horse","Dog","Rat");
	print_r(array_map("myfunction",$a1,$a2));

	function myfunction2($v) 
	{
	if ($v==="Dog")
		{
		return "Fido";
		}
	return $v;
	}
	$a=array("Horse","Dog","Cat");
	print_r(array_map("myfunction2",$a));
	echo '<pre>';
	echo ord('i');