<?php
/**
 * static 看看实例化对象后 修改静态中的类时候会改变实例化的对象
 */

/**
 * (1)创建一个类
 * (2)实例化类 创建对象 $aObject $bObject
 * (3)改变类的静态成员属性
 * (4)打印对象的成员属性
 */

class people
{

    public $mouse;
    static public $handNum;

    public function __construct($num)
    {
        self::$handNum=$num;
        echo self::$handNum . '\n';
    }

    static public function getHandNum()
    {
        echo self::$handNum . '\n';
    }

    static public function setHandNum($num)
    {
        self::$handNum = $num;
        echo self::$handNum . '\n';
    }
}


$aObject = new people(2);
$bObject = new people(4);
people::setHandNum(8);
$aObject::getHandNum();
$bObject::getHandNum();
// output 2 4 8 8 8 