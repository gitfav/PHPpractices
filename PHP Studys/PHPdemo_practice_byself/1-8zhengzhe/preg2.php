<?php 

	$content=file_get_contents('http://daqianduan.com');
	$preg='/<article class="excerpt .*">.*<a class="focus" .*>.*<img .*src="(.*)".*\/>.*<header>.*<h2>.*<a.*>(.*)<\/a>.*<\/h2>.*<\/header>.*<p class="note">(.*)<\/p>.*<\/article>/U';
	preg_match_all($preg, $content, $m);
	var_dump($m);
	$new=array();
	foreach ($m[1] as $k => $v) {
		$new[$k]['pic']=$v;
		$new[$k]['title']=$m[2][$k];
		$new[$k]['desc']=$m[3][$k];
	}
	$data=var_export($new,true);
	$data="<?php return $data; ?>";
	file_put_contents('./db.php', $data);

 ?>