<?php
header('content-type:text/html;charset=utf-8;');
echo "<pre>";
echo <<<EOF

split 正则分割字符串为数组
的应用场景

EOF;

list($year, $month, $day, $hour, $min, $se) = split('[-: ]', '2015-11-2 22:11:55');

var_dump($year, $month, $day, $hour, $min, $se);









