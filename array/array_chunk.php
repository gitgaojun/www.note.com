<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

array_check 的用法

EOF;

$fruit = array('apple', 'banana','plum','apricot','orange');

$fruit_list = array_chunk($fruit, 2);
var_dump($fruit_list);

