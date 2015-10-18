<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

strpos的用法
string position

第一个参数，字符串
第二个参数，查询字符
第三个参数，查询起始位置

EOF;

$name = 'www.note.com';
echo $a = strpos($name, '.', 7);
echo "\n";
echo $a = strpos($name, '.');

