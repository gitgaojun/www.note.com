<?php
header('content-type:text/html;charset=utf-8');

class a{
	protected $c=100;
	private $b=120;
	public function getC(){
		$this->c=10;
	}
}

class aSon extends a{
	public function getPrC(){
		echo $this->c;
	}
	 
	public function getPrB(){
		echo $this->b;
	}
}

$aSon = new aSon();
$aSon->getPrC();
$aSon->getPrB();
/**
 * 受保护的可以在子类中访问
 *
 */

