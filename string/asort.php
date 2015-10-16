<?php
/**
 * Created by PhpStorm.
 * User: jun90610@gmail.com
 * Date: 2015/10/14
 * Time: 14:57
 */

$a = 123;
$b = (int)strrev($a);
echo $b . "\n";

$c = 659;
$e = decbin($c);
$f = strrev($e);
echo bindec($f);