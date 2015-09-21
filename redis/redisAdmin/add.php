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
/*incr 如果有值就累加1，如果没有就现在设置为1*/
/*6379>get user_id #可以查看值*/
/*6379>del user_id #删除实验数据*/
$redis->hmset('user_id:' . $user_id, $data); // 哈希表存数据
/* php中这个redis扩展方法hmset把哈希表中的值设置成了2个值一截断为一个数组的键值和值
    hmset 方法的第二个参数只能接收一维数组
 */
/*6379>hgetall "user_id:1" # 可以查看哈希表中的值 */
/*6379>del "user_id:6"  #可删除单条测试数据*/
/*6379>eval "redis.call<'del', unpack<reids.call<'keys', 'user_id:*'>>> 0 #删除所有以user_id:开头的哈希表"*/
$redis->rpush("user_id", $user_id);// 分页计数
$addResult = $redis->set('user_email:'.$user_email, $user_id);// 方便查找user_id
/*6379>eval "redis.call<'del', unpack<reids.call<'keys', 'user_email:*'>>> 0  #删除所有以user_email:开头的表*/
/*会返回一个bool状态*/
///////////////////////////////////////////////////////////////////////////////

if($addResult)
{
    $result['status'] = true;
    die(json_encode($result, true));
}
