<?php
header('content-type:text/html;charset=utf-8;');
echo null == false ? '等于' : '不等于';
echo "\n";
if(null == false){
	echo '等于';
}else{
	echo '不等于';
}	

echo "\n";


$a[2] = 0;

var_dump(isset($a[2]));

