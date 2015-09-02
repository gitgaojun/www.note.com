<?php

define('BASEPATH', __DIR__);

define('WEB', 'www.demo.com');

$a = get_defined_vars();

var_dump($a);
// 本来以为会输出的是
// 当前定义的常量，
// 结果输出来的是系统php里面的常量