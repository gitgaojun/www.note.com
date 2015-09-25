<?php

    session_start();
    if(!empty($_SESSION['user_name']))
    {
        $user_name = $_SESSION['user_name'];
    }


?>
<!doctype html>
<html lang="ch_CN">
<head>
    <meta charset="UTF-8">
    <title>redis做登录功能</title>
    <link style="text/css" rel="stylesheet" href="../../js/bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link style="text/css" rel="stylesheet" href="app.css" />
</head>
<body>

<div class="container">
    <div class="header clearfix">
        <ul class="nav nav-pills pull-right">
            <li class="active" role="presentation">
                <a href="http://www.note.com/redis/redisAdmin/app.php">Home</a>
            </li>
            <li role="presentation">
                <a href="#">About</a>
            </li>
            <li role="presentation">
                <a href="#">Contact</a>
            </li>
            <li role="presentation">
                <a href="http://www.note.com/redis/redisAdmin/sign_up.php"><?php if(empty($user_name)){echo "登录";}else{echo "你好：{$user_name}";} ?></a>
            </li>
        </ul>
        <h3>redis-php</h3>
    </div>
</div>

<script src="../../form/jquery-1.11.2.js"></script>
<script src="../../js/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script>

</script>
</body>
</html>

<?php

/**
 * 写入一个用户信息到
 *
 */

