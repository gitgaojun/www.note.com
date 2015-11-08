<?php
header('content-type:text/html;charset=utf-8;');
echo "<pre>";

echo <<<EOF

link
www.note.com/array/array_map.php?name=gao'jun&addr=hu'bei

www.note.com/array/array_map.php?name=gao'jun&addr=hu'bei&like[]=ping'pang&like[]=zu'qiu

array_map 函数方法的使用

(1),可以用来递归转义数字中的字符串

(2),可以合并多个一维数组为多维数组

EOF;

$request_list = $_REQUEST;

var_dump($request_list);

function addslashes_deep( $list )
{
	return is_array($list) ? array_map('addslashes_deep', $list) : addslashes($list);
}

$request_list = addslashes_deep($request_list);
var_dump($request_list);


$user_name  = array('jun','ming','ting');
$user_age	= array(12,34,14);
$user_email = array('1148743058@qq.com', '13354867@qq.com', '98742654@qq.com');

$user_list = array_map(null, $user_name, $user_age, $user_email);
var_dump($user_list);

