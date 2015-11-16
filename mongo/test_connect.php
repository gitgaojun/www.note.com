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
$oneList = $mongo->findOne();
var_export($oneList);exit;




