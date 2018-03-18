<?php
error_reporting(E_ALL);  //设置所有错误都显示
ini_set('display_errors', 'Off');  // 错误不显示到页面

ini_set('log_errors', 'On');  // 开启日志记录错误

ini_set('log_errors_max_len', 1024); // 日志最长字节

ini_set('error_log', 'juntest.log'); // 决定日志记录的位置
throw new Exception('3333');  // 当抛出一个错误的时候，也会被写入log 文件中  所以很多需要定义程序异常的时候会直接throw

aa();
var_dump($jj);

//  Parse error   其中解析错误永远会直接输出页面

/**
 * [18-Mar-2018 11:40:24 UTC] PHP Notice:  Undefined variable: asdf in /data/www/www.note.com/log/errorfileforlog.php on line 7
 *
 * 时间加报错信息
 *
 *
 *
 *
 *
 *
 *
 */

