<?php
/**
 * 学习下跨库查询
 *
 * @since   2015-10-12
 * @author  jun
 * @package twoDBJoin.php
 * @link    www.note.com/mysql/join/twoDBJoin.php
 */

//使用heredoc语法的时候开始需要家符号 <<< 结尾字符前面不能有空格或者其他字符，而且heredoc不能是最后一行。
$test = <<<EOF

drop `goods_db` if databases exists;
create database `goods_db`;
use `goods_db`;
drop `goods` if table exists;
create table `goods`(
    id int(11) not null auto_increment,
    name charset(300) not null commit '商品名字',
    code charset(20) not null commit '编号',
    price double(10,2) not null commit '原价',
    z_price double(10,2) not null commit '折扣价',
    add_time datetime not null commit '添加时间',
    status tinyint(1) not null commit '商品状态 1:上架  2:下架',
)engine=myISAM default charset="UTF8" COMMENT='商品表';
insert into `goods` (`name`, `code`, `price`, `z_prize`, `add_time`, `status`)
    values( "联想（ThinkPad）金属轻薄系列", '1363339', '6599.00', '6599.00', now(), 1);
insert into `goods` (`name`, `code`, `price`, `z_prize`, `add_time`, `status`)
    values( "ThinkPadE450C(20EH0001CD)", '1309456', '3999.00', '3999.00', now(), 1);
insert into `goods` (`name`, `code`, `price`, `z_prize`, `add_time`, `status`)
    values( '首席官拉杆箱旅行箱包行李箱登机箱子万向轮', '1675981345', '268.00', '268.00', now(), 1);
insert into `goods` (`name`, `code`, `price`, `z_prize`, `add_time`, `status`)
    values( '首席官拉杆箱男女行李箱万向轮旅行箱登机箱', '1217965963', '353.00', '308.00', now(), 1);
insert into `goods` (`name`, `code`, `price`, `z_prize`, `add_time`, `status`)
    values( '碟中碟 越野遥控翻斗车儿童玩具360度翻滚', '1219137', '79', '58', now(), 1);
insert into `goods` (`name`, `code`, `price`, `z_prize`, `add_time`, `status`)
    values( 'Onitsuka Tiger 鬼冢虎 复古休闲鞋 男 运动鞋 DL408-0128 乳白色/橄榄绿 39', '1448677257', '788.00', '788.00', now(), 1);

drop `erp_db` if databases exists;
create database `erp_db`;
use `erp_db`;
drop `goods` if table exists;
create table `goods`(
    id int(11) not null auto_increment,
    name charset(300) not null commit '商品名称',
    code charset(20) not null commit '编号',
    num int(11) not null commit '库存',
    price double(10,2) not null commit '进货价',
    z_price double(10,2) not null commit '售价',
    add_time datetime not null commit '添加时间',
    status tinyint(1) not null commit '商品状态 1:可以出售，2:不能出售'
)engine=myISAM default charset="utf8" COMMENT="商品表";
insert into `goods` (`name`, `code`, `num`, `price`, `z_prize`, `add_time`, `status`)
    value("联想（ThinkPad）金属轻薄系列", '1363339', 306, '6599.00', '6599.00', now(), 1);
insert into `goods` (`name`, `code`, `num`, `price`, `z_prize`, `add_time`, `status`)
    value("ThinkPadE450C(20EH0001CD)", '1309456', 609, '3999.00', '3999.00', now(), 1);
insert into `goods` (`name`, `code`, `num`, `price`, `z_prize`, `add_time`, `status`)
    value('首席官拉杆箱旅行箱包行李箱登机箱子万向轮', '1675981345', 100, '268.00', '268.00', now(), 1);
insert into `goods` (`name`, `code`, `num`, `price`, `z_prize`, `add_time`, `status`)
    value('碟中碟 越野遥控翻斗车儿童玩具360度翻滚', '1219137', 0, '79', '58', now(), 0);
insert into `goods` (`name`, `code`, `num`, `price`, `z_prize`, `add_time`, `status`)
    value('Onitsuka Tiger 鬼冢虎 复古休闲鞋 男 运动鞋 DL408-0128 乳白色/橄榄绿 39', '1448677257', 999, '788.00', '788.00', now(), 1);


select g.name, g.code, e.num from goods_db.goods as g left join erp_db.goods as e on g.code=e.code where e.num=0;


EOF;
