<?php

require './Upload.class.php';

$upload = new Upload();

$up = $upload->upload();

p($up);

require './shouye.html';
?>