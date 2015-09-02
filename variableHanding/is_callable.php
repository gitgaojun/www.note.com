<?php

function getName($name)
{
	var_dump(is_callable());
}

$a = is_callable("getName");
var_dump($a);
/*检查函数名 是否是合法的可被调用的*/

class A
{
	function someMethod()
	{

	}
}

$b = new A();
$arr = array($b, 'someMethod');
var_dump(is_callable($arr));
/*

当我们检查一个对象中的方法是否是可被调用的是否
要给一个数组。数组的第一个值是对象的实例化变量，
第二个参数是对象中的方法名

 */