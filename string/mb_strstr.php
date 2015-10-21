<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

mb_strstr 的用法
查找字符串在字符串中出现的位置，如果出现那么返回之后所有的字符串，如何设置true那么返回左边的字符串
汉字算一个字符计算。

EOF;

$user = '高.俊';

echo mb_strstr($user, '.');
echo "\n";
echo mb_strstr($user, '.', true);


