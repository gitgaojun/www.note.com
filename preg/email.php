<?php

$str = '1148743058@qq.com';

$str2 = 'jun610@gmai.com';

preg_email($str2);

function preg_email($str=''){
	$pattern = "/^[0-9A-Za-z_]+@[0-9A-Za-z_]+\.[0-9A-Za-z]+$/i";
	if($str === '') 
		die('false');
	if( preg_match($pattern, $str) ){
		echo 'true';
	}else{
		echo 'false';
	}
}








