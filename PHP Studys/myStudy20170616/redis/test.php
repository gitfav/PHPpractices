<?php 


 //连接本地的 Redis 服务
   $redis = new Redis();
   $redis->connect('127.0.0.1', 6379);
   echo "Connection to server sucessfully";
   //存储数据到列表中
   // $redis->lpush("tutorial-list", "Redis");
   // $redis->lpush("tutorial-list", "Mongodb");
   // $redis->lpush("tutorial-list", "Mysql");
   // // 获取存储的数据并输出
   // $arList = $redis->lrange("tutorial-list", 0 ,200);
   // $lists = $redis->keys('*');
   // echo "<br>";
   // foreach ($lists as $k => $v) {
   //    echo $v.'<br>';
   // }
   // echo "<br>";
   // var_dump($arList);
   // $redis->del('tutorial-list');
   // echo "Stored string in redis:: ";
   // $b = $redis->ZADD('page_rand',3,'wang');
   // var_dump($b);
   // $a = $redis->zrange('page_rand',0,-1);
   // $redis->zrem('page_rand',$a['0']);
   // var_dump($a);

   //事务处理
   $redis->multi();
   $redis->lpush("tutorial-list", "Redis");
   $redis->lpush("tutorial-list", "Mongodb");
   $redis->lpush("tutorial-list", "Mysql");
   $b = $redis->ZADD('page_rand',3,'wang');
   $redis->del('tutorial-list');
   $redis->set('a','sfsad');
   $redis->set('a1','sfsad');
   $redis->set('a2','sfsad');
   $a = $redis->exec();
   var_dump($a);
