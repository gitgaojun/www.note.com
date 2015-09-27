<?php
header('content-type:text/html; charset=utf-8');



$a = array('name'=>'高俊','address'=>'湖北省随州市太平乡');

$ajson = json_encode($a, JSON_UNESCAPED_UNICODE);
$ajson2 = json_encode($a);
$ajson3 = json_encode($a, true);

echo "<pre>";
var_dump($ajson, $ajson2, $ajson3);
