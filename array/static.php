<?php

// 静态变量只在局部作用域中存在，但当程序执行离开此操作作用域时，其值并不丢失。
//


function test()
{
	static $a = 0;

	$a++;

	echo $a;
}


test();
test();
test();

echo $a;
