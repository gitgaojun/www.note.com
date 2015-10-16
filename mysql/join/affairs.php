<?php
header('content-type:text/html;charset=utf-8');

echo >>>EOF

	创建订单表和订单详情表
	订单表记录总价格和时间，订单详情表记录详细商品和数目

drop database if exists `web`;
create database `web`;
use `web`;
drop table if exists `order`;
create table `order`(
`id` int(11) auto_increment not null primary key,
`orderid` varchar(13) not null comment '订单号',
`money` double(10,2) not null comment '金额',
`userid` int(11) not null comment '客户id',
`date` datetime not null comment '创建时间' 
)engine=innerDB default charset='utf8' comment='订单表';

drop table if exists `order_items`;
create table `order_items`(
`id` int(11) auto_increment not null primary key,
`orderid` varchar(13) not null comment '订单号',
`code` varchar(13) not null comment '商品编号',
`number` int(11) not null comment '数量'
)engine=innerDB default charset="utf8" comment="订单详情";

开启2个mysql的client客户端，
	一个客户端运行插入代码，一个运行select语句看事务没有结束的时候另外一个客户端是否能看到数据库中的数据，
	也就是数据是否入库。

	mysql是以自动提交（autocommit）模式运行的。这就意味着所执行的每一条语句都将立即
	写入到数据库（提交）中，如果我们使用事物那么就要
	set autocommit=0;#开启事务
	可是我们平时都是使用的自动提交。自动提交比较方便，
	那么还可以这么开始事务
	start transaction;

client1
start transaction;
insert into `order`(`orderid`, `money`, `userid`, `date`) value(11, '58.89', 1235, '2015-10-16');
insert into `order_items`(`orderid`, `code`, `number`) value(11, 'ZQ1234705', 1);

client2
select * from `order`;

没有结果，查询为空

client1
commit;

client2
select * from `order`;

有值

	回滚数据
client1
rollback;
client2
select * from `order`;
还是有值，说明要在数据提交之前回滚才有效。

client1
start transaction;
insert into `order`(`orderid`, `money`, `userid`, `date`) value(11, '58.89', 1235, '2015-10-16');
insert into `order_items`(`orderid`, `code`, `number`) value(11, 'ZQ1234705', 1);
select * from `order`;#有值
select * from `order_items`;
rollback;
select * from `order`;#没有
select * from `order_items`;
2个表都没有数据说明，事务具有 原子性，作为一个整体来对待，要么都执行要么都不执行

EOF;


