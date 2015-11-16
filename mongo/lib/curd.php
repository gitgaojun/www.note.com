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
	 * MongoClient->test_db->test_colleciton
	 */
	public function setCollection($db_name,$collection_name)
	{
		$this->collection = $this->link->$db_name->$collection_name;
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

	/**
	 * 获取所有的记录数据
	 *
	 * @param array $condition 筛选条件
	 * @param array $fields 返回结果的字段 array('fieldname' => true, 'fieldname2' => true)
	 * @return array 返回搜索结果的游标
	 */
	public function findAll($condition=array(), $fields=array())
	{
		$cursor = $this->collection->find($condition, $fields);//find 返回结果集
		foreach($cursor as $doc)
		{
			$result[] = $doc;
		}
		return $result;
	}
}


