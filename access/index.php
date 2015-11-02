<?php
header('content-type:text/html;charset=utf8;');
/**
 * php面试题
 *
 */

/*

	'$arr1'转换成数组'$arr2'

　　$arr1 = array (
　　‘0′ => array (‘fid’ => 1, ‘tid’ => 1, ‘name’ =>’Name1′ ),
　　‘1′ => array (‘fid’ => 1, ‘tid’ => 2 , ‘name’ =>’Name2′ ),
　　‘2′ => array (‘fid’ => 1, ‘tid’ => 5 , ‘name’ =>’Name3′ ),
　　‘3′ => array (‘fid’ => 1, ‘tid’ => 7 , ‘name’ =>’Name4′ ),
　　‘4′ => array (‘fid’ => 3, ‘tid’ => 9, ‘name’ =>’Name5′ )
　　);
　　$arr2 = array (
　　‘0′ => array (
　　‘0′ => array ( ‘tid’ => 1, ‘name’ => ‘Name1′),
　　‘1′ => array ( ‘tid’ => 2, ‘name’ => ‘Name2′),
　　‘2′ => array ( ‘tid’ => 5, ‘name’ => ‘Name3′),
　　‘3′ => array ( ‘tid’ => 7, ‘name’ => ‘Name4′) ),
　　‘1′ => array (
　　‘0′ => array ( ‘tid’ => 9, ‘name’ => ‘Name5′ ) ) );
 */

$arr1 = array (
'0'=> array ('fid' => 1, 'tid' => 1, 'name' =>'Name1' ),
'1' => array ('fid' => 1, 'tid' => 2 , 'name' =>'Name2' ),
'2' => array ('fid' => 1, 'tid' => 5 , 'name' =>'Name3' ),
'3' => array ('fid' => 1, 'tid' => 7 , 'name' =>'Name4' ),
'4' => array ('fid' => 3, 'tid' => 9, 'name' =>'Name5' )
);

function test($arr1)
{
	$arr2 = array();
	foreach($arr1 as $k=>$v)
	{
		$arr2[$v['fid']][]=array('tid'=>$v['tid'], 'name'=>$v['name']);
		
	}
	$arr2 = array_values($arr2);
	return $arr2;
}
// array_values 可以去键值，让键值重新排序
var_export(test($arr1));

// 数据库设计的范式及应用
// 一个表中的id有多个记录，把所有这个id的记录查出来，并显示共有多少条记录数，用SQL语句及视图、存储过程分别实现。
/*
select count(*), id from table_name;
create view film_view as select count(*), id from table_name;


*/










