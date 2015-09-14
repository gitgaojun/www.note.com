<?php

class A
{
	public $age;
	function __construct($age)
	{
		$this->age = $age;
	}
}

$arr = array('ad','asd');
$a = new A('34');
var_dump(serialize($a));
var_dump(serialize($arr));