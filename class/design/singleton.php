<?php


/**
 * 单例模式的例子
 *
 * @since 2015-11-3
 * @author jun
 * @package singleton
 * @link http://www.note.com/class/design/singleton.php
 */

class Singl
{
	public $c = 9;
	public $d;
	public function __construct()
	{
	}


	public function getSelf()
	{

		$c = new self();// self()表示对象自己，自己在自己内部调用自己
		var_dump($c);
		
	}
}


$a  = new Singl();

$a->getSelf();

echo "\n<pre>";
class Singleton
{
	static protected $db;

	public function __construct()
	{

	}

	static function getInstance()
	{
		if(self::$db)
		{
			return self::$db;
		}
		else
		{
			self::$db = new self();
		}
		return self::$db;
	}

}

$Singleton = Singleton::getInstance();

var_dump($Singleton);
