<?php
import_request_variables("gP", "rvar_");
exit;
import_request_variables('gpc', 'rvar_');

var_dump($rvar_name);

/*

Fatal error: Call to undefined function import_request_variables() in D:\code\demo\variableHanding\import_request_variables.php on line 2

手册说：
(PHP 4 >= 4.1.0, PHP 5 < 5.4.0)
舍弃了该函数

 */