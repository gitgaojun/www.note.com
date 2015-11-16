<?php
/**
 * mongodb 数据库的初始化连接/操作类
 *
 * @since 2015-11-15
 * @author jun
 * @package conn
 */

class conn
{
	private $host='127.0.0.1'; // host地址
	private $port='27017';		// port号
	public $link;			// 连接资源
 
	public function __construct()
	{
		$this->connect();// 连接mongodb
	}

	protected function connect()
	{
		$this->link = new MongoClient($this->connect_string());
	}	

	protected function connect_string()
	{
		return $this->host.':'.$this->port;
	}

	public function __destruct(){
		$this->link->close();// 释放资源 
	}

}



