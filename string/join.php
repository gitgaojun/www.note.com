<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

join 方法的用法
join只能操作键值为数字的一维数组。

EOF;


$array=array('jun', 13);

$user = join(',', $array);
var_dump($user);
