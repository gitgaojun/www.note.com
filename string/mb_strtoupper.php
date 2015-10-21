<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

    mb_strtoupper 函数的使用

EOF;

$user = "高俊gj";

echo mb_strtoupper($user);
