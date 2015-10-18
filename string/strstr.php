<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";


echo <<<EOF

strstr的用法

查找字符串首次出现的位置，返回字符串符合的余下信息


EOF;

$name = '1148743058@qq.com';

echo $a = strstr($name, '@', true);
echo "\n";
echo $a = strstr($name, '@');
echo "\n";
echo $a = stristr($name, '@');
echo "\n";
echo $a = strrstr($name, '@');
