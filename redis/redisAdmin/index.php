<?php

/*web 地址*/
define('WEB', 'www.note.com/redis/redisAdmin');

/*环境地址*/
define('BATHPATH', str_replace('\\', '/', __DIR__) . '/');


$redis = new redis();

$link = $redis->connect('localhost', 6379);

$redis->set('name', 'jun');

$name = $redis->get('name');

echo $name;

