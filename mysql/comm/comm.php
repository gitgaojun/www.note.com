<?php


/**
 * mysql 操作类
 *
 * @since 2015-8-30
 * @author jun
 * @package  MysqlDriver
 *
 */
class MysqlDriver
{
	/*数据库连接资源*/
	public $link;
	/*地址*/
	public $local;
	/*用户名*/
	public $user;
	/*密码*/
	public $pwd;
	/*数据库名字*/
	public $db_name;

	/**
	 * 初始化数据库连接的数据
	 *
	 * @since 2015-8-30
	 * @author jun
	 * @access public
	 * @return void
	 */
	public function __construct( $db_driver='' )
	{
		$mysql = array();
		require 'config.php';
		if( $db_driver === '' )
		{
			$this->local = $database['default']['localhost'];
			$this->user = $database['default']['user'];
			$this->pwd = $database['default']['pwd'];
			$this->db_name = $database['default']['db_name'];
		}
		else
		{
			$this->local = $database[$db_driver]['localhost'];
			$this->user = $database[$db_driver]['user'];
			$this->pwd = $database[$db_driver]['pwd'];
			$this->db_name = $database[$db_driver]['db_name'];
		}

		$this->link = mysqli_connect($this->local, $this->user, $this->pwd, $this->db_name) or die('mysqli_error'.mysqli_error());
		mysqli_query('set charset utf-8');


	}

	public function query($sql = '')
	{
		$result = mysqli_query("$sql", $this->link);
		var_dump($result);exit;
		while($result as $row)
		{
			$data[] = $row->
		}
	}

	/**
	 * 断开mysql连接
	 *
	 * @since 2015-8-30
	 * @author jun
	 * @access public
	 * @return void
	 */
	public function __distruct()
	{
		mysqli_close();
	}




}
