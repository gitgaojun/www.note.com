<?php
/**
 * mongodb 数据库的curd 操作方法
 *
 * @since 2015-11-15
 * @author jun
 * @package curd
 */
require_once('conn.php');

class curd extends conn
{
	protected $collection;//选择过集合的资源

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 选择文档
	 */
	public function setCollection($db_name,$collection_name)
	{
		$this->collection = $this->link->test->test_goods;
	}

	/**
	 * 获取一条记录
	 *
	 * @param array $condition 筛选条件
	 * @return array
	 */
	public function findOne($condition=array())
	{
		$result = $this->collection->findOne($condition);
		return $result;
	}
}


