<?php

var_dump(is_numeric('12.36'));
var_dump(is_numeric(12.36));
var_dump(is_numeric(12));
var_dump(is_numeric('asdfas'));
/*
数值类型 解析的时候会把数字字符串转为数值来判断
 */