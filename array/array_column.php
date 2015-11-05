<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

	array_column 函数方法的使用



EOF;


$data = array(
	array('name'=>'jun',
	'sex'=>'nan',
	'age'=>12
	),
	array('name'=>'ming',
	'sex'=>'nan',
	'age'=>12
	),
	array('name'=>'fei',
	'sex'=>'nan',
	'age'=>12
	),
);
$name_list = array_column($data, 'name');

var_dump($name_list);



