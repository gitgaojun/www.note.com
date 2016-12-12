<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16-12-12
 * Time: 下午4:46
 *
 * learn colusers
 *
 *
 */

$message = 'world!';

$echoMessage = function($arg) use ($message) {
  printf($arg.' '.$message);
};

$echoMessage();
