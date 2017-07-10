<?php
// $arr = array(12,34,32,4,6,34,765,75,2345,25,234,67,1,62);
$s = 0;
$count = 0;
for ($i=0; $i <= 100; $i++) { 
    $s = rand(0,2001515);
    $arr[] = $s;
}
var_dump($arr);
$i=0;
$j = 100;
// $arr = partition($arr,$i,$j);
$arr = qsort($arr,$i,$j);
var_dump($arr,$count);

function qsort($arr,$star,$end){//排序（递归方法）
    global $count;
    $arr = partition($arr,$star,$end);
    if ($arr['num']-1>$star) {
        $arr = qsort($arr['newarr'],$star,$arr['num']-1);
    }
    if ($arr['num']-1<$end) {
        $arr = qsort($arr['newarr'],$arr['num']+1,$end);
    }
    $count++;
    return $arr;
}
function qsort2($arr,$star,$end){

}
function partition($arr,$i,$j){//用基值，把数组分成两份
    $nownum = $i;//基值
    $mod = 0;
    while($i<$j)
    {
        while($i<$j&&$arr[$i]<$arr[$j]){
            $j--;
        }
        if ($i<$j) {
            $mod = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $mod;
            $i++;
            $nownum=$j;
        }
        while($i<$j&&$arr[$j]>$arr[$i]){
            $i++;
        }
        if ($i<$j) {
            $mod = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $mod;
            $j--;
            $nownum = $i;
        }
        // if ($nownum==$i) { //这是第一种方法，看起来比较复杂和不美观  算的次数和上面相当
        //     if ($arr[$i]>$arr[$j]) {
        //         $mod = $arr[$i];
        //         $arr[$i] = $arr[$j];
        //         $arr[$j] = $mod;
        //         $nownum = $j;
        //         $i++;
        //     }else{
        //         $j--;
        //     }
        // }elseif($nownum==$j){
        //     if ($arr[$i]>$arr[$j]) {
        //         $mod = $arr[$i];
        //         $arr[$i] = $arr[$j];
        //         $arr[$j] = $mod;
        //         $nownum = $i;
        //         $j--;
        //     }else{
        //         $i++;
        //     }
        // }
    }
    $new = array(
        'num' => $nownum,
        'newarr' => $arr,
    );
    return $new;
}
