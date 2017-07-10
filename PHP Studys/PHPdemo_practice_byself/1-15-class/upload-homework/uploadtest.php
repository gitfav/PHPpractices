<?php
require '../../functions.php';

require './Upload.class.php';

$config = require './config.php';

$upload = new Upload();

$up = $upload->uploadFile();

p($upload->getError());

p($up);

require './up.html';