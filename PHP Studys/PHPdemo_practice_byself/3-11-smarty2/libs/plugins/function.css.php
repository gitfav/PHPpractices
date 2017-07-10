<?php 

function smarty_function_css($params,&$samrty){
    $str='<link rel="stylesheet" type="text/css" href="'.$params['file'].'"/>';
    return $str;
}

 ?>