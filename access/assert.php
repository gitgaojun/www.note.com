<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";


echo <<<EOF

assert 函数方法的使用
断言，当ASSERT_BAIL 当程序错误不向下执行。


EOF;

assert_options(ASSERT_BAIL, 1);
assert("asd" === "asd");

echo "<br>";
echo "hello";

assert("ass" === "asd");

echo " world";

