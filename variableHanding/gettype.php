<?php

$file1 = fopen('index.php','w');
$fileType = gettype($file1);

var_dump($fileType);
