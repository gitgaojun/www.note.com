<?php

/**
 * @author jun
 * @since 2015-9-17
 * @package index.php
 * @link    www.note.com/phpexcel/index.php
 */

/*
 * sql  创建一个表来用做excel展示

create database if not exists `sut`;
use `sut`;
drop table if exists `sut`;
create table sub(
id int(11) not null auto_increment primary key,
name varchar(20) not null comment '学生姓名',
sex tinyint(1) not null comment '性别 0 女 , 1 男',
age int(3) not null comment '年纪'
)engine=myisam default charset=utf8 comment="学生表";

 *
 *
 */

################# 查询数据 ##############################
$link = mysqli_connect('127.0.0.1', 'root', '123456', 'sut') or die('mysqli error:'.mysqli_errno($link));
$sql = "select * from sub";
$result = mysqli_query($link, $sql) or die("Could not query:".mysqli_error($link));

$data = array();
if( is_object($result) )
{
    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
}
///////////////////////////////////////////////////////

//var_export($data);exit;

################### 引入excel类库 ######################################################################
include('PHPExcel.php');
include('PHPExcel/Writer/Excel2007.php');
///////////////////////////////////////////////////////////////////////////////////////////////////////

/*创建对象*/
$ObjPHPExcel = new PHPExcel();

#############设置属性##########################################################
/*创建人*/
$ObjPHPExcel->getProperties()->setCreator("jun");
/*最后修改人*/
$ObjPHPExcel->getProperties()->setLastModifiedBy("jun");
/*设置标题*/
$ObjPHPExcel->getProperties()->setTitle('设置标题');
/*设置题目*/
$ObjPHPExcel->getProperties()->setSubject("设置题目");
/*设置描述*/
$ObjPHPExcel->getProperties()->setDescription("设置描述");
/*设置关键字*/
$ObjPHPExcel->getProperties()->setKeywords("设置关键字");
/*设置种类*/
$ObjPHPExcel->getProperties()->setCategory("设置种类");

/*设置当前的sheet*/
$ObjPHPExcel->setActiveSheetIndex(0);
/*设置sheet的name*/
$ObjPHPExcel->getActiveSheet()->setTitle('simple');

/*设置单元格的值*/
$count = count($data);
$ObjPHPExcel->getActiveSheet()->setCellValue("A" . 1, 'id');
$ObjPHPExcel->getActiveSheet()->setCellValue("B" . 1, '姓名');
$ObjPHPExcel->getActiveSheet()->setCellValue("C" . 1, '性别');
$ObjPHPExcel->getActiveSheet()->setCellValue("D" . 1, '年纪');
for($i=2; $i < $count+2; $i++ )
{
    $ObjPHPExcel->getActiveSheet()->setCellValue("A" . $i, $data[$i-2]['id']);
    $ObjPHPExcel->getActiveSheet()->setCellValue("B" . $i, $data[$i-2]['name']);
    $ObjPHPExcel->getActiveSheet()->setCellValue("C" . $i, $data[$i-2]['sex']);
    $ObjPHPExcel->getActiveSheet()->setCellValue("D" . $i, $data[$i-2]['age']);
}

$ObjWrite = new PHPExcel_Writer_Excel2007($ObjPHPExcel);
$ObjWrite->save('sub.xlsx');
echo "<script>window.location.href=\"/phpexcel/sub.xlsx\";</script>";
//////////////////////////////////////////////////////////////////////////////