<?php 
/**
 * 测试mongodb 基类
 *
 * @since 2015-11-15
 * @author jun
 */

require_once('lib/curd.php');

$mongo = new curd();
$mongo->setCollection('test','test_goods');
//$oneList = $mongo->findOne();
//var_export($oneList);exit;

//$allList = $mongo->findAll();
//var_export($allList);exit;
//$getGoods = $mongo->findAll(array('goods_id'=>3), array('goods_id'=>true,'promote_price'=>true));
//echo "<pre>";
//var_export($getGoods);exit;



//$condition = array(
//	array(
//		'$match'=>array(
//			'goods_id'=>array('$gt'=>5)
//			//'goods_id'=>7
//		)
//	),
//	array(
//		'$project'=>array(
//			'goods_id'=>1,
//			'shop_price'=>1,
//			'promote_price'=>1,
//			//'kk'=>1, 没有该字段不会报错，也不会显示
//			'lv'=>array('$divide'=>array('$shop_price', '$promote_price'))
//		
//		),
//	),
//	array(
//			'$sort'=>array('lv'=>1),
//		),
//	array(
//			'$limit'=>3
//	),		
//);
//$list = $mongo->aggregate($condition);
//var_dump($list);

//$collection_name = $mongo->getCollectionName();
//var_dump($collection_name);