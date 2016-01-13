<?php
/**
 * Created by PhpStorm.
 * User: jun90610@gmail.com
 * Date: 2015/9/8
 * Time: 15:49
 */
$a1 = array("1","2");
$a2 = array("3","4");
print_r(array_merge($a1, $a2));
exit;
class A{
    public $num=100;
}
$a = new A();
$b = clone $a;
$a->num=200;
echo $b->num;

function total_Sum($c=5, $b=3,$a){
    echo$a."+ ".$b." + ".$c." = ".($a+$b+$c) ;
}
total_Sum(1);

//Notice: Undefined variable: a in D:\code\www.note.com\class\function.php on line 10
//+ 3 + 1 = 4