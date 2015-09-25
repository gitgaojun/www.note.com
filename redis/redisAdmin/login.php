<?php
/**
 * redis 验证用户登录信息
 *
 * @since 2015-9-23 23:00
 * @author jun
 * @package  login.php
 * @link   www.note.com/redis/redisAdmin/login.php
 */


########## redis 连接 #######################################################################
$redis = new redis();
$redis->connect('localhost', 6379);
/////////////////////////////////////////////////////////////////////////////////////////////


$result = array('status'=>false, 'msg'=>'', 'data'=>'');
$user_email = empty($_POST['user_email']) ? '' : addslashes(trim($_POST['user_email'])); // 邮箱地址
$user_pwd = empty($_POST['user_pwd']) ? "" : md5(addslashes(trim($_POST['user_pwd']))); // 密码
if(empty($user_email))
{
    $result['msg'] = '邮箱不能为空';
    die(json_encode($result, true));
}
if(empty($user_pwd))
{
    $result['msg'] = '密码不能为空';
    die(json_encode($result, true));
}

########### redis 获取用户信息 ##########################################################################
$user_id = $redis->get('user_email:' . $user_email);
$user_list = $redis->hGetAll('user_id:'.$user_id);
/*hGetAll 取出一个哈希表所有数据*/
//var_dump($user_list);exit;
///////////////////////////////////////////////////////////////////////////////////////////////////////

if($user_list['user_pwd'] !== $user_pwd)
{
    $result['msg'] = '密码错误';
    die(json_encode($result, true));
}

########## session 保存用户信息 ########################################################################
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $user_list['user_name'];
///////////////////////////////////////////////////////////////////////////////////////////////////////


$result['status'] = true;
die(json_encode($result, true));
