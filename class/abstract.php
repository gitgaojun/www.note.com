<?php

/**
 * 看看abstract如何使用 
 * 用于修饰类，类方法 ，
 * 使用后表明类是抽象的类，必须被实例化后才能被
 */
// 类的限制符必须写在class之前
abstract class people
{
	function setName(){}
	function getName(){}
}

// $jun = new abstract();
// output 
// Parse error: syntax error, unexpected 'abstract' (T_ABSTRACT), expecting identifier (T_STRING) in /home/wwwroot/www.note.com/class/abstruct.php on line 8''

class Man extends people
{
	public $name;
	
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}
$jun = new Man();
$jun->setName('jun');
$junName=$jun->getName();
var_dump($junName);
// output "jun"

class Women extends people
{
	public function __construct()
	{
		echo 'hello world';
	}
}
$junSister = new Women();
// 没有重写方法 setName, getName 也没有报错，说明抽象类失败。

/* 
 * 2,试着写一个抽象类

abstract class Index_ab
{
	public abstract function Index_ab(){}
	public abstract function Search(){}	
}

class Index extends Index_ab
{
	public function Index_ab()
	{
		echo 'this is index html page';
	}
}
$index = new Index();
*/
// outputr
//fatal error: Abstract function Index_ab::Index_ab() cannot contain body in /home/wwwroot/www.note.com/class/abstract.php on line 51
// 致命的错误，说的是我们的抽象方法不能包含一个身体。就是说不要{  }  括号，
// 那么我们建立抽象方法的时候就不写括号，并且一个方法写完后以 ; 分号结尾。

/**
 * 3,写一个抽象类
 */
abstract class Index_ab
{
	public abstract function Index_abc();
	public abstract function Search();
}
class Index extends Index_ab
{
	public function Index_abc()
	{
		echo 'this is function Index_ab';	
	}
	public function Search()
	{
		echo 'this is function Search';
	}
}
$home = new Index();
$home->Index_abc();
$home->Search();
//  小结下，抽象类中的方法必须包含关键字 abstract ,继承的子类必须重写抽象类中的抽象方法。
// 如果没有重写抽象方法那么就会报错，
// fatal error: Class Index contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Index_ab::Search) in /home/wwwroot/www.note.com/class/abstract.php on line 90
