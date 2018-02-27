<?php

$config = [
    'host'          =>      '127.0.0.1',
    'port'          =>      '5672',
    'login'         =>      'guest',
    'password'      =>      'guest',
    'vhost'         =>      '/'
];
$e_name='e_linvo';
$q_name='q_linvo';
$k_route='key_1';

// 连接   生成 channel
$conn = new AMQPConnection($config);

if(!$conn->connect()){
    echo '没有连上RabbitDB';exit;
}

$channel = new AMQPChannel($conn);

// 创建交换机
$ex = new AMQPExchange($channel);
$ex->setName($e_name);
$ex->setType(AMQP_EX_TYPE_DIRECT);
$ex->setFlags(AMQP_DURABLE);
echo 'Exchange status: ' . $ex->declare().";\n";

echo 545;exit;
// 创建队列
$q = new AMQPQueue($channel);
$q->setname($q_name);
$q->setFlage(AMQP_DURABLE);
echo 'Message total: ' . $q->declare() . ";\n";


