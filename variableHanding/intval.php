<?php

$a = '12.12';
$a = intval($a);
$b = '12.96';
$b = intval($b);

var_dump($a);
var_dump($b);
/*

不管小数是多少都会被舍弃

 */