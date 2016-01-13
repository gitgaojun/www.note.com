<?php
header('content-type:text/html;charset=utf-8');

echo <<<EOF

如何获取host地址

EOF;

$host = $_SERVER['HTTP_HOST'];

var_dump($host);

$cookie_host = strstr($host, '.');

var_dump($cookie_host);

echo <<<EOF

COOKIE 保存 .note.com 这样的有个好处就是二级域名和一级域名都可以使用
什么叫二级域名，xxx.note.com 不以www开头的域名都被称为二级域名。
二级域名比一级域名便宜

EOF;



