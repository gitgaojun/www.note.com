<?php
header('content-type:text/html;charset=utf-8;');
echo "<pre>";

echo <<<EOF

mb_strpos 函数的用法
查询字符串的位置信息，汉字算一个位置

EOF;


$user = '高.俊';

echo mb_strpos($user, '.');
