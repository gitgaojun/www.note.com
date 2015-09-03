<?php

/**
 * unserialize 反序列化
 *
 */

$arr = array('name'=>'jun', 'age'=>25);
$arr1 = serialize($arr);
$arr2 = unserialize($arr1);


var_dump($arr);
