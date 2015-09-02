<?php

$file1 = fopen('index.php','w');
$fileType = get_resource_type($file1);
var_dump($fileType);

/*
本来以为$file1 = file_get_contents('index.php');
这儿的$file1 就是一个资源的，结果错了，file_get_contents其实是把
文件写入一个字符串保存起来，那么换用fopen来打开文件，这时$file1才是一个资源，
意思可以理解为
特殊句柄
手册是这样说的，资源类型保存为打开文件，数据库链接，图形画布区域等的特殊句柄。



 */