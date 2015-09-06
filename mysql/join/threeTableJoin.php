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
<span>
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
	content text not null comment '帖子内容',
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
</span>

<span>
    insert into t_user (u_name, u_ip, u_count, add_time, last_time) values('jun', '127.0.0.1', '0', NOW(),NOW());
    insert into t_user (u_name, u_ip, u_count, add_time, last_time) values('li', '127.0.0.1', '0', NOW(),NOW());
    insert into t_msg (`title`, `content`, `time` , `uid`) values('CentOS7 搭建Kubernetes 1.0',"Kubernetes 日前终于发布了稳定版 1.0, 本文将要出一个系列的文章来讲述如何搭建环境，部署服务，升级服务，备份数据，最后到达如何对Kubernetes进行二次发。 相信点击进来的人都应该知道Kubernetes是什么吧，关于介绍，请看： http://www.infoq.com/cn/articles/Kubernetes-system-architecture-introduction?utm_campaign=infoq_content&utm_source=infoq&utm_medium=feed&utm_term=global 讲解的很清楚。 本文直接切入正题。 本文搭建的基本环境是 Kubernetes 1.0 + CentOS 7的两台虚拟机：一台作为Master，一台作为Minion。 1. 简要叙述 搭建过程： 网络搭建，将采用Flannel 安装master和minion端需要的软件 启动Kubernetes集群 2. 网络搭建 在裸机上安装Kubernetes需要先备好一个网络：我选择的是简单的Flannel，够用就好。 Flannel网络搭建较为简单，部署一个etcd的集群，然后build flannel，运行即可。此不是文章重点。具体可参考： http://www.slideshare.net/lorispack/using-coreos-flannel-for-docker-networking 如果遇到了问题可以咨询我， 关于Flannel在docker网络中的作用可以看这篇博客: http://my.oschina.net/xue777hua/blog/488345 3. 安装Kubernetes集群 其中 centos-master = 192.168.56.110 centos-minion = 192.168.56.111 请设置好/etc/hosts文件，或者是DNS。 master运行如下组件：etcd, kube-apiserver, kube-controller-manager, kube-scheduler, kube-proxy minion运行如下组件：docker, kubelet, kube-proxy 当然，前提是flannel网络在两边都可以work, 当然更加的前提是安装好了docker,检验的方式是：在master和minion都分别启动一个er，在container之间互相能够ping对方即可。 3.1 为机器添加repo 在 master+minion上, 使用virt7-testing的repo： [virt7-testing] name=virt7-testing baseurl=http://cbs.centos.org/repos/virt7-testing/x86_64/os/ gpgcheck=0 3.2 安装Kubernetes软件 在所有的机器上执行 yum -y install --enablerepo=virt7-testing kubernetes 即可。 检查etcd的版本是否为 0.4.6-7 , 如果不是，则删除etcd并且从rpm安装： yum erase etcd yum install http://cbs.centos.org/kojifiles/packages/etcd/0.4.6/7.el7.centos/x86_64/etcd-0.4.6-7.el7.centos.x86_64.rpm yum -y install --enablerepo=virt7-testing kubernetes 3.3 配置Kubernetes集群 1.设置 master+minion的 /etc/kubernetes/config 为： KUBE_ETCD_SERVERS=\"--etcd_servers=http://centos-master:4001\" KUBE_LOGTOSTDERR=\"--logtostderr=true\" KUBE_LOG_LEVEL=\"--v=0\" KUBE_ALLOW_PRIV=\"--allow_privileged=false\" 特别是 KUBE_ETCD_SERVERS 特别重要，表示要连接的etcd的服务，Kubernetes的各种信息：例如物理机，容器的基本信息都是存储在Kubernetes上面的。 2.设置 master+minion的 /etc/kubernetes/apiserver 为(只列出了重要的几个配置)： # 需要连接的master的地址，kubelet需要连接到kube-apiserver来工作 KUBE_API_ADDRESS=\"--address=centos-master\" KUBE_API_PORT=\"--port=8080\" # 服务所在的ip地址范围，服务是一组pod的组合产物 KUBE_SERVICE_ADDRESSES=\"--service-cluster-ip-range=10.254.0.0/16\" 3.设置 minion端的 /etc/kubernetes/kubelet 文件 # kubelet绑定的ip地址 KUBELET_ADDRESS=\"--address=0.0.0.0\" # kubelet的通信段耨 KUBELET_PORT=\"--port=10250\" # kubelet的hostname，到时候用kubectl get po 可以拿到的结果 KUBELET_HOSTNAME=\"--hostname_override=centos-minion\" # api-server的通信端口 KUBELET_API_SERVER=\"--api_servers=http://centos-master:8080\" 4.设置iptables 8080, 10250 的tcp端口都添加到防火墙列外，另外安装flannel也要记得设置好iptables，具体见我的博客：http://my.oschina.net/xue777hua/blog/488345 4. 启动Kubernetes集群 个人经验是执行下面的命令之后使用 systemctl status -l $SERVICES 检验一遍，如果有问题执行systemctl restart $SERVICES 。 4.1 启动master for SERVICES in etcd kube-apiserver kube-controller-manager kube-scheduler kube-proxy; do systemctl restart $SERVICES systemctl enable $SERVICES systemctl status $SERVICES done 4.2 启动minion for SERVICES in kube-proxy kubelet docker; do systemctl restart $SERVICES systemctl enable $SERVICES systemctl status $SERVICES done 启动完毕后，master端执行kubectl get no，如果能看到下面的结果即为成功： [03:01 AM root@centos-master ~]$ kubectl get no NAME LABELS STATUS centos-minion kubernetes.io/hostname=centos-minion Ready ",NOW(),1);
    insert into t_reply (mid, pid, uid, time) values(1,0,2,now());
</span>
<br><hr>
<span>
    select m.* , u.u_name, r.uid as r_uid, r.time as rtime from t_msg as m inner join t_user as u on m.uid=u.uid inner join t_reply as r on m.mid=r.mid where m.title like '%CentOS7 搭建Kubernetes%' and r.pid=0;
    select m.* , u.u_name, r.uid as r_uid, r.time as rtime from t_msg as m inner join t_reply as r on m.mid=r.mid inner join t_user as u on m.uid=u.uid where m.title like '%CentOS7 搭建Kubernetes%' and r.pid=0;

</span>
<br>
<span>
    改变join的先后顺序发现他们结果没有区别，说明join就只靠on 后面的条件来管理表。多条join，看看on 后面的条件有没有写错就可以正确的运行了。我们先把表提取出来，再来on，设置他们到底如何关联在一起。
</span>
</body>
</html>
<?php

include_once('../comm/comm.php');



