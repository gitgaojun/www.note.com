<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8"/>
<title>多表连接查询</title>
</head>
<body>
<span>查询出三个表都join出的数据，如何写</span>
<span>主贴表，用户表，回复表</span>
<span>博客评论功能建表？</span>
<br>
create database if not exists `www.note.com`;
use `www.note.com`;
drop table if exists t_user;
create table t_user(
	uid int auto_increment not null primary key,
	u_name varchar(50) not null comment '用户名',
	u_ip varchar(15) not null comment '用户ip',
	u_count int(11) not null default 0 comment '登录次数',
	add_time datetime not null comment '注册时间',
	last_time datetime not null comment '上次登出时间'
)engine=myisam default charset=utf8 comment='用户表';

drop table if exists t_msg;
create table t_msg(
	mid int auto_increment not null primary key,
	title varchar(100) not null comment '标题',
	content varchar(500) not null comment '帖子内容',
	time datetime not null comment '时间',
	uid int not null comment '作者id' 
)engine=myisam default charset=utf8 comment='帖子表';

drop table if exists t_reply;
create table t_reply(
	id int auto_increment not null primary key,
	mid int not null comment '帖子id',
	pid int not null comment '回复父id',
	uid int not null comment '用户id',
	time datetime not null comment '回复时间'
)engine=myisam default charset=utf8 comment='回复表';
</body>
</html>
<?php

include_once('../comm/comm.php');



