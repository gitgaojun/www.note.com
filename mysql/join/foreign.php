<?php
header('content-type:text/html;charset=utf-8');

echo "<pre>";

echo <<<EOF

建立表来说明外键的作用

drop database if exists `web`;
create database `web`;
use `web`;
drop table if exists `order`;
create table `order`(
`id` int(11) auto_increment not null primary key,
`order_code` int(11) not null comment "订单号",
`userid` int(11) not null comment "用户id",
`date` datetime not null comment "时间",
primary key (id)
)engine=myISAM default charset=utf8 comment="订单表";
drop table if exists `order_items`;
create table `order_items`(
`id` int(11) auto_increment not null,
`orderid` int(11) not null comment "订单号",
`code` varchar(13) not null comment "商品编号",
`number` int(13) not null comment "数量",
foreign key (orderid) references order(id)
)engine=myISAM default charset=utf8 comment="订单附表";


报错，外键建立在innerdb引擎表中
drop database if exists `web`;
create database `web`;
use `web`;
drop table if exists `order`;
create table `order`(
`id` int(11) auto_increment not null,
`order_code` int(11) not null comment "订单号",
`userid` int(11) not null comment "用户id",
`money` double(8,2) not null comment "金额",
`date` datetime not null comment "时间",
primary key (id)
)engine=innerDB default charset=utf8 comment="订单表";
drop table if exists `order_items`;
create table `order_items`(
`id` int(11) auto_increment not null,
`orderid` int(11) not null comment "订单号",
`code` varchar(13) not null comment "商品编号",
`number` int(11) not null comment "数量",
primary key (id),
foreign key (orderid) references `order`(`id`)
)engine=innerDB default charset=utf8 comment="订单附表";

insert into `order`(`order_code`, `userid`, `money`, `date`)value('31234852', '432', '23.82', now());
insert into `order_items`(`orderid`, `code`, `number`)value('4', 'YM1354862', 3);

报错说明，因为主键约束发现，order表中不存在 id=4的值，
mysql> insert into `order_items`(`orderid`, `code`, `number`)value('4', 'YM1354862', 3);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`web`.`order_items`, CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order` (`id`))')

	正确的代码如下：

drop database if exists `web`;
create database `web`;
use `web`;
drop table if exists `order`;
create table `order`(
`id` int(11) auto_increment not null,
`order_code` int(11) not null comment "订单号",
`userid` int(11) not null comment "用户id",
`money` double(8,2) not null comment "金额",
`date` datetime not null comment "时间",
primary key (id)
)engine=innerDB default charset=utf8 comment="订单表";
drop table if exists `order_items`;
create table `order_items`(
`id` int(11) auto_increment not null,
`orderid` int(11) not null comment "订单号",
`code` varchar(13) not null comment "商品编号",
`number` int(11) not null comment "数量",
primary key (id),
foreign key (orderid) references `order`(`id`)
)engine=innerDB default charset=utf8 comment="订单附表";

insert into `order`(`order_code`, `userid`, `money`, `date`)value('31234852', '432', '23.82', now());
insert into `order_items`(`orderid`, `code`, `number`)value('4', 'YM1354862', 3);
EOF;

