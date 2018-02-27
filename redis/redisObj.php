<?php
/**
 *  封装redis
 * @author jun
 * Class RedisObj
 */

class RedisObj
{

    private $readConf;
    private $writeConf;

    public $conn;

    private $_read_method_names = [
        'lLen',
    ];

    private $_write_method_names = [
        'lPop',
        'rPop',
        'lPush',
        'rPush'
    ];

    public function __construct($readConf, $writeConf)
    {
        $this->readConf  = $readConf;
        $this->writeConf = $writeConf;
        $this->connection();
    }

    protected function connection($type)
    {
        $redis = new Redis();
        if($type === 'read'){
            $this->conn = $redis->connect( $this->readConf['host'], $this->readConf['port']);
        }elseif($type === 'write'){
            $this->conn = $redis->connect( $this->writeConf['host'], $this->writeConf['port']);
        }

        if(!$this->conn){
            echo 'Redis connet failed';exit;
        }
        return $this->conn;

    }

    public function __call($method, $params)
    {
        if(in_array($method, $_read_method_names)){
            $type = 'read';
        }else{
            $type = 'write';
        }
        $this->$type = $this->connection($type);

        return call_user_funs_array(array(&$this->$type, $method), $params);
    }


}