<!DOCTYPE HTML>
<html lang="ch_cn">
<meta charset='utf-8'/>
<head>
<title>多属性查询</title>
</head>
<body>
<span>
	<ul>
		<span>建立一个商品表和商品属性表，来筛选需要的商品, group by 多条件排序</span>
		<li>
<span>
drop database if exists `t_goods`;
create database `t_goods`;
use `t_goods`;
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
	gid char(10) not null comment '商品id',
	price decimal(8,2) not null comment '价格',
	color int(10) not null comment '颜色1 red 2,grey 3 yellow',
	size int(10) not null comment '尺寸',
	introduce varchar(200) not null comment '介绍',
	img char(200) not null comment '图片路径'
)engine=myisam default charset=utf8 comment='商品详情(属性)表';

insert into t_goods(uid,code,name,add_time,update_time) values(1,'BCD-610WKM', '美的（Midea）BCD-610WKM(E) 610升风冷/对开门/电脑冰箱（浮光跃金）',now(),now());
insert into t_goods_info(gid, price, color, size, introduce, img) values(1,'3799.00', 1,610,'风冷无霜，食物不粘连，610升大容量存储空间，电脑控温，多种模式随心选','http://img10.360buyimg.com/n1/jfs/t517/72/1302677212/124370/1d8a21b4/54c8a254Nb7546f17.jpg');
</span>
        <li></li>
        <li></li>
        </ul></li>
    价钱，颜色，尺寸排序
    select * from t_goods_info GROUP BY price asc,color desc,size desc;
        price     color   size
1	1	7099.2	    1	  619	风冷无霜，食物不粘连，610升大容量存储空间，电脑控温，多种模式随心选	http://img10.360buyimg.com/n1/jfs/t517/72/1302677212/124370/1d8a21b4/54c8a254Nb7546f17.jpg
2	1	7099.2	    1	  610	风冷无霜，食物不粘连，610升大容量存储空间，电脑控温，多种模式随心选	http://img10.360buyimg.com/n1/jfs/t517/72/1302677212/124370/1d8a21b4/54c8a254Nb7546f17.jpg
3	1	107099.2	4	  900	风冷无霜，食物不粘连，610升大容量存储空间，电脑控温，多种模式随心选	http://img10.360buyimg.com/n1/jfs/t517/72/1302677212/124370/1d8a21b4/54c8a254Nb7546f17.jpg
4	1	107099.2	3	  950	风冷无霜，食物不粘连，610升大容量存储空间，电脑控温，多种模式随心选	http://img10.360buyimg.com/n1/jfs/t517/72/1302677212/124370/1d8a21b4/54c8a254Nb7546f17.jpg

</span>
</body>
</html>


















