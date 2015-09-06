<!DOCTYPE HTML>
<html lang="ch_cn">
<meta charset='utf-8'/>
<head>
<title>多属性查询</title>
</head>
<body>
<span>
	<ul>
		<span>建立一个商品表和商品属性表，来筛选需要的商品</span>
		<li>
<span>
drop table if exists `t_goods`;
create table `t_goods`(
	id int not null auto_increment primary key,
	uid int not null comment '用户id',
	code char(10) not null comment '商品code',
	name char(50) not null comment '商品名称',
	add_time datetime not null comment '添加时间',
	update_time datetime not null comment '更新时间'
)engine=myisam default charset=utf8 comment='商品表';

drop table if exists `t_goods_info`;
create table `t_goods_info`(
	id int not null auto_increment primary key,
	code char(10) not null comment '商品code',
	price double(2) not null comment '价格',
	color int(10) not null comment '颜色1 red 2,grey 3 yellow',
	size int(10) not null comment '尺寸',
	introduce varchar(200) not null comment '介绍',
	img varchar(50) not null comment '图片路径'
)engine=myisam default charset=utf8 comment='商品详情(属性)表';				
</span>
		</li>
		<li></li>
		<li></li>
	<ul>
</span>
</body>
</html>


















