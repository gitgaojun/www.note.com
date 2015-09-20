<?php

/**
 * redis  ajax添加新用户信息
 *
 * @since 2015-9-20
 * @author jun <1148743058@qq.com>
 * @package add.php
 * @link www.note.com/redis/redisAdmin/add.php
 */

########## redis 建立连接 #####################################################
$redis = new redis();
$redis->connect('localhost', 6379);
///////////////////////////////////////////////////////////////////////////////

$result = array('status'=>false, 'msg'=> '', 'data'=>'');
$user_name = empty($_POST['user_name']) ? '' : addslashes(trim($_POST['user_name'])); // 用户名
$user_email = empty($_POST['user_email']) ? '' : addslashes(trim($_POST['user_email'])); //用户邮箱
$user_pwd = empty($_POST['user_pwd']) ? '' : addslashes(trim($_POST['user_pwd'])); // 用户密码
if(empty($user_name))
{
	$result['msg'] = '用户名不能为空';
	die(json_encode($result, true));
}
if(empty($user_email))
{
	$result['msg'] = '用户邮箱不能为空';
	die(json_encode($result, true));
}
if(empty($user_pwd))
{
	$result['msg'] = '密码不能为空';
	die(json_encode($result, true));
}

########### redis 添加新用户数据 ##############################################
$data = array(
	'user_name'=>$user_name,
	'user_email'=>$user_email, 
	'user_pwd'=>md5($user_pwd)
);
$user_id = $redis->incr('user_id');// 利用原子计数器计算出user_id
$redis->hmset('user_id:' . $user_id, $data); // 哈希表存数据
$redis->rpush("user_id", $user_id);// 分页计数
$redis->set('user_email:'.$user_email, $user_id);// 方便查找user_id
///////////////////////////////////////////////////////////////////////////////

$result['status'] = true;
die(json_encode($result, true));
