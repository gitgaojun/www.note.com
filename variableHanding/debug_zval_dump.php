<?php



$a = 'jun';
$b =& $a;
debug_zval_dump($b); // string(3) "jun" refcount(1) 