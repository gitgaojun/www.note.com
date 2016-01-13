<?php

$data = array();
$a=array();

if(empty($a)){
	echo 'empty';exit;
}
foreach($data as $v){
	$a[]=$v['name'];
}

var_dump($a);

