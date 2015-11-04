<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

array_merge 函数方法的用法
如果有相同的键值，那么会合并在一起

EOF;

$result = array('status'=>false, 'msg'=>'', 'data'=>'');

$data = array('data'=>array('name'=>'jun','age'=>'22'));

$result = array_merge($result, $data);

var_dump($result);

