<?php
header('content-type:text/html;charset=utf-8');

echo "<pre>";

//var_dump($_FILES['ima']['tmp_name']);exit;

$fp_ima = fopen($_FILES['ima']['tmp_name'], "rb");
$fp_img = fopen($_FILES['img']['tmp_name'], "rb");

$buf_ima = fread($fp_ima, $_FILES['ima']['size']);
$buf_img = fread($fp_img, $_FILES['img']['size']);

$buf_ima = base64_encode($buf_ima);
$buf_img = base64_encode($buf_img);

$result = array('website'=>'note', 'imgstr'=>$buf_ima.'||||'.$buf_img);

$ch = curl_init();

$url = 'http://www.note.com/file/image/saveImgApi.php';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $result);
$data = curl_exec($ch);
curl_close($ch);

print_r($data);





