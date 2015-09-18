<?php

$user_email = empty($_POST['user_email']) ? '' : addslashes(trim($_POST['user_email'])); // 邮箱地址
$user_pwd = empty($_POST['user_pwd']) ? "" : addslashes(trim($_POST['user_pwd'])); // 密码

