<?php
header('content-type:text/html;charset=utf-8;');

echo "<pre>";

echo <<<EOF

push 方法的作用，push 的使用场景

EOF;

$array = array(
	array('id'=>1, 'name'=>'xiaoming', 'sex'=>1),
	array('id'=>2, 'name'=>'xiaohong', 'sex'=>0),
	array('id'=>3, 'name'=>'xiaogang', 'sex'=>1)
);

$arr = [];
foreach($array as $k=>$v)
{
	array_push($arr,$v['name']);
}
var_export($arr);

echo "\n";

$arr2 = [];
foreach($array as $k=>$v)
{
	$arr2[] = $v['name'];
}
var_export($arr2);


