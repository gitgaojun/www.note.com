<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

mb_substr  函数如何使用
截取的时候一个中文算一个字符

EOF;


$user = '高俊';

echo mb_substr($user, 1,1);
echo "\n";
echo mb_substr("高俊1",1,2);
