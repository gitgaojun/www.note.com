<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

strtoupper 函数的意思


应用场景
判断一个字符串是不是utf-8 的类型
utf-8 UTF-8 Utf-8

EOF;


$a = 'adsasd';

echo $b = mb_detect_encoding($a, array('GB2312', 'GBK', 'UTF-8'));

if( strtoupper($b)=== 'UTF-8')
{
    echo "<br>";
    echo '$a 是utf-8编码';
}

$c = iconv('UTF-8', '', $a);

echo "<br>";

echo $d = mb_detect_encoding($c, array('UTF-8', 'GBK'));







