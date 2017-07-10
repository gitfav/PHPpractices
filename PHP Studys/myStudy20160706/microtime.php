<?php 

    $starttime = explode(' ', microtime());
    echo microtime().'<br>';

    for($i=0;$i<1000000;$i++)
    {
        continue;
    }
    $endtime = explode(' ', microtime());
    echo microtime().'<br>';

    $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
    $thistime = round($thistime,3);
    echo $thistime;